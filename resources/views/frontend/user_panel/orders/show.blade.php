@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="panel-body-header">
        <h1>{{ __('View Order') }}</h1>
        <p>{{ __('View you order details and client.') }}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-0">
                <div class="card-header">
                    <h2 class="font-weight-bold">{{ $order->package->service->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <b>Client</b><br>
                            <a target="_blank" href="{{ $order->client->getProfileUrl() }}">
                                <img class="avatar rounded-circle" style="width: 30px;"
                                     src="{{ $order->package->service->provider->avatar() }}"
                                     alt="{{ $order->package->service->provider->fullName() }}">
                                <span>{{ $order->client->fullName() }}</span>
                            </a>
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
                    <hr>
                    @if($order->state->name === 'progress')
                        <h5 class="font-weight-bold">The Remaining Time For Deadline.</h5>
                        <div id="remainingTimeCounter" data-time="{{ $remainingTime }}" class="timer"
                             style="display: none;">
                            <span id="daysTimer" class="timer__number"></span>
                            <span class="timer__colon">:</span>
                            <span id="hoursTimer" class="timer__number"></span>
                            <span class="timer__colon">:</span>
                            <span id="minutesTimer" class="timer__number"></span>
                            <span class="timer__colon">:</span>
                            <span id="secondsTimer" class="timer__number"></span>
                        </div>
                    @endif
                    <div class="pt-4 pb-4">
                        <a href="{{ route('frontend.message.contact', $order->provider->username === auth()->user()->username ? $order->client->username : $order->provider->username) }}"
                           class="btn btn-primary w-100 text-capitalize shadow-0">
                            <i class="fa fa-envelope"></i>
                            Chat with Client
                        </a>
                    </div>
                </div>
            </div>
            @if($order->client->id === auth()->user()->id)
                <div class="card shadow-0">
                    <div class="card-header">
                        <h2 class="font-weight-bold">Order Files</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if(count($order->files))
                            <table class="table" id="orderFilesTable">
                                <thead>
                                <tr>
                                    <th>File ID</th>
                                    <th>File Type</th>
                                    <th>File Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->files as $file)
                                    <tr>
                                        <td>{{ explode('.', $file->file_name)[0] }}</td>
                                        <td>{{ explode('.', $file->file_name)[1] }}</td>
                                        <td>
                                            <a href="">
                                                <i class="fa fa-download mx-3"></i>
                                                {{ $file->file_name }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning">
                                <p>The Service Provider hasn't uploaded any files yet.</p>
                            </div>
                        @endif
                        @if($order->state->name === 'progress')
                            <button id="askForFileResubmissionButton"
                                    data-url="{{ route('frontend.order.resubmission-request', $order->id) }}"
                                    class="btn btn-primary" @if(!$order->files_uploaded) disabled @endif>
                                Ask for file resubmission
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div id="{{ $order->package->type }}-order" class="service-package">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-black-50">
                            Request Information
                        </h6>
                        <h3 class="text-success font-weight-bold">${{ $order->price }}</h3>
                        <div class="d-flex justify-content-between">
                            <span>Service ID</span>
                            <span class="text-secondary">#{{ $order->package->service->id }}</span>
                        </div>
                        <div class="package-controllers row justify-content-between align-items-center">
                            <div class="sec">
                                <span
                                    class="package-type badge package__badge package__badge--{{ $order->package->type }}">{{ $order->package->type }} Order</span>
                            </div>
                        </div>
                    </div>
                    <div id="{{ $order->package->type }}Body">
                        <div class="card-body">
                            <div class="package-desc">{{ $order->package->description }}</div>
                            <span id="premium_package_desc_err_msg" class="error-msg" role="alert"></span>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-6 package-delivery">
                                    <i class="fa fa-clock"></i>
                                    <span>Receive In {{ $order->package->duration }} days</span>
                                </div>
                                <div class="col-6 package-reviews">
                                    <i class="fa fa-exchange-alt"></i>
                                    <span>{{ $order->package->reviews }} Review Orders</span>
                                </div>
                            </div>
                            @if(count($order->package->offers))
                                <div class="package-offers">
                                    <h6 class="text-capitalize">What's Included</h6>
                                    @foreach($order->package->offers as $offer)
                                        <div class="offer">
                                            <i class="fa fa-check @if($offer->is_main) text-success @endif"></i>
                                            <span class="text-capitalize">{{ $offer->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card financial-process">
                <div class="card-header">
                    <h6 class="text-gray">Financial Information</h6>
                    <div class=" d-flex justify-content-between">
                        <span class="text-gray">Financial Process ID</span>
                        <span>#{{ $order->id }}</span>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <h6>Operation Details</h6>
                    <div class="text-black-50">
                        <div class="d-flex justify-content-between">
                            <span>Service ID</span>
                            <span>#{{ $order->package->service->id }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Package Name</span>
                            <span>{{ $order->package->title }} ({{ $order->package->type }})</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Price</span>
                            <span>
                                    $<span id="orderPrice">{{ $order->package->price }}</span>
                                </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Amount</span>
                            <span id="orderAmount">{{ $order->amount }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax</span>
                            <span><span id="orderTax">{{ $tax }}</span>%</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Date</span>
                            <span>{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                        </div>
                        <hr>
                        <div class="text-black d-flex justify-content-between">
                            <span>Total Price</span>
                            <span id="totalPrice">${{ $order->price }}</span>
                        </div>
                    </div>
                </div>
                @if($order->state->name === 'pending')
                    <div class="card-footer text-center">
                        <button type="button" onclick="$('#orderResponse').val(1);$('#responseVerb').html('Accept')"
                                data-toggle="modal" data-target="#confirmationModal"
                                class="btn btn-secondary shadow-0 text-capitalize financial-btn">
                            Accept
                        </button>
                        <button type="button" onclick="$('#orderResponse').val(0);$('#responseVerb').html('Cancel')"
                                data-toggle="modal" data-target="#confirmationModal"
                                class="btn btn-danger shadow-0 cancel-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.003" height="14.003"
                                 viewBox="0 0 14.003 14.003">
                                <path id="Path_2348" data-name="Path 2348"
                                      d="M210.224,37.535a2.245,2.245,0,0,0-3.172,0l-3.172,3.174-3.172-3.174a2.244,2.244,0,0,0-3.172,3.174l3.172,3.172-3.172,3.172a2.243,2.243,0,0,0,3.172,3.172l3.172-3.172,3.172,3.172a2.243,2.243,0,1,0,3.172-3.172l-3.172-3.172,3.172-3.172A2.243,2.243,0,0,0,210.224,37.535Z"
                                      transform="translate(-196.879 -36.879)" fill="#ed5f5f"/>
                            </svg>
                        </button>
                        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                             aria-labelledby="language-choose" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Confirmation
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure to <span id="responseVerb"
                                                                  class="font-weight-bold text-dark"></span> this order?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" id="response_form" action="respond">
                                            @csrf
                                            <input type="hidden" id="orderResponse" name="order_response">
                                            <button type="submit" class="btn btn-primary">
                                                yes
                                            </button>
                                        </form>
                                        <button class="btn btn-danger" data-dismiss="modal">
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($order->client->id === auth()->user()->id && $order->state->name == 'progress')
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-secondary shadow-0 text-capitalize financial-btn w-100"
                                data-toggle="modal" data-target="#exampleModal">
                            Complete The Order
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('frontend.order.feedback-as-client', $order->id) }}"
                                          method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Complete the order</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-black">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Rate the Order:</label>
                                                <br/>
                                                <div class="rating" data-rate-value=6></div>
                                                <input type="hidden" name="rating" id="orderRating" value="1"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Feedback:</label>
                                                <textarea name="feedback" class="form-control" rows="10"
                                                          id="message-text"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer container">
                                            <div class="row w-100">
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-outline-primary w-100 my-2">
                                                        Complete Order
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="button" class="btn btn-outline-danger w-100 my-2"
                                                            data-dismiss="modal">Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($order->provider->id === auth()->user()->id && !$order->client_given_rating && $order->state->name === 'progress')
                    <div class="card-footer text-center">
                        <a href="{{ route('frontend.order.deliver', $order->id) }}" type="button"
                           class="btn btn-secondary shadow-0 text-capitalize financial-btn w-100">
                            Deliver
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/user_panel/orders.js') }}" defer></script>
@endsection

