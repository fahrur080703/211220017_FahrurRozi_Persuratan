@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Kepala Surat</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="/input-ks" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Kepala Surat
                </a>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title">Kepala Surat</h4>
                <div class="table-responsive-md">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">#</th>
                                <th>Nama Kop</th>
                                <th>Alamat Kop</th>
                                <th>Nama Tujuan</th>
                                <th>ID User</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                            <tr>
                                <td>{{ $x->id_kop }}</td>
                                <td>{{ $x->nama_kop }}</td>
                                <td>{{ $x->alamat_kop }}</td>
                                <td>{{ $x->nama_tujuan }}</td>
                                <td>{{ $x->id_user }}</td>
                                <td>
                                    <a type="button" href="/edit-ks/{{ $x->id_kop }}" class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a type="button" href="/hapus-ks/{{ $x->id_kop }}" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Delete">
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
