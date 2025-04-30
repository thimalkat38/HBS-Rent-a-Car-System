<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    // Display all inventory items
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;
    
        $searchName = $request->input('search_name');
        $searchId = $request->input('search_id');
    
        // Begin query scoped by business_id
        $query = Inventory::where('business_id', $businessId);
    
        // Apply additional filters
        if ($searchName) {
            $query->where('it_name', 'LIKE', "%{$searchName}%");
        }
    
        if ($searchId) {
            $query->where('Itm_id', 'LIKE', "%{$searchId}%");
        }
    
        // Paginate results
        $inventories = $query->paginate(10);
    
        return view('Manager.Inventory', compact('inventories', 'searchName', 'searchId'));
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
            'it_name' => 'required',
            'quantity' => 'required|integer',
            'date'=> 'nullable|string',
            'price_per_unit'=> 'nullable|string',
            'total_price' => 'nullable|string',
            'it_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $businessId = Auth::user()->business_id;
    
        // Generate the next Itm_id
        $lastInventory = Inventory::orderBy('Itm_id', 'desc')->first();
        $nextId = $lastInventory ? intval(substr($lastInventory->Itm_id, 3)) + 1 : 1;
        $nextItmId = 'Itm' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    
        // Handle file uploads (if any)
        $images = [];
        if ($request->hasFile('it_images')) {
            foreach ($request->file('it_images') as $file) {
                $path = $file->store('it_images', 'public');
                $images[] = $path;
            }
        }
    
        // Create a new inventory record with the processed data
        Inventory::create([
            'Itm_id' => $nextItmId,
            'it_name' => $request->input('it_name'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'price_per_unit' => $request->input('price_per_unit'),
            'total_price' => $request->input('total_price'),
            'it_images' => json_encode($images), // Store images as JSON
            'business_id' => $businessId,
        ]);
    
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
            'date'=> 'nullable|string',
            'price_per_unit'=> 'nullable|string',
            'total_price' => 'nullable|string',
            'it_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $inventory = Inventory::findOrFail($id);
    
        // Decode the existing it_images JSON into an array
        $images = $inventory->it_images ? json_decode($inventory->it_images, true) : [];
    
        // Handle new file uploads
        if ($request->hasFile('it_images')) {
            // Delete old images from storage
            if (!empty($images)) {
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
    
            // Upload new images
            $images = [];
            foreach ($request->file('it_images') as $file) {
                $path = $file->store('it_images', 'public');
                $images[] = $path;
            }
        }
    
        // Update inventory record
        $inventory->update([
            'Itm_id' => $request->input('Itm_id'),
            'it_name' => $request->input('it_name'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'price_per_unit' => $request->input('price_per_unit'),
            'total_price' => $request->input('total_price'),
            'it_images' => json_encode($images), // Save new image paths as JSON
        ]);
    
        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully!');
    }
           
    // Delete an item
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully!');
    }
}
