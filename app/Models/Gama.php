<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Region;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region');
    }
}
