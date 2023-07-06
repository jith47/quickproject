<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 103),
            'like' => $this->faker->numberBetween(1, 20),
            'dislike' => 0,
            'given_by' => $this->faker->numberBetween(1, 103),
            // 'type' => $this->faker->numberBetween(1, 5),
        ];
    }
}
