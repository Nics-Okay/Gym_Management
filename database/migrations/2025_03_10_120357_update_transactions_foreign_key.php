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
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['rate_id']);

            // Re-add the foreign key constraint with ON DELETE CASCADE
            $table->foreign('rate_id')
                ->references('id')
                ->on('rates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key with ON DELETE CASCADE
            $table->dropForeign(['rate_id']);

            // Re-add the original foreign key constraint without cascading
            $table->foreign('rate_id')
                ->references('id')
                ->on('rates')
                ->onDelete('restrict'); // Default restrict behavior
        });
    }
};
