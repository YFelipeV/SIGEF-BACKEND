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
        Schema::create('competencia', function (Blueprint $table) {
            $table->id();
            $table->string('competencia', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('descripcion')->nullable();
            $table->string('lugar', 50)->nullable();
            $table->string('direccion', 50);
            $table->foreignId('centro_formacion_id')->nullable()->constrained('centros_formacion');
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
        Schema::dropIfExists('competencia');
    }
};
