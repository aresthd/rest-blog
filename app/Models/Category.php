<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // Method untuk menghubungkan model Post
    public function posts() {

        // Mereturn relasi dari model Category terhadap model Post
        return $this->hasMany(Post::class);     // Satu kategori bisa dimiliki banyak post

    }
    
}
