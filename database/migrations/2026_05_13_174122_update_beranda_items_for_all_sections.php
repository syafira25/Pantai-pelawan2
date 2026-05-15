<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE beranda_items 
            MODIFY kategori ENUM(
                'layanan',
                'keunggulan',
                'informasi',
                'alur',
                'aktivitas',
                'galeri',
                'fitur'
            ) NOT NULL
        ");

        Schema::table('beranda_items', function (Blueprint $table) {
            if (!Schema::hasColumn('beranda_items', 'gambar')) {
                $table->string('gambar')->nullable()->after('deskripsi');
            }

            if (!Schema::hasColumn('beranda_items', 'link')) {
                $table->string('link')->nullable()->after('gambar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('beranda_items', function (Blueprint $table) {
            if (Schema::hasColumn('beranda_items', 'gambar')) {
                $table->dropColumn('gambar');
            }

            if (Schema::hasColumn('beranda_items', 'link')) {
                $table->dropColumn('link');
            }
        });

        DB::statement("
            ALTER TABLE beranda_items 
            MODIFY kategori ENUM(
                'layanan',
                'keunggulan',
                'informasi',
                'alur'
            ) NOT NULL
        ");
    }
};