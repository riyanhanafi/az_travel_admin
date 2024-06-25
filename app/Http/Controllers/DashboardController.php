<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;
use App\Models\Reservasi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();
        $totalUser = User::count();
        $totalReservasi = Reservasi::count();

        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        // Mengambil data pendapatan dari tabel reservasi
        $pendapatan = Reservasi::selectRaw('MONTH(tanggalpesan_start) as bulan, SUM(gross_amount) as total')
                                ->groupBy('bulan')
                                ->orderBy('bulan')
                                ->pluck('total', 'bulan')
                                ->toArray();

        // Mengisi pendapatan untuk bulan yang tidak ada data
        $pendapatanLengkap = [];
        for ($i = 1; $i <= 12; $i++) {
            $pendapatanLengkap[] = $pendapatan[$i] ?? 0;
        }

        return view('dashboard', compact('totalMobil', 'totalUser', 'totalReservasi', 'bulan', 'pendapatanLengkap'));
    }
}