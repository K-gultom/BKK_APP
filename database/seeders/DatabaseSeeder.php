<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'adminBKK@gmail.com',
            'password' => Hash::make('BKKadminPLG'),
            'address' => 'Jl. Bandara',
            'phone' => '081277889900',
            'role' => 'admin',
        ]);
    }
}
