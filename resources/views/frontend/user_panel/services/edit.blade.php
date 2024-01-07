@extends('frontend.layouts.app')

@section('content')
    <div class="panel-body-header">
        <h1>{{ __('Edit Service') }}</h1>
        <p>{{ __('Bring your business into Dotworks world') }}</p>
    </div>
    <div class="panel-content">
        <form id="serviceForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT"/>
            @csrf
            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            <div class="form-group row">
                <label for="title" class="col-md-12 col-form-label text-md-left">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" name="title" placeholder="ex: Logo design" type="text"
                           class="form-control @error('title') is-invalid @enderror" value="{{ $service->title }}"
                           autocomplete="title" autofocus>
                    <span id="title_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-md-12 col-form-label text-md-left">{{ __('Category') }}</label>
                <div class="col-md-6">

                    <select class="form-control" id="category" name="category">
                        <option value="">-- Choose Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id === $service->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span id="category_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="overview" class="col-md-12 col-form-label text-md-left">{{ __('Short Overview') }}</label>
                <div class="col-md-12">
                    <input id="overview" name="overview" maxlength="80"
                           placeholder="ex: I can make you a website with good design" type="text"
                           class="form-control @error('overview') is-invalid @enderror" value="{{ $service->overview }}"
                           autocomplete="overview" autofocus>
                    <span id="overview_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-12 col-form-label text-md-left">{{ __('Description') }}</label>
                <div class="col-md-12">
                    <textarea id="description" name="description" rows="5"
                              placeholder="ex: making websites with the following attributes..." type="text"
                              class="form-control @error('description') is-invalid @enderror"
                              autocomplete="description">{{ $service->description }}</textarea>
                    <span id="description_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>


            <div class="form-group row">
                <label for="guarantee"
                       class="col-md-12 col-form-label text-md-left">{{ __('Service with guarantee ?') }}</label>
                <div class="col-md-12">
                    <select class="form-control" id="guarantee" name="guarantee"
                            class="form-control @error('guarantee') is-invalid @enderror">
                        <option value="0" @if(0 == $service->guarantee) selected @endif>none</option>
                        <option value="1" @if(1 == $service->guarantee) selected @endif>1 day</option>
                        <option value="7" @if(7 == $service->guarantee) selected @endif>1 week</option>
                        <option value="30" @if(30 == $service->guarantee) selected @endif>1 month</option>
                        <option value="365" @if(365 == $service->guarantee) selected @endif>1 year</option>
                    </select>
                    <span id="guarantee_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-md-12 col-form-label text-md-left">{{ __('Price') }}</label>
                <div class="col-md-12">
                    <select class="form-control" id="price" name="price">
                        <option value="">-- Choose Price --</option>
                        <option value="5" @if(5 == $service->price) selected @endif>5$ (No Taxes)</option>
                        @for($i=10;$i < 250;$i+=10)
                            <option value="{{ $i }}" @if($i == $service->price) selected @endif>{{ $i }}$</option>
                        @endfor
                    </select>
                    <span id="price_err_msg" class="error-msg" role="alert"></span>
                    <br>
                    <div
                        class="alert alert-secondary">{{ __('Note that there is 20% Tax for all prices except 5$') }}</div>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-12 col-form-label text-md-left">{{ __('service images') }}
                    ({{ __('Put at least 1 image but Note that Maximum allowed images is 5  preferred to be 900x600') }}
                    )</label>
                <div class="col-md-12">

                    <button type="button" id="image-add" class="btn btn-primary"><i class="fa fa-image"></i> Add Image +
                    </button>

                    <div id="serviceImagesBox" data-upload-url="{{ route('frontend.service.image.upload') }}"
                         class="row justify-content-start text-center">
                        @foreach($service->images as $image)
                            <span class="service-old-image" data-url="{{ $image->url() }}"
                                  data-name="{{ $image->name }}"></span>
                        @endforeach
                    </div>

                    <span id="images_err_msg" class="error-msg" role="alert"></span>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <h4>{{ __('Service Packages') }}</h4>
                <p>
                    {{ __('organize your service in packages so that customer can choose the suitable one for the specific price and features') }}
                </p>
            </div>

            <div class="packages-box row">
                @foreach($service->packages as $package)
                    <!-- {{ ucwords($package->type) }} Package -->
                    <div id="{{ $package->type }}-package" class="service-package col-xl-4 col-lg-6 col-md-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="package-controllers row justify-content-between align-items-center">
                                    <div class="sec">
                                        <span
                                            class="package-type badge package__badge package__badge--{{ $package->type }}">{{ ucwords($package->type) }} Order</span>
                                    </div>
                                    <div class="sec">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="{{ $package->type }}Switch" name="{{ $package->type }}_switch"
                                                   @if($package->state) checked @endif>
                                            <label class="custom-control-label"
                                                   for="{{ $package->type }}Switch"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="{{ $package->type }}Body" style="@if(!$package->state) display: none; @endif">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Package Title"
                                               name="{{ $package->type }}_package_title" value="{{ $package->title }}"/>
                                        <span id="{{ $package->type }}_package_title_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control text-{{ $package->type }}" type="number"
                                               placeholder="Price In USD" name="{{ $package->type }}_package_price"
                                               value="{{ $package->price }}"/>
                                        <span id="{{ $package->type }}_package_price_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                    <p class="package-placeholder">Package Description</p>
                                    <textarea class="form-control package-desc" placeholder="Description goes here ..."
                                              name="{{ $package->type }}_package_desc">{{ $package->description }}</textarea>
                                    <span id="{{ $package->type }}_package_desc_err_msg" class="error-msg"
                                          role="alert"></span>
                                </div>
                                <div class="card-footer">
                                    <div class="row text-center">
                                        <div class="col-6 package-delivery">
                                            <input type="number" class="form-control" placeholder="days"
                                                   name="{{ $package->type }}_package_duration"
                                                   value="{{ $package->duration }}"/>
                                            <span id="{{ $package->type }}_package_duration_err_msg" class="error-msg"
                                                  role="alert"></span>
                                        </div>
                                        <div class="col-6 package-reviews">
                                            <input type="number" class="form-control" placeholder="reviews"
                                                   name="{{ $package->type }}_package_reviews"
                                                   value="{{ $package->reviews }}"/>
                                            <span id="{{ $package->type }}_package_reviews_err_msg" class="error-msg"
                                                  role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="package-offers">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="sec">
                                                <p class="package-placeholder m-0">Package Offers</p>
                                            </div>
                                            <div class="sec">
                                                <button type="button" class="btn btn-{{ $package->type }} shadow-0"
                                                        id="{{ $package->type }}OfferBtn">+
                                                </button>
                                            </div>
                                        </div>
                                        <div id="{{ $package->type }}Offers" class="offers">
                                            @if($package->offers)
                                                @foreach($package->offers as $offer)
                                                    <div id="offerBox-{{ $offer->id }}"
                                                         class="{{ $package->type }}-offer-box offer-box"
                                                         data-id="{{ $offer->id }}">
                                                        <div class="input-group mb-1 mt-1">
                                                            <div class="input-group-prepend">
                                                                <button type="button" id="delete-offer-{{ $offer->id }}"
                                                                        class="btn btn-outline-danger shadow-0 border-0">
                                                                    <i class="fa fa-trash"></i></button>
                                                            </div>
                                                            <input class="form-control ml-1" type="text"
                                                                   name="{{ $package->type }}_offers[{{ $offer->id }}][value]"
                                                                   placeholder="offer here .."
                                                                   value="{{ $offer->name }}"/>
                                                        </div>
                                                        <div class="form-check offset-2">
                                                            <input class="form-check-input offers-checkbox"
                                                                   type="checkbox" id="offerTypeCheck-{{ $offer->id }}"
                                                                   name="{{ $package->type }}_offers[{{ $offer->id }}][type]"
                                                                   value="@if($offer->is_main) on @else off @endif"
                                                                   @if($offer->is_main) checked @endif/>
                                                            <label class="form-check-label ml-2"
                                                                   for="offerTypeCheck-{{ $offer->id }}">Main
                                                                Offer</label>
                                                        </div>
                                                        <span
                                                            id="{{ $package->type }}_offers.{{ $offer->id }}.value_err_msg"
                                                            class="error-msg" role="alert"></span>
                                                    </div>
                                                @endforeach
                                            @else
                                                No Offers ..
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END {{ ucwords($package->type) }} Package -->
                @endforeach
            </div>

            <div class="form-group row mt-5 mb-5">
                <div class="col-md-12 text-left">
                    <button id="serviceSubmitBtn" data-url="{{ route('frontend.service.create') }}" type="button"
                            class="btn btn-primary save-btn d-flex flex-row justify-content-between align-items-center">
                        <i class="fa fa-save mr-2"></i>
                        <span>
                        {{ __('Save Changes') }}
                    </span>
                        <span
                            id="serviceSubmitLoader"
                            class="spinner-border spinner-border-sm ml-2"
                            role="status"
                            aria-hidden="true"
                            aria-hidden="true"
                            style="display:none; height: 1.2rem; width: 1.2rem;"
                        ></span>
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/user_panel/services.js') }}" defer></script>
@endsection
