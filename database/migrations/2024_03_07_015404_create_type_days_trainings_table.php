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
        // Creamos una nueva tabla en la base de datos con el nombre de 'type_day_training'
        Schema::create('type_day_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // En caso de que exista la base de datos se eliminará
        Schema::dropIfExists('type_day_trainings');
    }
};
