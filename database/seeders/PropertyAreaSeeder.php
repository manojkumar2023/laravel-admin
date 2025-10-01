<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_areas')->insert([
            ['property_area_name' => 'Foyer Area', 'slug' => 'foyer-area', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Living Room', 'slug' => 'living-room', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Dining Room', 'slug' => 'dining-room', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Kitchen', 'slug' => 'kitchen', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Utility Area', 'slug' => 'utility-area', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Master Washroom', 'slug' => 'master-washroom', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Common Washroom', 'slug' => 'common-washroom', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Master Bedroom', 'slug' => 'master-bedroom', 'property_type_id' => 1, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Foyer Area', 'slug' => 'foyer-area-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Living Room', 'slug' => 'living-room-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Dining Room', 'slug' => 'dining-room-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Kitchen', 'slug' => 'kitchen-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Utility Area', 'slug' => 'utility-area-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Master Washroom', 'slug' => 'master-washroom-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Common Washroom', 'slug' => 'common-washroom-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
            ['property_area_name' => 'Master Bedroom', 'slug' => 'master-bedroom-2', 'property_type_id' => 2, 'status' => 707, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
