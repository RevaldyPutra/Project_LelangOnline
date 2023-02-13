@extends('master')

@section('judul')
<h1>Data Barangs</h1>
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
  <div class="card-body p-0">
  <table class="table table-hover">
        <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama barang</th>
                    <th>Foto</th>
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
            <td>
              @if($value->image)
                <img src="{{ asset('storage/' . $value->image)}}" alt="{{ $value->nama_barang }}" class="img-fluid mt-3" width="75">
              @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($value->tanggal)->format('j-F-Y') }}</td>
            <td>{{ $value->harga_awal }}</td>
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
            <a class="btn btn-primary btn-sm" href="{{ route('barang.show', $value->id)}}">
              <i class="fas fa-folder">
              </i>
              View
          </a>
          <a class="btn btn-info btn-sm" href="{{ route('barang.edit', $value->id)}}">
              <i class="fas fa-pencil-alt">
              </i>
              Edit
          </a>
          @csrf
            @method('DELETE')   
            {{-- <button class="btn btn-danger"type="submit"value="Delete">
              <i class="fas fa-trash"></i>
              Delete
            </button> --}}
            <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                <i class="fas fa-trash">
                </i>
                Delete
              </button>
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
@stack('scripts')
@endsection