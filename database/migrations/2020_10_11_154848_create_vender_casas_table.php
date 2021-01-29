<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenderCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vender_casas', function (Blueprint $table) {
            $table->id();
            $table->string('id_prospectador')->references('id')->on('users')->comment('El usuario que crea el prospecto');
            $table->string('nombre');
            $table->string('fec_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('estado')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('imss');
            $table->string('curp');
            $table->string('rfc');
            $table->string('id_operacion')->references('id')->on('users')->comment('la operacion que recibe el prospecto');
            $table->string('tel')->nullable();
            $table->string('cel');
            $table->string('email');
            $table->boolean('status')->default(false);
            $table->uuid('uuid');
            $table->string('predial')->nullable();
            $table->string('c_agua')->nullable();
            $table->string('c_luz')->nullable();
            $table->string('nota')->nullable();
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
        Schema::dropIfExists('vender_casas');
    }
}
