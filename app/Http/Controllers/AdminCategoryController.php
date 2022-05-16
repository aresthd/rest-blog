<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // Mengecek apakah termasuk gate admin
        // $this->authorize('admin');
        
        // Memanggil file view dashboard/categories/index.blade.php dan mengirim data categories
        return view('dashboard.categories.index', [
            'categories' => Category::all()        // Mengambil semua data category 
        ]);    

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Method untuk menampilkan halaman tambah category
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()        // Mengambil semua data category 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Method untuk menjalankan fungsi tambah category
    public function store(Request $request)
    {
        // Melakukan validasi data untuk setiap data request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);
        
        // Memasukkan data post ke tabel categories 
        Category::create($validatedData);
        
        // Mengirim flash message dan meredirect url ke halaman /dashboard/categories
        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
