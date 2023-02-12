@extends('master')

@section('judul')
<h1>Edit Data Akun</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit data akun</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('user.update', [$users->id]) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="{{ $users->name }}"class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ $users->username }}"class="form-control">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" value="{{ $users->level }}" old="{{$users->level}}"name="level">
                      <option selected disabled>Pilih Level</option>
                        <option>admin</option>
                        <option>petugas</option>
                      </select>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" value="{{ $users->telepon }}"class="form-control">
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
                <a href="/admin/operator" class="btn btn-outline-info">Kembali</a>
            </form>
          </div>
        </div>
    </div>
    </div>
</section>
@endsection