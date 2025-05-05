<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('onlinestore::categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('onlinestore::categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->validate(['name' => 'required|string']));
        return redirect()->route('onlinestore.categories.index');
    }

    public function show(Category $category)
    {
        return view('onlinestore::categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('onlinestore::categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->validate(['name' => 'required|string']));
        return redirect()->route('onlinestore.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('onlinestore.categories.index');
    }
}
