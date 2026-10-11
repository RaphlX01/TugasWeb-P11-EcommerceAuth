<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array {
        return [
            'user_id' => User::factory(),
            'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'done']),
            'total_price' => fake()->numberBetween(100000, 20000000),
            'shipping_address' => fake()->address(),
        ];
    }
}