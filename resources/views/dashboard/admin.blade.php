@extends('master')

@section('judul')
<h1>Dashboard ADMIN</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>
              <p>Jumlah Petugas</p>
            </div>
            <div class="icon">
              <i class="nav-icon fa fas fa-user"></i>
            </div>
            <a href="/admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>150</h3>
              <p>Jumlah Barang</p>
            </div>
            <div class="icon">
              <i class="nav-icon fa fas fa-shopping-cart"></i>
            </div>
            <a href="/admin/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>150</h3>
              <p>Jumlah Lelang</p>
            </div>
            <div class="icon">
              <i class="nav-icon fa fas fa-gavel"></i>
            </div>
            <a href="/listlelang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>150</h3>
              <p>Jumlah Penawar</p>
            </div>
            <div class="icon">
              <i class="nav-icon fa fas fa-users"></i>
            </div>
            <a href="/admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
            Launch Small Modal
          </button>
        </div>
    </div>
    </div>
</section>

<!-- /.modal -->

<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Save Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apa kamu yakin untuk save data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <form action="/dashboard/admin">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection