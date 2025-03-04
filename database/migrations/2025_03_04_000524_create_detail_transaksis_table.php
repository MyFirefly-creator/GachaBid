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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jumlah');
            $table->decimal('hargaSatuan', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->unsignedBigInteger('transaksiID');
            $table->unsignedBigInteger('produkID');

            $table->foreign('produkID')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('transaksiID')->references('id')->on('transaksis')->onDelete('cascade');
            $table->timestamps();
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
