<?php

use Illuminate\Support\Facades\Route;

// Memanggil model Post.php
use App\Models\Post;

// Memanggil model Category
use App\Models\Category;

// Memanggil model User
use App\Models\User;

// Memanggil controller PostController.php
use App\Http\Controllers\PostController;


// Memanggil controller LoginController.php
use App\Http\Controllers\LoginController;

// Memanggil controller RegisterController.php
use App\Http\Controllers\RegisterController;

// Memanggil controller DashboardPostController.php
use App\Http\Controllers\DashboardPostController;

// Memanggil controller AdminCategoryController.php
use App\Http\Controllers\AdminCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk halaman home
Route::get('/', function () {
    return view('home', [           // Akan memanggil file view home.blade.php di folder resources/views
        "title" => 'Home',          // Akan mengirimkan data ke file view dan disimpan sebagai variabel title
        'active' => 'home'          // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
    ]); 
});


// Route untuk halaman about
Route::get('/about', function () {
    return view('about', [                          // Akan memanggil file view about.blade.php di folder resources/views
        "title" => 'About',                         // Akan mengirimkan data ke file view dan disimpan sebagai variabel title
        'active' => 'about',                        // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
        "name" => "Arieska Restu",                  // Akan mengirimkan data ke file view dan disimpan sebagai variabel name
        "email" => "arieskarestu214@gmail.com",     // Akan mengirimkan data ke file view dan disimpan sebagai variabel email
        "image" => 'ice.jpg'                        // Akan mengirimkan data ke file view dan disimpan sebagai variabel image
    ]);           
});


// Memanggil method index di controller PostController apabila url-nya /posts
Route::get('/posts', [PostController::class, 'index']);


// Memanggil method show di controller PostController apabila url-nya /posts/slug dan mengirimkan satu instance penuh dari salah satu post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// Route untuk halaman categories apabila url-nya /categories
Route::get('/categories', function (Category $category) {

    // Akan memanggil file view category.blade.php di folder resources/views
    return view('categories', [           
        "title" => 'Post Categories',           // Mengirimkan data title ke file view dan disimpan sebagai variabel title
        'active' => 'categories',               // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
        'categories' => Category::all()         // Mengirimkan semua data post dari setiap category dan disimpan sebagai variabel categories
    ]); 
    
});


/*


// Route untuk halaman category apabila url-nya /categories/slug dan mengirimkan satu instance penuh dari salah satu category
Route::get('/categories/{category:slug}', function (Category $category) {

    // Akan memanggil file view posts.blade.php di folder resources/views
    return view('posts', [           
        "title" => "Post by Category : $category->name",            // Mengirimkan data title ke file view dan disimpan sebagai variabel title
        'active' => 'categories',                                   // Akan mengirimkan active ke file view dan disimpan sebagai variabel active

        // Melakukan lazy eager loading untuk kolom category dan author di tabel posts
        'posts' => $category->posts->load('category', 'author')     // Mengirimkan semua data post yg memiliki category yg sama seperti di url dan disimpan sebagai variabel posts  
    ]); 
    
});


// Route untuk halaman authors apabila url-nya /author/{user:username} dan mengirimkan satu instance penuh dari salah satu user
Route::get('/authors/{author:username}', function(User $author) {

    // Akan memanggil file view posts.blade.php di folder resources/views
    return view('posts', [           
        "title" => "Post by Author : $author->name",                    // Mengirimkan data title ke file view dan disimpan sebagai variabel title
        'active' => 'posts',                                            // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
        // Melakukan lazy eager loading untuk kolom category dan author di tabel posts
        'posts' => $author->posts->load('category', 'author')            // Mengirimkan semua data post yg memiliki author / user yg sama seperti username dari user di url dan disimpan sebagai variabel posts  
    ]); 
    
});


*/


// Memanggil method index di controller LoginController apabila url-nya /login dan belum melakukan authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');    // name('login') -> Nama untuk route

// Memanggil method authenticate di controller LoginController apabila ada request yg dikirim ke /login dengan metode post
Route::post('/login', [LoginController::class, 'authenticate']);

// Memanggil method logout di controller LoginController apabila ada request yg dikirim ke /logout dengan metode post
Route::post('/logout', [LoginController::class, 'logout']);

// Memanggil method index di controller RegisterController apabila url-nya /register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Memanggil method store di controller RegisterController apabila ada request yg dikirim ke /register dengan metode post
Route::post('/register', [RegisterController::class, 'store']);

// Memanggil file view dashboard/index.blade.php apabila url-nya /dashboard dan sudah melakukan authentication
Route::get('/dashboard', function() {
    return  view('dashboard.index');
})->middleware('auth');

// Memanggil method checkSlug di controller DashboadPostController apabila /dashboard/posts/checkSlug dan sudah melakukan authentication
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Memanggil controller resource DashboardPostController.php apabila url-nya /dashboard/posts dan sudah melakukan authentication
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Memanggil controller resource AdminCategoryController.php apabila url-nya /dashboard/categories dan user yg login merupakan admin
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');       // Method show tidak akan bisa diakses

// // Memanggil controller resource AdminCategoryController.php apabila url-nya /dashboard/categories
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');       // Method show tidak akan bisa diakses



