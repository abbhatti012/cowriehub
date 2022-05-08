<?php

namespace App\Models;

use App\Models\SubGenre;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function subgenres(){
        return $this->hasMany(SubGenre::class, 'genre_id', 'id');
    }
}
