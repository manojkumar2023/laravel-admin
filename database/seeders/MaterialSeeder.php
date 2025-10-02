<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            ['material_name' => 'Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)', 'slug' => 'carcass-plywood-mr-19mm-shutter-hdhmr-19mm', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Carcass - Plywood BWP (19mm) Shutter - HDHMR (19mm)', 'slug' => 'carcass-plywood-bwp-19mm-shutter-hdhmr-19mm', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Carcass - Plywood MR (19mm)', 'slug' => 'carcass-plywood-mr-19mm', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Carcass - Plywood BWP (19mm)', 'slug' => 'carcass-plywood-bwp-19mm', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Carcass - Plywood MR (19mm) Shutter - Profile Shutter', 'slug' => 'carcass-plywood-mr-19mm-shutter-profile-shutter', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Carcass - Plywood BWP (19mm) Shutter - Profile Shutter', 'slug' => 'carcass-plywood-bwp-19mm-shutter-profile-shutter', 'property_type_id' => 1, 'property_area_id' => 1, 'property_module_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'MDF', 'slug' => 'mdf', 'property_type_id' => 2, 'property_area_id' => 9, 'property_module_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'HDHMR', 'slug' => 'hdhmr', 'property_type_id' => 2, 'property_area_id' => 9, 'property_module_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Wallpaper (Per Roll)', 'slug' => 'wallpaper-per-roll', 'property_type_id' => 2, 'property_area_id' => 10, 'property_module_id' => 13, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['material_name' => 'Customised Wallpaper (Per Roll)', 'slug' => 'customised-wallpaper-per-roll', 'property_type_id' => 2, 'property_area_id' => 10, 'property_module_id' => 13, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
