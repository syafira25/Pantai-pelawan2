<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::table('pemesanans', function (Blueprint $table) {
        if (!Schema::hasColumn('pemesanans', 'jumlah_dewasa')) {
            $table->integer('jumlah_dewasa')->default(0)->after('jumlah_orang');
        }

        if (!Schema::hasColumn('pemesanans', 'jumlah_anak')) {
            $table->integer('jumlah_anak')->default(0)->after('jumlah_dewasa');
        }
    });
}

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanans', 'jumlah_dewasa')) {
                $table->dropColumn('jumlah_dewasa');
            }

            if (Schema::hasColumn('pemesanans', 'jumlah_anak')) {
                $table->dropColumn('jumlah_anak');
            }
        });
    }
};
