<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente')->references('id')->on('comprar_casas')->comment('El prospecto');
            $table->string('id_admin')->references('id')->on('users')->comment('El usuario que atendio el seguimiento');
            $table->string('capacidad_compra');
            $table->string('des_mensual');
            $table->string('reembolso');
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
        Schema::dropIfExists('seguimientos');
    }
}
