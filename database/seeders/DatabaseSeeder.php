<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Memanggil model Post
use App\Models\Post;

// Memanggil model User
use App\Models\User;

// Memanggil model Category
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Mengisi tabel user untuk data pertama
        User::create([
            'name' => 'Arieska Restu',
            'username' => 'AcilRestu12',
            'email' => 'arieskarestu214@gmail.com',
            'password' => bcrypt('12345')
        ]);
        
        // // Mengisi tabel user untuk data kedua
        // User::create([
        //     'name' => 'Evory Restu',
        //     'username' => 'EvoryRest',
        //     'email' => 'evoryrestu321@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);

        // Membuat 3 data di tabel user dengan menggunakan factory
        User::factory(3)->create();
        
        // Mengisi tabel categories untuk data Web Programming
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        // Mengisi tabel categories untuk data Web Design
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        // Mengisi tabel categories untuk data Personal
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // Membuat 20 data di tabel post dengan menggunakan factory
        Post::factory(20)->create();
        
        // // Mengisi tabel posts untuk data pertama
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo, ex cumque consequatur perspiciatis cum officia est maiores debitis sit, accusantium ipsam nostrum tempore laudantium voluptatum necessitatibus. Est corporis labore illum maxime ex. Quisquam iure asperiores hic ad nobis! Dolores obcaecati vel provident velit placeat. Modi expedita esse dolorum aperiam incidunt sit tempora eos illum deleniti quibusdam, optio, tenetur, repellendus molestias odio pariatur repudiandae voluptatibus laborum. Ipsa similique assumenda, culpa accusamus aperiam pariatur, fugit at error dignissimos neque, sint rerum hic veniam! Qui adipisci rerum quibusdam atque quaerat, autem voluptatibus nostrum voluptatum inventore molestias expedita pariatur accusamus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // // Mengisi tabel posts untuk data kedua
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo, ex cumque consequatur perspiciatis cum officia est maiores debitis sit, accusantium ipsam nostrum tempore laudantium voluptatum necessitatibus. Est corporis labore illum maxime ex. Quisquam iure asperiores hic ad nobis! Dolores obcaecati vel provident velit placeat. Modi expedita esse dolorum aperiam incidunt sit tempora eos illum deleniti quibusdam, optio, tenetur, repellendus molestias odio pariatur repudiandae voluptatibus laborum. Ipsa similique assumenda, culpa accusamus aperiam pariatur, fugit at error dignissimos neque, sint rerum hic veniam! Qui adipisci rerum quibusdam atque quaerat, autem voluptatibus nostrum voluptatum inventore molestias expedita pariatur accusamus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // // Mengisi tabel posts untuk data ketiga
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo, ex cumque consequatur perspiciatis cum officia est maiores debitis sit, accusantium ipsam nostrum tempore laudantium voluptatum necessitatibus. Est corporis labore illum maxime ex. Quisquam iure asperiores hic ad nobis! Dolores obcaecati vel provident velit placeat. Modi expedita esse dolorum aperiam incidunt sit tempora eos illum deleniti quibusdam, optio, tenetur, repellendus molestias odio pariatur repudiandae voluptatibus laborum. Ipsa similique assumenda, culpa accusamus aperiam pariatur, fugit at error dignissimos neque, sint rerum hic veniam! Qui adipisci rerum quibusdam atque quaerat, autem voluptatibus nostrum voluptatum inventore molestias expedita pariatur accusamus.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // // Mengisi tabel posts untuk data keempat
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet repellat itaque quo, ex cumque consequatur perspiciatis cum officia est maiores debitis sit, accusantium ipsam nostrum tempore laudantium voluptatum necessitatibus. Est corporis labore illum maxime ex. Quisquam iure asperiores hic ad nobis! Dolores obcaecati vel provident velit placeat. Modi expedita esse dolorum aperiam incidunt sit tempora eos illum deleniti quibusdam, optio, tenetur, repellendus molestias odio pariatur repudiandae voluptatibus laborum. Ipsa similique assumenda, culpa accusamus aperiam pariatur, fugit at error dignissimos neque, sint rerum hic veniam! Qui adipisci rerum quibusdam atque quaerat, autem voluptatibus nostrum voluptatum inventore molestias expedita pariatur accusamus.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        
        

        
    }
}
