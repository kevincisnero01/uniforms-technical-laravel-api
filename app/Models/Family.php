<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'familias';

    protected $primaryKey = "id_familia";

    protected $fillable = [
    	'familia',
    	'id_gama'
    ];
}
