<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataFirebase;
use App\Models\User;
use Illuminate\Http\Request;

class MonitoringRecordController extends Controller
{
    public function index()
    {
        $records = DataFirebase::all();
        return view('riwayat_monitoring', compact('records'));
    }
}
