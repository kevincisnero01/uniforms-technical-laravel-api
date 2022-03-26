<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Gama;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class FamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Family::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $family = Arr::random(['ACCESORIOS','UNIFORMIDAD','UTILLAJE','CALZADO','MOTORISTAS','CICLISTAS','CABALLERIA']);
        $gama = Gama::pluck('id_gama')->random();
        
        return [
            'familia' => $family,
    	    'id_gama' => $gama
        ];
    }
}
