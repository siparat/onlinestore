<?php

namespace Vendor\OnlineStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vendor\OnlineStore\Models\Warehouse;

class WarehouseFactory extends Factory
{
    protected $model = Warehouse::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'location' => $this->faker->address(),
        ];
    }
}
