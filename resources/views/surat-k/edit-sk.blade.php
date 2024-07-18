@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Surat Keluar</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="/view-sk" type="button" class="btn btn-danger btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-arrow-left btn-icon-prepend"></i>Kembali
                </a>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Surat Keluar</h4>
                <form method="POST" action="{{ url('update-sk', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal Surat</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" name="no_surat" value="{{ old('no_surat', $data->no_surat) }}">
                        @error('no_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal', $data->perihal) }}">
                        @error('perihal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan', $data->tujuan) }}">
                        @error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_surat">Isi Surat</label>
                        <textarea class="form-control @error('isi_surat') is-invalid @enderror" id="isi_surat" name="isi_surat" rows="4">{{ old('isi_surat', $data->isi_surat) }}</textarea>
                        @error('isi_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Kepala Surat</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="id_kop" value="{{ old('id_kop') }}">
                            <option selected disabled>Pilih Kepala Surat</option>
                            @foreach ($kepala as $x)
                            <option value="{{ $x->id_kop }}">{{ $x->nama_kop }}</option>
                            @endforeach
                        </select>
                        @error('id_kop')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Tanda Tangan</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="id_tandatangan"
                            value="{{ old('id_tandatangan') }}">
                            <option selected disabled>Pilih Tanda Tangan</option>
                            @foreach ($tandatangan as $x)
                                <option value="{{ $x->id_tandatangan }}">{{ $x->nama_tandatgn }}</option>
                            @endforeach
                        </select>
                        @error('id_tandatangan')
                            <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input type="text" class="form-control @error('id_user') is-invalid @enderror" id="id_user" name="id_user" value="{{ auth()->user()->id_user }}" readonly>
                        @error('id_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File Surat (PDF, max 2MB)</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <a href="/view-sk" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
