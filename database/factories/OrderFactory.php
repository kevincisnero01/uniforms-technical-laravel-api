<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderLarge;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->random();
        $pedidos_status = OrderStatus::pluck('id_pedidos_status')->random();
        $pedido_mayor = OrderLarge::pluck('id_pedido_mayor')->random();
        

        return [
            'id_user' => $users,
            'total_pedido' => random_int(1000,9999),
            'id_pedidos_status' => $pedidos_status,
            'id_pedido_mayor' =>  $pedido_mayor
        ];
    }
}
