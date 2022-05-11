<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');               // Untuk foreign key dari categories
            $table->foreignId('user_id');                   // Untuk foreign key dari user
            $table->string('title');                        // Untuk menyimpan judul dari post
            $table->string('slug')->unique();               // Untuk menyimpan slug dari post
            $table->string('image')->nullable();            // Untuk menyimpan nama file image     
            $table->text('excerpt');                        // Untuk menyimpan excerpt (sebagian kecil dari tulisan body)
            $table->text('body');                           // Untuk menyimpan body / isi dari post
            $table->timestamp('published_at')->nullable();  // Untuk menyimpan tgl kapan postingan dipublish
            $table->timestamps();                           // Untuk membuat created app dan updated app
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
