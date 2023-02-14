@extends('layouts.dashboard')

@section('main-content')
  {{-- MODAL TAMBAH --}}
  <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title white" id="myModalLabel160">Tambah Data DUPAK</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('store.data_dupak') }}" method="post" class="text-dark">
          @csrf
          <input type="hidden" name="pkb_id" value="{{ $data->id }}">
          <div class="modal-body">
            <label for="pak_janjun">Penilai PAK JANJUN</label>
            <div class="form-group">
              <select name="pak_janjun" id="pak_janjun" class="form-select">
                <option value="">Pilih ...</option>
                @foreach ($timPenilai as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <label for="pak_juldes">Penilai PAK JULDES</label>
            <div class="form-group">
              <select name="pak_juldes" id="pak_juldes" class="form-select">
                <option value="">Pilih ...</option>
                @foreach ($timPenilai as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <label for="tahun">Tahun</label>
            <div class="form-group">
              <input name="tahun" maxlength="4" required type="text" class="form-control" placeholder="Tahun">
            </div>
            <label for="tahun">Status Verifikasi</label>
            <div class="form-check">
              <input name="verifikasi_pak_janjun" class="form-check-input" type="checkbox" value="1"
                id="verifikasi_pak_janjun">
              <label class="form-check-label" for="verifikasi_pak_janjun">
                PAK JANJUN
              </label>
            </div>
            <div class="form-check">
              <input name="verifikasi_pak_juldes" class="form-check-input" type="checkbox" value="1"
                id="verifikasi_pak_juldes">
              <label class="form-check-label" for="verifikasi_pak_juldes">
                PAK JULDES
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Tambah</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- END MODAL TAMBAH --}}

  <div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Data Pegawai</h3>
          <p class="text-subtitle text-muted">Menampilkan data pegawai.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data PKB</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    @if (str_contains($cekURL, 'tim-penilai'))
      <a href="{{ route('tim.penilai') }}" class="btn btn-secondary mb-2">Kembali</a>
    @else
      <a href="{{ route('data.pkb') }}" class="btn btn-secondary mb-2">Kembali</a>
    @endif
    {{-- @if (session('success'))
      <div class="alert alert-success">
        <h4 class="alert-heading">Berhasil</h4>
        <p>{!! session('success') !!}</p>
      </div>
    @endif
    @if (session('danger'))
      <div class="alert alert-danger">
        <h4 class="alert-heading">Gagal</h4>
        <p>{!! session('danger') !!}</p>
      </div>
    @endif
    @error('file')
      <div class="alert alert-danger">
        <h4 class="alert-heading">Gagal</h4>
        <p>{{ $message }}</p>
      </div>
    @enderror --}}
    {{-- ALERT --}}
    @if (session('success'))
      <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session('danger'))
      <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! session('danger') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @error('file')
      <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! $message !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror
    {{-- END ALERT --}}


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">

          @push('script')
            <script>
              const btnEditProfil = document.querySelector('#btnEditProfil');
              const btnUpdateProfil = document.querySelector('#btnUpdateProfil');
              const nama = document.querySelector('#nama');
              const nip = document.querySelector('#nip');
              const jabatan_id = document.querySelector('#jabatan_id');
              const pangkat = document.querySelector('#pangkat');
              const golongan = document.querySelector('#golongan');
              const kota = document.querySelector('#kota');

              btnEditProfil.addEventListener("click", () => {
                btnUpdateProfil.toggleAttribute("disabled");
                nama.toggleAttribute("disabled");
                nip.toggleAttribute("disabled");
                jabatan_id.toggleAttribute("disabled");
                pangkat.toggleAttribute("disabled");
                golongan.toggleAttribute("disabled");
                kota.toggleAttribute("disabled");
              });
            </script>
          @endpush
          <form action="{{ route('update.pkb', $data->id) }}" method="post">
            {{ csrf_field() }}
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Profil Pegawai</h4>
                <div>
                  <button id="btnEditProfil" class="btn btn-warning badge" type="button" style="border-radius: 4px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="feather feather-edit">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                  </button>
                  <button id="btnUpdateProfil" disabled class="btn btn-danger badge"
                    style="border-radius: 4px; height: 30px;">
                    Update
                  </button>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Nama Lengkap</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input style="transition: .5s;" disabled required type="text" id="nama"
                          class="form-control" name="nama" placeholder="Nama Lengkap"
                          value="{{ old('nama', $data->nama) }}">
                      </div>
                      <div class="col-md-4">
                        <label>NIP</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input style="transition: .5s;" disabled required value="{{ old('nip', $data->nip) }}"
                          type="text" id="nip" class="form-control" name="nip" placeholder="NIP"
                          maxlength="18">
                      </div>
                      <div class="col-md-4">
                        <label>Jabatan</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select style="transition: .5s;" disabled required name="jabatan_id" id="jabatan_id"
                          class="form-select text-dark">
                          <option value="">Pilih ...</option>
                          @foreach ($jabatan as $item)
                            <option @if (old('jabatan_id', $data->jabatan_id) == $item->id) selected @endif value="{{ $item->id }}">
                              {{ $item->nama }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label>Pangkat / Golongan</label>
                      </div>
                      <div class="col-md-4 form-group">
                        <input style="transition: .5s;" disabled required value="{{ old('pangkat', $data->pangkat) }}"
                          type="text" id="pangkat" class="form-control" name="pangkat" placeholder="Pangkat">
                      </div>
                      <div class="col-md-4 form-group">
                        <input style="transition: .5s;" disabled required
                          value="{{ old('golongan', $data->golongan) }}" type="text" id="golongan"
                          class="form-control" name="golongan" placeholder="Golongan">
                      </div>

                      <div class="col-md-4">
                        <label>Kabupaten / Kota</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select style="transition: .5s;" disabled name="kota" id="kota"
                          class="form-select text-dark">
                          <option value="">Pilih ...</option>
                          @foreach ($kab_kota as $kota)
                            <option @if (old('jabatan_id', $data->kota) == $kota->name) selected @endif value="{{ $kota->name }}">
                              {{ $kota->name }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>

        </div>

        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Dukung</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="btn-group dropend me-1 mb-1">
                  <button type="button" class="btn btn-secondary dropdown-toggle me-1" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Pilih tahun
                  </button>
                  <button onclick="window.location.href='{{ route('show.pkb', $data->id) }}'" class="btn btn-white">
                    Reset
                  </button>

                  <div class="dropdown-menu">
                    <h6 class="dropdown-header">Pilih</h6>
                    @foreach ($data->data_dupak as $item)
                      <form action="{{ route('show.pkb', $data->id, $item->tahun) }}" method="get">
                        <input type="hidden" name="tahun" value="{{ $item->tahun }}">
                        <button type="submit" class="dropdown-item">{{ $item->tahun }}</button>
                      </form>
                    @endforeach
                  </div>
                </div>

                <form action="{{ route('upload.data_dukung') }}" method="post" enctype="multipart/form-data"
                  class="form form-horizontal mt-2">
                  {{ csrf_field() }}
                  <div class="form-body">
                    <div class="row">

                      <div class="col-12">
                        <div class="form-group has-icon-left">
                          <div class="position-relative">
                            <input type="hidden" name="tahun" value="{{ request()->tahun }}">
                            <input type="hidden" name="pkb_id" value="{{ $data->id }}">
                            @php
                              $cekFile = App\Models\DataDupak::where('pkb_id', $data->id)
                                  ->where('tahun', request()->tahun)
                                  ->get()
                                  ->first();
                            @endphp
                            @if ((request()->tahun && $cekFile == null) || $cekFile != null)
                              <input name="file" type="file" class="form-control" id="file"
                                style="cursor: pointer;">
                            @else
                              <input name="file" type="file" class="form-control" id="file" disabled
                                style="cursor: not-allowed;">
                            @endif

                            <div class="form-control-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                              </svg>
                            </div>
                          </div>
                        </div>
                        <div class="text-form mt-2">Pilih tahun sebelum upload. Ukuran file maksimal 20Mb format .pdf.
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-end mt-3">

                        @if (!request()->has('tahun') || $cekFile->file != null)
                          <button type="button" disabled class="btn btn-danger me-1 mb-1">Upload</button>
                          <button type="button" disabled class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        @else
                          <button type="submit" class="btn btn-danger me-1 mb-1">Upload</button>
                          <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        @endif
                      </div>

                      <div class="col-12">
                        <h6>Tahun : {{ request()->tahun ?? '-' }}</h6>

                        @php
                          
                        @endphp
                        @if (request()->has('tahun'))
                          @php
                            // cek kalo ada data file
                            $dupak = App\Models\DataDupak::where('pkb_id', $data->data_dupak->first()->pkb_id)
                                ->where('tahun', request()->tahun)
                                ->get()
                                ->first();
                          @endphp
                          @if ($dupak->file != null)
                            <!--<a href="{{ route('lihat.data_dukung', [request()->tahun, $data->id]) }}" target="_blank"-->
                            <!--  class="btn btn-primary">-->
                            <!--  Lihat Data-->
                            <!--</a>-->
                            @php
                              $pdf = App\Models\DataDupak::where('tahun', request()->tahun)->where('pkb_id', $data->id)->get()->first();
                            @endphp
                            <a href="{{ url("storage/$pdf->file") }}" target="_blank"
                              class="btn btn-primary">
                              Lihat Data
                            </a>
                            <a onclick="return confirm('Hapus data dukung?')"
                              href="{{ route('delete.data_dukung', [$dupak->pkb_id, request()->tahun]) }}"
                              class="btn btn-danger">
                              Hapus Data
                            </a>
                          @else
                            <button disabled class="btn btn-primary">
                              Lihat Data
                            </button>
                            <button disabled class="btn btn-danger">
                              Hapus Data
                            </button>
                          @endif
                        @else
                          <button disabled class="btn btn-primary">
                            Lihat Data
                          </button>
                          <button disabled class="btn btn-danger">
                            Hapus Data
                          </button>
                        @endif
                        {{-- @else --}}
                        {{-- <button disabled class="btn btn-primary">
                            Lihat Data
                          </button>
                        @endif --}}
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data DUPAK</h4>
            </div>
            <div class="card-content">
              <div class="card-body">

                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#primary">Tambah
                  Data</button>

                <table class='mt-1 table table-sm table-hover table-bordered table-striped' id="table">
                  <thead>
                    <tr>
                      <th class="text-center"><strong>No</strong></th>
                      <th class="text-center"><strong>PAK JANJUN</strong></th>
                      <th class="text-center"><strong>Verifikasi</strong></th>
                      <th class="text-center"><strong>PAK JULDES</strong></th>
                      <th class="text-center"><strong>Verifikasi</strong></th>
                      <th class="text-center"><strong>Tahun</strong></th>
                      @if (!request()->is('data-pkb/export'))
                        <th class="text-center"><strong>Aksi</strong></th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($data->data_dupak as $dupak)
                      <tr class="text-center text-dark">
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $dupak->penilai_pak_janjun->nama ?? '-' }}</td>
                        <td>{!! $dupak->verifikasi_pak_janjun ? '&#10004;' : '-' !!}</td>
                        <td>{{ $dupak->penilai_pak_juldes->nama ?? '-' }}</td>
                        <td>{!! $dupak->verifikasi_pak_juldes ? '&#10004;' : '-' !!}</td>
                        <td>{{ $dupak->tahun ?? '-' }}</td>
                        <td>
                          <button data-bs-toggle="modal" data-bs-target="#edit{{ $dupak->id }}"
                            class="btn btn-primary badge" style="border-radius: 4px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-edit">
                              <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                              <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg> Edit
                          </button>
                          <form action="{{ route('destroy.data_dupak', $dupak->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Hapus data DUPAK?')" type="submit"
                              class="btn btn-danger badge" style="border-radius: 4px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                <path
                                  d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                                <path
                                  d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                              </svg> Hapus
                            </button>
                          </form>
                        </td>
                      </tr>

                      {{-- MODAL TAMBAH --}}
                      <div class="modal fade text-left" id="edit{{ $dupak->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <h5 class="modal-title white" id="myModalLabel160">Edit Data DUPAK</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <form action="{{ route('update.data_dupak') }}" method="post" class="text-dark">
                              @csrf
                              @method('put')
                              <input type="hidden" name="dupak_id" value="{{ $dupak->id }}">
                              <div class="modal-body">
                                <label for="pak_janjun" class="text-dark">PAK JANJUN</label>
                                <div class="form-group">
                                  <select name="pak_janjun" id="pak_janjun" class="form-select text-dark">
                                    <option value="">Pilih ...</option>
                                    @foreach ($timPenilai as $item)
                                      <option @if (old('pak_janjun', $dupak->pak_janjun) == $item->id) selected @endif
                                        value="{{ $item->id }}">
                                        {{ $item->nama }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <label for="pak_juldes" class="text-dark">PAK JULDES</label>
                                <div class="form-group">
                                  <select name="pak_juldes" id="pak_juldes" class="form-select text-dark">
                                    <option value="">Pilih ...</option>
                                    @foreach ($timPenilai as $item)
                                      <option @if (old('pak_juldes', $dupak->pak_juldes) == $item->id) selected @endif
                                        value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <label for="tahun" class="text-dark">Tahun</label>
                                <div class="form-group">
                                  <input value="{{ old('tahun', $dupak->tahun) }}" name="tahun" maxlength="4"
                                    required type="text" class="form-control text-dark" placeholder="Tahun">
                                </div>
                                <label for="verifikasi" class="text-dark">Status Verifikasi</label>
                                <div class="form-check">
                                  <input @if (old('verifikasi_pak_janjun', $dupak->verifikasi_pak_janjun) == 1) checked @endif name="verifikasi_pak_janjun"
                                    class="form-check-input" type="checkbox" value="1"
                                    id="verifikasi_pak_janjun">
                                  <label class="form-check-label" for="verifikasi_pak_janjun">
                                    PAK JANJUN
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input @if (old('verifikasi_pak_juldes', $dupak->verifikasi_pak_juldes) == 1) checked @endif name="verifikasi_pak_juldes"
                                    class="form-check-input" type="checkbox" value="1"
                                    id="verifikasi_pak_juldes">
                                  <label class="form-check-label" for="verifikasi_pak_juldes">
                                    PAK JULDES
                                  </label>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                  <i class="bx bx-x d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                  <i class="bx bx-check d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Update</span>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      {{-- END MODAL TAMBAH --}}
                    @empty
                      <tr>
                        <td class="text-center" colspan="7">Belum ada data.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
  </div>
@endsection
