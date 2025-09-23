<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstimateSerial;
use Illuminate\Support\Facades\DB;

class EstimateSerialController extends Controller
{
    // Return the next serial and increment it atomically
    public function next(Request $request)
    {
        // Use a transaction to avoid race conditions
    return DB::transaction(function () {
            $row = EstimateSerial::lockForUpdate()->first();
            if (!$row) {
                $row = EstimateSerial::create(['next_serial' => 2]);
                return response()->json(['serial' => 1]);
            }

            $serial = $row->next_serial;
            $row->next_serial = $serial + 1;
            $row->save();

            return response()->json(['serial' => $serial]);
        });
    }
}
