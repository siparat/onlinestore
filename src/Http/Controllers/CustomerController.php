<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function index()
    {
        return view('onlinestore::customers.index', ['customers' => Customer::all()]);
    }

    public function create()
    {
        return view('onlinestore::customers.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email'
        ]));

        return redirect()->route('onlinestore.customers.index');
    }

    public function show(Customer $customer)
    {
        return view('onlinestore::customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('onlinestore::customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email,' . $customer->id
        ]));

        return redirect()->route('onlinestore.customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('onlinestore.customers.index');
    }
}