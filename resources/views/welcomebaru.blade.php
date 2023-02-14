@extends('asset')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LelangOnline</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="#">
            <img src="{{ asset('adminlte/dist/img/lelangonline.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
            <b>Lelang</b>Online
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
    
        @auth
        @if(auth()->user()->level == 'admin')
            <a href="{{ url('/dashboard/admin') }}" class="btn btn-outline-primary my-2 my-sm-0 mr-4>Home Admin</a>
            @elseif (auth()->user()->level == 'petugas')
            <a href="{{ url('/dashboard/petugas') }}"  class="btn btn-outline-primary my-2 my-sm-0 mr-4>Home Petugas</a>
            @elseif(auth()->user()->level == 'masyarakat')
            <a href="{{ url('/listlelang') }}"  class="btn btn-outline-primary my-2 my-sm-0 mr-4>Home Masyarakat</a>
            @else
            <a href="{{ url('/home') }}"  class="btn btn-outline-primary my-2 my-sm-0 mr-4>Home</a>
        @endif
        @else
            <a href="{{ route('login') }}"  class="btn btn-outline-success my-2 my-sm-0 mr-4">Masuk</a>
    
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-success my-2 my-sm-0 mr-4">Register</a>
            @endif
        @endauth

    @endif
          </form>
        </div>
      </nav>
      <div class="m-5 col-md-5">
        <b>
        <h1>Selamat Datang Di Aplikasi Lelang Online</h1>
        <hr>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, vero.</p>
    </b>
        <br>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit hic ex possimus, id tempora corrupti non veritatis consequatur voluptates, totam incidunt ea adipisci saepe odit, eveniet deserunt ut doloribus voluptatem cumque vel! Cupiditate ipsa odio, facilis dolorem optio possimus corporis aperiam, inventore veritatis molestiae dolor earum autem aspernatur quis dolore.</p>
      </div>
</body>
</html>
