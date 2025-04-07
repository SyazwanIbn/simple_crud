{{-- file ini untuk appearkan semua post dalam db --}}

@extends('layouts.app') <!-- Extend layout utama -->

@section('title', 'All Posts') <!-- Set tajuk page jika perlu -->

@section('content') <!-- Mulakan section untuk content -->

<div class="max-w-4xl mx-auto p-4">
    <div class="bg-blue-800 text-white py-4 text-center">
        <h1 class="text-2xl md:text-4xl font-bold">All Posts</h1>
    </div>

    <div class="max-w-4xl mx-auto p-4">
        <a href="{{ route('posts.create') }}" class="text-blue-800">Create New Post</a>
    </div>

    @if (session('success'))
        <div class="bg-green-500">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="max-w-4xl mx-auto p-4 mb-4">
        <form action="{{ route('posts.index')}}" method="GET" class="flex space-x-4">
            <input type="text" name="search" placeholder="Cari tajuk post..."
            value="{{ request('search')  }}"
            class="border rounded px-3 py-2 w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>

        </form>

    </div>

    <div class="max-w-4xl mx-auto p-4">
    <ul class="space-y-6">
        @foreach ($posts as $post)
            <li class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div>

    {{-- Pagination --}}
    <div class="max-w-4xl mx-auto p-4">
    {{ $posts->appends(['search' => request('search')])->links() }}
    </div>
</div>

{{-- Jika tiada post --}}

@endsection <!-- Tutup section content -->


