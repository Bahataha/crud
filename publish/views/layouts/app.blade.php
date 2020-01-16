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
    <link rel="stylesheet" href="{{asset('css/daterangepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/remodal.css')}}">
    <link rel="stylesheet" href="{{asset('css/remodal-default-theme.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
</head>
<body>
<div class="left-fixed">
    <div class="main">

        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14.902" height="12.54" viewBox="0 0 14.902 12.54">
                <g id="multiple-users-silhouette" transform="translate(0 -6.348)">
                    <path id="Path_26" data-name="Path 26" d="M8.992,8.5a2.708,2.708,0,0,1,1.26,2.012A2.185,2.185,0,1,0,8.992,8.5ZM7.561,12.975A2.185,2.185,0,1,0,5.375,10.79,2.185,2.185,0,0,0,7.561,12.975Zm.927.149H6.633a2.8,2.8,0,0,0-2.8,2.8V18.19l.006.036L4,18.275a12.737,12.737,0,0,0,3.8.614,7.811,7.811,0,0,0,3.322-.624l.146-.074h.016V15.922A2.8,2.8,0,0,0,8.488,13.124ZM12.1,10.868h-1.84a2.693,2.693,0,0,1-.831,1.876,3.325,3.325,0,0,1,2.375,3.182v.7a7.53,7.53,0,0,0,2.933-.616l.146-.074H14.9V13.666A2.8,2.8,0,0,0,12.1,10.868Zm-8.378-.149a2.171,2.171,0,0,0,1.162-.337A2.7,2.7,0,0,1,5.9,8.657c0-.041.006-.081.006-.123a2.185,2.185,0,1,0-2.185,2.185Zm1.963,2.025a2.7,2.7,0,0,1-.831-1.866c-.068-.005-.136-.01-.205-.01H2.8a2.8,2.8,0,0,0-2.8,2.8v2.268l.006.035.156.049a13.12,13.12,0,0,0,3.151.592v-.685A3.326,3.326,0,0,1,5.689,12.744Z" fill="#a1a5a9"/>
                </g>
            </svg>
            Пользователи</a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="13.153" height="17.708" viewBox="0 0 13.153 17.708">
                <g id="medal" transform="translate(-65.919 -5)">
                    <g id="Group_2" data-name="Group 2" transform="translate(65.919 5)">
                        <path id="Path_33" data-name="Path 33" d="M76.028,7.994,75.163,6.81a.223.223,0,0,1,0-.257l.847-1.195a.222.222,0,0,0-.076-.322l-1.292-.691a.216.216,0,0,1-.112-.232l.243-1.444a.221.221,0,0,0-.21-.257L73.1,2.35a.221.221,0,0,1-.2-.159L72.488.779a.221.221,0,0,0-.3-.141l-1.347.579a.229.229,0,0,1-.253-.054L69.61.073a.223.223,0,0,0-.333,0l-.963,1.1a.217.217,0,0,1-.25.058L66.711.681a.221.221,0,0,0-.3.145l-.387,1.412a.225.225,0,0,1-.2.163l-1.462.083a.223.223,0,0,0-.206.261l.264,1.441a.219.219,0,0,1-.109.232l-1.281.71a.222.222,0,0,0-.072.322l.865,1.184a.223.223,0,0,1,0,.257l-.847,1.195a.222.222,0,0,0,.076.322l1.292.691a.216.216,0,0,1,.112.232l-.243,1.444a.221.221,0,0,0,.21.257l1.462.062a.221.221,0,0,1,.2.159L66.5,12.66a.221.221,0,0,0,.3.141l1.347-.579a.229.229,0,0,1,.253.054l.977,1.09a.223.223,0,0,0,.333,0l.963-1.1a.217.217,0,0,1,.25-.058l1.354.557a.221.221,0,0,0,.3-.145l.387-1.412a.225.225,0,0,1,.2-.163l1.462-.083a.223.223,0,0,0,.206-.261L74.57,9.253a.219.219,0,0,1,.109-.232l1.281-.71A.213.213,0,0,0,76.028,7.994ZM69.5,10.7a3.975,3.975,0,1,1,3.975-3.975A3.981,3.981,0,0,1,69.5,10.7Z" transform="translate(-62.919 0)" fill="#a1a5a9"/>
                        <path id="Path_34" data-name="Path 34" d="M267.028,366.513a1.146,1.146,0,0,1-.818.34,1.25,1.25,0,0,1-.329-.047l-.934-.282-.72.659c-.025.022-.047.043-.072.062l1.158,3.591a.163.163,0,0,0,.286.051l.843-1.082a.162.162,0,0,1,.174-.058l1.314.384a.164.164,0,0,0,.2-.206Z" transform="translate(-256.869 -353.246)" fill="#a1a5a9"/>
                        <path id="Path_35" data-name="Path 35" d="M118.327,366.524l-.934.282a1.133,1.133,0,0,1-.329.047,1.152,1.152,0,0,1-.818-.34l-1.1,3.414a.163.163,0,0,0,.2.206l1.314-.384a.16.16,0,0,1,.174.058l.843,1.082a.164.164,0,0,0,.286-.051l1.158-3.591a.59.59,0,0,1-.072-.062Z" transform="translate(-113.244 -353.246)" fill="#a1a5a9"/>
                        <path id="Path_36" data-name="Path 36" d="M176.582,113.307l-1.5-.109-.565-1.39a.315.315,0,0,0-.583,0l-.565,1.39-1.5.109a.315.315,0,0,0-.181.554l1.148.97-.358,1.459a.314.314,0,0,0,.471.344l1.274-.793,1.274.793a.314.314,0,0,0,.471-.344l-.358-1.459,1.148-.97A.313.313,0,0,0,176.582,113.307Z" transform="translate(-167.647 -107.573)" fill="#a1a5a9"/>
                    </g>
                </g>
            </svg>
            Победители</a>
        <a href="#"><svg id="Group_3" data-name="Group 3" xmlns="http://www.w3.org/2000/svg" width="12.483" height="12.483" viewBox="0 0 12.483 12.483">
                <path id="Path_37" data-name="Path 37" d="M12.434,11.3,11.577,8.81a6.1,6.1,0,1,0-5.473,3.4h.01a6.122,6.122,0,0,0,2.7-.632l2.494.857a.9.9,0,0,0,.291.049.89.89,0,0,0,.838-1.179Zm-6.39-1.72a.37.37,0,1,1,.37-.37A.376.376,0,0,1,6.045,9.584Zm.37-2.826V7.934a.37.37,0,1,1-.74,0V6.425a.37.37,0,0,1,.37-.37,1.1,1.1,0,1,0-1.1-1.1.37.37,0,0,1-.74,0,1.841,1.841,0,1,1,2.211,1.8Z" transform="translate(0 0)" fill="#a1a5a9"/>
            </svg>
            Вопросы/Ответы</a>
        <a href="#"><svg style="opacity: 0" id="Group_3" data-name="Group 3" xmlns="http://www.w3.org/2000/svg" width="12.483" height="12.483" viewBox="0 0 12.483 12.483">
                <path id="Path_37" data-name="Path 37" d="M12.434,11.3,11.577,8.81a6.1,6.1,0,1,0-5.473,3.4h.01a6.122,6.122,0,0,0,2.7-.632l2.494.857a.9.9,0,0,0,.291.049.89.89,0,0,0,.838-1.179Zm-6.39-1.72a.37.37,0,1,1,.37-.37A.376.376,0,0,1,6.045,9.584Zm.37-2.826V7.934a.37.37,0,1,1-.74,0V6.425a.37.37,0,0,1,.37-.37,1.1,1.1,0,1,0-1.1-1.1.37.37,0,0,1-.74,0,1.841,1.841,0,1,1,2.211,1.8Z" transform="translate(0 0)" fill="#a1a5a9"/>
            </svg>Настройки</a>
    </div>
</div>
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
                    <span>{{  now()->format('d M Y H:i') }}</span>
                </div>
            </div>
            <div class="main-part">
                @include('admin.sidebar')
            </div>
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
<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/daterangepicker.min.js')}}"></script>


<script>
    $(document).ready(function(){
        $('input[name="filter"]').daterangepicker({
            "buttonClasses": "ui mini button",
            "applyButtonClasses": "primary",
            "locale": {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Применить",
                "cancelLabel": "Отмена",
                "fromLabel": "От",
                "toLabel": "До",
                "customRangeLabel": "Свой",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                "firstDay": 1
            }

        }, function(start, end, label) {
            //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            $("#start").val(start.format('DD.MM.YYYY'));
            $("#end").val(end.format('DD.MM.YYYY'));
        });
        var slider_width = 0;
        $('.burger').click(function () {
            if(slider_width === 0){
                $('.left-fixed').css('left', '0');
                slider_width = 1;
            }
            else{
                $('.left-fixed').css('left', '-270px');
                slider_width = 0;
            }

        });
        $('textarea').summernote();
    });

</script>
</body>
</html>
