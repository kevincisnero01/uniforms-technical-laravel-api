<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = "tallas";

	protected $primaryKey = "id_talla";

    protected $fillable = [
	    'talla',
	    'id_tipo_talla'
    ];

    public function tipotalla()
    {
        return $this->belongsTo(TallaTipo::class,'id_tipo_talla');
    }
}
