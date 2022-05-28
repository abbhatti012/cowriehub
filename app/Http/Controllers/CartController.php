<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Location;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $product = Book::findOrFail($id);     
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            
            $cart[$id] = [
                "id" => $id,
                "quantity" => $qty,
                "extraPrice" => $request->extraPrice,
                "extraType" => $request->extraType,
                "bookPrice" => $request->bookPrice,
                "title" => $request->title,
                "image" => $request->image,
                "is_preorder" => $request->is_preorder
            ];
        }
        session()->put('cart', $cart);
        return response()->json(['message' => 'Product added to cart successfully!', 'type'=>'success']);
    }

    public function update_cart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $data['locations'] = Location::orderBy('id','desc')->get();
            return response()->json(view('front.cart_item', $data)->render());
        }
    }

    public function remove_cart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $data['locations'] = Location::orderBy('id','desc')->get();
            return response()->json(view('front.cart_item', $data)->render());
        }
    }
    public function add_to_wishlist(Request $request){
        $is_already = Wishlist::where('user_id',Auth::id())->where('book_id',$request->id)->first();
        if($is_already){
            return response()->json(['message' => 'Product is already added to wishlist!', 'type'=>'']);
        }
        $add = new Wishlist();  
        $add->user_id = Auth::id();
        $add->book_id = $request->id;
        $add->save();
        return response()->json(['message' => 'Product added to wishlist successfully!', 'type'=>'success']);
    }
    public function remove_wishlist(Request $request){
        Wishlist::where('id',$request->id)->delete();
        $wishlist = Wishlist::where('wishlist.user_id',Auth::id())
        ->select('wishlist.*','books.*','wishlist.id as wish_id')
        ->join('books','books.id','=','wishlist.book_id')
        ->get();
        return response()->json(view('front.wishlist_item', compact('wishlist'))->render());
    }
}
