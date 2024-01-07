<div class="lang-coin">
    <button class="coin-btn">USD $</button>
    <span class="sep"></span>
    <button class="lang-btn" data-toggle="modal" data-target="#lang-model">
        @if(session()->get('locale')=='ar')
            عربى&nbsp;
            <img src="{{ url('images/flags/egypt.jpg') }}" alt="{{ __('Arabic Language') }}">
        @else
            English&nbsp;
            <img src="{{ url('images/flags/usa.jpg') }}" alt="{{ __('English Language') }}">
        @endif
    </button>
</div>
