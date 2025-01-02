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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');

            $table->unsignedBigInteger('user_id'); // This will hold the foreign key
            $table->foreign('user_id') // Define the foreign key constraint
                  ->references('id') // References the 'id' column of tbl_users
                  ->on('tbl_users') // On the 'tbl_users' table
                  ->onDelete('cascade'); // Optional: Cascade delete if user is deleted

            $table->timestamps();
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
