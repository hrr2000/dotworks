<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    @yield('styles')
    @if(App::isLocale('ar'))
        <link href="{{ url('css/rtl.css') }}" rel="stylesheet">
    @endif
    @auth
        <style>
            #top-nav {
                top: 60px;
            }
        </style>
    @endauth


</head>
<body>
@if(0)
    <div id="loader">
        <img src="{{ url('images/loader.gif') }}" alt="Loader">
    </div>
@endif
@yield('navbar')
<!-- Content-->
@yield('content')
<!-- End Content-->


@include('frontend.includes.footer')
<button id="up-btn"><i class="fa fa-angle-up"></i></button>
<div id="sb" class="social-btns">
    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="social"><i class="fab fa-instagram"></i></a>
    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
</div>
<!-- languages Modal -->
<div class="modal fade" id="lang-model" tabindex="-1" role="dialog" aria-labelledby="language-choose"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose a Language</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav flex-column text-left text-light">
                    <li class="nav-item">
                        <a class="nav-link" href="/languages/en"><img src="{{ asset('images/flags/usa.jpg') }}"
                                                                      alt="{{ __('English Language') }}">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/languages/ar"><img src="{{ asset('images/flags/egypt.jpg') }}"
                                                                      alt="{{ __('Arabic Language') }}">عربى</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->
<script src="{{ url('js/app.min.js') }}"></script>
<script src="{{ url('js/script.js') }}"></script>
@yield('scripts')
</body>
</html>
