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
                        <option></option>
                        <option>admin</option>
                        <option>petugas</option>
                      </select>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" value="{{ $users->telepon }}"class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/user" class="btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
    </div>
    </div>
</section>
@endsection