<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = Collection::create([
            "name_uz" => "anatolian silk",
            "name_ru" => "анатолиан силк",
            "category_id" => 1,
            "country_id" => 1 
            ]
        );
        $image = new Image([
            'path' => 'https://picsum.photos/640/480',
            'mime_type' => 'image/jpeg',
            'size' => 5432,
        ]);
        $collection->image()->save($image);

        $collection = Collection::create([
            "name_uz" => "movarounnahr",
            "name_ru" => "мовароуннаҳр",
            "category_id" => 1,
            "country_id" => 1 
            ]
        );
        $image = new Image([
            'path' => 'https://picsum.photos/800/400',
            'mime_type' => 'image/jpeg',
            'size' => 5432,
        ]);
        $collection->image()->save($image);

        $collection = Collection::create([
            "name_uz" => "cristal",
            "name_ru" => "кристал",
            "category_id" => 2,
            "country_id" => 1 
            ]
        );

         $image = new Image([
            'path' => 'https://picsum.photos/400/400',
            'mime_type' => 'image/jpeg',
            'size' => 5432,
        ]);
        $collection->image()->save($image);

    }
}
