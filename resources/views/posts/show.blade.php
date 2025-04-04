{{-- file ni untuk paparkan post secara individu --}}

@extends('layouts.app') <!-- Extend layout utama -->

@section('title', $post->title) <!-- Set title page kepada tajuk post -->

@section('content') <!-- Start section untuk content -->

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}">Back to Posts</a>

@endsection <!-- End section content -->

