@extends('frontend.layouts.app')

@section('content')
    <div class="">
        <ul class="nav mb-3 dashboard-bar" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link   active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="pills-home" aria-selected="true">
                    <span class="point"></span>
                    <i class="fa fa-th-large"></i>
                    {{ __('All') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                   aria-controls="pills-profile" aria-selected="false">
                    <span class="point"></span>
                    <i class="fa fa-chart-pie"></i>
                    {{ __('Statistics') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                   aria-controls="pills-contact" aria-selected="false">
                    <span class="point"></span>
                    <i class="fa fa-bell"></i>
                    {{ __('Notifications') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                   aria-controls="pills-contact" aria-selected="false">
                    <span class="point"></span>
                    <i class="fa fa-comment"></i>
                    {{ __('Messages') }}</a>
            </li>
        </ul>
        <hr>
        <div id="statistics-box">
            <h6 class="category-head"><i class="fa fa-chart-pie"></i> {{ __('Statistics') }}</h6>
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-box"
                         style="background-image: url('{{ asset('images/userpanel/dashboard/services-box.png') }}');">
                        <span class="stats-txt">
                            <p>{{ auth()->user()->services->count() }}</p>
                            <p style="font-size: .8rem;">{{ __('My Services') }}</p>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box"
                         style="background-image: url('{{ asset('images/userpanel/dashboard/finance-box.png') }}');">
                        <span class="stats-txt">
                            <p>50</p>
                            <p style="font-size: .8rem;">{{ __('My Earnings') }}</p>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box"
                         style="background-image: url('{{ asset('images/userpanel/dashboard/working-services-box.png') }}');">
                        <span class="stats-txt">
                            <p>{{ auth()->user()->orders->where('state_id', 2)->count() }}</p>
                            <p style="font-size: .8rem;">{{ __('Services being worked on') }}</p>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box"
                         style="background-image: url('{{ asset('images/userpanel/dashboard/sold-services-box.png') }}');">
                        <span class="stats-txt">
                            <p>50</p>
                            <p style="font-size: .8rem;">{{ __('Sold Services') }}</p>
                        </span>
                    </div>
                </div>
                @if(0)
                    <div class="stats-box w-100" style="background: white;height: auto;overflow: auto;">
                        <canvas id="myChart" height="400"></canvas>
                    </div>
                @endif
            </div>
            <br>
            <h6 class="category-head"><i class="fa fa-bell"></i> {{ __('Notifications') }}</h6>
            <br>
            <h6 class="category-head"><i class="fa fa-bell"></i> {{ __('Messages') }}</h6>
            <div class="panel-content p-4 w-50">
                <h3 class="font-weight-bold">Latest Messages</h3>
                <br>
                <div class="contacts-box">
                    @foreach($contacts as $idx => $contact)
                        <a href="{{ route('frontend.message.contact', $users[$idx]->username) }}"
                           class="contact btn shadow-0 text-left text-capitalize">
                            <div class="contact__image">
                                <img src="{{ $users[$idx]->avatar() }}"/>
                            </div>
                            <div class="contact__body">
                                <div class="contact__username">
                                    {{ $users[$idx]->fullName() }}
                                </div>
                                <div class="contact__time">
                                    {{ date('h:m A d-m-Y', strtotime($contact['date'])) }}
                                </div>
                                <div class="contact__message">
                                    {{ $contact['message'] }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script defer>
        $(function () {

            const ctx = document.getElementById('myChart');
            const DATA_COUNT = 7;
            const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};
            const myChart = new chart.Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Sat", "Sun", "Mon", "Tues", "Wed", "Thurs", "Fri"],
                    datasets: [
                        {
                            label: "Earnings    ($)",
                            backgroundColor: "#00E4DB",
                            data: [133, 221, 783, 2478, 12, 33, 645]
                        }, {
                            label: "Sold Services",
                            backgroundColor: "#4C71F0",
                            data: [408, 547, 675, 734, 122, 3213, 22]
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Population growth (millions)'
                    }
                }
            });
        });
    </script>
@endsection
