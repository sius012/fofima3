<html>
    <head>
        <title>Edit</title>
        <style>
            body{
                background-image:url('20.jpg');
                background-size: cover;
                filter: blur(50%);
            }
            table{
                background:rgba(255,192,203,0.4);
                color:black;
                height: 300px;
                width: 250px;
                margin-left:50px;
                border-radius: 3%;
            }
        </style>
    </head>
    <body>
        <center>
        <h1>Edit Data</h1>
        <form>
            <table>
            <tr>
                <td>Kode Perkiraan  :</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Nominal :</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>keterangan Transaksi    :</td>
                <td><input type="text"></td>
        </tr>
        <tr>
        <td><label>Type :</label></td>
            <td><select>
                <option>Kredit</option>
                <option>Debit</option>
            </select>
            </td>
            </tr>
            <tr>
                <td>Tanggal :</td>
                <td><input type="date"></td>
            </tr>
            <tr>
                <td><input type="submit"name="submit" values="submit"></td>
            </tr>
            </table>
            </center>
        </form>
    </body>
    </html>
