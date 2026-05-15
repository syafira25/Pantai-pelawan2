<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('beranda_pages', function (Blueprint $table) {

            if (!Schema::hasColumn('beranda_pages', 'aktivitas_label')) {
                $table->string('aktivitas_label')->nullable()->after('alur_deskripsi');
            }

            if (!Schema::hasColumn('beranda_pages', 'aktivitas_judul')) {
                $table->string('aktivitas_judul')->nullable()->after('aktivitas_label');
            }

            if (!Schema::hasColumn('beranda_pages', 'aktivitas_deskripsi')) {
                $table->text('aktivitas_deskripsi')->nullable()->after('aktivitas_judul');
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_label')) {
                $table->string('galeri_label')->nullable()->after('aktivitas_deskripsi');
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_judul')) {
                $table->string('galeri_judul')->nullable()->after('galeri_label');
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_deskripsi')) {
                $table->text('galeri_deskripsi')->nullable()->after('galeri_judul');
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_label')) {
                $table->string('fitur_label')->nullable()->after('galeri_deskripsi');
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_judul')) {
                $table->string('fitur_judul')->nullable()->after('fitur_label');
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_deskripsi')) {
                $table->text('fitur_deskripsi')->nullable()->after('fitur_judul');
            }
        });
    }

    public function down(): void
    {
        Schema::table('beranda_pages', function (Blueprint $table) {
            $table->dropColumn([
                'aktivitas_label',
                'aktivitas_judul',
                'aktivitas_deskripsi',
                'galeri_label',
                'galeri_judul',
                'galeri_deskripsi',
                'fitur_label',
                'fitur_judul',
                'fitur_deskripsi',
            ]);
        });
    }
};