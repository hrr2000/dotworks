
<div class="card">
    <div data-toggle="collapse"  style="cursor:pointer;" data-target="#languagesSettings" class="card-header d-flex">
        <div class="col-11">
            {{ __('My Languages') }}
        </div>
        <div class="col-1 text-right">
            <i class="fa fa-caret-down"></i>
        </div>
    </div>

    <div id="languagesSettings" class="card-body collapse">
    <h4>
        <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#add-lang">{{__('A D D')}} <i class="fa fa-plus"></i></button>
    </h4>
    <table id="lang-tbl" class="table table-borderless text-center">
        <thead>
        <tr>
            <th>{{ __('Language') }}</th>
            <th>{{ __('Level') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userLanguages as $lang)
            <tr id="lang-item-{{ $lang->id }}">
                <td>
                    {{ $lang->name }}
                </td>
                <td id="lang-level-{{ $lang->id }}">
                    {{ $levels[$lang->level-1] }}
                </td>
                <td>
                    <button onclick="event.preventDefault()"  class="btn btn-light lang-btn-edit" data-edit-id="{{ $lang->id }}"><i class="fa fa-edit"></i></button>
                    <button onclick="event.preventDefault()"  class="btn btn-light lang-btn-delete" data-delete-id="{{ $lang->id }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
 </div>
</div>
<!-- Add language Modal -->
<div class="modal fade" id="add-lang" tabindex="-1" role="dialog" aria-labelledby="Add a language" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Language') }}</h5>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container text-center">
                <form id="add-lang-form" method="POST" action="{{ route('frontend.profile.language.add') }}">
                    @csrf
                    <div class="form-group">
                        <select name="lang" class="form-control">
                            @foreach($languages as $lang)
                                <option value="{{ $lang->name }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="level" class="form-control">
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Advanced</option>
                        </select>
                    </div>
                    <button id="add-lang-form-btn" type="submit" class="btn btn-primary w-100" data-dismiss="modal">Done</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit language Modal -->
<div class="modal fade" id="edit-lang" tabindex="-1" role="dialog" aria-labelledby="edit a language" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Language</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container text-center">
                <form id="edit-lang-form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <select name="level" class="form-control">
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Advanced</option>
                        </select>
                    </div>
                    <button id="edit-lang-form-btn" type="button" data-dismiss="modal" class="btn btn-primary w-100">Done</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete language Modal -->
<div class="modal fade" id="delete-lang" tabindex="-1" role="dialog" aria-labelledby="delete a language" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body container text-center">
                <h4>Are you sure that you want to delete this ?</h4><br>
                <div class="container">
                    <form id="delete-lang-form" method="POST" action="" style="display: inline;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button id="delete-lang-form-btn" type="submit" class="btn btn-success" data-dismiss="modal">Yes</button>
                    </form>
                    <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
