@extends('layout.keuangan')
@section('title', 'Laporan Suplus Defisit Bulanan')
@section('icon', 'bi bi-graph-down mr-2')



    <style>
        button a{
            color: white;
        }
        button{
            margin-bottom: 1rem;
        }
    </style>
@section('konten')
@php
       
@endphp
    <form action="{{Route('bulananfilter')}}" method="POST">
        @csrf
        <div class="form-inline">
            <label for="exampleInputEmail1" class='mb-3'><b>Pilih Bulan</b></label>
            <select name="bulan" id="" class="form-control mb-3" style="width: 30%">
                <option value="1" @if($bln == 1) selected @endif>Januari</option>
                <option value="2" @if($bln == 2) selected @endif>Februari</option>
                <option value="3" @if($bln == 3) selected @endif>Maret</option>
                <option value="4" @if($bln == 4) selected @endif>April</option>
                <option value="5" @if($bln == 5) selected @endif>Mei</option>
                <option value="6" @if($bln == 6) selected @endif>Juni</option>
                <option value="7" @if($bln == 7) selected @endif>Juli</option>
                <option value="8" @if($bln == 8) selected @endif>Agustus</option>
                <option value="9" @if($bln == 9) selected @endif>September</option>
                <option value="10" @if($bln == 10) selected @endif>Oktober</option>
                <option value="11" @if($bln == 11) selected @endif>November</option>
                <option value="12" @if($bln == 12) selected @endif>Desember</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Laporan akan ditampilkan berdasarkan bulan yang dipilih.</small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cari</button>
    </form>
    <hr>
    <center>
        
        <h3>YAYASAN BAGIMU NEGERIKU SEMARANG</h3>
        <h6>Laporan Aktivitas Keuangan(Surplus/Defisit) <br> BULAN: {{$bulan}}</h6>

        <table class="table table-bordered table-striped table-hover" style="width: 80%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Bulan {{$bulan}} 2021</th>
                    <th scope="col">Bulan Jan sd {{$bulan}} 2021</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">I</th>
                    <td>PEMASUKAN</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>1. Donatur</td>
                    <td>Rp. {{number_format($pemasukan[0][0][0])}}</td>
                    <td>Rp. {{number_format($pemasukan[0][0][1])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>2. SMK Bagimu Negeriku :</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Uang Pendaftaran</td>
                    <td>Rp. {{number_format($pemasukan[1][0][0])}}</td>
                    <td>Rp. {{number_format($pemasukan[1][0][1])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>3. Penerimaan Lain-lain :</td>
                    <td>Rp. {{number_format($pemasukan[2][0][0])}}</td>
                    <td>Rp. {{number_format($pemasukan[2][0][1])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>4. Dana BOS</td>
                    <td>Rp. {{number_format($pemasukan[3][0][0])}}</td>
                    <td>Rp. {{number_format($pemasukan[3][0][1])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <th>
                        <center>TOTAL PEMASUKAN</center>
                    </th>
                    <th>Rp. {{number_format($jmlpemB)}}</th>
                    <th>Rp. {{number_format($jmlpemM)}}</th>
                </tr>
                <tr>
                    <th scope="row">II</th>
                    <td>PENGELUARAN</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>1. SMK Bagimu Negeriku</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya Pegawai</td>
                    <td>Rp. {{number_format($pengeluaran[0][0])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][4])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya Pemeliharaan</td>
                    <td>Rp. {{number_format($pengeluaran[0][1])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][5])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya adm & umum</td>
                    <td>Rp. {{number_format($pengeluaran[0][2])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][6])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya Pengadaan</td>
                    <td>Rp. {{number_format($pengeluaran[0][3])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][7])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Total Pengeluaran SMK</td>
                    <th>Rp. {{number_format($pengeluaran[0][3]+$pengeluaran[0][0]+$pengeluaran[0][1]+$pengeluaran[0][2])}}</th>
                    <th>Rp. {{number_format($pengeluaran[0][4]+$pengeluaran[0][5]+$pengeluaran[0][6]+$pengeluaran[0][7])}}</th>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>2. Asrama</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya Pegawai</td>
                    <td>Rp. {{number_format($pengeluaran[0][12])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][15])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Kebutuhan Dapur</td>
                    <td>Rp. {{number_format($pengeluaran[0][13])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][16])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Kebutuhan dan maintenance rumah tangga dll</td>
                    <td>Rp. {{number_format($pengeluaran[0][14])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][17])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Total Pengeluaran Asrama</td>
                    <th>Rp. {{number_format($pengeluaran[0][12]+$pengeluaran[0][13]+$pengeluaran[0][14])}}</th>
                    <th>Rp. {{number_format($pengeluaran[0][15]+$pengeluaran[0][16]+$pengeluaran[0][17])}}</th>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>3. Yayasan</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya Pegawai</td>
                    <td>Rp. {{number_format($pengeluaran[0][8])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][10])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>- Biaya adm & umum</td>
                    <td>Rp. {{number_format($pengeluaran[0][9])}}</td>
                    <td>Rp. {{number_format($pengeluaran[0][11])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Total Pengeluaran Yayasan</td>
                    <th>Rp. {{number_format($pengeluaran[0][8]+$pengeluaran[0][9])}}</th>
                    <th>Rp. {{number_format($pengeluaran[0][10]+$pengeluaran[0][11])}}</th>
                </tr>
                <tr>

                    <th scope="row"></th>
                    <th>
                        <center>Total Pengeluaran</center>
                    </th>
                    <th>Rp. {{number_format($jmlpenB)}}</th>
                    <th>Rp. {{number_format($jmlpenM)}}</th>
                </tr>
                <tr>
                    <th scope="row">III</th>
                    <td>Surplus(Defisit) sebelum Penyusutan</td>
                    <th>Rp. {{number_format($jmlpemB-$jmlpenB)}}</th>
                    <th>Rp. {{number_format($jmlpemM-$jmlpenM)}}</th>
                </tr>
                <tr>
                    <th scope="row">IV</th>
                    <td>Penyusutan</td>
                    <td>Rp. {{number_format($penyusutan1)}}</td>
                    <td>Rp. {{number_format($penyusutan2)}}</td>
                </tr>
                <tr>
                    <th scope="row">V</th>
                    <td>Surplus(Defisit) sesudah penyusutan</td>
                    <td>Rp. {{number_format($jmlpemB-$jmlpenB-$penyusutan1)}}</td>
                    <td>Rp. {{number_format($jmlpemM-$jmlpenM-$penyusutan2)}}</td>
                </tr>
                <tr>
                    <th scope="row">VI</th>
                    <td>Pendapatan dan Beban Lain-lain</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Pendapatan lain-lain(Bunga Bank)</td>
                    <td>Rp. {{number_format($pll['a'])}}</td>
                    <td>Rp. {{number_format($pll['b'])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Beban lain-lain(Biaya Bank)</td>
                    <td>Rp. {{number_format($bll['a'])}}</td>
                    <td>Rp. {{number_format($bll['b'])}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Surplus(Defisit) Lain-lain</td>
                    <td>Rp. {{number_format($bll['a']+$pll['a'])}}</td>
                    <td>Rp. {{number_format($bll['b']+$pll['b'])}}</td>
                </tr>
                <tr>
                    <th scope="row">VII</th>
                    <td>Surplus(Defisit) Aktivitas Keuangan</td>
                    <td>Rp. {{number_format($jmlpemB-$jmlpenB-$penyusutan1+$bll['a']+$pll['a'])}}</td>
                    <td>Rp. {{number_format($jmlpemM-$jmlpenM-$penyusutan2+$bll['b']+$pll['b'])}}</td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" ><a href="{{Route('cetak.bulanan')}}"><i class="bi bi-file-excel"></i> Unduh Excel</a></button>
        <button type="button" class="btn btn-danger" ><a href="{{Route('cetak.bulanan.pdf')}}"><i class="bi bi-file-pdf"></i> Unduh PDF</a></button>
    </center>
    @endsection