<table class='mt-1 table table-sm table-hover table-bordered table-striped' id="table1">
  <thead>
    <tr>
      <th class="text-center"><strong>No</strong></th>
      <th class="text-center"><strong>Nama Lengkap</strong></th>
      <th class="text-center"><strong>NIP</strong></th>
      <th class="text-center"><strong>Jabatan</strong></th>
      <th class="text-center"><strong>Pangkat</strong></th>
      <th class="text-center"><strong>Golongan</strong></th>
      @if (request()->is('tim-penilai*'))
        <th class="text-center"><strong>Aksi</strong></th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
      <tr class="text-center text-dark">
        <td>{{ $loop->iteration }}.</td>
        <td class="text-start">{{ $item->nama }}</td>
        <td>
          @if (request()->is('tim-penilai*'))
            {{ $item->nip }}
          @else
            '{{ $item->nip }}
          @endif
        </td>
        <td>{{ $item->jabatan->nama }}</td>
        <td>{{ $item->pangkat }}</td>
        <td>{{ $item->golongan }}</td>
        @if (request()->is('tim-penilai*'))
          <td class="text-nowrap">
            <a href="{{ route('show.pkb', $item->id) }}" class="btn btn-primary badge" style="border-radius: 4px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-eye" viewBox="0 0 16 16">
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg> Lihat
            </a>
            {{-- <button class="btn btn-danger badge" style="border-radius: 4px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path
                  d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                <path
                  d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg>
            </button> --}}
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
