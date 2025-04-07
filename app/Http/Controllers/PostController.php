<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $keyword = $request->input('keyword'); // Get the keyword from the request

    // Initialize query
    $query = Post::query();

    // If a keyword is provided, perform exact match on the title first
    if ($keyword) {
        // Exact match for title
        $query->where('title', '=', $keyword);
    }

    // If no exact title match, fallback to searching by content
    if ($keyword && $query->count() === 0) {
        $query->where('content', 'like', '%' . $keyword . '%');
    }

    // Paginate the results (3 posts per page)
    $posts = $query->paginate(3);

    return view('posts.index', compact('posts', 'keyword')); // Return the view with posts and keyword
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create'); // Return the view for creating a new post
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all()); // Create a new post with the validated data
        return redirect()->route('posts.index') // redirect to index after creating post
            ->with('success', 'Post created successfully.'); // with() method adds a flash message to the session
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post')); // Return the view for showing a single post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Return the view for editing a post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all()); // Update the post with the validated data

        return redirect()->route('posts.index') // redirect to index after updating post
            ->with('success', 'Post updated successfully.'); // with() method adds a flash message to the session
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); // Delete the post

        return redirect()->route('posts.index') // redirect to index after deleting post
            ->with('success', 'Post deleted successfully.'); // with() method adds a flash message to the session
    }


}
