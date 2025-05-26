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
                'username'   => 'admin',
                'name'       => 'Admin Gebruiker',
                'password'   => Hash::make('Password!321'),
                'is_admin'   => 1,
            ]
        );
    }
}
