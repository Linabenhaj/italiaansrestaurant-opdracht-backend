<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'Hoe bestellen',
            'Betaling & factuur',
            'Bezorging',
            'Account & registratie',
            'Contact'
        ] as $name) {
            FaqCategory::updateOrCreate(['name' => $name]);
        }
    }
}
