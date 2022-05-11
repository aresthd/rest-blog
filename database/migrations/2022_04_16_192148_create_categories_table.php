<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema / struktur dari tabel categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();       // Untuk nama dari kategorinya
            $table->string('slug')->unique();       // Untuk slug dari kategorinya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
