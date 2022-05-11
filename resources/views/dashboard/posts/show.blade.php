{{-- Memanggil file view di views/dashboard/layouts/main.blade.php --}}
@extends('dashboard.layouts.main')


@section('container')
    
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                {{-- Menerima data post yg dikirim dari DashboardPostController.php --}}
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                {{-- Tombol untuk melihat semua posts yang mengakses url dashboard/posts --}}
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
                
                {{-- Tombol untuk mengedit data post yg datanya akan dikirim ke controller DashboardPostController.php dan mengirim slug lewat url  --}}
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                
                {{-- Form untuk menghapus post yg datanya akan dikirim ke controller DashboardPostController.php --}}
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    {{-- Mengubah method dari form dari post menjadi delete --}}
                    @method('delete')
                    {{-- Mengirimkan token csrf agar tidak dibajak --}}
                    @csrf
                    {{-- Tombol untuk menghapus post --}}
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                
                {{-- Apabila ada gambar di table post --}}
                @if ( $post->image )
                    <div style="max-height: 400px; overflow:hidden;">
                        {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                @else
                    {{-- Menampilkan gambar random dari unsplash --}}
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif

                {{-- Menampilkan body dari post yg ditampilkan --}}
                <article class="my-3 fs-6">
                    {!! $post->body !!}             {{-- {!! !!} ~> Berfungsi untuk menampilkan isi dari variabel dan apabila terdapat element html di dalamnya maka akan tetap dianggap sebagai element html --}}
                </article>

            </div>
        </div>
    </div>

@endsection



