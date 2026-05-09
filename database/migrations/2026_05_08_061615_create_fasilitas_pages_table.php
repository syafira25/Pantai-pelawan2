<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_judul')->nullable();
            $table->text('hero_deskripsi')->nullable();

            $table->string('utama_label')->nullable();
            $table->string('utama_judul')->nullable();
            $table->text('utama_deskripsi')->nullable();

            $table->string('pendukung_label')->nullable();
            $table->string('pendukung_judul')->nullable();
            $table->text('pendukung_deskripsi')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();
            $table->string('cta_tombol')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas_pages');
    }
};