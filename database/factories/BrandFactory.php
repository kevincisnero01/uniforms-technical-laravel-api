<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand_generate = $this->faker->word(1);
        
        return [
            'marca' => 'Marca '. $brand_generate,
            'web'=> 'https://www.'.$brand_generate.'.com',
            'destacada' => 0,
            'Visible' => 1,
            'descripcion' => 'Fabricante de'.$brand_generate,
        ];
    }
}
