@extends('layout.keuangan')
@section('title', 'Transaksi')
@section('icon', 'bi bi-credit-card')
@section('konten')
@php
        $bln = 'semua';
        $perk = 'semua';
        
        if(isset($bulanselect)){
            $bln = $bulanselect;
            $perk = $kodeper;
        }


    @endphp
    
        <script>
          
            $(document).ready(function(){
                var editnominal = parseInt($("#nominaledit").val().replace(/\D/g,''),10);
            $("#nominaledit").val(editnominal.toLocaleString());
          
            var nominal = '';
            var nominaledit = editnominal;
                var d = new Date();

                var date = $("#date").val();
                $("#exampleModal2").modal('show');
            

            $("#nominal").on('keyup', function(){
            nominal = $(this).val().replace(",", "");
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
            alert('tes');
            //do something else as per updated question
           
            });

            $("#nominaledit").on('keyup', function(){
            nominaledit = $(this).val().replace(",", "");
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
            //do something else as per updated question
           
            });

            $("form").submit(function(e){
                $("#nominal").val(nominal);
                $("#nominaledit").val(nominaledit);
                
              
            });

        });
        </script>
    @if(Auth::user()->roles[0]['name'] !== "pengguna")
    
    <div class="contaisr">
        <div class="row">
            <div class="col-6">
            <h1>TRANSAKSI</h1>
            </div>
            <div class="col-6">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Transaksi
</button>
</div>




<form action="/BukuBesar/cari" method='post' class="m-3">
        @csrf
        <div class="form-group col-xs-2">
            <label for="exampleInputEmail1">Bulan</label>
            <select name="bulan" id="" class="form-control" style="width: 10rem">
             @for($j = 0;$j < count($bulan); $j++)
                <option value="{{$bulan[$j]}}" 
                @if($bulan[$j] == $bln)
                 selected
                  @endif >{{$bulanString[$j]}}</option>
             @endfor 
             <option value="semua" @if($bln == 'semua')
                 selected
                  @endif > Semua </option>
             </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Kode Perkiraan</label>
            <select name="kodeper" id="" class='form-control' style="width: 20rem">
            @foreach($perkiraan as $p)
                <option value="{{$p->nmr_perkiraan}}" @if($p->nmr_perkiraan == $perk)
                 selected
                  @endif>{{$p->nmr_perkiraan}} {{$p->keterangan_nomor}}</option>
            @endforeach
                <option value="semua"
                @if($perk == "semua")
                 selected
                  @endif> Semua </option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <hr>

    
    <div class="fof-flex">
@php
    $totalDebet = 0;
    $totalKredit = 0;
    $jml = 1;
@endphp

@php

