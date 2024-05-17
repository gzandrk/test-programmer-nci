<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->integer('id_transaksi')->primary();
            $table->string('no_transaksi',5);
            $table->timestamp('tgl_transaksi');
            $table->string('kode_barang',5);
            $table->integer('urut');
            $table->float('qty');
            $table->bigInteger('harga');
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
            $table->foreign('no_transaksi')->references('no_transaksi')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
