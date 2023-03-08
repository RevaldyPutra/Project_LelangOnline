@extends('master')

@section('judul')
<h1>Details Akun</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                @if($users->level == 'admin')
                    <img src="{{asset('adminlte/dist/img/user-gear.png')}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                    @else
                    <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                @endif
              </div>
              <h3 class="profile-username text-center">{{$users->username}}</h3>

              <p class="text-muted text-center">{{$users->level}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Penawaran</b> <a class="float-right">{{ $historyLelangs->where('users_id',Auth::user()->id)->count()}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- left column -->
        <div class="col-md-9">
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
                  <label>Nama</label>
                  <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Username</label>
                  <input type="text" name="username" value="{{ $users->username }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group col-md-4">
                    <label>Password</label>
                    <input type="text" name="passwordshow" value="{{ $users->passwordshow }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" name="telepon" value="{{ $users->telepon }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
              </div>
                <div class="form-group">
                  <label>Level</label>
                  <input type="text" name="level" value="{{ $users->level }}" class="form-control" id="exampleInputEmail1"readonly>
                </div>
                <div class="form-group">
                  <label>Waktu dibuat</label>
                  <input type="text" name="created_at" value="{{ $users->created_at }}"class="form-control" id="exampleInputEmail1"readonly>
                </div>
              <!-- /.card-body -->
                <a href="/admin/users" class="btn btn-outline-info">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection