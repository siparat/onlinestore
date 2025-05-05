<?php

namespace Vendor\OnlineStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vendor\OnlineStore\Models\Supplier;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'contact_email' => $this->faker->companyEmail(),
        ];
    }
}
