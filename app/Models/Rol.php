<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rols';

    protected $primaryKey = 'id_rol';

    protected $fillable = ['rol'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}