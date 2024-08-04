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
        // Se crea una tabla adentro de la base de datos con el nombrre 'type_rhs' 
        Schema::create('type_rhs', function (Blueprint $table) { // nombre de la tabla
            $table->id(); // id del tipo de rh (tipo de sangre)
            $table->string('name'); //nombre del tipo de RH (O+, A-, etc)
            $table->timestamps(); // fecha de actualización / creación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla de la base de datos en caso de que esta ya exista
        Schema::dropIfExists('type_rhs');
    }
};
