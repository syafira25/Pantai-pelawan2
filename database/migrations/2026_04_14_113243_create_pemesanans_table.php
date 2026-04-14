<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking')->unique();
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_kunjungan');
            $table->unsignedInteger('jumlah_orang');
            $table->unsignedBigInteger('harga_per_tiket');
            $table->unsignedBigInteger('total_harga');

            $table->string('metode_pembayaran')->nullable();
            $table->string('midtrans_order_id')->unique()->nullable();
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('snap_token')->nullable();

            $table->enum('status_pembayaran', ['pending', 'paid', 'failed', 'expired', 'cancelled'])->default('pending');
            $table->enum('status_tiket', ['nonaktif', 'aktif'])->default('nonaktif');

            $table->timestamp('dibayar_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};