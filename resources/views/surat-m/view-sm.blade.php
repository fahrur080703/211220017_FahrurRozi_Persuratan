@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Surat Masuk</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="input-sm" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Surat
                </a>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title">Surat Masuk</h4>
                <div class="table-responsive-md">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">#</th>
                                <th>Nomor Surat</th>
                                <th class="col-md-1">Tanggal Surat</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th class="col-md-1">Disposisi 1</th>
                                <th class="col-md-1">Disposisi 2</th>
                                <th class="col-md-1">Tanda Tangan</th>
                                <th class="col-md-1">File</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                            <tr>
                                <td>{{ $x->id }}</td>
                                <td>{{ $x->no_surat }}</td>
                                <td>{{ $x->tanggal }}</td>
                                <td>{{ $x->asal_surat }}</td>
                                <td>{{ $x->perihal }}</td>
                                <td>{{ $x->disp1 }}</td>
                                <td>{{ $x->disp2 }}</td>
                                <td>{{ $x->id_tandatangan}}</td>
                                <td>
                                    @empty($x->image)
                                    <span class="badge badge-danger">Tidak ada</span>
                                    @else
                                    <span class="badge badge-success">Ada</span>
                                    @endempty
                                </td>
                                <td>
                                    <a type="button" href="{{ $x->file }}" class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Download File">
                                        <i class="mdi mdi-format-vertical-align-bottom"></i>
                                    </a>
                                    <a type="button" href="/edit-sm/{{ $x->id }}" class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a type="button" href="/hapus-sm/{{ $x->id }}" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Delete">
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
