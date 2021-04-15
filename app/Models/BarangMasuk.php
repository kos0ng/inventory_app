<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $keyType = 'string';
    protected $fillable = [
        'id_barang_masuk',
        'supplier_id',
        'user_id',
        'barang_id',
        'jumlah_masuk',
        'tanggal_masuk',
    ];
}
