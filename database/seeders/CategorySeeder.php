<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["name_uz" => "Gilam", "name_ru" => "Ковры" ]);
        Category::create(["name_uz" => "Kovrolin", "name_ru" => "Ковролин"]);
    }
}
