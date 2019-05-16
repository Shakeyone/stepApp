<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'unnamed')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }



    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    a.dropdown-item.active:before {
        font-family: "Font Awesome 5 Free";
        content: '\f105';
        margin-right: 6px;
        font-weight: 900;
    }

    .dropdown-item.active, .dropdown-item:active {
        background-color:#304376;
    }

    .navbar li.active i {
        color:#304376;
    }

    .navbar i {
        padding-right: 5px;
    }
    .navbar{
        background-color: white;
        box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);
    }

    .carousel-item img.rounded {
        border-radius: 9rem !important;
    }

    footer{
        background-color: white;
        box-shadow: 0 -1px 1px rgba(0,0,0,.2);
    }

    .footer p{
        text-align:center;
    }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown {{ Request::is('steps*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shoe-prints"></i>Step Data
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ Request::is('steps') ? 'active' : '' }}" href="/steps">Step Entries</a>
                            <a class="dropdown-item {{ Request::is('steps/user/*') ? 'active' : '' }}" href="#">My Step Entries</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('steps/create') ? 'active' : '' }}" href="/steps/create">Add Step Entry</a>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::path() == 'Competitions' ? 'active' : '' }}">
                        <a class="nav-link" href="#"><i class="fas fa-heartbeat"></i>Competitions</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'Workouts' ? 'active' : '' }}">
                        <a class="nav-link" href="#"><i class="fas fa-dumbbell"></i>Workouts</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="m-2 text-center">@yield('header', 'Header is unset')</h1>
        @yield('content')

    </div>
    <footer class="footer pt-3">
        <p>&copy;{{ date('Y')}} Chandler Ryan <a href="https://chandler-ryan.com" target="_blank">chandler-ryan.com</a><br>
            All stock photos courtesy of <a href="https://www.pexels.com">Pexels</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>