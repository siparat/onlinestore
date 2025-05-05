<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    public function index()
    {
        return view('onlinestore::suppliers.index', ['suppliers' => Supplier::all()]);
    }

    public function create()
    {
        return view('onlinestore::suppliers.create');
    }

    public function store(Request $request)
    {
        Supplier::create($request->validate([
            'name' => 'required|string',
            'contact_email' => 'required|email'
        ]));

        return redirect()->route('onlinestore.suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        return view('onlinestore::suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('onlinestore::suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->validate([
            'name' => 'required|string',
            'contact_email' => 'required|email'
        ]));

        return redirect()->route('onlinestore.suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('onlinestore.suppliers.index');
    }
}
