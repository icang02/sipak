@extends('layouts.dashboard')

@section('main-content')
  <div class="main-content container-fluid">
    <div class="page-title">
      <h3>Dashboard</h3>
      <p class="text-subtitle text-muted">Selamat datang dihalaman Dashboard <b>SIPAK (Sistem Monitoring DUPAK)</b></p>
    </div>
    <section class="section">
      <div class="row mb-2">
        <div class="col-12 col-md-4">
          <div class="card card-statistic">
            <div class="card-body p-0">
              <div class="d-flex flex-column">
                <div class='px-3 py-3 d-flex justify-content-between'>
                  <h3 class='card-title'>Jumlah PKB</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $countPKB = App\Models\PKB::all()->count();
                    @endphp
                    <p>#{{ $countPKB }} data</p>
                  </div>
                </div>
                <div class="chart-wrapper">
                  <canvas id="canvas1" style="height:100px !important"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card card-statistic">
            <div class="card-body p-0">
              <div class="d-flex flex-column">
                <div class='px-3 py-3 d-flex justify-content-between'>
                  <h3 class='card-title'>PAK {{ date('Y') - 1 }}</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $pakThnSebelumnya = App\Models\DataDupak::where('tahun', date('Y') - 1)->count();
                    @endphp
                    <p>#{{ $pakThnSebelumnya }} data</p>
                  </div>
                </div>
                <div class="chart-wrapper">
                  <canvas id="canvas2" style="height:100px !important"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card card-statistic">
            <div class="card-body p-0">
              <div class="d-flex flex-column">
                <div class='px-3 py-3 d-flex justify-content-between'>
                  <h3 class='card-title'>PAK {{ date('Y') }}</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $pakThnSkrng = App\Models\DataDupak::where('tahun', date('Y'))->count();
                    @endphp
                    <p>#{{ $pakThnSkrng }} data</p>
                  </div>
                </div>
                <div class="chart-wrapper">
                  <canvas id="canvas3" style="height:100px !important"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Data PKB</h4>
              <a href="{{ route('data.pkb.export') }}" class="d-flex ">
                <i data-feather="download" style="cursor: pointer;"></i>
              </a>
            </div>
            <div class="card-body px-4 pb-0">
              <div class="table-responsive">
                <table class='table mb-0 table-sm table-bordered' id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Lengkap</th>
                      <th class="text-center">NIP</th>
                      <th class="text-center">Jabatan</th>
                      <th class="text-center">Pangkat</th>
                      <th class="text-center">Golongan</th>
                      <th class="text-center">Kabupaten / Kota</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach ($pkb as $item)
                    <tr class="text-center text-secondary">
                      <td>{{ $loop->iteration }}.</td>
                      <td class="text-start">{{ $item->nama }}</td>
                      <td>{{ $item->nip }}</td>
                      <td>{{ $item->jabatan->nama }}</td>
                      <td>{{ $item->pangkat }}</td>
                      <td>{{ $item->golongan }}</td>
                      <td>{{ $item->kota ?? '-' }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-center">
              <a href="{{ route('data.pkb') }}" class="btn btn-sm btn-primary badge" style="border-radius: 4px;">More
                info</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
