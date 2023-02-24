<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN LELANG</title>
</head>
<body>
    <div class="form-group">
        <p align="center">LAPORAN LELANG</p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <tr>
            <th>No</th>
            <th>Nama barang</th>
            <th>Harga awal</th>
            <th>Harga Akhir</th>
            <th>Pemenang</th>
            <th>Status</th>
        </tr>
        @foreach ($cetaklelangs as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>@currency($item->barang->harga_awal)</td>
            <td>@currency($item->harga_akhir)</td>
            <td>{{ $item->pemenang }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>