<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'username' => 'adminuser', 
                'email_verified_at' => now(),
                'password' => Hash::make('Password!321'),
                'role' => 'admin',
            ]
        );
    }
}
