@extends('template.admin')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-9">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Pengaduan Baru
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Tentang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduan_baru as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ date('d F Y', strtotime($data['created_at'])) }}</td>
                                            <td>{{ $data['tentang_pengaduan'] }}</td>
                                            <td><button class="btn btn-sm btn-secondary">Belum Diproses</button></td>
                                            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}"
                                                id="tombolDetail">Detail</button>
                                                <button class="btn btn-sm btn-warning mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_pengaduan'] }}" id="tombolProses">Proses</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Detail --}}
            <div class="modal fade text-left w-100 none" id="detailPengaduan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title white" id="myModalLabel16">Detail Pengaduan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Nama Pengadu</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="detail_nama"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Status Pengaduan</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="detail_status"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Tanggal Pengaduan</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="detail_tanggal"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Perihal</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="detail_perihal"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Rincian</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="detail_rincian"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Foto Bukti</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    <div class="row" id="imageContainerDetail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- View Image --}}
            <div class="modal fade text-left w-100" id="modalViewImage" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title white" id="myModalLabel16"></h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <img id="gambarDetail" alt="Face 1" class="custom-img" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Permintaan Verifikasi</h4>
                </div>
                <div class="card-content pb-4">
                    @if (count($user_nonverif) === 0)
                        <div class="recent-message d-flex px-4 py-3">
                            <h5 class="text-center">Tidak Ada Data</h5>
                        </div>
                    @endif
                    @foreach ($user_nonverif as $data)
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('storage') }}/foto_user/{{ $data['foto_user'] }}" />
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $data['nama_user'] }}</h5>
                                <h6 class="text-muted mb-0">@<?= $data['username'] ?></h6>
                            </div>
                        </div>
                    @endforeach

                    <div class="px-4">
                        <a class="btn btn-block btn-sm btn-outline-primary font-bold mt-3" href="/admin/user/nonverif">List Verifikasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
