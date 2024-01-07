
<div class="card col-lg-10">
    <div data-toggle="collapse"  style="cursor:pointer;" data-target="#acc-set" class="card-header d-flex">
        <div class="col-11">
            <h5 class="font-weight-bold text-black-50 ">{{ __('Account Settings') }}</h5>
        </div>
        <div class="col-1 text-right">
            <i class="fa fa-caret-down"></i>
        </div>
    </div>
    <div id="acc-set" class="card-body collapse">
    <form action="{{ route('frontend.profile.account') }}" method="POST" class="pl-5 pr-5">
        @csrf
        <input type="hidden" name="_method" value="PUT"/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="username" class="col-form-label text-md-left">
                        {{__('Username')}}
                    </label>
                    <input id="username" value="{{ auth()->user()->username }}" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email" class="col-form-label text-md-left">
                        Email Address
                    </label>
                    <input id="email" type="text" class="form-control " name="email" value="{{ auth()->user()->email }}" autocomplete="email" />
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="justify-content">

                    <div class="form-group">
                        <label for="AccountOldPassword" class="col-form-label text-md-left">
                            Old Password (Account)
                        </label>
                        <input id="AccountOldPassword" name="account_old_password" type="password" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="AccountNewPassword" class="col-form-label text-md-left">
                            New Password (Account)
                        </label>
                        <input id="AccountNewPassword" name="account_new_password" type="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="AccountConfirmNewPassword" class="col-form-label text-md-left">
                            Confirm New Password (Account)
                        </label>
                        <input id="AccountConfirmNewPassword" name="account_confirm_new_password" type="password" class="form-control">
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="justify-content">

                    <div class="form-group">
                        <label for="settingsOldPassword" class="col-form-label text-md-left">
                            Old Password (Settings)
                        </label>
                        <input id="settingsOldPassword" name="settings_old_password" type="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="settingsNewPassword" class="col-form-label text-md-left">
                            New Password (Settings)
                        </label>
                        <input id="settingsNewPassword" name="settings_new_password" type="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="settingsConfirmNewPassword" class="col-form-label text-md-left">
                            Confirm New Password (Settings)
                        </label>
                        <input id="settingsConfirmNewPassword" name="settings_confirm_new_password" type="password" class="form-control">
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>
</div>
