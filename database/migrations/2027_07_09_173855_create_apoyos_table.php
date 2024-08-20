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
        // Se crea la tabla en la base de datos con el nombre 'apoyos'
        Schema::create('apoyos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('apoyo_id'); // Agregar el campo 'apoyo_id'
        $table->unsignedBigInteger('user_id');
        $table->string('formatuser');
        $table->string('photocopy');
        $table->string('receipt');
        $table->string('sisben');
        $table->string('support')->nullable();
        $table->string('status')->default(true);
        $table->timestamps();

        $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        
        $table->foreign('apoyo_id')
                ->references('id')
                ->on('apoyos_createds')
                ->onDelete('cascade');        
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se elimina la tabla en la base de datos en caso de que ya exista
        Schema::dropIfExists('apoyos');
    }
};
