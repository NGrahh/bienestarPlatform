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
        // Tabla dentro de la base de datos con el nombre de 'users'
        Schema::create('users', function (Blueprint $table) {

            // Información básica del usuario
            $table->id(); // ID del usuario
            $table->string('name'); // Nombre del usuario
            $table->string('lastname'); // Apellido del usuario
            $table->string('user_name')->unique(); // Nombre de usuario
            $table->string('email')->unique(); // Email del usuario
            $table->string('document')->unique(); // Número del documento del usuario
            $table->string('numberphone')->unique(); // Número de teléfono del usuario
        
            // Relaciones y referencias
            $table->unsignedBigInteger('type_document_id'); // ID del tipo de documento
            $table->unsignedBigInteger('type_dimensions_id')->nullable(); // ID de las dimensiones del tipo de documento
            $table->unsignedBigInteger('rol_id'); // ID del rol que cumple el usuario
            $table->unsignedBigInteger('type_rh_id'); // ID del tipo de RH
            $table->string('Program_id')->nullable(); // ID del programa al que pertenece el usuario (en caso de ser aprendiz)
        
            // Autenticación y tokens
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación del email
            $table->string('yourToken')->nullable(); // Ficha del programa de formación del usuario
            $table->string('password'); // Contraseña del usuario
            $table->rememberToken(); // Token de "recordar usuario" (Remember Me)
        
            // Metadatos
            $table->boolean('status')->default(true); // Estado de activación del usuario
            $table->timestamps(); // Fechas de creación y actualización del registro
        
            // Definición de claves foráneas
            $table->foreign('type_document_id')->references('id')->on('type_documents'); // Relación con la tabla de tipos de documento
            $table->foreign('type_dimensions_id')->references('id')->on('type_dimensions'); // Relación con la tabla de dimensiones de tipo de documento
            $table->foreign('rol_id')->references('id')->on('roles'); // Relación con la tabla de roles
            $table->foreign('type_rh_id')->references('id')->on('type_rhs'); // Relación con la tabla de tipos de RH
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Se elimina la tabla de de datos en caso de que ya exista en la base de datos 
        Schema::dropIfExists('users');
    }
};
