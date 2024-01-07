@extends('frontend.layouts.app')

@section('content')
    <div class="panel-body-header">
        <h1>{{ __('Create Service') }}</h1>
        <p>{{ __('Bring your business into Dotworks world') }}</p>
    </div>
    <div class="panel-content">
        <form id="serviceForm" method="POST" action="{{ route('frontend.service.create') }}" enctype="multipart/form-data">

            @csrf

            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if(session()->has('errorMsg'))
                <div class="alert alert-success">
                    {{ session()->get('errorMsg') }}
                </div>
            @endif
            <div class="form-group row">
                <label for="title" class="col-md-12 col-form-label text-md-left">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" name="title" placeholder="ex: Logo design" type="text"
                           class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                           autocomplete="title">
                    <span id="title_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-md-12 col-form-label text-md-left">{{ __('Category') }}</label>
                <div class="col-md-6">
                    <select class="form-control" id="category" name="category" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                           class="form-control @error('overview') is-invalid @enderror" value="{{ old('overview') }}"
                           autocomplete="overview" required>
                    <span id="overview_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-12 col-form-label text-md-left">{{ __('Description') }}</label>
                <div class="col-md-12">
                    <textarea id="description" name="description" rows="7"
                              placeholder="ex: making websites with the following attributes..." type="text"
                              class="form-control @error('description') is-invalid @enderror"
                              autocomplete="description">{{ old('description') }}</textarea>
                    <span id="description_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>


            <div class="form-group row">
                <label for="guarantee"
                       class="col-md-12 col-form-label text-md-left">{{ __('Service with guarantee ?') }}</label>
                <div class="col-md-12">
                    <select class="form-control" id="guarantee" name="guarantee"
                            class="form-control @error('guarantee') is-invalid @enderror"
                            value="{{ old('guarantee') }}">
                        <option value="0">none</option>
                        <option value="1">1 day</option>
                        <option value="7">1 week</option>
                        <option value="30">1 month</option>
                        <option value="365">1 year</option>
                    </select>
                    <span id="guarantee_err_msg" class="error-msg" role="alert"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-md-12 col-form-label text-md-left">{{ __('Price') }}</label>
                <div class="col-md-12">
                    <select class="form-control" id="price" name="price">
                        <option value="5">5$ (No Fees)</option>
                        @for($i=10;$i <= 240;$i+=10)
                            <option value="{{ $i }}" @if(old('price') == $i) selected @endif>{{ $i }}$</option>
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

                    <button id="image-add" type="button" class="btn btn-primary"><i class="fa fa-image"></i> Add Image +
                    </button>

                    <div id="serviceImagesBox" data-upload-url="{{ route('frontend.service.image.upload') }}"
                         class="row justify-content-start text-center"></div>

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
                <!-- Basic Package -->
                <div id="basic-package" class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="package-controllers row justify-content-between align-items-center">
                                <div class="sec">
                                    <span class="package-type badge badge-success ">Basic Order</span>
                                </div>
                                <div class="sec">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="basicSwitch"
                                               name="basic_switch" checked>
                                        <label class="custom-control-label" for="basicSwitch"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="basicBody">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Package Title" name="basic_package_title"/>
                                    <span id="basic_package_title_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control text-success" type="number" placeholder="Price In USD"
                                           name="basic_package_price">
                                    <span id="basic_package_price_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <p class="package-placeholder">Package Description</p>
                                <textarea class="form-control package-desc" placeholder="Description goes here ..."
                                          name="basic_package_desc"></textarea>
                                <span id="basic_package_desc_err_msg" class="error-msg" role="alert"></span>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6 package-delivery">
                                        <input type="number" class="form-control" placeholder="days"
                                               name="basic_package_duration">
                                        <span id="basic_package_duration_err_msg" class="error-msg" role="alert"></span>
                                    </div>
                                    <div class="col-6 package-reviews">
                                        <input type="number" class="form-control" placeholder="reviews"
                                               name="basic_package_reviews">
                                        <span id="basic_package_reviews_err_msg" class="error-msg" role="alert"></span>
                                    </div>
                                </div>
                                <div class="package-offers">
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <div class="sec">
                                            <p class="package-placeholder m-0">Package Offers</p>
                                        </div>
                                        <div class="sec">
                                            <button type="button" class="btn btn-outline-success" id="basicOfferBtn">+
                                            </button>
                                        </div>
                                    </div>
                                    <div id="basicOffers" class="offers">No Offers ..</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Basic Package -->
                <!-- Standard Package -->
                <div id="standard-package" class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="package-controllers row justify-content-between align-items-center">
                                <div class="sec">
                                    <span class="package-type badge badge-secondary">Standard Order</span>
                                </div>
                                <div class="sec">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="standardSwitch"
                                               name="standard_switch">
                                        <label class="custom-control-label" for="standardSwitch"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="standardBody" style="display: none;">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Package Title"
                                           name="standard_package_title"/>
                                    <span id="standard_package_title_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control text-secondary" type="number" placeholder="Price In USD"
                                           name="standard_package_price">
                                    <span id="standard_package_price_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <p class="package-placeholder">Package Description</p>
                                <textarea class="form-control package-desc" placeholder="Description goes here ..."
                                          name="standard_package_desc"></textarea>
                                <span id="standard_package_desc_err_msg" class="error-msg" role="alert"></span>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6 package-delivery">
                                        <input type="number" class="form-control" placeholder="days"
                                               name="standard_package_duration">
                                        <span id="standard_package_duration_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                    <div class="col-6 package-reviews">
                                        <input type="number" class="form-control" placeholder="reviews"
                                               name="standard_package_reviews">
                                        <span id="standard_package_reviews_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                </div>
                                <div class="package-offers">
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <div class="sec">
                                            <p class="package-placeholder m-0">Package Offers</p>
                                        </div>
                                        <div class="sec">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    id="standardOfferBtn">+
                                            </button>
                                        </div>
                                    </div>
                                    <div id="standardOffers" class="offers">No Offers ..</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Standard Package -->
                <!-- Premium Package -->
                <div id="premium-order" class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="package-controllers row justify-content-between align-items-center">
                                <div class="sec">
                                    <span class="package-type badge badge-warning text-white">Premium Order</span>
                                </div>
                                <div class="sec">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="premiumSwitch"
                                               name="premium_switch">
                                        <label class="custom-control-label" for="premiumSwitch"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="premiumBody" style="display: none;">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Package Title"
                                           name="premium_package_title"/>
                                    <span id="premium_package_title_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control text-warning" type="number" placeholder="Price In USD"
                                           name="premium_package_price">
                                    <span id="premium_package_price_err_msg" class="error-msg" role="alert"></span>
                                </div>
                                <p class="package-placeholder">Package Description</p>
                                <textarea class="form-control package-desc" placeholder="Description goes here ..."
                                          name="premium_package_desc"></textarea>
                                <span id="premium_package_desc_err_msg" class="error-msg" role="alert"></span>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6 package-delivery">
                                        <input type="number" class="form-control" placeholder="days"
                                               name="premium_package_duration">
                                        <span id="premium_package_duration_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                    <div class="col-6 package-reviews">
                                        <input type="number" class="form-control" placeholder="reviews"
                                               name="premium_package_reviews">
                                        <span id="premium_package_reviews_err_msg" class="error-msg"
                                              role="alert"></span>
                                    </div>
                                </div>
                                <div class="package-offers">
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <div class="sec">
                                            <p class="package-placeholder m-0">Package Offers</p>
                                        </div>
                                        <div class="sec">
                                            <button type="button" class="btn btn-outline-warning" id="premiumOfferBtn">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div id="premiumOffers" class="offers">No Offers ..</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Premium Package -->
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



