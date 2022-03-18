<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "marcas";

	protected $primaryKey = "id_marca";

    protected $fillable = [
	    'marca',
	    'web',
	    'destacada',
	    'visible',
	    'descripcion'
    ];
}
