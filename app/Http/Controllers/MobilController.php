<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{

  public function index()
  {
    $data = Mobil::all();
    return view('mobil.index', compact('data'));
  }
  public function store(Request $request)
  {


    // Buat data mobil baru
    $data = Mobil::create($request->except('foto_mobil'));

    // Jika ada file foto_mobil, proses upload
    if ($request->hasFile('foto_mobil')) {
      $imageName = time() . '_' . $request->file('foto_mobil')->getClientOriginalName();
      $path = $request->file('foto_mobil')->storeAs('images', $imageName, 'public');
      $data->foto_mobil = $imageName;
      $data->save();

      // Simpan URL gambar ke dalam tabel
      $imageUrl = asset('storage/images/' . $imageName);
      $data->foto_url = $imageUrl; // Pastikan kolom 'foto_url' sudah ada di tabel Mobil
      $data->save();
    }

    $imageUrl = $data->foto_mobil ? asset('storage/images/' . $data->foto_mobil) : null;

    return redirect('/mobil')->with('pesan', 'Data berhasil Ditambah');

  }
  public function update(Request $request, $id_mobil)
  {
    $data = Mobil::find($id_mobil);
    $data->update($request->except('foto_mobil'));
    // Jika ada file foto_mobil, proses upload
    if ($request->hasFile('foto_mobil')) {
      $imageName = time() . '_' . $request->file('foto_mobil')->getClientOriginalName();
      $path = $request->file('foto_mobil')->storeAs('images', $imageName, 'public');
      $data->foto_mobil = $imageName;
      $data->save();

      // Simpan URL gambar ke dalam tabel
      $imageUrl = asset('storage/images/' . $imageName);
      $data->foto_url = $imageUrl; // Pastikan kolom 'foto_url' sudah ada di tabel Mobil
      $data->save();
    }

    $imageUrl = $data->foto_mobil ? asset('storage/images/' . $data->foto_mobil) : null;
    return redirect('/mobil')->with('pesan', 'Data berhasil diubah');
  }
  public function hapus($id_mobil)
  {
    $data = Mobil::find($id_mobil);
    $data->delete();
    return redirect('/mobil')->with('pesan', 'Data berhasil dihapus');
  }
  public function updateStatus($id_mobil)
  {
    $mobil = Mobil::find($id_mobil);
    if ($mobil) {
      $mobil->status = 'Tersedia';
      $mobil->save();
      return redirect()->back()->with('pesan', 'Status mobil berhasil diperbarui.');
    }
    return redirect()->back()->with('error', 'Mobil tidak ditemukan.');
  }
}
