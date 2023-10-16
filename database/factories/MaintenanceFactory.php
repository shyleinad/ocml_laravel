<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id'=>1,
            'vehicle_id'=>rand(1, 10),
            'mileage'=>123456,
            'date'=>fake()->date(), //now()->toDate(),
            'work_done'=>fake()->sentence(3),
            'changed_parts'=>fake()->text(50),
            'price'=>123456
        ];
    }
}
