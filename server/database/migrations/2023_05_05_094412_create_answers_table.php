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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('question_id')->references('id')->on('questions')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lesson_id')->references('lesson_id')->on('questions')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->text('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
