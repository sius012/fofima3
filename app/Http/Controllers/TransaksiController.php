<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Perkiraan;
use Carbon\Carbon;
use App\MainTransaksi;


class TransaksiController extends Controller
{
    public function __construct()
    {
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
    }
   public function index(){
       
         $kredit = Perkiraan::where('nmr_perkiraan','1001')->orWhere('nmr_perkiraan','1002')->orWhere('nmr_perkiraan','1003')->get();
        $perkiraan = Perkiraan::whereNotIn('nmr_perkiraan', ['1001','1002','1003'])->get();
        return view('transaksi', compact('kredit','perkiraan'));
   }

   public function prosestransaksi(Request $request){
        
        $this->validate($request, [
            
        ],
            $messages = [
                'required' => 'semua wajib diisi',
                'mimes' => 'masukan format gambar'
            ]
        );
       $iduser = auth()->user()->id;
       $tanggal = $request->input('tanggal');
       $nominal = $request->input('nominal');
       $perkiraan = $request->input('perkiraan');
       $kredit = $request->input('kredit');
       $keterangan = $request->input('keterangan');

       $idtransaksi =DB::table('transaksi')->insertGetId(['tanggal' => $tanggal, 'id_user' => $iduser,]);

      $upload = DB::table('buku_besar')->insert(['id_transaksi' => $idtransaksi,  'tanggal' => $tanggal, 'tipe' => 'debet', 'nmr_perkiraan' => $perkiraan, 'nominal' => $nominal, 'keterangan_transaksi' => $keterangan]);
      $upload2 = DB::table('buku_besar')->insert(['id_transaksi' => $idtransaksi, 'tanggal' => $tanggal, 'tipe' => 'kredit', 'nmr_perkiraan' => $kredit, 'nominal' => $nominal, 'keterangan_transaksi' => $keterangan]);
    
     return redirect('/trans');



   }
   public function tampilkan(){
         $transaksi = DB::table('buku_besar')->get();
     

        $perkiraan = DB::table('nomor_perkiraan')->get();
        return view('tabel',compact('transaksi','perkiraan'));
   }

   public function edit($id){
    $iduser = auth()->user()->id;
         $kredit = Perkiraan::where('nmr_perkiraan','1001')->orWhere('nmr_perkiraan','1002')->orWhere('nmr_perkiraan','1003')->get();
        $perkiraan = Perkiraan::get();
        $bulanini = Carbon::now()->isoFormat('MMMM');
        $bulanini2 = Carbon::now()->month;
        $bulan = array('1','2','3','4','5','6','7','8','9','10','11','12');
        $bulanString = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');


        $transaksi = Transaksi::whereMonth('tanggal', $bulanini2)->get();
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
        $edit = 'yes';
        $transaksi2 = Transaksi::where('id_transaksi', $id)->get();
        return view('transaksi', ['perkiraan' => $this->_perkiraan,'bulan' => $bulan,'bulanString' => $bulanString,'transaksi2' => $transaksi2,'transaksi' => $transaksi,'kredit' => $this->_kredit]);

   }

   public function ubah(Request $request){
       
   $tanggal = $request->input('tanggal');
   $nominal = $request->input('nominal');
   $perkiraan = $request->input('perkiraan');
   $kredit = $request->input('kredit');
   $keterangan = $request->input('keterangan');
   $id = $request->input('id_transaksi');


  
   $upload1 = DB::table('buku_besar')->where('tipe', 'debet')->where('id_transaksi', $id)->update(['tanggal' => $tanggal,'nmr_perkiraan' => $perkiraan,'nominal' => $nominal,'keterangan_transaksi' => $keterangan,]);
   $upload2 = DB::table('buku_besar')->where('tipe', 'kredit')->where('id_transaksi', $id)->update(['tanggal' => $tanggal,'nmr_perkiraan' => $kredit,'nominal' => $nominal,'keterangan_transaksi' => $keterangan,]);
   if($nominal){
       $transaksi = Transaksi::get();
       return redirect()->route('transaksi');
   }else{
       echo "gagal";
   }

   }

   public function hapus(Request $req){
       $id = $req->input('id');
       $idtransaksi = Transaksi::where('id_transaksi', $id)->first();
       $idt = $idtransaksi->id_transaksi;
    
       $delete = Transaksi::where('id_transaksi', $idt)->delete();
       return redirect()->route('transaksi');
   }

   public function show($id){
   // echo $id;
}
}
