<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="content">
                <div class="left">
                    <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="logo">
                        <h3>{{ config('app.name', 'Laravel') }}</h3>
                        <span>21 апреля 2019 21:34</span>
                    </div>
                </div>
                @include('admin.sidebar')
                <div class="right">
                    @if(!Auth::check())
                        <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ Auth::user()->name }} <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13.915" height="21.238" viewBox="0 0 13.915 21.238"> <defs> <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox"> <stop offset="0" stop-color="#ffc607"/> <stop offset="1" stop-color="#ffa101"/> </linearGradient> </defs> <path id="Path_19" data-name="Path 19" d="M90.132,0V1.548H85.211V19.667l4.921,0v1.567l8.985-1.614.009-18Zm1.49,9.908a.645.645,0,0,1,.546.711.565.565,0,1,1-1.093,0A.645.645,0,0,1,91.622,9.908Zm-4.95,8.3V3.009h3.46v15.2Z" transform="translate(-85.211)" fill="url(#linear-gradient)"/> </svg></a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
