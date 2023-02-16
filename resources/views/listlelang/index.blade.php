@extends('master')

@section('judul')
<h1>List Lelang</h1>
@endsection

@section('content')
<section class="content">
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
  <table class="table table-hover">
        <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama barang</th>
                    <th>Harga awal</th>
                    <th>Harga lelang</th>
                    <th>Tanggal lelang</th>
                    <th>Status</th>
                    @if (auth()->user()->level == 'masyarakat')
                    <th></th>
                    @elseif (auth()->user()->level == 'admin')
                    <th></th>
                    @endif
                </tr>
            </tbody>
        </thead>
        @forelse ($lelangs as $item)
        <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->barang->harga_awal }}</td>
            <td>{{ $item->harga_akhir }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
            <td>
              <span class="badge {{ $item->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
            </td>
            @if (auth()->user()->level == 'masyarakat')
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('barang.show', $item->barangs_id)}}">
                <i class="fas fa-folder"></i>
                View
              </a>
              <a class="btn btn-success btn-sm" href="{{ route('penawaran.index')}}">
                <i class="fas fa-gavel"></i>
                Tawar
              </a>
            </td>
            @elseif (auth()->user()->level == 'admin')
            <td>
            <a class="btn btn-primary btn-sm" href="{{ route('barang.show', $item->barangs_id)}}">
              <i class="fas fa-folder"></i>
              View
            </a>
          </td>
            @endif
        </tr>
        @empty
        <tr>
            <td>Data masih kosong</td>
        </tr>
        @endforelse
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
@endsection