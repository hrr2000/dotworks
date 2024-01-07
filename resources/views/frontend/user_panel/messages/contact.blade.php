@extends('frontend.layouts.app')

@section('content')
    <div class="panel-body-header">
        <h1>{{ __('My Contacts') }}</h1>
        <p>{{ __('List of your contacts with messages.') }}</p>
    </div>
    <div class="panel-content p-4">
        <div id="chat" data-user-id="{{ auth()->user()->id }}" data-token="{{ auth()->user()->access_token }}"
             data-target-id="{{ $user->id }}">
            <div class="messages-head">
                <img class="contact__image" src="{{ $user->avatar() }}" alt="{{ $user->fullName() }}">
                <h4 class="contact__name">
                    {{ $user->fullName() }}
                    <span class="contact__username">({{ $user->username }})</span>
                </h4>
            </div>
            <div class="messages-body" v-chat-scroll="{always: false}">
                <div id="chatLoader" class="text-center d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div v-for="message in messages" class="message">
                    <span class="message__content" v-bind:class="{ me: message.from == {{ auth()->user()->id }} }">
                        @{{ message.content }}
                    </span>
                </div>
            </div>
            <form v-on:submit="send">
                <div class="form-group">
                    <input v-model="message" type="text" class="form-control" placeholder="Send ..">
                    <button class="btn btn-primary d-none">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/user_panel/messages.js') }}" defer></script>
@endsection
