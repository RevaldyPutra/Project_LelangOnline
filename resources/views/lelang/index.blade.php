@extends('master')

@section('judul')
<h1>Halaman lelang</h1>
@endsection

@section('content')
<section class="content">
  @if(session()->has('success'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('success')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @elseif(session()->has('editsuccess'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('editsuccess')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @elseif(session()->has('deletesuccess'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('deletesuccess')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @elseif(session()->has('deletefailed'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-danger" role="alert">
          {{session('deletefailed')}}
          <li class="fas fa-cross-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- Default box -->
  <div class="card">
    <div class="card-header p-2">
    </div>
    <div class="card-header">
      @if (auth()->user()->level == 'petugas')
      
      
      <!-- Modal Tambah Lelang -->
<div class="modal fade" id="modal-lelang" tabindex="-1" role="dialog" aria-labelledby="modal-lelang-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-lelang-label">Tambah Lelang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" method="POST" action="{{ route('lelang.store') }}" data-parsley-validate>
        @csrf
        <div class="modal-body">
          <div class="form-group mandatory">
            <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
            <select class="form-select form-control @error('barangs_id') is-invalid @enderror" id="barangs_id" name="barangs_id" data-parsley-required="true">
              <option value="" selected>Pilih Barang</option>
              @forelse ($barangs as $item)
                <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} -  @currency($item->harga_awal)</option>
              @empty
                <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
              @endforelse
            </select>
            @error('barangs_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mandatory">
            <label for="tanggal_lelang" class="form-label">{{ __('Tanggal Lelang') }}</label>
            <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" name="tanggal_lelang" data-parsley-required="true" value="{{ old('tanggal_lelang') }}">
            @error('tanggal_lelang')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Batal') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Tambah Lelang') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
      <div class="card">
        <div class="card-header">
          <a type="button"  class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lelang">
            Tambah Lelang
          </a>
          <a hidden class="btn btn-primary mb-3"href="/petugas/lelang/create">Tambah lelang</a>
          <a class="btn btn-info mb-3" target="_blank" href="{{route('cetak.lelang')}}">
            <li class="fas fa fa-print"></li>
            Cetak Data
          </a>
          @else
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
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
                <thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama barang</th>
                            <th>Harga awal</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang</th>
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
                @forelse ($lelangs as $item)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>@currency($item->barang->harga_awal)</td>
                    <td>@currency($item->harga_akhir)</td>
                    <td>{{ $item->pemenang }}</td>
                    <td>
                      <span class="badge {{ $item->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
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
                    {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
                    <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}
                    <a class="btn btn-primary btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                </td>
                @else
                @endif
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center" class="text-danger"><strong>Data masih kosong</strong></td>
                </tr>
                @endforelse
                </tbody>
            </table>
          </div>
      </div>
  <!-- /.card-body -->
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
@endsection