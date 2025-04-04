{{-- file ni untuk edit post --}}

@extends('layouts.app') <!-- Extend layout utama -->

@section('title', 'Edit Post') <!-- Set title page kepada 'Edit Post' -->

@section('content') <!-- Mulakan section untuk content -->

    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Gunakan PUT method untuk update data -->

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required><br><br>

        <label for="content">Content:</label>
        <textarea name="content" id="content" required>{{ $post->content }}</textarea><br><br>

        <button type="submit">Update Post</button>
        <a href="{{ route('posts.index') }}">Back to Posts</a>
    </form>

@endsection <!-- Tutup section content -->

