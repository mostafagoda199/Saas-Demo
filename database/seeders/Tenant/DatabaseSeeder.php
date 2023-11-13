<?php

namespace Database\Seeders\Tenant;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant\Currency;
use App\Models\Tenant\Order;
use App\Models\Tenant\Product;
use App\Models\Tenant\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Super Admin',
             'email' => 'super.admin@tenant.com',
         ]);

         Unit::factory()->create([
             'name' => 'Kilo',
             'slug' => 'kg',
         ]);

         Currency::factory()->create([
             'name' => 'Egypt Pound',
             'slug' => 'EGP',
         ]);

        Product::factory(10)->create();
        Order::factory(10)->create();
    }
}
