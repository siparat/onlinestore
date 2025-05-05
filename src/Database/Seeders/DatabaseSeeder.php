<?php

namespace Vendor\OnlineStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Vendor\OnlineStore\Models\{Category, Supplier, Warehouse, Product, Customer, Order};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::factory(5)->create();
        $suppliers = Supplier::factory(5)->create();
        $warehouses = Warehouse::factory(3)->create();
        $customers = Customer::factory(10)->create();

        Product::factory(30)->create([
            'category_id' => $categories->random()->id,
            'supplier_id' => $suppliers->random()->id,
            'warehouse_id' => $warehouses->random()->id,
        ]);

        Order::factory(5)->create([
            'customer_id' => $customers->random()->id,
        ])->each(function ($order) {
            $order->products()->attach([
                rand(1, 5) => ['quantity' => rand(1, 3)],
                rand(6, 10) => ['quantity' => rand(1, 2)],
            ]);
        });
    }
}
