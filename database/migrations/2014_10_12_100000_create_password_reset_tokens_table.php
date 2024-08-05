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
        Schema::create('password_reset_tokens', function (Blueprint $table) { // NOmbre de la base de datos y creación
            $table->string('email')->primary(); // Email para restablecer la contraseña
            $table->string('token'); // Token para verificación del email con la contraseña
            $table->timestamp('created_at')->nullable(); // Fecha de cuando se creó y se restableció dicha contraseña
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
