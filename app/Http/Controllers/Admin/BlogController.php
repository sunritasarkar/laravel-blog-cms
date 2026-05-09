<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $blogs = Blog::latest()->get();

    return view('admin.blogs.index', compact('blogs'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'slug' => 'required|unique:blogs',

            'category_id' => 'required',

            'short_description' => 'required',

            'content' => 'required',

            'image' => 'required|image',

            'published_at' => 'required',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads'), $imageName);

        Blog::create([

            'title' => $request->title,

            'slug' => $request->slug,

            'category_id' => $request->category_id,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'image' => $imageName,

            'published_at' => $request->published_at,

        ]);

        return redirect('/admin/blogs')
                ->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $blog = Blog::findOrFail($id);

    return view('admin.blogs.show', compact('blog'));
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $blog = Blog::findOrFail($id);

    $categories = Category::all();

    return view('admin.blogs.edit',
        compact('blog', 'categories'));
}
    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $blog = Blog::findOrFail($id);

    $data = [

        'title' => $request->title,

        'slug' => $request->slug,

        'category_id' => $request->category_id,

        'short_description' => $request->short_description,

        'content' => $request->content,

        'published_at' => $request->published_at,

    ];

    if($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );

        $data['image'] = $imageName;
    }

    $blog->update($data);

    return redirect('/admin/blogs')
            ->with('success',
                'Blog Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $blog = Blog::findOrFail($id);

    $blog->delete();

    return redirect('/admin/blogs')
            ->with('success', 'Blog Deleted Successfully');
}
}