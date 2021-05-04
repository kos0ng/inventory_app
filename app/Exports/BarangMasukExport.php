<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangMasukExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

	protected $start;
	protected $end;

 	function __construct($start,$end) {
        $this->start = $start;
        $this->end = $end;
 	}

    public function collection()
    {
        return BarangMasuk::join('barang','barang.id_barang','=','barang_masuk.barang_id')->join('supplier','supplier.id_supplier','=','barang_masuk.supplier_id')->join('users','users.id_user','=','barang_masuk.user_id')->whereBetween('tanggal_masuk',[$this->start,$this->end])->orderBy('id_barang_masuk','DESC')->get(['tanggal_masuk','id_barang_masuk','nama_barang','nama_supplier','jumlah_masuk']);
    }
    public function headings(): array
    {
        return ["Tanggal Masuk", "Id Barang Masuk", "Nama Barang","Nama Supplier","Jumlah Masuk"];
    }
}
