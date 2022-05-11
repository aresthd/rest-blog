<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Memanggil class Hash
use Illuminate\Support\Facades\Hash;

// Memanggil model User.php
use App\Models\User;

class RegisterController extends Controller
{
    // Method untuk memanggil file view register/index.blade.php
    public function index() {
        return view('register.index', [
            'title' => 'Register',         // Akan mengirimkan data title ke file view dan disimpan sebagai variabel title
            'active' => 'register'         // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
        ]);
    }


    // Method untuk menyimpan data register yg dikirim dari route dengan metode post
    public function store(Request $request) {       // $request -> Variabel untuk menampung data-data yg dikirim dengan metode post

        // Melakukan validation untuk setiap data request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Melakukan enkripsi pada password
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);        // Sama-sama menggunakan bcrypt()

        // Memasukkan data register ke tabel user 
        User::create($validatedData);

        /*
        // Mengirim flash message
        $request->session()->flash('success', 'Registration successfull! Please login');
        
        // Meredirect url ke halaman login
        return redirect('/login');
        */

        // Mengirim flash message dan meredirect url ke halaman login
        return redirect('/login')->with('success', 'Registration successfull! Please login');

    }

    
}
