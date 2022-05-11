{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')     

    {{-- Menerima data dari yg dikirim dari PostController.php --}}
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            {{-- Data dari form-nya akan dikirim ke url di halaman posts --}}
            <form action="/posts" method="get">
                {{-- Apabila telah memilih suatu category --}}
                @if (request('category'))
                    {{-- Melakukan input category --}}
                    <input type="hidden" name='category' value="{{ request('category') }}">
                @endif
                {{-- Apabila telah memilih suatu author --}}
                @if (request('author'))
                    {{-- Melakukan input author --}}
                    <input type="hidden" name='author' value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    {{-- Melakukan input search --}}
                    <input type="text" class="form-control" placeholder="Search.." name="search"  value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Mengecek apakah ada posts atau tidak --}}
    @if  ( $posts->count() )
        <div class="card mb-3 text-center">
            {{-- Apabila ada gambar di table post --}}
            @if ( $posts[0]->image )
                <div style="max-height: 400px; overflow:hidden;">
                    {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                </div>
            @else
                {{-- Menampilkan gambar random dari unsplash --}}
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more<a>     
            </div>
        </div>
    
    
        <div class="container">
            {{-- Melakukan looping untuk setiap posts yg ada --}}
            <div class="row">
                {{-- Menskip data post pertama --}}
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            {{-- Menampilkan kategori dari post yg ditampilkan --}}
                            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, .7)">
                                <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                            </div>
                            
                            {{-- Apabila ada gambar di table post --}}
                            @if ( $post->image )
                                {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                            @else
                                {{-- Menampilkan gambar random dari unsplash --}}
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            
                            <div class="card-body">
                                {{-- Mengirim slug dari suatu post melalui url --}}
                                <h5 class="card-title">{{ $post->title }}</h5>

                                {{-- Menampilkan author / user post yg ditampilkan --}}
                                <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a></p>

                                {{-- Menampilkan excerpt dari post yg ditampilkan --}}
                                <p class="card-text">{{ $post->excerpt }}</p>

                                {{-- Link untuk menuju single post dari suatu post tertentu --}}
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    {{-- Apabila post-nya tidak ada --}}
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{-- Menampilkan halaman pagination --}}
        {{ $posts->links() }}
    </div>

    
@endsection