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
                  <b>Penawaran</b> <a class="float-right">{{ $historyLelangs->where('users_id',Auth::user()->id)->count()}}</a>
                </li>
              </ul>
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
                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control"readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Telepon</label>
                            <input type="text" name="telepon" value="{{ Auth::user()->telepon }}"class="form-control"readonly>
                          </div>
                         </div>
                          <div class="form-group ">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"readonly></div>
                          <div class="form-group">
                            <label>Waktu dibuat</label>
                            <input type="text" name="created_at" value="{{ Auth::user()->created_at }}"class="form-control"readonly>
                          </div>
                          @if(Auth::user()->level == 'admin')
                          <a href="{{route('dashboard.admin')}}" class="btn btn-outline-info">Kembali</a>
                          @elseif(Auth::user()->level == 'petugas')
                          <a href="{{route('dashboard.petugas')}}" class="btn btn-outline-info">Kembali</a>
                          @elseif(Auth::user()->level == 'masyarakat')
                          <a href="{{route('dashboard.masyarakat')}}" class="btn btn-outline-info">Kembali</a>
                          @endif
                    </form>
                  </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="{{route('user.updateprofile')}}" method="POST">
                      @csrf
                      @method('PUT')
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
                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi-modal">Simpan</button>
                          <div class="modal fade" id="konfirmasi-modal" tabindex="-1" role="dialog" aria-labelledby="konfirmasi-modal-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="konfirmasi-modal-label">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menyimpan perubahan ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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