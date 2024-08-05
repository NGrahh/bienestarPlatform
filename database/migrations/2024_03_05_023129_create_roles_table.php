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
        //Se crea una nueva tabla dentro de la base de datos con el nombre 'roles'
        Schema::create('roles', function (Blueprint $table) { // Nombre y creación de la base de datos
            $table->id(); // id de los roles
            $table->string('name'); // nombre de los roles
            $table->timestamps(); // fecha/tiempo de la creación de los roles
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Elimina la tabla en la base de datos en caso de que ya exista
        Schema::dropIfExists('roles');
    }
};
