<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(["name_uz" => "Qizil", "name_ru" => "Красный"]);
        Color::create(["name_uz" => "Qora", "name_ru" => "Черный"]);
        Color::create(["name_uz" => "Oq", "name_ru" => "Белый"]);
        Color::create(["name_uz" => "Ko'k", "name_ru" => "Синий"]);

    }
}
