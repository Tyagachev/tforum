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
        Schema::create('tag_theme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics_tags');
    }
};
