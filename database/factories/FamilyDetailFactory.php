<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyDetail>
 */
class FamilyDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_of_head_of_family' => fake()->name(),
            'address_line_1' => fake()->address(),
            'taluk' => fake()->streetName(),
            'area' => fake()->streetName(),
            'phone_number' => fake()->phoneNumber(),
            'email_address' => fake()->safeEmail(),
            'category' => fake()->randomElement(['advaita','dwaita','vishisthadwaita']),
            'sub_category' => fake()->randomElement(['smartha', 'madhwa']),
            'gotra' => fake()->randomElement(['vyasa', 'angirasa', 'kaashyapa', 'vasistha', 'gouthama', 'bharadwaja']),
            'veda' => fake()->randomElement(['rig', 'yajur', 'sama']),
        ];
    }
}
