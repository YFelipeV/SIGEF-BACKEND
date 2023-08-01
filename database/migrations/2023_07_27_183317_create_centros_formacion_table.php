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
        Schema::create('centros_formacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regional_id')->nullable()->constrained('regionales');
            $table->string('centro_formacion');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('subdirector');
            $table->string('correo_subdirector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centros_formacion');
    }
};
