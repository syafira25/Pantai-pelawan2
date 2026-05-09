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

            $table->string('hero_judul')->nullable();
            $table->text('hero_subjudul')->nullable();

            $table->string('tentang_label')->nullable();
            $table->string('tentang_judul')->nullable();
            $table->text('tentang_paragraf_1')->nullable();
            $table->text('tentang_paragraf_2')->nullable();
            $table->text('tentang_paragraf_3')->nullable();

            $table->string('gambaran_label')->nullable();
            $table->string('gambaran_judul')->nullable();
            $table->text('gambaran_deskripsi')->nullable();

            $table->string('lokasi_judul')->nullable();
            $table->text('lokasi_deskripsi')->nullable();

            $table->string('karakter_destinasi_judul')->nullable();
            $table->text('karakter_destinasi_deskripsi')->nullable();

            $table->string('nilai_alam_judul')->nullable();
            $table->text('nilai_alam_deskripsi')->nullable();

            $table->string('gambar')->nullable();
            $table->string('perkembangan_label')->nullable();
            $table->string('perkembangan_judul')->nullable();
            $table->text('perkembangan_paragraf_1')->nullable();
            $table->text('perkembangan_paragraf_2')->nullable();
            $table->text('perkembangan_paragraf_3')->nullable();

            $table->string('karakteristik_label')->nullable();
            $table->string('karakteristik_judul')->nullable();
            $table->text('karakteristik_deskripsi')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("karakter_{$i}_icon")->nullable();
                $table->string("karakter_{$i}_judul")->nullable();
                $table->text("karakter_{$i}_deskripsi")->nullable();
            }

            $table->string('visi_misi_label')->nullable();
            $table->string('visi_misi_judul')->nullable();
            $table->text('visi_misi_deskripsi')->nullable();

            $table->string('visi_judul')->nullable();
            $table->text('visi_deskripsi')->nullable();

            $table->string('misi_judul')->nullable();
            $table->text('misi_deskripsi')->nullable();

            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();
            $table->string('cta_tombol_1')->nullable();
            $table->string('cta_tombol_2')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_pantais');
    }
};