<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_options')->insert([
            ['property_option_name' => '1BHK', 'slug' => '1bhk', 'property_type_id' => 1, 'status' => 707],
            ['property_option_name' => '2BHK', 'slug' => '2bhk', 'property_type_id' => 1, 'status' => 707],
            ['property_option_name' => '3BHK', 'slug' => '3bhk', 'property_type_id' => 1, 'status' => 707],
            ['property_option_name' => '4BHK', 'slug' => '4bhk', 'property_type_id' => 1, 'status' => 707],
            ['property_option_name' => '5BHK', 'slug' => '5bhk', 'property_type_id' => 1, 'status' => 707],
            ['property_option_name' => 'Ground Floor', 'slug' => 'ground-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'First Floor', 'slug' => 'first-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'Second Floor', 'slug' => 'second-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'Third Floor', 'slug' => 'third-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'Fourth Floor', 'slug' => 'fourth-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'Fifth Floor', 'slug' => 'fifth-floor', 'property_type_id' => 2, 'status' => 707],
            ['property_option_name' => 'Sixth Floor', 'slug' => 'sixth-floor', 'property_type_id' => 2, 'status' => 707],
        ]);
    }
}
