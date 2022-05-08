<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubGenre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SubGenreController extends Controller
{
    public function store(Request $request, $param)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $insert = [
            'slug' => SlugService::createSlug(SubGenre::class, 'slug', $request->title),
            'title' => $request->title,
            'genre_id' => $request->genre
        ];
        if($param == 'add'){
            SubGenre::insertGetId($insert);
            return back()->with('message', ['text'=>'Congratulations! genre added successfully','type'=>'success']);
        } else if($param == 'update'){
            SubGenre::where('id',$request->id)->update($insert);
            return redirect(route('admin.sub-genre'))->with('message', ['text'=>'Congratulations! genre updated successfully','type'=>'success']);
        }
    }
    public function delete($id){
        SubGenre::where('id',$id)->delete();
        return redirect(route('admin.sub-genre'))->with('message', ['text'=>'Genre deleted successfully!','type'=>'danger']);
    }
}
