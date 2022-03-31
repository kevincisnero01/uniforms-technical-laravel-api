<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\OrderLarge;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLarge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->random();

        return [
            'id_user' => $users
        ];
    }
}
