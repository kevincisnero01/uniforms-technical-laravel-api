<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Gama;
use App\Models\Rol;
use App\Models\User;
use App\Models\Brand;
use App\Models\Family;
use App\Models\Size;
use App\Models\SizeType;
use App\Models\SubFamily;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        
        Region::factory(10)->create();
        Gama::factory(10)->create();
        Rol::factory(4)->create();
        User::factory(10)->create();
        Brand::factory(10)->create();
        Family::factory(10)->create();
        SubFamily::factory(10)->create();
        SizeType::factory(10)->create();
        Size::factory(10)->create();
        $this->call(LoginSeeder::class);
    }
}
