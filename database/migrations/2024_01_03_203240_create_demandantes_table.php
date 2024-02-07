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
        Schema::create('demandantes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('codigo')->unique()->nullable();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('domicilio')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->timestamps();

            $table->foreignId('ecuela_profesionale_id')->nullable()->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandantes');
    }
};
