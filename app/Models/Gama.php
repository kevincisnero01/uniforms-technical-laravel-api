<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gama extends Model
{
    use HasFactory;

    protected $table = 'gamas';

    protected $primaryKey = "id_gama";

    protected $fillable = [
    	'gama',
    	'id_region',
    	'descripcion',
    	'escudo',
    ];
}
