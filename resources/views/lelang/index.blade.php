@extends('master')

@section('judul')
<h1>Halaman lelang</h1>
@endsection

@section('content')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
    @if (auth()->user()->level == 'petugas')
    <a class="btn btn-primary mb-3"href="/petugas/lelang/create">Tambah lelang</a>
    @endif
    @if (auth()->user()->level == 'admin')
    <a class="btn btn-primary mb-3"href="/admin/lelang/create">Tambah lelang</a>
    @endif
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
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
                    <th></th>
                    
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
            @if (auth()->user()->level == 'petugas')
            <td>
            <form action="{{ route('barang.destroy', [$item->id]) }}"method="POST">
            {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
            <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}
            <a class="btn btn-primary btn-sm" href="{{ route('barang.show', $item->barangs_id)}}">
              <i class="fas fa-folder">
              </i>
              View
          </a>
          <a class="btn btn-info btn-sm" href="{{ route('barang.edit', $item->barangs_id)}}">
              <i class="fas fa-pencil-alt">
              </i>
              Edit
          </a>
            @csrf
            @method('DELETE')   
            <button class="btn btn-danger btn-sm" type="submit"value="Delete">
              <i class="fas fa-trash">
              </i>
              Delete
            </button>
          </form>
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
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
@endsection