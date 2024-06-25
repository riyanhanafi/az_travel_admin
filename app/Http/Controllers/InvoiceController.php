<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('invoice.show', compact('reservasi'));
    }
    public function rekap(Request $request)
    {
        $bulan = $request->input('bulan');

        if ($bulan) {
            $pendapatanPerBulan = Reservasi::whereMonth('tanggalpesan_start', $bulan)->get();
        } else {
            $pendapatanPerBulan = Reservasi::orderBy('tanggalpesan_start')->get();
        }
        $totalPendapatan = $pendapatanPerBulan->sum('harga');

        return view('invoice.rekap', compact('pendapatanPerBulan', 'totalPendapatan'));
    }
}
