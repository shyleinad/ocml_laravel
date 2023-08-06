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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id(); //id of the vehicle record
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //user of the vehicle
            $table->string('vin'); //vin of the vehicle
            $table->string('lic_plate'); //licence plate string of the vehicle
            $table->string('make'); //make of the vehicle
            $table->string('type'); //type of the vehicle
            $table->string('year_of_make'); //year of make of the car
            $table->string('model_code'); //model code of the vehicle
            $table->string('engine_code'); //engine code of the vehicle
            $table->int('engine_displacement'); //engine displacement of the vehicle
            $table->string('fuel_type'); //fuel type of the vehicle
            $table->string('mot_expires'); //when the mot of the vehicle expires
            $table->timestamps(); //record added timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
