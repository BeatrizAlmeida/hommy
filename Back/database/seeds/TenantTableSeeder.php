<?php

use Illuminate\Database\Seeder;
use App\Tenant;
use App\Republic;
use Faker\Generator as Faker;
class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Tenant::class,5)->create()->each(function($tenant){
            $republics= factory(App\Republic::class,1)->make();
            $republics->tenants()->attach($tenant);
        });

    }
}
