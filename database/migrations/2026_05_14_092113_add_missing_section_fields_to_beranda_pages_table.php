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
                $table->string('aktivitas_label')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'aktivitas_judul')) {
                $table->string('aktivitas_judul')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'aktivitas_deskripsi')) {
                $table->text('aktivitas_deskripsi')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_label')) {
                $table->string('galeri_label')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_judul')) {
                $table->string('galeri_judul')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'galeri_deskripsi')) {
                $table->text('galeri_deskripsi')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_label')) {
                $table->string('fitur_label')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_judul')) {
                $table->string('fitur_judul')->nullable();
            }

            if (!Schema::hasColumn('beranda_pages', 'fitur_deskripsi')) {
                $table->text('fitur_deskripsi')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('beranda_pages', function (Blueprint $table) {
            //
        });
    }
};