<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::create([
            "phone_number" => "998919008070"
        ]);
        $address = new Address([
            "home" => "80A",
            "street" => "taraqqiyot ko'chasi",
            "city" => "Termiz shahri",
            "region" => "Surxondaryo viloyati",
            "latitude" => 10.584804, 
            "longitude" => 20.584068, 
        ]);
        $store->address()->save($address);
    }
}
