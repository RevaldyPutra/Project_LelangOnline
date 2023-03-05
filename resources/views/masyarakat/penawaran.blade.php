@extends('master')

@section('judul')
@if($lelangs->status == 'ditutup')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Selamat kepada <strong>{{ $lelangs->pemenang }}</strong></h5>
    <p class="card-text"> Telah memenangkan lelang untuk barang <strong>{{ $lelangs->barang->nama_barang }}</strong> dengan harga <strong>Rp{{ number_format($lelangs->harga_akhir) }}</strong></p>
  </div>
</div>
@endif
@endsection

@section('content')
<style>
.card {
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 2rem;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn-primary:focus,
.btn-primary.focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}
</style>
<section class="content">
    <div class="container-fluid">  
      @error('harga_penawaran')
      <b class="form-control is-invalid mb-3">Erorr! {{ $message }}</b>
      @enderror
        @if(!empty($lelangs))
      <div class="row">
        <div class="col-md-5">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <span class="badge {{ $lelangs->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelangs->status) }}</span>
              <div class="text-center">
               @if($lelangs->barang->image)
                <img class="img-fluid mt-3" src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="User profile picture">
                @endif
            </div>
        
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        
        <!-- /.col -->
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details Barang</a></li>
                    <li hidden class="nav-item"><a class="nav-link" href="#bid" data-toggle="tab">Tawar</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane" id="bid">
                    <form action="{{route('lelangin.store', $lelangs->id)}}" method="post" class="form-horizontal" data-parsley-validate>
                      @csrf
                    <div class="form-group">
                        <label for="inputName">Tawarkan Harga </label>
                      <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><strong>Rp.</strong></span>
                            </div>
                          <input type="text" name="harga_penawaran"class="form-control @error('harga_penawaran') is-invalid @enderror" placeholder="Masukan Harga harus lebih dari @currency($lelangs->barang->harga_awal)">
                          @error('harga_penawaran')
                          <div class="invalid-feedback">
                            <b>{{ $message }}</b>
                          </div>
                          @enderror
                        </div>
                      </div>
                      </div>
                      <div class="form-group row">
                        <div class="">
                          <button type="button" data-toggle="modal" data-target="#modal-sl" class="btn btn-danger">Tawarkan</button>
                        </div>
                     </div>
                     <div class="modal fade" id="modal-sl">
                      <div class="modal-dialog modal-sl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tawar Harga</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apa kamu yakin untuk menawar {{ $lelangs->barang->nama_barang}}</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    
                            <button type="submit" class="btn btn-danger">Iya</button>
                          
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    </form>
                  </div>
                <div class="tab-pane active" id="details">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Nama Barang</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value="{{ $lelangs->barang->nama_barang }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">Harga Awal</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" value="@currency($lelangs->barang->harga_awal)" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputHargaAkhir" class="col-sm-3 col-form-label">Harga Akhir</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputHargaAkhir" value="@currency($lelangs->harga_akhir)" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputTanggal" class="col-sm-3 col-form-label">Tanggal Lelang</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputTanggal" value="{{ \Carbon\Carbon::parse($lelangs->tanggal_lelang)->format('j F Y')}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputStatus" class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputStatus" value="{{ $lelangs->status }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi Barang</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="inputDeskripsi" rows="3" readonly>{{ $lelangs->barang->deskripsi_barang }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      @if($lelangs->status == 'dibuka')
                      <div class="col-sm-12">
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                          <i class="fas fa-gavel mr-2"></i> Tawar
                        </button>
                      </div>
                      @else 

                      @endif
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <a href="{{ route('masyarakat.listlelang') }}" class="btn btn-outline-info btn-lg btn-block">Kembali</a>
                      </div>
                    </div>
                    
                  </form>                  

                  <form  action="{{route('lelangin.store', $lelangs->id)}}" method="post">
                    @csrf
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tawar {{ $lelangs->barang->nama_barang}} </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="input">Input Harga Penawaran</label>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><strong>Rp.</strong></span>
                                </div>
                              <input type="text" name="harga_penawaran" class="form-control @error('harga_penawaran') is-invalid @enderror" placeholder="Masukan Harga harus lebih dari @currency($lelangs->barang->harga_awal)">
                              @error('harga_penawaran')
                              <div class="invalid-feedback">
                                <b>{{ $message }}</b>
                              </div>
                              @enderror
                            </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Tawarkan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
          
        </div>
        {{-- <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                  <div class="card-body">
    
                </div>
              </div>
            </div>
        </div> --}}
        <!-- /.col -->
      </div>
      @endif
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="card">
        <div class="card-header">
          <strong>Data Pelelang {{ $lelangs->barang->nama_barang }}</strong>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Pelelang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Penawaran</th>
                <th scope="col">Tanggal Penawaran</th>
                <th scope="col">Status</th>
                @if(auth()->user()->level == 'petugas')
                <th scope="col"></th>
                @endif
                @if(auth()->user()->level == 'admin')
                <th scope="col"></th>
                @endif
              </tr>
            </thead>
            <tbody>
              @forelse ($historyLelangs as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->lelang->barang->nama_barang }}</td>
                <td>@currency($item->harga)</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                <td>
                  <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                </td>
                @if (auth()->user()->level == 'admin')
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('lelangadmin.show', $item->id)}}">
                    <i class="fas fa-folder"></i>
                    View
                  </a>
                </td>
                @endif
                @if (auth()->user()->level == 'petugas')
                <td>
                  <form action="{{ route('barang.destroy', [$item->id]) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
                      <i class="fas fa-folder"></i>
                      View
                    </a>
                    <a class="btn btn-info btn-sm" href="">
                      <i class="fas fa-pencil-alt"></i>
                      Edit
                    </a>
                    @csrf
                    @method('DELETE')   
                    <button class="btn btn-danger btn-sm" type="submit" value="Delete">
                      <i class="fas fa-trash"></i>
                      Delete
                    </button>
                  </form>
                </td>
                @endif
              </tr>
              @empty
              <tr>
                <td colspan="6" style="text-align: center; background-color: #f5f5f5; padding: 2em;">
                  <span style="font-weight: bold; font-size: 1.5em; color: #a7a7a7;">
                    <i class="far fa-frown"></i> Maaf, tidak ada data penawaran untuk barang ini.
                  </span>
                  <br>
                  <span style="font-size: 1.2em; color: #a7a7a7;">
                    Silahkan menawar barang sekarang.
                  </span>
                </td>
              </tr>
                         
              @endforelse
            </tbody>
          </table>
        </div>
        
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('lelangin.storecomments', $lelangs->id) }}">
                @csrf
                <div class="form-group">
                  <label for="komentar">Tulis Komentar</label>
                  <textarea class="form-control" rows="5" id="komentar" placeholder="Masukkan komentar" name="komentar"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              @forelse($comments as $komen)
              <div class="media mb-3">
                @if($komen->user->level == 'admin')

                <img src="{{asset('adminlte/dist/img/user-gear.png')}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                @else
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                @endif

                <div class="media-body">
                  @if($komen->user->level == 'admin')
                  <h5 class="mt-0 text-success">{{ $komen->nama }} <small><i>Posted on {{ $komen->created_at->format('d F Y \p\a\d\a\ H:i') }}
                  </i></small></h5>
                  @elseif($komen->user->level == 'petugas')
                  <span class="badge {{ $komen->user->level == 'petugas' ? 'bg-primary' : 'bg-secondary' }}">{{ Str::title($komen->user->level) }}</span>
                  <h5 class="mt-0">{{ $komen->nama }} <small><i>
                    <div class="time">
                      {{ $komen->created_at->diffForHumans() }}
                  </div>                  
                  </i></small></h5>
                  @else
                  <h5 class="mt-0">{{ $komen->nama }} <small><i>
                    <div class="time">
                    {{ $komen->created_at->diffForHumans() }}
                    </div>
                  </i></small></h5>
                  @endif
                  <p>{{ $komen->komentar }}</p>      
                </div>
              </div>
              @empty
              <p>Tidak ada komentar.</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>  
    
    @if(session()->has('ucapan'))
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card bg-light">
            <div class="card-body">
              <h1 class="text-center mb-4"> {{session('ucapan')}} Terima Kasih Telah Menawar</h1>
              <p class="text-justify">Kami sangat mengapresiasi kesediaan Anda untuk menawar barang lelang di situs kami. Setiap penawaran yang Anda berikan membantu kami untuk memberikan pelayanan yang lebih baik kepada semua pengguna situs.</p>
              <p class="text-justify">Kami selalu berusaha untuk memberikan pengalaman yang terbaik dalam membeli atau menjual barang lelang di situs kami. Jangan ragu untuk terus mengunjungi situs kami untuk mencari barang lelang yang menarik dan menawarkan penawaran yang terbaik.</p>
              <p class="text-center mt-5"><a href="{{ route('masyarakat.listlelang') }}" class="btn btn-primary">Kembali ke Halaman Lelang</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    
  </section>
@endsection