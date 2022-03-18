<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $primaryKey = "id_pedidos";

    protected $fillable = [
    	'id_user',
    	'total_pedido',
    	'id_pedidos_status',
    	'id_pedido_mayor'
    ];
}
