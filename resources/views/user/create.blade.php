@extends('master')

@section('judul')
<h1>Create User</h1>
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
              <h3 class="card-title">Create Akun</h3>
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
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username"class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="passwordshow">Retype Password</label>
                  <input type="password" name="passwordshow" class="form-control" placeholder="Ketik ulang password">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level">
                        <option>admin</option>
                        <option>petugas</option>
                      </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="text" name="telepon"class="form-control" placeholder="Enter no telepon">
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/admin/user" class="btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
    </div>
</section>
@endsection