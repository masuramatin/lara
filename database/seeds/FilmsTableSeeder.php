<?php

use Illuminate\Database\Seeder;
use App\film;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        film::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 3; $i++) {
            film::create([
                'name' => $faker->sentence,
                'description' => $faker->sentence,
                'release_date' => $faker->sentence,
                'rating' => $faker->sentence,                
                'ticket_price' => $faker->sentence,
                'country' => $faker->sentence,                
                'genre' => $faker->sentence,
                'photo' => $faker->sentence,                
            ]);
        }
    }
}
