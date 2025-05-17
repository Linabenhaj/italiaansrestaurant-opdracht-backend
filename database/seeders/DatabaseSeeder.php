<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run():void
    {
        $this->call(AdminSeeder::class);
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);
    }
}

