<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class GenreController extends Controller
{
    public function store(Request $request, $param)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $insert = [
            'slug' => SlugService::createSlug(Genre::class, 'slug', $request->title),
            'title' => $request->title
        ];
        if($param == 'add'){
            Genre::insertGetId($insert);
            return back()->with('message', ['text'=>'Congratulations! genre added successfully','type'=>'success']);
        } else if($param == 'update'){
            Genre::where('id',$request->id)->update($insert);
            return redirect(route('admin.genre'))->with('message', ['text'=>'Congratulations! genre updated successfully','type'=>'success']);
        }
    }
    public function delete($id){
        Genre::where('id',$id)->delete();
        return redirect(route('admin.genre'))->with('message', ['text'=>'Genre deleted successfully!','type'=>'danger']);
    }
}
