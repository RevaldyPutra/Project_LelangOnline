@extends('master')

@section('judul')
<h1>Data Barang</h1>
@endsection

@section('content')
<style>
  .card {
     background-image: url("{{asset('')}}");
     height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
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

  @endif
<!-- Default box -->
<div class="card">
  <div class="card-header">
    @if (auth()->user()->level == 'admin')
      <a class="btn btn-info"href="{{ route('barang.create') }}">
        <i class="fas fa-upload"></i>
        Export Barang
      </a>
        @elseif (auth()->user()->level == 'petugas')
          <a class="btn btn-primary"href="{{ route('barang.create') }}">
            <i class="fas fa-upload"></i>
            Tambah Barang
          </a>
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
                    {{-- <th>Foto</th> --}}
                    <th>Tanggal</th>
                    <th>Harga awal</th>
                    <th></th>
                </tr>
            </tbody>
        </thead>
        @foreach ($barangs as $value)
        <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->nama_barang }}</td>
            {{-- <td>
              @if($value->image)
                <img src="{{ asset('storage/' . $value->image)}}" alt="{{ $value->nama_barang }}" class="img-fluid mt-3" width="75">
              @endif
            </td> --}}
            <td>{{ \Carbon\Carbon::parse($value->tanggal)->format('j-F-Y') }}</td>
            <td> @currency($value->harga_awal)</td>
            <td>
            <form action="{{ route('barang.destroy', [$value->id]) }}"method="POST">
            {{-- <a class="btn btn-primary"href="{{ route('barang.show', $value->id)}}">
              <i class="fas fa-eye"></i>
             Detail
            </a>
            <a class="btn btn-warning"href="{{ route('barang.edit', $value->id)}}">
              <i class="fas fa-pen"></i>
             Edit
            </a> --}}
            @if(Auth::user()->level == 'petugas')
            <a class="btn btn-primary btn-sm" href="{{ route('barang.show', $value->id)}}">
              <i class="fas fa-folder"></i>
              View
          </a>
          <a class="btn btn-info btn-sm" href="{{ route('barang.edit', $value->id)}}">
            <i class="fas fa-pencil-alt"></i>
            Edit
          </a>
          @elseif(Auth::user()->level == 'admin')
          <a class="btn btn-primary btn-sm" href="{{ route('barangmin.show', $value->id)}}">
            <i class="fas fa-folder"></i>
            View
          </a>
          <a class="btn btn-info btn-sm" href="{{ route('barangmin.edit', $value->id)}}">
            <i class="fas fa-pencil-alt"></i>
            Edit
          </a>
          @endif
          @csrf
            @method('DELETE')   
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
              <i class="fas fa-trash"></i>
              Hapus
          </button>
          <!-- Modal Konfirmasi Hapus Data -->
            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <input type="hidden" name="id_barang" value="<%= data_barang.id %>">
                      <button type="submit" class="btn btn-danger">Hapus</button>
                  </div>
                </div>
              </div>
            </div>
           </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>


@endsection