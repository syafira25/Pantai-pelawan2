<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fasilitas_items', function (Blueprint $table) {
            $table->enum('kategori', ['utama', 'pendukung'])->after('id');
            $table->string('icon')->nullable()->after('kategori');
            $table->string('judul')->after('icon');
            $table->text('deskripsi')->nullable()->after('judul');
            $table->integer('urutan')->default(0)->after('deskripsi');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('urutan');
        });
    }

    public function down(): void
    {
        Schema::table('fasilitas_items', function (Blueprint $table) {
            $table->dropColumn([
                'kategori',
                'icon',
                'judul',
                'deskripsi',
                'urutan',
                'status',
            ]);
        });
    }
};