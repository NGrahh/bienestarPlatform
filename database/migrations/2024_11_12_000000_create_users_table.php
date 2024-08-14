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
        // Se crea una nueva tabla dentro de la base de datos con el nombre de 'users'
        Schema::create('users', function (Blueprint $table) { // nombre de la tabla
            $table->id(); // id del usuario
            $table->string('name'); // nombre del usuario
            $table->string('lastname'); // apellido del usuario
            $table->string('user_name')->unique(); // nombre de usuario del usuario
            $table->string('email')->unique(); // email del usuario
            $table->string('document')->unique(); // documento del usuario (número del documento)
            $table->timestamp('email_verified_at')->nullable(); // fecha de verificación del usuario
            $table->unsignedBigInteger('type_document_id'); // id del tipo de documento
            $table->unsignedBigInteger('rol_id'); // rol que cumple el usuario dentro de la plataforma
            $table->unsignedBigInteger('type_rh_id'); // id del tipo de rh
            $table->string('Program_id')->nullable(); // id del programa al que pertenece el usuario (en caso de ser aprendiz)
            $table->string('numberphone')->unique(); // nombre del programa al que pertenece
            $table->string('yourToken')->nullable(); // Ficha programa formación del usuario
            $table->string('password'); // contraseña del usuario
            $table->rememberToken(); // token del usuario
            $table->timestamps(); // fecha de actualización / creación

            $table->boolean('status')->default(true); // status de activación del usuario
            $table->foreign('type_document_id')->references('id')->on('type_documents'); // id del tipo de documento
            $table->foreign('rol_id')->references('id')->on('roles'); // el rol que cumple el usuario dentro de la plataforma
            $table->foreign('type_rh_id')->references('id')->on('type_rhs'); // id de tipo de rh

            
            

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
