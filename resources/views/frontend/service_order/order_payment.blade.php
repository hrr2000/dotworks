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
                <div class="order-steps__step-connector"></div>
                <div id="completeStep" class="order-steps__step-icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow-0 text-center">
                            <div class="card-body">
                                @if($enough)
                                    <img src="{{ asset('images/general/valid-payment.png') }}"
                                         alt="recharge your balance">
                                    <div class="alert">
                                        <p class="text-success">
                                            You have enough Balance, you can continue.
                                        </p>
                                    </div>
                                @else
                                    <img src="{{ asset('images/general/recharge.png') }}" alt="recharge your balance">
                                    <div class="alert">
                                        <p class="text-danger">
                                            Your balance isn't enough, Please recharge your account.
                                        </p>
                                        <a target="_blank" href="{{ route('frontend.wallet.deposit.amount') }}"
                                           class="btn btn-secondary  text-capitalize shadow-0">
                                            <i class="fa fa-wallet"></i>
                                            Recharge
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                                        <span id="orderAmount">{{ $amount }}</span>
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
                                    <div
                                        class="@if($enough) text-success @else text-danger @endif d-flex justify-content-between">
                                        <span>Total Price</span>
                                        <span id="totalPrice">${{ $totalPrice }}</span>
                                    </div>
                                </div>
                            </div>
                            @if($enough)
                                <div class="card-footer">
                                    <button type="button" href="/service/{{ $service->id . '/' . $package->type }}"
                                            class="btn w-100 btn-primary text-capitalize" data-toggle="modal"
                                            data-target="#paymentConfirmationModal">
                                        Continue
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($enough)
        <div class="modal fade" id="paymentConfirmationModal" tabindex="-1" role="dialog"
             aria-labelledby="language-choose" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i>
                            Confirmation</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure to pay <kbd>{{ $totalPrice }}$</kbd> for: </h5>
                        <a href="#">{{ $service->title }} ({{ $package->type }})</a>
                    </div>
                    <div class="modal-footer">
                        <form method="POST">
                            @csrf
                            <button type="submit" name="order_amount" value="{{ $amount }}" class="btn btn-primary">
                                yes, I am sure
                            </button>
                        </form>
                        <button class="btn btn-danger" data-dismiss="modal">
                            No, Cancel it
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
