<?php

namespace Database\Factories;

use App\Models\Size;
use App\Models\SizeType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $talla = Arr::random(['XS','S','M','L','X', 'XL','Unica']);
        $tipotallas = SizeType::pluck('id_tipo_talla')->random();

        return [
            'talla' => $talla,
            'id_tipo_talla' => $tipotallas,
        ];
    }
}
