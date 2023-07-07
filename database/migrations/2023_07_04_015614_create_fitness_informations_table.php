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
        Schema::create('fitness_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('persons');
            $table->text('allergies')->nullable();
            $table->text('injuries')->nullable();
            $table->text('medical_condition')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitness_informations');
    }
};
