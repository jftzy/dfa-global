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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('book_title');
            $table->string('author');
            $table->string('translator')->nullable();
            $table->string('language')->nullable();
            $table->string('title_of_book_and_link')->nullable();
            $table->unsignedInteger('year_of_translation')->nullable();
            $table->string('publisher')->nullable();
            $table->text('file_translations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
