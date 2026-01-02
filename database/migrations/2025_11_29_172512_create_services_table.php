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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // untuk judul & slug URL
            $table->string('title');
            $table->string('slug')->unique();

            // kategori (mis. "Mentoring", "Workshop", dll) → opsional
            $table->string('category_slug', 100)->nullable();

            // ringkasan pendek buat kartu di halaman /layanan
            $table->text('excerpt');

            // isi detail layanan (boleh markdown pakai ## ### - seperti artikel)
            $table->longText('content')->nullable();

            // gambar utama layanan (mis: "image/layanan/foto-mentoring.jpg")
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
        Schema::dropIfExists('services');
    }
};
