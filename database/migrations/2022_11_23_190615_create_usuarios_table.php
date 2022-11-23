<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->Id();
            $table->unsignedInteger('tipo_documento_id');
            $table->integer('documento');
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100);
            $table->string('apellidos',150);
            $table->string('direccion',255);
            $table->string('telefono',10);
            $table->unsignedInteger('ciudad_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
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
        Schema::dropIfExists('usuarios');
    }
}
