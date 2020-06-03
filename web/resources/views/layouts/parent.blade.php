<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | {{ config('app.name', 'Sensory Evaluation Application') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        @media only screen and (max-width: 720px) {
            .footer-custom {
                text-align: center;
            }

            .footer-custom-br {
                display: block;
            }
        }

        @media only screen and (min-width: 720px) {
            .footer-custom-right {
                float: right !important;
            }
        }
        .content {
            min-height: 83vh;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-light">

    <!-- Start NAV bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Sensory</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">แดชบอร์ด</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('user*') ? 'active' : '' }}" href="#" id="user" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">ผู้ใช้</a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item {{ request()->routeIs('user.create') ? 'active' : '' }}" href="{{ route('user.create') }}">เพิ่มผู้ใช้ใหม่</a>
                        <a class="dropdown-item {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">จัดการผู้ใช้</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('test*') ? 'active' : '' }}" href="#" id="test" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">การทดสอบ</a>
                    <div class="dropdown-menu" aria-labelledby="test">
                        <a class="dropdown-item {{ request()->routeIs('test-info.create') ? 'active' : '' }}" href="{{ route('test-info.create') }}">สร้างการทดสอบใหม่</a>
                        <a class="dropdown-item" href="#">จัดการการทดสอบ</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="organization" aria-expanded="false">Organization</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End NAV bar -->
    <div class="container content mt-5 mb-3 pt-4">
        @yield('content')
    </div>
    <!-- Start Footer -->
    <footer class="footer py-3 bg-dark text-white">
        <div class="container footer-custom">
            <span class="text-muted footer-custom-br">Sensory Evaluation system | © 2018</span>
            <span class="text-muted footer-custom-right">Version : Prototype</span>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
