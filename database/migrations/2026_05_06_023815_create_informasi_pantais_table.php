<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi_pantais', function (Blueprint $table) {
            $table->id();

            $table->string('header_judul')->nullable();
            $table->text('header_subjudul')->nullable();

            $table->string('umum_judul')->nullable();
            $table->text('umum_deskripsi')->nullable();

            $table->string('umum_1_icon')->nullable();
            $table->string('umum_1_judul')->nullable();
            $table->text('umum_1_deskripsi')->nullable();

            $table->string('umum_2_icon')->nullable();
            $table->string('umum_2_judul')->nullable();
            $table->text('umum_2_deskripsi')->nullable();

            $table->string('umum_3_icon')->nullable();
            $table->string('umum_3_judul')->nullable();
            $table->text('umum_3_deskripsi')->nullable();

            $table->string('umum_4_icon')->nullable();
            $table->string('umum_4_judul')->nullable();
            $table->text('umum_4_deskripsi')->nullable();

            $table->string('keamanan_judul')->nullable();
            $table->text('keamanan_deskripsi')->nullable();

            $table->string('keamanan_1_icon')->nullable();
            $table->string('keamanan_1_judul')->nullable();
            $table->text('keamanan_1_deskripsi')->nullable();

            $table->string('keamanan_2_icon')->nullable();
            $table->string('keamanan_2_judul')->nullable();
            $table->text('keamanan_2_deskripsi')->nullable();

            $table->string('keamanan_3_icon')->nullable();
            $table->string('keamanan_3_judul')->nullable();
            $table->text('keamanan_3_deskripsi')->nullable();

            $table->string('keamanan_4_icon')->nullable();
            $table->string('keamanan_4_judul')->nullable();
            $table->text('keamanan_4_deskripsi')->nullable();

            $table->string('tips_judul')->nullable();
            $table->text('tips_deskripsi')->nullable();

            $table->string('tips_1_nomor')->nullable();
            $table->string('tips_1_icon')->nullable();
            $table->string('tips_1_judul')->nullable();
            $table->text('tips_1_deskripsi')->nullable();

            $table->string('tips_2_nomor')->nullable();
            $table->string('tips_2_icon')->nullable();
            $table->string('tips_2_judul')->nullable();
            $table->text('tips_2_deskripsi')->nullable();

            $table->string('tips_3_nomor')->nullable();
            $table->string('tips_3_icon')->nullable();
            $table->string('tips_3_judul')->nullable();
            $table->text('tips_3_deskripsi')->nullable();

            $table->string('tips_4_nomor')->nullable();
            $table->string('tips_4_icon')->nullable();
            $table->string('tips_4_judul')->nullable();
            $table->text('tips_4_deskripsi')->nullable();

            $table->string('tips_5_nomor')->nullable();
            $table->string('tips_5_icon')->nullable();
            $table->string('tips_5_judul')->nullable();
            $table->text('tips_5_deskripsi')->nullable();

            $table->string('tips_6_nomor')->nullable();
            $table->string('tips_6_icon')->nullable();
            $table->string('tips_6_judul')->nullable();
            $table->text('tips_6_deskripsi')->nullable();

            $table->string('kontak_label')->nullable();
            $table->string('kontak_judul')->nullable();
            $table->text('kontak_deskripsi')->nullable();

            $table->text('whatsapp_link')->nullable();
            $table->string('whatsapp_label')->nullable();
            $table->string('whatsapp_judul')->nullable();
            $table->text('whatsapp_deskripsi')->nullable();
            $table->string('whatsapp_tombol')->nullable();

            $table->text('instagram_link')->nullable();
            $table->string('instagram_label')->nullable();
            $table->string('instagram_judul')->nullable();
            $table->text('instagram_deskripsi')->nullable();
            $table->string('instagram_tombol')->nullable();

            $table->text('tiktok_link')->nullable();
            $table->string('tiktok_label')->nullable();
            $table->string('tiktok_judul')->nullable();
            $table->text('tiktok_deskripsi')->nullable();
            $table->string('tiktok_tombol')->nullable();

            $table->string('map_label')->nullable();
            $table->string('map_judul')->nullable();
            $table->text('map_deskripsi')->nullable();
            $table->text('map_embed_url')->nullable();
            $table->text('map_link')->nullable();
            $table->string('map_tombol')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();
            $table->string('cta_tombol')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_pantais');
    }
};