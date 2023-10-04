<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'score' => $this->faker->numberBetween(0, 5),
            'isSuccessful' =>$this->faker->boolean(),
            'skill_id' => 16,
            'user_id' => 1
        ];
    }
}
