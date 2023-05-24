<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->email,
            'customer_phone' => $this->faker->phoneNumber,
            'delivery_address' => $this->faker->address,
            'note' => $this->faker->text,
            'status' => $this->faker->randomElement(Order::statuses()),
            'created_at' => $this->faker->dateTimeBetween('-2 year'),
            'updated_at' => $this->faker->dateTimeBetween('-2 year'),
        ];
    }
}
