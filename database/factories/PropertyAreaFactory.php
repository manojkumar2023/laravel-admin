<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PropertyArea;
use App\Models\PropertyType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyArea>
 */
class PropertyAreaFactory extends Factory
{
    protected $model = PropertyArea::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_type_id' => PropertyType::factory(),
            'property_area_name' => fake()->word(),
            'slug' => fake()->slug(),
            'status' => 707,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
