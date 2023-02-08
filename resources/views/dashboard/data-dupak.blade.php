@extends('layouts.dashboard')

@section('main-content')
  <div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Data DUPAK</h3>
          <p class="text-subtitle text-muted">Menampilkan semua data.</p>
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

    <a href="{{ route('add.dupak') }}" class="btn btn-primary">Tambah Data</a>

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

          @include('components.dashboard.table')
          {{-- <table class='mt-1 table table-sm table-hover table-bordered table-striped' id="table1">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nama Lengkap</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">PAK JAN JUN</th>
                <th class="text-center">PAK JUL DES</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">SKP</th>
                <th class="text-center">Verifikasi</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dupak as $dpk)
                <tr class="text-center text-secondary">
                  <td>{{ $loop->iteration }}.</td>
                  <td class="text-start">{{ $dpk->nama }}</td>
                  <td>{{ $dpk->nip }}</td>
                  <td>{{ $dpk->jabatan->nama }}</td>
                  <td>{{ $dpk->penilai_pak_janjun->nama ?? '-' }}</td>
                  <td>{{ $dpk->penilai_pak_juldes->nama ?? '-' }}</td>
                  <td class="fw-bold">{{ $dpk->tahun }}</td>
                  <td>
                    {!! $dpk->skp ? '&#9989;' : '-' !!}
                  </td>
                  <td>
                    {!! $dpk->verifikasi ? '&#9989;' : '-' !!}
                  </td>
                  <td class="text-nowrap">
                    <a href="{{ route('edit.data.dupak', $dpk->id) }}" class="btn btn-primary badge"
                      style="border-radius: 4px;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-eye" viewBox="0 0 16 16">
                        <path
                          d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path
                          d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                      </svg>
                    </a>
                    <button class="btn btn-danger badge" style="border-radius: 4px;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                        <path
                          d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                        <path
                          d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                      </svg>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table> --}}
        </div>
      </div>

    </section>
  </div>
@endsection
