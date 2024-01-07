<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/user_panel.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css"
        integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>
@guest
    @include('frontend.layouts.app_layout_components.guest_navbar')
@endguest
<main id="user-panel">
    @guest
        @yield('content')
    @else
        <div class="panel-sidebar">
            @include('frontend.includes.sidebar')
        </div>
        <div class="panel-wrapper">
            @include('frontend.layouts.app_layout_components.app_header')
            <div class="panel-body">
                @yield('content')
            </div>
        </div>
    @endguest
    <!-- toasts -->
    <div style="position: fixed; top: 20px; right: 20px; min-height: 200px;">
        <div id="toasts-box" style="position: absolute; top: 0; right: 0;">
        </div>
    </div>
</main>
<!-- languages Modal -->
<div
    class="modal fade"
    id="lang-model"
    tabindex="-1"
    role="dialog"
    aria-labelledby="language-choose"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose a Language</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav flex-column text-left text-light">
                    <li class="nav-item">
                        <a class="nav-link" href="/languages/en"><img src="{{ asset('images/flags/usa.jpg') }}">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/languages/ar"><img
                                src="{{ asset('images/flags/egypt.jpg') }}">عربى</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="socket-provider" data-socket-url="{{ env('SOCKET_URL')  }}"></div>
<!-- Scripts -->
<script src="{{ url('js/app.js') }}" defer></script>
@yield('scripts')
</body>
</html>
