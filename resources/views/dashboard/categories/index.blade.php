{{-- Memanggil file view di views/dashboard/layouts/main.blade.php --}}
@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- Mengambil data user yg sudah login / authentication --}}
        <h1 class="h2">Post Categories</h1>
    </div>

    {{-- Menampilkan flash message ketika berhasil menambahkan data category --}}
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive col-lg-6">
        {{-- Tombol untuk menambah data category --}}
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
        <table class="table table-striped table-sm">
          <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
          </thead>
          <tbody>
              @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        {{-- Tombol untuk melihat detail dari category yang mengirimkan data slug dari category lewat url --}}
                        <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>

                        {{-- Tombol untuk mengedit data category yg datanya akan dikirim ke controller AdminCategoryController.php dan mengirim slug lewat url  --}}
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                
                        {{-- Form untuk menghapus category yg datanya akan dikirim ke controller AdminCategoryController.php --}}
                        <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                            {{-- Mengubah method dari form dari POST menjadi delete --}}
                            @method('delete')
                            {{-- Mengirimkan token csrf agar tidak dibajak --}}
                            @csrf
                            {{-- Tombol untuk menghapus category --}}
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection
