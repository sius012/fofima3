
@section('title', ' Neraca Lajur')
@section('icon', 'bi-file-earmark-bar-graph')
@extends('layout.keuangan')
@section('konten')
    <h3>Yayasan SMK Bagimu Negeriku</h3><br>
     <h4>Tahun 2021</h4>
     <form action="/neracaLajur/cari" method="POST" style="font-size:24px;">
     @csrf
     <table>
         <tr>
             <td>Kode Perkiraan</td>
             <td style="width:25px;"></td>
             <td>Bulan</td>
         </tr>
         <tr>
             <td> 
                 <select name="nomor" id="" class='form-control form-control-lg' style="width: 20rem">
                @foreach($perkiraan as $p)
                    <option value="{{$p['nmr_perkiraan']}}">{{$p['nmr_perkiraan']}} {{$p['keterangan_nomor']}}</option>
                @endforeach
             </select>
            </td>
            <td style="width:25px;"></td>
            <td>
                <select name="bulaninput" id="" class='form-control form-control-lg' style="width: 10rem">
                    @foreach($bulanString as $b)
                        <option value="{{$b}}">{{$b}}</option>
                    @endforeach
                </select>
            </td>
            <td style="width:25px;"></td>
            <td><button class='btn btn-primary btn-lg' style="padding-left: 30px; padding-right:30px;">Cari</button></td>
         </tr>
     </table>
     </form>
     <hr>
    
    <br><br>
  
    <table  class='table table-bordered'>
    <thead>
    <tr>
        <th rowspan='3' style="vertical-align:center">Keterangan</th>
        <th rowspan=3>Nomor Perkiraan</th>
        <th rowspan=3>Saldo</th>
        <th colspan=3>Januari</th>
        <th colspan=3>Februari</th>
        <th colspan=3>Maret</th>
        <th colspan=3>April</th>
        <th colspan=3>Mei   </th>
        <th colspan=3>Juni</th>
        <th colspan=3>Juli</th>
        <th colspan=3>Agustus</th>
        <th colspan=3>September</th>
        <th colspan=3>Oktober</th>
        <th colspan=3>November</th>
        <th colspan=3>Desember</th>
        <th colspan=3>Total</th>
        <th colspan=3 style="background-color: green">Mutasi/31 Desember 2021</th>
    </tr>
    <tr>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo Awal</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($neraca as $neracas)
    @php 
        $saldo = $neracas['saldoawal'];

    @endphp
    <tr>   
        <th align=left>{{$neracas['keterangan_nomor']}}</th>
        <th> {{$neracas['nmr_perkiraan']}}</th>
        <th>Rp. {{number_format($neracas['saldoawal'])}}</th>
        @foreach($bulanString as $bulans)
        <th>Rp. {{number_format($saldo)}}</th>
        <th data-toggle="info" data-placement="bottom" title="Debet {{$neracas['keterangan_nomor']}} pada bulan {{$bulans}}">@if($neracas[$bulans. ' Debet'] > 0)Rp. {{number_format($neracas[$bulans. ' Debet'])}}@endif</th>
        <th data-toggle="info" data-placement="bottom" title="Kredit {{$neracas['keterangan_nomor']}} pada bulan {{$bulans}}">@if($neracas[$bulans. ' Kredit'] > 0)Rp. {{number_format($neracas[$bulans. ' Kredit'])}}@endif</th>
        @php 
            $saldo += $neracas[$bulans. ' Debet']-$neracas[$bulans. ' Kredit'];
        @endphp
        @endforeach
        <th></th>
        <th>Rp. {{number_format($neracas['totalDebet'])}}</th>
        <th>Rp. {{number_format($neracas['totalKredit'])}}</th>
        <th data-toggle="debet" data-placement="bottom" title="Saldo akhir {{$neracas['keterangan_nomor']}} pada bulan Desember">Rp. {{number_format($neracas['saldoakhir'])}}</th>
    </tr>
    @endforeach
    <tr>   
        <th colspan="2"> Total</th>
        <th> </th>
        @for($i = 0;$i < count($bulanString);$i++)
        <th>0</th>
        <th data-toggle="info" data-placement="bottom" >Rp. {{number_format($totalDebet[$i])}}</th>
        <th data-toggle="info" data-placement="bottom" >Rp. {{number_format($totalKredit[$i])}}</th>
        @php 
           
        @endphp
        @endfor
        <th></th>
        <th></th>
        <th></th>
        <th data-toggle="debet" data-placement="bottom" title="Saldo akhir {{$neracas['keterangan_nomor']}} pada bulan Desember">Rp. {{number_format($neracas['saldoakhir'])}}</th>
    </tr>
    </tbody>
    
    
    
</table>

@endsection
