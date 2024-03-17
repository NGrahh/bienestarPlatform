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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('document')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('type_document_id');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('type_rh_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('type_rh_id')->references('id')->on('type_rhs');
            $table->string('trainingProgram')->nullable();
            $table->string('yourToken')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
