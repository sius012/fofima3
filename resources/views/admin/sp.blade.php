@extends('layout.keuangan')
@section('title', 'Saldo dan Penyusutan')
@section('konten')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="saldodanpenyusutan">Saldo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('penyusutan')}}">Penyusutan</a>
  </li>
</ul>
<H3 class='mt-5'>Nomor Perkiraan : 1001-3005</H3>

<div class="alert alert-primary" role="alert">
  Penerapan Saldo hanya dapat dilakukan satu kali
</div>
<form action="{{route('saldomanage')}}" method="POST">
@php $jml = 0 @endphp
@csrf
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Perkiraan</th>
            <th>Keterangan</th>
            <th>Saldo Awal Tahun</th>
            <th>Saldo Sekarang</th>
        </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    @foreach($listsaldo as $l)
    <tr>
            <td>{{$no}}</td>
            <td>{{$l['nmr_perkiraan']}}</td>
            <td>{{$l['keterangan_nomor']}}</td>
            <td><input required class='form-control' type="text" @if($sudahadasaldo) disabled value="{{number_format($l['l_saldo'])}}" @endif name="{{'lastsaldo'.$no}}"  value="0"></td>
            <td><select name="{{'currentsaldo'.$no}}" class="form-control" readonly><option value="{{$l['c_saldo']}}" >Rp. {{number_format($l['c_saldo'])}}</option></select></td>
        </tr>
        @php
        $jml += 1;
        $no += 1;
        @endphp
    @endforeach
    <tbody>
        
    </tbody>
</table>
<input type="hidden" name='jml' value="{{$jml}}">
@if($sudahadasaldo)
<button type="submit" class="btn btn-success" name='aksi' disabled>Terapkan</button>
<button type="submit" class="btn btn-primary" name='aksi' value='perbarui'>Perbarui</button>
@else
<button type="submit" value="terapkan" name='aksi'>Terapkan</button>
@endif
</form>



@endsection