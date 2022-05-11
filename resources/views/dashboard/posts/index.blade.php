{{-- Memanggil file view di views/dashboard/layouts/main.blade.php --}}
@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- Mengambil data user yg sudah login / authentication --}}
        <h1 class="h2">My Posts</h1>
    </div>

    {{-- Menampilkan flash message ketika berhasil menambahkan data post --}}
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive col-lg-8">
        {{-- Tombol untuk menambah data post --}}
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-striped table-sm">
          <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name}}</td>
                    <td>
                        {{-- Tombol untuk melihat detail dari post yang mengirimkan data slug dari post lewat url --}}
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>

                        {{-- Tombol untuk mengedit data post yg datanya akan dikirim ke controller DashboardPostController.php dan mengirim slug lewat url  --}}
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                
                        {{-- Form untuk menghapus post yg datanya akan dikirim ke controller DashboardPostController.php --}}
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                            {{-- Mengubah method dari form dari post menjadi delete --}}
                            @method('delete')
                            {{-- Mengirimkan token csrf agar tidak dibajak --}}
                            @csrf
                            {{-- Tombol untuk menghapus post --}}
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection

