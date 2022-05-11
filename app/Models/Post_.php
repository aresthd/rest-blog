<?php

namespace App\Models;


// Model Post sebelumnya
class Post
{
    // Semua data post
    private static $blog_posts = [
        [
            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Arieska Restu',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A ullam repellat praesentium accusantium aspernatur! Commodi illum odio cum deserunt. Magnam, dolorem sunt. Quasi voluptate recusandae ipsa ea reiciendis, distinctio architecto harum facilis sit debitis ullam reprehenderit, nesciunt nam! Dolor eaque neque, delectus iure mollitia esse odit officiis. Quibusdam dolore tempora inventore ex dolorem mollitia quis corrupti, facilis sed incidunt dolores id reprehenderit amet, vero omnis libero nisi molestiae cum beatae ab earum, et provident temporibus? Omnis rem exercitationem mollitia necessitatibus?'
        ],
        [
            'title' => 'Judul Post Kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Evory Restu',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis aut, dolor repellat explicabo delectus assumenda est eum commodi similique reprehenderit cum blanditiis non magni cupiditate ducimus beatae recusandae doloremque maxime praesentium pariatur consequuntur asperiores totam maiores? Earum ducimus dolores nulla praesentium molestiae, inventore aperiam autem soluta accusamus pariatur? Maxime eveniet enim quo debitis. Quaerat, beatae. Quibusdam quae rem atque excepturi, minus aperiam repellat possimus fugiat. Tenetur accusamus necessitatibus delectus harum tempore. Laboriosam, deleniti maiores harum eius odio saepe quod vel! Quod hic rem aliquam culpa deserunt harum molestiae ad dignissimos unde. Ut odit esse minima explicabo corporis sunt voluptatum quidem?'
        ]
    ];


    // Method untuk mengambil semua data post
    public static function all() {

        // Mereturn semua data post dan dibuat menjadi collect()
        return collect(self::$blog_posts);       // Karena property dari $blog_posts static, maka menggunakan self:: untuk memanggilnya

    }


    // Method untuk mencari post berdasarkan slug-nya
    public static function find($slug) {

        // Memanggil semua data post
        $posts = static::all();         // Menggunakan static:: karna method all() memiliki property static

        /*
        // Array kosong untuk menampung post yg dicari
        $post = [];          
        
        // Melakukan looping untuk setiap post
        foreach ($posts as $p) {            
            
            // Jika slug dari parameter sama seperti slug di suatu post
            if ( $p['slug'] === $slug ) {   

                // Menaruh post yg dicari di varibel $post
                $post = $p;                 
            }
        }

        // Mereturn post yg dicari berdasarkan slug-nya
        return $post;
        */

        // Mereturn post yg dicari berdasarkan slug-nya dengan menggunakan method firstWhere() dari collect()
        return $posts->firstWhere('slug', $slug);
    }



    
}
