<?php

namespace Vendor\OnlineStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vendor\OnlineStore\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return ['name' => $this->faker->word()];
    }
}
