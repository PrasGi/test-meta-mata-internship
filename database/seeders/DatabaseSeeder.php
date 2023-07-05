<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'nama' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}