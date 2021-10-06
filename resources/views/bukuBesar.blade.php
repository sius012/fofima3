@extends('layout.keuangan')
@section('title', 'Buku Besar')
@section('icon', 'bi bi-book')
@section('konten')
<form action='{{Route("filterbuku")}}' method="GET">
  <div class="form-group">
    <label for="exampleFormControlInput1">Pilih Bulan</label>
    <select class="form-control" id="exampleFormControlSelect1" name="bulan">
      <option value='01'>Januari</option>
      <option value='02'>Februari</option>
      <option value='03'>Maret</option>
      <option value='04'>April</option>
      <option value='05'>Mei</option>
      <option value='06'>Juni</option>
      <option value='07'>Juli</option>
      <option value='08'>Agustus</option>
      <option value='09'>September</option>
      <option value='10'>Oktober</option>
      <option value='11'>November</option>
      <option value='12'>Desember</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Pilih Kode</label>
    <select class="form-control" id="exampleFormControlSelect1" name='kodeper'>
      @foreach($kode as $kodes)
        <option value="{{$kodes['nmr_perkiraan']}}">{{$kodes['nmr_perkiraan']}} {{$kodes['keterangan_nomor']}}</option>
      @endforeach
        <option value="semua">Semua</option>
    </select>
  </div>
  <div class="form-group">
    <button >Cari</button>
  </div>
  
</form>
@foreach($bb as $bbs)

    <h5>Buku Besar:</h5> 
    <h5>Kas: Rp. {{number_format($bbs['saldo'])}}</h5> 
    <h5>Perkiran: {{$bbs['nmr_perkiraan']}}</h5>
    <table  class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>TGL</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
            </tr>
        </thead>
        @php
            $saldo = $bbs['saldo'];
            $totaldebet = 0;
            $totalkredit = 0;

        @endphp
        <tbody>
            <tr>
                <td>September</td>
                <td>Saldo Awal</td>
                <td></td>
                <td></td>
                <td>Rp. {{number_format($saldo)}}</td>
            </tr>
            @if($bbs['jmltrans'] > 0)
            @for($i = 0;$i < $bbs['jmltrans'];$i++)
            
            <tr>
                <td>{{$bbs['transaksi'.$i]['tanggal']}}</td>
                <td>{{$bbs['transaksi'.$i]['keterangan_transaksi']}}</td>
                <td>@if($bbs['transaksi'.$i]['tipe'] == 'debet')Rp. {{number_format($bbs['transaksi'.$i]['nominal'])}}@endif</td>
                <td>@if($bbs['transaksi'.$i]['tipe'] == 'kredit')Rp. {{number_format($bbs['transaksi'.$i]['nominal'])}}@endif</td>
                @php if($bbs['transaksi'.$i]['tipe'] == 'kredit'){ 
                    $saldo -= $bbs['transaksi'.$i]['nominal'];
                    $totalkredit += $bbs['transaksi'.$i]['nominal'];
                }else{
                    $saldo += $bbs['transaksi'.$i]['nominal'];
                    $totaldebet += $bbs['transaksi'.$i]['nominal'];
                }@endphp
                <td>Rp. {{number_format($saldo)}}</td>
            </tr>
            
            
            
            @endfor
            @else
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td></td>
                <td>-</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            @endif
            <tr>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                    <th>Rp. {{number_format($totaldebet)}}</th>
                    <th>Rp. {{number_format($totalkredit)}}</th>
                    <th>Rp. {{number_format($saldo)}}</th>
                </tr>
            </tr>
        </tbody>
    </table>
@endforeach
@endsection