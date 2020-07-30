<?php

use Illuminate\Database\Seeder;
use App\Republic;
use App\Comment;

use Faker\Generator as Faker;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Republic::class,5)->create()->each(function ($republic){
            $comments= factory(App\Comment::class,2)->make();
            $republic->Comment()->saveMany($comments);
        });
    }
}
