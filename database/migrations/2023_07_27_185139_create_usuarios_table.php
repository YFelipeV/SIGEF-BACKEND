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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', '20')->nullable();
            $table->string('nombres', '50')->nullable();
            $table->string('apellidos', '50')->nullable();
            $table->string('telefono', '15')->nullable();
            $table->string('correo', '50');
            $table->timestamp('correo_verificado_en')->nullable();
            $table->string('password');
            $table->boolean('estado')->default(true);
            $table->rememberToken();
            $table->timestamp('creado_en');
            $table->timestamp('actualizado_en');
            $table->foreignId('rol_id')->nullable()->constrained('roles');
            $table->foreignId('centro_formacion_id')->nullable()->constrained('centros_formacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
