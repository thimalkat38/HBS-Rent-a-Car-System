<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\IssuedItem;
use App\Models\Grn;
use App\Models\GrnItem;
use App\Models\StockBatch;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{
    protected function generateNextItemId($businessId)
    {
        $lastItem = Inventory::where('business_id', $businessId)
            ->orderByRaw('CAST(SUBSTRING(Itm_id, 4) AS UNSIGNED) DESC')
            ->first();

        $nextId = 1;
        if ($lastItem && preg_match('/ITM(\d+)/', $lastItem->Itm_id, $matches)) {
            $nextId = intval($matches[1]) + 1;
        }

        return 'ITM' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Inventory::with('batches')->where('business_id', $businessId);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('Itm_id', 'LIKE', "%{$search}%")
                  ->orWhere('it_name', 'LIKE', "%{$search}%");
            });
        }

        $inventories = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('Manager.Inventory', compact('inventories'));
    }

    public function filter_table(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Inventory::with('batches')->where('business_id', $businessId);

        // Apply filters
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('Itm_id', 'LIKE', "%{$search}%")
                  ->orWhere('it_name', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            switch ($request->status) {
                case 'low_stock':
                    $query->lowStock();
                    break;
                case 'out_of_stock':
                    $query->outOfStock();
                    break;
                case 'in_stock':
                    $query->whereHas('batches', function ($q) {
                        $q->where('quantity', '>', 0);
                    });
                    break;
            }
        }

        $inventories = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('Manager.Inventory', compact('inventories'));
    }

    public function create()
    {
        return view('Manager.AddInventory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'it_name' => 'required|string|max:255',
            'quantity' => 'nullable|integer|min:0',
            'min_quantity' => 'nullable|integer|min:0',
            'date' => 'nullable|date',
            'price_per_unit' => 'required|numeric|min:0',
            'it_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $businessId = Auth::user()->business_id;

        try {
            DB::beginTransaction();

            $nextItmId = $this->generateNextItemId($businessId);

            $images = [];
            if ($request->hasFile('it_images')) {
                foreach ($request->file('it_images') as $file) {
                    $path = $file->store('it_images', 'public');
                    $images[] = $path;
                }
            }

            $inventory = Inventory::create([
                'Itm_id' => $nextItmId,
                'it_name' => $request->input('it_name'),
                'min_quantity' => $request->input('min_quantity'),
                'date' => $request->input('date', now()->format('Y-m-d')),
                'it_images' => !empty($images) ? json_encode($images) : null,
                'business_id' => $businessId,
            ]);

            // Create stock batch only if quantity is provided
            if ($request->filled('quantity') && $request->input('quantity') > 0) {
                $batchId = StockBatch::generateNextBatchId($inventory->id);
                StockBatch::create([
                    'inventory_id' => $inventory->id,
                    'batch_id' => $batchId,
                    'quantity' => $request->input('quantity'),
                    'unit_price' => $request->input('price_per_unit'),
                    'batch_value' => $request->input('quantity') * $request->input('price_per_unit'),
                ]);
            }

            DB::commit();
            return redirect()->route('inventory.index')->with('success', 'Item added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Inventory creation failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to add item: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        return view('Manager.EditInventory', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        $request->validate([
            'Itm_id' => 'required|string|unique:inventories,Itm_id,' . $id . ',id,business_id,' . Auth::user()->business_id,
            'it_name' => 'required|string|max:255',
            'min_quantity' => 'nullable|integer|min:0',
            'date' => 'nullable|date',
            'it_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $images = $inventory->it_images ? json_decode($inventory->it_images, true) : [];

            if ($request->hasFile('it_images')) {
                if (!empty($images)) {
                    foreach ($images as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }
                $images = [];
                foreach ($request->file('it_images') as $file) {
                    $path = $file->store('it_images', 'public');
                    $images[] = $path;
                }
            }

            $inventory->update([
                'Itm_id' => $request->input('Itm_id'),
                'it_name' => $request->input('it_name'),
                'min_quantity' => $request->input('min_quantity'),
                'date' => $request->input('date', $inventory->date),
                'it_images' => !empty($images) ? json_encode($images) : null,
            ]);

            DB::commit();
            return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Inventory update failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update item: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        try {
            DB::beginTransaction();
            $inventory->delete();
            DB::commit();
            return redirect()->route('inventory.index')->with('success', 'Item deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Inventory deletion failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete item: ' . $e->getMessage());
        }
    }

   public function batches($id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        $grns = Grn::whereHas('items', function ($query) use ($id) {
            $query->where('inventory_id', $id);
        })->with([
            'items' => function ($query) use ($id) {
                $query->where('inventory_id', $id)->with('inventory');
            },
            'supplier' // Eager-load supplier
        ])->orderBy('date', 'desc')->paginate(10);

        return view('Manager.InventoryGrns', compact('inventory', 'grns'));
    }

    public function updateGrnPayment(Request $request, $grn_id)
    {
        $request->validate([
            'payment_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            $grn = Grn::where('id', $grn_id)
                ->where('business_id', Auth::user()->business_id)
                ->firstOrFail();

            $new_paid_value = $grn->paid_value + $request->payment_amount;
            $total_grn_value = $grn->total_grn_value;

            // Create payment record first
            \App\Models\GrnPayment::create([
                'grn_id' => $grn->id,
                'payment_amount' => $request->payment_amount,
                'notes' => $request->notes,
                'payment_date' => now(),
                'paid_by' => Auth::id(),
            ]);

            // Update status based on payment
            $status = $new_paid_value >= $total_grn_value ? 'paid' : ($new_paid_value > 0 ? 'partial' : 'due');

            $grn->update([
                'paid_value' => $new_paid_value,
                'status' => $status,
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Payment recorded successfully!',
                'grn' => [
                    'id' => $grn->id,
                    'paid_value' => number_format($grn->paid_value, 2),
                    'status' => ucfirst($grn->status),
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment update failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to record payment: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getGrnPaymentHistory($grn_id)
    {
        $businessId = Auth::user()->business_id;

        $grn = Grn::where('id', $grn_id)
            ->where('business_id', $businessId)
            ->with(['payments.paidBy'])
            ->first();

        if (!$grn) {
            return response()->json([
                'success' => false,
                'message' => 'GRN not found.'
            ], 404);
        }

        $payments = $grn->payments->map(function ($payment) {
            return [
                'id' => $payment->id,
                'amount' => $payment->formatted_amount,
                'date' => $payment->formatted_date,
                'notes' => $payment->notes ?? 'No notes',
                'paid_by' => $payment->paidBy->name ?? 'Unknown User',
            ];
        });

        return response()->json([
            'success' => true,
            'payments' => $payments,
            'total_payments' => $grn->payments->sum('payment_amount'),
            'total_grn_value' => $grn->total_grn_value,
            'remaining' => $grn->total_grn_value - $grn->paid_value,
        ]);
    }

    public function editGrn($id, $grn_id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        $grn = Grn::where('id', $grn_id)
            ->where('business_id', Auth::user()->business_id)
            ->with(['items' => function ($query) use ($id) {
                $query->where('inventory_id', $id);
            }, 'supplier'])
            ->firstOrFail();

        // Load suppliers for dropdown
        $suppliers = \App\Models\Supplier::where('business_id', Auth::user()->business_id)
            ->orderBy('name')
            ->get();

        return view('Manager.EditGrn', compact('inventory', 'grn', 'suppliers'));
    }

    public function updateGrn(Request $request, $id, $grn_id)
    {
        $inventory = Inventory::where('id', $id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        $grn = Grn::where('id', $grn_id)
            ->where('business_id', Auth::user()->business_id)
            ->firstOrFail();

        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'reference_no' => 'nullable|string|max:255',
            'total_grn_value' => 'required|numeric|min:0',
            'paid_value' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
            'quantity' => 'required|integer|min:1',
            'price_per_unit' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Update GRN details
            $grn->update([
                'supplier_id' => $request->supplier_id,
                'date' => $request->date,
                'reference_no' => $request->reference_no,
                'total_grn_value' => $request->total_grn_value,
                'paid_value' => $request->paid_value ?? 0,
                'notes' => $request->notes,
            ]);

            // Update associated GrnItem and StockBatch
            $grnItem = GrnItem::where('grn_id', $grn->id)
                ->where('inventory_id', $inventory->id)
                ->firstOrFail();

            $grnItem->update([
                'quantity' => $request->quantity,
                'price_per_unit' => $request->price_per_unit,
            ]);

            $batch = StockBatch::where('grn_id', $grn->id)
                ->where('inventory_id', $inventory->id)
                ->firstOrFail();

            $batch->update([
                'quantity' => $request->quantity,
                'unit_price' => $request->price_per_unit,
                'batch_value' => $request->quantity * $request->price_per_unit,
            ]);

            DB::commit();
            return redirect()->route('inventory.batches', $inventory->id)
                ->with('success', 'GRN updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('GRN update failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update GRN: ' . $e->getMessage());
        }
    }

    public function issuedItems(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = IssuedItem::with(['inventory', 'vehicle', 'employee', 'issuedBy'])
            ->where('business_id', $businessId);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('issue_id', 'like', '%' . $search . '%')
                  ->orWhere('item_name', 'like', '%' . $search . '%')
                  ->orWhere('quantity_issued', 'like', '%' . $search . '%')
                  ->orWhere('issue_type', 'like', '%' . $search . '%')
                  ->orWhere('vehicle_number', 'like', '%' . $search . '%')
                  ->orWhere('employee_nic', 'like', '%' . $search . '%')
                  ->orWhere('employee_name', 'like', '%' . $search . '%')
                  ->orWhere('issue_date', 'like', '%' . $search . '%')
                  ->orWhere('total_value', 'like', '%' . $search . '%');
            });
        }

        $issuedItems = $query->orderBy('issue_date', 'desc')->paginate(15);
        $stats = IssuedItem::getIssueStats($businessId);

        return view('Manager.IssueItemsView', compact('issuedItems', 'stats'));
    }

    public function checkDuplicate(Request $request)
    {
        $businessId = Auth::user()->business_id;
        $itemName = $request->input('item_name');

        if (empty($itemName)) {
            return response()->json(['exists' => false]);
        }

        $existingItem = Inventory::where('business_id', $businessId)
            ->whereRaw('LOWER(it_name) = LOWER(?)', [$itemName])
            ->first();

        if ($existingItem) {
            return response()->json([
                'exists' => true,
                'item' => [
                    'id' => $existingItem->id,
                    'Itm_id' => $existingItem->Itm_id,
                    'it_name' => $existingItem->it_name,
                    'total_quantity' => $existingItem->total_quantity,
                    'average_unit_price' => $existingItem->average_unit_price,
                    'total_value' => $existingItem->total_value,
                    'date' => $existingItem->date,
                ]
            ]);
        }

        return response()->json(['exists' => false]);
    }

    public function addToExisting(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'reference_no' => 'nullable|string|max:255',
            'total_grn_value' => 'required|numeric|min:0',
            'paid_value' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
            'items' => 'required|array|min:1',
            'items.*.existing_item_id' => 'required|exists:inventories,id',
            'items.*.item_name' => 'required|string',
            'items.*.quantity_to_add' => 'required|integer|min:1',
            'items.*.price_per_unit' => 'required|numeric|min:0',
        ]);

        $businessId = Auth::user()->business_id;

        try {
            DB::beginTransaction();

            $grnId = Grn::generateNextGrnId($businessId);

            // Calculate status based on paid_value and total_grn_value
            $paidValue = $request->paid_value ?? 0;
            $totalGrnValue = $request->total_grn_value;
            $status = 'due';
            if ($paidValue > 0 && $paidValue < $totalGrnValue) {
                $status = 'partial';
            } elseif ($paidValue >= $totalGrnValue) {
                $status = 'paid';
            }

            $grn = Grn::create([
                'grn_id' => $grnId,
                'supplier_id' => $request->supplier_id,
                'date' => $request->date,
                'reference_no' => $request->reference_no,
                'total_grn_value' => $totalGrnValue,
                'paid_value' => $paidValue,
                'status' => $status,
                'notes' => $request->notes,
                'business_id' => $businessId,
            ]);

            foreach ($request->items as $itemData) {
                $inventory = Inventory::where('id', $itemData['existing_item_id'])
                    ->where('business_id', $businessId)
                    ->lockForUpdate()
                    ->firstOrFail();

                $batchId = StockBatch::generateNextBatchId($inventory->id);
                $unitPrice = $itemData['price_per_unit'];
                $batchValue = $itemData['quantity_to_add'] * $unitPrice;

                StockBatch::create([
                    'inventory_id' => $inventory->id,
                    'batch_id' => $batchId,
                    'quantity' => $itemData['quantity_to_add'],
                    'unit_price' => $unitPrice,
                    'batch_value' => $batchValue,
                    'grn_id' => $grn->id,
                ]);

                GrnItem::create([
                    'grn_id' => $grn->id,
                    'inventory_id' => $inventory->id,
                    'item_name' => $itemData['item_name'],
                    'quantity' => $itemData['quantity_to_add'],
                    'price_per_unit' => $unitPrice,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Items added successfully',
                'grn_id' => $grnId
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Add to existing inventory failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to add items: ' . $e->getMessage()
            ], 400);
        }
    }

    public function availableItems(Request $request)
    {
        try {
            $businessId = Auth::user()->business_id;

            $items = Inventory::where('business_id', $businessId)
                ->select('id', 'it_name', 'min_quantity')
                ->with(['batches' => function ($query) {
                    $query->where('quantity', '>', 0)
                        ->select('inventory_id', 'quantity', 'unit_price')
                        ->orderBy('created_at', 'desc'); // Get latest batch first
                }])
                ->get()
                ->map(function ($item) {
                    $totalQuantity = $item->batches->sum('quantity');
                    
                    // Get the latest batch price, ensure it's a float
                    $unitPrice = $item->batches->isNotEmpty()
                        ? (float) $item->batches->first()->unit_price
                        : 0.0;

                    return [
                        'id' => $item->id,
                        'it_name' => $item->it_name,
                        'quantity' => $totalQuantity,
                        'price_per_unit' => $unitPrice, // Ensure this is a float
                        'min_quantity' => $item->min_quantity ?? 0,
                    ];
                })
                ->filter(function ($item) {
                    return !empty($item['it_name']);
                })
                ->values();

            return response()->json($items);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch items: ' . $e->getMessage()], 500);
        }
    }

    public function getStats()
    {
        $businessId = Auth::user()->business_id;

        try {
            $stats = [
                'total_items' => Inventory::where('business_id', $businessId)->count(),
                'low_stock_items' => Inventory::where('business_id', $businessId)->lowStock()->count(),
                'out_of_stock_items' => Inventory::where('business_id', $businessId)->outOfStock()->count(),
                'total_value' => Inventory::where('business_id', $businessId)->sum('total_value'),
            ];

            return response()->json($stats);
        } catch (\Exception $e) {
            Log::error('Get stats failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve stats'], 500);
        }
    }

    public function getLowStockItems()
    {
        $businessId = Auth::user()->business_id;

        try {
            $lowStockItems = Inventory::where('business_id', $businessId)
                ->lowStock()
                ->select('id', 'Itm_id', 'it_name', 'min_quantity')
                ->orderBy('id')
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'Itm_id' => $item->Itm_id,
                        'it_name' => $item->it_name,
                        'total_quantity' => $item->total_quantity,
                        'min_quantity' => $item->min_quantity
                    ];
                });

            return response()->json($lowStockItems);
        } catch (\Exception $e) {
            Log::error('Get low stock items failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve low stock items'], 500);
        }
    }

    public function issue()
    {
        return view('Manager.IssueItems');
    }

    public function verifyVehicle(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $vehicle = \App\Models\Vehicle::where('business_id', $businessId)
            ->where('vehicle_number', $request->vehicle_number)
            ->first();

        if ($vehicle) {
            return response()->json([
                'success' => true,
                'vehicle' => [
                    'id' => $vehicle->id,
                    'vehicle_name' => $vehicle->vehicle_name,
                    'vehicle_model' => $vehicle->vehicle_model,
                    'vehicle_number' => $vehicle->vehicle_number
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Vehicle not found'
        ]);
    }

    public function verifyEmployee(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $employee = \App\Models\Employee::where('business_id', $businessId)
            ->where('nic', $request->employee_nic)
            ->first();

        if ($employee) {
            return response()->json([
                'success' => true,
                'employee' => [
                    'id' => $employee->id,
                    'emp_name' => $employee->emp_name,
                    'nic' => $employee->nic
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Employee not found'
        ]);
    }

    public function storeIssuedItems(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.inventory_id' => 'required|exists:inventories,id,business_id,' . $businessId,
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.item_name' => 'required|string',
            'items.*.price_per_unit' => 'required|numeric|min:0',
            'items.*.total_value' => 'required|numeric|min:0',
            'vehicle_id' => 'nullable|exists:vehicles,id,business_id,' . $businessId,
            'employee_id' => 'nullable|exists:employees,id,business_id,' . $businessId,
            'notes' => 'nullable|string|max:1000',
        ]);

        // Determine issue_type dynamically
        $issueType = 'both';
        if ($request->vehicle_id && !$request->employee_id) {
            $issueType = 'vehicle';
        } elseif ($request->employee_id && !$request->vehicle_id) {
            $issueType = 'employee';
        } elseif (!$request->vehicle_id && !$request->employee_id) {
            return response()->json([
                'success' => false,
                'message' => 'At least one of vehicle_id or employee_id is required'
            ], 400);
        }

        $issueId = IssuedItem::generateNextIssueId($businessId);
        $errors = [];

        try {
            DB::beginTransaction();

            $vehicle = $request->vehicle_id ? \App\Models\Vehicle::where('id', $request->vehicle_id)
                ->where('business_id', $businessId)
                ->first() : null;

            $employee = $request->employee_id ? \App\Models\Employee::where('id', $request->employee_id)
                ->where('business_id', $businessId)
                ->first() : null;

            foreach ($request->items as $index => $item) {
                $inventory = Inventory::where('id', $item['inventory_id'])
                    ->where('business_id', $businessId)
                    ->lockForUpdate()
                    ->firstOrFail();

                if (!$inventory->hasEnoughStock($item['quantity'])) {
                    $errors[] = "Insufficient stock for item '{$item['item_name']}': Available {$inventory->total_quantity}, Requested {$item['quantity']}";
                    continue;
                }

                $remainingQuantity = $item['quantity'];
                $inventoryBatches = $inventory->batches()->where('quantity', '>', 0)->orderBy('id')->get();

                foreach ($inventoryBatches as $batch) {
                    if ($remainingQuantity <= 0) break;

                    $issueFromBatch = min($remainingQuantity, $batch->quantity);
                    $batch->quantity -= $issueFromBatch;
                    $batch->batch_value = $batch->quantity * $batch->unit_price;
                    $batch->save();

                    $remainingQuantity -= $issueFromBatch;
                }

                IssuedItem::create([
                    'issue_id' => $issueId,
                    'inventory_id' => $item['inventory_id'],
                    'item_name' => $item['item_name'],
                    'quantity_issued' => $item['quantity'],
                    'price_per_unit' => $item['price_per_unit'],
                    'total_value' => $item['total_value'],
                    'issue_date' => now(),
                    'issue_type' => $issueType,
                    'vehicle_id' => $request->vehicle_id,
                    'vehicle_number' => $vehicle ? $vehicle->vehicle_number : null,
                    'employee_id' => $request->employee_id,
                    'employee_nic' => $employee ? $employee->nic : null,
                    'employee_name' => $employee ? $employee->emp_name : null,
                    'notes' => $request->notes,
                    'status' => 'issued',
                    'issued_by' => Auth::id(),
                    'business_id' => $businessId,
                ]);
            }

            if (!empty($errors)) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'Some items could not be issued: ' . implode('; ', $errors)
                ], 400);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'issue_id' => $issueId,
                'message' => 'Items issued successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Issue items failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to issue items: ' . $e->getMessage()
            ], 400);
        }
    }

    public function returnItems(Request $request)
    {
        $request->validate([
            'issued_item_id' => 'required|exists:issued_items,id',
            'return_quantity' => 'required|integer|min:1',
            'return_notes' => 'nullable|string|max:500',
            'return_type' => 'required|in:returned,lost,damaged'
        ]);

        $businessId = Auth::user()->business_id;

        try {
            DB::beginTransaction();

            $issuedItem = IssuedItem::where('id', $request->issued_item_id)
                ->where('business_id', $businessId)
                ->firstOrFail();

            if (!$issuedItem->canBeReturned()) {
                throw new \Exception('This item cannot be returned');
            }

            if ($request->return_quantity > $issuedItem->remaining_quantity) {
                throw new \Exception('Return quantity cannot exceed remaining quantity');
            }

            switch ($request->return_type) {
                case 'returned':
                    $inventory = Inventory::find($issuedItem->inventory_id);
                    if ($inventory) {
                        $batchId = StockBatch::generateNextBatchId($inventory->id);
                        StockBatch::create([
                            'inventory_id' => $inventory->id,
                            'batch_id' => $batchId,
                            'quantity' => $request->return_quantity,
                            'unit_price' => $issuedItem->price_per_unit,
                            'batch_value' => $request->return_quantity * $issuedItem->price_per_unit,
                        ]);
                    }
                    $issuedItem->markAsReturned($request->return_quantity, $request->return_notes);
                    break;

                case 'lost':
                    $issuedItem->markAsLost($request->return_notes);
                    break;

                case 'damaged':
                    $issuedItem->markAsDamaged($request->return_notes);
                    break;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Item return processed successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Return items failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function vehicleIssuedItems($vehicleId)
    {
        $businessId = Auth::user()->business_id;

        $items = IssuedItem::with(['inventory'])
            ->where('vehicle_id', $vehicleId)
            ->where('business_id', $businessId)
            ->where('status', 'issued')
            ->get();

        return response()->json($items);
    }

    public function employeeIssuedItems($employeeId)
    {
        $businessId = Auth::user()->business_id;

        $items = IssuedItem::with(['inventory'])
            ->where('employee_id', $employeeId)
            ->where('business_id', $businessId)
            ->where('status', 'issued')
            ->get();

        return response()->json($items);
    }

    public function availableVehicles()
    {
        $businessId = Auth::user()->business_id;

        $vehicles = \App\Models\Vehicle::where('business_id', $businessId)
            ->select('id', 'vehicle_number', 'vehicle_name', 'vehicle_model')
            ->orderBy('vehicle_number')
            ->get();

        return response()->json($vehicles);
    }

    public function availableEmployees()
    {
        $businessId = Auth::user()->business_id;

        $employees = \App\Models\Employee::where('business_id', $businessId)
            ->select('id', 'nic as employee_nic', 'emp_name')
            ->orderBy('nic')
            ->get();

        return response()->json($employees);
    }

    public function grn()
    {
        return view('Manager.GRN');
    }

    public function availableSuppliers()
    {
        $businessId = Auth::user()->business_id;
        $suppliers = Supplier::where('business_id', $businessId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return response()->json($suppliers);
    }

    public function createSupplier(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255|unique:suppliers,name',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        $businessId = Auth::user()->business_id;

        try {
            $supplier = Supplier::create([
                'name' => $request->supplier_name,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'address' => $request->address,
                'business_id' => $businessId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Supplier created successfully',
                'supplier_id' => $supplier->id,
                'supplier_name' => $supplier->name
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create supplier: ' . $e->getMessage()
            ], 400);
        }
    }

    public function createItem(Request $request)
    {
        $request->validate([
            'it_name' => 'required|string|max:255|unique:inventories,it_name',
            'quantity' => 'nullable|integer|min:0',
            'min_quantity' => 'nullable|integer|min:0',
            'price_per_unit' => 'required|numeric|min:0',
            'it_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $businessId = Auth::user()->business_id;

        try {
            DB::beginTransaction();

            $nextItmId = $this->generateNextItemId($businessId);

            $images = [];
            if ($request->hasFile('it_images')) {
                foreach ($request->file('it_images') as $file) {
                    $path = $file->store('it_images', 'public');
                    $images[] = $path;
                }
            }

            $inventory = Inventory::create([
                'Itm_id' => $nextItmId,
                'it_name' => $request->input('it_name'),
                'min_quantity' => $request->input('min_quantity'),
                'date' => now()->format('Y-m-d'),
                'it_images' => !empty($images) ? json_encode($images) : null,
                'business_id' => $businessId,
            ]);

            // Create stock batch only if quantity is provided
            if ($request->filled('quantity') && $request->input('quantity') > 0) {
                $batchId = StockBatch::generateNextBatchId($inventory->id);
                StockBatch::create([
                    'inventory_id' => $inventory->id,
                    'batch_id' => $batchId,
                    'quantity' => $request->input('quantity'),
                    'unit_price' => $request->input('price_per_unit'),
                    'batch_value' => $request->input('quantity') * $request->input('price_per_unit'),
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Item created successfully',
                'item_id' => $inventory->id,
                'item_name' => $inventory->it_name,
                'quantity' => $request->input('quantity') ?? 0,
                'price_per_unit' => $request->input('price_per_unit'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Item creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create item: ' . $e->getMessage()
            ], 400);
        }
    }
}