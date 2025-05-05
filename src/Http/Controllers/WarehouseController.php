<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends BaseController
{
    public function index()
    {
        return view('onlinestore::warehouses.index', ['warehouses' => Warehouse::all()]);
    }

    public function create()
    {
        return view('onlinestore::warehouses.create');
    }

    public function store(Request $request)
    {
        Warehouse::create($request->validate([
            'name' => 'required|string',
            'location' => 'required|string'
        ]));

        return redirect()->route('onlinestore.warehouses.index');
    }

    public function show(Warehouse $warehouse)
    {
        return view('onlinestore::warehouses.show', compact('warehouse'));
    }

    public function edit(Warehouse $warehouse)
    {
        return view('onlinestore::warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $warehouse->update($request->validate([
            'name' => 'required|string',
            'location' => 'required|string'
        ]));

        return redirect()->route('onlinestore.warehouses.index');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('onlinestore.warehouses.index');
    }
}