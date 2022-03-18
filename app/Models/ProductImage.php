<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'products_img';
    
    protected $primaryKey = "id_img";

    protected $fillable = [
    	'id_product',
    	'url'
    ]; 

    public function product()
    {
    	return $this->belongsTo('App\Produc','id_product');
    }
}
