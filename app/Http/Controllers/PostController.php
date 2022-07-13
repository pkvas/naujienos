<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function index()
    {
        $posts = Post::get();
        return view('posts.index',compact('posts'));
    }

    public function index_dashboard()
    {
        $posts = Post::get();
        return view('dashboard.posts.index',compact('posts'));
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'categories'    => Categories::all(),
        ]);
    }

    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories     = Categories::all();
        $oldCategories  = $post->categories->pluck('id')->toArray();

        return view('dashboard.posts.edit', compact('post',  'categories', 'oldCategories'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->title);
        $post->content          = $request->body;
        $post->author_id        = Auth::user()->id;
        $post->meta             = $request->meta_description;

        $post->save();
        $post->categories()->sync($request->categories);

        return redirect()->route('control_posts.index')->with('success', 'Įrašas sėkmingai atnaujintas!');
    }

    public function store(StorePostRequest $request)
    {
        $post                   = new Post;
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->title);
        $post->content          = $request->body;
        $post->meta             = $request->meta_description;
        $post->author_id        = Auth::user()->id;

        $post->save();
        $post->categories()->sync($request->categories);

        return redirect()->route('control_posts.index')->with('success', 'Įrašas sukurtas!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('control_posts.index')->with('success', 'Įrašas panaikintas!');
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show',compact('post'));
    }
}
