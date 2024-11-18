<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    // Menampilkan data terbaru di dashboard
    public function showDashboard()
    {
        $latestMonitoring = Monitoring::latest()->first();

        return view('dashboard', [
            'temperature' => $latestMonitoring->temperature ?? 0,
            'turbidity' => $latestMonitoring->turbidity ?? 0,
            'ph' => $latestMonitoring->ph ?? 0,
        ]);
    }

    // Menyimpan data monitoring dari request
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'temperature' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'ph' => 'required|numeric',
        ]);

        Monitoring::create($data);
    }
}
