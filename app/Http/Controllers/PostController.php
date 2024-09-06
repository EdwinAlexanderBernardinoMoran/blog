<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('user')->get();
        return response()->json($posts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20|string|unique:posts,title',
            'body' => 'required|max:200'
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Post creado'], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:200'
        ]);

        $post->update($request->all());

        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['message' => 'Post Eliminado'],Response::HTTP_NO_CONTENT);
    }
}
