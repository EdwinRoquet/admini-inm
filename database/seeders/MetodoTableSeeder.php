<?php

namespace Database\Seeders;

use App\Models\Metedo;
use Illuminate\Database\Seeder;

class MetodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metodos = [
        "NINGUNO",
        "CONTADO",
        "INFONAVIT",
        "FOVISSSTE",
        "BANCO",
        "ISSFAM",
        "BANJERCITO",
        "PEMEX",
        "2° INFONAVIT",
        "RESPALDADOS FOVISSSTE",
    ];

        foreach ($metodos as $metodo) {

            $met = new Metedo();
            $met->nombre = $metodo;
            $met->save();

        }


    }
}
