<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'images' => json_encode(['image1.jpg', 'image2.jpg']),
            'status' => $this->faker->randomElement(['available', 'sold', 'order pending']),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'buyprice' => $this->faker->randomFloat(2, 10, 1000),
            'category_id' => Category::factory(), 
            'user_id' => \App\Models\User::factory(), 
        ];
    }
}
