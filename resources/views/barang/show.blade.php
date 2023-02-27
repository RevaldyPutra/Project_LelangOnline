@extends('master')

@section('judul')

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
                  <div class="form-group">
                    <label> </label>
                    <br>
                    <img src="{{ asset('adminlte/dist/img/lelangonlinesample.jpg')}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3">
                  </div>

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
                    <input type="text" name="harga_awal" value="@currency($barangs->harga_awal)"class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi barang</label>
                    <textarea type="text-area" name="deskripsi_barang" class="form-control" disabled>{{ $barangs->deskripsi_barang }}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Ditambahkan Oleh</label>
                    <div class="input-group">
                      <input type="text" name="harga_awal" value="{{ $barangs->user->name }}" class="form-control" disabled>
                      <span class="input-group-text bg-light">
                        <span class="badge {{ $barangs->user->level == 'petugas' ? 'bg-secondary' : 'bg-primary' }}">{{ Str::title($barangs->user->level) }}</span>
                      </span>
                    </div>
                    
                  </div>
                  
                <!-- /.card-body -->
                @if(Auth::user()->level == 'petugas')
                <a href="{{route('barang.index')}}" class="btn btn-outline-info">Kembali</a>
                @elseif(Auth::user()->level == 'admin')
                <a href="{{route('barangmin.index')}}" class="btn btn-outline-info">Kembali</a>
                @endif
              </form>
            </div>
            </div>
            </div>
            </div>
</section>
@endsection