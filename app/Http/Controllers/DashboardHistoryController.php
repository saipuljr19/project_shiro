<?php

namespace App\Http\Controllers;

use App\Models\Control;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardHistoryController extends Controller
{
    public function index()
    {
        $controls = Control::query()->latest();

        if (request('filter')) {
            $controls->whereDate('created_at', request('filter'));
        } else {
            $controls->whereDate('created_at', Carbon::today());
        }

        return view('dashboard.histories.index', [
            'title' => 'Dashboard | Riwayat Monitoring',
            'today' => Carbon::now()->format('Y-m-d'),
            'controls' => $controls->get(),
        ]);
    }

    public function cetak()
    {
        $controls = Control::query()->latest();

        if (request('filter')) {
            $controls->whereDate('created_at', request('filter'));
        } else {
            $controls->whereDate('created_at', Carbon::today());
        }

        return view('dashboard.histories.cetakhistory', [
            'controls' => $controls->get(),
        ]);
    }

    public function destroy(Control $control)
    {
        $date = $control->created_at->format('Y-m-d');
        $control->delete();
        return redirect('/dashboard/controls?filter=' . $date)->with('success', 'Data berhasil dihapus!');
    }
}
