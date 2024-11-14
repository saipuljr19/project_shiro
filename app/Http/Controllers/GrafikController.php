<?php

namespace App\Http\Controllers;

use App\Models\Control;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index(Request $request)
    {
        $monitoringData = [];

        if ($request->has(['start_date', 'end_date'])) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            $controls = Control::whereBetween('created_at', [$startDate, $endDate])->get();

            foreach ($controls as $control) {
                $monitoringData[$control->created_at->format('d M Y H:i')] = [
                    'temperature' => $control->temperature,
                    'turbidity' => $control->turbidity,
                    'ph' => $control->ph,
                ];
            }
        }

        return view('grafik', [
            'title' => 'Grafik Monitoring', // Tambahkan $title
            'monitoringData' => [], // Data monitoring jika diperlukan
        ]);
    }
}
