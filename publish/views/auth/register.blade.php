<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-wrapper">
    <div class="login-app">
        <div class="form">
            <div class="top">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52" height="52" viewBox="0 0 52 52">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.777" y1="0.82" x2="0.257" y2="0.237" gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#f7ad39"/>
                                <stop offset="1" stop-color="#f7c00b"/>
                            </linearGradient>
                        </defs>
                        <g id="logo" transform="translate(-847 -43)">
                            <circle id="Ellipse_1" data-name="Ellipse 1" cx="26" cy="26" r="26" transform="translate(847 43)" fill="url(#linear-gradient)"/>
                            <g id="Group_1" data-name="Group 1" transform="translate(848 57.014)" style="isolation: isolate">
                                <g id="new_logotype" transform="translate(12.355 -0.014)">
                                    <path d="M316.822,121.3l-7.692,22h7.692v-.438h-7.014l7.014-20.047Z" transform="translate(-304.308 -121.304)" fill="#fff"/>
                                    <path d="M77.214,490.221l-4.822-14.786,12.514,9.127v.6l-11.6-8.449,4.155,12.8" transform="translate(-72.391 -468.221)" fill="#fff"/>
                                    <path d="M347.489,940.138l-6.28,4.623h-.775l6.692-4.887" transform="translate(-334.975 -923.199)" fill="#fff"/>
                                    <path d="M686.739,121.3l7.692,22h-7.692v-.438h7.015l-7.015-20.047Z" transform="translate(-674.225 -121.304)" fill="#fff"/>
                                    <path d="M694.431,490.221l4.823-14.786-12.515,9.127v.6l11.6-8.449-4.155,12.8" transform="translate(-674.225 -468.221)" fill="#fff"/>
                                    <path d="M686.739,940.138l6.28,4.623h.775l-6.692-4.887" transform="translate(-674.225 -923.199)" fill="#fff"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <p>Регистрация</p>
            </div>
            <form method="POST" action="{{ route('register') }}" style="position: relative">
                @csrf

                <div class="inputemail">
                    <p>Имя</p>

                    <div class="col-md-6">
                        <input id="name" type="text" class="inputtype @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="inputemail">
                    <p>Почта</p>

                    <div class="col-md-6">
                        <input id="email" type="email" class="inputtype @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="inputemail">
                    <p>Пароль</p>

                    <div class="col-md-6">
                        <input id="password" type="password" class="inputtype @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="inputemail">
                    <p>Подтвердите пароль</p>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="inputtype" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>


                <button type="submit" class="submit-log" style="position: absolute; right: 0; margin-top: 10px">
                    {{ __('Регистрировать') }}
                </button>

            </form>
        </div>
    </div>


</div>
</body>
</html>
