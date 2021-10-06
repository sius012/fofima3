<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Tipe</th>
            <th>Nomor Perkiraan</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Nota</th>
        </tr>
        @foreach($transaksi as $t)
        <tr>
            <td>{{$t->tanggal}}</td>
            <td>{{$t->tipe}}</td>
            <td>{{$t->nmr_perkiraan}}</td>
            <td>{{$t->nominal}}</td>
            <td>{{$t->keterangan_transaksi}}</td>
            <td><img src="{{asset('nota/$t->nota')}}" alt="" width='100'></td>
        </tr>
        @endforeach
    </table>
</body>
</html>