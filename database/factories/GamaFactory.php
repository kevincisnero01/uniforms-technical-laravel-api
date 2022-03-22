<?php

namespace Database\Factories;

use App\Models\Gama;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gama::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catalog = Str::upper($this->faker->word(1));

        return [
            "gama" => "CATALOGO " . $catalog,
            "id_region" => "1",
            "descripcion" => "DESCRIPCIÓN DE " . $catalog,
            "escudo" => $this->faker->randomElement(['AAA','BBB','CCC'])
        ];
    }
}
