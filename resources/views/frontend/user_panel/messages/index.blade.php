@extends('frontend.layouts.app')

@section('content')
    <div class="panel-body-header">
        <h1>{{ __('My Contacts') }}</h1>
        <p>{{ __('List of your contacts with messages.') }}</p>
    </div>
    <div class="panel-content">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="contacts-box col-10 p-0">
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search ..">
                    </div>
                </form>

                @foreach($contacts as $idx => $contact)
                    <div class="contact btn shadow-0 text-left text-capitalize">
                        <div class="contact__image d-flex flex-column justify-content-between align-items-center"
                             style="height: 55px">
                            <img src="{{ $users[$idx]->avatar() }}" style="height: 35px; width: 35px;"/>
                            <div class="d-flex py-1 w-100 justify-content-between align-items-center">
                                <input type="checkbox">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.82" height="13.125"
                                         viewBox="0 0 13.82 13.125">
                                        <path id="Path"
                                              d="M5.91,0,7.736,3.662l4.084.591L8.865,7.1l.7,4.024L5.91,9.224l-3.652,1.9.7-4.024L0,4.252l4.084-.591L5.91,0Z"
                                              transform="translate(1 1)" fill="none" stroke="#ffa84c"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('frontend.message.contact', $users[$idx]->username) }}">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
