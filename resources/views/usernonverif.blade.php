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
                                        <th>Identitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['nama_user'] }}</td>
                                            <td>{{ $data['email_user'] }}</td>
                                            <td><a href="javascript:void(0);" data-kode="{{ $data['identitas_user'] }}" id="viewIdentitas">Klik Disini</a></td>
                                            <td><button class="btn btn-sm btn-primary mt-2 mt-lg-0 mt-md-0" data-kode="{{ $data['id_user'] }}" id="tombolSetujuUser">Setujui</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
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
                                    <img id="fotoIdentitas" alt="Face 1" width="400px" />
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