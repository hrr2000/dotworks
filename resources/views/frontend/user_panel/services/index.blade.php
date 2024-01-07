@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="panel-body-header">
        <h1>{{ __('My Services') }}</h1>
        <p>{{ __('All your offers on Dotworks platform') }}</p>
    </div>
    <div class="w-100">
        <div class="table-box table-responsive">
            <table id="servicesTable" data-source-url="{{ route('frontend.service.index') }}" class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>
                        <i class="fa fa-search"></i>
                        <input id="servicesSearch" class="border-0" style="outline: 0;" type="search"
                               placeholder="Service Name Or Others"/>
                    </th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Rate</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <a id="create-service-btn" class="btn btn-light ripple-surface-dark" href="{{ route('frontend.service.create') }}">
        <i style="margin: auto" class="fa fa-edit"></i>
    </a>
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button
                        style="font-size: 40px;font-family: initial;font-weight: 400;position: absolute;top: 20px;right: 20px;"
                        type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="$('#delete-modal').modal('hide');">
                        <span aria-hidden="true" class="text-black">&times;</span>
                    </button>
                    <div class="danger-msg-icon">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <h4>Delete Service</h4>
                    <p>By deleting this service you you will lose all it's data (Messages, Agreements).</p>
                    <button type="button" class="delete-btn ripple w-100" onclick="$('#delete-form').submit();">Delete
                    </button>
                </div>
                <form method="POST" action="" id="delete-form">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('js/user_panel/services.js') }}" defer></script>
@endsection
