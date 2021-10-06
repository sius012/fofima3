<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transakasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
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
    <table class="table table-dark table-hover">
        <tr>
            <th>Kode Perkiraan</th>
            <th>Nominal</th>
            <th>Keterangan Transaksi</th>
            <th>Type</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>1342</td>
            <td>1.000.000</td>
            <td>Beli sayur</td>
            <td>Kredit</td>
            <td>14/09/2021</td>
            <td><a href="edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <tr>
            <td>1500</td>
            <td>20.000.000</td>
            <td>makan 1 minggu</td>
            <td>Debit</td>
            <td>17/09/2021</td>
            <td><a href="edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2356</td>
            <td>1.000.000</td>
            <td>Beli sayur</td>
            <td>Kredit</td>
            <td>22/09/2021</td>
            <td><a href="edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    </table>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Kode Perkiraan</label>
                                <input type="code" class="form-control" id="exampleInputEmail1" aria-describedby="Kode Perkiraan">
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Nominal</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">keterangan Transakasi</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSele">Type</label>
                                <select class="form-control" id="exampleFormControlSele">
                                    <option value="K">Kredit</option>
                                    <option value="D">Debit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>