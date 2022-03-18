<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    use HasFactory;

    protected $table = "tipo_tallas";

	protected $primaryKey = "id_tipo_talla";

    protected $fillable = [
	    'tipo_talla'
	];


	public function products()
    {
        return $this->hasMany(Product::class,'id_product');
    }

    public function tallas()
    {
        return $this->hasMany(Talla::class,'id_tipo_talla');
    }
}
