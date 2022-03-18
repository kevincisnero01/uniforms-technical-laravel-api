<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "shopping_cart";

    protected $primaryKey = "id_cart_item";

    protected $fillable = [
    	'id_user',
    	'id_product',
    	'talla',
    	'nombre',
    	'precio',
    	'precio_iva',
    	'observaciones',
    	'qty',
    	'id_pedidos'
    ];
}
