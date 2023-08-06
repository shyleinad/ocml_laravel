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
        Schema::create('docs', function (Blueprint $table) {
            $table->id(); //id of the doc record
            $table->foreignId('maintenance_id')->constrained()->onDelete('cascade'); //the maintenance which to the doc belongs
            $table->path('doc_path'); //the path of the document
            $table->timestamps(); //record added timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docs');
    }
};
