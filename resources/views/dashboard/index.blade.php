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
                  <h3 class='card-title'>DUPAK Masuk</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $dupakMasuk = App\Models\Dupak::all()->count();
                    @endphp
                    <p>#{{ $dupakMasuk }} data</p>
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
                  <h3 class='card-title'>PAK JAN JUN</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $pakJanjun = App\Models\Dupak::where('pak_janjun', '!=', null)
                          ->get()
                          ->count();
                    @endphp
                    <p>#{{ $pakJanjun }} data</p>
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
                  <h3 class='card-title'>PAK JUL DES</h3>
                  <div class="card-right d-flex align-items-center">
                    @php
                      $pakJuldes = App\Models\Dupak::where('pak_juldes', '!=', null)
                          ->get()
                          ->count();
                    @endphp
                    <p>#{{ $pakJuldes }} data</p>
                  </div>
                </div>
                <div class="chart-wrapper">
                  <canvas id="canvas3" style="height:100px !important"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-12 col-md-3">
          <div class="card card-statistic">
            <div class="card-body p-0">
              <div class="d-flex flex-column">
                <div class='px-3 py-3 d-flex justify-content-between'>
                  <h3 class='card-title'>Sales Today</h3>
                  <div class="card-right d-flex align-items-center">
                    <p>423 </p>
                  </div>
                </div>
                <div class="chart-wrapper">
                  <canvas id="canvas4" style="height:100px !important"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
          {{-- <div class="card">
            <div class="card-header">
              <h3 class='card-heading p-1 pl-3'>Sales</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="pl-3">
                    <h1 class='mt-5'>$21,102</h1>
                    <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i>
                        +19%</span> than last month</p>
                    <div class="legends">
                      <div class="legend d-flex flex-row align-items-center">
                        <div class='w-3 h-3 rounded-full bg-info me-2'></div><span class='text-xs'>Last
                          Month</span>
                      </div>
                      <div class="legend d-flex flex-row align-items-center">
                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span class='text-xs'>Current
                          Month</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-12">
                  <canvas id="bar"></canvas>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Data DUPAK</h4>
              <div class="d-flex ">
                <i data-feather="download"></i>
              </div>
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
                      <th class="text-center">PAK JAN JUN</th>
                      <th class="text-center">PAK JUL DES</th>
                      <th class="text-center">Tahun</th>
                      <th class="text-center">Kab / Kota</th>
                      {{-- <th class="text-center">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach ($dupak as $dpk)
                    <tr class="text-center text-secondary">
                      <td>{{ $loop->iteration }}.</td>
                      <td class="text-start">{{ $dpk->nama }}</td>
                      <td>{{ $dpk->nip }}</td>
                      <td>{{ $dpk->jabatan->nama }}</td>
                      <td>{{ $dpk->penilai_pak_janjun->nama ?? '-' }}</td>
                      <td>{{ $dpk->penilai_pak_juldes->nama ?? '-' }}</td>
                      <td>{{ $dpk->tahun }}</td>
                      <td>{{ $dpk->kota ?? '-' }}</td>
                      {{-- <td class="text-nowrap">
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
                        <a href="{{ route('edit.data.dupak', $dpk->id) }}" class="btn btn-warning badge"
                          style="border-radius: 4px;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                              d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
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
                      </td> --}}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-center">
              <a href="{{ route('data.dupak') }}" class="btn btn-sm btn-primary badge" style="border-radius: 4px;">More
                info</a>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-4">
          <div class="card ">
            <div class="card-header">
              <h4>Your Earnings</h4>
            </div>
            <div class="card-body">
              <div id="radialBars"></div>
              <div class="text-center mb-5">
                <h6>From last month</h6>
                <h1 class='text-green'>+$2,134</h1>
              </div>
            </div>
          </div>
          <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
              <h4 class="card-title d-flex">
                <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress
              </h4>

            </div>
            <div class="card-body px-0 py-1">
              <table class='table table-borderless'>
                <tr>
                  <td class='col-3'>UI Design</td>
                  <td class='col-6'>
                    <div class="progress progress-info">
                      <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class='col-3 text-center'>60%</td>
                </tr>
                <tr>
                  <td class='col-3'>VueJS</td>
                  <td class='col-6'>
                    <div class="progress progress-success">
                      <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class='col-3 text-center'>30%</td>
                </tr>
                <tr>
                  <td class='col-3'>Laravel</td>
                  <td class='col-6'>
                    <div class="progress progress-danger">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class='col-3 text-center'>50%</td>
                </tr>
                <tr>
                  <td class='col-3'>ReactJS</td>
                  <td class='col-6'>
                    <div class="progress progress-primary">
                      <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class='col-3 text-center'>80%</td>
                </tr>
                <tr>
                  <td class='col-3'>Go</td>
                  <td class='col-6'>
                    <div class="progress progress-secondary">
                      <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class='col-3 text-center'>65%</td>
                </tr>
              </table>
            </div>
          </div>
        </div> --}}
      </div>
    </section>
  </div>
@endsection
