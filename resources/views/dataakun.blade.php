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
                                        <img src="{{ asset('storage') }}/foto_user/{{$user->foto_user}}" alt="Avatar" id="gambarAwal">
                                    </div>
                                    <form id="ubahGambar" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{$user['id_user']}}">
                                        <input type="file" name="gambarBaru" id="fileInput" style="display: none;">
                                    </form>
                                    <a class="mt-3" href="javascript:void(0);" id="gantiGambar">Ganti Gambar</a>
                                    <h3 class="mt-3">{{$user['nama_user']}}</h3>
                                    <p class="text-small">
                                        @if ($user['role_user'] == 1)
                                            User
                                        @else
                                            Administrator
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="form-update-user" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="nama_user" id="nama" class="form-control" value="{{$user['nama_user']}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{$user['username']}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email_user" id="email" class="form-control" value="{{$user['email_user']}}">
                                    </div>
                                    <div class="form-group">
                                        <a href="javascript:void(0);" id="tombolGantiPassword">Ganti Password</a>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id_user" value="{{$user['id_user']}}">
                                        <button type="submit" id="submitDetail" class="btn btn-primary">Ubah Data</button>
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
                                    <form class="form form-vertical" method="post" id="form-ganti-password">
                                        @csrf
                                        <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password-id-icon">Password Lama</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control" placeholder="Password Lama"
                                                                    id="password-id-lama" name="passwordLama">
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
                                                                    id="password-id-baru" name="passwordBaru">
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
                                                                    id="password-id-konfirmasi" name="passwordKonfirmasi">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <input type="hidden" name="id_user" value="{{$user['id_user']}}">
                                                        <button type="submit" id="submitChangePassword" class="btn btn-primary me-1 mb-1">Ganti Password</button>
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
