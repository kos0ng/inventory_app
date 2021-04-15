<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_barang_keluar';
    protected $table = 'barang_keluar';
    protected $fillable = [
        'id_barang_keluar',
        'user_id',
        'barang_id',
        'jumlah_keluar',
        'tanggal_keluar',
    ];
}
