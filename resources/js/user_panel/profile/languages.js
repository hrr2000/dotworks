
const UserProfileLanguagesForm = () => {
    $('#lang-tbl').click((event) => {
        const element = $(event.target).hasClass('lang-btn-edit') || $(event.target).hasClass('lang-btn-delete') ? $(event.target) : $(event.target).parent();
        if(element.hasClass('lang-btn-edit')) {
            event.preventDefault();
            $('#edit-lang-form').attr('action', '/frontend/profile/language/edit/' + $(element).data('edit-id'));
            $('#edit-lang').modal();
        }
        if(element.hasClass('lang-btn-delete')) {
            event.preventDefault();
            $('#delete-lang-form').attr('action', '/frontend/profile/language/delete/' + $(element).data('delete-id'));
            $('#delete-lang').modal();
        }
    })

    const events = {
        'add-lang-form-btn': addLang,
        'edit-lang-form-btn': editLang,
        'delete-lang-form-btn': deleteLang
    };

    for(let id in events) {
        $(`#${id}`).on('click', (event) => {
            event.preventDefault();
            events[id]();
        });
    }

}

export default UserProfileLanguagesForm;

const levels = ['Beginner','Intermediate','Advanced'];

const record = (data) => `
                <tr id="lang-item-${data.id}">
                    <td>
                        ${data.name}
                    </td>
                    <td id="lang-level-${data.id}">
                        ${levels[data.level - 1]}
                    </td>
                    <td>
                        <button class="btn btn-light lang-btn-edit" data-edit-id="${data.id}"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-light lang-btn-delete" data-delete-id="${data.id}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
`;

export function addLang(){
    const form = $('#add-lang-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            $('#lang-tbl').append(() => record(data));
        },
        error: function(data){
            console.log(data);
            $('#err-msg').text(data.responseJSON.error);
            $('#err-modal').modal();
        }
    });
}


export function editLang(){
    const form = $('#edit-lang-form');
    $.ajax({
        type: 'PUT',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            $(`#lang-level-${data.id}`).text(levels[data.level - 1]);
        }
    });
}

export function deleteLang(){
    const form = $('#delete-lang-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success : function(data){
            $(`#lang-item-${data.id}`).remove();
        }
    });
}
