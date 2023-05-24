<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $model = Item::query()->inRandomOrder()->first();
        return [
            'order_id' => OrderFactory::new(),
            'item_id' => $model->id,
            'qty' => $this->faker->numberBetween(1, 5),
            'price' => $model->price,
            'created_at' => $this->faker->dateTimeBetween('-2 year'),
            'updated_at' => $this->faker->dateTimeBetween('-2 year'),
        ];
    }
}
