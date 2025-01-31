<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(["name_uz" => "O'zbekiston", "name_ru" => "Узбекистан"]);
        Country::create(["name_uz" => "Eron", "name_ru" => "Иран"]);

    }
}
