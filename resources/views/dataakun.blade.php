@extends('template.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar avatar-2xl">
                                        <img src="{{ asset('/assets') }}/compiled/jpg/2.jpg" alt="Avatar" id="gambarAwal">
                                    </div>
                                    <input type="file" id="fileInput" style="display: none;">
                                    <a class="mt-3" href="javascript:void(0);" id="gantiGambar">Ganti Gambar</a>
                                    <h3 class="mt-3">John Doe</h3>
                                    <p class="text-small">Junior Software Engineer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" id="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Username</label>
                                        <input type="text" name="text" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <a href="javascript:void(0);" id="tombolGantiPassword">Ganti Password</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade text-left w-100" id="modalGantiPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title white" id="myModalLabel16">Ganti Password</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password-id-icon">Password Lama</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Password Lama"
                                                                id="password-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password-id-icon">Password Baru</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Password Baru"
                                                                id="password-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password-id-icon">Konfirmasi Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Konfirmasi Password"
                                                                id="password-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
</div>

@endsection