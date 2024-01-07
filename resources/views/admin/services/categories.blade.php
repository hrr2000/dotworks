@extends('admin.layouts.layout')

@section('title')
    Categories Management
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="card-title">Categories Management</h4>
                <button class="btn btn-success" id="create_item">create new +</button>
                <table id="items_table" class="table table-striped">
                    <thead>
                    <tr>
                        <th> id </th>
                        <th> name </th>
                        <th> icon </th>
                        <th> parent </th>
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
                    <form method="post" id="items_form" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4">Name : </label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Parent Category : </label>
                            <div class="col-md-12">
                                <select name="parent_id" class="form-control" >
                                    <option value="" selected disabled hidden>Choose</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Icon : </label>
                            <div class="col-md-12">
                                <input type="file" name="icon" class="form-control"/>
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

            let cols = []

            $('#items_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.services.categories.index') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'icon',
                        name: 'icon'
                    },
                    {
                        render: function (data, type, row) {
                            return (row.parent_id == 0) ? 'None': row.parent.name
                        },
                        name: 'parent',
                    },
                    {
                        data: 'created_at',
                        name: 'created at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },

                ]
            });

            let action;

            $('#create_item').on('click',function(){
                action = 'create';
                //emptying fields

                $('.form-control[name="selected_id"]').val('');
                $('.form-control[name="name"]').val('');
                $('.form-control[name="parent_id"]').val('');
                $('.form-control[name="icon"]').val('');

                $('#formModal').modal();
            });


            $(document).on('click', '.edit',function(){
                action = 'edit';

                // filling the form

                $('.form-control[name="selected_id"]').val($(this).attr('data-id'));
                $('.form-control[name="name"]').val($(this).attr('data-name'));
                $('.form-control[name="parent_id"]').val($(this).attr('data-parent-id'));
                $('.form-control[name="icon"]').val('');

                $('#formModal').modal();
            });


            let item_id;

            $(document).on('click', '.delete', function(){
                item_id = $(this).attr('data-id');
                $('#confirmModal').modal('show');
            });

            $('#save_btn').click(function(e){
                e.preventDefault();
                dataObject = {
                    '_token' : '{{ csrf_token() }}',
                    '_method' :  action == 'edit' ? 'PUT' : 'POST',
                    'selected_id' : $('.form-control[name="selected_id"]    ').val(),
                    'name' : $('.form-control[name="name"]').val(),
                    'icon' : $('.form-control[name="icon"]').prop('files').length > 0 ? $('.form-control[name="icon"]').prop('files')[0] : '',
                    'parent_id' : $('.form-control[name="parent_id"]').val(),
                }
                let formData = new FormData();
                for (let key in dataObject) formData.append(key, dataObject[key]);
                $.ajax({
                        url:"categories/save",
                        beforeSend:function(){
                            $('#save_btn').val('Saving...');
                            $('#save_btn').attr('disabled','true');
                        },
                        type : 'POST',
                        data: formData ,
                        processData: false,
                        contentType: false,
                        success:function(data)
                        {
                            $('#save_btn').val('Save');
                            $('#save_btn').removeAttr('disabled');
                            setTimeout(function(){
                                $('#formModal').modal('hide');
                                $('#items_table').DataTable().ajax.reload();
                                if(action == 'create');
                                alert(data.message);
                            }, 500);
                        },
                        error: function(){
                            $('#save_btn').val('Save');
                            $('#save_btn').removeAttr('disabled');
                            alert('Failed To Save');
                        }
                });
            });

            $('#ok_button').click(function(){
                $.ajax({
                    url:"categories/destroy/"+item_id,
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
                        $('#ok_button').text('OK');
                        $('#ok_button').removeAttr('disabled');
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#items_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
                    },
                    error: function(){
                        $('#ok_button').text('OK');
                        $('#ok_button').removeAttr('disabled');
                        alert('failed to delete');
                    }
                });
            });
        });
    </script>
@endsection
