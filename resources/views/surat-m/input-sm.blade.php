@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Tambah Surat Masuk</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Surat Masuk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Surat Masuk</li>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Surat Masuk</h4>
                <form class="forms-sample" method="POST" action="/save-sm" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                        <label for="tanggal">Tanggal Surat</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Nomor Surat" value="{{ old('no_surat') }}">
                        @error('no_surat')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asal_surat">Asal Surat</label>
                        <input type="text" name="asal_surat" class="form-control" id="asal_surat" placeholder="Asal Surat" value="{{ old('asal_surat') }}">
                        @error('asal_surat')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Perihal" value="{{ old('perihal') }}">
                        @error('perihal')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="disp1">Disposisi 1</label>
                        <input type="text" name="disp1" class="form-control" id="disp1" placeholder="Disposisi 1" value="{{ old('disp1') }}">
                        @error('disp1')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="disp2">Disposisi 2</label>
                        <input type="text" name="disp2" class="form-control" id="disp2" placeholder="Disposisi 2" value="{{ old('disp2') }}">
                        @error('disp2')
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
                    <button type="submit" class="btn btn-gradient-primary mr-2">Tambah Surat</button>
                    <a href="/view-sm" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
