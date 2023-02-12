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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('barang.update', [$barangs->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama barang</label>
                    <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}"class="form-control"  placeholder="Enter nama barnag">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $barangs->tanggal }}"class="form-control"  placeholder="Enter tanggal">
                  </div>
                  <div class="form-group">
                    <label>Harga awal</label>
                    <input type="text" name="harga_awal" value="{{ $barangs->harga_awal }}"class="form-control"  placeholder="Enter harga awal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi barang</label>
                    <input type="text-area" name="deskripsi_barang" value="{{ $barangs->deskripsi_barang }}"class="form-control">
                  </div>
                <!-- /.card-body -->
                <div style="float: right;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                    Save
                  </button>
                  <div class="modal fade" id="modal-sm">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Apa kamu yakin untuk menyimpan perubahan data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
  
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @if(auth()->user()->level == 'petugas')
                <a href="/petugas/barang" class="btn btn-outline-info">Kembali</a>
                @elseif(auth()->user()->level == 'admin')
                <a href="/admin/barang" class="btn btn-outline-info">Kembali</a>
                @endif
              </form>
            </div>
            </div>
            </div>
            </div>
</section>
@endsection