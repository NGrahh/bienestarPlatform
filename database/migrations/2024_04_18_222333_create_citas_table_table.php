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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la cita
            $table->string('lastname'); // Apellido de la cita
            $table->unsignedBigInteger('dimensions_id'); // ID de dimensiones
            $table->string('email'); // Email de la cita
            $table->string('mobilenumber'); // Número de móvil de la cita
            $table->date('date'); // Número de móvil de la cita
            $table->time('hour'); // Hora de la cita
            $table->string('subjectCita'); // Asunto de la cita
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
