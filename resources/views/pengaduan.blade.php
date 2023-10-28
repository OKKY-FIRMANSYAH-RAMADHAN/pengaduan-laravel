@extends('template.admin')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Filter : 
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option disabled selected>Berdasarkan Status</option>
                                        <option>Belum Diproses</option>
                                        <option>Diproses</option>
                                        <option>Selesai</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-4">
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option disabled selected>Berdasarkan Bulan</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-4">
                                <fieldset class="form-group">
                                    <input type="date" class="form-control flatpickr-range mb-3" placeholder="Berdasarkan Rentang Waktu">
                                </fieldset>
                            </div>
                        </div>
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
                                        <td><button class="btn btn-sm btn-warning">Diproses</button></td>
                                        <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-bs-toggle="modal"
                                            data-bs-target="#detailPengaduan">Detail</button>
                                            <button class="btn btn-sm btn-warning mt-2 mt-lg-0 mt-md-0" data-kode="1" id="tombolProses">Proses</button>
                                            <button class="btn btn-sm btn-success mt-2 mt-lg-0 mt-md-0" data-kode="1" id="tombolSelesai">Selesai</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left w-100" id="detailPengaduan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                        <div class="col-4 col-md-6 col-lg-4"><a href="javascript:void(0);" id="tombolGambar" ><img class="p-1" src="{{ asset('/assets/img/pararel.png') }}" alt="" width="120px"></a></div>
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
            <div class="modal fade text-left w-100" id="modalViewImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title white" id="myModalLabel16"></h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <img src="{{ asset('/assets') }}/img/pararel.png" alt="Face 1" class="custom-img" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    @media (max-width: 575.98px) {
        .custom-img {
            width: 350px;
        }
    }
    @media (min-width: 576px) and (max-width: 991.98px) {
        .custom-img {
            width: 450px;
        }
    }
    @media (min-width: 992px){
        .custom-img {
            width: 750px;
        }
    }
</style>

@endsection
