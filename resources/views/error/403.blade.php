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
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-append">
                  <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
@endsection
