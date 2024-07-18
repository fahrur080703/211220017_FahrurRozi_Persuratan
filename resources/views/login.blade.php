<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Persuratan</title>
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style-2.css') }}">
    <link rel="shortcut icon" href="{{ asset('thema/assets/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <!-- Image and Text Column -->
                    <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <img src="{{ asset('thema/assets/images/logo.png') }}" alt="Website Persuratan" class="img-fluid" />
                            <h3 class="mt-3">Website Persuratan</h3>
                            <p>Selamat Datang di Website Persuratan</p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-light text-left p-5">
                            <h4>Login</h4>
                            <h6 class="font-weight-light">Silahkan Login Untuk Masuk ke Menu Utama</h6>
                            <form method="POST" action="/login" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-lg  @error('username') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="Masukkan Username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" placeholder="Masukkan Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Masuk"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('sweetalert::alert')
    <script src="{{ asset('thema/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('thema/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('thema/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('thema/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('thema/assets/js/misc.js') }}"></script>
    <script src="{{ asset('thema/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('thema/assets/js/todolist.js') }}"></script>
</body>

</html>
