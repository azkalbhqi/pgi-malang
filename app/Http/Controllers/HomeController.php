<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Blog;

class HomeController extends Controller
{
    //
    public function showLatest()
{
    $latestBlogs = Blog::latest()->take(2)->get();
    $latestImages = Gallery::latest()->take(4)->get();
    
    return view('welcome', compact('latestBlogs', 'latestImages'));
}

}
