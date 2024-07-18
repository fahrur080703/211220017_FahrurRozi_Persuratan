@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Tambah Surat Keluar</h3>
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
                <h4 class="card-title">Tambah Surat Keluar</h4>
                <form method="POST" action="{{ url('save-sk') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_surat">ID Surat</label>
                        <input type="text" class="form-control @error('id_surat') is-invalid @enderror" id="id_surat" name="id_surat" value="{{ old('id_surat') }}">
                        @error('id_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Surat</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" name="no_surat" value="{{ old('no_surat') }}">
                        @error('no_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}">
                        @error('perihal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') }}">
                        @error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_surat">Isi Surat</label>
                        <textarea class="form-control @error('isi_surat') is-invalid @enderror" id="isi_surat" name="isi_surat" rows="4">{{ old('isi_surat') }}</textarea>
                        @error('isi_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kop">Kepala Surat</label>
                        <select class="form-control" id="id_kop" name="id_kop">
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
                        <label for="id_tandatangan">Tanda Tangan</label>
                        <select class="form-control @error('id_tandatangan') is-invalid @enderror" id="id_tandatangan" name="id_tandatangan">
                            <option value="">-- Pilih Tanda Tangan --</option>
                            @foreach ($tandatangan as $ttd)
                            <option value="{{ $ttd->id_tandatangan }}">{{ $ttd->nama_tandatgn }}</option>
                            @endforeach
                        </select>
                        @error('id_tandatangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
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
                        <label>File Surat (PDF, max 2MB)</label>
                        <input type="file" name="image" class="file-upload-default" id="image">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @error('image')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                    <a href="/view-sk" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
