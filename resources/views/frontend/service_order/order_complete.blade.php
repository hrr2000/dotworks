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
        <div class="order-container pb-5">
            <div class="container order-steps">
                <div id="orderInformationStep" class="order-steps__step-icon active">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="order-steps__step-connector active"></div>
                <div id="paymentStep" class="order-steps__step-icon active">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="order-steps__step-connector active"></div>
                <div id="completeStep" class="order-steps__step-icon active">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow-0">
                            <div class="card-header">
                                Complete your order
                            </div>
                            <div class="card-body text-center">
                                <div class="msg-icon msg-icon--success msg-icon--large">
                                    <i class="fa fa-check"></i>
                                </div>
                                <br>
                                <h2>You Are All Set</h2>
                            </div>
                        </div>
                        <br>
                        <div class="card shadow-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Service Provider</b><br>
                                        <img class="avatar rounded-circle" style="width: 20px;"
                                             src="{{ url($service->provider->getPhotoPath().$service->provider->avatar) }}"
                                             alt="{{ $service->provider->fullName() }}">
                                        <span>{{ $service->provider->fullName() }}</span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Service ID</b><br>
                                        #{{ $order->package->service->id }}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Order Status</b><br>
                                        <span class="state-badge state-badge--{{ $order->state->name }} ">
                                            {{ $order->state->text }}
                                        </span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Order ID</b><br>
                                        #{{ $order->id }}
                                    </div>
                                </div>
                                <div class="pt-4 pb-4">
                                    <a href="{{ route('frontend.message.contact', $order->provider->username) }}"
                                       class="btn btn-primary w-100 text-capitalize shadow-0">
                                        <i class="fa fa-envelope"></i>
                                        Chat with provider now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <span class="text-gray">Financial Information</span>
                                <span>#{{ $order->id }}</span>
                            </div>
                            <div class="card-body">
                                <h6>Operation Details</h6>
                                <div class="text-black-50">
                                    <div class="d-flex justify-content-between">
                                        <span>Service ID</span>
                                        <span>#{{ $service->id }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Package Name</span>
                                        <span>{{ $package->title }} ({{ $package->type }})</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Price</span>
                                        <span>
                                            $<span id="orderPrice">{{ $package->price }}</span>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Amount</span>
                                        <span id="orderAmount">{{ $amount }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Tax</span>
                                        <span><span id="orderTax">{{ $tax }}</span>%</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Date</span>
                                        <span>{{ $order->created_at }}</span>
                                    </div>
                                    <hr>
                                    <div class="text-black d-flex justify-content-between">
                                        <span>Total Price</span>
                                        <span id="totalPrice">${{ $totalPrice }}</span>
                                    </div>
                                </div>
                            </div>
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

        });
    </script>
@endsection
