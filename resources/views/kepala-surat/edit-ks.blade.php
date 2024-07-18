@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Kepala Surat</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Kepala Surat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Kepala Surat</li>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kepala Surat</h4>
                <form class="forms-sample" method="POST" action="/update-ks/{{ $data->id_kop }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_kop">Nama Kop</label>
                        <input type="text" name="nama_kop" class="form-control" id="nama_kop" placeholder="Nama Kop" value="{{ $data->nama_kop }}">
                        @error('nama_kop')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_kop">Alamat Kop</label>
                        <textarea name="alamat_kop" class="form-control" id="alamat_kop" placeholder="Alamat Kop">{{ $data->alamat_kop }}</textarea>
                        @error('alamat_kop')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_tujuan">Nama Tujuan</label>
                        <input type="text" name="nama_tujuan" class="form-control" id="nama_tujuan" placeholder="Nama Tujuan" value="{{ $data->nama_tujuan }}">
                        @error('nama_tujuan')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input readonly type="text" name="id_user" class="form-control" id="id_user" placeholder="ID User" value="{{ old('id_user', $data->id_user) }}">
                        @error('id_user')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <a href="/view-ks" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
