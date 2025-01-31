<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            StyleSeeder::class,
            MaterialSeeder::class,
            SizeSeeder::class,
            CountrySeeder::class,
            CollectionSeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            StoreSeeder::class,
            UserSeeder::class,
        ]);
    }
}
