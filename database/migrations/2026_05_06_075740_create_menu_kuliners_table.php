<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_kuliners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warung_kuliner_id')
                ->constrained('warung_kuliners')
                ->cascadeOnDelete();
            $table->string('nama_menu');
            $table->text('deskripsi')->nullable();
            $table->integer('harga')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_kuliners');
    }
};