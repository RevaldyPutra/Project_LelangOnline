<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN HISTORY LELANG</title>
</head>
<body>
    <div class="form-group">
        <p align="center">LAPORAN HISTORY LELANG</p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <tr>
            <th>No</th>
            <th>Nama Penawar</th>
            <th>Nama Barang</th>
            <th>Harga Penawaran</th>
            <th>Tanggal Penawaran</th>
            <th>Status</th>
        </tr>
        @foreach ($cetakhistorypending as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->lelang->barang->nama_barang }}</a></td>
            <td>@currency($item->harga)</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
        </table>
    </div>
</body>
</html>