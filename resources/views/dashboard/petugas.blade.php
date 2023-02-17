@extends('master')

@section('judul')
<h1>Dashboard Petugas</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Barang</span>
              <span class="info-box-number">
                {{ $totalbarang }}
              </span>
              <a href="{{route('barang.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                {{ $totallelang}}
              </span>
              <a href="{{route('lelang.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
      <table class="table table-hover">
            <thead>
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Pelelang</th>
                        <th>No Telp</th>
                        <th>Harga Penawaran</th>
                        <th>Status</th>
                    </tr>
                </tbody>
            </thead>
            
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>
                </td>
                <td></td>
                <td>  </td>
                <td>
                <form action=""method="POST">
                {{-- <a class="btn btn-primary"href="{{ route('barang.show', $value->id)}}">
                  <i class="fas fa-eye"></i>
                 Detail
                </a>
                <a class="btn btn-warning"href="{{ route('barang.edit', $value->id)}}">
                  <i class="fas fa-pen"></i>
                 Edit
                </a> --}}
                {{-- <a class="btn btn-primary btn-sm" href="">
                  <i class="fas fa-folder"></i>
                  View
              </a>
              <a class="btn btn-info btn-sm" href="">
                  <i class="fas fa-pencil-alt"></i>
                  Edit
              </a>
                <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                    <i class="fas fa-trash"></i>
                    Delete
                  </button> --}}
               </form>
                </td>
            </tr>
            </tbody>
            
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer-->
    </div>
</section>
@endsection