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
                <div class="order-steps__step-connector"></div>
                <div id="paymentStep" class="order-steps__step-icon">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="order-steps__step-connector"></div>
                <div id="completeStep" class="order-steps__step-icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="font-weight-bold pb-4">Service Order Information</h2>
                        <div class="row">
                            <div class="col-md-5">
                                <img class="w-100 rounded-5" src="{{ $service->images->first()->url() }}"
                                     alt="{{ $service->title }}">
                            </div>
                            <div class="col-md-7">
                                <div class="service-provider">
                                    <img class="avatar"
                                         src="{{ url($service->provider->getPhotoPath().$service->provider->avatar) }}"
                                         alt="{{ $service->provider->fullName() }}">
                                    <a href="{{ $service->provider->getProfileUrl() }}"
                                       class="provider-name text-dark font-weight-bold">{{ $service->provider->fullName() }}</a>
                                    <span>level 3 Special Trader</span>
                                </div>
                                <h5 class="pt-3 font-weight-bold">{{ $service->title }}</h5>
                                <div class="service-rate">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="order-package service-package {{ $package->type }}">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="font-weight-bold">{{ $package->title }}</h3>
                                    <h4 class="package-price pt-2 pb-2 text-{{ $package->type }}">
                                        ${{ $package->price }}</h4>
                                    <p style="white-space: pre-line" class="p-1">{{ $package->description }}</p>
                                    <div class="row text-left pt-2 pb-2">
                                        <div class="col-md-6 package-delivery">
                                            <i class="fa fa-clock"></i>
                                            <span>Receive In {{ $package->duration }} days</span>
                                        </div>
                                        <div class="col-md-6 package-reviews">
                                            <i class="fa fa-exchange-alt"></i>
                                            <span>{{ $package->reviews }} Review Orders</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if(count($package->offers))
                                        <div class="package-offers">
                                            <h6 class="text-capitalize">What's Included</h6>
                                            <div class="container">
                                                @foreach($package->offers as $offer)
                                                    <div class="offer">
                                                        <i class="fa fa-check @if($offer->is_main) text-success @endif"></i>
                                                        <span class="text-capitalize">{{ $offer->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form method="GET" action="payment">
                            <div class="form-group">
                                <label class="form-label" for="amountInput">Amount</label>
                                <input class="form-control" id="amountInput" min="1" max="300" name="order_amount"
                                       type="number" placeholder="Enter Amount ..." value="1" required>
                                @error('order_amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <span class="text-gray">Financial Information</span>
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
                                            <span id="orderAmount">1</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Tax</span>
                                            <span><span id="orderTax">{{ $tax }}</span>%</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Date</span>
                                            <span>{{ date('Y-m-d') }}</span>
                                        </div>
                                        <hr>
                                        <div class="text-black d-flex justify-content-between">
                                            <span>Total Price</span>
                                            <span id="totalPrice">$12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit"
                                            href="/service/{{ $service->id . '/' . $package->type }}/payment"
                                            class="btn w-100 btn-primary text-capitalize">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </form>
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
            const orderInput = $('#amountInput');

            function calculate() {
                $('#orderAmount').html(orderInput.val());
                let totalPrice = parseInt(orderInput.val(), 10) * parseInt($('#orderPrice').text(), 10);
                totalPrice += totalPrice * parseInt($('#orderTax').text(), 10) / 100;
                $('#totalPrice').html(`$${totalPrice}`);
            }

            calculate();
            orderInput.on('change', calculate);
        });
    </script>
@endsection
