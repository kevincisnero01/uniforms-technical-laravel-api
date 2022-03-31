<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ivas')->insert([
            ['descripcion' => 'Excento',
            'porcentaje' => 0.00],
            ['descripcion' => 'IGIC 1',
            'porcentaje' => 3.00],
            ['descripcion' => 'Iva básico',
            'porcentaje' => 4.00],
            ['descripcion' => 'IGIC 2',
            'porcentaje' => 5.00],
            ['descripcion' => 'Iva Reducido',
            'porcentaje' => 10.00],
            ['descripcion' => 'Iva general',
            'porcentaje' => 21.00],
        ]);
    }
}
