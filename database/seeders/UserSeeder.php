<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'full_name' => "abdulloh usmonov",
            'email' => "usmonovabdulloh87@gmail.com",
            'phone_number' => "919663427",
            'password' => Hash::make("12345678"),
            'role' => "owner"
        ]);

        $address = new Address([
            "home" => "27B",
            "street" => "ibn sino ko'chasi",
            "city" => "Termiz shahri",
            "region" => "Surxondaryo viloyati",
            "latitude" => 75.581823, 
            "longitude" => 29.542058, 
        ]);

        $user->address()->save($address);

    }
}
