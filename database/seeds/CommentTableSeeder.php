<?php

use Illuminate\Database\Seeder;
use App\comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Let's truncate our existing records to start from scratch.
        comment::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 1; $i++) {
            comment::create([
                'filmid' => $faker->sentence,
                'name' => $faker->sentence,
                'comment' => $faker->sentence,
               
            ]);
        }        //
    }
}
