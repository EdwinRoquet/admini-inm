<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario')->nullable()->references('id')->on('vender_casas')->comment('referencia al dueño de la casa');
            $table->string('titulo')->nullable();
            $table->string('recamaras')->nullable();
            $table->uuid('uuid')->nullable();
            $table->string('baños')->nullable();
            $table->string('estacionamiento')->nullable();
            $table->string('estructura_cons')->nullable();
            $table->string('m_terreno')->nullable();
            $table->string('m_construccion')->nullable();
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
        Schema::dropIfExists('propiedads');
    }
}



// EXTRUCTURA CONSTUCCION
// ACABADOS
// ESPACIOS ARQUITECTONICOS (ESTANCIA/ COMEDOR)
// PISOS (FIRME DE CONCRETO)
// MUROS (DIRECTO, ARENA, ACABADO FINO)
// PLAFONES (LAMINA DE ASBESTO / PLAFON)
// BAÑOS
// ESCALERA
// PATIO SERVICIO
// ESTACIONAMIENTO
// FACHADA
// AGREGAR TABLA DE COMPARATIVOS DE PRECIOS (VALOR MAXIMO AVALUO)
// IMAGEN AVALUO
// METRO DE CONSTRUCCION
// METRO DE TERRENO

