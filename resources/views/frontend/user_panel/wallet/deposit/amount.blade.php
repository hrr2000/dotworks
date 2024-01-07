@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="panel-body-header">
        <h1>{{ __('Charge Wallet') }}</h1>
        <p>{{ __('Charge your wallet to be able buy services.') }}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-0">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <span class="btn btn-primary disabled opacity-100">1</span>
                    </div>
                    <div class="container align-items-center">
                        <h4 class="text-primary font-weight-bold text-capitalize">
                            Amount to be added
                        </h4>
                        <p class="text-black-50">
                            Choose the amount of funds that you want to
                            add to your account safely.
                        </p>
                        <form method="POST" action="payment" class="form">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="amount" min="1" max="10000000"
                                           required>
                                    <div class="input-group-append">
                                        <span class="btn btn-primary shadow-0 border-0 disabled opacity-100">
                                            $
                                        </span>
                                    </div>
                                </div>
                                @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="font-weight-bold text-black-50">
                                Learn More About Tax System Of Dot.works.
                            </p>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    Continue
                                </button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <span class="btn btn-primary disabled">2</span>
                            </div>
                            <div class="col-11">
                                <h4 class="text-primary font-weight-bold text-capitalize">
                                    Payment Process
                                </h4>
                                <p class="text-black-50">
                                    Choose your payment method and continue to charge.
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <span class="btn btn-primary disabled">3</span>
                            </div>
                            <div class="col-11">
                                <h4 class="text-primary font-weight-bold text-capitalize">
                                    Confirmation
                                </h4>
                                <p class="text-black-50">
                                    Make sure that your payment is made successfully and your balance is updated.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card financial-process">
                <div class="card-header">
                    <h6 class="text-gray">Financial Information</h6>
                    <div class=" d-flex justify-content-between">
                        <span class="text-gray">Financial Process ID</span>
                        <span>#55</span>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <h6>Operation Details</h6>
                    <div class="text-black-50">
                        <div class="d-flex justify-content-between">
                            <span>Service ID</span>
                            <span>#55</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Amount</span>
                            <span id="orderAmount">55</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax</span>
                            <span><span id="orderTax">5</span>%</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Date</span>
                            <span>{{ date('d-m-Y', strtotime(now())) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <span>5425</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
