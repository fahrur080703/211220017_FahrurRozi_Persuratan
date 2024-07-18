@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Tambah User</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
            </ol>
        </nav>
    </div>

    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah User</h4>
                <p class="card-description"></p>

                <form action="save-user" method="POST" class="forms-sample">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input name="status" type="text" class="form-control @error('status') is-invalid @enderror"
                            id="status" placeholder="Status" value="{{ old('status') }}">
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_ptgs">Nama Petugas</label>
                        <input name="nama_ptgs" type="text" class="form-control @error('nama_ptgs') is-invalid @enderror"
                            id="nama_ptgs" placeholder="Nama Petugas" value="{{ old('nama_ptgs') }}">
                        @error('nama_ptgs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Tambah User</button>
                    <a href="/view-user" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection