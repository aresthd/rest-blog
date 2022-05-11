<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Memanggil model Post.php
use App\Models\Post;

// Memanggil model Category.php
use App\Models\Category;

// Memanggil model User.php
use App\Models\User;


class PostController extends Controller
{
    // Method untuk memanggil file view posts.blade.php
    public function index() {

        // Variabel untuk menampung judul
        $title = '';

        // Apabila di url terdapat category
        if( request('category') ) {
            // Mengambil nama category dari url
            $category = Category::firstWhere('slug', request('category'));
            
            // Menambahkan nama category di variabel judul
            $title = ' in ' . $category->name;
        }

        // Apabila di url terdapat author
        if( request('author') ) {
            // Mengambil nama author dari url
            $author = User::firstWhere('username', request('author'));

            // Menambahkan nama author di variabel judul
            $title = ' by ' . $author->name;
        }
        
        return view('posts', [                      // Akan memanggil file view home.blade.php di folder resources/views
            "title" => 'All Posts' . $title,        // Akan mengirimkan data title ke file view dan disimpan sebagai variabel title
            // 'posts' => Post::all()               // Mengambil semua data post dari model Post.php lalu mengirimkannya ke file view dan disimpan sebagai variabel posts
            'active' => 'posts',                    // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
            
            // Melakukan eager loading untuk kolom author dan category di tabel posts
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))       // Mengambil semua data post terbaru dan memfilternya sesuai dengan search dari model Post.php lalu mengirimkannya ke file view dan disimpan sebagai variabel posts
            ->paginate(7)           // Melakukan pagination dan untuk setiap halaman akan diambil 7 data posts
            ->withQueryString()     // Membawa apapun yg telah ditulis di url    
        ]); 
    }


    // Method untuk menampilkan single post 
    public function show(Post $post) {      // Menerima data instance Post yg dikirim lewat url
        return view('post', [
            'title' => 'Single Post',       // Akan mengirimkan data title ke file view dan disimpan sebagai variabel title
            'active' => 'posts',            // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
            'post' => $post                 // Mengirimkan data post ke file view dan disimpan sebagai variabel post
        ]);
    }
}
