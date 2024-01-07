@extends('frontend.layouts.template')

@section('title','Home')

@section('scripts')
    <script src="{{ url('js/stats.js') }}" defer></script>
@endsection

@section('navbar')
    @auth
        @include('frontend.includes.usernav')
    @endauth
    <div id="top-nav" class="navbar navbar-expand-md navbar-dark bg-none shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ url('images/logo.png') }}" alt="Dotworks Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-nav-con"
                    aria-controls="top-nav-con" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav id="top-nav-con" class="collapse navbar-collapse">
                @include('frontend.includes.nav-content')
                @if (Route::has('login'))
                    @auth
                        <a href="#" id="search-btn" class="nav-link"><i class="fa fa-search"></i></a>
                        <a id="reg-btn" class="nav-link   main-btn"
                           href="{{ route('frontend.service.create') }}">{{ __('Create a service') }}</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                        <a href="#" id="search-btn" class="nav-link"><i class="fa fa-search"></i></a>
                        @if (Route::has('register'))
                            <a id="reg-btn" class="nav-link   main-btn"
                               href="{{ route('register') }}">{{ __('REGISTRATION') }}</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div id="banner-slider" class="carousel slide carousel-slide" data-ride="carousel">
            <div class="cover"></div>
            <ol class="carousel-indicators">
                <li data-target="#banner-slider" data-slide-to="0" class="active"></li>
                <li data-target="#banner-slider" data-slide-to="1"></li>
                <li data-target="#banner-slider" data-slide-to="2"></li>
            </ol>
            <div class="container carousel-inner">
                <div class="carousel-item active">
                    <h2>Business <span>Point Here</span><br> Start now!</h2>
                    <p>Sell and buy services on dot.works now with the highest degree of security.</p>
                    <br>
                    <a class="main-btn text-light">Get Started</a>
                </div>
                <div class="carousel-item">
                    <h2>Business <span>Point Here</span><br> Start now!</h2>
                    <p>Sell and buy services on dot.works now with the highest degree of security.</p>
                    <br>
                    <a class="main-btn text-light">Get Started</a>
                </div>
                <div class="carousel-item">
                    <h2>Business <span>Point Here</span><br> Start now!</h2>
                    <p>Sell and buy services on dot.works now with the highest degree of security.</p>
                    <br>
                    <a class="main-btn text-light">Get Started</a>
                </div>
            </div>
        </div>
        <section class="steps">
            <div class="container">
                <h2>{{ __('Your success is three points...') }}</h2>
                <p>{{ __('Starting your business or purchasing services in steps that are divided into only three points.') }}</p>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-center w-100">
                    <div>
                        <div class="step">
                            <img src="{{ url('images/homepage/step1.png') }}" alt="{{ __('Register an account') }}">
                            <h3>{{ __('Register in the site') }}</h3>
                            <p>{{ __('The first step is to register you account.') }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="step">
                            <img src="{{ url('images/homepage/step2.png') }}"
                                 alt="{{ __('Add a service or purchase a service') }}">
                            <h3>{{ __('Trade Services') }}</h3>
                            <p>{{ __('Find your preferred service for trade') }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="step">
                            <img src="{{ url('images/homepage/step3.png') }}" alt="{{ __('Buying and selling services') }}">
                            <h3>{{ __('Buying & selling') }}</h3>
                            <p>{{ __('Secure payment with your account wallet.') }}</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="main-btn">{{ __('Join us') }}</a>
            </div>
        </section>
        <section class="stats">
            <div class="container stats-con">
                <h2>{{ __('Dot.works Stats') }}</h2>
                <p>{{ __('All stats for Dot.works so far.') }}</p>
                <div class="row mt-4">
                    <div class="col-md-3 col-sm-6">
                        <img src="{{ url('images/homepage/total-serv.png') }}"
                             alt="{{ __('Total services on the site') }}">
                        <p>{{ __('Total services on the site') }}</p>
                        <p class="stats-n">24512</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="{{ url('images/homepage/sold-serv.png') }}" alt="{{ __('Total services sold') }}">
                        <p>{{ __('Total services sold') }}</p>
                        <p class="stats-n">5562</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="{{ url('images/homepage/customers.png') }}" alt="{{ __('Customers on the site') }}">
                        <p>{{ __('Customers on the site') }}</p>
                        <p class="stats-n">7772</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="{{ url('images/homepage/customers.png') }}" alt="{{ __('Merchants on the site') }}">
                        <p>{{ __('Merchants on the site') }}</p>
                        <p class="stats-n">18231</p>
                    </div>
                </div>
            </div>
        </section>
        <div style="width:100%;height:40px;background:#dedede"></div>
        <section class="services">
            <div class="services-header">
                <p>{{ __('Some services on Dot.Works') }}</p>
                <h1>{{ __('Services On Dot.work') }}</h1>
                <hr>
            </div>
            <div class="row">
                @foreach($services as $i => $service)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ">
                        <div class="card service">
                            <div id="service-{{ $service->id }}" class="carousel slide carousel-slide service-slider"
                                 data-ride="carousel">
                                <div class="cover"></div>
                                <ol class="carousel-indicators">
                                    @foreach($service->images as $i => $image)
                                        <li data-target="#service-{{ $service->id }}" data-slide-to="{{ $i }}"
                                            class="@if($i === 0 ) active @endif "></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($service->images as $i => $image)
                                        <div class="carousel-item @if($i === 0 ) active @endif">
                                            <img src="{{ $image->url() }}" alt="{{ $service->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="body">
                                @if($service->guarantee)
                                    <img class="guarantee" src="{{ url('/images/homepage/guarantee.png') }}"
                                         alt="Guaranteed for {{ $service->guarantee }} days" data-toggle="tooltip"
                                         title="Guaranteed for {{ $service->guarantee }} days">
                                @endif
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-8 text-right">
                                        <a href="{{ $service->provider->getProfileUrl() }}">
                                            <h2> {{ $service->provider->fullName() }} </h2></a>
                                        <h3> {{ $service->provider->job_title }} </h3>
                                        <p class="rating"><i
                                                class="fa fa-star"></i>&nbsp;{{ sprintf("%0.1f",$service->rating) }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-left:0;">
                                        @if($service->provider->is_online())
                                            <span class="status active" data-toggle="tooltip" title="Online"></span>
                                        @else
                                            <span class="status" data-toggle="tooltip" title="Offline"></span>
                                        @endif
                                        <img
                                            src="{{ url($service->provider::getPhotoPath() . '/' . $service->provider->avatar) }}"
                                            alt="{{ $service->provider->fullName() }}">
                                        <span class="level"><span class="level-txt">BIG MERCHANTS</span><i
                                                class="fa fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-left">{{ substr($service->overview,0,50) }}...</p>
                                </div>
                                <div class="row options">
                                    <div class="heart-options col-md-4 col-xs-4 col-4">
                                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                        <a href="#"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="price col-md-8 col-xs-8 col-8">
                                        <a href="#"><span class="text-primary" style="font-size:16px;">(sales)</span><i
                                                class="fa fa-truck"></i></a>
                                        Price <span class="text-primary">&dollar; {{ $service->price }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <div style="width:100%;height:20px;background:#dedede"></div>
        <section class="register-msg">
            <div class="reg-con">
                <h2>{{ __('Start Your Journey in Dot.works') }}</h2>
                <p>{{ __('Register now on Dot.works website and start your business and compete with the strongest service vendors on our site.') }}</p>
                <a class="reg-btn" href="">{{ __('Register Now') }}</a>
            </div>
        </section>
        <div style="width:100%;height:30px;background:#dedede"></div>
    </div>
@endsection
