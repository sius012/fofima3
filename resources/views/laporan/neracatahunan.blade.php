@extends('layout.keuangan')
@section('title', 'Neraca Tahunan')
@section('icon', 'bi-journal-check' )
@section('konten')
<center>
  <style>
    button a{
      color: white;
    }
  </style>
    <h2>YAYASAN BAGIMU NEGRIKU SEMARANG</h2>
    
    <h1>LAPORAN POSISI KEUANGAN(Neraca)</h1>
    <h3>PER:31 DESEMBER </h3>
        <table border="1" width="1000px" class="table table-bordered">
            <thead>
              <tr>
                <th>AKTIVA</th>
                <th>TOTAL AKTIVA</th>
                <th>PASIVA</th>
                <th>TOTAL PASIVA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><h5>AKTIVA LANCAR</h5></td>
                <td></td>
                <td>KEWAJIBAN</td>
                <td></td>
              </tr>
              <tr>
                <td>- kas</td>
                <td></td>
                <td>Kewajiban Lancar</td>
                <td></td>
            </tr>
            <tr>
                <td>- Bank</td>
                <td></td>
                <td>- Hutang Umum</td>
                <td></td>
            </tr>
            <tr>
                <td>- Piutang</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
              <tr>
                <td><center><h4>Jumlah Aktiva Lancar</h4></center></td>
                <td></td>
                <td><center><h4>Jumlah Kewajiban :</h4></center></td>
                <td></td>
              </tr>
              <tr>
                <td><h6>AKTIVA TETAP</h6></td>
                <td></td>
                <td><h5>Ekuitas:</h5></td>
                <td></td>
              </tr>
              <tr>
                <td>- Peralatan & Inventaris</td>
                <td></td>
                <td>Modal Hibah</td>
                <td></td>
            </tr>
            <tr>
                <td>- Akumulasi Penyusutan Peralatan & Inventaris</td>
                <td></td>
                <td>Tambah Hibah</td>
                <td></td>
            </tr>
            <tr>
              <td><center>Nilai Buku Peralatan & Ivn</center></td>
              <td></td>
              <td>Surplus(defisit) tahun lalu</td>
              <td></td>
            </tr>
             </tr>
             </tr>
            <tr>
                <td>- Kendaraan</td>
                <td></td>
                <td>Surplus(defisit) tahun berjalan</td>
                <td></td>
            </tr>
            </tr>
            <tr>
                <td>- Akumulasi Penyusutan Kendaraan</td>
                <td></td>
                <td><center><h4>Jumlah EKUITAS</h4></center></td>
                <td></td>
            </tr>
             <tr>
                <td><center>Nilai Buku Bangunan</center></td>
                <td></td>
                <td></td>
                <td></td>
                    </tr>
                <tr>
                    <td><center><h5>Jumlah Aktiva Tetap</h5></center></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tr>
            <tr>
                <td><h4>AKTIVA LAIN-LAIN</h4></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tr>
            <tr>
                <td><center><h5>JUMLAH AKTIVA</h5></center></td>
                <td></td>
                <td><h5>JUMLAH KEWAJIBAN & EKUITAS</h5></td>
                <td></td>
            </tr>
            </tbody>
          </table>
          <button type="button" class="btn btn-success" ><a href="{{Route('cetak.bulanan')}}"><i class="bi bi-file-excel"></i> Unduh Excel</a></button>
        <button type="button" class="btn btn-danger" ><a href="{{Route('cetak.bulanan.pdf')}}"><i class="bi bi-file-pdf"></i> Unduh PDF</a></button>
</center>
@endsection