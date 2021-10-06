@extends('layout.keuangan')
@section('title', 'Admin Setting')
@section('icon', 'bi-person-circle')
@section('konten')
<style>
    th{
        
    }
    table{
        border: 2px solid black;
    }
</style>
<table class="table table-striped" style="width: 80%">
    <thead>
        <tr>
            <th scope="col" style="background-color: #1a1a1a; color: white">No</th>
            <th scope="col" style="background-color: #1a1a1a; color: white">Username</th>
            <th scope="col" style="background-color: #1a1a1a; color: white">Email</th>
            <th scope="col" style="background-color: #1a1a1a; color: white">Role</th>
            <th scope="col" style="background-color: #1a1a1a; color: white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($data as $datas)
        <form action="{{Route('update',$datas->id,'edit')}}" method="POST" onsubmit="return confirm('Apakah anda yakin?')">
            @csrf
            @method('patch')
            <tr>
                <td>{{$no}}</td>
                <td>{{$datas->name}}</td>
                <td>{{$datas->email}}</td>
                <td>
                    <select name="role" id="" @if($datas->id == Auth::user()->id) disabled @endif class='form-control'>
                        <option value='1' @if($datas->role_id == 1) selected @endif>Yayasan</option>
                        <option value='2' @if($datas->role_id == 2) selected @endif>SMK</option>
                        <option value='3' @if($datas->role_id == 3) selected @endif>Asrama</option>
                        <option value='4' @if($datas->role_id == 4) selected @endif>Pengguna</option>
                    </select>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button  class="btn btn-warning" name='aksi' value="edit" @if($datas->id == Auth::user()->id) disabled @endif>Edit</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-danger" style="margin-left:15px;" name='aksi' value='hapus' @if($datas->id == Auth::user()->id) disabled @endif>Hapus</button>
                    </div>
                </td>
            </tr>
        </form>
        @php $no++ @endphp
        @endforeach
    </tbody>
</table>
@endsection