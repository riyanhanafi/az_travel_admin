<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Reservasi;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class apiController extends Controller
{
  public function __construct()
  {
    // Set Midtrans configuration
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');
  }
  public function index()
  {
    // Mengambil semua data tabel Mobil
    $data = Mobil::all();
    return response()->json(['message' => 'succes', 'data' => $data]);
  }
  public function store(Request $request)
  {

    // Cek apakah id_mobil sudah ada di database
    $existingMobil = Mobil::where('id_mobil', $request->id_mobil)->first();

    // Jika id_mobil sudah ada, update status menjadi "Tidak Tersedia"
    if ($existingMobil) {
      $existingMobil->update(['status' => 'Tidak Tersedia']);
      return response()->json(['message' => 'success', 'data' => $existingMobil]);
    } else {
      // Jika id_mobil belum ada, create data sesuai request yang diterima
      $data = Mobil::create($request->all());
      return response()->json(['message' => 'succes', 'data' => $data]);
    }


  }
  public function user(Request $request)
  {
    // Mengambil semua data tabel User
    $data = User::all();
    return response()->json(['message' => 'succes', 'data' => $data]);
  }
  public function storeuser(Request $request)
  {
    // Cek apakah kolom email pada tabel User sudah ada di database
    $existingUser = User::where('email', $request->email)->first();

    if ($existingUser) {
      // Jika kolom email sudah ada, update data
      $existingUser->update($request->all());
      return response()->json(['message' => 'success', 'data' => $existingUser]);
    } else {
      // Jika kolom email null, create data sesuai request yang diterima
      $data = User::create($request->all());
      return response()->json(['message' => 'success', 'data' => $data]);
    }
  }
  public function storeuserfoto(Request $request)
  {
    $existingUser = User::where('email', $request->email)->first();

    if ($existingUser) {
      // Update data pengguna termasuk URL foto
      $existingUser->update($request->except('foto_url'));
      // Jika ada foto profil, proses upload
      if ($request->hasFile('foto_url')) {
        $imageName = time() . '_' . $request->file('foto_url')->getClientOriginalName();
        // Simpan foto ke direktori penyimpanan yang sesuai (misalnya, storage/app/public/images)
        $request->file('foto_url')->storeAs('public/images', $imageName);

        // Simpan URL gambar ke dalam tabel
        $imageUrl = asset('storage/images/' . $imageName);
        $existingUser->foto_url = $imageUrl; // Pastikan kolom 'foto_url' sudah ada di tabel User
        $existingUser->save();
      }

      $imageUrl = $existingUser->foto_url ? asset('storage/images/' . $existingUser->foto_mobil) : null;
      return response()->json(['message' => 'success', 'data' => $existingUser]);
    } else {
      // Buat pengguna baru termasuk URL foto
      $data = User::create($request->except('foto_url'));
      // Jika ada foto profil, proses upload
      if ($request->hasFile('foto_url')) {
        $imageName = time() . '_' . $request->file('foto_url')->getClientOriginalName();
        // Simpan foto ke direktori penyimpanan yang sesuai (misalnya, storage/app/public/images)
        $request->file('foto_url')->storeAs('public/images', $imageName);

        // Simpan URL gambar ke dalam tabel
        $imageUrl = asset('storage/images/' . $imageName);
        $existingUser->foto_url = $imageUrl; // Pastikan kolom 'foto_url' sudah ada di tabel User
        $existingUser->save();
      }
      return response()->json(['message' => 'success', 'data' => $data]);
    }
  }
  public function indexreservasi()
  {
    $data = Reservasi::all();
    return response()->json(['message' => 'succes', 'data' => $data]);
  }

  public function updatereservasi(Request $request)
  {
    // Cek apakah id_reservasi sudah ada di database
    $existingReservasi = Reservasi::where('id_reservasi', $request->id_reservasi)->first();

    // Update data reservasi ke database
    $existingReservasi->update($request->all());

    // Buat parameter untuk Snap API
    $params = [
      'transaction_details' => [
        'order_id' => $existingReservasi->id_reservasi,
        'gross_amount' => $existingReservasi->harga, // Total pembayaran
      ],
      'customer_details' => [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
      ],
    ];

    try {
      // Mendapatkan Snap Token
      $snapToken = Snap::getSnapToken($params);

      // Mengembalikan response JSON dengan Snap Token
      return response()->json([
        'message' => 'success',
        'data' => $existingReservasi,
        'snap_token' => $snapToken,
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'error',
        'error' => $e->getMessage(),
      ], 500);
    }

  }

  public function storereservasi(Request $request)
  {
    // Atur status default jika tidak diisi
    if (empty($request->status)) {
      $request->merge(['status' => 'Belum Bayar']);
    }

    // Cek apakah id_reservasi sudah ada di database
    $existingReservasi = Reservasi::where('id_reservasi', $request->id_reservasi)->first();

    if ($existingReservasi) {
      // Jika id_reservasi sudah ada, update status menjadi "sudah bayar"
      $existingReservasi->update(['status' => 'Sudah Bayar']);
      return response()->json(['message' => 'success', 'data' => $existingReservasi]);
    } else {
      // Atur status default jika tidak diisi
      if (empty($request->status)) {
        $request->merge(['status' => 'Belum Bayar']);
      }
      // Simpan data reservasi ke database
      $data = Reservasi::create($request->all());

      // Buat parameter untuk Snap API
      $params = [
        'transaction_details' => [
          'order_id' => $data->id_reservasi,
          'gross_amount' => $data->harga, // Total pembayaran
        ],
        'customer_details' => [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
        ],
      ];

      try {
        // Mendapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Mengembalikan response JSON dengan Snap Token
        return response()->json([
          'message' => 'success',
          'data' => $data,
          'snap_token' => $snapToken,
        ]);
      } catch (\Exception $e) {
        return response()->json([
          'message' => 'error',
          'error' => $e->getMessage(),
        ], 500);
      }
    }


  }
  public function indextransaction()
  {
    $data = Transaction::all();
    return response()->json(['message' => 'succes', 'data' => $data]);
  }
  public function storetransaction(Request $request)
  {
    // Verifikasi bahwa request berasal dari Midtrans
    // Anda dapat menambahkan lapisan keamanan tambahan di sini

    // Ambil data notifikasi dari Midtrans
    $data = $request->all();

    // Pastikan transaksi ditemukan di database berdasarkan order_id
    $transaction = Transaction::where('order_id', $data['order_id'])->first();

    // Update status transaksi sesuai dengan respons dari Midtrans
    if ($transaction) {
      $transaction->status = $data['transaction_status'];
      $transaction->payment_method = $data['payment_type'];

      // Tambahkan log atau informasi lain yang diperlukan
      // $transaction->logs()->create([...]);

      $transaction->save();

      // Tanggapi dengan berhasil
      return response()->json(['message' => 'Transaction status updated successfully'], 200);
    } else {
      // Jika transaksi tidak ditemukan, tanggapi dengan error
      return response()->json(['message' => 'Transaction not found'], 404);
    }
  }


}
