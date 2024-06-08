<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class AvisTableSeeder extends Seeder
{
    public function run()
    {
        // Use a loop to create 10 entries
        for ($i = 1; $i <= 10; $i++) {
            Review::create([
                'name' => 'Test User ' . $i, // Each user will have a unique name
                'review' => 'testuser' . $i . '@example.com', // Each user will have a unique email
                'rating' => rand(1, 5) // Generate a random rating between 1 and 5
            ]);
        }
    }
}
