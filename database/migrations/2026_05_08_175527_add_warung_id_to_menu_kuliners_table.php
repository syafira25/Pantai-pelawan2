<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('menu_kuliners', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_kuliners', 'warung_id')) {
                $table->unsignedBigInteger('warung_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('menu_kuliners', 'kategori')) {
                $table->enum('kategori', ['makanan', 'minuman'])->default('makanan')->after('gambar');
            }

            if (!Schema::hasColumn('menu_kuliners', 'status')) {
                $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('kategori');
            }
        });
    }

    public function down()
    {
        Schema::table('menu_kuliners', function (Blueprint $table) {
            if (Schema::hasColumn('menu_kuliners', 'warung_id')) {
                $table->dropColumn('warung_id');
            }

            if (Schema::hasColumn('menu_kuliners', 'kategori')) {
                $table->dropColumn('kategori');
            }

            if (Schema::hasColumn('menu_kuliners', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};