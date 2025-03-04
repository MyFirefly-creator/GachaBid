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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->decimal('totalHarga', 10, 2);
            $table->enum('status',['pending','dikemas','dikirim','selesai','dibatalkan']);
            $table->string('metodePembayaran');
            $table->timestamp('tanggalTransaksi');
            $table->unsignedBigInteger('userID');

            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
