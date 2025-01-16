<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'body','image'];

    protected static function booted()
{
    static::creating(function ($blog) {
        $blog->author_id = auth('web')->id(); // Set the current authenticated user as the author
    });
}

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id'); // Make sure 'author_id' matches the column in the blogs table
    }
}
