@extends('layout.keuangan')
@section('title', 'Saldo dan Penyusutan')
@section('konten')
<script>
  $(document).ready(function(){
      $("#exampleModal3").modal('show');

      
  });
</script>
<script>
  function confirm_act(){
    return confirm('Apakah anda yakin ingin menghapus?');
  }
</script>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{route('saldodanpenyusutan')}}">Saldo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('penyusutan')}}">Penyusutan</a>
  </li>
</ul>
<H3 class='mt-5'>Penyusutan</H3>
<button type="button" class="btn btn-primary float-right mb-5 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Tambah Penyusutan
</button>
<form action="{{route('saldomanage')}}" method="POST">
@php $jml = 0 @endphp
@csrf
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nomor Perkiraan</th>
            <th>Penyusutan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
          $no = 1;
        @endphp
        @foreach($penyusutan as $p)
          <tr>
            <td>{{$p->tanggal}}</td>
            <td>{{$p->nmr_perkiraan}}</td>
            <td>Rp. {{number_format($p->nominal)}}</td>
            <td>
               <a href="{{ route('penyu.edit',$p->id)}}" class="btn btn-warning btn-sm" >Edit</a>
               <a href="{{ route('penyu.destroy',$p->id)}}" class="btn btn-danger btn-sm" onclick="return confirm_act()">Delete</a>
            </td>
          </tr>
          @php
           $no += 1;
          @endphp
        @endforeach
    </tbody>
</table>
<input type="hidden" name='jml' value="{{$jml}}">
</form>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penyusutan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/admin/penyusutan/tambah" method="POST" enctype='multipart/form-data'>
                          @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                <input type="hidden" class="form-control"  name='id_transaksi'  id='idt' value=''>
                                <input type="date" class="form-control" id="exampleInputPassword1" name='tanggal' required id='date' value="{{date('Y-m-d')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Kode Penyusutan</label>
                                <select name="kodeperk" id="" class="form-control">
                                    @foreach($perkiraan as $p)
                                        <option value="{{$p->nmr_perkiraan}}">{{$p->nmr_perkiraan}} {{$p->keterangan_nomor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputPassword1" class="form-label">Nominal Penyusutan</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" required name='nominal' value=''>
                            </div>
                            
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>  

@isset($penyuedit)
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penyusutan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('penyu.update')}}" method="POST" enctype='multipart/form-data'>
                          @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                <input type="hidden" class="form-control"  name='id_transaksi'  id='idt' value='{{$penyuedit->id}}'>
                                <input type="date" class="form-control" id="exampleInputPassword1" name='tanggal' required id='date' value="{{$penyuedit->tanggal}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Kode Penyusutan</label>
                                <select name="kodeperk" id="" class="form-control">
                                    @foreach($perkiraan as $p)
                                        <option value="{{$p->nmr_perkiraan}}" @if($p->nmr_perkiraan == $penyuedit->nmr_perkiraan) selected @endif>{{$p->nmr_perkiraan}} {{$p->keterangan_nomor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputPassword1" class="form-label">Nominal Penyusutan</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" required name='nominal' value='{{$penyuedit->nominal}}'>
                            </div>
                            
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div> 
@endisset

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection