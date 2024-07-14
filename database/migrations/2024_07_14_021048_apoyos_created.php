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
            Schema::create('apoyos_createds', function (Blueprint $table) {
            $table->id();
            $table->string('appoiment_name');
            $table->string('appoiment_date_start');
            $table->string('appoiment_date_end');
            $table->string('appoiment_status')->default(true);
            $table->timestamps();
        });
        
        }
    
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('apoyos_createds');
        }
    };