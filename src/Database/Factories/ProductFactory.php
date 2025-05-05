<?php
namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat(2, 10, 1000),
        'category_id' => 1,
        'supplier_id' => 1,
        'warehouse_id' => 1,
    ];
});