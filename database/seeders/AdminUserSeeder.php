<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create Admin account
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // plain password = password
                'is_admin' => true,
            ]
        );

        // Create another admin account
        User::updateOrCreate(
            ['email' => 'theary11@gmail.com'],
            [
                'name' => 'Theary',
                'password' => Hash::make('123456'), // plain password = 123456
                'is_admin' => true,
            ]
        );
    }
}
