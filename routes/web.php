<?php

use App\Http\Controllers\SaldoDanPenyusutanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
//use App\Http\Controllers\SaldoDanPenyusutanController;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/transaksi',  'TransaksiController@index');
Route::post('/bukubesar/transaksi', 'TransaksiController@prosestransaksi');
Route::get('/trans', 'BukuBesarController@index')->name("transaksi");
Route::match(['get','post'],'/BukuBesar/cari', 'BukuBesarController@tampilkan');
Route::middleware('role:yayasan')->get('/neracaLajur', 'NeracaLajurController@index')->name("neracalajur");
Route::middleware('role:yayasan')->get('/neracaLajur', 'NeracaLajurController@index')->name("neracalajur");
Route::post('/neracaLajur/cari', 'NeracaLajurController@cari');
Route::post('/bukubesar/ubah', 'TransaksiController@ubah');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');
Route::get('bukubesar/edit', 'TransaksiController@edit');
Route::resource('transaksi', 'TransaksiController');
Route::get('/transaksi/{id}', [TransaksiController::class, 'edit']);
Route::get('/bukubesar/destroy', 'TransaksiController@hapus')->name('destroy');
Route::middleware('role:yayasan')->get('/admin/laporan', function(){
    return view("laporan.bulanan");
});

Route::group(['prefix' => 'excel'], function(){
    Route::get('/admin/laporan/cetak', 'CetakController@index' )->name('excelku');
});

Route::middleware('role:yayasan')->get('admin/laporan/bulanan/cetak', 'CetakController@export')->name('cetak.bulanan');
Route::middleware('role:yayasan')->get('admin/laporan/bulanan/cetakpdf', 'CetakController@exportpdf')->name('cetak.bulanan.pdf');
Route::middleware('role:yayasan')->get('admin/laporan/bulanan', 'BulananController@index')->name('suplus');
Route::middleware('role:yayasan')->get('/admin/kelolaadmin', 'adminController@index')->name('adminedit');
Route::middleware('role:yayasan')->patch('admin/update/{id}', 'adminController@update')->name('update');

Route::middleware('role:yayasan')->get('/admin/laporan/tahunan/', function(){
    return view("laporan.neracatahunan");
})->name('neraca.tahunan');
Route::middleware('role:yayasan')->post('admin/laporan/bulanan/cari', 'BulananController@filter')->name('bulananfilter');
Route::middleware('role:yayasan')->get('bigbook', 'BukuBesarController@bb')->name('bukubesar');
Route::middleware('role:yayasan')->get('/bigbook/filter', 'BukuBesarController@cari')->name('filterbuku');
Route::middleware('role:yayasan')->get('/saldodanpenyusutan', 'SaldoDanPenyusutanController@index')->name('saldodanpenyusutan');
Route::middleware('role:yayasan')->post('/saldos', 'SaldoDanPenyusutanController@act')->name('saldomanage');
Route::middleware('role:yayasan')->get('/admin/penyusutan', 'SaldoDanPenyusutanController@penyusutan')->name('penyusutan');
Route::middleware('role:yayasan')->post('/admin/penyusutan/tambah', 'SaldoDanPenyusutanController@tambahpenyu')->name('penyusutan.tambah');

Route::get('/penyusutan/{id}', [SaldoDanPenyusutanController::class, 'edit'])->name('penyu.edit');
Route::post('/admin/penyusutan/edit/terapkan', [SaldoDanPenyusutanController::class, 'update'])->name('penyu.update');
Route::get('/admin/penyusutan/hapus/{id}', [SaldoDanPenyusutanController::class, 'destroy'])->name('penyu.destroy');

