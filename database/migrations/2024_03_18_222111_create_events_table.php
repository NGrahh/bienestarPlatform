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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('eventname'); // Nombre del evento
            $table->string('picture'); // Imagen del evento
            $table->date('eventdate'); // Fecha del evento
            $table->integer('eventlimit'); // Límite de asistentes
            $table->date('datestar'); // Fecha de inicio del evento
            $table->date('dateendevent'); // Fecha de fin del evento
            $table->string('Subjectevent'); // Asunto del evento
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
