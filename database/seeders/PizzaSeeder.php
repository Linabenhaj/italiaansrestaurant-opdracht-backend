<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['Margherita',       8.50, 'pizza_margherita.jpg'],
            ['Pepperoni',       10.00, 'pizza_pepperoni.jpg'],
            ['Vegetariana',      9.50, 'pizza_vegetariana.jpg'],
            ['Quattro Formaggi',11.00, 'pizza_quattro_formaggi.jpg'],
            ['Hawaïana',         9.00, 'pizza_hawaiana.jpg'],
            ['BBQ Chicken',     11.50, 'pizza_bbq_chicken.jpg'],
        ];

        foreach ($data as [$name, $price, $file]) {
            Pizza::updateOrCreate(
                ['name' => $name],
                [
                    'price'      => $price,
                    'image_path' => $file,  
                ]
            );
        }
    }
}
