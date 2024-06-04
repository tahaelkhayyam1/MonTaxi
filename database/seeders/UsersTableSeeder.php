<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'testusera@example.com',
            'password' => Hash::make('password'),
            'role' => 'chauffeur', // or 'passager', 'chauffeur'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'testuserb@example.com',
            'password' => Hash::make('password'),
            'role' => 'passager', // or 'passager', 'chauffeur'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'testuserb@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // or 'passager', 'chauffeur'
        ]);
    }
}

