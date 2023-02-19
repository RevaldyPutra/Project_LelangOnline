@extends('master')

@section('judul')
<h1>Halaman Data Penawaran Lelang</h1>
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
                    <th>Nama Penawar</th>
                    <th>Nama Barang</th>
                    <th>Harga Penawaran</th>
                    <th>Tanggal lelang</th>
                    <th>Status</th>
                    @if(auth()->user()->level == 'petugas')
                    <th></th>
                    @else
                    @endif
                    @if(auth()->user()->level == 'admin')
                    <th></th>
                    @else
                    @endif
                    
                </tr>
            </tbody>
        </thead>
        @forelse ($historyLelangs as $item)
        <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>@currency($item->harga)</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
            <td>
              <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
            </td>
            @if (auth()->user()->level == 'admin')
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('lelangadmin.show', $item->id)}}">
                <i class="fas fa-folder">
                </i>
                View
              </a>
            </td>
            @endif
            @if (auth()->user()->level == 'petugas')
            <td>
            <form action="{{ route('lelangin.destroy',$item) }}"method="POST">
            {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
            <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}

            <a class="btn btn-success btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
              <i class="fas fa-check">
              </i>
              Pilih Jadi Pemenang
          </a>
          </form>
        </td>
        @else
        @endif
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
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