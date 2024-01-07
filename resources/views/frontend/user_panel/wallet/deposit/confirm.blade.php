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
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <span class="btn btn-success disabled opacity-100 shadow-0"><i class="fa fa-check"></i></span>
                            </div>
                            <div class="col-11">
                                <h4 class="text-success font-weight-bold text-capitalize">
                                    Amount to be added
                                </h4>
                                <p class="text-black-50">
                                    Choose the amount of funds that you want to
                                    add to your account safely.
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <span class="btn btn-success disabled opacity-100 shadow-0"><i class="fa fa-check"></i></span>
                            </div>
                            <div class="col-11">
                                <h4 class="text-success font-weight-bold text-capitalize">
                                    Payment method has been chosen.
                                </h4>
                                <p class="text-black-50">
                                    Payment method is chosen and the process is complete.
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                    <span
                                        class="btn @isset($success) btn-success @endisset @isset($error) btn-danger @endisset">
                                        @isset($success)
                                            <i class="fa fa-check"></i>
                                        @endisset
                                        @isset($error)
                                            <i class="fa fa-times"></i>
                                        @endisset
                                    </span>
                            </div>
                            <div class="col-11">
                                <h4 class="@isset($success) text-success @endisset @isset($error) text-danger @endisset font-weight-bold text-capitalize">
                                    Confirmation
                                </h4>
                                <p class="text-black-50">
                                    @isset($success)
                                        {{ $success }}
                                    @endisset
                                    @isset($error)
                                        {{ $error }}
                                    @endisset
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
@section('scripts')

@endsection
