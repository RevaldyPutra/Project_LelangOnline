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
                    <label for="image" class="form-label">Gambar Barang</label>
                    <img class="img-preview img-fluid col-sm-5 mb-3" alt="">
                    <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi barang</label>
                    <textarea type="text" name="deskripsi_barang"class="form-control"></textarea>
                  </div>
                <!-- /.card-body -->
                <div style="float:right;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                    Submit
                  </button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                @if(auth()->user()->level == 'admin')
                <a href="/admin/barang" class="btn btn-outline-info">Kembali</a>

                @elseif(auth()->user()->level == 'petugas')
                <a href="/petugas/barang" class="btn btn-outline-info">Kembali</a>
    
                @else
                <a href="/barang" class="btn btn-outline-info">Kembali</a>
                @endif
                    <!-- /.modal -->
                <div class="modal fade" id="modal-sm">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apa kamu yakin untuk menambahkan data barang ini?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                      
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </form>
            </div>
            </div>
            </div>
            </div>
</section>

<script>
  function previewImage() {
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection