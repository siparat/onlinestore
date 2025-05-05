<?php

use Illuminate\Support\Facades\Route;
use Vendor\OnlineStore\Http\Controllers\{
    ProductController, CategoryController, SupplierController,
    WarehouseController, CustomerController, OrderController
};

Route::middleware('web')
    ->prefix(config('onlinestore.route_prefix', 'store'))
    ->name('onlinestore.')
    ->group(function () {
        Route::resources([
            'products' => ProductController::class,
            'categories' => CategoryController::class,
            'suppliers' => SupplierController::class,
            'warehouses' => WarehouseController::class,
            'customers' => CustomerController::class,
            'orders' => OrderController::class,
        ]);
    });
