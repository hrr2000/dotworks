
<div class="card">
    <div data-toggle="collapse"  style="cursor:pointer;" data-target="#skillsSettings" class="card-header d-flex">
        <div class="col-11">
            {{ __('My Skills') }}
        </div>
        <div class="col-1 text-right">
            <i class="fa fa-caret-down"></i>
        </div>
    </div>
    <div id="skillsSettings" class="card-body collapse">
    <h4>
        <button class="btn btn-outline-primary" onclick="event.preventDefault()"  data-toggle="modal" data-target="#add-skill">{{__('A D D')}} <i class="fa fa-plus"></i></button>
    </h4>
    <table id="skill-tbl" class="table table-borderless  text-center">
        <thead>
            <tr>
                <th>{{ __('Skill') }}</th>
                <th>{{{ __('Level') }}}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr id="skill-item-{{ $skill->id }}">
                <td id="skill-name-{{ $skill->id }}" class="skill-name-cell">{{ $skill->name }}</td>
                <td id="skill-level-{{ $skill->id }}">
                    {{ $levels[$skill->level-1] }}
                </td>
                <td>
                    <button class="btn btn-light skill-btn-edit" data-edit-id="{{ $skill->id }}" data-skill-name="{{ $skill->name }}" data-skill-level="{{ $skill->level }}"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-light skill-btn-delete" data-delete-id="{{ $skill->id }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<!-- Add Skill Modal -->
<div class="modal fade" id="add-skill" tabindex="-1" role="dialog" aria-labelledby="Add a skill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Add Skill')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container text-center">
                <form method="POST" action="{{ route('frontend.profile.skill.add') }}">
                    @csrf
                    <div class="form-group">
                        <input name="skill" type="text" class="form-control" placeholder="Skill Name">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="level">
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Advanced</option>
                        </select>
                    </div>
                    <button id="add-skill-form-btn" type="button" data-dismiss="modal" class="btn btn-primary w-100">Done</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit Skill Modal -->
<div class="modal fade" id="edit-skill" tabindex="-1" role="dialog" aria-labelledby="Edit a skill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container text-center">
                <form id="edit-skill-form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <input name="skill" class="form-control" id="skill-name" type="text" placeholder="Skill Name" />
                    </div>
                    <div class="form-group">
                        <select id="skill-level" class="form-control" name="level">
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Advanced</option>
                        </select>
                    </div>
                    <button id="edit-skill-form-btn" type="button" data-dismiss="modal" class="btn btn-primary w-100">Done</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete skill Modal -->
<div class="modal fade" id="delete-skill" tabindex="-1" role="dialog" aria-labelledby="Delete a Skill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body container text-center">
                <h4>Are you sure that you want to delete this Skill ?</h4><br>
                <div class="container">
                    <form id="delete-skill-form" method="POST" action="" style="display: inline;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button id="delete-skill-form-btn" type="button" class="btn btn-success" data-dismiss="modal" >Yes</button>
                    </form>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

