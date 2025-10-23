<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $allowed = array_filter(config('admin.emails', [])); // buang yang kosong
        foreach ($allowed as $i => $email) {
            User::firstOrCreate(
                ['email' => $email],
                ['name' => 'Admin '.($i+1), 'password' => Hash::make('password-aman')]
            );
        }
        
    }
}
