@extends('frontend.layouts.template')

@section('title', 'Support')
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
    <div style="min-height: 100vh">
        <section class="question-form">
            <div class="mx-auto text-center ask-area d-flex flex-column justify-content-center align-items-between"
                 style="width: clamp(280px, 70%, 800px); height: clamp(250px, 50vh, 400px)">
                <h2 class="font-weight-bold mb-4" style="font-size: 2.2rem;">
                    Hello {{ auth()->user()->first_name }}, how can we help you ?
                </h2>
                <input type="text" class="border-0 shadow-2 p-3" style="outline: none;"
                       placeholder="Ask a question .. "/>
                <p class="mt-5" style="font-size: 18px; color: #80A3B8;">or choose a category to quickly find the help
                    you need</p>
            </div>
        </section>
        <section>
            <div class="mx-auto text-center ask-area d-flex flex-column justify-content-center align-items-between"
                 style="width: clamp(280px, 70%, 400px);">
                <h2 class="my-2" style="font-size: 2rem">
                    FAQ
                </h2>
                <p class="mt-2" style="font-size: 18px; color: #80A3B8;">
                    The most frequently asked questions on the Dotworks website, find your answer among many solutions.
                </p>
            </div>
        </section>
        <section>
            <div class="accordion my-5 mx-auto" style="width: clamp(280px, 70%, 900px);">
                @for($i = 0; $i < 4; $i++)
                    <div data-toggle="collapse" style="cursor:pointer;" data-target="#acc-set-{{ $i }}"
                         class="card-header d-flex bg-white">
                        <div class="col-11">
                            <h5 style="color: #80A3B8;">Vestibulum ante ipsum primis in faucibus?</h5>
                        </div>
                        <div class="col-1 text-right">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <div id="acc-set-{{ $i }}" class="card-body collapse px-5 text-gray">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquid
                            corporis dolorem earum hic in iure magni molestias quidem quisquam, quos, vitae voluptatem
                            voluptates voluptatibus. Architecto facilis molestias mollitia!
                        </p>
                    </div>
                @endfor
            </div>
        </section>
        <section>
            <div class="mx-auto text-center ask-area d-flex flex-column justify-content-center align-items-between my-5"
                 style="width: clamp(280px, 70%, 400px);">
                <h2 class="my-2" style="font-size: 2rem">
                    You still have a question ?
                </h2>
                <p class="mt-2" style="font-size: 18px; color: #80A3B8;">
                    You cannot find answer to your question in our FAR ? You can always contact us. We will answer to
                    yuo shortly !
                </p>
            </div>
        </section>
        <section>
            <div class="mx-auto text-center ask-area d-flex flex-column justify-content-center align-items-between my-5"
                 style="width: clamp(280px, 70%, 900px);">
                <div class="row mx-0 justify-content-between text-center w-100"
                     style="width: clamp(280px, 70%, 700px);">
                    <div class="col-md-6 my-2">
                        <div class="shadow-1 p-5 w-100 rounded-9 h-100" style="width: 200px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="42" viewBox="0 0 63 42">
                                <path id="ticket-alt-solid"
                                      d="M14,74.5H49v21H14ZM57.75,85A5.25,5.25,0,0,0,63,90.25v10.5A5.25,5.25,0,0,1,57.75,106H5.25A5.25,5.25,0,0,1,0,100.75V90.25a5.25,5.25,0,1,0,0-10.5V69.25A5.25,5.25,0,0,1,5.25,64h52.5A5.25,5.25,0,0,1,63,69.25v10.5A5.25,5.25,0,0,0,57.75,85ZM52.5,73.625A2.625,2.625,0,0,0,49.875,71H13.125A2.625,2.625,0,0,0,10.5,73.625v22.75A2.625,2.625,0,0,0,13.125,99h36.75A2.625,2.625,0,0,0,52.5,96.375Z"
                                      transform="translate(0 -64)" fill="#cbcfdc"/>
                            </svg>
                            <h5 class="font-weight-bold my-2" style="color: #999999">Create a Ticket</h5>
                            <p style="color: #80A3B8">Create a ticket and follow your problem.</p>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="shadow-1 p-5 rounded-9 w-100 h-100" style="width: 200px; background-color: #EAEAEA">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41.999" height="41.999"
                                 viewBox="0 0 41.999 41.999">
                                <path id="Path_2380" data-name="Path 2380"
                                      d="M254.25,485h-2.625v5.25h2.625v18.375l-6.326-5.25H233.25v-5.25h-1.339L228,501.38v1.995a5.312,5.312,0,0,0,.131,1.129,5.258,5.258,0,0,0,5.119,4.121h12.784l4.856,4.042a5.329,5.329,0,0,0,3.36,1.208,5.122,5.122,0,0,0,2.231-.5,5.245,5.245,0,0,0,3.019-4.751V490.25A5.265,5.265,0,0,0,254.25,485Z"
                                      transform="translate(-217.5 -471.875)" fill="#cbcfdc"/>
                                <path id="Path_2381" data-name="Path 2381"
                                      d="M237.466,503.625H250.25a5.265,5.265,0,0,0,5.25-5.25V485.25a5.265,5.265,0,0,0-5.25-5.25h-21a5.265,5.265,0,0,0-5.25,5.25v18.375a5.245,5.245,0,0,0,3.019,4.751,5.122,5.122,0,0,0,2.231.5,5.33,5.33,0,0,0,3.36-1.207l1.89-1.575Zm-8.216,0V485.25h21v13.125H235.576l-1.076.892Z"
                                      transform="translate(-224 -480)" fill="#cbcfdc"/>
                            </svg>
                            <h5 class="font-weight-bold my-2" style="color: #999999">Contact Us</h5>
                            <p style="color: #80A3B8">Contact technical support to answer your questions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
