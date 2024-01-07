@extends('admin.layouts.layout')

@section('title')
    Users Management
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="card-title">Users Management</h4>
                <table id="items_table" class="table table-striped">
                    <thead>
                    <tr>
                        <th> id </th>
                        <th> first name </th>
                        <th> last name </th>
                        <th> avatar </th>
                        <th> role </th>
                        <th> username </th>
                        <th> email </th>
                        <th> phone number </th>
                        <th> email confirmation </th>
                        <th> bio </th>
                        <th> job title </th>
                        <th> country </th>
                        <th> address </th>
                        <th> university </th>
                        <th> response time </th>
                        <th> registration ip </th>
                        <th> last login ip </th>
                        <th> last login date </th>
                        <th> verified </th>
                        <th> status </th>
                        <th> language </th>
                        <th> created at </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="items_form" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4">Username : </label>
                            <div class="col-md-12">
                                <input type="text" name="username" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Verified : </label>
                            <div class="col-md-12">
                                <select type="text" name="verified" class="form-control">
                                    <option value="1">YES</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Status : </label>
                            <div class="col-md-12">
                                <select type="text" name="status" class="form-control">
                                    <option value="" selected disabled hidden>Choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">Banned</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Role : </label>
                            <div class="col-md-12">
                                <select type="text" name="role" class="form-control">
                                    <option value="" selected disabled hidden>Choose</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input class="form-control" type="hidden" name="selected_id" id="selected_id" />
                            <input type="submit" name="action_button" id="save_btn" class="btn btn-success w-100" value="Save" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

            $('#turn-email-on').on('click',function(){

            });

            $('#items_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.users.management.index') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'first_name',
                        name: 'first name'
                    },
                    {
                        data: 'last_name',
                        name: 'last name'
                    },
                    {
                        data: 'avatar',
                        name: 'avatar'
                    },
                    {
                        data: 'role.name',
                        name: 'role'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone number',
                        defaultContent: ""
                    },
                    {
                        data: 'email_confirmed_at',
                        name: 'email confirmation',
                        defaultContent: ""
                    },
                    {
                        data: 'bio',
                        name: 'bio',
                        defaultContent: ""
                    },
                    {
                        data: 'job_title',
                        name: 'job title',
                        defaultContent: ""
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'address',
                        name: 'address',
                        defaultContent: ""
                    },
                    {
                        data: 'university',
                        name: 'university',
                        defaultContent: ""
                    },
                    {
                        data: 'response_time',
                        name: 'response time',
                        defaultContent: ""
                    },
                    {
                        data: 'registration_ip',
                        name: 'registration ip'
                    },
                    {
                        data: 'last_ip',
                        name: 'last login ip'
                    },
                    {
                        data: 'last_login',
                        name: 'last login date'
                    },
                    {
                        data: 'verified',
                        name: 'verified'
                    },
                    {
                        data: 'account_status',
                        name: 'status'
                    },
                    {
                        data: 'language',
                        name: 'language'
                    },
                    {
                        data: 'created_at',
                        name: 'created at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            let action;


            $(document).on('click', '.edit',function(){
                action = 'edit';
                $("#password_box").hide();

                // filling the form

                $('.form-control[name="selected_id"]').val($(this).attr('data-id'));
                $('.form-control[name="username"]').val($(this).attr('data-username'));
                $('.form-control[name="verified"]').val($(this).attr('data-verified'));
                $('.form-control[name="status"]').val($(this).attr('data-status'));
                $('.form-control[name="role"]').val($(this).attr('data-role'));

                $('#formModal').modal();
            });


            let user_id;

            $(document).on('click', '.delete', function(){
                user_id = $(this).attr('data-id');
                $('#confirmModal').modal('show');
            });

            $('#save_btn').click(function(e){
                e.preventDefault();
                $.ajax({
                    url:"management/save",
                    beforeSend:function(){
                        $('#save_btn').val('Saving...');
                        $('#save_btn').attr('disabled','true');
                    },
                    type : action == 'edit' ? 'PUT' : 'POST',
                    data: {
                        '_token' : '{{ csrf_token() }}',
                        'selected_id' : $('.form-control[name="selected_id"]').val(),
                        'username' : $('.form-control[name="username"]').val(),
                        'verified' : $('.form-control[name="verified"]').val(),
                        'status' : $('.form-control[name="status"]').val(),
                        'role' : $('.form-control[name="role"]').val(),
                    },
                    success:function(data)
                    {
                        $('#save_btn').val('Save');
                        $('#save_btn').removeAttr('disabled');
                        setTimeout(function(){
                            $('#formModal').modal('hide');
                            $('#items_table').DataTable().ajax.reload();
                            alert(data.message);
                        }, 500);
                    },
                    error: function(){
                        $('#save_btn').text('Save');
                        $('#save_btn').removeAttr('disabled');
                        alert('Failed To Save');
                    }
                });
            });

            $('#ok_button').click(function(){
                $.ajax({
                    url:"management/destroy/"+user_id,
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                        $('#ok_button').attr('disabled','true');
                    },
                    type : 'DELETE',
                    data: {
                        '_token' : '{{ csrf_token() }}'
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#items_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
                    },
                    error: function(){
                        $('#ok_button').text('OK');
                        $('#ok_button').attr('disabled','false');
                        alert('failed to delete');
                    }
                });
            });
        });
    </script>
@endsection
