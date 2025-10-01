<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PropertyArea;
use App\Models\PropertyModule;
use App\Models\PropertyType;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyModule>
 */
class PropertyModuleFactory extends Factory
{
    protected $model = PropertyModule::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_type_id' => PropertyType::factory(),
            'property_area_id' => PropertyArea::factory(),
            'property_module_name' => fake()->word(),
            'slug' => fake()->slug(),
            'status' => 707,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
