<?php

namespace Database\Factories;

use App\Models\Rol;
use App\Models\Gama;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phones = ['0416','0426','0412','0414','0424'];
        $rols = Rol::pluck('id_rol')->random();
        $gamas = Gama::pluck('id_gama')->random();

        return [
        'NIF'  => Str::random(9),
        'placa' => $this->faker->randomNumber(5,true),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'name' => $this->faker->name(),
        'apellido'=> $this->faker->name(),  
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        'activo' => 1,
        'telefono1' => $this->faker->randomElement($phones) .'-'. $this->faker->randomNumber(7,true),
        'telefono2' => $this->faker->phoneNumber(),
        'id_rol' => $rols ,
        'id_gama' => $gamas,
        'puntos' => rand(1,10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
