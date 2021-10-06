<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Perkiraan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\MainTransaksi;
use Auth;
use App\User;
use App\Saldo;

class BukuBesarController extends Controller
{
    public function __construct(Request $req){
        $this->_kredit = Perkiraan::where('nmr_perkiraan','1001')->orWhere('nmr_perkiraan','1002')->orWhere('nmr_perkiraan','1003')->get();
        $this->_perkiraan = Perkiraan::whereNotIn('nmr_perkiraan', ['1001','1002','1003'])->get();

        $this->middleware(function ($request, $next) {      
            if(auth()->user()->hasRole('yayasan')){
                $this->_kredit = Perkiraan::where('nmr_perkiraan','>=','1001')->get();
                $this->_debet = Perkiraan::get();
            }else if(auth()->user()->hasRole('smk')){
                $this->_kredit = Perkiraan::where('nmr_perkiraan','1001')->get();
                $this->_debet = Perkiraan::where('nmr_perkiraan','1001')->orWhere('nmr_perkiraan','>','5000')->where('nmr_perkiraan','<=','5434 ')->get();
            }else{
                $this->_kredit = Perkiraan::where('nmr_perkiraan','1001')->get();
                $this->_debet = Perkiraan::where('nmr_perkiraan','1002')->orWhere('nmr_perkiraan','>','6000')->where('nmr_perkiraan','<=','6312')->get();
            }
            return $next($request);
        });
       
      //  $this->middleware(['auth','verified']);


       }

    public function index(){
        $iduser = auth()->user()->id;
        $kredit = $this->_kredit;
        $bulanini = Carbon::now()->isoFormat('MMMM');
        $bulanini2 = Carbon::now()->month;
        $perkiraan = $this->_debet;
        $bulan = array('1','2','3','4','5','6','7','8','9','10','11','12');
        $bulanString = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

        if(auth()->user()->hasRole('yayasan')){
            $transaksi =  DB::table('buku_besar')
            ->join('transaksi', 'transaksi.kode_transaksi', '=', 'buku_besar.id_transaksi')
            ->join('users', 'users.id', '=', 'transaksi.id_user')->orderBy('buku_besar.tanggal', 'ASC')->get();
        }else{
            $transaksi =  DB::table('buku_besar')
            ->join('transaksi', 'transaksi.kode_transaksi', '=', 'buku_besar.id_transaksi')
            ->join('users', 'users.id', '=', 'transaksi.id_user')
            ->where('users.id', $iduser)->select('transaksi.*')->select("buku_besar.*")->get();
        }
        
       
       return view('transaksi', compact('perkiraan','transaksi','bulanString','bulan','bulanini','kredit'));
       echo $transaksi;
    }

    public function tampilkan(Request $req){
        $stat = 'default';
        $perkiraan = Perkiraan::get();
        $kodeper = $req->input('kodeper');
        $bulanselect = $req->input('bulan');
        
        $bulan = array('1','2','3','4','5','6','7','8','9','10','11','12');
        $bulanString = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novermber','Desember');


        if($bulanselect == 'semua' && $kodeper == 'semua'){
            $trans = array();
            for($i = 0;$i < count($bulan);$i++){
                $bulanews = (int) $bulan[$i];
                $transaksi = Transaksi::whereMonth('tanggal', $bulanews)->get();
                array_push($trans, $transaksi);
            }
            $stat = 'allMonthAllItems';
            return view('bukuBesar', compact('perkiraan','kodeper','trans','bulanString','bulan', "bulanselect","stat"));
        }else if($bulanselect == 'semua'){
            $trans = array();
            for($i = 0;$i < count($bulan);$i++){
                $bulanews = (int) $bulan[$i];
                $transaksi = Transaksi::where('nmr_perkiraan', $kodeper)->whereMonth('tanggal', $bulanews)->get();
                array_push($trans, $transaksi);
            }
            $stat = 'allMonth';
            return view('bukuBesar', compact('perkiraan','kodeper','trans','bulanString','bulan', "bulanselect", "stat"));
        }else if($kodeper == 'semua'){
            $transaksi = Transaksi::whereMonth('tanggal', $bulanselect)->get();

            return view('bukuBesar', compact('perkiraan','kodeper','transaksi','bulanString','bulan', 'stat','bulanselect'));
        }else{
            $transaksi = Transaksi::where('nmr_perkiraan', $kodeper)->whereMonth('tanggal', $bulanselect)->get();
            return view('bukuBesar', compact('perkiraan','kodeper','transaksi','bulanString','bulan', 'stat','bulanselect'));
        }
    }

    public function bb(){
        $tahun = Carbon::now()->year;
        $bulan = '09';
        $kode = Perkiraan::where('nmr_perkiraan', '>=', '1001')->where('nmr_perkiraan', '<=', '3005')->get()->toArray();
        $bb = array();
        for($i = 0; $i < count($kode);$i++){
            array_push($bb, $kode[$i]);
            $saldo = Saldo::where('kode_perk', $kode[$i]['nmr_perkiraan'])->whereYear('tahun', $tahun)->first();
            $debetb = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereMonth('tanggal','<',$bulan)->where('tipe', 'debet')->whereYear('tanggal', $tahun)->sum('nominal');
            $kreditb = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereMonth('tanggal','<', $bulan)->where('tipe', 'kredit')->whereYear('tanggal', $tahun)->sum('nominal');
            $bb[$i]['saldo'] = $saldo->nominal + ($debetb - $kreditb);
            $currentTransaksi = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get()->toArray();
            $bb[$i]['jmltrans'] = 0;
            for($j = 0; $j < count($currentTransaksi); $j++){
                $bb[$i]['transaksi'.$j] = $currentTransaksi[$j];
                $bb[$i]['jmltrans'] += 1;
            }
        }

    
     // dd($bb);
        return view('bukuBesar', compact('bb','kode'));
    }

    public function cari(Request $req){
        $bulan = $req->input('bulan');
        $kode =  Perkiraan::get()->toArray();;
        if($req->input('kodeper') != 'semua'){
            $kode = Perkiraan::where('nmr_perkiraan', $req->input('kodeper'))->get()->toArray();
            
        }else{
            $kode = Perkiraan::where('nmr_perkiraan', '<=', '3005')->get()->toArray();
        }
       
        $tahun = Carbon::now()->year;
        $bb = array();
        for($i = 0; $i < count($kode);$i++){
            array_push($bb, $kode[$i]);
            $saldo = Saldo::where('kode_perk', $kode[$i]['nmr_perkiraan'])->whereYear('tahun', $tahun)->first();
            $debetb = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereMonth('tanggal','<',$bulan)->where('tipe', 'debet')->whereYear('tanggal', $tahun)->sum('nominal');
            $kreditb = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereMonth('tanggal','<', $bulan)->where('tipe', 'kredit')->whereYear('tanggal', $tahun)->sum('nominal');
            $bb[$i]['saldo'] = $saldo->nominal + ($debetb - $kreditb);
            $currentTransaksi = Transaksi::where('nmr_perkiraan', $kode[$i]['nmr_perkiraan'])->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get()->toArray();
            $bb[$i]['jmltrans'] = 0;
            for($j = 0; $j < count($currentTransaksi); $j++){
                $bb[$i]['transaksi'.$j] = $currentTransaksi[$j];
                $bb[$i]['jmltrans'] += 1;
            }
        }
        return view('bukuBesar', compact('bb', 'kode'));
    }
}
