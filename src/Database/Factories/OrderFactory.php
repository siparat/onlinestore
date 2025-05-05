<?php

namespace Vendor\OnlineStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vendor\OnlineStore\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => 1,
            'status' => 'pending',
        ];
    }
}
