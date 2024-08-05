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
        // Creamos una nueva tabla en base a una función, la cual se va a integrar en la base de datos
        Schema::create('personal_access_tokens', function (Blueprint $table) { // Nombre de la base de datos y creación de la misma
            $table->id(); // Id de la token personal para cada usuario
            $table->morphs('tokenable'); //
            $table->string('name'); // nombre del usuario
            $table->string('token', 64)->unique(); // token para cada usuario
            $table->text('abilities')->nullable(); //
            $table->timestamp('last_used_at')->nullable(); //
            $table->timestamp('expires_at')->nullable(); //
            $table->timestamps(); // Creación o uso de la token personal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ELiminamos la tabla de la base de datos en caso de que exista
        Schema::dropIfExists('personal_access_tokens');
    }
};
