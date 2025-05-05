<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        return view('onlinestore::products.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('onlinestore::products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]));

        return redirect()->route('onlinestore.products.index');
    }

    public function show(Product $product)
    {
        return view('onlinestore::products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('onlinestore::products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]));

        return redirect()->route('onlinestore.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('onlinestore.products.index');
    }
}
