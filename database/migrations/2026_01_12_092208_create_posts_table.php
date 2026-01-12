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
        // Create 'posts' table
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title'); // Post title
            $table->longText('body'); // Post content
            $table->foreignId('user_id') // Foreign key to 'users' table
                  ->constrained()       // Automatically references 'users.id'
                  ->cascadeOnDelete();  // Delete posts if user is deleted
            $table->timestamps();      // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
