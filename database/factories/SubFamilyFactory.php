<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\SubFamily;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
class SubFamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubFamily::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subfamilia = Arr::random([
            'BOLSO TACTICO POLICIAL','CALCETINES','CALZADO','CARTERA PORTADOCUMENTOS','CASCO',
            'GORRA FAENA','PRENDAS DE ABRIGO','PRENDAS DE GALA','PRENDAS DE MOTORISTA','UNIFORME FAENA'
        ]);

        $familia = Family::pluck('id_familia')->random();

        return [
            'subfamilia' => $subfamilia,
            'id_familia' => $familia
        ];
    }
}



