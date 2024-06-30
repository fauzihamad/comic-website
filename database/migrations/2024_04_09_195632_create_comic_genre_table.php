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
        Schema::create('comic_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_comic');
            $table->unsignedBigInteger('id_genre');
            $table->string('insert_user');
            $table->string('update_user');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_comic')->references('id')->on('comic')->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_genre');
    }
};
