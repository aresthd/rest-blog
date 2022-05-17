<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Memanggil model Post.php
use App\Models\Post;

// Memanggil model Category.php
use App\Models\Category;

// Memanggil model User.php
use App\Models\User;


class HomeController extends Controller
{
    //
    public function index() {
        return view('home', [           // Akan memanggil file view home.blade.php di folder resources/views
            "title" => 'Home',          // Akan mengirimkan data ke file view dan disimpan sebagai variabel title
            'active' => 'home',         // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
            
            'heroPosts' => Post::inRandomOrder()->take(3)->get(),        // Mengirimkan 3 data post random
            'lastestPosts' => Post::latest()->limit(3)->get(),           // Mengirimkan 3 data post terakhir
            
            // Melakukan eager loading untuk kolom author dan category di tabel posts
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))       // Mengambil semua data post terbaru dan memfilternya sesuai dengan search dari model Post.php lalu mengirimkannya ke file view dan disimpan sebagai variabel posts
            ->paginate(7)           // Melakukan pagination dan untuk setiap halaman akan diambil 7 data posts
            ->withQueryString()     // Membawa apapun yg telah ditulis di url    
        ]); 
    }


}
