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
        Schema::table('users', function (Blueprint $table) {
            // Add a new column for QR Code ID
            $table->uuid('qr_code_id')->unique()->nullable();

            // Rename admin_pin to admin_code
            $table->renameColumn('admin_pin', 'admin_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Roll back the changes
            $table->dropColumn('qr_code_id');
            $table->renameColumn('admin_code', 'admin_pin');
        });
    }
};
