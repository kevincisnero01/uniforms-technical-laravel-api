<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class OrderStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = Arr::random([
            'NUEVO',
            'RECHAZADO',
            'APROBADO',
            'ENVIADO',
            'EN PRODUCCION',
            'CON RETRASO',
            'ENTREGADO',
            'PARCIALMENTE ENTREGADO',
            'INCIDENCIAS EN TRANSPORTE',
            'PEDIDO RECEPCIONADO'
        ]);

        return [
            'status' => $status
        ];
    }
}
