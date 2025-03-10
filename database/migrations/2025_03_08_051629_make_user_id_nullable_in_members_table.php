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
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the old foreign key
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Make user_id nullable
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add the foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Revert user_id to NOT NULL
        });
    }
};
