<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
                User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );
    }
}