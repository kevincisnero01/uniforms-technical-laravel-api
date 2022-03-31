<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Iva;
use App\Models\Product;
use App\Models\SizeType;
use App\Models\SubFamily;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subfamilia = SubFamily::pluck('id_subfamilia')->random();
        $color = Color::pluck('id_color')->random();
        $color_ref = Color::find($color);
        $marca = Brand::pluck('id_marca')->random();
        $tipo_talla = SizeType::pluck('id_tipo_talla')->random();


        $iva = Iva::all()->random();
        $precio = Arr::random([100,200,300,400,500,600,700,800,900,1000]);

        if($iva->descripcion != "Exento"){
            $iva_calc = $precio * $iva->porcentaje / 100;
            $precio_iva = $precio + $iva_calc ;
        }
        
        return [
            'nombre' => "Producto ".$this->faker->name(),
            'referencia' => rand(100,999),
            'referencia_fab'=> rand(100,999),
            'id_subfamilia' =>  $subfamilia,
            'men' => rand(0,1),
            'woman' => rand(0,1),
            'id_color' => $color,
            'ref_color' => $color_ref->color_name,
            'id_marca' =>  $marca,
            'id_iva'=> $iva->id_iva,
            'precio' => $precio,
            'precio_iva' => $precio_iva,
            'oferta' => 0,
            'precio_promo' => 0,
            'precio_promo_iva' => 0,
            'desc_larga' => "Este articulo es especial",
            'id_tipo_talla' => $tipo_talla,
            'use_qty' => 1,
            'visible' => 1,
        ];
    }
}
