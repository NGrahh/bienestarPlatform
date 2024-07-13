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
            $table->unsignedBigInteger('user_id'); // Llave foránea ID de Usuario
            $table->unsignedBigInteger('dimensions_id'); // ID de dimensiones
            $table->string('mobilenumber'); // Número de móvil de la cita
            $table->date('date'); // Número de móvil de la cita
            $table->time('hour'); // Hora de la cita
            $table->string('subjectCita'); // Asunto de la cita
            $table->boolean('status')->default(false);  // Estado de la cita, siempre va a tener un false, pasara a True cuando sea aceptada.
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
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
