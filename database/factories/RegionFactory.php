<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regiones = [
        'ALCOBENDAS',
        'LOS REALEJOS',
        'VILLANUEVA DE LA SERENA',
        'CORDOBA',
        'LLUCMAJOR',
        'Elda',
        'Catarroja'
        ];

        return [
            'region' => Arr::random($regiones)
        ];
    }
}
