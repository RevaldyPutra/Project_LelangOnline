@extends('master')

@section('judul')
<style>
  .animate__animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }
  .animate__bounceIn {
    animation-name: bounceIn;
  }
  .animate__fadeInUp {
    animation-name: fadeInUp;
  }
  .animate__delay-1s {
    animation-delay: 1s;
  }
  .animate__delay-2s {
    animation-delay: 2s;
  }
  @keyframes bounceIn {
    from, 20%, 40%, 60%, 80%, to {
      animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    0% {
      opacity: 0;
      transform: scale3d(0.3, 0.3, 0.3);
    }
    20% {
      transform: scale3d(1.1, 1.1, 1.1);
    }
    40% {
      transform: scale3d(0.9, 0.9, 0.9);
    }
    60% {
      opacity: 1;
      transform: scale3d(1.03, 1.03, 1.03);
    }
    80% {
      transform: scale3d(0.97, 0.97, 0.97);
    }
    to {
      opacity: 1;
      transform: scale3d(1, 1, 1);
    }
  }
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate3d(0, 100%, 0);
    }
    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }
  </style>
@if(session()->has('successlogin'))
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title animate__animated animate__bounceIn">{{session('successlogin')}}Selamat datang, {{ Auth::user()->name }}!</h5>
          <p class="card-text animate__animated animate__fadeInUp">Anda sudah login ke situs LelangOnline. Mari mulai petualangan menawar barang-barang unik dan berkualitas!</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection


@section('content')
<section class="content">
  @if(Auth::check())
  <div class="jumbotron">
    <h1 class="display-4 animate__animated animate__fadeInDown">Selamat datang {{ Auth::user()->name }}!</h1>
    <p class="lead animate__animated animate__delay-1s animate__fadeInUp">Temukan barang-barang berkualitas dan menarik untuk Anda tawar di situs lelang online kami.</p>
    <hr class="my-4 animate__animated animate__delay-1s animate__fadeInUp">
    <p class="animate__animated animate__delay-1s animate__fadeInUp">Jangan lewatkan kesempatan untuk memenangkan barang impianmu!</p>
    <a class="btn btn-primary btn-lg animate__animated animate__delay-2s animate__bounceIn" href="{{route('masyarakat.listlelang')}}" role="button">Lihat Barang Lelang</a>
  </div>
@endif
</section>

@foreach($lelangs as $item)
@if($item->pemenang == Auth::user()->name)
<!-- Modal notifikasi pop up -->
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Selamat, Anda Terpilih Menjadi Pemenang!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>
      <div class="modal-body">
        <p>Anda telah terpilih sebagai pemenang lelang barang dengan nama <strong>{{ $item->barang->nama_barang }}</strong>. Mohon segera menghubungi panitia lelang untuk informasi lebih lanjut mengenai pengambilan barang.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{route('lelangin.create', $item->id )}}" class="btn btn-primary">Lihat Detail</a>
      </div>
    </div>
  </div>
</div>

@endif
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('#notificationModal').modal('show');
  });
</script>

@endsection