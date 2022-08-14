<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\extraField;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BookController extends Controller
{
    public function add_book(Request $request){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('id','!=',Auth::id())->where('role','author')->get();
        return view('user.add-book', compact('genres', 'authors'));
    }
    public function edit_book(Request $request, $id){
        $genres = Genre::with('subgenres')->get(); 
        $authors = User::where('id','!=',Auth::id())->where('role','author')->get();
        $book = Book::where('id',$id)->first(); 
        $sub_authors_list = explode(',',$book->sub_author);
        $sub_authors = User::whereIn('id',$sub_authors_list)->get();
        return view('user.edit-book', compact('genres', 'authors', 'book', 'sub_authors'));
    }
    public function insert_book(Request $request, $id){
        $user = Book::firstOrNew(array('id' => $id));
        if($request->post_type == 'add'){
            $user->user_id = Auth::id();
        }
        if($request->hero_image != null){
            $UploadImage = 'a'.time().'.'.$request->hero_image->extension();
            $request->hero_image->move(public_path('images/books'), $UploadImage);
            $user->hero_image = 'images/books/'.$UploadImage;
        } else {
            unset($user->hero_image);
        }
        if($request->cover != null){
            $UploadImage = 'b'.time().'.'.$request->cover->extension();
            $request->cover->move(public_path('images/books'), $UploadImage);
            $user->cover = 'images/books/'.$UploadImage;
        } else {
            unset($user->cover);
        }
        if($request->sample != null){
            $UploadImage = 'c'.time().'.'.$request->sample->extension();
            $request->sample->move(public_path('images/books'), $UploadImage);
            $user->sample = 'images/books/'.$UploadImage;
        } else {
            unset($user->sample);
        }
        $user->title = $request->title;
        $user->slug = SlugService::createSlug(Genre::class, 'slug', $request->title);
        $user->price = $request->price;
        $user->subtitle = $request->subtitle;
        $user->synopsis = $request->synopsis;
        $user->genre = $request->genre;
        $user->sub_author = $request->sub_author;
        $user->publisher = $request->publisher;
        $user->country = $request->country;
        $user->cover_type = $request->cover_type;
        $user->publication_date = $request->publication_date;
        if(Auth::user()->role == 'admin'){
            $user->status = 1;
        }
        
        if(isset($request->hardcover) && !empty($request->hardcover)){
            $user->hard_price = $request->hard_price;
            $user->hard_page = $request->hard_page;
            $user->hard_isbn = $request->hard_isbn;
            $user->hard_weight = $request->hard_weight;
            $user->hard_ship = $request->hard_ship;
            if($request->hard_ship == 0){
                $user->hard_allow_preorders = $request->herd_allow_preorder;
                if($request->herd_allow_preorder == 1){
                    $user->hard_expected_shipment = $request->hard_shipment_date;
                }
            } else {
                $user->hard_allow_preorders = 0;
                $user->hard_expected_shipment = NULL;
            }
            $user->hard_stock = $request->hard_stock;
            $user->is_hardcover = 1;
        }
        if(isset($request->paperback) && !empty($request->paperback)){
            $user->paper_price = $request->paper_price;
            $user->paper_page = $request->paper_page;
            $user->paper_isbn = $request->paper_isbn;
            $user->paper_weight = $request->paper_weight;
            $user->paper_ship = $request->paper_ship;
            if($request->paper_ship == 0){
                $user->paper_allow_preorders = $request->paper_allow_preorder;
                if($request->paper_allow_preorder == 1){
                    $user->paper_expected_shipment = $request->paper_shipment_date;
                } else {
                    $user->paper_allow_preorders = 0;
                    $user->paper_expected_shipment = NULL;
                }
            }
            $user->paper_stock = $request->paper_stock;
            $user->is_paperback = 1;
        }
        if(isset($request->digital) && !empty($request->digital)){
            $user->digital_price = $request->digital_price;
            $user->digital_page = $request->digital_page;
            $user->digital_isbn = $request->digital_isbn;
            $user->is_digital = 1;
            if($request->epub != null){
                $UploadImage = 'd'.time().'.'.$request->epub->extension();
                $request->epub->move(public_path('images/books'), $UploadImage);
                $user->epub = 'images/books/'.$UploadImage;
            } else {
                unset($user->epub);
            }
        }
        if($user->save()){
            if(isset($request->extraFieldValue)){
                for($i = 0; $i < count($request->extraFieldValue); $i++){
                    if(!empty($request->extraFieldValue[$i])){
                        $field = new ExtraField;
                        $field->user_id = Auth::id();
                        $field->book_id = $user->id;
                        $field->label = $request->extraFieldLabel[$i];
                        $field->value = $request->extraFieldValue[$i];
                        $field->save();
                    }
                }
            }
            return back()->with('message', ['text'=>'Congratulations! Your book has be added. It will be published once approved by COWRIEHUB','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! There is something wring. Your book cannot be added','type'=>'danger']);
        }
    }
    public function delete_book($id){
        Book::where('id',$id)->delete();
        return back()->with('message', ['text'=>'Your book has be deleted.','type'=>'warning']);
    }
}
