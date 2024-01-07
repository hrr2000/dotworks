@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="panel-body-header">
        <h1>{{ __('Orders') }}</h1>
        <p>{{ __('Orders coming from employers for your services.') }}</p>
    </div>
    <div class="w-100">
        <div class="table-box table-responsive">
            <table id="ordersTable" class="table" data-source-url="{{ route('frontend.order.index') }}">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>
                        <i class="fa fa-search"></i>
                        <input id="ordersSearch" class="border-0" style="outline: 0;" type="search"
                               placeholder="Service Name Or Others"/>
                    </th>
                    <th>Client</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
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
    <script src="{{ url('js/user_panel/orders.js') }}" defer></script>
@endsection
