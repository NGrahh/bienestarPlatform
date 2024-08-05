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
        // Se crea una nueva tabla en la base de datos con el nombre de 'perfil'
        Schema::create('perfil', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary(); // id del perfil de usuario
            $table->string('pictureuser')->nullable(); // fotografía del perfil que tendrá el usuario
            $table->text('about_me')->nullable(); // descripción que tiene que el perfil del usuario
            $table->string('phone_number')->nullable(); // teléfono del usuario
            $table->string('Twitter_Profile')->nullable(); // twitter del perfill (redes sociales)
            $table->string('Linkedin_Profile')->nullable(); // Linkedin del perfill (redes sociales)
            $table->time('morning_start')->nullable(); // inicio de  jornada en la que se encuentra el usuario (disponible en el perfil, a que horas inicia)
            $table->time('morning_end')->nullable(); //  jornada a la que finaliza la jornada del usuario
            $table->time('afternoon_start')->nullable(); // 
            $table->time('afternoon_end')->nullable(); // 
            $table->timestamps();

            // Añade la restricción si user_id hace referencia a la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla de la base de datos en caso de que ya exista
        Schema::dropIfExists('perfil');
    }
};