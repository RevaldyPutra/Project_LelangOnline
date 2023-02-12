@extends('master')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-row">
                  <div class="form-group col-md-7">
                    <label>Nama barang</label>
                    <input type="text" name="nama_barang"class="form-control"  placeholder="Enter nama barang">
                  </div>
                  <div class="form-group col-md-5">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"  placeholder="Enter tanggal">
                  </div>
                </div>
                  <div class="form-group">
                    <label>Harga awal</label>
                    <input type="text" name="harga_awal"class="form-control"  placeholder="Enter harga awal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi barang</label>
                    <textarea type="text" name="deskripsi_barang"class="form-control"></textarea>
                  </div>
                <!-- /.card-body -->
                <div style="float:right;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                    <a href="/petugas/barang" class="btn btn-outline-info">Kembali</a>
              </form>
            </div>
            </div>
            </div>
            </div>
</section>

@endsection