<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Memanggil library eloquent sluggable
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    use HasFactory;


    // Variabel untuk menyimpan attribute / field mana yg dapat diisi dengan menggunakan Post:create(), sisanya tidak dapat
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Variabel untuk menjaga attribute / field mana yg tidak dapat diisi dengan menggunakan Post:create(), sisanya dapat diisi
    protected $guarded = ['id'];

    // Variabel untuk menampung kolom yg ingin dilakukan eager loading
    protected $with = ['category', 'author'];
    

    // Method untuk menghubungkan model Category
    public function category() {

        // Mereturn relasi dari model Post terhadap model Category
        return $this->belongsTo(Category::class);

    }

    // Method untuk menghubungkan model User
    public function author() {

        // Mereturn relasi dari model Post terhadap model User
        return $this->belongsTo(User::class, 'user_id');        // Memanggil kolom user_id

    }


    // Method untuk melakukan filter pada tabel
    public function scopeFilter($query, array $filters) {

        // Apabila ada sesuatu yg ditulis di kolom search
        $query->when($filters['search'] ?? false, function($query, $search) {       // Melakukan pengecekan apakah ada search atau tidak di arry filters
            // Mencari data posts yg judulnya / body-nya sesuai dengan search
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
        }); 
        
        // Apabila melakukan search di suatu category 
        $query->when($filters['category'] ?? false, function($query, $category) {
            // Apabila query mempunyai relationship dengan category
            return $query->whereHas('category', function($query) use($category) {   // use($category) -> Dilakukan agar dapat memakai argument $category di atas
                $query->where('slug', $category);
            }); 
        });

        // Apabila melakukan search di suatu author 
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) => 
                // Apabila query mempunyai relationship dengan author
                $query->where('username', $author)
            )
        );
    }


    // Method untuk mengganti key dari tabel post
    public function getRouteKeyName()
    {
        return 'slug';      // defaultnya id diganti jadi slug
    }


    // Method untuk membuat slug secara otomatis
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    
}

