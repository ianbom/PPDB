<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(){
        return Inertia::render('Index', [
            'posts' => Post::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(Request $request)
    {

        Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
    }

    public function edit(Post $post)
    {
        return Inertia::render('Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return Inertia::render('Show', [
            'post' => $post
        ]);
    }

}
