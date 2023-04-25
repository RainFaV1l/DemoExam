<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle,
            'short_text' => fake()->text(120),
            'text' => fake()->realText,
            'price' => fake()->numberBetween('1_000', '999_999'),
            'quantity' => fake()->numberBetween('0', 1000),
            'isPublished' => fake()->boolean(),
            'collection_id' => fake()->numberBetween(1, 20),
        ];
    }
}
