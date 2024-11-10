<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer',
            'product_price' => 'required|numeric|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $product = Inventory::findOrFail($id);
        return view('inventory.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Inventory::findOrFail($id);
        return view('inventory.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer',
            'product_price' => 'required|numeric|min:0',
        ]);

        $product = Inventory::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Inventory::findOrFail($id);
        $product->delete();

        return redirect()->route('inventory.index')->with('success', 'Product deleted successfully.');
    }
}
