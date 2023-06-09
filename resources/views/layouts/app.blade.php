<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
                    <div class="sidebar-brand-icon">
                        <img src="../img/logo/logo2.png">
                    </div>
                    <div class="sidebar-brand-text mx-3" style="font-size:12px;">Revisal Groupe Tib</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Features
                </div>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tabele</span>
                    </a>
                    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Tables</h6> --}}
                            <a class="collapse-item" href="{{ route('employees') }}">Tabel angajati</a>
                            <a class="collapse-item" href="{{ route('show-company') }}">Tabel companii</a>
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true" aria-controls="collapseTable1">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Adauga</span>
                    </a>
                    <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Tables</h6> --}}
                            <a class="collapse-item" href="{{ route('show-form') }}">Adauga angajati</a>
                            <a class="collapse-item" href="{{ route('show-form-company') }}">Adauga companie</a>
                        </div>
                    </div>
                </li>
                
                <hr class="sidebar-divider">
                <div class="version" id="version-ruangadmin"></div>
            </ul>
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto" style="padding-right:1rem;">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" src="../img/boy.png" style="max-width: 60px">
                                    <span class="ml-2 d-none d-lg-inline text-white small">
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @else
                                            Contul meu
                                        @endif
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    @if(Auth::check())
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Deconectare
                                        </a>
                                    </form>
                                    @else
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Autentificare
                                    </a>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Creaza cont
                                    </a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- Topbar -->
                        
                    @yield('content')

                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white mt-4">
                    <div class="container my-auto py-2">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> - distributed by
                                <b><a href="#">Davyyd</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>
        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </body>

    <script>
        flatpickr("#datetimepicker2", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
        flatpickr("#datetimepicker3", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

</html>
