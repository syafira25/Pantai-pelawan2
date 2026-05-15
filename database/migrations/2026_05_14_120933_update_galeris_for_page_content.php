<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (!Schema::hasColumn('galeris', 'jenis')) {
                $table->string('jenis')->default('foto')->after('id');
            }

            if (!Schema::hasColumn('galeris', 'hero_judul')) {
                $table->string('hero_judul')->nullable();
                $table->text('hero_deskripsi')->nullable();

                $table->string('galeri_label')->nullable();
                $table->string('galeri_judul')->nullable();
                $table->text('galeri_deskripsi')->nullable();

                $table->string('aktivitas_label')->nullable();
                $table->string('aktivitas_judul')->nullable();
                $table->text('aktivitas_deskripsi')->nullable();

                for ($i = 1; $i <= 4; $i++) {
                    $table->string("aktivitas_{$i}_label")->nullable();
                    $table->string("aktivitas_{$i}_judul")->nullable();
                    $table->text("aktivitas_{$i}_deskripsi")->nullable();
                    $table->string("aktivitas_{$i}_gambar")->nullable();
                }

                $table->string('cta_label')->nullable();
                $table->string('cta_judul')->nullable();
                $table->text('cta_deskripsi')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn([
                'jenis',
                'hero_judul',
                'hero_deskripsi',
                'galeri_label',
                'galeri_judul',
                'galeri_deskripsi',
                'aktivitas_label',
                'aktivitas_judul',
                'aktivitas_deskripsi',
                'aktivitas_1_label',
                'aktivitas_1_judul',
                'aktivitas_1_deskripsi',
                'aktivitas_1_gambar',
                'aktivitas_2_label',
                'aktivitas_2_judul',
                'aktivitas_2_deskripsi',
                'aktivitas_2_gambar',
                'aktivitas_3_label',
                'aktivitas_3_judul',
                'aktivitas_3_deskripsi',
                'aktivitas_3_gambar',
                'aktivitas_4_label',
                'aktivitas_4_judul',
                'aktivitas_4_deskripsi',
                'aktivitas_4_gambar',
                'cta_label',
                'cta_judul',
                'cta_deskripsi',
            ]);
        });
    }
};