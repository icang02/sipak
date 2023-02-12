@extends('layouts.dashboard')

@section('main-content')
  <div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>List Nama</h3>
          <p class="text-subtitle text-muted">Menampilkan semua data - Tim Penilai <b>{{ $timPenilai->nama }}</b>.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data PKB</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <a href="{{ route('tim.penilai') }}" class="btn btn-secondary">Kembali</a>

    <section class="section mt-2">
      <div class="card">
        {{-- <div class="card-header">Simple Datatable</div> --}}
        <div class="card-body">
          @if ($data->count() == 0)
            <button disabled type="button" class="btn btn-secondary mb-2">Export Excel</button>
          @else
            <a href="{{ route('data.pkb.exportList', $timPenilai->id) }}" class="btn btn-secondary mb-2">Export Excel</a>
          @endif

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

          {{-- TABLE DATA PKB LIST NAMA YANg DINILAI --}}
          @include('exports.table-list-pkb', $data)

        </div>
      </div>

    </section>
  </div>
@endsection
