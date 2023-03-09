@extends('master')

@section('judul')
<h1>Halaman Data Penawaran Lelang</h1>
@endsection

@section('content')
<section class="content">
<div class="col-md-12">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" href="#all" data-toggle="tab">Semua status</a></li>
        <li class="nav-item"><a class="nav-link" href="#pemenang" data-toggle="tab">Pemenang</a></li>
        <li class="nav-item"><a class="nav-link" href="#pending" data-toggle="tab">Pending</a></li>
        <li class="nav-item"><a class="nav-link" href="#gugur" data-toggle="tab">Gugur</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="active tab-pane" id="all">
          <div class="card">
            <div class="card-header">
              <a href="{{route('cetakhistoryall')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Cetak Data
              </a>
              <a href="{{route('generatePdf')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Download Data
              </a>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
          <table class="table table-hover">
                <thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Penawar</th>
                            <th>Nama Barang</th>
                            <th>Harga Penawaran</th>
                            <th>Tanggal Penawaran</th>
                            <th>Status</th>
                            
                        </tr>
                    </tbody>
                </thead>
                @forelse ($historyLelangs as $item)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    @if(Auth::user()->level == 'petugas')
                    <td><a href="{{route('lelangpetugas.show', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
                    @elseif(Auth::user()->level == 'admin')
                    <td>{{ $item->lelang->barang->nama_barang }}</td>
                    @endif
                    <td>@currency($item->harga)</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                    <td>
                      <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'gugur' ? 'bg-danger' : 'bg-success') }}">{{ Str::title($item->status) }}</span>
                    </td>
                    @if (auth()->user()->level == 'admin')
        
                    @endif
                    @if (auth()->user()->level == 'petugas')
                    
                @else
                @endif
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
                </tr>
                @endforelse
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="pemenang">
          <div class="card">
            <div class="card-header">
              <a href="{{route('cetakhistorypemenang')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Cetak Data
              </a>
              <a href="{{route('generatePdf.pemenang')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Download Data
              </a>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
          <table class="table table-hover">
                <thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Penawar</th>
                            <th>Nama Barang</th>
                            <th>Harga Penawaran</th>
                            <th>Tanggal Penawaran</th>
                            <th>Status</th>
                        </tr>
                    </tbody>
                </thead>
                @forelse ($historyLelangsPemenang as $item)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    @if(Auth::user()->level == 'petugas')
                    <td><a href="{{route('lelangpetugas.show', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
                    @elseif(Auth::user()->level == 'admin')
                    <td>{{ $item->lelang->barang->nama_barang }}</td>
                    @endif
                    <td>@currency($item->harga)</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                    <td>
                      <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'gugur' ? 'bg-danger' : 'bg-success') }}">{{ Str::title($item->status) }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
                </tr>
                @endforelse
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="pending">
          <div class="card">
            <div class="card-header">
              <a href="{{route('cetakhistorypending')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Cetak Data
              </a>
              <a href="{{route('generatePdf.pending')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Download Data
              </a>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
          <table class="table table-hover">
                <thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Penawar</th>
                            <th>Nama Barang</th>
                            <th>Harga Penawaran</th>
                            <th>Tanggal Penawaran</th>
                            <th>Status</th>
                        </tr>
                    </tbody>
                </thead>
                @forelse ($historyLelangsPending as $item)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    @if(Auth::user()->level == 'petugas')
                    <td><a href="{{route('lelangpetugas.show', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
                    @elseif(Auth::user()->level == 'admin')
                    <td>{{ $item->lelang->barang->nama_barang }}</td>
                    @endif
                    <td>@currency($item->harga)</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                    <td>
                      <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'gugur' ? 'bg-danger' : 'bg-success') }}">{{ Str::title($item->status) }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
                </tr>
                @endforelse
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="gugur">
          <div class="card">
            <div class="card-header">
              <a href="{{route('cetakhistorygugur')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Cetak Data
              </a>
              <a href="{{route('generatePdf.gugur')}}" target="_blank"class="btn btn-info">
                <li class="fas fa fa-print"></li>
                Download Data
              </a>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
          <table class="table table-hover">
                <thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Penawar</th>
                            <th>Nama Barang</th>
                            <th>Harga Penawaran</th>
                            <th>Tanggal Penawaran</th>
                            <th>Status</th>
                        </tr>
                    </tbody>
                </thead>
                @forelse ($historyLelangsGugur as $item)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    @if(Auth::user()->level == 'petugas')
                    <td><a href="{{route('lelangpetugas.show', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
                    @elseif(Auth::user()->level == 'admin')
                    <td>{{ $item->lelang->barang->nama_barang }}</td>
                    @endif
                    <td>@currency($item->harga)</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                    <td>
                      <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'gugur' ? 'bg-danger' : 'bg-success') }}">{{ Str::title($item->status) }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
                </tr>
                @endforelse
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</section>
<!-- /.content -->
@endsection