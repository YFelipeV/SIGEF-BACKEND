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
        Schema::create('programas_formaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_programa', 15);
            $table->string('programa_formacion',150);
            $table->string('version',5);
            $table->smallInteger('duracion');
           
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas_formaciones');
    }
};
