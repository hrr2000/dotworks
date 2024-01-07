

<div id="sidebar">
    <ul class="nav flex-column primary-links">
        <li class="nav-item">
            <a id="dashboardNavLink" class="nav-link @if(request()->segment(2) === 'dashboard') active @endif" href="{{ route('frontend.dashboard') }}" data-toggle="tooltip" data-mdb-placement="right" title="{{ __('Dashboard') }}">
                    <div class="cut cut-before">
                        <div class="curve curve-before"></div>
                    </div>
                    <div class="cut cut-after">
                        <div class="curve curve-after"></div>
                    </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20.181" height="22.201" viewBox="0 0 20.181 22.201">
                    <path id="Path" d="M0,7.071,9.091,0l9.091,7.071V18.181a2.02,2.02,0,0,1-2.02,2.02H2.02A2.02,2.02,0,0,1,0,18.181Z" transform="translate(1 1)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                    <path id="Path-2" data-name="Path" d="M0,10.1V0H6.06V10.1" transform="translate(7.06 11.101)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a id="servicesNavLink" class="nav-link @if(request()->segment(2) === 'services') active @endif" href="{{ route('frontend.service.index') }}" data-toggle="tooltip" data-mdb-placement="right" title="{{ __('Services') }}">
                    <div class="cut cut-before">
                        <div class="curve curve-before"></div>
                    </div>
                    <div class="cut cut-after">
                        <div class="curve curve-after"></div>
                    </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="21.251" height="21.488" viewBox="0 0 21.251 21.488">
                    <path id="Path_62" data-name="Path 62" d="M20.749,9.172a2.65,2.65,0,0,0-2.157-1.115H2.655A2.651,2.651,0,0,0,.5,9.172a2.713,2.713,0,0,0-.364,2.421l2.655,8.058a2.661,2.661,0,0,0,2.521,1.836H15.937a2.658,2.658,0,0,0,2.519-1.836l2.658-8.058a2.713,2.713,0,0,0-.365-2.421M15.937,18.8H5.313L2.655,10.744H18.592ZM3.983,6.715H17.265a1.343,1.343,0,0,0,0-2.686H3.983a1.343,1.343,0,0,0,0,2.686M6.64,2.686h7.969a1.336,1.336,0,0,0,1.328-1.343A1.335,1.335,0,0,0,14.609,0H6.64A1.334,1.334,0,0,0,5.313,1.343,1.335,1.335,0,0,0,6.64,2.686" transform="translate(0)" fill="#00a2ff" fill-rule="evenodd"/>
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a id="ordersNavLink" class="nav-link @if(request()->segment(2) === 'orders') active @endif" href="{{ route('frontend.order.index') }}" href="#" data-toggle="tooltip" data-mdb-placement="right" title="{{ __('Orders') }}">
                <div class="cut cut-before">
                    <div class="curve curve-before"></div>
                </div>
                <div class="cut cut-after">
                    <div class="curve curve-after"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.883" height="16.674" viewBox="0 0 19.883 16.674">
                    <path id="Path_11" data-name="Path 11" d="M18.132,8.5V19.1H3.5V8.5" transform="translate(-0.874 -3.424)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    <rect id="Rectangle_5" data-name="Rectangle 5" width="17.883" height="4.076" transform="translate(1 1)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    <line id="Line_10" data-name="Line 10" x2="3.252" transform="translate(8.316 8.337)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a id="ordersNavLink" class="nav-link @if(request()->segment(2) === 'messages') active @endif" href="{{ route('frontend.message.index') }}" href="#" data-toggle="tooltip" data-mdb-placement="right" title="{{ __('Messages') }}">
                <div class="cut cut-before">
                    <div class="curve curve-before"></div>
                </div>
                <div class="cut cut-after">
                    <div class="curve curve-after"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path id="Path" d="M18,12a2,2,0,0,1-2,2H4L0,18V2A2,2,0,0,1,2,0H16a2,2,0,0,1,2,2Z" transform="translate(1 1)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a id="walletNavLink" class="nav-link @if(request()->segment(2) === 'wallet') active @endif" href="{{ route('frontend.wallet.index') }}" href="{{ route('frontend.wallet.index') }}" data-toggle="tooltip" data-mdb-placement="right" title="Wallet">
                <div class="cut cut-before">
                    <div class="curve curve-before"></div>
                </div>
                <div class="cut cut-after">
                    <div class="curve curve-after"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.984" height="15.488" viewBox="0 0 19.984 15.488">
                    <rect id="Rectangle" width="17.984" height="13.488" rx="2" transform="translate(1 1)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                    <path id="Path" d="M0,.375H17.984" transform="translate(1 5.683)" fill="none" stroke="#00a2ff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                </svg>
            </a>
        </li>
    </ul>
    <ul class="nav flex-column secondary-links mt-5">
        <li class="nav-item">
            <a id="settingsNavLink" class="nav-link @if(request()->segment(2) === 'profile') active @endif" href="{{ route('frontend.profile.edit') }}" data-toggle="tooltip" data-mdb-placement="right" title="Settings">
                    <div class="cut cut-before">
                        <div class="curve curve-before"></div>
                    </div>
                    <div class="cut cut-after">
                        <div class="curve curve-after"></div>
                    </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.94" height="19.087" viewBox="0 0 19.94 19.087">
                    <path id="settings" d="M18.5,15.78a2.47,2.47,0,0,1,2.32-1.25,1,1,0,0,0,1-.82,9.82,9.82,0,0,0,0-3.42,1,1,0,0,0-1-.82A2.47,2.47,0,0,1,18.5,8.22a2.5,2.5,0,0,1,.09-2.65,1,1,0,0,0-.21-1.32,10,10,0,0,0-2.91-1.69A1,1,0,0,0,14.23,3,2.47,2.47,0,0,1,9.77,3a1,1,0,0,0-1.24-.48A10,10,0,0,0,5.62,4.25a1,1,0,0,0-.21,1.32A2.5,2.5,0,0,1,5.5,8.22,2.47,2.47,0,0,1,3.18,9.47a1,1,0,0,0-1,.82,9.82,9.82,0,0,0,0,3.42,1,1,0,0,0,1,.82A2.47,2.47,0,0,1,5.5,15.78a2.5,2.5,0,0,1-.09,2.65,1,1,0,0,0,.21,1.32,10,10,0,0,0,2.91,1.69A1,1,0,0,0,9.77,21a2.47,2.47,0,0,1,4.46,0,1,1,0,0,0,1.24.48,10,10,0,0,0,2.91-1.69,1,1,0,0,0,.21-1.32,2.5,2.5,0,0,1-.09-2.69ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Z" transform="translate(-2.03 -2.456)" fill="#00a2ff"/>
                </svg>
            </a>
        </li>
        <!--
        <li class="nav-item">
            <a class="nav-link" href="/frontend/services" data-toggle="tooltip" data-mdb-placement="right" title="Services">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.88" height="19.88" viewBox="0 0 19.88 19.88">
                    <path id="Path_104" data-name="Path 104" d="M18.638,11.183a1.243,1.243,0,0,0,0-2.485H17.4V7.455h1.243a1.243,1.243,0,0,0,0-2.485H17.4A2.485,2.485,0,0,0,14.91,2.485V1.243a1.243,1.243,0,0,0-2.485,0V2.485H11.183V1.243a1.243,1.243,0,0,0-2.485,0V2.485H7.455V1.243a1.243,1.243,0,0,0-2.485,0V2.485A2.486,2.486,0,0,0,2.485,4.97H1.243a1.243,1.243,0,0,0,0,2.485H2.485V8.7H1.243a1.243,1.243,0,1,0,0,2.485H2.485v1.243H1.243a1.243,1.243,0,0,0,0,2.485H2.485A2.485,2.485,0,0,0,4.97,17.4v1.243a1.243,1.243,0,0,0,2.485,0V17.4H8.7v1.243a1.243,1.243,0,0,0,2.485,0V17.4h1.243v1.243a1.243,1.243,0,0,0,2.485,0V17.4A2.484,2.484,0,0,0,17.4,14.91h1.243a1.243,1.243,0,1,0,0-2.485H17.4V11.183ZM14.91,14.91H4.97V4.97h9.94ZM12.425,7.455H7.455v4.97h4.97Z" fill="#00a2ff" fill-rule="evenodd"/>
                </svg>
            </a>
        </li>
        -->
        <li class="nav-item">
            <a onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link" href="#" data-toggle="tooltip" data-mdb-placement="right" title="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="17.306" height="19.623" viewBox="0 0 17.306 19.623">
                    <path id="Path_105" data-name="Path 105" d="M14.364,4.6a1.223,1.223,0,0,0-2,.945v.011a1.275,1.275,0,0,0,.446.946A6.157,6.157,0,1,1,2.474,11.04,6.126,6.126,0,0,1,4.5,6.5a1.278,1.278,0,0,0,.445-.946A1.216,1.216,0,0,0,3.71,4.342a1.249,1.249,0,0,0-.84.319A8.57,8.57,0,0,0,.077,12.217,8.66,8.66,0,0,0,17.306,11.04,8.515,8.515,0,0,0,14.364,4.6m-5.71,6.44A1.234,1.234,0,0,0,9.89,9.813V1.227a1.236,1.236,0,0,0-2.472,0V9.813A1.235,1.235,0,0,0,8.654,11.04" transform="translate(0)" fill="#00a2ff" fill-rule="evenodd"/>
                </svg>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
