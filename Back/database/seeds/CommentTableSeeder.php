<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Generator as Faker;
use App\Republic;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Comment::class,5)->create()->each(function($comment){
            $republics= factory(App\Republic::class,1)->make();
        });
    }
}
