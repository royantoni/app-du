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
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->text('descripcion_echos');
            $table->text('derechos_estimen_afectados')->nullable();
            $table->string('pdf')->nullable();
            $table->string('word')->nullable();
            $table->string('observacion')->nullable();
            $table->integer('estado')->default(0);
            $table->timestamps();

            $table->foreignId('demandante_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('quejado_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
