<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Transaksi;

class BulananController extends Controller
{
    public function __contruct(){
        $this->_bulan = Carbon::now()->month();
    }
    public function index(){
        
        $bulans =  Carbon::now()->format('m');
        $tahun =  Carbon::now()->format('Y');
        $pll = [];
        $bll = [];
        $pll['a'] = Transaksi::where('nmr_perkiraan', '=' ,'9102')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '=', $bulans)->get()->sum('nominal');
        $pll['b'] = Transaksi::where('nmr_perkiraan', '=' ,'9102')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $bulans)->get()->sum('nominal');
        $bll['a'] = Transaksi::where('nmr_perkiraan', '=' ,'9103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '=', $bulans)->get()->sum('nominal');
        $bll['b'] = Transaksi::where('nmr_perkiraan', '=' ,'9103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $bulans)->get()->sum('nominal');
        

        
        $listbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "
        Oktober","November", "Desember");
        

        $listpemasukan = ['donatur','smk','penerimaan lain-lain','dana bos'];
        $listpengeluaran = ['SMK Bagimu Negeriku','Asrama','Yayasan'];
        $jmlpemB = 0;
        $jmlpemM = 0;
        $jmlpenB = 0;
        $jmlpenM = 0;
        $pemasukan = [];
        $pengeluaran = [];
        $penyusutancurrent = Transaksi::where('nmr_perkiraan', '>=' ,'8001')->where('nmr_perkiraan','<=', '8008')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '10')->get()->sum('nominal');
        $penyusutan = Transaksi::where('nmr_perkiraan', '>=' ,'8001')->where('nmr_perkiraan','<=', '8008')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '10')->get()->sum('nominal');
        //dd($penyusutancurrent);

        for($i = 0;$i < count($listpemasukan);$i++){
            $row = [];
            switch ($listpemasukan[$i]) {
                case 'donatur':
                    $subrow = [];
                    $donaturbulanan = Transaksi::where('nmr_perkiraan', '>=', '4001')->where('nmr_perkiraan', '<=', '4004')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    $donaturmutasi = Transaksi::where('nmr_perkiraan', '>=', '4001')->where('nmr_perkiraan', '<=', '4004')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $donaturbulanan);
                    array_push($subrow, $donaturmutasi);
                    array_push($row, $subrow);
                    $jmlpemB += $donaturbulanan;
                    $jmlpemM += $donaturmutasi;
                    break;
                case 'smk':
                    $subrow = [];
                    $uangpendaftaranb = Transaksi::where('nmr_perkiraan', '4101')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    $uangpendaftaranm = Transaksi::where('nmr_perkiraan', '4101')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $uangpendaftaranb);
                    array_push($subrow, $uangpendaftaranm);
                    array_push($row, $subrow);
                    $jmlpemB += $uangpendaftaranb;
                    $jmlpemM += $uangpendaftaranm;
                    break;
                case 'penerimaan lain-lain':
                    $subrow = [];
                    $penerimanb = Transaksi::where('nmr_perkiraan', '4300')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    $penerimaanm = Transaksi::where('nmr_perkiraan', '4300')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '>=', $bulans)->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $penerimanb);
                    array_push($subrow, $penerimaanm);
                    array_push($row, $subrow);
                    $jmlpemB += $penerimanb;
                    $jmlpemM += $penerimaanm;
                    break;
                case 'dana bos':
                    $subrow = [];
                    $danabosb = Transaksi::where('nmr_perkiraan', '4200')->whereYear('tanggal', $tahun)->whereMonth('tanggal',  $bulans)->where('tipe', 'kredit')->sum('nominal');
                    $danabosm = Transaksi::where('nmr_perkiraan', '4200')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=',$bulans)->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $danabosb);
                    array_push($subrow, $danabosm);
                    array_push($row, $subrow);
                    $jmlpemB += $danabosb;
                    $jmlpemM += $danabosm;
                    break;
            }   
            array_push($pemasukan, $row);
        }

        for($j = 0; $j < count($listpengeluaran); $j++){
            if($j == 0){
            $row = [];
            switch ($listpengeluaran[$j]) {
                case 'SMK Bagimu Negeriku':
                       // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                        $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '5101')->where('nmr_perkiraan', '<=', '5104')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                        $pemeliharaanbulanan = Transaksi::where('nmr_perkiraan', '>=', '5201')->where('nmr_perkiraan', '<=', '5214')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                        $badmubulanan = Transaksi::where('nmr_perkiraan', '>=', '5301')->where('nmr_perkiraan', '<=', '5320')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                        $bpbbulanan = Transaksi::where('nmr_perkiraan', '>=', '5401')->where('nmr_perkiraan', '<=', '5434')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                        
                        $pegawaimutasi = Transaksi::where('nmr_perkiraan', '>=', '5101')->where('nmr_perkiraan', '<=', '5104')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                        $pemeliharaanmutasi = Transaksi::where('nmr_perkiraan', '>=', '5201')->where('nmr_perkiraan', '<=', '5214')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                        $badmumutasi = Transaksi::where('nmr_perkiraan', '>=', '5301')->where('nmr_perkiraan', '<=', '5320')->whereYear('tanggal', $tahun)->whereMonth('tanggal','<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                        $bpbmutasi = Transaksi::where('nmr_perkiraan', '>=', '5401')->where('nmr_perkiraan', '<=', '5434')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                        array_push($row, $pegawaibulanan);
                        array_push($row, $pemeliharaanbulanan);
                        array_push($row, $badmubulanan);
                        array_push($row, $bpbbulanan);

                        array_push($row, $pegawaimutasi);
                        array_push($row, $pemeliharaanmutasi);
                        array_push($row, $badmumutasi);
                        array_push($row, $bpbmutasi);
                        $jmlpenB += $pegawaibulanan;
                        $jmlpenB += $pemeliharaanbulanan;
                        $jmlpenB += $badmubulanan;
                        $jmlpenB += $bpbbulanan;
                        $jmlpenM += $pegawaimutasi;
                        $jmlpenM += $pemeliharaanmutasi;
                        $jmlpenM += $badmumutasi;
                        $jmlpenM += $bpbmutasi;
                     
                   
                    
                case 'Yayasan':
                    // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                     $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '7101')->where('nmr_perkiraan', '<=', '7105')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                     $badmubulanan = Transaksi::where('nmr_perkiraan', '>=', '7201')->where('nmr_perkiraan', '<=', '7227')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
            
        
                     
                     $pegawaimutasi = Transaksi::where('nmr_perkiraan', '>=', '7101')->where('nmr_perkiraan', '<=', '7105')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                     $badmumutasi = Transaksi::where('nmr_perkiraan', '>=', '7201')->where('nmr_perkiraan', '<=', '7227')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,$bulans)->where('tipe', 'debet')->sum('nominal');
                
                
                     array_push($row, $pegawaibulanan);
                     array_push($row, $badmubulanan);

                     array_push($row, $pegawaimutasi);
                     array_push($row, $badmumutasi);
                        $jmlpenB += $pegawaibulanan;
                        $jmlpenB += $badmubulanan;
                        $jmlpenM += $pegawaimutasi;
                        $jmlpenM += $badmumutasi;
                     
                  
                case 'Asrama':
        
                    // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                     $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '6101')->where('nmr_perkiraan', '<=', '6103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                     $dapurbulanan = Transaksi::where('nmr_perkiraan', '>=', '6201')->where('nmr_perkiraan', '<=', '6204')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                     $maintenbulanan = Transaksi::where('nmr_perkiraan', '>=', '6301')->where('nmr_perkiraan', '<=', '6312')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulans)->where('tipe', 'debet')->sum('nominal');
                     
                     $pegawaimutasi= Transaksi::where('nmr_perkiraan', '>=', '6101')->where('nmr_perkiraan', '<=', '6103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', "<=",$bulans)->where('tipe', 'debet')->sum('nominal');
                     $dapurmutasi = Transaksi::where('nmr_perkiraan', '>=', '6201')->where('nmr_perkiraan', '<=', '6204')->whereYear('tanggal', $tahun)->whereMonth('tanggal',"<=" ,$bulans)->where('tipe', 'debet')->sum('nominal');
                     $maintenmutasi = Transaksi::where('nmr_perkiraan', '>=', '6301')->where('nmr_perkiraan', '<=', '6312')->whereYear('tanggal', $tahun)->whereMonth('tanggal',"<=" ,$bulans)->where('tipe', 'debet')->sum('nominal');;
                     array_push($row, $pegawaibulanan);
                     array_push($row, $dapurbulanan);
                     array_push($row, $maintenbulanan);

                     array_push($row, $pegawaimutasi);
                     array_push($row, $dapurmutasi);
                     array_push($row, $maintenmutasi);
                     $jmlpenB += $pegawaibulanan;
                     $jmlpenB += $dapurbulanan;
                     $jmlpenB += $maintenbulanan;
                     $jmlpenM += $pegawaimutasi;
                     $jmlpenM += $dapurmutasi;
                     $jmlpenM += $maintenmutasi;
                     

            }   
            array_push($pengeluaran, $row);
        }
           
        }

       
        return view('laporan.suplus', [ "bulan" => $listbulan[$bulans-1], "pemasukan" => $pemasukan, 'jmlpemB' => $jmlpemB, 
        'jmlpemM' => $jmlpemM, 'pengeluaran' => $pengeluaran, 'jmlpenB' => $jmlpenB, 'jmlpenM' => $jmlpenM, 'penyusutan1' => $penyusutancurrent,'penyusutan2' => $penyusutan, 'pll' => $pll, 'bll' => $bll, 'bln' => $bulans]);

    }

    public function filter(Request $req){
        $tahun =  Carbon::now()->format('Y');
        $listbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "
        Oktober","November", "Desember");
        

        $bulan = $listbulan[$req->input("bulan") - 1];
        $listpemasukan = ['donatur','smk','penerimaan lain-lain','dana bos'];
        $listpengeluaran = ['SMK Bagimu Negeriku','Asrama','Yayasan'];
        $jmlpemB = 0;
        $jmlpemM = 0;
        $jmlpenB = 0;
        $jmlpenM = 0;
        $pemasukan = [];
        $pengeluaran = [];
        $penyusutancurrent = Transaksi::where('nmr_perkiraan', '>=' ,'8001')->where('nmr_perkiraan','<=', '8008')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $req->input("bulan"))->get()->sum('nominal');
        $penyusutan = Transaksi::where('nmr_perkiraan', '>=' ,'8001')->where('nmr_perkiraan','<=', '8008')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $req->input("bulan"))->get()->sum('nominal');
        $pll = [];
        $bll = [];
        $pll['a'] = Transaksi::where('nmr_perkiraan', '=' ,'9102')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '=', $req->input("bulan"))->get()->sum('nominal');
        $pll['b'] = Transaksi::where('nmr_perkiraan', '=' ,'9102')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $req->input("bulan"))->get()->sum('nominal');
        $bll['a'] = Transaksi::where('nmr_perkiraan', '=' ,'9103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '=', $req->input("bulan"))->get()->sum('nominal');
        $bll['b'] = Transaksi::where('nmr_perkiraan', '=' ,'9103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', $req->input("bulan"))->get()->sum('nominal');
        //dd($penyusutan);


        for($i = 0;$i < count($listpemasukan);$i++){
            $row = [];
            switch ($listpemasukan[$i]) {
                case 'donatur':
                    $subrow = [];
                    $donaturbulanan = Transaksi::where('nmr_perkiraan', '>=', '4001')->where('nmr_perkiraan', '<=', '4004')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    $donaturmutasi = Transaksi::where('nmr_perkiraan', '>=', '4001')->where('nmr_perkiraan', '<=', '4004')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=',str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $donaturbulanan);
                    array_push($subrow, $donaturmutasi);
                    array_push($row, $subrow);
                    $jmlpemB += $donaturbulanan;
                    $jmlpemM += $donaturmutasi;
                    
                    break;
                case 'smk':
                    $subrow = [];
                    $uangpendaftaranb = Transaksi::where('nmr_perkiraan', '4101')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    $uangpendaftaranm = Transaksi::where('nmr_perkiraan', '4101')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $uangpendaftaranb);
                    array_push($subrow, $uangpendaftaranm);
                    array_push($row, $subrow);
                    $jmlpemB += $uangpendaftaranb;
                    $jmlpemM += $uangpendaftaranm;
                    break;
                case 'penerimaan lain-lain':
                    $subrow = [];
                    $penerimanb = Transaksi::where('nmr_perkiraan', '4300')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    $penerimaanm = Transaksi::where('nmr_perkiraan', '4300')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '>=', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $penerimanb);
                    array_push($subrow, $penerimaanm);
                    array_push($row, $subrow);
                    $jmlpemB += $penerimanb;
                    $jmlpemM += $penerimaanm;
                    break;
                case 'dana bos':
                    $subrow = [];
                    $danabosb = Transaksi::where('nmr_perkiraan', '4200')->whereYear('tanggal', $tahun)->whereMonth('tanggal',  str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    $danabosm = Transaksi::where('nmr_perkiraan', '4200')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=',str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'kredit')->sum('nominal');
                    array_push($subrow, $danabosb);
                    array_push($subrow, $danabosm);
                    array_push($row, $subrow);
                    $jmlpemB += $danabosb;
                    $jmlpemM += $danabosm;
                    break;
            }   
            array_push($pemasukan, $row);
        }

        for($j = 0; $j < count($listpengeluaran); $j++){
            $row = [];
            switch ($listpengeluaran[$j]) {
                case 'SMK Bagimu Negeriku':
                       // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                        $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '5101')->where('nmr_perkiraan', '<=', '5104')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $pemeliharaanbulanan = Transaksi::where('nmr_perkiraan', '>=', '5201')->where('nmr_perkiraan', '<=', '5214')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $badmubulanan = Transaksi::where('nmr_perkiraan', '>=', '5301')->where('nmr_perkiraan', '<=', '5320')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $bpbbulanan = Transaksi::where('nmr_perkiraan', '>=', '5401')->where('nmr_perkiraan', '<=', '5434')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        
                        $pegawaimutasi = Transaksi::where('nmr_perkiraan', '>=', '5101')->where('nmr_perkiraan', '<=', '5104')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $pemeliharaanmutasi = Transaksi::where('nmr_perkiraan', '>=', '5201')->where('nmr_perkiraan', '<=', '5214')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $badmumutasi = Transaksi::where('nmr_perkiraan', '>=', '5301')->where('nmr_perkiraan', '<=', '5320')->whereYear('tanggal', $tahun)->whereMonth('tanggal','<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        $bpbmutasi = Transaksi::where('nmr_perkiraan', '>=', '5401')->where('nmr_perkiraan', '<=', '5434')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                        array_push($row, $pegawaibulanan);
                        array_push($row, $pemeliharaanbulanan);
                        array_push($row, $badmubulanan);
                        array_push($row, $bpbbulanan);

                        array_push($row, $pegawaimutasi);
                        array_push($row, $pemeliharaanmutasi);
                        array_push($row, $badmumutasi);
                        array_push($row, $bpbmutasi);
                        
                   
                    
                case 'Yayasan':
                    // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                     $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '7101')->where('nmr_perkiraan', '<=', '7105')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $badmubulanan = Transaksi::where('nmr_perkiraan', '>=', '7201')->where('nmr_perkiraan', '<=', '7227')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
            
        
                     
                     $pegawaimutasi = Transaksi::where('nmr_perkiraan', '>=', '7101')->where('nmr_perkiraan', '<=', '7105')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $badmumutasi = Transaksi::where('nmr_perkiraan', '>=', '7201')->where('nmr_perkiraan', '<=', '7227')->whereYear('tanggal', $tahun)->whereMonth('tanggal', '<=' ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                
                
                     array_push($row, $pegawaibulanan);
                     array_push($row, $badmubulanan);

                     array_push($row, $pegawaimutasi);
                     array_push($row, $badmumutasi);
                     
                  
                case 'Asrama':
        
                    // $listsmk = ['5101', '5102', '5101', '5102', '5103', '5104', '5201', '5203', '5204', '5205', '5206', '5207', '5208', '5209', '5210', '5211', '5212', '5213', '5214', '5201', '5302', '5304', '5305', '5306', '5307', '5308', '5309', '5310', '5311', '5312', '5313', '5314', '5315', '5316', '5317', '5318', '5319', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407', '5408', '5409', '5410', '', '5320', '5401', '5402', '5403', '5404', '5405', '5406', '5407' ]
                     $pegawaibulanan = Transaksi::where('nmr_perkiraan', '>=', '6101')->where('nmr_perkiraan', '<=', '6103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $dapurbulanan = Transaksi::where('nmr_perkiraan', '>=', '6201')->where('nmr_perkiraan', '<=', '6204')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $maintenbulanan = Transaksi::where('nmr_perkiraan', '>=', '6301')->where('nmr_perkiraan', '<=', '6312')->whereYear('tanggal', $tahun)->whereMonth('tanggal', str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     
                     $pegawaimutasi= Transaksi::where('nmr_perkiraan', '>=', '6101')->where('nmr_perkiraan', '<=', '6103')->whereYear('tanggal', $tahun)->whereMonth('tanggal', "<=",str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $dapurmutasi = Transaksi::where('nmr_perkiraan', '>=', '6201')->where('nmr_perkiraan', '<=', '6204')->whereYear('tanggal', $tahun)->whereMonth('tanggal',"<=" ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');
                     $maintenmutasi = Transaksi::where('nmr_perkiraan', '>=', '6301')->where('nmr_perkiraan', '<=', '6312')->whereYear('tanggal', $tahun)->whereMonth('tanggal',"<=" ,str_pad((string)$req->input('bulan'), 2, "0", STR_PAD_LEFT))->where('tipe', 'debet')->sum('nominal');;
                     array_push($row, $pegawaibulanan);
                     array_push($row, $dapurbulanan);
                     array_push($row, $maintenbulanan);

                     array_push($row, $pegawaimutasi);
                     array_push($row, $dapurmutasi);
                     array_push($row, $maintenmutasi);
 
                     
            }   
            array_push($pengeluaran, $row);
        }

        
        
       
        return view('laporan.suplus', [ "bulan" => $bulan, "pemasukan" => $pemasukan, 'jmlpemB' => $jmlpemB, 
        'jmlpemM' => $jmlpemM, 'pengeluaran' => $pengeluaran, 'jmlpenB' => $jmlpenB, 'jmlpenM' => $jmlpenM, 'penyusutan1' => $penyusutancurrent,'penyusutan2' => $penyusutan, 'pll' => $pll, 'bll' => $bll,'bln' => $req->input("bulan")]);

    }


    

}
