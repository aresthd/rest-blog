{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')


    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                {{-- Menerima data post yg dikirim dari PostController.php --}}
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                {{-- Menampilkan author / user dan kategori dari post yg ditampilkan --}}
                <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }} </a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                
                {{-- Apabila ada gambar di table post --}}
                @if ( $post->image )
                    <div style="max-height: 400px; overflow:hidden;">
                        {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                @else
                    {{-- Menampilkan gambar random dari unsplash --}}
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif
                
                {{-- Menampilkan body dari post yg ditampilkan --}}
                <article class="my-3 fs-6">
                    {!! $post->body !!}             {{-- {!! !!} ~> Berfungsi untuk menampilkan isi dari variabel dan apabila terdapat element html di dalamnya maka akan tetap dianggap sebagai element html --}}
                </article>

                <a href="/posts" class="d-block mt-5">Back to Posts</a>
                
            </div>
        </div>
    </div>

@endsection


