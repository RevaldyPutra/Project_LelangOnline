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
          <form class="search-form">
            

              <div class="input-group-append">
                @if(auth()->user()->level == 'admin')
                  <a href="/dashboard/admin" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                  </a>
                  @elseif(auth()->user()->level == 'petugas')
                  <a href="/dashboard/petugas" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                    @endif
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->
  </section>
@endsection
