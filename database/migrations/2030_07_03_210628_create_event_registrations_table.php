<?php
// Habilitamos el uso de la migración para que pueda ser usada y migrada dentro de la base de datos
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    function up(): void
    {
        // Se crea una nueva tabla en la base de datos con el nombre 'event_resgistrations'
        Schema::create('event_registrations', function (Blueprint $table) { // nombre de la tabla 
            $table->id(); // id del registro del evento
            $table->unsignedBigInteger('user_id'); // id del usuario al que está registrado en el evento
            $table->unsignedBigInteger('event_id'); // id del evento correspondiente
            $table->timestamps(); // fecha de actualización y creación

            // Definir las claves foráneas
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        // Se elimina la tabla de la base de datos en caso de que ya exista
        Schema::dropIfExists('event_registrations');
    }
}; 