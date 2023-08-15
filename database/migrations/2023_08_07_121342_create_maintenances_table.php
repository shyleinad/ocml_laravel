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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id(); //id of the maintenance record
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //user of the maintenance record
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade'); //vehicle of the maintenance record
            $table->integer('mileage'); //milage: when the work was done
            $table->date('date'); //date: when the work was done
            $table->string('work_done'); //what was done (oil change for example)
            $table->string('changed_parts'); //changed parts
            $table->boolean('public'); //record is public or not
            $table->timestamps(); //record added timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
