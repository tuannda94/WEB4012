<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'thumbnail_url' => $this->faker->imageUrl(200, 200),
            'quantity' => $this->faker->numberBetween(0, 30),
            'status' => $this->faker->numberBetween(0, 1),
            'category_id' => $this->faker->numberBetween(20, 30),
        ];
    }
}
