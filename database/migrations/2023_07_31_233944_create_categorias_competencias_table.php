<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_competencias', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('numero_participantes');
            $table->smallInteger('cantidad_grupos');
            $table->foreignId('categoria_habilidad_id')->nullable()->constrained('categoria_habilidad');
            $table->foreignId('competencia_id')->nullable()->constrained('competencia');
            $table->foreignId('modalidad_id')->nullable()->constrained('modalidad');
            $table->timestamp('creado_en');
            $table->timestamp('actualizado_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_competencias');
    }
};
