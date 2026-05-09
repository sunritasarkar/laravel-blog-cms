<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\Admin\BlogController;

Route::get('/', function (Request $request) {

    $categories = Category::all();

    $blogs = Blog::with('category');

    if($request->category) {

        $blogs->where('category_id', $request->category);

    }

    $blogs = $blogs->latest()->get();

    if($request->ajax()) {

        return view('partials.blogs', compact('blogs'))->render();

    }

    return view('home', compact('blogs', 'categories'));

});

Route::get('/blog/{id}', function($id){

    $blog = Blog::findOrFail($id);

    return view('blog-details', compact('blog'));

})->name('blogs.show');

Route::resource('/admin/blogs', BlogController::class);