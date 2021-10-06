<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CetakLaporan;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CetakController extends Controller
{
    function export(){
        return Excel::download(new CetakLaporan, 'Laporan Suplus Defisit Bulanan.xlsx');
    }

    function exportpdf(){
        $pdf = PDF::loadView('laporan.suplusCetakablePDF');
        return $pdf->download('Laporan Suplus Defisit Bulanan.pdf');
    }
}
