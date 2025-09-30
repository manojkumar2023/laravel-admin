<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;
use Illuminate\Support\Str;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Apartment',
            'Villa',
            'Office',
            'Spa Salon',
            'Cafe Restaurant',
            'Commercial',
        ];

        foreach ($types as $type) {
            PropertyType::factory()->create([
                'property_type_name' => $type,
                'slug' => Str::slug($type),
                'status' => 707,
            ]);
        }
    }
}
