<?php

namespace App\Models;

use App\Models\Gama;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Region extends Model
{
    use HasFactory;

    protected $table = 'regiones';
    
    protected $primaryKey = "id_region";

    protected $fillable = [
    	'region',
    	'visible'
    ];
    
    public function gamas()
    {
        return $this->hasMany(Gama::class);
    }
}
