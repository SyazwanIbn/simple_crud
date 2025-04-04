{{-- file ini untuk appearkan semua post dalam db --}}

@extends('layouts.app') <!-- Extend layout utama -->

@section('title', 'All Posts') <!-- Set tajuk page jika perlu -->

@section('content') <!-- Mulakan section untuk content -->

<h1>All Post</h1>
<a href="{{ route('posts.create') }}">Create New Post</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
    @foreach ($posts as $post)
        <li>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post->id) }}">View</a>
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

@endsection <!-- Tutup section content -->


