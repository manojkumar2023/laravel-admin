<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Estimate;
use App\Models\EstimateItem;
use App\Models\EstimateSerial;

class EstimateController extends Controller
{
    public function index()
    {
        return view('pages.estimate.index');
    }

    // Store full estimate and items, generate BID in format BID-YYYYMMDD-<primary_serial>
    public function store(Request $request)
    {
        $data = $request->validate([
            'bi_executive' => 'nullable|string',
            'client_name' => 'nullable|string',
            // property_type/property_selection moved to items
            'estimate_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'total' => 'nullable|numeric',
            'gst' => 'nullable|numeric',
            'grand_total' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'final_amount' => 'nullable|numeric',
            'items' => 'required|array'
        ]);

        // If estimate_id is provided, finalize/update that estimate instead of creating a new one
        $estimateId = $request->input('estimate_id');

        // Generate primary serial and BID atomically using transaction and estimate_serials row
        $result = DB::transaction(function () use ($data, $estimateId) {
            $serialRow = EstimateSerial::lockForUpdate()->first();
            if (!$serialRow) {
                $serialRow = EstimateSerial::create(['next_serial' => 2]);
                $primary = 1;
            } else {
                $primary = $serialRow->next_serial;
                $serialRow->next_serial = $primary + 1;
                $serialRow->save();
            }

            $datePart = now()->format('Ymd');
            $bid = sprintf('BID-%s-%d', $datePart, $primary);
            if ($estimateId) {
                $estimate = Estimate::findOrFail($estimateId);
                // Keep the existing bid/primary_serial
                $bid = $estimate->bid;
            } else {
                $estimate = Estimate::create([
                    'bid' => $bid,
                    'bi_executive' => $data['bi_executive'] ?? null,
                    'client_name' => $data['client_name'] ?? null,
                    // property_type/property_selection are stored per-item
                    'estimate_date' => $data['estimate_date'] ?? null,
                    'expiry_date' => $data['expiry_date'] ?? null,
                    'total' => $data['total'] ?? 0,
                    'gst' => $data['gst'] ?? 0,
                    'grand_total' => $data['grand_total'] ?? 0,
                    'discount' => $data['discount'] ?? 0,
                    'final_amount' => $data['final_amount'] ?? 0,
                    'primary_serial' => $primary,
                    'user_id' => Auth::id() ?? null
                ]);
            }

            // If finalizing an existing estimate, remove any previous items to avoid duplicates
            if ($estimateId) {
                EstimateItem::where('estimate_id', $estimate->id)->delete();
            }

            foreach ($data['items'] as $it) {
                EstimateItem::create([
                    'estimate_id' => $estimate->id,
                    'serial' => $it['serial'] ?? null,
                    'property_type' => $it['property_type'] ?? null,
                    'property_selection' => $it['property_selection'] ?? null,
                    'area' => $it['area'] ?? null,
                    'element' => $it['element'] ?? null,
                    'material' => $it['material'] ?? null,
                    'finish' => $it['finish'] ?? null,
                    'dimensions' => $it['dimensions'] ?? null,
                    'unit' => $it['unit'] ?? null,
                    'quantity' => $it['quantity'] ?? 0,
                    'rate' => floatval(str_replace(',', '', $it['rate'] ?? 0)),
                    'amount' => floatval(str_replace(',', '', $it['amount'] ?? 0)),
                    'floor' => $it['floor'] ?? null
                ]);
            }

            return ['bid' => $bid, 'primary' => $primary, 'estimate_id' => $estimate->id];
        });

        return response()->json($result);
    }

    // Create a draft estimate (header only) so items can be added incrementally from the frontend
    public function draft(Request $request)
    {
        $data = $request->validate([
            'bi_executive' => 'nullable|string',
            'client_name' => 'nullable|string',
            // property_type/property_selection moved to items
            'estimate_date' => 'nullable|date',
            'expiry_date' => 'nullable|date'
        ]);

        $result = DB::transaction(function () use ($data) {
            $serialRow = EstimateSerial::lockForUpdate()->first();
            if (!$serialRow) {
                $serialRow = EstimateSerial::create(['next_serial' => 2]);
                $primary = 1;
            } else {
                $primary = $serialRow->next_serial;
                $serialRow->next_serial = $primary + 1;
                $serialRow->save();
            }

            $datePart = now()->format('Ymd');
            $bid = sprintf('BID-%s-%d', $datePart, $primary);

            $estimate = Estimate::create([
                'bid' => $bid,
                'bi_executive' => $data['bi_executive'] ?? null,
                'client_name' => $data['client_name'] ?? null,
                // property_type/property_selection are stored per-item
                'estimate_date' => $data['estimate_date'] ?? null,
                'expiry_date' => $data['expiry_date'] ?? null,
                'primary_serial' => $primary,
                'user_id' => Auth::id() ?? null
            ]);

            return ['bid' => $bid, 'estimate_id' => $estimate->id];
        });

        return response()->json($result);
    }

