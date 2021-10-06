<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perkiraan;
use App\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Saldo;

class NeracaLajurController extends Controller
{
    public function __construct(){
        $this->_perkiraan = Perkiraan::all()->toArray();
    }
    public function index(){
        $kredit = Perkiraan::where('nmr_perkiraan','1001')->orWhere('nmr_perkiraan','1002')->orWhere('nmr_perkiraan','1003')->get();
        $bulan = array('1','2','3','4','5','6','7','8','9','10','11','12');
        $bulanString = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novermber','Desember');
        $perkiraan = Perkiraan::all()->toArray();
        
        $totalKredit = [];
        $totalKredit[0] = 0;
        $totalKredit[1] = 0;
        $totalKredit[2] = 0;
        $totalKredit[3] = 0;
        $totalKredit[4] = 0;
        $totalKredit[5] = 0;
        $totalKredit[6] = 0;
        $totalKredit[7] = 0;
        $totalKredit[8] = 0;
        $totalKredit[9] = 0;
        $totalKredit[10] = 0;
        $totalKredit[11] = 0;

        $totalDebet[0] = 0;
        $totalDebet[1] = 0;
        $totalDebet[2] = 0;
        $totalDebet[3] = 0;
        $totalDebet[4] = 0;
        $totalDebet[5] = 0;
        $totalDebet[6] = 0;
        $totalDebet[7] = 0;
        $totalDebet[8] = 0;
        $totalDebet[9] = 0;
        $totalDebet[10] = 0;
        $totalDebet[11] = 0;

        $neraca = array();

        for($i = 0; $i < count($perkiraan); $i++){
            array_push($neraca, $perkiraan[$i]);
            $nmr_perk = $perkiraan[$i]['nmr_perkiraan'];
            if($i <= 39){
              $getsaldo = Saldo::where("kode_perk", $perkiraan[$i]['nmr_perkiraan'])->whereYear("tahun", 2021)->first();
              $neraca[$i]['saldoawal'] =  $getsaldo->nominal;
            }else{
                $neraca[$i]['saldoawal'] = 0;
            }
            
            $neraca[$i]['saldoakhir'] = 0;
            $neraca[$i]['totalKredit'] = 0;
            $neraca[$i]['totalDebet'] = 0;
            
            for($j = 0; $j < count($bulanString); $j++){
                $mnth = $bulanString[$j];
                $mnth1 = $bulan[$j];

                
                $debetq = Transaksi::where('nmr_perkiraan', $nmr_perk)->whereMonth('tanggal', $mnth1)->where('tipe', 'debet')->whereYear('tanggal', '2021')->sum('nominal');
                $kreditq = Transaksi::where('nmr_perkiraan', $nmr_perk)->whereMonth('tanggal', $mnth1)->where('tipe', 'kredit')->whereYear('tanggal', '2021')->sum('nominal');


                $neraca[$i][$mnth." Debet"] = $debetq;
                $neraca[$i][$mnth." Kredit"] = $kreditq;

                if($j == 0){
                    $neraca[$i]['saldoakhir'] += $neraca[$i]['saldoawal'] + $debetq - $kreditq;
                }else{
                    $neraca[$i]['saldoakhir'] += $debetq - $kreditq;
                }
                
                $neraca[$i]['totalKredit'] += $kreditq;
                $neraca[$i]['totalDebet'] += $debetq;
                $totalKredit[$j] += $kreditq;
                $totalDebet[$j] += $debetq;
            }

           
        }

      //  dd(Saldo::where("kode_perk", 3001)->whereYear("tahun", 2021)->get()->toArray());

      return view('NeracaLajur', compact('neraca','bulanString', 'perkiraan','kredit','totalDebet','totalKredit'));
    }

  /*  public function cari(Request $request)
	{

		$cari = $request->cari;
 
    	
		$neraca = DB::table('nomor_perkiraan')
		->where('nmr_perkiraan','like',"%".$cari."%")
		->paginate();
 
    	
		return view('NeracaLajur',['neraca' => $neraca]);
 
	}*/

    // public function search(Request $request)
    // {
    //     $keyword = $request->search;
    //     $users = user::where('nmr_perkiraan', 'like', "%" . $keyword . "%")->paginate(5);
    //     return view('NeracaLajur', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function cari(Request $req){
        $perkiraan = Perkiraan::all();
        $blninput = $req->input('bulaninput');
        $nomor = $req->input('nomor');
        $bulan = array('1','2','3','4','5','6','7','8','9','10','11','12');
        $bulanString = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novermber','Desember');
        $perkiraans = Perkiraan::where('nmr_perkiraan', $nomor)->get()->toArray();

        
       
        $neraca = array();

        for($i = 0; $i < count($perkiraans); $i++){
            array_push($neraca, $perkiraans[$i]);
            $nmr_perk = $perkiraans[$i]['nmr_perkiraan'];
            $neraca[$i]['saldoawal'] = 10000000;
            $neraca[$i]['saldoakhir'] = 0;
            $neraca[$i]['totalKredit'] = 0;
            $neraca[$i]['totalDebet'] = 0;
            
            for($j = 0; $j < count($bulanString); $j++){
                $mnth = $bulanString[$j];
                $mnth1 = $bulan[$j];

                
                $debetq = Transaksi::where('nmr_perkiraan', $nmr_perk)->whereMonth('tanggal', $mnth1)->where('tipe', 'debet')->whereYear('tanggal', '2021')->sum('nominal');
                $kreditq = Transaksi::where('nmr_perkiraan', $nmr_perk)->whereMonth('tanggal', $mnth1)->where('tipe', 'kredit')->whereYear('tanggal', '2021')->sum('nominal');


                $neraca[$i][$mnth." Debet"] = $debetq;
                $neraca[$i][$mnth." Kredit"] = $kreditq;

                if($j == 0){
                    $neraca[$i]['saldoakhir'] += $neraca[$i]['saldoawal'] + $debetq - $kreditq;
                }else{
                    $neraca[$i]['saldoakhir'] += $debetq - $kreditq;
                }
                
                $neraca[$i]['totalKredit'] += $kreditq;
                $neraca[$i]['totalDebet'] += $debetq;
            }

           
        }
        $jml = count($perkiraans);
        
        $perkiraan = $this->_perkiraan;
       
     

        return view('NeracaLajur', compact('neraca','bulanString','perkiraan'));
    }
 
}


