<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Supplier;
use App\Models\User;

class TaskController extends Controller
{
    public function index(){
        
        $data['barang'] = Barang::count();
        $data['barang_masuk'] = json_encode(BarangMasuk::count());
        $data['barang_keluar'] = json_encode(BarangKeluar::count());
        $data['supplier'] = Supplier::count();
        $data['user'] = User::count();
        $data['stok'] = Barang::sum('stok');
        $data['barang_min'] = Barang::where('stok','<=',10)->get();
        $data['trans_barang_masuk'] =  Barang::join('barang_masuk','barang.id_barang','=','barang_masuk.barang_id')->orderByDesc('tanggal_masuk')->limit(5)->get();
        $data['trans_barang_keluar'] = Barang::join('barang_keluar','barang.id_barang','=','barang_keluar.barang_id')->orderByDesc('tanggal_keluar')->limit(5)->get();
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];

        foreach ($bln as $b) {
            $like = 'T-BM-' . date('y') . $b;
            $data['cbm'][] = BarangMasuk::where('id_barang_masuk','like','%'.$like.'%')->count();
            $data['cbk'][] = BarangKeluar::where('id_barang_keluar','like','%'.$like.'%')->count();
        }
        $data['cbm'] = json_encode($data['cbm']);
        $data['cbk'] = json_encode($data['cbk']);
        // print_r($data['cbm']);
        // print_r($data['cbk']);
        return view('dashboard/index',$data);
    }
    
    public function supplier(){
        $data['all'] = Supplier::get();        
    	return view('dashboard/supplier',$data);
    }

    public function insert_supplier(Request $request){
        $sup = new Supplier;
        $sup->nama_supplier = $request->nama_supplier;
        $sup->no_telp = $request->no_telp;
        $sup->alamat = $request->alamat;
        $sup->save();
        return redirect('/dashboard/supplier');
    }
    
    public function update_supplier(Request $request){
        $sup = Supplier::find($request->id);
        $sup->nama_supplier = $request->nama_supplier;
        $sup->no_telp = $request->no_telp;
        $sup->alamat = $request->alamat;
        $sup->save();
        return redirect('/dashboard/supplier');
    }

    public function delete_supplier($id){
        Supplier::where('id_supplier',$id)->delete();
        return true;
    }

    public function barang(){
        $data['all'] = Barang::join('jenis','barang.jenis_id','=','jenis.id_jenis')->join('satuan','barang.satuan_id','=','satuan.id_satuan')->orderBy('id_barang','ASC')->get();
        $data['satuan'] = DB::table('satuan')->get();
        $data['jenis'] = DB::table('jenis')->get();
        // print($data['all']);
        return view('dashboard/barang',$data);
    }

    public function insert_barang(Request $request){
        $max = Barang::max('id_barang');
        $kode_tambah = substr($max, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $id_barang = 'B' . $number;
        $barang = new Barang;
        $barang->id_barang = $id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_id = $request->satuan_id;
        $barang->stok = 0;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();
        return redirect('/dashboard/data_barang');
    }
    
    public function update_barang(Request $request){
        $barang = Barang::find($request->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_id = $request->satuan_id;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();
        return redirect('/dashboard/data_barang');
    }

    public function delete_barang($id){
        Barang::where('id_barang',$id)->delete();
        return true;
    }



    public function satuan(){
        $data['all'] = DB::table('satuan')->get();
        return view('dashboard/satuan',$data);
    }

    public function insert_satuan(Request $request){
        $tmp = DB::table('satuan')->insert([
            'nama_satuan' => $request->nama_satuan,
        ]);
        return redirect('/dashboard/satuan_barang');
    }
    
    public function update_satuan(Request $request){
        DB::table('satuan')->where('id_satuan',$request->id)->update([
            'nama_satuan' => $request->nama_satuan,
        ]);
        return redirect('/dashboard/satuan_barang');   
    }

    public function delete_satuan($id){
        DB::table('satuan')->where('id_satuan',$id)->delete();
        return true;
    }

    public function jenis(){
        $data['all'] = DB::table('jenis')->get();
        return view('dashboard/jenis',$data);
    }

    public function insert_jenis(Request $request){
        $tmp = DB::table('jenis')->insert([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/dashboard/jenis_barang');
    }
    
    public function update_jenis(Request $request){
        DB::table('jenis')->where('id_jenis',$request->id)->update([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/dashboard/jenis_barang');   
    }

    public function delete_jenis($id){
        DB::table('jenis')->where('id_jenis',$id)->delete();
        return true;
    }

    public function barang_masuk(){
        $data['all'] = BarangMasuk::join('barang','barang.id_barang','=','barang_masuk.barang_id')->join('supplier','supplier.id_supplier','=','barang_masuk.supplier_id')->join('user','user.id_user','=','barang_masuk.user_id')->orderBy('id_barang_masuk','DESC')->get();
        $data['supplier'] = DB::table('supplier')->get();
        $data['barang'] = DB::table('barang')->get();
        // print($data['all']);
        return view('dashboard/barangmasuk',$data);
    }

    public function insert_barangmasuk(Request $request){
        $max = Barang::max('id_barang');
        $kode_tambah = substr($max, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $id_barang = 'B' . $number;
        $barang = new Barang;
        $barang->id_barang = $id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_id = $request->satuan_id;
        $barang->stok = 0;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();
        return redirect('/dashboard/data_barang');
    }
    
    public function update_barangmasuk(Request $request){
        $barang = Barang::find($request->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_id = $request->satuan_id;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();
        return redirect('/dashboard/data_barang');
    }

    public function delete_barangmasuk($id){
        Barang::where('id_barang',$id)->delete();
        return true;
    }

}
