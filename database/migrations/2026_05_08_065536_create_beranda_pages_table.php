<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beranda_pages', function (Blueprint $table) {
            $table->id();

            $table->string('hero_badge')->nullable();
            $table->string('hero_judul')->nullable();
            $table->text('hero_deskripsi')->nullable();
            $table->string('hero_tombol_1')->nullable();
            $table->string('hero_tombol_2')->nullable();

            $table->string('layanan_label')->nullable();
            $table->string('layanan_judul')->nullable();
            $table->text('layanan_deskripsi')->nullable();

            $table->string('about_label')->nullable();
            $table->string('about_judul')->nullable();
            $table->text('about_deskripsi_1')->nullable();
            $table->text('about_deskripsi_2')->nullable();
            $table->string('about_gambar')->nullable();
            $table->string('about_tombol')->nullable();

            $table->string('keunggulan_label')->nullable();
            $table->string('keunggulan_judul')->nullable();
            $table->text('keunggulan_deskripsi')->nullable();

            $table->string('info_label')->nullable();
            $table->string('info_judul')->nullable();
            $table->text('info_deskripsi')->nullable();

            $table->string('alur_label')->nullable();
            $table->string('alur_judul')->nullable();
            $table->text('alur_deskripsi')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();
            $table->string('cta_tombol_1')->nullable();
            $table->string('cta_tombol_2')->nullable();
            $table->string('cta_wa_link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beranda_pages');
    }
};