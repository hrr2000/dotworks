@extends('frontend.layouts.template')

@section('title',$service->title)
@section('styles')
    <link href="{{ url('css/profile.css') }}" rel="stylesheet">
@endsection
@section('navbar')
    <nav id="light-nav" class="navbar navbar-expand-md navbar-light bg-none shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ url('images/logo.png') }}" alt="Dot.Works"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-nav-con"
                    aria-controls="top-nav-con" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="top-nav-con" class="collapse navbar-collapse">
                @include('frontend.includes.nav-content')
                @if (Route::has('login'))
                    @auth
                        <a href="#" id="search-btn" class="nav-link"><i class="fa fa-search"></i></a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                        <a href="#" id="search-btn" class="nav-link"><i class="fa fa-search"></i></a>
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRATION') }}</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="service-wrapper">
        <nav class="navbar navbar-expand navbar-light service-categories shadow-0">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Graphics & Design</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Programming</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Marketing</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="service-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="service-content">
                            <h1 class="service-title">{{ $service->title }}</h1>
                            <div class="service-provider flex-wrap">
                                    <span class="d-inline-block" style="position: relative">
                                        <img class="avatar" src="{{ url($service->provider->avatar()) }}"
                                             style="width: 40px; height: 40px; border-radius: 50%;" alt="">
                                        <span class="bg-success d-block rounded-circle"
                                              style="position: absolute; width: 15px; height: 15px; border: 2px solid white; bottom: 0; right: 7px;"></span>
                                    </span>
                                <a href="{{ $service->provider->getProfileUrl() }}"
                                   class="provider-name text-dark font-weight-bold">{{ $service->provider->fullName() }}</a>
                                <span>level 3 Special Trader</span>
                            </div>
                            <div id="serviceViewSlider" class="carousel slide carousel-slide service-carousel"
                                 data-mdb-ride="carousel">
                                <div class="cover"></div>
                                <ol class="carousel-indicators">
                                    @foreach($service->images as $key => $image)
                                        <li data-mdb-target="#serviceViewSlider" data-mdb-slide-to="{{ $key }}"
                                            class="@if($key == 0) active @endif"></li>
                                    @endforeach
                                </ol>
                                <div class="container carousel-inner">
                                    @foreach($service->images as $key => $image)
                                        <div class="carousel-item @if($key == 0) active @endif">
                                            <img class="service-image" src="{{ $image->url() }}"
                                                 alt="{{ $service->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="service-details">
                                <h3 class="font-weight-bold">About This Service</h3>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-flex align-items-center" style="transform: scale(.8);">
                                        <span class="rating--view" data-rate-value=6
                                              data-value="{{ $service_rate }}"></span>
                                        <span class="text-warning font-weight-bold mx-2" style="font-size: 1.4rem">
                                        {{ $service_rate }}
                                        </span>
                                    </span>
                                    <span style="font-size: 1rem">
                                    ({{ $orders_completed }} completed)
                                    {{ $orders_pending . ($orders_pending > 1 ? " Orders" : " Order") }} in Queue
                                    </span>
                                </div>
                                <div>
                                    <p style="white-space: pre-line">
                                        {{ $service->description }}
                                    </p>
                                </div>
                                <hr/>
                                <div class="service__reviews-section my-5">
                                    <div class="d-flex">
                                        <h3 class="font-weight-bold">Reviews </h3>
                                        <span class="mx-2" style="font-size: 1.2rem">({{count($clients)}})</span>
                                    </div>
                                    @foreach($clients as $key => $client)
                                        <div class="d-flex my-5 justify-content-start">
                                            <span class="d-inline-block" style="position: relative">
                                                <img class="avatar" src="{{ url($client->avatar()) }}"
                                                     style="width: 50px; height: 50px; border-radius: 50%;" alt="">
                                                <span class="bg-success d-block rounded-circle"
                                                      style="position: absolute; width: 17px; height: 17px; border: 2px solid white; top: 0; right: -5px;"></span>
                                            </span>
                                            <div class="w-75 text-left mx-4">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="font-weight-bold"
                                                        style="margin-bottom: 0; font-size: 15px">{{ $client->name }}</h5>
                                                    <span class="d-flex align-items-center"
                                                          style="transform: scale(.65);">
                                                        <span class="rating--view" data-rate-value=6
                                                              data-value="1"></span>
                                                        <span class="text-warning font-weight-bold mx-2"
                                                              style="font-size: 1.3rem">
                                                            {{ $service_rate }}
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between"
                                                     style="border-bottom: solid 1px #dbdbdb; font-size: 12px; color: #B2B2B2;">
                                                    <span><i class="fa fa-user"></i> Client</span>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.393"
                                                             height="10.333" viewBox="0 0 9.393 10.333">
                                                              <path id="Path_2252" data-name="Path 2252"
                                                                    d="M10.454,1.939h-.47V1H9.045v.939h-4.7V1H3.409v.939h-.47A.942.942,0,0,0,2,2.879v7.515a.942.942,0,0,0,.939.939h7.515a.942.942,0,0,0,.939-.939V2.879A.942.942,0,0,0,10.454,1.939Zm0,8.454H2.939V4.288h7.515Z"
                                                                    transform="translate(-2 -1)" fill="#b2b2b2"/>
                                                        </svg>
                                                        {{ $client->rate_date }}
                                                    </span>
                                                </div>
                                                <div class="py-3">
                                                    <p>
                                                        {{ $client->feedback }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-packages">
                            <div class="d-flex justify-content-between">
                                <button id="basicPackageBtn" class="btn package-switch-btn active"
                                        data-order="basic-order">
                                    Basic
                                </button>
                                <button id="standardPackageBtn" class="btn package-switch-btn"
                                        data-order="standard-order">
                                    Standard
                                </button>
                                <button id="premiumPackageBtn" class="btn package-switch-btn"
                                        data-order="premium-order">
                                    Premium
                                </button>
                            </div>
                        </div>
                        <div id="packageNotSupported" class="service-package">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Package Isn't Supported</h5>
                                </div>
                            </div>
                        </div>
                        @foreach($service->packages as $package)
                            @if($package->state)
                                <div id="{{ $package->type }}-order" class="service-package">
                                    <div class="card">
                                        <div class="card-header">
                                            <div
                                                class="package-controllers row justify-content-between align-items-center">
                                                <div class="sec">
                                                    <span
                                                        class="package-type badge package__badge package__badge--{{ $package->type }}">{{ $package->type }} Order</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="{{ $package->type }}Body">
                                            <div class="card-body">
                                                <h3 class="package-title">{{ $package->title }}</h3>
                                                <h4 class="package-price text-{{ $package->type }}">
                                                    ${{ $package->price }}</h4>
                                                <p class="package-placeholder">Package Description</p>
                                                <div class="package-desc">{{ $package->description }}</div>
                                                <span id="premium_package_desc_err_msg" class="error-msg"
                                                      role="alert"></span>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row text-center">
                                                    <div class="col-6 package-delivery">
                                                        <i class="fa fa-clock"></i>
                                                        <span>Receive In {{ $package->duration }} days</span>
                                                    </div>
                                                    <div class="col-6 package-reviews">
                                                        <i class="fa fa-exchange-alt"></i>
                                                        <span>{{ $package->reviews }} Review Orders</span>
                                                    </div>
                                                </div>
                                                @if(count($package->offers))
                                                    <div class="package-offers">
                                                        <h6 class="text-capitalize">What's Included</h6>
                                                        @foreach($package->offers as $offer)
                                                            <div class="offer">
                                                                <i class="fa fa-check @if($offer->is_main) text-success @endif"></i>
                                                                <span class="text-capitalize">{{ $offer->name }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="container">
                                                    <a href="/service/{{ $service->id . '/' . $package->type }}/information"
                                                       class="btn w-100 btn-primary text-capitalize">
                                                        Continue
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(() => {
            $('.package-switch-btn').on('click', function () {

                $('.package-switch-btn').removeClass('active');
                $(this).addClass('active');

                $('.service-package').hide();
                const package = $(`#${$(this).data('order')}`);
                package.length ? package.show() : $('#packageNotSupported').show();

            });

            $('#basicPackageBtn').click();

        });
    </script>
@endsection
