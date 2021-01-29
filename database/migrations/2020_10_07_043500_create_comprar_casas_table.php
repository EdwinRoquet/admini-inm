<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprarCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprar_casas', function (Blueprint $table) {
            $table->id();
            $table->string('id_prospectador')->references('id')->on('users')->comment('El usuario que crea el prospecto');
            $table->string('nombre');
            $table->string('fec_nacimiento');
            $table->string('direccion')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('estado')->nullable();
            $table->string('imss');
            $table->string('curp');
            $table->string('rfc');
            $table->string('id_operacion')->references('id')->on('users')->comment('la operacion que recibe el prospecto');
            $table->string('tel')->nullable();
            $table->string('cel');
            $table->boolean('status')->default(false);
            $table->string('email')->nullable();
            $table->string('nota')->nullable();
            $table->string('id_metodo')->references('id')->on('users')->comment('El metodo que recibe el prospecto');
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
        Schema::dropIfExists('comprar_casas');
    }
}
