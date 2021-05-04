<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangKeluarExport implements FromCollection,WithHeadings
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
        return BarangKeluar::join('barang','barang.id_barang','=','barang_keluar.barang_id')->join('users','users.id_user','=','barang_keluar.user_id')->whereBetween('tanggal_keluar',[$this->start,$this->end])->orderBy('id_barang_keluar','DESC')->get(['tanggal_keluar','id_barang_keluar','nama_barang','jumlah_keluar']);
    }
    public function headings(): array
    {
        return ["Tanggal Keluar", "Id Barang Keluar", "Nama Barang","Jumlah Keluar"];
    }
}
