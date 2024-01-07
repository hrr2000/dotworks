@extends('frontend.layouts.template')

@section('title',$user->fullName())
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
    <div class="content">
        <div id="user-banner-slider" class="carousel slide carousel-slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @if(count($slides))
                    @foreach($slides as $key=>$slide)
                        <li data-target="#user-banner-slider" data-slide-to="{{ $key }}"
                            @if($loop->first) class="active" @endif></li>
                    @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($slides as $slide)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{ url($slide->path().$slide->name) }}">
                    </div>
                @endforeach
                @else
                    <li data-target="#user-banner-slider" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('images/default-banner.jpg') }}">
                        </div>
                        @endif
                        @auth
                            @if(auth()->user()->id == $user->id)
                                <a href="{{ route('frontend.profile.edit') }}" class="btn btn-primary" id="edit-profile">Edit
                                    Profile</a>
                            @endif
                        @endauth
                    </div>
            </div>
            <div class="container">
                <div class="row user-data">
                    <div class="col-md-3" style="padding:0;">
                        <div class="main-info-wrapper">
                            <div class="main-info">
                                <div class="user-image">
                                    @if($user->is_online())
                                        <span class="status active" data-toggle="tooltip" title="Online"></span>
                                    @else
                                        <span class="status" data-toggle="tooltip" title="Offline"></span>
                                    @endif
                                    <img src="{{ url($user->avatar()) }}">
                                    <span class="level"><span class="level-txt">BIG MERCHANTS</span><i
                                            class="fa fa-star"></i></span>
                                </div>
                                <div class="">
                                    <h2 class="user-name">
                                        {{ $user->fullName() }}
                                    </h2>
                                    <h3 class="user-job">
                                        {{ $user->job }}
                                    </h3>
                                    <p class="user-rating">
                                        <i class="fa fa-star"></i> 5.0
                                    </p>
                                    @if($user->description)
                                        <p class="user-desc">
                                            {{ $user->description }}
                                        </p>
                                    @endif
                                    <div class="text-center">
                                        <a href="#" class="send-message-btn"><i class="fa fa-comment"></i> Send Message</a>
                                    </div>
                                    <div class="life-info">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 col-6">
                                                <i class="fa fa-user"></i> Member since
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-6">
                                                <span>{{ $user->created_at->format('M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 col-6">
                                                <i class="fa fa-map-marker"></i> Location
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-6">
                                                <span>{{ $user->country }}</span>
                                            </div>
                                        </div>
                                        @if($user->university)
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 col-6">
                                                    <i class="fa fa-university"></i> Studied at
                                                </div>
                                                <div class="col-md-6 col-xs-6 col-6">
                                                    <span>{{ $user->university }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($user->response_time)
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 col-6">
                                                    <i class="fa fa-clock"></i> Response time
                                                </div>
                                                <div class="col-md-6 col-xs-6 col-6">
                                                    <span>{{ $user->response_time }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        <hr>
                                        <div class="text-center"><a href="#"><i class="fa fa-exclamation-circle"></i>
                                                Report Member</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($user->type != 'frontend')
                            <div class="sec-info-wrapper">
                                <h3>My Languages</h3>
                                <hr>
                                @foreach($user_languages as $lang)
                                    <div class="info row">
                                        <div class="col-md-6 col-xs-6 col-6">
                                            {{ $lang->name }}
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-6">
                                            <div class="row" style="padding: 0 25px;">
                                                <div class="dash @if($lang->level >= 1) active @endif"
                                                     data-toggle="tooltip" title="Beginner"></div>
                                                <div class="dash @if($lang->level >= 2) active @endif"
                                                     data-toggle="tooltip" title="Intermediate"></div>
                                                <div class="dash @if($lang->level == 3) active @endif"
                                                     data-toggle="tooltip" title="Advanced"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                                <h3>My Skills</h3>
                                <hr>
                                @foreach($skills as $skill)
                                    <div class="info row">
                                        <div class="col-md-6 col-xs-6 col-6">
                                            {{ $skill->name }}
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-6">
                                            <div class="row" style="padding: 0 25px;">
                                                <div class="dash @if($skill->level >= 1) active @endif"
                                                     data-toggle="tooltip" title="Beginner"></div>
                                                <div class="dash @if($skill->level >= 2) active @endif"
                                                     data-toggle="tooltip" title="Intermediate"></div>
                                                <div class="dash @if($skill->level == 3) active @endif"
                                                     data-toggle="tooltip" title="Advanced"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                                <h3>Certificates</h3>
                                <hr>
                                <h5>Udacity - Web Development</h5>
                                <h5>Hackerrank - Porblem Solving</h5>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <section class="services">
                            <div class="services-header">
                                <h1>{{ __('About') }}</h1>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="container text-center">{{ $user->company_desc }}</div>
                            </div>
                            <div class="services-header">
                                <h1>{{ __('My Services') }}</h1>
                                <hr>
                            </div>
                            <div class="row">
                                @if(!count($services))
                                    <div
                                        class="container text-center">{{ $user->fullName() .__(" haven't create any services yet") }}</div>
                                @endif
                                @foreach($services as $service)
                                    <div class="col-md-4">
                                        <div class="card service">
                                            <div id="service-{{ $service->id }}"
                                                 class="carousel slide carousel-slide service-slider"
                                                 data-ride="carousel">
                                                <div class="cover"></div>
                                                <ol class="carousel-indicators">
                                                    @for($i=0;$i < count($service->images);$i++)
                                                        <li data-target="#service-{{ $service->id }}"
                                                            data-slide-to="{{ $i }}"
                                                            class="@if($i === 0 ) active @endif "></li>
                                                    @endfor
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach($service->images as $key => $image)
                                                        <div class="carousel-item @if($key === 0 ) active @endif">
                                                            <img src="{{ $image->url() }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="body">
                                                @if($service->guarantee)
                                                    <img class="guarantee"
                                                         src="{{ url('/images/homepage/guarantee.png') }}"
                                                         data-toggle="tooltip"
                                                         title=" Guaranteed for {{ $service->guarantee }} days">
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8 col-8 text-right">
                                                        <h2>{{ $user->fullName() }}</h2>
                                                        <h3>{{ $user->job }}</h3>
                                                        <p class="rating"><i
                                                                class="fa fa-star"></i>&nbsp;{{ sprintf("%0.1f",$service->rating) }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-4" style="padding-left:0;">
                                                        @if($user->is_online())
                                                            <span class="status active" data-toggle="tooltip"
                                                                  title="Online"></span>
                                                        @else
                                                            <span class="status" data-toggle="tooltip"
                                                                  title="Offline"></span>
                                                        @endif
                                                        <img src="{{ url($user->getPhotoPath().$user->avatar) }}">
                                                        <span class="level"><span class="level-txt">BIG MERCHANTS</span><i
                                                                class="fa fa-star"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p class="text-left">{{ substr($service->overview,0,50) }}...</p>
                                                </div>
                                                <div class="row options">
                                                    <div class="heart-options col-md-4 col-xs-4 col-4">
                                                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                        <a href="#"><i class="far fa-heart"></i></a>
                                                    </div>
                                                    <div class="price col-md-8 col-xs-8 col-8">
                                                        <a href="#"><span class="text-primary" style="font-size:16px;">({{ $service->sells }})</span><i
                                                                class="fa fa-truck"></i></a>
                                                        Price <span
                                                            class="text-primary">&dollar;{{ $service->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
@endsection
