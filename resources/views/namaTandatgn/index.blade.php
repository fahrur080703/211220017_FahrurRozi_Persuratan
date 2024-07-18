@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Daftar Nama Tanda Tangan</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ url('input-nama-tandatgn') }}" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi-plus btn-icon-prepend"></i>Tambah Nama Tanda Tangan
                </a>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title">Daftar Nama Tanda Tangan</h4>
                <div class="table-responsive-md">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tanda Tangan</th>
                                <th>Jabatan</th>
                                <th>NIP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($namaTandatgns as $tandatgn)
                            <tr>
                                <td>{{ $tandatgn->id_tandatangan }}</td>
                                <td>{{ $tandatgn->nama_tandatgn }}</td>
                                <td>{{ $tandatgn->jabatan }}</td>
                                <td>{{ $tandatgn->nip }}</td>
                                <td>
                                    <a href="{{ url('/edit-nama-tandatgn/'.$tandatgn->id_tandatangan) }}" class="btn-sm btn-inverse-dark btn-rounded m-lg-1">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a href="{{ url('/hapus-nama-tandatgn/'.$tandatgn->id_tandatangan) }}" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn-sm btn-inverse-danger btn-rounded m-lg-1">
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
@include('sweetalert::alert')
@endsection
