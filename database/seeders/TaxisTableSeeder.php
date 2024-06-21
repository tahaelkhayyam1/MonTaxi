<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Taxi;
use App\Models\User;
use Faker\Factory as Faker;

class TaxisTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $chauffeurIds = User::where('role', 'chauffeur')->pluck('id')->all();

        foreach(range(1, 20) as $index) {
            Taxi::create([
                'marque' => $faker->company,
                'model_year' => $faker->year,
                'plate' => $faker->unique()->bothify('???-####'),
                'color' => $faker->safeColorName,
                'user_id' => $faker->randomElement($chauffeurIds),
            ]);
        }
    }
}
