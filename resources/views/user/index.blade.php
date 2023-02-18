@extends('master')

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
<!-- Default box -->
<div class="card">
  <div class="card-header">
    @if (auth()->user()->level == 'admin')
      <a class="btn btn-primary mb-3"href="/admin/operator/create">
        <li class="nav-icon fa fas fa-user-plus"></li>
        Registrasi Operator
      </a>
    @endif
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
                    <th>Level</th>
                    <th>Telepon</th>
                    <th></th>
                </tr>
            </tbody>
        </thead>
        @foreach ($users as $value)
        <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->level }}</td>
            <td>{{ $value->telepon }}</td>
            <td>
              <form action="{{ route('user.destroy', [$value->id]) }}"method="POST">
              {{-- <a href="{{ route('user.show', $value->id)}}"class="btn btn-primary">Detail</a>
              <a href="{{ route('user.edit', $value->id)}}"class="btn btn-warning">Edit</a> --}}
              <a class="btn btn-primary btn-sm" href="{{ route('user.show', $value->id)}}">
                <i class="fas fa-folder"></i>
                View
              </a>
              <a class="btn btn-info btn-sm" href="{{ route('user.edit', $value->id)}}">
                <i class="fas fa-pencil-alt"></i>
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
        </tr>
        </tbody>
        @endforeach
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