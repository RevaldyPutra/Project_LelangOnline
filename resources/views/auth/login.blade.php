<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lelang Online - Login</title>

  <link rel="icon" type="images/png" href="{{ asset('adminlte/dist/img/lelangonline.png')}}" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
    button {
      transition: width 2s;
    }
    button:hover {
      opacity: 0.7;
    }
    body {
      
       background-image: url("{{asset('adminlte/dist/img/jungle.jpg')}}");
       height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="{{ asset('adminlte/dist/img/lelangonline.png')}}" alt="AdminLTE Logo" width="100" height="90">
      <a href="#" class="h1"><b>Lelang</b>Online</a>
    </div>
    <div class="card-body">
      @if(session()->has('success'))
      <div class="form-group">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success" role="alert">
              {{session('success')}}
              <li class="fas fa-check-circle"></li>
            </div>
          </div>
        </div>
      </div>
      @endif
      <p class="login-box-msg">Login untuk melakukan lelang online</p>
      <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username"class="form-control @error('username') is-invalid @enderror" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password"class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span type="button" class="fa fa-eye toggle-password"></span>
            </div>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            
            <button type="submit" style="float: right;"class="btn btn-primary btn-block">
              Sign In
              <i class="nav-icon fas fa-sign-in-alt"></i>
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="{{ route('login.register')}}" class="text-center">Belum Punya Akun?</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
  $('.toggle-password').on('click', function() {
      $(this).toggleClass('btn-outline-secondary fas fa-eye-slash btn-outline-primary');
      var passwordField = $('#password');
      var passwordFieldType = passwordField.attr('type');
      if (passwordFieldType === 'password') {
          passwordField.attr('type', 'text');
      } else {
          passwordField.attr('type', 'password');
      }
  });
</script>
</body>
</html>
