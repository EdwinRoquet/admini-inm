<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaluosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaluos', function (Blueprint $table) {
            $table->id();
            $table->string('id_propiedad')->references('id')->on('propiedads')->comment('La casa');
            $table->string('id_usuario')->references('id')->on('users')->comment('El prospectador que vende casa');
            $table->string('ruta_plano')->nullable();
            $table->string('expediente');
            $table->string('status');
            $table->uuid('uuid');
            $table->string('valor');
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
        Schema::dropIfExists('avaluos');
    }
}
