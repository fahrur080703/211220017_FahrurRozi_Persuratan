@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Nama Tanda Tangan</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Nama Tanda Tangan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Nama Tanda Tangan</li>
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Nama Tanda Tangan</h4>
                <form class="forms-sample" method="POST" action="{{ url('/update-nama-tandatgn/'.$namaTandatgn->id_tandatangan) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_tandatgn">Nama Tanda Tangan</label>
                        <input type="text" name="nama_tandatgn" class="form-control" id="nama_tandatgn" placeholder="Nama Tanda Tangan" value="{{ $namaTandatgn->nama_tandatgn }}">
                        @error('nama_tandatgn')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" value="{{ $namaTandatgn->jabatan }}">
                        @error('jabatan')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" value="{{ $namaTandatgn->nip }}">
                        @error('nip')
                        <p class="text-danger pt-1"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <a href="{{ url('/view-nama-tandatgn') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection