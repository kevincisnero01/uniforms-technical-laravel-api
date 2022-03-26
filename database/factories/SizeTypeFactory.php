<?php

namespace Database\Factories;

use App\Models\SizeType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SizeTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SizeType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipotalla = Arr::random(['Calzados','Camisa','Cinturones','Galones','Gorras', 'Mano','Pantalones','Polo Manga Corta','Unica']);

        return [
            'tipo_talla' => $tipotalla
        ];
    }
}
