<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuliner_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_judul')->nullable();
            $table->text('hero_subjudul')->nullable();
            $table->string('section_label')->nullable();
            $table->string('section_judul')->nullable();
            $table->text('section_deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuliner_pages');
    }
};