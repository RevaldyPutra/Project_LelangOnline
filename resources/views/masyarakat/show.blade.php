@extends('master')

@section('judul')
    
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" value="{{ $users->username }}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="passwordshow" value="{{ $users->passwordshow }}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="telepon" value="{{ $users->telepon }}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <input type="text" name="level" value="{{ $users->level }}" class="form-control">
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/admin/masyarakat" class="btn btn-outline-info">Kembali</a>
              </div>
            </form>
          </div>
          </div>
          </div>
          </div>
        </section>
@endsection