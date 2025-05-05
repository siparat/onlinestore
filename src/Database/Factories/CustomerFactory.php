<?php

namespace Vendor\OnlineStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vendor\OnlineStore\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
