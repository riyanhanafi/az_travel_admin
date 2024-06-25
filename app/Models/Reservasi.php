<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';

    protected $fillable = [
        'id_reservasi',
        'mobil_id',
        'order_id',
        'gross_amount',
        'nama_mobil',
        'nama_pemesan',
        'alamat',
        'harga',
        'no_ktp',
        'telepon',
        'tanggalpesan_start',
        'tanggalpesan_end',
        'foto_url',
        'status',
    ];
}
