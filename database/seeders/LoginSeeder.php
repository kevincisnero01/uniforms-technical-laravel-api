<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 104,
            'NIF' => 54321,
            'placa' =>4321,
            'email' => 'test1@api.com',
            'email_verified_at'  => NULL,
            'name'  => 'Tester',
            'apellido'  => 'Admin', 
            'password'  => '$2y$10$gdV9HlECpQ8lOMJjum56.eyVYQ4XNKX865YdwaBkkDwDOmDPVy7t2',
            'activo'  => 1,
            'telefono1'  => '0412-1111111',
            'telefono2'  => '0412-2222222',
            'id_rol'  => 1,
            'id_gama'  => 1,
            'puntos'  => 1000,
        ]);

        DB::table('personal_access_tokens')->insert([
            'tokenable_type' => 'App\\Models\\User',
            'tokenable_id' => '104',
            'name' => 'test1@api.com',
            'token' => '6359922827c3159960e17c9d43d56d6102d4b3cf7f12392ede4aa1585a82c120',
            'abilities' => '["*"]'
        ]);
    }
}
