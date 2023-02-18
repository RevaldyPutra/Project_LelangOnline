@extends('master')

@section('judul')

@endsection

@section('content')

<section class="content">
  @if(session()->has('success'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('success')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @elseif(session()->has('editsuccess'))
  <<div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('editsuccess')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @elseif(session()->has('deletesuccess'))
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          {{session('deletesuccess')}}
          <li class="fas fa-check-circle"></li>
        </div>
      </div>
    </div>
  </div>
  @endif
    <div class="container-fluid">     
        @if(!empty($lelangs))
      <div class="row">
        <div class="col-md-5">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
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
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bid" data-toggle="tab">Tawar</a></li>
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
                          <input type="text" name="harga_penawaran"class="form-control @error('harga_penawaran') is-invalid @enderror" placeholder="Masukan Harga harus lebih dari @currency($lelangs->harga_akhir)">
                          @error('harga_penawaran')
                          <div class="invalid-feedback">
                            <b>{{ $message }}</b>
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="">
                          <button type="submit" class="btn btn-danger">Tawarkan</button>
                        </div>
                     </div>
                    </form>
                  </div>
                <div class="tab-pane active" id="details">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="inputName">Nama Barang</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="inputName" value="{{ $lelangs->barang->nama_barang}}"disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail">Harga Awal</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="inputEmail" value="@currency($lelangs->barang->harga_awal)"disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail">Harga akhir</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="inputEmail" value="@currency($lelangs->harga_akhir)"disabled>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputName2">Tanggal Lelang</label>
                           <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputName2" value="{{ \Carbon\Carbon::parse($lelangs->tanggal_lelang)->format('j F Y')}}" disabled>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail">Status</label>
                            <div class="col-sm-12">
                             <input type="text" class="form-control" id="inputEmail" value="{{ $lelangs->status}}"disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputExperience">Deskripsi Barang</label>
                      <div class="col-sm-12">
                        <textarea class="form-control" id="inputExperience" disabled>{{ $lelangs->barang->deskripsi_barang}}</textarea>
                      </div>
                    </div>
                    @if(auth()->user()->level == 'admin')
                  <a href="{{route('lelangadmin.index')}}" class="btn btn-outline-info">Kembali</a>
                  @elseif(auth()->user()->level == 'masyarakat')
                  <a href="{{route('dashboard.masyarakat')}}" class="btn btn-outline-info">Kembali</a>
                    @elseif(auth()->user()->level == 'petugas')
                    <a href="{{ route('lelangpetugas.index')}}" class="btn btn-outline-info">Kembali</a>
                  @endif
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
                        <th>Nama Penawar</th>
                        <th>Nama Barang</th>
                        <th>Harga lelang</th>
                        <th>Tanggal lelang</th>
                        <th>Status</th>
                        @if(auth()->user()->level == 'petugas')
                        <th></th>
                        @else
                        @endif
                        @if(auth()->user()->level == 'admin')
                        <th></th>
                        @else
                        @endif
                        
                    </tr>
                </tbody>
            </thead>
            @forelse ($historyLelangs as $item)
            <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>@currency($item->harga)</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                <td>
                  <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                </td>
                @if (auth()->user()->level == 'admin')
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('lelangadmin.show', $item->id)}}">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                </td>
                @endif
                @if (auth()->user()->level == 'petugas')
                <td>
                <form action="{{ route('barang.destroy', [$item->id]) }}"method="POST">
                {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
                <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}
    
                <a class="btn btn-primary btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
                  <i class="fas fa-folder">
                  </i>
                  View
              </a>
              <a class="btn btn-info btn-sm" href="">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
              </a>
                @csrf
                @method('DELETE')   
                <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </button>
              </form>
            </td>
            @else
            @endif
            </tr>
            @empty
            <tr>
                <td>Data masih kosong</td>
            </tr>
            @endforelse
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
  </section>
@endsection