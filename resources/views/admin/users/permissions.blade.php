@extends('admin.layouts.layout')

@section('title')
    Permissions Management
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="card-title">Permissions Management</h4>
                <button class="btn btn-success" id="create_item">create new +</button>
                <table id="items_table" class="table table-striped">
                    <thead>
                    <tr>
                        <th> id </th>
                        <th> name </th>
                        <th> number of roles </th>
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
                            <label class="control-label col-md-4" >Name : </label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" />
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


            $('#items_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.users.permissions.index') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'action',
                        name: 'name'
                    },
                    {
                        data: 'number_of_roles',
                        name: 'number of roles'
                    },
                    {
                        data: 'created_at',
                        name: 'created at'
                    },
                    {
                        data: 'actions',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            let action;

            $('#create_item').on('click',function(){
                action = 'create';
                //emptying fields

                $('.form-control[name="selected_id"]').val('');
                $('.form-control[name="name"]').val('');

                $('#formModal').modal();
            });


            $(document).on('click', '.edit',function(){
                action = 'edit';

                // filling the form

                $('.form-control[name="selected_id"]').val($(this).attr('data-id'));
                $('.form-control[name="name"]').val($(this).attr('data-name'));

                $('#formModal').modal();
            });


            let item_id;

            $(document).on('click', '.delete', function(){
                item_id = $(this).attr('data-id');
                $('#confirmModal').modal('show');
            });

            $('#save_btn').click(function(e){
                e.preventDefault();
                $.ajax({
                    url:"permissions/save",
                    beforeSend:function(){
                        $('#save_btn').val('Saving...');
                        $('#save_btn').attr('disabled','true');
                    },
                    type : action == 'edit' ? 'PUT' : 'POST',
                    data: {
                        '_token' : '{{ csrf_token() }}',
                        'selected_id' : $('.form-control[name="selected_id"]').val(),
                        'name' : $('.form-control[name="name"]').val(),
                        'description' : $('.form-control[name="description"]').val(),
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
                    url:"permissions/destroy/"+item_id,
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
