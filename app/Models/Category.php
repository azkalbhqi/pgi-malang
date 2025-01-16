<?php

namespace App\Models;
use App\Models\Blog;
use App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['category'];

    public function blog(){
        return $this->hasMany(Blog::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}

