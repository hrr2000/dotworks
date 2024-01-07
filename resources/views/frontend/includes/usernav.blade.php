<nav id="user-nav" class="navbar navbar-expand navbar-dark">
<div class="lang-coin">
    <button class="coin-btn">USD $</button>
    <span class="sep"></span>
    <button class="lang-btn" data-toggle="modal" data-target="#lang-model">
        @if(session()->get('locale')=='ar')
        عربى&nbsp;
        <img src="{{ asset('images/flags/egypt.jpg') }}" alt="Arabic Language">
        @else
        English&nbsp;
        <img src="{{ asset('images/flags/usa.jpg') }}" alt="English Language">
        @endif
    </button>
</div>
<div class="user-data ml-auto">
    <a id="navbarDropdown" style="padding:0;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <div>
            <h2>{{ auth()->user()->fullName() }}</h2>
            <h6>{{ auth()->user()->job }}</h6>
            <p><i class="fa fa-star"></i>&nbsp; 5.0</p>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('frontend.dashboard') }}">
            <i class="fa fa-list"></i> {{ __('Dashboard') }}
        </a>
        <a class="dropdown-item" href="{{ auth()->user()->getProfileUrl() }}">
            <i class="fa fa-user"></i> {{ __('My profile') }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
<img src="{{ url(auth()->user()->avatar()) }}" alt="{{ auth()->user()->fullName() }}">
</nav>



