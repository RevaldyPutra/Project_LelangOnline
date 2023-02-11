@extends('master')

@section('judul')
<h1>Details Akun</h1>
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
              <h3 class="card-title">Detail akun </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" value="{{ $users->username }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" name="passwordshow" value="{{ $users->passwordshow }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="text" name="telepon" value="{{ $users->telepon }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
                  <input type="text" name="level" value="{{ $users->level }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Waktu dibuat</label>
                  <input type="text" name="created_at" value="{{ $users->created_at }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/admin/user" class="btn btn-primary">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection