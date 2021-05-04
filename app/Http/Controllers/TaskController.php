<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Supplier;
use App\Models\User;
use Auth;
use Session;
use PDF;
use Excel;
use App\Exports\BarangKeluarExport;
use App\Exports\BarangMasukExport;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        Session::put('name', $user->name);
        Session::put('id', $user->id);
        Session::put('email', $user->email);
        Session::put('foto', $user->foto);
        Session::put('role', $user->role);
        // print_r(Session::get('foto'));die();
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
        $data['all'] = BarangMasuk::join('barang','barang.id_barang','=','barang_masuk.barang_id')->join('supplier','supplier.id_supplier','=','barang_masuk.supplier_id')->join('users','users.id_user','=','barang_masuk.user_id')->orderBy('id_barang_masuk','DESC')->get();
        $data['supplier'] = DB::table('supplier')->get();
        $data['barang'] = DB::table('barang')->get();
        return view('dashboard/barangmasuk',$data);
    }

    public function insert_barangmasuk(Request $request){
        $user = Auth::user();
        $kode = 'T-BM-' . date('ymd');
        $kode_terakhir = BarangMasuk::max('id_barang_masuk');
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $id_barang_masuk = $kode . $number;
        
        $barangmasuk = new BarangMasuk;
        $barangmasuk->id_barang_masuk = $id_barang_masuk;
        $barangmasuk->supplier_id = $request->supplier_id;
        $barangmasuk->barang_id = $request->barang_id;
        $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->user_id = $user->id_user;
        $barangmasuk->save();

        return redirect('/dashboard/barang_masuk');
    }
    
    public function delete_barangmasuk($id){
        BarangMasuk::where('id_barang_masuk',$id)->delete();
        return true;
    }

    public function barang_keluar(){
        $data['all'] = BarangKeluar::join('barang','barang.id_barang','=','barang_keluar.barang_id')->join('users','users.id_user','=','barang_keluar.user_id')->orderBy('id_barang_keluar','DESC')->get();
        $data['barang'] = DB::table('barang')->get();
        return view('dashboard/barangkeluar',$data);
    }

    public function insert_barangkeluar(Request $request){
        $user = Auth::user();
        $kode = 'T-BK-' . date('ymd');
        $kode_terakhir = BarangKeluar::max('id_barang_keluar');
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $id_barang_keluar = $kode . $number;
        
        $barangkeluar = new BarangKeluar;
        $barangkeluar->id_barang_keluar = $id_barang_keluar;
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->jumlah_keluar = $request->jumlah_keluar;
        $barangkeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangkeluar->user_id = $user->id_user;
        $barangkeluar->save();

        return redirect('/dashboard/barang_keluar');
    }
    
    public function delete_barangkeluar($id){
        BarangKeluar::where('id_barang_keluar',$id)->delete();
        return true;
    }

    public function user_management(){
        $data['all'] = User::get();
        return view('dashboard/usermanagement',$data);
    }

     public function insert_user(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_telp' => ['required', 'string', 'min:12'],
            'role' => ['required'],
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_telp = $request->no_telp;
        $user->is_active = 1;
        $user->role = $request->role;
        $user->save();
        return redirect('/dashboard/user_management');
    }

    public function activate_user(Request $request){
        if(isset($request->activate)){
            $user = User::find($request->id_user);
            $user->is_active = 1;
            $user->save();
        }
        else{
            $user = User::find($request->id_user);
            $user->is_active = 0;
            $user->save();   
        }
        return redirect('/dashboard/user_management');
    }

    public function update_user(Request $request){
        $user = User::find($request->id_user);
        if($request->email != $user->email){
             $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_telp' => ['required', 'string', 'min:12'],
                'role' => ['required'],
            ]);
            $user->name = $request->name;
            $user->no_telp = $request->no_telp;
            $user->role = $request->role;
            $user->email = $request->email;
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'no_telp' => ['required', 'string', 'min:12'],
                'role' => ['required'],
            ]);
            $user->name = $request->name;
            $user->no_telp = $request->no_telp;
            $user->role = $request->role;
        }
        $user->save();
        return redirect('/dashboard/user_management');
    }

    public function delete_user($id){
        User::where('id_user',$id)->delete();
        return true;
    }

    public function profile(){
        $data['all'] = Auth::user();
        return view('dashboard/profile',$data);
    }

    public function update_profile(Request $request){
        $user = Auth::user();
        if($request->email != $user->email){
             $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_telp' => ['required', 'string', 'min:12'],
                'foto' => ['max:2048'],
            ]);
            $user->name = $request->name;
            $user->no_telp = $request->no_telp;
            $user->email = $request->email;
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'no_telp' => ['required', 'string', 'min:12'],
                'foto' => ['max:2048'],
            ]);
            $user->name = $request->name;
            $user->no_telp = $request->no_telp;
        }
        
        if(isset($request->foto)){
            $imageName = time()+$user->id_user.'.'.$request->foto->getClientOriginalExtension();;
            $request->foto->move(public_path('images/profile'), $imageName);
            $user->foto=$imageName;
        }
        Session::put('name', $user->name);
        Session::put('id', $user->id);
        Session::put('email', $user->email);
        Session::put('foto', $user->foto);
        $user->save();
        return redirect('/dashboard/profile');
    }

    public function change_password(Request $request){
        $user = Auth::user();
        if(Hash::check($request->old_password, $user->password)){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
            $user->save();
        }
        else{
            $error = new \stdClass();
            $error->old_password = "Password Lama Salah";
            return redirect()->back()->withErrors($error);
        }
        return redirect('/dashboard/profile');

    }

    public function laporan(){
        return view('dashboard/laporan');
    }

    public function cetak_laporan(Request $request){
        $split = explode(' - ', $request->daterange);
        $start = date('Y-m-d', strtotime($split[0]));
        $end = date('Y-m-d', strtotime(end($split)));
        $data['tanggal'] = $request->daterange;
        // print_r($request->output);die();
        if($request->output==0){
            if($request->tipe==0){
            $data['laporan'] = BarangMasuk::join('barang','barang.id_barang','=','barang_masuk.barang_id')->join('supplier','supplier.id_supplier','=','barang_masuk.supplier_id')->join('users','users.id_user','=','barang_masuk.user_id')->whereBetween('tanggal_masuk',[$start,$end])->orderBy('id_barang_masuk','DESC')->get(['tanggal_masuk','id_barang_masuk','nama_barang','nama_supplier','jumlah_masuk']);
            $pdf = PDF::loadView('dashboard/laporan_masuk',$data);
               return $pdf->download('laporan-barang-masuk-'.$request->daterange.'.pdf');
            }
            else{
                $data['laporan'] = BarangKeluar::join('barang','barang.id_barang','=','barang_keluar.barang_id')->join('users','users.id_user','=','barang_keluar.user_id')->whereBetween('tanggal_keluar',[$start,$end])->orderBy('id_barang_keluar','DESC')->get(['tanggal_keluar','id_barang_keluar','nama_barang','jumlah_keluar']);
                $pdf = PDF::loadView('dashboard/laporan_keluar',$data);
                return $pdf->download('laporan-barang-keluar-'.$request->daterange.'.pdf');
            }
        }
        else{
            if($request->tipe==0){
                $date = str_replace("/","-",str_replace("-","until",$request->daterange));
                $filename = 'laporan-barang-masuk-'.$date.'.xlsx';
                return Excel::download(new BarangMasukExport($start,$end), $filename);
            }
            else{
                $date = str_replace("/","-",str_replace("-","until",$request->daterange));
                $filename = 'laporan-barang-keluar-'.$date.'.xlsx';
                return Excel::download(new BarangKeluarExport($start,$end), $filename);
            }
        }
    }
}
