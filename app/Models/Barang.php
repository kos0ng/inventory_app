<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'stok',
        'satuan_id',
        'jenis_id',
    ];
}
