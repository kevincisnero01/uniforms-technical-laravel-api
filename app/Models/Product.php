<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $primaryKey = "id_product";
    
    protected $fillable = [
    	'nombre',
    	'referencia',
    	'referencia_fab',
    	'id_subfamilia',
    	'men',
    	'woman',
    	'id_color',
    	'ref_color',
    	'id_marca',
    	'id_iva',
    	'precio',
    	'precio_iva',
    	'oferta',
    	'precio_promo',
    	'precio_promo_iva',
    	'desc_larga',
    	'id_tipo_talla',
		'use_qty',
		'visible',
    ];

    public function estaDisponible()
    {
        return $this->visible == 1;
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'id_product');
    }

    public function tipotalla()
    {
        return $this->belongsTo(TallaTipo::class,'id_tipo_talla');
    }
}
