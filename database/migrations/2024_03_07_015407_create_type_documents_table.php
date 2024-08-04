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
        // Se crea una nueva tabla dentro de la base de datos con el nombre de 'type_documents'
        Schema::create('type_documents', function (Blueprint $table) { // nombre de la base la tabla
            $table->id(); // id del tipo de documento
            $table->string('name'); //el nombre del documento
            $table->timestamps(); //fechas de creación/ actualizción
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla en la base de datos en caso de que esta ya exista
        Schema::dropIfExists('type_documents');
    }
};
