<table class='mt-1 table table-sm table-hover table-bordered table-striped' id="table1">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nama Lengkap</th>
      <th class="text-center">NIP</th>
      <th class="text-center">Jabatan</th>
      <th class="text-center">PAK JAN JUN</th>
      <th class="text-center">PAK JUL DES</th>
      <th class="text-center">Tahun</th>
      <th class="text-center">SKP</th>
      <th class="text-center">Verifikasi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $dpk)
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
      </tr>
    @endforeach
  </tbody>
</table>
