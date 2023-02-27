@extends('master')

@section('judul')
@foreach($lelangs as $item)
@if($item->pemenang == Auth::user()->name)
<h1>Kamu memenangkan lelang</h1>
@endif
@endforeach
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
          <a href="#baranglelang" class="btn btn-success animate__animated animate__fadeInUp animate__delay-1s">Lihat Barang Lelang</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection


@section('content')
<section class="content">
  <div class="card animate__animated animate__delay-1s animate__fadeInUp">
    <div class="card-body">
      <h5 class="card-title">Tawarkan Barang Impianmu dan Menangkan!</h5>
      <p class="card-text">Jangan lewatkan kesempatan untuk memenangkan barang impianmu di website perlelangan kami. Di sini kamu bisa menawar barang berkualitas dengan harga yang terjangkau. Tawarlah sekarang dan jangan sampai kehilangan kesempatanmu untuk memenangkan barang yang kamu idamkan!</p>
    </div>
  </div>
  <div id="baranglelang" class="container"></div>
  <div class="row">
    @forelse($lelangs as $item)
    <div class="col-sm-3">
      <div class="card animate__animated animate__delay-2s animate__fadeInUp">
        @if($item->barang->image)
        <img src="{{ asset('storage/' . $item->barang->image)}}" alt="{{ $item->barang->nama_barang }}" class="card-img-top img-fluid mt-0">
        <a class="badge {{ $item->status == 'ditutup' ? 'bg-danger' : 'bg-success' }} position-absolute top-0 start-0 bg-success text-white rounded-end mt-2 py-1 px-3" href="">{{ Str::title($item->status) }}</a>  
        @endif
        <div class="card-body">
          <h4 class="card-title">{{ $item->barang->nama_barang}}</h4>
          <p class="card-text">{{ $item->barang->deskripsi_barang}}</p>
          @if($item->status == 'dibuka')
          <p class="card-text">Harga Awal: @currency($item->barang->harga_awal)</p>
          <a href="{{ route('lelangin.create', $item->id)}}" class="btn btn-primary animate__animated animate__delay-3s animate__bounceIn">TAWAR SEKARANG</a>
          @else
          <p class="card-text">Harga Akhir: @currency($item->harga_akhir)</p>
          <p class="card-text">Pemenang: {{ $item->pemenang }}</p>
          <a href="{{ route('lelangin.create', $item->id)}}" class="btn btn-info animate__animated animate__delay-3s animate__bounceIn">LIHAT DETAIL</a>
          @endif
        </div>
      </div>
    </div>
    @empty
    <div class="jumbotron text-center animate__animated animate__delay-2s animate__fadeInUp">
      <h1>Tidak Ada Barang yang Dilelang Saat Ini</h1>
      <p>Silakan kembali lagi nanti untuk menemukan barang yang menarik.</p>
      <a href="{{route('dashboard.masyarakat')}}" class="btn btn-primary btn-lg animate__animated animate__delay-3s animate__bounceIn">KEMBALI KE DASHBOARD</a>
    </div>
    @endforelse 
  </div>
</section>


@endsection