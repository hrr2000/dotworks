@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="panel-body-header">
        <h1>{{ __('Order Delivery') }}</h1>
        <p>{{ __('Deliver the project files and required data for the client in order to be reviewed and paid.') }}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-0">
                <div id="deliverySteps" class="card-body">
                    <div class="step-box d-flex @if($order->start_delivery) finished @endif">
                        <div class="px-3 pb-3">
                            <span
                                class="btn btn-primary disabled @if($order->start_delivery) opacity-50 @else opacity-100 @endif">1</span>
                        </div>
                        <div id="confirmDeliveryStep" class="px-3">
                            <h4 class="text-primary font-weight-bold text-capitalize">
                                Confirm The Delivery Process
                            </h4>
                            <p class="text-black-50">
                                <span>{{ auth()->user()->first_name }},</span> Are you sure you want to submit the final
                                project now?
                            </p>
                            @if(!$order->start_delivery)
                                <div class="step-content py-3">
                                    <button id="confirmDeliveryButton" data-token="{{ csrf_token() }}"
                                            data-url="{{ route('frontend.order.delivery.start', $order->id) }}"
                                            type="button" class="btn btn-primary px-4 font-weight-bold">Accept
                                    </button>
                                    <span class="font-weight-bold d-block py-2" style="color: rgba(56, 67, 100, .6);">Agree to hand over</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="step-box d-flex @if($order->files_uploaded) finished @endif">
                        <div class="px-3 pb-3">
                            <span
                                class="btn btn-primary disabled @if($order->files_uploaded) opacity-50 @else opacity-100 @endif">2</span>
                        </div>
                        <div id="UploadFilesStep" class="px-3">
                            <h4 class="text-primary font-weight-bold text-capitalize">
                                Files Upload
                            </h4>
                            <p class="text-black-50">
                                Please select the project files to be uploaded.
                            </p>
                            @if(!$order->files_uploaded)
                                <input id="orderFileUpload" type="file" class="d-none"/>
                                <div class="step-content py-3">
                                    <form action="{{ route('frontend.order.delivery.upload') }}" id="deliveryUploadForm"
                                          enctype="multipart/form-data"
                                          class="dropzone sz-clickable file-upload dz-default dz-message">
                                        @csrf
                                        <div class="file-upload__drag w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="76.999" height="67"
                                                 viewBox="0 0 76.999 67">
                                                <path id="cloud_up"
                                                      d="M417.686,191.215V169.271l-1.408,1.4a4.837,4.837,0,0,1-6.8,0,4.756,4.756,0,0,1,0-6.766l9.624-9.57a4.8,4.8,0,0,1,6.8,0l9.624,9.57a4.756,4.756,0,0,1,0,6.766,4.837,4.837,0,0,1-6.8,0l-1.408-1.4v21.944a4.814,4.814,0,0,1-9.629,0Zm28.878-21.578a5.079,5.079,0,0,1,2.1-3.937,7.145,7.145,0,0,0,2.711-5.6,6.558,6.558,0,0,0-.433-2.39,7.187,7.187,0,0,0-6.783-4.785,6.522,6.522,0,0,0-2.889.62,19.264,19.264,0,0,0-35.613-5.074,8.292,8.292,0,0,0-2.417-.332,9.708,9.708,0,0,0-9.442,7.71,9.508,9.508,0,0,0,3.084,9.023,4.624,4.624,0,0,1,1.555,3.484v.034a4.831,4.831,0,0,1-8.074,3.536A19.017,19.017,0,0,1,384,157.71a19.209,19.209,0,0,1,16.845-18.994A29.094,29.094,0,0,1,422.5,129a28.68,28.68,0,0,1,25.217,14.734,16.727,16.727,0,0,1,12.271,10.72A16.04,16.04,0,0,1,461,160.1a16.675,16.675,0,0,1-6.6,13.279,4.921,4.921,0,0,1-3,1.026A4.77,4.77,0,0,1,446.563,169.637Z"
                                                      transform="translate(-384 -129)" fill="#00a2ff"/>
                                            </svg>
                                        </div>
                                        <div class="file-upload__loader">
                                            <span class="file-name"></span>
                                            <span class="file-name"></span>
                                        </div>
                                    </form>
                                    <button class="btn btn-primary my-3" data-token="{{ csrf_token() }}"
                                            data-url="{{ route('frontend.order.delivery.upload.confirm', $order->id) }}"
                                            id="confirmFilesButton">Confirm Files
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="step-box d-flex">
                        <div class="px-3 pb-3">
                            <span class="btn btn-primary disabled @if(0) opacity-50 @else opacity-100 @endif">3</span>
                        </div>
                        <div id="confirmStep" class="px-3">
                            <h4 class="text-primary font-weight-bold text-capitalize">
                                Confirmation
                            </h4>
                            <p class="text-black-50">
                                Make sure that your payment is made successfully and your balance is updated.
                            </p>
                        </div>
                        <div class="step-content w-100 px-3 my-3">
                            <form action="{{ route('frontend.order.feedback-as-provider', $order->id) }}" method="POST">
                                @csrf
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
                                <button type="submit" class="btn btn-outline-primary w-100 my-2">Complete Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="card-footer text-center">
                    @if($order->state->name == 'pending')
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/user_panel/orders.js') }}" defer></script>
@endsection
