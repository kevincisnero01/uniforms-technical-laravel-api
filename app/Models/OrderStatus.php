<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = "pedidos_status";

    protected $primaryKey = "id_pedidos_status";

    protected $fillable = [
    	'status'
    ];
}
