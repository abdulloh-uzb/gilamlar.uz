<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Style::create(["name_uz" => "Klassik dizayn", "name_ru" => "Классические"]);
        Style::create(["name_uz" => "Neoklassik dizayn", "name_ru" => "Неоклассические"]);
        Style::create(["name_uz" => "Zamonaviy dizayn", "name_ru" => "Современные"]);
        Style::create(["name_uz" => "Bolalar dizayni", "name_ru" => "Детские"]);

    }
}
