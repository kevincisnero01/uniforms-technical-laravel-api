<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USUARIO_ACTIVO = '1';
    const USUARIO_INACTIVO = '0';

    const USUARIO_AGENTE = '1';
    const USUARIO_ADMIN = '2';
    const USUARIO_SUPER_ADMIN = '3';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'NIF',
        'placa',
        'email',
        'email_verified_at',
        'name',
        'apellido',  
        'password',
        'activo',
        'telefono1',
        'telefono2',
        'foto',
        'id_rol',
        'id_gama',
        'puntos',
        'current_team_id',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'password_unhashed',
        'api_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
