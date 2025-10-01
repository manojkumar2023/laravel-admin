<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'mobile' => '1234567890',
            'first_name' => 'Test',
            'last_name' => 'User',
            'address' => '123 Test St, Test City, Test Country',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        Admin::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'mobile' => '0987654321',
        ]);

        $this->call(PropertyTypeSeeder::class);
        $this->call(PropertyOptionSeeder::class);
        $this->call(PropertyAreaSeeder::class);

    }
}
