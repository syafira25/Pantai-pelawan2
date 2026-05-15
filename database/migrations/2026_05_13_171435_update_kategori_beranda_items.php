<?php

use Illuminate\Database\Migrations\Migration;
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
    }

    public function down(): void
    {
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