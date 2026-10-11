<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin & Users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@test.com',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::factory(10)->create();

        // 2. Categories
        Category::factory(10)->create();

        // 3. Tags
        Tag::factory(15)->create();

        // 4. Products (50+)
        $products = Product::factory(60)->create();

        // 5. Attach random tags ke product
        $products->each(function ($product) {
            $product->tags()->attach(
                Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'),
                ['created_by' => 'seeder']
            );
        });

        // 6. Posts
        Post::factory(20)->create();

        // 7. Orders + Items
        Order::factory(15)->create()->each(function ($order) use ($products) {
            $order->items()->createMany(
                $products->random(rand(1, 4))->map(function ($product) {
                    return [
                        'product_id' => $product->id,
                        'quantity' => rand(1, 5),
                        'price' => $product->price,
                    ];
                })->toArray()
            );
        });
    }
}