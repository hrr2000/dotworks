<div class="panel-header w-100">
    <div class="user-avatar">>
        @include('frontend.layouts.app_layout_components.user.avatar')
    </div>
    <div class="panel-banner">
        <div class="welcome-box">
            <h3>Hi {{ auth()->user()->first_name }}, </h3>
            <h1>Welcome Back!</h1>
        </div>
    </div>
    <div class="ml-auto d-flex align-items-center justify-content-end">
        <div class="bg-light rounded-lg text-primary py-2 px-4">
            <span>Balance:</span>
            <span>{{ auth()->user()->balance }} $</span>
        </div>
    </div>
</div>
