<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $roles = Arr::random(['agente','admin','super_admin','master']);

        return [
            'rol' => $roles
        ];
    }
}
