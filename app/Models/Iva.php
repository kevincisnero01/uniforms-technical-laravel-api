<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    use HasFactory;
    
    protected $table = "ivas";

	protected $primaryKey = "id_iva";

    protected $fillable = [
	    'descripcion',
	    'porcentaje'
    ];
}
