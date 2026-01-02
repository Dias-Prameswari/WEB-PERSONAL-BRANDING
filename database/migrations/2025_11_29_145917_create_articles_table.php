<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // untuk judul & slug
            $table->string('title');
            $table->string('slug')->unique();

            // nyambung ke array $categories di ArticleController (storytelling-branding, dst.)
            $table->string('category_slug', 100);

            // tanggal tampil (boleh kamu isi string "24 Juni 2024")
            $table->string('date', 50);

            // ringkasan buat kartu artikel
            $table->text('excerpt');

            // isi artikel lengkap (markdown kamu yang panjang itu)
            $table->longText('content')->nullable();

            // gambar utama artikel
            $table->string('image_url')->nullable();

            // status tampil / tidak
            $table->boolean('published')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
