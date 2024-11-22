<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Display all inventory items
    public function index()
    {
        $inventories = Inventory::all();
        return view('Manager.Inventory', compact('inventories'));
    }

    // Show the form for creating a new item
    public function create()
    {
        return view('Manager.AddInventory');
    }

    // Store a newly created item in the database
    public function store(Request $request)
    {
        $request->validate([
            'Itm_id' => 'required|unique:inventories',
            'it_name' => 'required',
            'quantity' => 'required|integer',
            'it_images' => 'nullable|array',
        ]);

        // Handle file uploads (if any)
        if ($request->hasFile('it_images')) {
            $uploadedFiles = [];
            foreach ($request->file('it_images') as $file) {
                $uploadedFiles[] = $file->store('images', 'public');
            }
            $request['it_images'] = $uploadedFiles;
        }
        

        Inventory::create($request->all());
        return redirect()->route('inventory.index')->with('success', 'Item added successfully!');
    }

    // Show the form for editing an existing item
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('Manager.EditInventory', compact('inventory'));
    }

    // Update an existing item
    public function update(Request $request, $id)
    {
        $request->validate([
            'Itm_id' => 'required|unique:inventories,Itm_id,' . $id,
            'it_name' => 'required',
            'quantity' => 'required|integer',
            'it_images' => 'nullable|array',
        ]);

        $inventory = Inventory::findOrFail($id);

        // Handle file uploads (if any)
        if ($request->hasFile('it_images')) {
            $uploadedFiles = [];
            foreach ($request->file('it_images') as $file) {
                $uploadedFiles[] = $file->store('images', 'public');
            }
            $request['it_images'] = $uploadedFiles;
        }

        $inventory->update($request->all());
        return redirect()->route('inventory.index')->with('success', 'Item updated successfully!');
    }

    // Delete an item
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully!');
    }
}
