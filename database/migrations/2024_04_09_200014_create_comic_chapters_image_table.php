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
        Schema::create('comic_chapters_image', function (Blueprint $table) {
            $table->unsignedBigInteger('id_comic');
            $table->unsignedBigInteger('id_chapters');
            $table->string('file');
            $table->string('insert_user');
            $table->string('update_user');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_comic')->references('id')->on('comic')->onDelete('cascade');
            $table->foreign('id_chapters')->references('id')->on('comic_chapters')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_chapters_image');
    }
};
