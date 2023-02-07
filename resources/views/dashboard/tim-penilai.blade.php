@extends('layouts.dashboard')

@section('main-content')
  {{-- MODAL TAMBAH --}}
  <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title white" id="myModalLabel160">Tambah Tim Penilai</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('add.tim.penilai') }}" method="post" class="text-dark">
          @csrf
          <div class="modal-body">
            <label for="nama">Nama</label>
            <div class="form-group">
              <input name="nama" type="text" placeholder="Nama" id="nama" class="form-control" required>
            </div>
            <label for="nip">NIP</label>
            <div class="form-group">
              <input maxlength="18" name="nip" type="text" placeholder="NIP" id="nip" class="form-control"
                required>
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
          <h3>Data Tim Penilai</h3>
          <p class="text-subtitle text-muted">Menampilkan semua data.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tim Penilai</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary">Tambah
      Data</button>

    <section class="section mt-2">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
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

              <div class="table-responsive">
                <table class='table table-bordered table-striped table-hover table-sm' id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Lengkap</th>
                      <th class="text-center">NIP</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($timPenilai as $item)
                      <tr class="text-secondary">
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">{{ $item->nip }}</td>
                        <td class="text-center">
                          {{ $item->dupak_janjun->count() + $item->dupak_juldes->count() > 0 ? $item->dupak_janjun->count() + $item->dupak_juldes->count() . ' orang' : '-' }}
                        </td>
                        <td class="text-center">
                          <a href="{{ route('tim.penilai.dupak', $item->id) }}" class="btn btn-primary badge"
                            style="border-radius: 4px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-eye" viewBox="0 0 16 16">
                              <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                              <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                          </a>
                          <button type="button" class="btn btn-warning badge" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $item->id }}" style="border-radius: 4px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-pencil" viewBox="0 0 16 16">
                              <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                          </button>
                          <form action="{{ route('destroy.tim.penilai', $item->id) }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger badge" style="border-radius: 4px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                <path
                                  d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                                <path
                                  d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                              </svg></button>
                          </form>
                        </td>
                      </tr>

                      {{-- MODAL TAMBAH --}}
                      <div class="modal fade text-left" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <h5 class="modal-title white" id="myModalLabel160">Edit Tim Penilai</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <form action="{{ route('update.tim.penilai', $item->id) }}" method="post"
                              class="text-dark">
                              @csrf
                              @method('put')
                              <div class="modal-body">
                                <label for="nama">Nama</label>
                                <div class="form-group">
                                  <input value="{{ old('nama', $item->nama) }}" name="nama" type="text"
                                    placeholder="Nama" id="nama" class="form-control" required>
                                </div>
                                <label for="nip">NIP</label>
                                <div class="form-group">
                                  <input value="{{ old('nip', $item->nip) }}" maxlength="18" name="nip"
                                    type="text" placeholder="NIP" id="nip" class="form-control" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                  <i class="bx bx-x d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                  <i class="bx bx-check d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Update</span>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      {{-- END MODAL TAMBAH --}}
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
@endsection
