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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->boolean('notification')->default(false); // Menyimpan status notifikasi
            $table->decimal('temperature', 10, 2); // Suhu air
            $table->decimal('turbidity', 10, 2); // TDS/Kekeruhan air
            $table->decimal('ph', 10, 2); // pH air
            $table->timestamps(); // Tanggal dan waktu pencatatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
