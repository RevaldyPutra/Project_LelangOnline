@extends('master')

@section('judul')
<h1>Dashboard Admin</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
            
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Petugas</span>
              <span class="info-box-number">
                {{ $totaluser }}
              </span>
              <a href="/admin/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Barang</span>
              <span class="info-box-number">
                {{ $totalbarang }}
              </span>
              <a href="/admin/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gavel"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Lelang</span>
              <span class="info-box-number">
                {{ $totallelang }}
              </span>
              <a href="{{route('lelangadmin.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Penawaran</span>
              <span class="info-box-number">
                {{ $totalpenawaran }}
              </span>
              <a href="/admin/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div>
    </div>
</section>
@endsection