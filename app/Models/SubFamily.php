<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFamily extends Model
{
    use HasFactory;

    protected $table = 'subfamilias';
    
    protected $primaryKey = "id_subfamilia";

    protected $fillable = [
    	'subfamilia',
    	'id_familia'
    ];
}
