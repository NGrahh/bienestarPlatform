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
        // Crear la tabla `apoyos_createds`
        Schema::create('apoyos_createds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_apoyo_id'); // Columna para el ID del tipo de apoyo
            $table->date('appoiment_date_start');
            $table->date('appoiment_date_end');
            $table->string('status')->default('1'); // Cambiado de `1` a `'1'` para ser consistente con el tipo de dato string
            $table->timestamps();

            // Establecer la clave foránea
            $table->foreign('tipo_apoyo_id')->references('id')->on('tipos_apoyos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla `apoyos_createds`
        Schema::dropIfExists('apoyos_createds');
    }
};
