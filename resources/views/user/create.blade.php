@extends('master')

@section('judul')
<h1>Registrasi Akun Operator</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Registrasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('user.store')}}" method="post">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="name"class="form-control" placeholder="Enter Nama">
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="username">Username</label>
                  <input type="text" name="username"class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group col-md-4">
                  <label for="password">Password</label>
                  <input type="password" name="password"class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group col-md-4">
                  <label for="passwordshow">Retype Password</label>
                  <input type="password" name="passwordshow" class="form-control" placeholder="Ketik ulang password">
                </div>
              </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level">
                      <option selected disabled>Pilih Level</option>
                        <option>admin</option>
                        <option>petugas</option>
                      </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="text" name="telepon"class="form-control" placeholder="Enter no telepon">
                </div>
              <!-- /.card-body -->
              <div style="float: right;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                  Submit
                </button>
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
                        <p>Apa kamu yakin untuk create data ini?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-secondary">Reset</button>
              </div>
                <a href="/admin/users" class="btn btn-outline-info">Kembali</a>
            </form>
          </div>
        </div>
    </div>
</section>
@endsection