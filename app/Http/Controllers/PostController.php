<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $fields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        // Create and return the post
        $post = Post::create($fields);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $id)
    {
        $post = Post::findOrFail($id);

        $fields = $request->validate([
            'title' => 'string',
            'body' => 'string',
        ]);

        $post->update($fields);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return response()->json(['message' => 'Post deleted']);
    }
}
