<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.admin.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/Bootstrap-Image-Uploader.css')}}">



@yield('css-js')



<body id="page-top">

    <div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="transition: 300ms;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="/admin">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Admin</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link @yield('nav-dashboard')" href="/admin"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link @yield('nav-profile')" href="{{ route('profile')}}"><i class="fas fa-user"></i><span>Profile</span></a></li>
                
                @canany(['Manage Donations','Admin'])
                <li class="nav-item"><a class="nav-link @yield('nav-donations')" href="{{ route('donations')}}"><i class="fas fa-table"></i><span>Donations</span></a></li>
                @endcanany

                @canany(['Manage Teacher Applications','Admin'])
                <li class="nav-item"><a class="nav-link @yield('nav-teacher-applications')" href="{{ route('teacher-applications')}}"><i class="fas fa-file-text"></i><span>Teacher Applications</span></a></li>
                @endcanany
          
                @canany(['Manage Tickets','Admin'])
                <li class="nav-item"><a class="nav-link @yield('nav-tickets')" href="{{ route('tickets')}}"><i class="fa fa-ticket" aria-hidden="true"></i><span>Tickets</span></a></li>
                @endcanany

                @canany(['Manage Users','Admin'])
                <li class="nav-item"><a class="nav-link @yield('nav-user-management')" href="{{ route('user-management')}}"><i class="fas fa-users"></i><span>User Management</span></a></li>
                @endcanany
                
                @canany(['Manage Users','Admin'])
                <li class="nav-item"><a class="nav-link @yield('nav-manage-permissions')" href="{{ route('manage-permissions')}}"><i class="fa fa-tasks" aria-hidden="true"></i><span>Permissions</span></a></li>
                @endcanany

            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        
                        
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ Auth::user()->name }}</span><img class="border rounded-circle img-profile" src="{{ asset('/storage/images/dp/'.Auth::user()->dp) }}"></a>
                                <div
                                    class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="{{ route('profile')}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                            </div>
                        </li>
                </ul>
            </div>
        </nav>

                

    @yield('content')
                
        


</div>

       

<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Admin Panel Developed By <strong><a href="mailto:aniket.das.in@gmail.com">Aniket Das</a></strong></span></div>
    </div>
</footer>

</div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/bootstrap.admin.min.js')}}"></script>
<script src="{{ asset('assets/js/chart.min.js')}}"></script>
<script src="{{ asset('assets/js/bs-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/js/summernote-bs4.js')}}"></script>


@yield('bottom-js')

</body>

</html>
