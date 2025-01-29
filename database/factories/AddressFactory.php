<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "home" => random_int(1, 100) . fake()->regexify('[A-Z]') . " - uy",
            "street" => fake()->streetName(),
            "city" => fake()->city(),
            "region" => fake()->state(),
            "latitude" => fake()->latitude(),
            "longitude" => fake()->longitude()
        ];
    }
}
