<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\PropertyArea;
use App\Models\PropertyModule;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    protected $model = Material::class;
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
            'property_module_id' => PropertyModule::factory(),
            'material_name' => fake()->word(),
            'slug' => fake()->slug(),
            'status' => 707,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
