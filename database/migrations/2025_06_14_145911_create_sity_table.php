<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string("latintude")->nullable();# Широта 
            $table->string("longitude")->nullable();# Долгота 
            $table->timestamps();
        });

        DB::table('sity')->insert([
            'name_sity' => 'Балашиха',
            'latintude' => '55°48′00″',
            'longitude' => '37°56′00″'
        ]);


        DB::table('sity')->insert([
            'name_sity' => 'Химки',
            'latintude' => '55°53′21″',
            'longitude' => '37°26′42″'
        ]);


        DB::table('sity')->insert([
            'name_sity' => 'Москва',
            'latintude' => '55°45′02″',
            'longitude' => '37°37′03″'
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sity');
    }
};

