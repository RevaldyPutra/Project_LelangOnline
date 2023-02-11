@extends('master')

@section('judul')
<h1>Halaman index user</h1>
@endsection

@section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    @if (auth()->user()->level == 'admin')
      <a class="btn btn-primary mb-3"href="/admin/user/create">Registrasi</a>
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
  <div class="card-body">
  <table class="table table-bordered table-hover">
        <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Telepon</th>
                    <th>Actions</th>
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
              <a href="{{ route('user.show', $value->id)}}"class="btn btn-primary">Detail</a>
              <a href="{{ route('user.edit', $value->id)}}"class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')   
           <input class="btn btn-danger"type="submit"value="Delete">
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