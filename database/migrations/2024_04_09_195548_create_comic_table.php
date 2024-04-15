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
        Schema::create('comic', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('synopsis');
            $table->integer('released');
            $table->string('Author');
            $table->string('posted_by');
            $table->string('is_complete');
            $table->string('thumbnails');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic');
    }
};
