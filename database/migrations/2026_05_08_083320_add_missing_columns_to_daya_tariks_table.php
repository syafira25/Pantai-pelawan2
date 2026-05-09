<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daya_tariks', function (Blueprint $table) {
            if (!Schema::hasColumn('daya_tariks', 'highlight_gambar')) {
                $table->string('highlight_gambar')->nullable()->after('hero_subjudul');
            }

            if (!Schema::hasColumn('daya_tariks', 'highlight_badge_judul')) {
                $table->string('highlight_badge_judul')->nullable()->after('highlight_gambar');
            }

            if (!Schema::hasColumn('daya_tariks', 'highlight_badge_subjudul')) {
                $table->string('highlight_badge_subjudul')->nullable()->after('highlight_badge_judul');
            }

            if (!Schema::hasColumn('daya_tariks', 'highlight_label')) {
                $table->string('highlight_label')->nullable()->after('highlight_badge_subjudul');
            }

            if (!Schema::hasColumn('daya_tariks', 'highlight_judul')) {
                $table->string('highlight_judul')->nullable()->after('highlight_label');
            }

            if (!Schema::hasColumn('daya_tariks', 'highlight_deskripsi')) {
                $table->text('highlight_deskripsi')->nullable()->after('highlight_judul');
            }

            for ($i = 1; $i <= 3; $i++) {
                if (!Schema::hasColumn('daya_tariks', "stat_{$i}_icon")) {
                    $table->string("stat_{$i}_icon")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "stat_{$i}_text")) {
                    $table->string("stat_{$i}_text")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "stat_{$i}_deskripsi")) {
                    $table->text("stat_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'nilai_label')) {
                $table->string('nilai_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'nilai_judul')) {
                $table->string('nilai_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'nilai_deskripsi')) {
                $table->text('nilai_deskripsi')->nullable();
            }

            for ($i = 1; $i <= 4; $i++) {
                if (!Schema::hasColumn('daya_tariks', "potensi_{$i}_icon")) {
                    $table->string("potensi_{$i}_icon")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "potensi_{$i}_judul")) {
                    $table->string("potensi_{$i}_judul")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "potensi_{$i}_deskripsi")) {
                    $table->text("potensi_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'keunikan_label')) {
                $table->string('keunikan_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'keunikan_judul')) {
                $table->string('keunikan_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'keunikan_deskripsi')) {
                $table->text('keunikan_deskripsi')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'keunikan_big_judul')) {
                $table->string('keunikan_big_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'keunikan_big_deskripsi')) {
                $table->text('keunikan_big_deskripsi')->nullable();
            }

            for ($i = 1; $i <= 4; $i++) {
                if (!Schema::hasColumn('daya_tariks', "keunikan_{$i}_icon")) {
                    $table->string("keunikan_{$i}_icon")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "keunikan_{$i}_judul")) {
                    $table->string("keunikan_{$i}_judul")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "keunikan_{$i}_deskripsi")) {
                    $table->text("keunikan_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'pengalaman_label')) {
                $table->string('pengalaman_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'pengalaman_judul')) {
                $table->string('pengalaman_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'pengalaman_deskripsi')) {
                $table->text('pengalaman_deskripsi')->nullable();
            }

            for ($i = 1; $i <= 4; $i++) {
                if (!Schema::hasColumn('daya_tariks', "pengalaman_{$i}_icon")) {
                    $table->string("pengalaman_{$i}_icon")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "pengalaman_{$i}_judul")) {
                    $table->string("pengalaman_{$i}_judul")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "pengalaman_{$i}_deskripsi")) {
                    $table->text("pengalaman_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_label')) {
                $table->string('alam_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_judul')) {
                $table->string('alam_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_deskripsi')) {
                $table->text('alam_deskripsi')->nullable();
            }

            for ($i = 1; $i <= 3; $i++) {
                if (!Schema::hasColumn('daya_tariks', "alam_{$i}_judul")) {
                    $table->string("alam_{$i}_judul")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "alam_{$i}_deskripsi")) {
                    $table->text("alam_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_card_label')) {
                $table->string('alam_card_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_card_judul')) {
                $table->string('alam_card_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alam_card_deskripsi')) {
                $table->text('alam_card_deskripsi')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alasan_label')) {
                $table->string('alasan_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alasan_judul')) {
                $table->string('alasan_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'alasan_deskripsi')) {
                $table->text('alasan_deskripsi')->nullable();
            }

            for ($i = 1; $i <= 3; $i++) {
                if (!Schema::hasColumn('daya_tariks', "alasan_{$i}_nomor")) {
                    $table->string("alasan_{$i}_nomor")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "alasan_{$i}_judul")) {
                    $table->string("alasan_{$i}_judul")->nullable();
                }

                if (!Schema::hasColumn('daya_tariks', "alasan_{$i}_deskripsi")) {
                    $table->text("alasan_{$i}_deskripsi")->nullable();
                }
            }

            if (!Schema::hasColumn('daya_tariks', 'cta_label')) {
                $table->string('cta_label')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'cta_judul')) {
                $table->string('cta_judul')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'cta_deskripsi')) {
                $table->text('cta_deskripsi')->nullable();
            }

            if (!Schema::hasColumn('daya_tariks', 'cta_tombol_text')) {
                $table->string('cta_tombol_text')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('daya_tariks', function (Blueprint $table) {
            // dikosongkan agar aman saat rollback
        });
    }
};