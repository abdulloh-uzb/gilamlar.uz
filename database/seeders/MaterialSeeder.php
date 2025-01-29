<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create(["name_uz" => "Paxta", "name_ru" => "Хлопок"]);
        Material::create(["name_uz"=> "Yun", "name_ru" => "Шерсть"]);
        Material::create(["name_uz" => "Poliester", "name_ru" => "Полиэстер"]);
        Material::create(["name_uz" => "Sintetika", "name_ru" => "Синтетика"]);
    }
}
