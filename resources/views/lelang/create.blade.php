@extends('master')

@section('judul')
<h1>Halaman create lelang</h1>
@endsection

@section('content')
<section class="content">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Tambah Barang Yang Akan Di Lelang') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('lelang.store') }}" data-parsley-validate>
                          @csrf
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group mandatory">
                                <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
                                <select class="form-select form-control @error('barangs_id') is-invalid @enderror" id="barangs_id" name="barangs_id" data-parsley-required="true">
                                  <option value="" disabled>Pilih Barang</option>
                                  @forelse ($barangs as $item)
                                    <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} - {{ Str::of($item->harga_awal) }}</option>
                                  @empty
                                    <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
                                  @endforelse
                                </select>
                              </div>
                              @error('barangs_id')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 col-12">
                                  <div class="form-group mandatory">
                                      <label for="tanggal" class="form-label">{{ __('Tanggal Lelang') }}</label>
                                      <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" name="tanggal_lelang" data-parsley-required="true" value="{{ old('tanggal_lelang') }}">
                                  </div>
                                  @error('tanggal_lelang')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-12">
                                  <div class="form-group mandatory">
                                      <label for="harga_awal" class="form-label">{{ __('Harga Akhir') }}</label>
                                      <input type="text" id="harga_akhir" class="form-control @error('harga_akhir') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_akhir" data-parsley-required="true" value="{{ old('harga_akhir') }}">
                                  </div>
                                  @error('harga_akhir')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                  @enderror
                              </div>
                                                          
                            </div>
                            <div class="row">
                                <div class="col-6 d-flex justify-content-start">
                                    <a href="/petugas/lelang" class="btn btn-outline-info me-1 mb-1">
                                      {{ __('Kembali') }}
                                    </a>
                                </div>
                              <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                                  {{ __('Submit') }}
                                </button>
                                <div class="modal fade" id="modal-sm">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Apa kamu yakin menambahkan barang ini untuk di lelang?</p>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                      
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  <button type="reset" class="btn btn-secondary ml-2 me-1 mb-1">
                                    {{ __('Reset') }}
                                  </button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection