<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    //  Method untuk menampilkan semua data post berdasarkan user tertentu
    public function index()
    {   
        // Memanggil file view dashboard/posts/index.blade.php dan mengirim data posts
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()        // Mengambil data posts berdasarkan id user yang sudah login
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */

    //  Method untuk menampilkan halaman tambah post
    public function create()
    {
        // Memanggil file view dashboard/posts/create.blade.php
        return view('dashboard.posts.create', [
            'categories' => Category::all()     // Mengirimkan data categories
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    // Method untuk menjalankan fungsi tambah post
    public function store(Request $request)
    {
        
        // Melakukan validasi data untuk setiap data request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',       // max size dengan satuan KB
            'body' => 'required'
        ]);

        // Jika user memasukkan gambar
        if ( $request->file('image') ) {
            // Menambahkan data gambar ke variabel validatedData dengan mengambil nama gambar dan menyimpannya di folder post-images
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // Menambahkan data id user ke variabel validatedData dengan mengambil dari auth()
        $validatedData['user_id'] = auth()->user()->id;

        // Menambahkan data excerpt ke variabel validatedData dengan mengambil 200 kata dari body
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);        // strip_tags() ~> Berfungsi untuk menghilangkan tag-tag html
        
        // Memasukkan data post ke tabel post 
        Post::create($validatedData);

        // Mengirim flash message dan meredirect url ke halaman /dashboard/posts
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */

    // Method untuk menampilkan detail dari post
    public function show(Post $post)
    {
        // Memanggil file view dashboard/posts/show.blade.php dan mengirim data post
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */

    // Method untuk menampilkan ubah data post
    public function edit(Post $post)
    {
        // Memanggil file view dashboard/posts/edit.blade.php
        return view('dashboard.posts.edit', [
            'post' => $post,                    // Mengirimkan data post
            'categories' => Category::all()     // Mengirimkan data categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */
    
    // Method untuk memproses perubahan data post
    public function update(Request $request, Post $post)
    {
        // Menyatakan aturan-aturan untuk data request yg baru
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',       // max size dengan satuan KB
            'body' => 'required'
        ];

        // Apabila slug yg baru dari variabel $request berbeda dengan slug yg lama dari variabel $post
        if ( $request->slug != $post->slug ) {
            $rules['slug'] = 'required|unique:posts';
        }

        // Melakukan validasi data untuk setiap data request agar sesuai dengan rules
        $validatedData = $request->validate($rules);

        // Jika user memasukkan gambar baru
        if ( $request->file('image') ) {

            // Jika sebelumnya sudah ada gambar
            if ( $request->oldImage ) {
                // Mengahapus data image lama
                Storage::delete($request->oldImage);        
            }

            // Menambahkan data gambar ke variabel validatedData dengan mengambil nama gambar dan menyimpannya di folder post-images
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // Menambahkan data id user ke variabel validatedData dengan mengambil dari auth()
        $validatedData['user_id'] = auth()->user()->id;

        // Menambahkan data excerpt ke variabel validatedData dengan mengambil 200 kata dari body
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);        // strip_tags() ~> Berfungsi untuk menghilangkan tag-tag html
        
        // Mengupdate data post di tabel post berdasarkan id tertentu
        Post::where('id', $post->id)->update($validatedData);

        // Mengirim flash message dan meredirect url ke halaman /dashboard/posts
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
        
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */

    // Method untuk menghapus data post
    public function destroy(Post $post)
    {
        // Jika sebelumnya sudah ada gambar
        if ( $post->image ) {
            // Mengahapus data image
            Storage::delete($post->image);        
        }
        
        // Menghapus data post berdasarkan id tertentu
        Post::destroy($post->id);

        // Mengirim flash message dan meredirect url ke halaman /dashboard/posts
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
        
    }


    // Method untuk menangani ketika ada perminataan slug
    public function checkSlug(Request $request) {

        // Membuat slug dari title yg diambil dari request url
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        // Mereturn slug sebagai response dalam bentuk json
        return response()->json(['slug' => $slug]);
        
    }


    
    
}
