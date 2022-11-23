<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->Id();
            $table->string('placa',6);
            $table->unsignedInteger('color_id');
            $table->string('marca',200);
            $table->unsignedInteger('tipo_vehiculo_id');
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('propietario_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('color_id')->references('id')->on('colores');
            $table->foreign('tipo_vehiculo_id')->references('id')->on('tipos_vehiculos');
            $table->foreign('conductor_id')->references('id')->on('usuarios');
            $table->foreign('propietario_id')->references('id')->on('usuarios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
