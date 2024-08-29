<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carousel_images', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Almacena la ruta de la imagen
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carousel_images');
    }
};
