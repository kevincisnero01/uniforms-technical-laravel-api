<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $table = 'stock_producto';
    
    protected $primaryKey = ['id_img','id_talla'];
    public $incrementing = false;

    protected $fillable = [
    	'id_product',
    	'id_talla',
    	'qty'
    ]; 
}
