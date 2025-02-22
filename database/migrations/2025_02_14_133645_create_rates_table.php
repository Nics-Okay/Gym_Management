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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();;
            $table->string('name');
            // Replace the original duration column with two columns:
            $table->unsignedInteger('duration_value'); // e.g., 1, 7, 15, 6, etc. (Non-Zero)
            $table->enum('duration_unit', ['day', 'month', 'year']); // Allowed units
            $table->decimal('price', 8, 2); // 8 digits, 2 decimal
            $table->integer('availed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
