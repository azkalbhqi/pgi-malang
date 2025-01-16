<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function index(Request $request)
{
    // Start with the base query including relationships
    $query = Blog::with('category', 'user');

    // Filter by category if provided
    if ($request->has('category_id') && !empty($request->category_id)) {
        $query->where('category_id', $request->category_id);
    }


    // Get the blogs with pagination
    $blogs = $query->paginate(10);

    // Get all categories and authors for the filter dropdowns
    $categories = Category::all();
    $authors = User::all();

    //pagination
    $blogs = $query->paginate(2);

    return view('Pages.Blog.blogs', compact('blogs', 'categories', 'authors'));
}

    public function show(Blog $blog)
    {
        return view('Pages.Blog.blog', [
            'blog' => $blog,
        ]);
    }

    // public function showLatest(){
    //     $latestBlogs = Blog::with('category', 'user')->latest()->take(2)->get();

    //     // dd($latestBlogs);

    //     return view('welcome', compact('latestBlogs'));
    // }
    
}
