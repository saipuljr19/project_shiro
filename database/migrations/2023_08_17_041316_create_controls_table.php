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
        Schema::create('controls', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->decimal('temperature', 10, 2); // Suhu air
            $table->decimal('turbidity', 10, 2); // Kekeruhan air (TDS)
            $table->decimal('ph', 10, 2); // pH air
            $table->timestamps(); // Waktu pencatatan data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
