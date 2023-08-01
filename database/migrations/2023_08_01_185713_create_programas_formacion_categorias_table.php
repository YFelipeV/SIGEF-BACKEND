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
        Schema::create('programas_formacion_categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programaformaciones_id')->nullable()->constrained('programas_formaciones');
            $table->foreignId('categoriahabilidades_id')->nullable()->constrained('categoria_habilidad');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programa_formacion_categoria_habilidades');
    }
};
