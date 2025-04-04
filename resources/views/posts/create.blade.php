{{-- file ni untuk create post dalan form --}}

@extends('layouts.app') <!-- Extend the main layout file -->

@section('title', 'Create New Post') <!-- Set the title for this page -->

@section('content')
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        <!-- Form to create a new post -->
        <!-- The action points to the store method in the PostController -->
        <!-- The method is POST as we are creating a new resource -->
        <!-- The route is named 'posts.store' -->

        @csrf <!-- The CSRF token is included for security -->

        <div class=mb-3>
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class=mb-3>
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" name="content" id="content" rows=3 required></textarea>
        </div>

        <button type="submit">Create Post</button>
        <a href="{{ route('posts.index') }}">Back to Posts</a>
    </form>
</html>
