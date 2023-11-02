@foreach ($pengaduan as $data)
    <tr>
        <td>1</td>
        <td>{{ date('d F Y', strtotime($data['created_at'])) }}</td>
        <td>{{ $data['tentang_pengaduan'] }}</td>
        @if (session()->has('login.user'))
            @if ($data['status_pengaduan'] == 0)
                <td><button class="btn btn-sm btn-secondary">Belum Diproses</button></td>
                <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                        id="tombolDetail">Detail</button>
                    <button class="btn btn-sm btn-danger mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                        id="tombolHapus">Hapus</button>
                </td>
            @elseif($data['status_pengaduan'] == 1)
                <td><button class="btn btn-sm btn-warning">Diproses</button></td>
                <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                        id="tombolDetail">Detail</button>
                </td>
            @elseif($data['status_pengaduan'] == 2)
                <td><button class="btn btn-sm btn-success">Selesai</button></td>
                <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                        id="tombolDetail">Detail</button></td>
            @endif
        @endif
    </tr>
@endforeach
