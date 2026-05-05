<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_pantais', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('subjudul')->nullable();
            $table->text('deskripsi_utama')->nullable();
            $table->text('deskripsi_tambahan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_pantais');
    }
};