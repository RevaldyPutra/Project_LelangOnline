@extends('master')

@section('judul')
<h1>Profile</h1>
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
                @if(auth()->user()->level == 'admin')
                    <img src="{{asset('adminlte/dist/img/user-gear.png')}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                    @else
                    <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                @endif
              </div>

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->level}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="details">
                    <form class="form-horizontal">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                          <div class="form-row">
                          <div class="form-group col-md-4">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                          <div class="form-group col-md-4">
                              <label>Password</label>
                              <input type="text" name="passwordshow" value="{{ Auth::user()->passwordshow }}"class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                          <div class="form-group col-md-4">
                            <label>Telepon</label>
                            <input type="text" name="telepon" value="{{ Auth::user()->telepon }}"class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                        </div>
                          <div class="form-group">
                            <label>Level</label>
                            <input type="text" name="level" value="{{ Auth::user()->level }}" class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                          <div class="form-group">
                            <label>Waktu dibuat</label>
                            <input type="text" name="created_at" value="{{ Auth::user()->created_at }}"class="form-control" id="exampleInputEmail1"readonly>
                          </div>
                    </form>
                  </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telepon" value="{{ Auth::user()->telepon }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection