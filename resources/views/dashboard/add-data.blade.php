@extends('layouts.dashboard')

@section('main-content')
  <div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Input Data DUPAK</h3>
          <p class="text-subtitle text-muted">Isi data pada kolom yang disediakan.</p>
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

    <div class="col-md-12">
      <div class="d-flex mb-2 justify-content-between">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        {{-- <div>
          <button style="transition: .3s;" class="btn btn-secondary" id="modeEdit" onclick="modeEdit()">Edit
            mode</button>
          <button style="transition: .3s;" class="btn btn-secondary" id="modeEditOff" disabled
            onclick="modeEditOff()">Selesai</button>
        </div> --}}
      </div>

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card">
        <div class="card-body">
          <form action="{{ route('store.dupak') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input style="transition: .3s;" name="nama" type="text"
                    class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}"
                    required>
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input style="transition: .3s;" name="nip" type="text"
                    class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ old('nip') }}"
                    required maxlength="18">
                  @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="jabatan_id">Jabatan</label>
                  <select style="transition: .3s;" required name="jabatan_id"
                    class="form-select @error('jabatan_id') is-invalid @enderror" id="jabatan_id">
                    <option value="">Pilih jabatan</option>
                    @foreach ($jabatan as $jbt)
                      <option value="{{ $jbt->id }}" @if (old('jabatan_id') == $jbt->id) selected @endif>
                        {{ $jbt->nama }}</option>
                    @endforeach
                  </select>
                  @error('jabatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="pangkat">Pangkat</label>
                  <input style="transition: .3s;" placeholder="-" name="pangkat" type="text"
                    class="form-control @error('pangkat') is-invalid @enderror" id="pangkat"
                    value="{{ old('pangkat') }}" required>
                  @error('pangkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="golongan">Golongan</label>
                  <input style="transition: .3s;" placeholder="-" name="golongan" type="text"
                    class="form-control text-uppercase @error('golongan') is-invalid @enderror" id="golongan"
                    value="{{ old('golongan') }}" required>
                  @error('golongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="pak_janjun">PAK JAN JUN</label>
                  <select style="transition: .3s;" name="pak_janjun"
                    class="form-select @error('pak_janjun') is-invalid @enderror" id="pak_janjun">
                    <option value="">Pilih ...</option>
                    @foreach ($timPenilai as $item)
                      <option value="{{ $item->id }}" @if (old('pak_janjun') == $item->id) selected @endif>
                        {{ $item->nama }}</option>
                    @endforeach
                  </select>
                  @error('pak_janjun')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="pak_juldes">PAK JUL DES</label>
                  <select style="transition: .3s;" name="pak_juldes"
                    class="form-select @error('pak_juldes') is-invalid @enderror" id="pak_juldes">
                    <option value="">Pilih ...</option>
                    @foreach ($timPenilai as $item)
                      <option value="{{ $item->id }}" @if (old('pak_juldes') == $item->id) selected @endif>
                        {{ $item->nama }}</option>
                    @endforeach
                  </select>
                  @error('pak_juldes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="kota">Kabupaten / Kota</label>
                  <select style="transition: .3s;" required name="kota"
                    class="form-select @error('kota') is-invalid @enderror" id="kota">
                    <option value="">Pilih kabupaten / kota</option>
                    @foreach ($kab_kota as $item)
                      <option value="{{ $item->name }}" @if (old('kota') == $item->name) selected @endif>
                        {{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('kota')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun">Tahun</label>
                      <input style="transition: .3s;" required name="tahun" type="number"
                        class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Tahun"
                        value="{{ old('tahun') }}" maxlength="4">
                      @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="skp">Sasaran Kinerja Pegawai</label>
                      <div class="form-check">
                        <input @if (old('skp') == 1) checked @endif value="1" name="skp"
                          class="form-check-input" type="checkbox" id="skp">
                        <label class="form-check-label" for="skp">
                          SKP
                        </label>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="verifikasi">Status Verifikasi</label>
                      <div class="form-check">
                        <input @if (old('verifikasi') == 1) checked @endif value="1" name="verifikasi"
                          class="form-check-input" type="checkbox" id="verifikasi">
                        <label class="form-check-label" for="verifikasi">
                          Terverifikasi
                        </label>
                      </div>
                    </div>
                    <hr>
                  </div>
                </div>

                <div class="mt-3">
                  <button style="transition: .3s;" id="submit" type="submit"
                    class="btn btn-primary">Tambah</button>
                  <button style="transition: .3s;" id="reset" type="reset" class="btn btn-danger">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- JAVASCRIPT --}}
  <script>
    const nama = document.querySelector('#nama');
    const nip = document.querySelector('#nip');
    const jabatan_id = document.querySelector('#jabatan_id');
    const pangkat = document.querySelector('#pangkat');
    const golongan = document.querySelector('#golongan');
    const pak_janjun = document.querySelector('#pak_janjun');
    const pak_juldes = document.querySelector('#pak_juldes');
    const tahun = document.querySelector('#tahun');
    const kota = document.querySelector('#kota');

    const btnEdit = document.querySelector('#modeEdit');
    const btnEditOff = document.querySelector('#modeEditOff');
    const btnSubmit = document.querySelector('#submit');
    const btnReset = document.querySelector('#reset');

    function modeEdit() {
      nama.readOnly = false;
      nip.readOnly = false;
      pangkat.readOnly = false;
      golongan.readOnly = false;
      tahun.readOnly = false;

      jabatan_id.removeAttribute('disabled');
      pak_janjun.removeAttribute('disabled');
      pak_juldes.removeAttribute('disabled');
      kota.removeAttribute('disabled');

      btnEdit.setAttribute('disabled', '');
      btnEditOff.removeAttribute('disabled');
      // btnSubmit.removeAttribute('disabled');
      btnReset.removeAttribute('disabled');
    }

    function modeEditOff() {
      nama.readOnly = true;
      nip.readOnly = true;
      pangkat.readOnly = true;
      golongan.readOnly = true;
      tahun.readOnly = true;

      jabatan_id.setAttribute('disabled', '');
      pak_janjun.setAttribute('disabled', '');
      pak_juldes.setAttribute('disabled', '');
      kota.setAttribute('disabled', '');

      btnEdit.removeAttribute('disabled');
      btnEditOff.setAttribute('disabled', '');
      // btnSubmit.setAttribute('disabled', '');
      btnReset.setAttribute('disabled', '');
    }
  </script>
@endsection
