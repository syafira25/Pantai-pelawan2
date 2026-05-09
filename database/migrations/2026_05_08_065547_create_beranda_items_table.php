<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beranda_items', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['layanan', 'keunggulan', 'informasi', 'alur']);
            $table->string('icon')->nullable();
            $table->string('nomor')->nullable();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(0);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beranda_items');
    }
};