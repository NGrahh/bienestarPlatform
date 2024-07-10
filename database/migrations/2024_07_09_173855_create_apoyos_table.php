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
        $table->string('name');
        $table->string('lastname');
        $table->string('email');
        $table->string('mobilenumber');
        $table->string('formatuser');
        $table->string('photocopy');
        $table->string('receipt');
        $table->string('sisben');
        // $table->unsignedBigInteger('user_id');
        // $table->foreign('user_id')->references('id')->on('user  s')->onDelete('cascade');
        $table->timestamps();
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
