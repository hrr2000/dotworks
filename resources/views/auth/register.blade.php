@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row justify-content text-left">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-md-3 col-form-label text-md-left">{{ __('FirstName') }}<span
                                                style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="first-name" type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   name="first_name" value="{{ old('first_name') }}"
                                                   autocomplete="first_name" autofocus>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-md-3 col-form-label text-md-left">{{ __('SecondName') }}<span
                                                style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="last-name" type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   name="last_name" value="{{ old('last_name') }}"
                                                   autocomplete="last_name" autofocus>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username"
                                               class="col-md-3 col-form-label text-md-left">{{ __('Username') }}<span
                                                style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="username" type="text"
                                                   class="form-control @error('username') is-invalid @enderror"
                                                   name="username" value="{{ old('username') }}" autocomplete="username"
                                                   autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-3 col-form-label text-md-left">{{ __('E-Mail Address') }}
                                            <span style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-3 col-form-label text-md-left">{{ __('Password') }}<span
                                                style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-3 col-form-label text-md-left">{{ __('Confirm Password') }}
                                            <span style="color: red !important;">*</span> </label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="type" class="col-md-3 col-form-label text-md-left">{{ __('type') }}
                                            <span style="color: red !important;">*</span></label>

                                        <div class="col-md-8">
                                            <select id="type" name="type"
                                                    class="form-control @error('type') is-invalid @enderror">
                                                @php
                                                    $roles = DB::table('user_roles')->get();
                                                @endphp
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="language"
                                               class="col-md-3 col-form-label text-md-left">{{ __('Language') }}<span
                                                style="color: red !important;">*</span></label>

                                        <div class="col-md-8">
                                            <select id="language" name="language"
                                                    class="form-control @error('language') is-invalid @enderror">
                                                <option value="ar">Arabic</option>
                                                <option value="en">English</option>
                                            </select>
                                            @error('language')
                                            <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="country" class="col-md-3 col-form-label text-md-left">Country<span
                                                style="color: red !important;">*</span> </label>
                                        <div class="col-md-8">
                                            <select id="country" name="country"
                                                    class="form-control @error('language') is-invalid @enderror">\
                                                @php
                                                    $countries = DB::table('countries')->get();
                                                @endphp
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                            <span style="color:#e3342f;font-size: 80%;margin-top: 0.25rem;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-3">
                                            <button type="submit" class="btn btn-primary w-100">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
