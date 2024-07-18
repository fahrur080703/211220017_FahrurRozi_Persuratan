<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Persuratan</title>
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style-2.css') }}">
    <link rel="shortcut icon" href="{{ asset('thema/assets/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/surat">
                    <img src="{{ asset('thema/assets/images/logo-mini.svg') }}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini text-center" href="surat">
                    <img src="{{ asset('thema/assets/images/logo-mini.svg') }}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                @empty(auth()->user()->file)
                                    <img src="{{ asset('thema/assets/images/faces-clipart/pic-1.png') }}" alt="image">
                                @else
                                    <img src="{{ url('/' . auth()->user()->file) }}" alt="image">
                                @endempty
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/logout">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Keluar </a>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                @empty(auth()->user()->file)
                                    <img src="{{ asset('thema/assets/images/faces-clipart/pic-1.png') }}" alt="profile">
                                @else
                                    <img src="{{ url('/' . auth()->user()->file) }}" alt="profile">
                                @endempty
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                                <span class="text-secondary text-small">{{ auth()->user()->level }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/surat">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/view-ks">
                            <span class="menu-title">Kepala Surat</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/view-nama-tandatgn">
                            <span class="menu-title">Tanda Tangan</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Surat</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-email menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/view-sm">Surat Masuk</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="/view-sk">Surat
                                        Keluar</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/view-user">
                            <span class="menu-title">Profile</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <span class="menu-title">Keluar</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                @yield("content")
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">211220017 - FahrurRozi - Persuratan</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>

    <script src="{{ asset('thema/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('thema/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('thema/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('thema/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('thema/assets/js/misc.js') }}"></script>
    <script src="{{ asset('thema/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('thema/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('thema/assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "csv"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>
