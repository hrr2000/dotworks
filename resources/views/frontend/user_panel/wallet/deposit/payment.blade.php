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
                    <div class="container mb-4">
                        <span class="btn btn-primary disabled opacity-100">2</span>
                    </div>
                    <div class="container align-items-center">
                        <h4 class="text-primary font-weight-bold text-capitalize">
                            Payment Process
                        </h4>
                        <p class="text-black-50">
                            Choose your payment method and continue to charge.
                        </p>
                        <div class="container">
                            <div class="d-flex container">
                                <div class="d-flex flex-row align-items-center">
                                    <input id="creditBtn" name="payment_method" type="radio" class="form-check-input">
                                </div>
                                <label for="creditBtn" class="form-check-label  w-100">
                                    <div class="container">
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h5 class="font-weight-bold" style="font-family: 'Montserrat';">Credit
                                                    Card</h5>
                                                <p class="text-black-50 m-0">Pay using you credit card.</p>
                                            </div>
                                            <div>
                                                <img src="{{ asset('images/userpanel/payment/credit-card.png') }}"
                                                     alt="Credit Card">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <hr>
                            <div class="d-flex container">
                                <div class="d-flex flex-row align-items-center">
                                    <input id="paypalBtn" name="payment_method" type="radio" class="form-check-input">
                                </div>
                                <label for="paypalBtn" class="form-check-label  w-100">
                                    <div class="container">
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h5 class="font-weight-bold" style="font-family: 'Montserrat';">
                                                    Paypal</h5>
                                                <p class="text-black-50 m-0">Pay using you credit card.</p>
                                            </div>
                                            <div>
                                                <img src="{{ asset('images/userpanel/payment/paypal.png') }}"
                                                     alt="Paypal">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <br>
                            <form id="amountForm" action="{{ route('frontend.wallet.deposit.payment.paypal') }}"
                                  method="POST">
                                @csrf
                                <input type="hidden" value="{{ $amount }}" name="amount">
                                <button type="submit" class="btn btn-primary mt-2 w-100">Continue</button>
                            </form>
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
@section('scripts')

@endsection
