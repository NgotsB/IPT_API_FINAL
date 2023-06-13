<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Java', 'HTML', 'C++', 'Javascript', 'PHP', 'Flutter', 'Laravel']),
            'level' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'instructions' => $this->faker->sentence(),
        ];
  
    }
}
