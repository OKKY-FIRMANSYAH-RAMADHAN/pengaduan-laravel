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
                                    <tr>
                                        <td>1</td>
                                        <td>19 Oktober 2023</td>
                                        <td>Pencurian</td>
                                        <td><button class="btn btn-sm btn-secondary">Belum Diproses</button></td>
                                        <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-bs-toggle="modal"
                                            data-bs-target="#xlarge">Detail</button>
                                            <button class="btn btn-sm btn-warning mt-2 mt-lg-0 mt-md-0" data-kode="1" id="tombolProses">Proses</button>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left w-100" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title white" id="myModalLabel16">Detail Pengaduan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Nama Pengadu</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    Oky Firmansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Status Pengaduan</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    Oky Firmansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Tanggal Pengaduan</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    Oky Firmansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Perihal</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    Oky Firmansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Rincian</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    Oky Firmansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Foto Bukti</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-4 col-md-6 col-lg-4"><a href="javascript:void(0);" onclick="alert('Gambar diklik!');"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></a></div>
                                        <div class="col-4 col-md-6 col-lg-4"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></div>
                                        <div class="col-4 col-md-6 col-lg-4"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></div>
                                        <div class="col-4 col-md-6 col-lg-4"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></div>
                                        <div class="col-4 col-md-6 col-lg-4"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></div>
                                        <div class="col-4 col-md-6 col-lg-4"><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></div>
                                    </div>
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
                    @foreach ($user_nonverif as $data)
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('assets') }}/uploads/foto_user/{{ $data['foto_user'] }}" />
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $data['nama_user'] }}</h5>
                                <h6 class="text-muted mb-0">@<?= $data['username'] ?></h6>
                            </div>
                        </div>
                    @endforeach
                    <div class="px-4">
                        <a class="btn btn-block btn-sm btn-outline-primary font-bold mt-3" href="">List Verifikasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection