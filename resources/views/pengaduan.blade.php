@extends('template.admin')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <form id="filterData" method="POST">
                                @csrf
                                Filter :
                                <div class="row mt-2">
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="byStatus" name="byStatus">
                                                <option disabled selected>Status</option>
                                                <option value="0">Belum Diproses</option>
                                                <option value="1">Diproses</option>
                                                <option value="2">Selesai</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-4">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="byMonth" name="byMonth">
                                                <option disabled selected>Bulan</option>
                                                @foreach (range(1, 12) as $month)
                                                    <option value="{{ $month }}">
                                                        {{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <fieldset class="form-group">
                                            <input type="date" class="form-control flatpickr-range mb-3"
                                                placeholder="Rentang Waktu" name="byRange">
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-md-1 col-lg-1">
                                        <button type="reset" class="btn btn-danger rounded-pill" id="tombolReset">Reset</button>
                                    </div>   
                                </div>
                            </form>
                            @if (session()->has('login.user'))
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary" id="tombolBuat">Buat Pengaduan</button>
                                </div>
                            @endif
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
                                        @include('section.pengaduan_list')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Buat Pengaduan --}}
                @if (session()->has('login.user'))
                <div class="modal fade text-left w-100 none" id="buatPengaduan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title white" id="myModalLabel16">Buat Pengaduan</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah-pengaduan" class="form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Pengadu</label>
                                                <select class="form-select" id="basicSelect" name="nama_pengadu" required>
                                                    <option selected disabled>Pilih Pengadu</option>
                                                    <option value="Anonim">Disamarkan (Anonim)</option>
                                                    <option value="{{ $user['nama_user'] }}">Nama Sendiri
                                                        ({{ $user['nama_user'] }})</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="second-name-column">Tentang</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    name="tentang_pengaduan" required>
                                                <input type="hidden" id="third-name-column" class="form-control"
                                                    name="id_pengadu" value="{{ $user['id_user'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="third-name-column">Deskripsikan Lebih Lengkap</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi_pengaduan" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Upload Bukti (max 6 foto)</label>
                                                <input class="form-control" type="file" name="files[]" id="fotoMultiple"
                                                    required accept=".png, .jpg, .jpeg" multiple required>
                                            </div>
                                            <div class="row" id="imageContainer"></div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"
                                                id="submitPengaduan">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Detail --}}
                <div class="modal fade text-left w-100 none" id="detailPengaduan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
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

        @media (min-width: 992px) {
            .custom-img {
                width: 750px;
            }
        }
    </style>
@endsection
