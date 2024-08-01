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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('document')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('type_document_id');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('type_rh_id');
            $table->string('Program_id')->nullable();

            $table->string('yourToken')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->boolean('status')->default(true); 
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('type_rh_id')->references('id')->on('type_rhs');

            
            

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
