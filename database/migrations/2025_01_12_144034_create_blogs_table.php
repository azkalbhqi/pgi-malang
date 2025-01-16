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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title', 200);
            $table->text('body');
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for category
            $table->unsignedBigInteger('author_id')->nullable();  // Foreign key for author
            $table->date('dates')->nullable();
            $table->timestamps();

// Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
