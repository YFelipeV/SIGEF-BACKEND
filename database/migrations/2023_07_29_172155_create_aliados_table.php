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
        Schema::create('aliados', function (Blueprint $table) {
            $table->id();
            $table->string('aliado', 150);
            $table->string('logotipo', 50)->nullable();
            $table->string('descripcion')->nullable();
            $table->string('telefono', 15);
            $table->string('correo', 50);
            $table->string('contacto_aliado', 100);
            $table->string('correo_contacto_aliado', 50);
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
        Schema::dropIfExists('aliados');
    }
};
