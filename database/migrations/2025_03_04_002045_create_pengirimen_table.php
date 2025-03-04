<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksiID');
            $table->string('kurir');
            $table->string('nomor_resi')->nullable();
            $table->enum('status_pengiriman', ['dikemas', 'dikirim', 'diterima'])->default('dikemas');
            $table->timestamps();

            $table->foreign('transaksiID')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengirimen');
    }
};
