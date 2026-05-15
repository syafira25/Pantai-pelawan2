<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_pantais', function (Blueprint $table) {
            $table->string('cuaca_mode')->default('otomatis')->after('header_subjudul');

            $table->string('manual_kondisi')->nullable();
            $table->string('manual_ikon')->nullable();
            $table->text('manual_deskripsi')->nullable();

            $table->string('manual_ombak')->nullable();
            $table->text('manual_ombak_deskripsi')->nullable();

            $table->string('manual_angin')->nullable();
            $table->text('manual_angin_deskripsi')->nullable();

            $table->string('manual_status')->nullable();
            $table->text('manual_status_deskripsi')->nullable();

            $table->string('manual_catatan_judul')->nullable();
            $table->text('manual_catatan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('informasi_pantais', function (Blueprint $table) {
            $table->dropColumn([
                'cuaca_mode',
                'manual_kondisi',
                'manual_ikon',
                'manual_deskripsi',
                'manual_ombak',
                'manual_ombak_deskripsi',
                'manual_angin',
                'manual_angin_deskripsi',
                'manual_status',
                'manual_status_deskripsi',
                'manual_catatan_judul',
                'manual_catatan',
            ]);
        });
    }
};