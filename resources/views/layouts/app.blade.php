
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="APDERIS adalah aplikasi management data servis, sparepart dan pembukuaan keuangan">
    <meta name="keywords" content="APDERIS, servis, pencatatan data servis, data servis, management servis, sparepart, pembukuan, akuntansi, buku kas">
    <meta name="author" content="Owafs Technology">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    
    @yield('third_party_stylesheets')

    @stack('page_css')
    @yield('css')
    @livewireStyles
    <style>
        .overlay{
            background: rgb(119 119 119 / 70%);
            display: none;
        }
        .alert-primary{
            background: #ee9b0188;
            border-color: #EE9D01;
            color: black;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
            background: #EE9D01;
            color: black;
        }
        .btn-primary{
            background: #EE9D01;
            border-color: #EE9D01;
            color: white;
            font-weight: 400;
        }
        .btn-primary:hover{
            background: #ee9b01b4;
            border-color: #EE9D01;
            color: black;
        }
        .btn-primary.focus, .btn-primary:focus{
            background: #ee9b01b4;
            border-color: #EE9D01;
            color: black;
        }
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
            background: #ee9b01b4;
            color: black;
            border-color: #EE9D01;
        }
        .card-primary.card-outline{
            border-top: 3px solid #EE9D01;
        }
        .card-primary:not(.card-outline)>.card-header{
            background: #EE9D01 !important;
        }
        .bg-primary{
            background: #EE9D01 !important;
        }
        .badge-primary{
            background: #EE9D01 !important;
        }
        .nav-treeview{
            background: rgb(22, 22, 22) !important;
            border-radius: 20px !important;
            padding: 5px 0px;
        }
        .content, .content-wrapper{
            /* background: #343a40 !important; */
        }
    </style>
</head>
<div style="position: relative;z-index:99999;">
    <livewire:offline-stat>
</div>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:0px !important">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <div class="d-flex justify-content-start">
                        <h4 class="nav-link" style="color: black"><strong>Hai, {{ Auth::user()->name }}</strong></h4> 
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/user.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        {{-- @include('layouts.sidebar') --}}

        <div class="content"style="background-image: url(https://apderis.com/bg-apderis.jpg);background-size: contain;min-height:100vh">
            <section class="container" >
                @yield('content')
            </section>
        </div>
        @include('layouts.footer')
    </div>
   
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
@yield('third_party_scripts')
@stack('page_scripts')
@yield('js')
@livewireScripts

<script>
    Livewire.onPageExpired((response, message) => {})
</script>