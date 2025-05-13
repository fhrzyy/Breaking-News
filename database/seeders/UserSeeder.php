<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Risqi',
            'email' => 'admin@example.com', 
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Create Guru 1
        User::create([
            'name' => 'Futiha',
            'email' => 'futiha@example.com', // Email diganti agar unique
            'password' => Hash::make('password123'),
            'role' => 'guru'
        ]);
        
        // Create Guru 2  
        User::create([
            'name' => 'AhmadShafwur',
            'email' => 'ahmad@example.com', // Email diganti agar unique
            'password' => Hash::make('password222'),
            'role' => 'guru'
        ]);
    }
}