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
        $fields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $post = Post::create($fields);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    // CHANGE: Use $id instead of Post $post
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    // CHANGE: Use $id instead of Post $id
    public function update(Request $request, $id)
    {
        // 1. Find the post manually using the ID
        $post = Post::findOrFail($id);

        // 2. Validate
        $fields = $request->validate([
            'title' => 'string',
            'body' => 'string',
        ]);

        // 3. Update
        $post->update($fields);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    // CHANGE: Use $id instead of Post $post
    public function destroy($id)
    {
        // 1. Find the post manually
        $post = Post::findOrFail($id);
        
        // 2. Delete it
        $post->delete();
        
        return response()->json(['message' => 'Post deleted']);
    }
}