if(isset($stat)){ 
switch($stat){
    case "allMonthAllItems": @endphp
        @for($i = 0; $i < count($trans); $i++)
        @php
                    $totalDebetT = 0;
                    $totalKreditT = 0;
                @endphp
            <table border=1 class='table table-bordered' style:"background-color: yellow">
                <tr>
                    <th>Tanggal</th>
                    <th>Nomer Perkiraan</th>
                    <th>Keterangan</th>
                    <th>Tipe</th>
                    <th align=center>Nominal</th>
                    <th align=center>Aksi</th>
                </tr>
                @foreach($trans[$i] as $t)
                
                <tr>
                    <td>{{$t['tanggal']}}</td>
                    <td>{{$t['nmr_perkiraan']}}</td>
                    <td>{{$t['keterangan_transaksi']}}</td>
                    <td>{{$t['tipe']}}</td>
                    <td>{{$t->nominal}}</td>
                    @if($jml == 0)
                    <td>
                       <a href="{{ route('transaksi.edit',$t->id)}}" class="btn btn-warning btn-sm">Edit</a>
                       <a href="{{ route('transaksi.destroy',$t->id)}}" class="btn btn-danger btn-sm">Delete</a>
                     </td>
                     @endif
                </tr>
                @php
                    if($t['tipe'] == 'debet'){
                        $totalDebetT += $t->nominal;
                    }else{
                        $totalKreditT += $t->nominal;
                    }
                    
                    
                @endphp
                @endforeach
                <tr>
                    <th colspan=4>Total Debet</th>
                    <th>{{$totalDebetT}}</th>
                </tr>
                <tr>
                    <th colspan=4>Total Kredit</th>
                    <th>{{$totalKreditT}}</th>
                </tr>
            </table>
        @endfor
       @php break;
    case "allMonth": @endphp
    @for($i = 0; $i < count($trans); $i++)
        @php
                    $totalDebetT = 0;
                    $totalKreditT = 0;
                    $transaksi = 1;
                @endphp
             <table border=1 class='table table-bordered' style:"background-color: yellow">
                 <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nomer Perkiraan</th>
                        <th>Keterangan</th>
                        <th>Tipe</th>
                        <th align='center'>Nominal</th>
                        <th align=center>Aksi</th>
                    </tr>
                </thead>
                @foreach($trans[$i] as $t)
                <tbody>
                <tr>
                    <td>{{$t['tanggal']}}</td>
                    <td>{{$t['nmr_perkiraan']}}</td>
                    <td>{{$t['keterangan_transaksi']}}</td>
                    <td>{{$t['tipe']}}</td>
                    <td>Rp. {{number_format($t->nominal)}}</td>
                    <td>
                          <a href="{{ route('transaksi.edit',$t->id)}}" class="btn btn-warning btn-sm">Edit</a>
                         <a href="{{ route('transaksi.edit',$t->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                
                @php
                    if($t['tipe'] == 'debet'){
                        $totalDebetT += $t->nominal;
                    }else{
                        $totalKreditT += $t->nominal;
                    }
                    
                    
                @endphp
                @endforeach
                <tr>
                    <th colspan=4>Total Debet</th>
                    <th>{{$totalDebetT}}</th>
                </tr>
                <tr>
                    <th colspan=4>Total Kredit</th>
                    <th>{{$totalKreditT}}</th>
                </tr>
                </tbody>
            </table>
        @endfor

        @php break;
    case "allItems": @endphp
        

        @php break;
    default:  @endphp

    <table border=1 class='table table-bordered' style:"background-color: yellow">
        <tr>
            <th>Tanggal</th>
            <th>Nomor Perkiraan</th>
            <th>Keterangan</th>
            <th>Tipe</th>
            <th align=center>Nominal</th>
            <th align=center>Aksi</th>
        </tr>
        @foreach($transaksi as $t)
        <tr>
            <td align=center>{{$t->tanggal}}</td>
            <td align=center>{{$t->nmr_perkiraan}}</td>
            <td align=center>{{$t->keterangan_transaksi}}</td>
            <td align=center>{{$t->tipe}}</td>
            <td align=center>Rp. {{number_format($t->nominal)}}</td>
            <td>
               <a href="{{ route('transaksi.edit',$t->id)}}" class="btn btn-warning btn-sm">Edit</a>
               <a href="{{ route('transaksi.edit',$t->id)}}" class="btn btn-danger btn-sm">Delete</a>
             </td>
        </tr>
        @php
            if($t->tipe == 'debet'){
                $totalDebet += $t->nominal;
            }else{
                $totalKredit += $t->nominal;
            }
            
            
        @endphp
        @endforeach
        <tr>
            <td align=center colspan=4>Total Debet</td>
            <td align=center>{{$totalDebet}}</td>
        </tr><tr>
            <td align=center colspan=4>Total Kredit</td>
            <td align=center>{{$totalKredit}}</td>
        </tr>
    </table>
        @php break; 
}
    



 }else{ @endphp 
    <div class='fof-debet'>
    <table border=1 class="table table-bordered ">
        <tr>
            <th>Tanggal</th>
            <th>Nomor Perkiraan</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th align=center>Aksi</th>
        </tr>
     
        @php

            $jml = 1;
        @endphp
        
        @foreach($transaksi as $t)
        <tr>
            <td align=center>{{$t->tanggal}}</td>
            <td align=center>{{$t->nmr_perkiraan}}</td>
            <td align=center>{{$t->keterangan_transaksi}}</td>
            <td align=center>@if($t->tipe == 'debet')Rp. {{number_format($t->nominal)}}  @endif </td>
            <td align=center>@if($t->tipe == 'kredit')Rp.  {{number_format($t->nominal)}} @endif </td>
            @if($jml == 1)
            <td rowspan=2 align='center' valign='center'>
                
                <a href="{{ route('transaksi.edit',$t->id_transaksi)}}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ url('/bukubesar/destroy?id='.$t->id_transaksi)}}" class="btn btn-danger btn-sm">Delete</a>
                @php $jml = 0 @endphp
             </td>
             @else
             @php $jml = 1 @endphp
            @endif
        </tr>
        @php
            if($t->tipe == 'debet'){
                $totalDebet += $t->nominal;
            }else{
                $totalKredit += $t->nominal;
            }
            
            
        @endphp
        @endforeach
        <tr>
            <th align=center colspan=5>Total Debet</th>
            <th align=center>Rp. {{number_format($totalDebet)}}</th>
        </tr><tr>
            <th align=center colspan=5>Total Kredit</th>
            <th align=center>Rp. {{number_format($totalKredit)}}</th>
        </tr>
    </table>
   

</div>    
@php } @endphp

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/bukubesar/transaksi" method="POST" enctype='multipart/form-data'>
                          @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name='tanggal' required id='date' value="{{date('Y-m-d')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Debet</label>
                                <select  id="" class="form-control" required name='perkiraan'>
                                   <optgroup label='Aktiva Lancar'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 1001 and $t->nmr_perkiraan <= 1003)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='BANK'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 1021 and $t->nmr_perkiraan <= 1024)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='PIUTANG'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 1051 and $t->nmr_perkiraan <= 1053)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Aset Tetap'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 1321 and $t->nmr_perkiraan <= 1328)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Akumulasi Penyusutan'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 1401 and $t->nmr_perkiraan <= 1720)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Hutang Jangka Pendek'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 2021 and $t->nmr_perkiraan <= 2080)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Hutang Jangka Panjang'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan == 2090)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Ekuitas'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 3001 and $t->nmr_perkiraan <= 3005)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='PEMASUKAN'>
                                   <optgroup label='Donatur'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 4001 and $t->nmr_perkiraan <= 4004)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='SMK Bagimu Negeriku'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 4101 and $t->nmr_perkiraan <= 4300)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   </optgroup>
                                   <optgroup label="PENGELUARAN(BIAYA-BIAYA)">
                                    <optgroup label="SMK BAGIMU NEGERIKU">
                                   <optgroup label='Biaya Pegawai/Belanja Tdk Langsung'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 5101 and $t->nmr_perkiraan <= 5104)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Biaya Pemeliharaan'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 5201 and $t->nmr_perkiraan <= 5214)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Biaya ADM/UMUM'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 5301 and $t->nmr_perkiraan <= 5320)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Biaya Pengadaan Bahan DLL'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 5401 and $t->nmr_perkiraan <= 5434)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   </optgroup>
                                   <optgroup label="ASRAMA">
                                   <optgroup label='Biaya Pegawai'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 6101 and $t->nmr_perkiraan <= 6103)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Kebutuhan Dapur'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 6201 and $t->nmr_perkiraan <= 6204)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Kebutuhan dan Maintenance RT. dll'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 6301 and $t->nmr_perkiraan <= 6312)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   </optgroup>
                                   <optgroup label='YAYASAN'>
                                   <optgroup label='Umum'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 7101 and $t->nmr_perkiraan <= 7105)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='Biaya ADM. & Umum'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 7201 and $t->nmr_perkiraan <= 7227)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
 
                                   <optgroup label='Biaya Aktiva'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 7201 and $t->nmr_perkiraan <= 7227)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   </optgroup>
                                   <optgroup label='PEMASUKAN LAIN_LAIN'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 9001 and $t->nmr_perkiraan <= 9002)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                   <optgroup label='BIAYA LAIN_LAIN'>
                                        @foreach($perkiraan as $t)
                                            @if($t->nmr_perkiraan >= 9101 and $t->nmr_perkiraan <= 9107)
                                                <option value='{{$t->nmr_perkiraan}}'>{{$t->nmr_perkiraan}} {{$t->keterangan_nomor}}</option>
                                            @endif
                                        @endforeach
                                   </optgroup>
                                    
                                </select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Kredit</label>
                                <select  id="" class="form-control" required name='kredit'>
                                <optgroup label="Aktiva Lancar">
                                    @foreach($kredit as $k)
                                        <option value="{{$k->nmr_perkiraan}}">{{$k->nmr_perkiraan}} {{$k->keterangan_nomor}}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Nominal</label>
                                <input type="text" class="form-control" required name='nominal' id='nominal'>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputPassword1" class="form-label">keterangan Transakasi</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" required name='keterangan'>
                            </div>
                            
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary" id='tambahbutton'>Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>    

