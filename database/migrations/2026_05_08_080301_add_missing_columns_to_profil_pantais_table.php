<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_pantais', function (Blueprint $table) {
            if (!Schema::hasColumn('profil_pantais', 'gambaran_label')) {
                $table->string('gambaran_label')->nullable()->after('tentang_paragraf_3');
            }

            if (!Schema::hasColumn('profil_pantais', 'perkembangan_label')) {
                $table->string('perkembangan_label')->nullable()->after('gambar');
            }

            if (!Schema::hasColumn('profil_pantais', 'karakteristik_label')) {
                $table->string('karakteristik_label')->nullable()->after('perkembangan_paragraf_3');
            }

            if (!Schema::hasColumn('profil_pantais', 'karakter_1_icon')) {
                $table->string('karakter_1_icon')->nullable()->after('karakteristik_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'karakter_2_icon')) {
                $table->string('karakter_2_icon')->nullable()->after('karakter_1_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'karakter_3_icon')) {
                $table->string('karakter_3_icon')->nullable()->after('karakter_2_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'karakter_4_icon')) {
                $table->string('karakter_4_icon')->nullable()->after('karakter_3_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'visi_misi_label')) {
                $table->string('visi_misi_label')->nullable()->after('karakter_4_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'visi_misi_judul')) {
                $table->string('visi_misi_judul')->nullable()->after('visi_misi_label');
            }

            if (!Schema::hasColumn('profil_pantais', 'visi_misi_deskripsi')) {
                $table->text('visi_misi_deskripsi')->nullable()->after('visi_misi_judul');
            }

            if (!Schema::hasColumn('profil_pantais', 'cta_tombol_1')) {
                $table->string('cta_tombol_1')->nullable()->after('cta_deskripsi');
            }

            if (!Schema::hasColumn('profil_pantais', 'cta_tombol_2')) {
                $table->string('cta_tombol_2')->nullable()->after('cta_tombol_1');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profil_pantais', function (Blueprint $table) {
            $columns = [
                'gambaran_label',
                'perkembangan_label',
                'karakteristik_label',
                'karakter_1_icon',
                'karakter_2_icon',
                'karakter_3_icon',
                'karakter_4_icon',
                'visi_misi_label',
                'visi_misi_judul',
                'visi_misi_deskripsi',
                'cta_tombol_1',
                'cta_tombol_2',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('profil_pantais', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};