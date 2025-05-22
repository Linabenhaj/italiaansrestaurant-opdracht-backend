<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'], 
            [
                'name' => 'admin',
                'password' => Hash::make('password'),
                'is_admin' => true
            ]
        );
    }
}
