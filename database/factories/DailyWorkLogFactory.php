<?php

namespace Database\Factories;

use App\Models\FamilyDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyWorkLog>
 */
class DailyWorkLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataImportStatus =fake()->randomElement(['NOT_STARTED', 'IN_PROGRESS', 'COMPLETED', 'FAILED', 'CANCELLED']);
        return [
            'data_import_status' => $dataImportStatus,
            'uploaded_file_url' => fake()->url(),
            'no_of_rows' => $dataImportStatus == 'COMPLETED' ? fake()->numberBetween(1, 500) : null,
            'user_id' => fake()->randomElement(User::whereNotIn('id', [1, 2])->get()->pluck('id')),
            'uploaded_filetype' => fake()->randomElement(['App\Models\FamilyDetail', 'App\Models\FamilyMemberDetail'])
        ];
    }
}
