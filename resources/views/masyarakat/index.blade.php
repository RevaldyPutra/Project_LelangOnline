@extends('master')

@section('judul')
<h1>Data Penawaran {{Auth::user()->name}}</h1>
@endsection

@section('content')
<section class="content">
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
    <div class="table-responsive">
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Pelelang</th>
                  <th>Nama Barang</th>
                  <th>Harga Penawaran</th>
                  <th>Tanggal Penawaran</th>
                  <th>Status</th>
                  @if(auth()->user()->level == 'petugas')
                  <th></th>
                  @endif
                  @if(auth()->user()->level == 'admin')
                  <th></th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @forelse ($historyLelangs as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->user->name }}</td>
                  <td><a href="{{route('lelangin.create', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
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
                      <form action="{{ route('barang.destroy', [$item->id]) }}"method="POST">
                          {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
                          <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}
  
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
                <td colspan="5" style="text-align: center; background-color: #f5f5f5;">
                  <span style="font-weight: bold; font-size: 1.2em; color: #a7a7a7;">
                    <i class="far fa-frown"></i> Maaf, tidak ada data yang ditemukan.
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

</section>
@endsection