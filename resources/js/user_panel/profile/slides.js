
const UserProfileSlidesForm = () => {
    $('#slides-tbl').on('click', (event) => {
        const element = $(event.target).hasClass('slide-btn-edit') || $(event.target).hasClass('slide-btn-delete') ? $(event.target) : $(event.target).parent();
        if ($(element).hasClass('slide-btn-edit')) {
            $('#edit-slide-form').attr('action', '/frontend/profile/slide/edit/' + $(element).data('edit-id'));
            $('#edit-slide').modal();
        }
        if ($(element).hasClass('slide-btn-delete')) {
            $('#delete-slide-form').attr('action', '/frontend/profile/slide/delete/' + $(element).data('delete-id'));
            $('#delete-slide').modal();
        }
    })

    const events = {
        'add-slide-form-btn': addSlide,
        'edit-slide-form-btn': editSlide,
        'delete-slide-form-btn': deleteSlide
    };

    for(let id in events) {
        $(`#${id}`).on('click', (event) => {
            event.preventDefault();
            events[id]();
        });
    }

}

export default UserProfileSlidesForm;

const recordTemplate = (data) => `
<div class="col-md-4 mt-2 mb-2" id="slide-item-${data.id}">
    <a style="text-decoration:none" id="slide-path-${data.id}" href="${data.src}" target="_blank">
        <img class="user-slides-panel" id="slide-img-${data.id}" src="${data.src}">
    </a>
    <div class="user-slides-controllers">
        <button type="button" class="btn slide-btn-edit" data-edit-id="${data.id}"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn slide-btn-delete" data-delete-id="${data.id}"><i class="fa fa-trash"></i></button>
    </div>
</div>
`;

function addSlide() {
    const form = $('#add-slide-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        processData: false,
        contentType: false,
        data: new FormData(form[0]),
        success: function (data) {
            $('#slides-tbl').append(recordTemplate(data));
            $('#add-slide').modal('hide');
        }
    });
}


function editSlide() {
    const form = $('#edit-slide-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        processData: false,
        contentType: false,
        data: new FormData(form[0]),
        success: function (data) {
            $(`#slide-img-${data.id}`).attr('src', data.src);
            $(`#slide-path-${data.id}`).attr('href', data.src);
            $('#edit-slide').modal('hide');
        }
    });
}


function deleteSlide() {
    const form = $('#delete-slide-form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {
            $(`#slide-item-${data.id}`).remove();
        }
    });
}
