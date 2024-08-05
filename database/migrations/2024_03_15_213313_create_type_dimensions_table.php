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
        // Se crea una nueva tabla dentro de la base de datos con el nombre de 'type_dimensions'
        Schema::create('type_dimensions', function (Blueprint $table) { // nombre de la tabla
            $table->id(); //id del área del que pertenece el usuario
            $table->string('name'); //nombre del tipo de dimensión / área
            $table->timestamps(); // fecha de creación / actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla de la base de datos en caso de que ya exista
        Schema::dropIfExists('type_dimensions');
    }
};
