@extends('master')

@section('judul')
<h1>Halaman Show Barang</h1>
@endsection

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                @if( $barangs->image )
                  <div class="form-group">
                    <label> </label>
                    <br>
                    <img src="{{ asset('storage/' . $barangs->image)}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3">
                  </div>
                  @else

                  @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama barang</label>
                    <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}"class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                    <label>Waktu Ditambahkan</label>
                    <input type="date" name="tanggal" value="{{ $barangs->tanggal }}"class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                    <label>Harga awal</label>
                    <input type="text" name="harga_awal" value="{{ $barangs->harga_awal }}"class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi barang</label>
                    <textarea type="text-area" name="deskripsi_barang" class="form-control" disabled>{{ $barangs->deskripsi_barang }}</textarea>
                  </div>
                  
                <!-- /.card-body -->
                  @if(auth()->user()->level == 'admin')
                  <a href="/listlelang" class="btn btn-outline-info">Kembali ke lelang</a>
                  <a href="/admin/barang" class="btn btn-outline-info">Kembali ke barang</a>
                  @elseif(auth()->user()->level == 'masyarakat')
                  <a href="/listlelang" class="btn btn-outline-info">Kembali</a>
                    @elseif(auth()->user()->level == 'petugas')
                    <a href="/petugas/barang" class="btn btn-outline-info">Kembali</a>
                  @endif
              </form>
            </div>
            </div>
            </div>
            </div>
</section>
@endsection