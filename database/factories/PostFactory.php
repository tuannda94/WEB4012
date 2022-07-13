<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'classroom_id' => rand(1, 10),
            'content' => $this->faker->text(),
            'status' => rand(0, 1)
        ];
    }
}
