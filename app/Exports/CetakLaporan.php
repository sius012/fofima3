<?php

namespace App\Exports;
    
use App\User; //App\User adalah model User
use Illuminate\Contracts\View\View; //Harus diimport untuk men-convert blade menjadi file excel
use Maatwebsite\Excel\Concerns\FromView; //Harus diimport untuk men-convert blade menjadi file excel
use Carbon\Carbon;

class CetakLaporan implements FromView
{
    public function view(): View
    {
        $bulan = 'bulan';
        //export adalah file export.blade.php yang ada di folder views
        return view('laporan.suplusCetakable', compact('bulan'));
    }
}
