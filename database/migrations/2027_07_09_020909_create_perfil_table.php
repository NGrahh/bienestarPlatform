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
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('pictureuser')->nullable();
            $table->text('about_me')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('Twitter_Profile')->nullable();
            $table->string('Linkedin_Profile')->nullable();
            $table->time('morning_start')->nullable();
            $table->time('morning_end')->nullable();
            $table->time('afternoon_start')->nullable();
            $table->time('afternoon_end')->nullable();
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