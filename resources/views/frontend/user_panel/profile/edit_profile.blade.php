@extends('frontend.layouts.app')
@section('title','Edit Profile')
@section('content')

    <div class="row">
        <div class="card col-lg-10"> @if(session()->has('success'))
                <!-- success Alert -->
                <div class="alert alert-success container text-left">
                    <div class="pb-3 pt-2">
                        <div>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                    <button class="btn btn-success w-100" data-dismiss="alert" aria-label="Close">Ok</button>
                </div>
                @section('scripts')
                    <script type="text/javascript">
                        window.addToast('success', 'Profile Update', 'Profile Updated Successfully');
                    </script>
                @endsection
            @endif
            @if($errors->any())
                <!-- Error Alert -->
                <div class="alert alert-danger container text-left">
                    <div class="pb-3 pt-2">
                        @foreach($errors->all() as $message)
                            <div>
                                {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-danger w-100" data-dismiss="alert" aria-label="Close">Ok</button>
                </div>
            @endif
            <div data-toggle="collapse" style="cursor:pointer;" data-target="#mainInfo" class="card-header d-flex">
                <div class="col-11">
                    <h5 class="font-weight-bold text-black-50 ">{{ __('Profile Settings') }}</h5>
                </div>
                <div class="col-1 text-right">
                    <i class="fa fa-caret-down"></i>
                </div>
            </div>
            <div id="mainInfo" class="card-body collapse">
                <form id="main-info-form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put"/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div id="user-img">
                                    <img id="user-photo" class=" w-100" src="{{ url(auth()->user()->avatar()) }}">
                                    <div id="user-img-btn">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                    <input name="photo" type="file" id="user-photo-btn">
                                </div>
                            </div>
                            <div class="col-md-9">
                                @csrf
                                <div class="ml-3 mr-3 justify-content text-left">
                                    <div class="form-group row">
                                        <div class="col-md-6 p-0 pr-1">
                                            <label for="first_name" class="form-label">
                                                {{ __('First Name') }}
                                            </label>
                                            <input id="first_name"
                                                   type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   name="first_name" value="{{ auth()->user()->first_name }}"
                                                   autocomplete="first_name">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 p-0 pl-1">
                                            <label for="last_name" class="form-label">
                                                {{ __('Last Name') }}
                                            </label>
                                            <input id="last_name"
                                                   type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   name="last_name" value="{{ auth()->user()->last_name }}"
                                                   autocomplete="last_name">

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job_title" class="form-label">
                                            {{ __('Job Title') }}
                                        </label>
                                        <input id="job_title"
                                               type="text"
                                               class="form-control @error('job_title') is-invalid @enderror"
                                               name="job_title" value="{{ auth()->user()->job_title }}"
                                               autocomplete="job_title">
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ml-3 mr-3  justify-content">
                                    <div class="form-group row">
                                        <label for="country" class="col-form-label text-md-left">
                                            {{ __('Country') }}
                                        </label>
                                        <select id="country"
                                                type="text"
                                                class="form-control @error('country') is-invalid @enderror"
                                                name="country" autocomplete="name">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->name }}"
                                                        @if($country->name === auth()->user()->country) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="university" class="col-form-label text-md-left">
                                            {{ __('University') }}
                                        </label>
                                        <input id="university"
                                               type="text"
                                               class="form-control @error('university') is-invalid @enderror"
                                               name="university" value="{{ auth()->user()->university }}"
                                               autocomplete="university">

                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ml-3 mr-3  justify-content">
                                    <div class="form-group row">
                                        <label for="language" class="col-form-label text-md-left">
                                            {{ __('Default Language') }}
                                        </label>
                                        <select id="language"
                                                type="text"
                                                class="form-control @error('language') is-invalid @enderror"
                                                name="language" autocomplete="language">
                                            @foreach(['en' => 'English' ,'ar' => 'Arabic'] as $lang => $language )
                                                <option value="{{ $lang }}"
                                                        @if($lang === auth()->user()->language) selected @endif>{{ $language }}</option>
                                            @endforeach
                                        </select>
                                        @error('language')
                                        <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="response" class="col-form-label text-md-left">
                                            {{ __('Response Time') }}
                                        </label>
                                        <div class="w-100 row ml-0 p-0">
                                            <input id="response" placeholder="input a digit"
                                                   type="number"
                                                   style="@if(!auth()->user()->response_time)display:none;@endif"
                                                   class="form-control col-md-8 col-sm-8 col-8 @error('response') is-invalid @enderror"
                                                   name="response"
                                                   value="{{ filter_var(auth()->user()->response_time, FILTER_SANITIZE_NUMBER_INT) }}"
                                                   autocomplete="response">
                                            <select id="time"
                                                    type="text"
                                                    class="form-control border-left-0 col-md-4 col-sm-4 col-4 @error('time') is-invalid @enderror"
                                                    name="time" autocomplete="time">
                                                @foreach(['none','minute','hour','day'] as $time )
                                                    <option value="{{ $time }}"
                                                            @if(strpos( auth()->user()->response_time, $time) !== false) selected @endif>{{ $time }}</option>
                                                @endforeach
                                            </select>
                                            @error('response')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            @error('time')
                                            <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="bio" class="col-form-label text-md-left">
                                    {{ __('Biography') }}
                                </label>
                                <textarea id="bio"
                                          type="text"
                                          class="form-control @error('bio') is-invalid @enderror" rows="5"
                                          name="bio" autocomplete="bio">{{ auth()->user()->biography }}</textarea>

                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary ml-auto w-100"
                                onclick="$('#main-info-form').submit()">{{ __('Save Changes') }}</button>
                    </div>
                </form>
                <div id="error-photo" tabindex="-1" role="dialog" class="modal fade" aria-modal="true">
                    <div role="document" class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 id="exampleModalLongTitle" class="modal-title">Error !</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body alert-danger">
                                Please Input square image (width = height)
                            </div>
                        </div>
                    </div>
                </div>

                @include('frontend.user_panel.profile.edit_slides')

                @include('frontend.user_panel.profile.edit_languages')

                @include('frontend.user_panel.profile.edit_skills')
            </div>
        </div>


        <div class="modal fade" id="err-modal" tabindex="-1" role="dialog" aria-labelledby="error" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body container text-center alert-danger">
                        <p id="err-msg"></p>
                        <div class="container">
                            <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        @include('frontend.user_panel.profile.edit_account')
    </div>
@endsection
@section('scripts')
    <script src="{{ url('js/user_panel/profile.js') }}" defer></script>
@endsection

