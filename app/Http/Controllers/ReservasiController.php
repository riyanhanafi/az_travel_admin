<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = Reservasi::all();
        return view('reservasi.index', compact('data'));
    }

    
}
