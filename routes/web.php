<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use App\Models\Blog;
use App\Models\Gallery;



Route::get('/', [HomeController::class, 'showLatest'])->name('showLatest');


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/gallery/{event}', [GalleryController::class, 'showEvent'])->name('gallery.event');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index'); // List all categories

