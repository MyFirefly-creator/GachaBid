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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('produk');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->unsignedInteger('stok');
            $table->string('gambar');
            $table->unsignedBigInteger('kategoriID');
            $table->unsignedBigInteger('franchiseID');
            $table->timestamps();

            $table->foreign('kategoriID')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('franchiseID')->references('id')->on('franchises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
