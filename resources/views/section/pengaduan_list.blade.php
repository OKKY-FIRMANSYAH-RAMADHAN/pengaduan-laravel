@foreach ($pengaduan as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ date('d F Y', strtotime($data['created_at'])) }}</td>
        <td>{{ $data['tentang_pengaduan'] }}</td>
        @if ($data['status_pengaduan'] == 0)
            <td><button class="btn btn-sm btn-secondary">Belum Diproses</button></td>
            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                    id="tombolDetail">Detail</button>
                @if (session()->has('login.user'))
                    <button class="btn btn-sm btn-danger mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                        id="tombolHapus">Hapus</button>
                @elseif(session()->has('login.admin'))
                <button class="btn btn-sm btn-warning mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}" id="tombolProses">Proses</button>
                @endif
            </td>
        @elseif ($data['status_pengaduan'] == 1)
            <td><button class="btn btn-sm btn-warning">Diproses</button></td>
            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                    id="tombolDetail">Detail</button>
                @if(session()->has('login.admin'))
                    <button class="btn btn-sm btn-success mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}" id="tombolSelesai">Selesaikan</button>
                @endif
            </td>
        @elseif ($data['status_pengaduan'] == 2)
            <td><button class="btn btn-sm btn-success">Selesai</button></td>
            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                id="tombolDetail">Detail</button></td>
        @endif
    </tr>
@endforeach
