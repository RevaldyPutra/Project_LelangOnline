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
    <title>LAPORAN LELANG</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">LAPORAN LELANG</h2>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Harga awal</th>
              <th>Harga Akhir</th>
              <th>Pemenang</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cetaklelangsDibuka as $item)
            @if($item->status == 'dibuka')
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->barang->nama_barang }}</td>
              <td>@currency($item->barang->harga_awal)</td>
              <td>@currency($item->harga_akhir)</td>
              <td>{{ $item->pemenang }}</td>
              <td class="text-success"><strong>{{ $item->status }}</strong></td>
            </tr>
            @else
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->barang->nama_barang }}</td>
              <td>@currency($item->barang->harga_awal)</td>
              <td>@currency($item->harga_akhir)</td>
              <td>{{ $item->pemenang }}</td>
              <td class="text-danger"><strong>{{ $item->status }}</strong></td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>