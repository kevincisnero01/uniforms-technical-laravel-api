<?php

namespace Database\Factories;

use App\Models\Iva;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class IvaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ivas = [
            'Excento' => 0.00,
            'IGIC 1' => 2.00,
            'Iva básico' => 4.00,
            'IGIC2' => 5.00,
            'Iva Reducido' => 10.00,
            'Iva general' => 21.00,
        ];
        $iva_key  = array_rand($ivas,1);

        return [
            'descripcion' =>  $iva_key,
            'porcentaje' => $ivas[$iva_key]
        ];
    }
}
