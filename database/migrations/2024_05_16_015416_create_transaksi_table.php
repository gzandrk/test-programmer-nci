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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi',5)->unique();
            $table->timestamp('tgl_transaksi');
            $table->string('kode_customer',5);
            $table->integer('total');
            $table->string('keterangan',200)->nullable();
            $table->timestamps();

            $table->foreign('kode_customer')->references('kode_customer')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
