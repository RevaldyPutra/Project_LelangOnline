@extends('master')

@section('judul')
@if(session()->has('success'))
{{session('success')}}
<h1>Selamat Datang {{ Auth::user()->name }}</h1>
@endif
@endsection

@section('content')
<section class="content">
    <div class="row">
        @foreach($lelangs as $item)
    
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                  @if($item->barang->image)
                  <img src="{{ asset('storage/' . $item->barang->image)}}" alt="{{ $item->barang->nama_barang }}" class="img-fluid mt-0">
                  @endif
                </div>
                <h3 class="profile-username text-center">{{ $item->barang->nama_barang}}</h3>

              <h5 class="text-muted text-center">@currency($item->barang->harga_awal)</h5>
              
              <a href="{{ route('lelangin.create', $item->id)}}" class="btn btn-success btn-block"><b>Tawar</b></a>
            </div>
            <!-- /.card-body -->
         </div>
    
    </div>
    @endforeach 
</div>
</section>

@endsection