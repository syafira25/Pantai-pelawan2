<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_pantais', function (Blueprint $table) {
            $table->id();

            // DATA DASAR PROFIL
            $table->string('judul')->nullable();
            $table->string('subjudul')->nullable();
            $table->text('deskripsi_utama')->nullable();
            $table->text('deskripsi_tambahan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('gambar')->nullable();

            // HERO PROFIL
            $table->string('hero_judul')->nullable();
            $table->string('hero_subjudul')->nullable();

            // TENTANG PANTAI
            $table->string('tentang_label')->nullable();
            $table->string('tentang_judul')->nullable();
            $table->text('tentang_paragraf_1')->nullable();
            $table->text('tentang_paragraf_2')->nullable();
            $table->text('tentang_paragraf_3')->nullable();

            // GAMBARAN UMUM
            $table->string('gambaran_judul')->nullable();
            $table->text('gambaran_deskripsi')->nullable();

            $table->string('lokasi_judul')->nullable();
            $table->text('lokasi_deskripsi')->nullable();

            $table->string('karakter_destinasi_judul')->nullable();
            $table->text('karakter_destinasi_deskripsi')->nullable();

            $table->string('nilai_alam_judul')->nullable();
            $table->text('nilai_alam_deskripsi')->nullable();

            // PERKEMBANGAN
            $table->string('perkembangan_judul')->nullable();
            $table->text('perkembangan_paragraf_1')->nullable();
            $table->text('perkembangan_paragraf_2')->nullable();
            $table->text('perkembangan_paragraf_3')->nullable();

            // KARAKTERISTIK
            $table->string('karakteristik_judul')->nullable();
            $table->text('karakteristik_deskripsi')->nullable();

            $table->string('karakter_1_judul')->nullable();
            $table->text('karakter_1_deskripsi')->nullable();

            $table->string('karakter_2_judul')->nullable();
            $table->text('karakter_2_deskripsi')->nullable();

            $table->string('karakter_3_judul')->nullable();
            $table->text('karakter_3_deskripsi')->nullable();

            $table->string('karakter_4_judul')->nullable();
            $table->text('karakter_4_deskripsi')->nullable();

            // VISI MISI
            $table->string('visi_judul')->nullable();
            $table->text('visi_deskripsi')->nullable();

            $table->string('misi_judul')->nullable();
            $table->text('misi_deskripsi')->nullable();

            // CTA
            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_pantais');
    }
};