<?php

namespace Database\Seeders;

use App\Models\Operacion;
use Illuminate\Database\Seeder;

class OperacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operaciones = [
            'COMPRA',
            'TRASPASO',
            'RENTA',
        ];

            foreach ($operaciones as $operacion) {

                $op = new Operacion();
                $op->nombre = $operacion;
                $op->save();

            }
    }
}
