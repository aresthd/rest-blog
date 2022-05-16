{{-- Memanggil file view di views/dashboard/layouts/main.blade.php --}}
@extends('dashboard.layouts.main')

@section('container')
    {{-- Heading --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- Mengambil data user yg sudah login / authentication --}}
        <h1 class="h2">Create New Category</h1>

    </div>

    {{-- Form Create Category --}}
    <div class="col-lg-8">
        {{-- Form untuk menambah data post yg datanya akan dikirim ke route /dashboard/categories dengan metode post dan akan diterima oleh method store di controller DashboardPostControlller.php --}}
        <form method="POST" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">       {{-- enctype ~> Berfungsi agar dapat mengupload file --}}
            {{-- Mengirimkan token csrf agar tidak dibajak --}}
            @csrf
            {{-- Input untuk title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                {{-- Apabila terjadi error untuk input title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Input untuk slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required autofocus value="{{ old('slug') }}">
                {{-- Apabila terjadi error untuk input slug --}}
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Tombol submit --}}
            <button type="submit" class="btn btn-dark mt-2">Create Category</button>
        </form>
    </div>


    <script>
        // import fetch from "node-fetch";

        // Mengambil input title
        const title = document.querySelector('#title');
        // Mengambil input slug
        const slug = document.querySelector('#slug');

        // Apabila input title berubah
        title.addEventListener('change', function() {

            // console.log(title);
            // console.log(title.value);
            
            // Apabila ada request ke /dashboard/posts/checkSlug dan mengirim data title
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                // Mengambil isinya dan response-nya akan dijalankan ke dalam method json 
                .then(reponse => response.json())
                // Data-nya akan mengganti value dari slug
                .then(data => slug.value = data.slug)
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Menonaktifkan fitur upload file di trix editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

        // Function untuk menjalankan preview image
        function previewImage() {
            // Mengambil input image
            const image = document.querySelector('#image');

            // Mengambil image preview
            const imgPreview = document.querySelector('#image');

            // Mengubah display dari imgPreview menjadi block 
            imgPreview.style.display = 'block'

            // Mengambil url dari file input image
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                // Menambahkan attribute src dengan url dari input gambar
                imgPreview.src = oFREvent.target.result;
            }
            
        }

    </script>
    
@endsection

