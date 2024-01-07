
const UserProfileSkillsForm = () => {

    $('#skill-tbl').on('click', (event) => {
        const element = $(event.target).hasClass('skill-btn-edit') || $(event.target).hasClass('skill-btn-delete') ? $(event.target) : $(event.target).parent();
        if ($(element).hasClass('skill-btn-edit')) {
            $('#edit-skill-form').attr('action', '/frontend/profile/skill/edit/' + $(element).data('edit-id'));
            $('#skill-name').val($(element).data('skill-name'));
            $('#skill-level').val($(element).data('skill-level'));
            $('#edit-skill').modal();
        }
        if ($(element).hasClass('skill-btn-delete')) {
            $('#delete-skill-form').attr('action', '/frontend/profile/skill/delete/' + $(element).data('delete-id'));
            $('#delete-skill').modal();
        }
    });

    const events = {
        'add-skill-form-btn': addSkill,
        'edit-skill-form-btn': editSkill,
        'delete-skill-form-btn': deleteSkill
    };

    for(let id in events) {
        $(`#${id}`).on('click', (event) => {
            event.preventDefault();
            events[id]();
        });
    }

}

export default UserProfileSkillsForm;

let levels = ['Beginner', 'Intermediate', 'Advanced'];

let record = (data) => `
<tr id="skill-item-${data.id}">
    <td>
        ${data.name}
    </td>
    <td id="skill-level-${data.id}">
        ${levels[data.level - 1]}
    </td>
    <td>
        <button class="btn btn-light skill-btn-edit" data-edit-id="${data.id}" data-skill-name="${data.name}" data-skill-level="${data.level}"><i class="fa fa-edit"></i></button>
        <button class="btn btn-light skill-btn-delete" data-delete-id="${data.id}""><i class="fa fa-trash"></i></button>
    </td>
</tr>
`;

function addSkill(){
    const form = $('#add-skill form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            $('#skill-tbl').append(record(data));
        },
        error: function(data){
            $('#err-msg').text(data.responseJSON.error);
            $('#err-modal').modal();
        }
    });
}


function editSkill(){
    const form = $('#edit-skill-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            let levels = ['Beginner','Intermediate','Advanced'];
            $(`#skill-name-${data.id}`).text(data.name);
            $(`#skill-level-${data.id}`).text(levels[data.level-1]);
        }
    });
}


function deleteSkill(){
    const form = $('#delete-skill-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            $(`#skill-item-${data.id}`).remove();
        }
    });
}