    // Add a single item to an existing estimate (used by Add to Estimate)
    public function addItem(Request $request, $id)
    {
        $data = $request->validate([
            'area' => 'nullable|string',
            'element' => 'nullable|string',
            'material' => 'nullable|string',
            'finish' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'unit' => 'nullable|string',
            'quantity' => 'nullable|numeric',
            'rate' => 'nullable',
            'amount' => 'nullable',
            'floor' => 'nullable|string',
            'serial' => 'nullable',
            // optional header/summary fields to update estimate
            'property_type' => 'nullable|string',
            'property_selection' => 'nullable|string',
            'estimate_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'discount_percent' => 'nullable|numeric'
        ]);

        $estimate = Estimate::findOrFail($id);

        $item = EstimateItem::create([
            'estimate_id' => $estimate->id,
            'serial' => $data['serial'] ?? null,
            'property_type' => $data['property_type'] ?? null,
            'property_selection' => $data['property_selection'] ?? null,
            'area' => $data['area'] ?? null,
            'element' => $data['element'] ?? null,
            'material' => $data['material'] ?? null,
            'finish' => $data['finish'] ?? null,
            'dimensions' => $data['dimensions'] ?? null,
            'unit' => $data['unit'] ?? null,
            'quantity' => $data['quantity'] ?? 0,
            'rate' => floatval(str_replace(',', '', $data['rate'] ?? 0)),
            'amount' => floatval(str_replace(',', '', $data['amount'] ?? 0)),
            'floor' => $data['floor'] ?? null
        ]);

        // Recalculate totals for the estimate from stored items
        $total = EstimateItem::where('estimate_id', $estimate->id)->sum('amount');
        $gst = round($total * 0.18, 2);
        $grandTotal = round($total + $gst, 2);
        $discountPercent = isset($data['discount_percent']) ? floatval($data['discount_percent']) : 15.0;
        $discount = round($grandTotal * ($discountPercent / 100.0), 2);
        $finalAmount = round($grandTotal - $discount, 2);

        // Update estimate header with the new totals and any optional header fields
        $estimate->update([
            'total' => $total,
            'gst' => $gst,
            'grand_total' => $grandTotal,
            'discount' => $discount,
            'final_amount' => $finalAmount,
            'estimate_date' => $data['estimate_date'] ?? $estimate->estimate_date,
            'expiry_date' => $data['expiry_date'] ?? $estimate->expiry_date,
        ]);

        return response()->json([
            'item_id' => $item->id,
            'item' => $item,
            'totals' => [
                'total' => $total,
                'gst' => $gst,
                'grand_total' => $grandTotal,
                'discount' => $discount,
                'final_amount' => $finalAmount,
            ],
            'bid' => $estimate->bid
        ]);
    }

    // Update a single item
    public function updateItem(Request $request, $id)
    {
        $data = $request->validate([
            'area' => 'nullable|string',
            'element' => 'nullable|string',
            'material' => 'nullable|string',
            'finish' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'unit' => 'nullable|string',
            'quantity' => 'nullable|numeric',
            'rate' => 'nullable',
            'amount' => 'nullable',
            'floor' => 'nullable|string',
            'property_type' => 'nullable|string',
            'property_selection' => 'nullable|string'
        ]);

        $item = EstimateItem::findOrFail($id);
        $item->update([
            'area' => $data['area'] ?? $item->area,
            'element' => $data['element'] ?? $item->element,
            'material' => $data['material'] ?? $item->material,
            'finish' => $data['finish'] ?? $item->finish,
            'dimensions' => $data['dimensions'] ?? $item->dimensions,
            'unit' => $data['unit'] ?? $item->unit,
            'quantity' => $data['quantity'] ?? $item->quantity,
            'rate' => isset($data['rate']) ? floatval(str_replace(',', '', $data['rate'])) : $item->rate,
            'amount' => isset($data['amount']) ? floatval(str_replace(',', '', $data['amount'])) : $item->amount,
            'floor' => $data['floor'] ?? $item->floor,
            'property_type' => $data['property_type'] ?? $item->property_type,
            'property_selection' => $data['property_selection'] ?? $item->property_selection,
        ]);

        // Recalculate parent estimate totals
        $estimate = $item->estimate;
        $total = EstimateItem::where('estimate_id', $estimate->id)->sum('amount');
        $gst = round($total * 0.18, 2);
        $grandTotal = round($total + $gst, 2);
        $discountPercent = $estimate->discount ? ($estimate->discount / max($grandTotal, 1) * 100) : 15.0;
        $discount = round($grandTotal * ($discountPercent / 100.0), 2);
        $finalAmount = round($grandTotal - $discount, 2);

        $estimate->update([
            'total' => $total,
            'gst' => $gst,
            'grand_total' => $grandTotal,
            'discount' => $discount,
            'final_amount' => $finalAmount
        ]);

        return response()->json([
            'item' => $item,
            'totals' => [
                'total' => $total,
                'gst' => $gst,
                'grand_total' => $grandTotal,
                'discount' => $discount,
                'final_amount' => $finalAmount
            ]
        ]);
    }

    // Delete a single item
    public function deleteItem($id)
    {
        $item = EstimateItem::findOrFail($id);
        $estimate = $item->estimate;
        $item->delete();

        // Recalculate totals
        $total = EstimateItem::where('estimate_id', $estimate->id)->sum('amount');
        $gst = round($total * 0.18, 2);
        $grandTotal = round($total + $gst, 2);
        $discountPercent = $estimate->discount ? ($estimate->discount / max($grandTotal, 1) * 100) : 15.0;
        $discount = round($grandTotal * ($discountPercent / 100.0), 2);
        $finalAmount = round($grandTotal - $discount, 2);

        $estimate->update([
            'total' => $total,
            'gst' => $gst,
            'grand_total' => $grandTotal,
            'discount' => $discount,
            'final_amount' => $finalAmount
        ]);

        return response()->json([
            'deleted' => true,
            'totals' => [
                'total' => $total,
                'gst' => $gst,
                'grand_total' => $grandTotal,
                'discount' => $discount,
                'final_amount' => $finalAmount
            ]
        ]);
    }

    // Return estimate header and items (for populating the grid)
    public function items($id)
    {
        $estimate = Estimate::with('items')->findOrFail($id);
        return response()->json([
            'estimate' => $estimate,
            'items' => $estimate->items
        ]);
    }
}
