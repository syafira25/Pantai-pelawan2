<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('warung_kuliners', 'badge')) {
            Schema::table('warung_kuliners', function (Blueprint $table) {
                $table->string('badge')->nullable()->after('slug');
            });
        }

        if (!Schema::hasColumn('warung_kuliners', 'kategori')) {
            Schema::table('warung_kuliners', function (Blueprint $table) {
                $table->string('kategori')->nullable()->after('badge');
            });
        }

        if (!Schema::hasColumn('warung_kuliners', 'gambar_2')) {
            Schema::table('warung_kuliners', function (Blueprint $table) {
                $table->string('gambar_2')->nullable()->after('gambar');
            });
        }

        if (!Schema::hasColumn('warung_kuliners', 'gambar_3')) {
            Schema::table('warung_kuliners', function (Blueprint $table) {
                $table->string('gambar_3')->nullable()->after('gambar_2');
            });
        }

        if (!Schema::hasColumn('warung_kuliners', 'status')) {
            Schema::table('warung_kuliners', function (Blueprint $table) {
                $table->string('status')->default('aktif')->after('gambar_3');
            });
        }
    }

    public function down(): void
    {
        // Kosongkan saja supaya aman.
    }
};