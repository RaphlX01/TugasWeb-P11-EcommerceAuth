<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array {
        $name = fake()->unique()->words(3, true);
        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(1, 99999),
            'description' => fake()->paragraphs(2, true),
            'price' => fake()->numberBetween(50000, 15000000),
            'stock' => fake()->numberBetween(1, 100),
            'published' => fake()->boolean(80),
        ];
    }
}