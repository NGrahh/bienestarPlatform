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
        // Se crea la tabla en la base de datos con el nombre de 'programas'
        Schema::create('programas', function (Blueprint $table) { // nombre de la tabla
            $table->id();// id del pograma
            $table->string('name'); // nombre del programa
            $table->timestamps(); // fecha de actualización / creación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla de la base de datos en caso de que ya exista
        Schema::dropIfExists('programas');
    }
};
