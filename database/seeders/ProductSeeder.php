<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $product = Product::create([
            "title" => "anatolian silk 1329",
            "description" => "Anatolian Silk — gilamlari anʼanaviy naqshlar va zamonaviy ranglar o‘rtasidagi mukammal muvozanatni taqdim etadi. Gilamlarning estetik jozibasi har qanday interyerga mos kelishini ta’minlaydi.",
            "collection_id" => 1,
            "pile_height" => 5,
            "material_id" => 1,
            "style_id" => 1,
        ]);
        $variant = new ProductVariant([
            "color_id" => 4,
            "size_id" => 4,
            "base_price" => 3.5,
            "quantity" => 10
        ]);

        $image = new Image([
            'path' => 'gilam1.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 1024,
        ]);
        $product->variants()->save($variant);
        $variant->images()->save($image);

        $variant = new ProductVariant([
            "color_id" => 1,
            "size_id" => 1,
            "base_price" => 5.5,
            "quantity" => 3
        ]);

        $image = new Image([
            'path' => 'gilam2.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 1024,
        ]);
        $product->variants()->save($variant);
        $variant->images()->save($image);


    }
}
