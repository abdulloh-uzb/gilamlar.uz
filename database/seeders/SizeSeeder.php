<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create(["shape" => "tortburchak", "width" => 150, "height" => 200]);
        Size::create(["shape" => "tortburchak", "width" => 150, "height" => 250]);
        Size::create(["shape" => "tortburchak", "width" => 250, "height" => 350]);
        Size::create(["shape" => "tortburchak", "width" => 300, "height" => 400]);

        Size::create(["shape" => "dumaloq", "diametr" => 60]);
        Size::create(["shape" => "dumaloq", "diametr" => 80]);
        Size::create(["shape" => "dumaloq", "diametr" => 140]);

    }
}
