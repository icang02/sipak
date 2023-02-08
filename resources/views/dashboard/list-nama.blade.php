@extends('layouts.dashboard')

@section('main-content')
  <div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Daftar Nama</h3>
          <p class="text-subtitle text-muted">Menampilkan semua data. Tim Penilai <b>{{ $timPenilai }}</b>.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data DUPAK</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <div class="d-flex mb-2 justify-content-between">
      <a href="{{ route('add.dupak') }}" class="btn btn-primary">Tambah Data</a>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>

    <section class="section mt-2">
      <div class="card">
        {{-- <div class="card-header">Simple Datatable</div> --}}
        <div class="card-body">
          <a href="{{ route('export') }}" class="btn btn-secondary mb-2">Export Excel</a>

          {{-- ALERT --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {!! session('success') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @error('nip')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {!! $message !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @enderror
          {{-- END ALERT --}}

          @include('exports.users')
        </div>
      </div>

    </section>
  </div>
@endsection
