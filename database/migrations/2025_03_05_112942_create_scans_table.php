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
        Schema::create('scans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Reference to users table
            $table->string('qr_code_id'); // QR code from users table
            $table->string('name'); // Name from users table
            $table->string('membership_status'); // Membership status from members table
            $table->date('membership_validity'); // Membership validity from members table
            $table->string('access_type'); // Access type from members table
            $table->timestamp('time_in')->nullable(); // Time in (recorded when QR is scanned)
            $table->timestamp('time_out')->nullable(); // Time out (recorded later)
            $table->timestamps(); // Created at and updated at timestamps
    
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scans');
    }
};
