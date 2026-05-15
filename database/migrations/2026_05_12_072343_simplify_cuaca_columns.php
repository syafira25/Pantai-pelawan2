<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_pantais', function (Blueprint $table) {
            // hapus kolom lama yang tidak dipakai lagi
            if (Schema::hasColumn('informasi_pantais', 'manual_ikon')) {
                $table->dropColumn('manual_ikon');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_deskripsi')) {
                $table->dropColumn('manual_deskripsi');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_ombak')) {
                $table->dropColumn('manual_ombak');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_ombak_deskripsi')) {
                $table->dropColumn('manual_ombak_deskripsi');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_angin')) {
                $table->dropColumn('manual_angin');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_angin_deskripsi')) {
                $table->dropColumn('manual_angin_deskripsi');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_status')) {
                $table->dropColumn('manual_status');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_status_deskripsi')) {
                $table->dropColumn('manual_status_deskripsi');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_catatan_judul')) {
                $table->dropColumn('manual_catatan_judul');
            }

            if (Schema::hasColumn('informasi_pantais', 'manual_catatan')) {
                $table->dropColumn('manual_catatan');
            }

            // pastikan manual_kondisi ada
            if (!Schema::hasColumn('informasi_pantais', 'manual_kondisi')) {
                $table->string('manual_kondisi')
                    ->default('cerah_berawan')
                    ->after('cuaca_mode');
            }

            // pastikan cuaca_mode ada
            if (!Schema::hasColumn('informasi_pantais', 'cuaca_mode')) {
                $table->string('cuaca_mode')
                    ->default('otomatis')
                    ->after('header_subjudul');
            }
        });
    }

    public function down(): void
    {
        Schema::table('informasi_pantais', function (Blueprint $table) {
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
};