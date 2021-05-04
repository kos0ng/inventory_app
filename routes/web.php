<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware([CheckStatus::class])->group(function(){
Route::get('/', 'TaskController@index')->name('index');
Route::get('/dashboard', 'TaskController@index')->name('index');
Route::get('/dashboard/supplier', 'TaskController@supplier')->name('supplier');
Route::post('/dashboard/insert_supplier', 'TaskController@insert_supplier');
Route::post('/dashboard/update_supplier', 'TaskController@update_supplier');
Route::get('/dashboard/delete_supplier/{id}', 'TaskController@delete_supplier');
Route::get('/dashboard/satuan_barang', 'TaskController@satuan')->name('satuan_barang');
Route::post('/dashboard/insert_satuan', 'TaskController@insert_satuan');
Route::post('/dashboard/update_satuan', 'TaskController@update_satuan');
Route::get('/dashboard/delete_satuan/{id}', 'TaskController@delete_satuan');
Route::get('/dashboard/jenis_barang', 'TaskController@jenis')->name('jenis_barang');
Route::post('/dashboard/insert_jenis', 'TaskController@insert_jenis');
Route::post('/dashboard/update_jenis', 'TaskController@update_jenis');
Route::get('/dashboard/delete_jenis/{id}', 'TaskController@delete_jenis');
Route::get('/dashboard/data_barang', 'TaskController@barang')->name('data_barang');
Route::post('/dashboard/insert_barang', 'TaskController@insert_barang');
Route::post('/dashboard/update_barang', 'TaskController@update_barang');
Route::get('/dashboard/delete_barang/{id}', 'TaskController@delete_barang');
Route::get('/dashboard/barang_masuk', 'TaskController@barang_masuk')->name('barang_masuk');
Route::post('/dashboard/insert_barangmasuk', 'TaskController@insert_barangmasuk');
Route::post('/dashboard/update_barangmasuk', 'TaskController@update_barangmasuk');
Route::get('/dashboard/delete_barangmasuk/{id}', 'TaskController@delete_barangmasuk');
Route::get('/dashboard/barang_keluar', 'TaskController@barang_keluar')->name('barang_keluar');
Route::post('/dashboard/insert_barangkeluar', 'TaskController@insert_barangkeluar');
Route::post('/dashboard/update_barangkeluar', 'TaskController@update_barangkeluar');
Route::get('/dashboard/delete_barangkeluar/{id}', 'TaskController@delete_barangkeluar');
Route::get('/dashboard/user_management', 'TaskController@user_management')->name('user_management');
Route::post('/dashboard/activate_user', 'TaskController@activate_user');
Route::post('/dashboard/insert_user', 'TaskController@insert_user');
Route::post('/dashboard/update_user', 'TaskController@update_user');
Route::get('/dashboard/delete_user/{id}', 'TaskController@delete_user');
Route::get('/dashboard/profile', 'TaskController@profile');
Route::post('/dashboard/update_profile', 'TaskController@update_profile');
Route::post('/dashboard/change_password', 'TaskController@change_password');
Route::get('/dashboard/laporan', 'TaskController@laporan')->name('laporan');
Route::post('/dashboard/cetak_laporan', 'TaskController@cetak_laporan');
Route::post('/dashboard/export_table', 'TaskController@export_table');
});

