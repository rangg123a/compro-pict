<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('image')->nullable(); // Menyimpan path gambar
            $table->text('excerpt'); // Ringkasan singkat untuk card
            $table->longText('content'); // Isi berita lengkap
            $table->timestamp('published_at')->nullable(); // Tanggal terbit
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};