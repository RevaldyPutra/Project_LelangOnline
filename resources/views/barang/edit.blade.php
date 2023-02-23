@extends('master')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="form-group">
                    @if( $barangs->image )
                    <img src="{{ asset('storage/' . $barangs->image)}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3">
                    @else
                    <img class="img-preview img-fluid col-sm-5 mb-3" alt="">
                    @endif
                  </div>
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
                <h3 class="card-title">Edit Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('barang.update', [$barangs->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama barang</label>
                    <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}"class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Waktu Ditambahkan</label>
                    <input type="date" name="tanggal" value="{{ $barangs->tanggal }}"class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Harga awal</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><strong>Rp.</strong></span>
                      </div>
                      <input type="text" name="harga_awal" value="{{$barangs->harga_awal}}"class="form-control" >
                    </div>
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
                    <textarea type="text-area" name="deskripsi_barang" class="form-control">{{ $barangs->deskripsi_barang }}</textarea>
                  </div>
                  
                <!-- /.card-body -->
                  @if(auth()->user()->level == 'admin')
                  <a href="{{route('barangmin.index')}}" class="btn btn-outline-info">Kembali</a>
                  <button type="submit" style="float:right;"class="btn btn-primary">Save</button>
                  @elseif(auth()->user()->level == 'petugas')
                    <a href="{{route('baranggas.index')}}" class="btn btn-outline-info">Kembali</a>
                    <button type="submit" style="float:right;"class="btn btn-primary">Save</button>
                  @endif
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