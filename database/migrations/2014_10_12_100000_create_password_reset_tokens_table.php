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
        // Retornamos la clase de las migraciones para así se pueda tomar como una misma (una migración)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se "dropea" la tabla si existe aún en la base de datos
        Schema::dropIfExists('password_reset_tokens');
    }
};
