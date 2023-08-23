<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //fuel types seeding
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Benzin'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Dízel'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Elektromos'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Hibrid (Benzin)'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Hibrid (Dízel)'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Benzin/gáz'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Dízel/gáz'
        ]);
        \App\Models\Fuel_type::factory()->create([
            'fuel_type'=>'Hidrogén'
        ]);

        //vehicles seeding
        \App\Models\Vehicle::factory(10)->create();

        //maintenances seeding
        \App\Models\Maintenance::factory(10)->create();
    }
}
