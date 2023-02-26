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
          <h5 class="card-title">Segera Tawar Barang Impianmu!</h5>
          <p class="card-text">Jangan lewatkan kesempatan untuk memenangkan barang impianmu di website perlelangan kami. Tawarlah sekarang dan jangan biarkan barang tersebut diambil oleh orang lain!</p>
        </div>
      </div>
  <div id="baranglelang"class="container">
  </div>
    <div class="row">
      @forelse($lelangs as $item)
      <div class="col-sm-3">
        <div class="card animate__animated animate__delay-2s animate__fadeInUp">
          @if($item->barang->image)
            <img src="{{ asset('storage/' . $item->barang->image)}}" alt="{{ $item->barang->nama_barang }}" class="card-img-top img-fluid mt-0" >
            <a class="badge {{ $item->status == 'ditutup' ? 'bg-danger' : 'bg-success' }} position-absolute top-0 start-0 bg-success text-white rounded-end mt-2 py-1 px-3" href="">{{ Str::title($item->status) }}</a>  
           @endif
          <div class="card-body">
            <h5 class="card-title">{{ $item->barang->nama_barang}}</h5>
            <p class="card-text">{{ $item->barang->deskripsi_barang}}</p>
            <p class="card-text">Harga Awal: @currency($item->barang->harga_awal)</p>
            <a href="{{ route('lelangin.create', $item->id)}}" class="btn btn-success animate__animated animate__delay-3s animate__bounceIn">TAWAR</a>
          </div>
        </div>
      </div>
        {{-- <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                  @if($item->barang->image)
                  <img src="{{ asset('storage/' . $item->barang->image)}}" alt="{{ $item->barang->nama_barang }}" class="card-img-top img-fluid mt-0">
                  @endif
                </div>
                <h3 class="profile-username text-center">{{ $item->barang->nama_barang}}</h3>

              <h5 class="text-muted text-center">@currency($item->barang->harga_awal)</h5>
              
              <a href="{{ route('lelangin.create', $item->id)}}" class="btn btn-success btn-block"><b>Tawar</b></a>
            </div>
            <!-- /.card-body -->
         </div>
       </div> --}}
       @empty
       <div class="jumbotron text-center animate__animated animate__delay-2s animate__fadeInUp">
        <h1>Maaf, Tidak Ada Barang yang Dilelang Saat Ini</h1>
        <p>Kami sedang mencari barang berkualitas terbaik untuk dilelang. Silahkan kunjungi kami kembali nanti dan temukan barang yang menarik!</p>
        <a href="{{route('dashboard.masyarakat')}}" class="btn btn-primary btn-lg animate__animated animate__delay-3s animate__bounceIn">Kembali Ke Dashboard</a>
      </div>
      
    @endforelse 
  </div>
</section>

@endsection