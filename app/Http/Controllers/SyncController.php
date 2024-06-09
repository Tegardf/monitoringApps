<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataFirebase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SyncController extends Controller
{
    public function syncData(Request $request)
    {
        try {
            $data = $request->all();
            // Log::info('Incoming data:',$data);
            $dataraw = $data['data'];
            $requestTimestamp = $dataraw['timestamp'];
            // Log::info('timestamp data:',$requestTimestamp);
            
            $newestData = DataFirebase::latest()->first();
            if ($newestData) {
                $mysqlTimestamp = $newestData->timestamp;

                // Convert MySQL timestamp to Carbon instance for comparison
                $mysqlTimestamp = Carbon::parse($mysqlTimestamp);

                // Convert request timestamp to Carbon instance for comparison
                $requestTimestamp = Carbon::parse($requestTimestamp);

                // Compare timestamps
                if ($mysqlTimestamp->eq($requestTimestamp)) {
                    // Timestamps are equal, don't create new data
                    return response()->json(['message' => 'Data already synced'], 200);
                }
            }

            DataFirebase::create($dataraw);
            return response()->json(['message'=>'Data Sync succesfully'],200);
        } catch (\Throwable $e) {
            Log::error('Error synchronizing data:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}
