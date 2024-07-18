@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Surat Keluar</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="/input-sk" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Surat
                </a>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title">Surat Keluar</h4>
                <div class="table-responsive-md">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">#</th>
                                <th class="col-md-2">Tanggal</th>
                                <th class="col-md-3">No Surat</th>
                                <th class="col-md-4">Perihal</th>
                                <th class="col-md-3">Tujuan</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($row->tanggal)) }}</td>
                                <td>{{ $row->no_surat }}</td>
                                <td>{{ $row->perihal }}</td>
                                <td>{{ $row->tujuan }}</td>
                                <td>
                                    <a type="button" href="{{ $row->file }}" class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Download File">
                                        <i class="mdi mdi-format-vertical-align-bottom"></i>
                                    </a>
                                    <a type="button" href="/edit-sk/{{ $row->id }}" class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a type="button" href="/hapus-sk/{{ $row->id }}" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                                {{-- <td>
                                    <a href="{{ url('detail-sk', $row->id) }}" title="Lihat Data"><i class="mdi mdi-eye"></i></a>
                                    <a href="{{ url('edit-sk', $row->id) }}" title="Edit Data"><i class="mdi mdi-pencil"></i></a>
                                    <a href="{{ url('hapus-sk', $row->id) }}" onclick="return confirm('Yakin akan dihapus?')" title="Hapus Data"><i class="mdi mdi-delete"></i></a>
                                    <a href="{{ url('unduh', $row->id) }}" title="Unduh Surat"><i class="mdi mdi-download"></i></a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
