<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $name = $this->faker->name();
        $slug = Str::slug($name, '-');

        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 1),
            'slug' => $slug
        ];
    }
}
