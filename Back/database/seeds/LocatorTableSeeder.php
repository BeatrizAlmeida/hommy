<?php

use Illuminate\Database\Seeder;
use App\Locator;
use Faker\Generator as Faker;
use App\Republic;


class LocatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory (App\Locator::class,5)->create()->each(function($locator){
            $republics= factory(App\Republic::class,1)->make();
            $locator->Republic()->saveMany($republics);
        });
    }
}
