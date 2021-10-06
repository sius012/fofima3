<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Saldo;
use App\Perkiraan;
use Carbon\Carbon;
use App\Transaksi;
use App\MainTransaksi;



class SaldoDanPenyusutanController extends Controller
{   
    public function __construct(){
        $this->_bulan = Carbon::now()->month;
        $this->_tahun = Carbon::now()->year;
    }

    public function index(){
        $perkiraan = Perkiraan::where('nmr_perkiraan', '<=', '3005')->get()->toArray();
        $listsaldo = [];
        $tahun = Carbon::now()->year;
        $bulan = Carbon::now()->month;
        $sudahadasaldo = false;
        $saldokah = Saldo::where('kode_perk', '<=', '3005')->get();
        $check = $saldokah->count();
        if($check > 0){
            $sudahadasaldo = true;
        }else{
            $sudahadasaldo = false;
        }

        for($i = 0;$i < count($perkiraan); $i++){
            array_push($listsaldo, $perkiraan[$i]);
            $saldolastyear = 0;
            $saldonewyear = Saldo::where('kode_perk', $perkiraan[$i]['nmr_perkiraan'])->whereYear('tahun', $tahun)->get()->toArray();
            $getlast = Saldo::where('kode_perk', $perkiraan[$i]['nmr_perkiraan'])->whereYear('tahun', $tahun-1)->get()->toArray();
            $getcurrentd = Transaksi::where('tipe', 'debet')->where('nmr_perkiraan',  $perkiraan[$i]['nmr_perkiraan'])->whereMonth('tanggal', '<=', $bulan)->whereYear('tanggal', '=', $tahun)->sum('nominal');
            $getcurrentk = Transaksi::where('tipe', 'kredit')->where('nmr_perkiraan',  $perkiraan[$i]['nmr_perkiraan'])->whereMonth('tanggal', '<=', $bulan)->whereYear('tanggal', '=', $tahun)->sum('nominal');
            if(count($getlast) <= 0){
                $saldolastyear = 0;
            }else{
                $saldolastyear = $getlast[0]['nominal'];
            }
            $currentsaldo=0;
            if($saldolastyear <= 0){
                if(count($saldonewyear) <= 0){
                    $currentsaldo=0;
                }else{
                    $currentsaldo=$saldonewyear[0]['nominal'];
                }
                
            }else{
                $currentsaldo=$getlast[0]['nominal'];
            }
            $listsaldo[$i]['l_saldo'] = $currentsaldo;
            $listsaldo[$i]['c_saldo'] = $currentsaldo+($getcurrentd-$getcurrentk);
        }
        //dd($sudahadasaldo);
        return view("admin.sp", compact('listsaldo', 'sudahadasaldo'));
        
        
    }
    public function act(Request $req){

        $date = date('Y-m-d');
        $newdate = strtotime("+ 1 year", strtotime($date));
        $newdate = date('Y-m-d', $newdate);
        $perkiraan = Perkiraan::where('nmr_perkiraan', '<=', '3005')->get()->toArray();
        $saldo = Saldo::whereYear('tahun', $this->_tahun)->where('tipe', 'akhir')->get();
        $find = $saldo->count();
        switch ($req->input('aksi')) {
            case 'terapkan':
  
                for($i = 0; $i < $req->input('jml');$i++){
                    $add = Saldo::insert(['kode_perk' => $perkiraan[$i]['nmr_perkiraan'], 'nominal' => $req->input('lastsaldo'.($i+1)),'tahun' => $date, 'tipe' => 'awal']);
                }
                break;
            
            case 'perbarui':
                if($find <= 0){
                    for($i = 0; $i < $req->input('jml');$i++){
                        $add = Saldo::insert(['kode_perk' => $perkiraan[$i]['nmr_perkiraan'], 'nominal' => $req->input('currentsaldo'.($i+1)),'tahun' => $date, 'tipe' => 'akhir']);
                        $add2 = Saldo::insert(['kode_perk' => $perkiraan[$i]['nmr_perkiraan'], 'nominal' => $req->input('currentsaldo'.($i+1)),'tahun' => $newdate, 'tipe' => 'awal']);
                    }
                }else{
                    for($i = 0; $i < $req->input('jml');$i++){
                        $update = DB::table('saldo')->where('kode_perk', $perkiraan[$i]['nmr_perkiraan'])->whereYear('tahun', $this->_tahun)->where('tipe', 'akhir')->update(['nominal' => $req->input('currentsaldo'.($i+1))]);
                        $update2 = DB::table('saldo')->where('kode_perk', $perkiraan[$i]['nmr_perkiraan'])->whereYear('tahun', $this->_tahun+1)->where('tipe', 'akhir')->update(['nominal' => $req->input('currentsaldo'.($i+1))]);
                    }
                }
                 break;
            default:
                # code...
                break;
        }

        return redirect()->route('saldodanpenyusutan');
    }

    public function penyusutan(){
        $penyusutan = Transaksi::where('keterangan_transaksi', 'penyusutan')->whereMonth('tanggal', $this->_bulan)->where('nmr_perkiraan', '>=', '8001')->where('nmr_perkiraan', '<=', '8008')->get();
        $perkiraan = Perkiraan::where('nmr_perkiraan', '>=','8001')->where('nmr_perkiraan', '<=','8008')->get();
        return view("admin.penyusutan", compact('perkiraan', 'penyusutan'));
        
    }
    
    public function tambahpenyu(Request $req){
        $iduser = auth()->user()->id;
        $tanggal = $req->input('tanggal');
        $kode = $req->input('kodeperk');
        $nominal = $req->input('nominal');

        $id = MainTransaksi::insertGetId(['id_user' => $iduser, 'tanggal' => $tanggal]);
        $insert = Transaksi::insert(['id_transaksi' => $id, 'tanggal' => $tanggal, 'tipe' => 'debet', 'nmr_perkiraan' => $kode, 'nominal' => $nominal, 'keterangan_transaksi' => 'penyusutan']);
        return redirect()->route('penyusutan');

    }

    public function edit($id){
        $penyusutan = Transaksi::where('keterangan_transaksi', 'penyusutan')->whereMonth('tanggal', $this->_bulan)->where('nmr_perkiraan', '>=', '8001')->where('nmr_perkiraan', '<=', '8008')->get();
        $perkiraan = Perkiraan::where('nmr_perkiraan', '>=','8001')->where('nmr_perkiraan', '<=','8008')->get();
        $penyuedit = Transaksi::find($id);

        return view('admin.penyusutan', compact('penyusutan', 'penyuedit', 'perkiraan'));
    }
    public function update(Request $req){
        $id = $req->input('id_transaksi');
        $tanggal = $req->input('tanggal');
        $kode = $req->input('kodeperk');
        $nominal = $req->input('nominal');
        $update = DB::table('buku_besar')->where('id', $id)->update(['tanggal' => $tanggal,'nmr_perkiraan' => $kode, 'nominal' => $nominal]);
        return redirect()->route('penyusutan');
    }
    public function destroy($id){
        $getid = Transaksi::find($id);
        $main = MainTransaksi::find($getid->id_transaksi);
        $main->delete();
        $getid->delete();
        $getid->delete();

        return redirect()->route('penyusutan');
        
    }
}
