<?php

// Habilitamos el uso de la migración para que pueda ser usada y migrada dentro de la base de datos
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retornamos la clase de las migraciones para así se pueda tomar como una misma (una migración)
return new class extends Migration
{
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            // Creamos una nueva tabla adentro de la base datos en base a una función de Laravel
            Schema::create('apoyos_createds', function (Blueprint $table) {
            $table->id();
            $table->string('appoiment_name');
            $table->date('appoiment_date_start');
            $table->date('appoiment_date_end');
            $table->boolean('appoiment_status')->default(true);
            $table->timestamps();
        });
        
        }
    
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            // Se elimina la tabla en caso de que esta exista 
            Schema::dropIfExists('apoyos_createds');
        }
    };