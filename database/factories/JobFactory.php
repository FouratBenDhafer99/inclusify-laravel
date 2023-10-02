<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'salaryRange' => $this->faker->randomElement(['$50,000 - $70,000', '$60,000 - $80,000', '$70,000 - $90,000']),
            'company' => $this->faker->company,
            'address' => $this->faker->address,
        ];
    }
}
