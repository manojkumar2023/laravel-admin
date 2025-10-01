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
            ['property_module_name' => 'Foyer Area', 'slug' => 'foyer-area-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Living Room', 'slug' => 'living-room-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Dining Room', 'slug' => 'dining-room-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Kitchen', 'slug' => 'kitchen-2', 'property_type_id' => 2, 'property_area_id' => 9, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Utility Area', 'slug' => 'utility-area-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Master Washroom', 'slug' => 'master-washroom-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Common Washroom', 'slug' => 'common-washroom-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_module_name' => 'Master Bedroom', 'slug' => 'master-bedroom-2', 'property_type_id' => 2, 'property_area_id' => 10, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
