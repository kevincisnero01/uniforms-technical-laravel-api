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
use App\Models\OrderLarge;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\Product;
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
        $this->call(IvaSeeder::class);
        OrderStatus::factory(10)->create();
        OrderLarge::factory(10)->create();
        Order::factory(20)->create();
        Product::factory(10)->create();
        $this->call(LoginSeeder::class);
    }
}
