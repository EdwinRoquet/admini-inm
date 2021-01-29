<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesors', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario')->references('id')->on('users')->comment('El usuario que asesora');
            $table->string('id_perfil')->references('id')->on('perfil_vendedors')->comment('El perfil del prospecto venta');
            $table->string('pago_mes');
            $table->string('monto');
            $table->string('de_predial');
            $table->string('de_agua');
            $table->string('de_luz');
            $table->string('nota');
            $table->string('otros');
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
        Schema::dropIfExists('asesors');
    }
}
