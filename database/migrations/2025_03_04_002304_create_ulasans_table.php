<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('produkID');
            $table->integer('rating')->check('rating >= 1 AND rating <= 5');
            $table->text('komentar');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produkID')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ulasans');
    }
};
