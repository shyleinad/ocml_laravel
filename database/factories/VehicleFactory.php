<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>1,
            'fuel_type_id'=>rand(1, 8),
            'vin'=>Str::random(17),
            'lic_plate'=>Str::random(6),
            'make'=>fake()->company(),
            'type'=>Str::random(3),
            'year_of_make'=>fake()->year(),
            'model_code'=>Str::random(2),
            'engine_code'=>Str::random(10),
            'engine_displacement'=>rand(50, 10000),
            'mot_expires'=>fake()->date(),
        ];
    }
}
