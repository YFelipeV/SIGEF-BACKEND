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
        Schema::create('aliado_categoria_habilidades', function (Blueprint $table) {
            $table->id();
            $table->timestamp('creado_en');
            $table->timestamp('actualizado_en');
            $table->foreignId('categoria_habilidad_id')->nullable()->constrained('categoria_habilidad')->onDelete('cascade');
            $table->foreignId('aliado_id')->nullable()->constrained('aliados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aliado_categoria_habilidades');
    }
};
