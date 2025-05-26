<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsItem;

class NewsItemsSeeder extends Seeder
{
    public function run()
    {
        NewsItem::updateOrCreate(
          ['title' => 'Eerste demo-item'],
          [
            'content'      => 'Dit is de inhoud van het eerste demo-nieuwsitem.',
            'published_at' => now()->subDays(2),
            'image_path'   => 'news/demo1.jpg',
          ]
        );
        NewsItem::updateOrCreate(
          ['title' => 'Tweede demo-item'],
          [
            'content'      => 'Dit is de inhoud van het tweede demo-nieuwsitem.',
            'published_at' => now()->subDay(),
            'image_path'   => 'news/demo2.jpg',
          ]
        );
    }
}
