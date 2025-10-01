<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PropertyOption;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyOption>
 */
class PropertyOptionFactory extends Factory
{
    protected $model = PropertyOption::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_type_id' => PropertyOption::factory(),
            'property_option_name' => fake()->word(),
            'slug' => fake()->slug(),
            'status' => 707,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
