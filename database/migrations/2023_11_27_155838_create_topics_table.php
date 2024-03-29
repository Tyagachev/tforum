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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->mediumText('text');
            $table->text('tag_topic');
            $table->bigInteger('view_count')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id')->references('id')
                ->on('themes')
                ->onDelete('cascade');
            $table->integer('is_published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
