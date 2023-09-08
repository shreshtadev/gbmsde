<?php

namespace Database\Factories;

use App\Models\FamilyDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyMemberDetail>
 */
class FamilyMemberDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $age = fake()->numberBetween(1, 120);
        return [
            'member_name' => fake()->name(),
            'related_as' => fake()->numberBetween(0, 8),
            'is_married' => $age > 25 ? fake()->randomElement([true, false]) : false,
            'age' => $age,
            'email_address' => fake()->safeEmail(),
            'phone_number' => fake()->e164PhoneNumber(),
            'education_occupation_details' => $age > 25 ? fake()->jobTitle() . '@' . fake()->company() : fake()->sentence() . '@' . fake()->company() . ' major in' . fake()->word() . ' yearof ' . fake()->numberBetween(2000, date('Y')),
            'family_detail_id' => fake()->randomElement([...FamilyDetail::all()->pluck('id')])
        ];
    }
}
