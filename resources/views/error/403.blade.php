@extends('master')

@section('judul')
<center><h1></h1></center>
@endsection

@section('content')
<section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> You don't have permission to access this.</h3>
            <strong>
            <h3>
             {{Auth::user()->level}} dilarang akses 
            </h3>
            </strong>
            <div class="input-group-append">
            @if(Auth::user()->level == 'admin')      
              <a href="{{route('dashboard.admin')}}" class="btn btn-danger">Kembali Ke Dashboard</a>
              @elseif(Auth::user()->level == 'petugas')
              <a href="{{route('dashboard.petugas')}}" class="btn btn-danger">Kembali Ke Dashboard</a>
              @elseif(Auth::user()->level == 'masyarakat')
              <a href="{{route('dashboard.masyarakat')}}" class="btn btn-danger">Kembali Ke Dashboard</a>
            @endif
              </div>
            
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->
  </section>
@endsection
