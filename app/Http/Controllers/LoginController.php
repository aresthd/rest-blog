<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Memanggil library auth
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // Method untuk memanggil file view login/index.blade.php
    public function index() {
        return view('login.index', [
            'title' => 'Login',         // Akan mengirimkan data title ke file view dan disimpan sebagai variabel title
            'active' => 'login'         // Akan mengirimkan active ke file view dan disimpan sebagai variabel active
        ]);
    }


    // Method untuk melakukan authentication
    public function authenticate(Request $request) {

        // Melakukan validasi untuk email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Apabila validasinya berhasil
        if ( Auth::attempt($credentials) ) {
            
            // Meregenerate session untuk menghindari sebuah teknik hacking session fixation
            $request->session()->regenerate();

            // Meredirect url ke /dashboard
            return redirect()->intended('/dashboard');
        }

        // Apabila validasinya gagal maka mereturn ke halaman login kembali dan mengirimkan pesan error
        return back()->with('loginError', 'Login failed!');
    }


    // Method untuk melakukan logout
    public function logout() {
        // Memanggil method logout di library Auth
        Auth::logout();
 
        // Meng-expired session
        request()->session()->invalidate();
    
        // Membuat session yg baru
        request()->session()->regenerateToken();
    
        // Meredirect url ke halaman home atau /
        return redirect('/');
    }
    
}
