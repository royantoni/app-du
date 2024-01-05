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
        Schema::create('ecuela_profesionales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sede')->nullable();
            $table->string('sigla')->nullable();
            $table->timestamps();

            //Restricciones de clave externa
            $table->foreignId('facultade_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecuela_profesionales');
    }
};
