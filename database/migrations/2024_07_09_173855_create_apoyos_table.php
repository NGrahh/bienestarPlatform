<?php

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
        Schema::create('apoyos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('mobilenumber');
        $table->string('formatuser');
        $table->string('photocopy');
        $table->string('receipt');
        $table->string('sisben');
        $table->string('support')->nullable();
        $table->string('status')->default(true); // Estado de la cuenta;
        $table->timestamps();

        $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apoyos');
    }
};
