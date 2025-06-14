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
        Schema::create('sity', function (Blueprint $table) {
            $table->id()->primary();
            $table->string("name_sity")->nullable();
            $table->string("latintude", 10, 7)->nullable();# Широта 
            $table->string("longitude", 10, 7)->nullable();# Долгота 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sity');
    }
};
