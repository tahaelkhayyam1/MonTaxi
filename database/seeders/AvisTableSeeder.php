<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Faker\Factory as Faker;

class AvisTableSeeder extends Seeder
{
    public function run()
    {
        // Create an instance of Faker
        $faker = Faker::create();

        // Use a loop to create 10 entries
        for ($i = 1; $i <= 10; $i++) {
            Review::create([
                'name' => $faker->name, // Generate a real name
                'review' => $faker->sentence, // Generate a fake review
                'rating' => rand(1, 5) // Generate a random rating between 1 and 5
            ]);
        }
    }
}
