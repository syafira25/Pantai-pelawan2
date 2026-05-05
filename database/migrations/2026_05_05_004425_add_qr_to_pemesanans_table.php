<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanans', 'qr_code')) {
                $table->string('qr_code')->nullable();
            }

            if (!Schema::hasColumn('pemesanans', 'qr_used_at')) {
                $table->timestamp('qr_used_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanans', 'qr_code')) {
                $table->dropColumn('qr_code');
            }

            if (Schema::hasColumn('pemesanans', 'qr_used_at')) {
                $table->dropColumn('qr_used_at');
            }
        });
    }
};