<!-- Modal2 -->


@isset($transaksi2)
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/bukubesar/ubah" method="POST" enctype='multipart/form-data'>
                          @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                <input type="hidden" class="form-control"  name='id_transaksi'  id='idt' value='{{$transaksi2[0]->id_transaksi}}'>
                                <input type="date" class="form-control" id="exampleInputPassword1" name='tanggal' required id='date' value='{{$transaksi2[0]->tanggal}}'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Debet</label>
                                <select  id="" class="form-control" required name='perkiraan'>
                                    @foreach($perkiraan as $p)
                                        <option value="{{$p->nmr_perkiraan}}">{{$p->nmr_perkiraan}} {{$p->keterangan_nomor}}</option>
                                    @endforeach
                                </select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Kredit</label>
                                <select  id="" class="form-control" required name='kredit'>
                                    @foreach($kredit as $k)
                                        <option value="{{$k->nmr_perkiraan}}">{{$k->nmr_perkiraan}} {{$k->keterangan_nomor}}</option>
                                    @endforeach
                                </select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Nominal</label>
                                <input type="text" class="form-control" required name='nominal' value='{{$transaksi2[0]->nominal}}' id="nominaledit">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputPassword1" class="form-label">keterangan Transakasi</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" required name='keterangan' value='{{$transaksi2[0]->keterangan_transaksi}}'>
                            </div>
                            
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>  
@endisset
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @else
            <h1>Maaf, akun anda belum terkonfirmasi</h1>

    @endif
@endsection