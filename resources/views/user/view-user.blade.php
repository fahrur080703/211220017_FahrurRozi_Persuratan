@extends("layouts.main")

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Data User</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="/input-user" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah User</a>
            </ol>
        </nav>
    </div>

    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title">Data User</h4>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1"> # </th>
                                <th> Username </th>
                                <th> Status </th>
                                <th> Nama Petugas </th>
                                <th class="col-md-1"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                                <tr>
                                    <td>{{ $x->id_user }}</td>
                                    <td>{{ $x->username }}</td>
                                    <td>{{ $x->status }}</td>
                                    <td>{{ $x->nama_ptgs }}</td>
                                    <td>
                                        <a type="button" href="/edit-user/{{ $x->id_user }}"
                                            class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="mdi mdi-border-color"></i>
                                        </a>

                                        <a type="button" href="/hapus-user/{{ $x->id_user }}"
                                            onclick="return confirm('Apakah anda yakin menghapus data?')"
                                            class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip"
                                            data-placement="top" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sweet Alert -->
<link href="{{ asset('/thema/assets/sweetAlert/sweetalert.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<script src="{{ asset('/thema/assets/sweetAlert/sweetalert.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--Digunakan untuk alert-->
@include('sweetalert::alert')

@endsection
