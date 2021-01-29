<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('t_credito');
            $table->string('id_propiedad')->references('id')->on('propiedads')->comment('referencia al dueño de la casa');
            $table->string('id_usuario')->references('id')->on('users')->comment('usuario final');
            $table->string('id_perfil')->references('id')->on('seguimientos')->comment('usuario final');
            $table->string('nombre_empresa');
            $table->string('tel_empresa');
            $table->string('reg_patronal');
            $table->string('extension');
            $table->string('clave_inter');
            $table->uuid('uuid');
            $table->string('taller');
            $table->string('nota');
            $table->string('refer_uno')->nullable();
            $table->string('refer_dos')->nullable();
            $table->string('refer_tres')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
