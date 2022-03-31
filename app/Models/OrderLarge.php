<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLarge extends Model
{
    use HasFactory;

    protected $table = "pedido_mayor";

    protected $primaryKey = "id_pedido_mayor";

    protected $fillable = [
    	'id_user'
    ];
}
