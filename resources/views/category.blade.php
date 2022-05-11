{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')       

    {{-- Menampilkan category yg dipilih --}}
    <h1 class="mb-5">Post Categories : {{ $category }}</h1>

    {{-- Melakukan looping untuk setiap posts yg diterima dari route web --}}
    @foreach ($posts as $post)
        <article class="mb-4">
            <h2>
                {{-- Mengirim slug dari suatu post melalui url --}}
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>     
            </h2>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
    
@endsection