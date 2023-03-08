<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/bootstrap.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN HISTORY LELANG</title>
    <style type="text/css">
      @media print {
         .no-print {
            display: none;
         }
      }
      </style>
</head>
<div class="no-print">
  <a href="{{route('generatePdf')}}" class="btn btn-primary">Generate Pdf</a>
  <button class="btn btn-info" onclick="window.print()">Cetak</button>
</div>
<body>
    <div class="form-group">
        <p align="center">LAPORAN HISTORY LELANG</p>
        <div class="container">
            <table class="table table-striped table-bordered table-hover" align="center" style="width: 95%">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>Nama Penawar</th>
                  <th>Nama Barang</th>
                  <th>Harga Penawaran</th>
                  <th>Tanggal Penawaran</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cetakhistoryLelangs as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->user->name }}</td>
                  <td>{{ $item->lelang->barang->nama_barang }}</a></td>
                  <td>@currency($item->harga)</td>
                  <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                  <td>{{ $item->status }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
    </div>
</body>
</html>