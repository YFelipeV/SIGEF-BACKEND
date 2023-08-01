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
        Schema::create('modulos_roles', function (Blueprint $table) {
            $table->id();
            $table->char('permiso', '1')->nullable();
            $table->foreignId('modulo_id')->nullable()->constrained('modulos');
            $table->foreignId('roles_id')->nullable()->constrained('roles');
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
        Schema::dropIfExists('modulos_roles');
    }
};
