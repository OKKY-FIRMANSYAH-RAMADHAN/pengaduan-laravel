@extends('template.admin')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['nama_user'] }}</td>
                                            <td>{{ $data['email_user'] }}</td>
                                            <td><button class="btn btn-sm btn-success">Aktif</button></td>
                                            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_user'] }}" id="btnDetailUser">Detail</button>
                                                <button class="btn btn-sm btn-danger mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_user'] }}" id="tombolHapusUser">Hapus</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left w-100" id="detailUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title white" id="myModalLabel16">Detail User</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <div class="avatar avatar-3xl">
                                        <img src="{{ asset('/assets') }}/compiled/jpg/1.jpg" id="fotoUser" alt="Face 1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Nama</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="nama_user"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Username</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="username"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Email</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6" id="email_user"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 fw-bold">Kartu Identias</div>
                                <div class="col-md-1 d-none d-md-block">:</div>
                                <div class="col-md-6">
                                    <a href="javascript:void(0);" id="viewIdentitas">Klik Disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="modal fade text-left w-100" id="modalIdentitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
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
                                    <img src="{{ asset('/assets') }}/img/pararel.png" id="fotoIdentitas" alt="Face 1" width="400px" />
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