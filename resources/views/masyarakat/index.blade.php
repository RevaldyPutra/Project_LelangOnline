@extends('master')

@section('judul')
<h1>Data Masyarakat</h1>
@endsection

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data akun masyarakat</h3>

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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th></th>
                    </tr>
                </tbody>
                @foreach ($users as $value)    
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->telepon }}</td>
                        <td>
                            <form action="">
                                {{-- <a href="{{ route('masyarakat.show', $value->id) }}" class="btn btn-primary">Details</a>
                                <a href="" class="btn btn-warning">Edit</a> --}}
                                <a class="btn btn-primary btn-sm" href="{{ route('masyarakat.show', $value->id)}}">
                                    <i class="fas fa-folder"></i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('masyarakat.edit', $value->id)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                      Edit
                                </a>
                                  <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                  </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </thead>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection