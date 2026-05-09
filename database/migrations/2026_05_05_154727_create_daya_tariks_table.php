<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daya_tariks', function (Blueprint $table) {
            $table->id();

            $table->string('hero_judul')->nullable();
            $table->text('hero_subjudul')->nullable();

            $table->string('highlight_gambar')->nullable();
            $table->string('highlight_badge_judul')->nullable();
            $table->string('highlight_badge_subjudul')->nullable();
            $table->string('highlight_label')->nullable();
            $table->string('highlight_judul')->nullable();
            $table->text('highlight_deskripsi')->nullable();

            for ($i = 1; $i <= 3; $i++) {
                $table->string("stat_{$i}_icon")->nullable();
                $table->string("stat_{$i}_text")->nullable();
                $table->text("stat_{$i}_deskripsi")->nullable();
            }

            $table->string('nilai_label')->nullable();
            $table->string('nilai_judul')->nullable();
            $table->text('nilai_deskripsi')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("potensi_{$i}_icon")->nullable();
                $table->string("potensi_{$i}_judul")->nullable();
                $table->text("potensi_{$i}_deskripsi")->nullable();
            }

            $table->string('keunikan_label')->nullable();
            $table->string('keunikan_judul')->nullable();
            $table->text('keunikan_deskripsi')->nullable();
            $table->string('keunikan_big_judul')->nullable();
            $table->text('keunikan_big_deskripsi')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("keunikan_{$i}_icon")->nullable();
                $table->string("keunikan_{$i}_judul")->nullable();
                $table->text("keunikan_{$i}_deskripsi")->nullable();
            }

            $table->string('pengalaman_label')->nullable();
            $table->string('pengalaman_judul')->nullable();
            $table->text('pengalaman_deskripsi')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("pengalaman_{$i}_icon")->nullable();
                $table->string("pengalaman_{$i}_judul")->nullable();
                $table->text("pengalaman_{$i}_deskripsi")->nullable();
            }

            $table->string('alam_label')->nullable();
            $table->string('alam_judul')->nullable();
            $table->text('alam_deskripsi')->nullable();

            for ($i = 1; $i <= 3; $i++) {
                $table->string("alam_{$i}_judul")->nullable();
                $table->text("alam_{$i}_deskripsi")->nullable();
            }

            $table->string('alam_card_label')->nullable();
            $table->string('alam_card_judul')->nullable();
            $table->text('alam_card_deskripsi')->nullable();

            $table->string('alasan_label')->nullable();
            $table->string('alasan_judul')->nullable();
            $table->text('alasan_deskripsi')->nullable();

            for ($i = 1; $i <= 3; $i++) {
                $table->string("alasan_{$i}_nomor")->nullable();
                $table->string("alasan_{$i}_judul")->nullable();
                $table->text("alasan_{$i}_deskripsi")->nullable();
            }

            $table->string('cta_label')->nullable();
            $table->string('cta_judul')->nullable();
            $table->text('cta_deskripsi')->nullable();
            $table->string('cta_tombol_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daya_tariks');
    }
};