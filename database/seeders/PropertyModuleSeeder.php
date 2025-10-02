<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_modules')->insert([
            ['property_module_name' => 'Shoe Rack', 'slug' => 'shoe-rack', 'property_type_id' => 1, 'property_area_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Cushion', 'slug' => 'cushion', 'property_type_id' => 1, 'property_area_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wall Partition', 'slug' => 'wall-partition', 'property_type_id' => 1, 'property_area_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wallpaper', 'slug' => 'wallpaper', 'property_type_id' => 1, 'property_area_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Bottom Unit', 'slug' => 'tv-bottom-unit', 'property_type_id' => 1, 'property_area_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Tall Unit', 'slug' => 'tv-tall-unit', 'property_type_id' => 1, 'property_area_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Wall Panelling', 'slug' => 'tv-wall-panelling', 'property_type_id' => 1, 'property_area_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wall Panelling', 'slug' => 'wall-panelling', 'property_type_id' => 1, 'property_area_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Shoe Rack', 'slug' => 'shoe-rack-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Cushion', 'slug' => 'cushion-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wall Partition', 'slug' => 'wall-partition-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wallpaper', 'slug' => 'wallpaper-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Bottom Unit', 'slug' => 'tv-bottom-unit-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Tall Unit', 'slug' => 'tv-tall-unit-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'TV Wall Panelling', 'slug' => 'tv-wall-panelling-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Wall Panelling', 'slug' => 'wall-panelling-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
