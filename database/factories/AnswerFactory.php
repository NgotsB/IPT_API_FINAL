<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'letter' => $this->faker->randomElement(['a', 'b', 'c', 'd']),
            'content' => $this->faker->sentence(),
            'is_correct' => $this->faker->randomElement([false]),
        ];
    }
}

