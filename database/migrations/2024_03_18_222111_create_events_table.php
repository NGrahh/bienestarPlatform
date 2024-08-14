<?php

// Habilitamos el uso de la migración para que pueda ser usada y migrada dentro de la base de datos
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
        // Se crea una tabla dentro de la base de datos con el nombre de 'events'
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('eventname'); // Nombre del evento
            $table->string('picture'); // Imagen del evento
            $table->string('place'); // Imagen del evento
            $table->date('eventdate'); // Fecha del evento
            $table->integer('eventlimit'); // Límite de asistentes
            $table->date('datestar'); // Fecha de inicio del evento
            $table->date('dateendevent'); // Fecha de fin del evento
            $table->string('Subjectevent'); // Asunto del evento
            $table->boolean('status')->default(true); // Estado de la cuenta
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
