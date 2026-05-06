<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('status_pengunjung')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->text('pesan');

            $table->enum('status', ['pending', 'disetujui', 'disembunyikan'])
                ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};