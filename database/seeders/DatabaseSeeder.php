<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\FaqCategorySeeder;
use Database\Seeders\NewsItemsSeeder;
use Database\Seeders\PizzaSeeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            FaqCategorySeeder::class,
            NewsItemsSeeder::class,
            PizzaSeeder::class,        
        ]);
    }
}
