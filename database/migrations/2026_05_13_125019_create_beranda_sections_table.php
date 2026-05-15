<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beranda_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->string('label')->nullable();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();

            $table->string('sub_label_1')->nullable();
            $table->string('sub_judul_1')->nullable();
            $table->text('sub_deskripsi_1')->nullable();
            $table->string('gambar_1')->nullable();
            $table->string('link_1')->nullable();

            $table->string('sub_label_2')->nullable();
            $table->string('sub_judul_2')->nullable();
            $table->text('sub_deskripsi_2')->nullable();
            $table->string('gambar_2')->nullable();
            $table->string('link_2')->nullable();

            $table->string('sub_label_3')->nullable();
            $table->string('sub_judul_3')->nullable();
            $table->text('sub_deskripsi_3')->nullable();
            $table->string('gambar_3')->nullable();
            $table->string('link_3')->nullable();

            $table->string('sub_label_4')->nullable();
            $table->string('sub_judul_4')->nullable();
            $table->text('sub_deskripsi_4')->nullable();
            $table->string('gambar_4')->nullable();
            $table->string('link_4')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beranda_sections');
    }
};