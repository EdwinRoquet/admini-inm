<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_vendedors', function (Blueprint $table) {
            $table->id();
            $table->string('id_vendedor')->references('id')->on('vender_casas')->comment('El prospecto que vende casa');
            $table->string('id_admin')->references('id')->on('users')->comment('El usuario que atendio el seguimiento');
            $table->string('deuda');
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
        Schema::dropIfExists('perfil_vendedors');
    }
}
