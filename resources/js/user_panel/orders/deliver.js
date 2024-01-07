
import Dropzone from "dropzone";
const confirmDeliveryBtn = $('#confirmDeliveryButton');
const confirmFilesButton = $('#confirmFilesButton');
const fileUploadBox = $('.file-upload');
const orderFileUploadInput = $('#orderFileUpload');


const UserOrderDeliver = () => {

    chooseUnFinishedStep();

    let deliveryFiles = [];

    if($('#deliveryUploadForm').length) {
        const dropzone = new Dropzone('#deliveryUploadForm', {
            addRemoveLinks: true,
        });


        dropzone.on('success', (file, res) => {
            deliveryFiles.push({
                uuid: file.upload.uuid,
                newName: res.fileName
            });
        })

        dropzone.on('error', (file) => {
            $('.dz-error-message span').html('Failed To Upload');
            deliveryFiles.push({
                uuid: file.upload.uuid,
                newName: 'error'
            });
        })

        dropzone.on('removedfile', (file) => {
            deliveryFiles = deliveryFiles.filter((item) => item.uuid !== file.upload.uuid);
        })
    }



    // fileUploadBox.on('drag dragstart dragend dragover dragenter dragleave drop', (e) => {
    //     e.preventDefault();
    // }).on('drop', (e) => {
    //     orderFileUploadInput[0].files = e.originalEvent.dataTransfer.files;
    // });
    //
    // fileUploadBox.on('click', () => {
    //     orderFileUploadInput.click();
    // })

    confirmDeliveryBtn.on('click', () => {
        $.ajax(confirmDeliveryBtn.data('url'), {
            type: 'POST',
            headers: {
               'Content-Type': 'application/json'
            },
            data: JSON.stringify({
                '_token': confirmDeliveryBtn.data('token'),
            }),
            beforeSend: () => confirmDeliveryBtn.attr('disabled', true),
            success: (res) => {
                addToast('success', 'Success', res.success);
                $('#confirmDeliveryStep').parent().addClass('finished');
                chooseUnFinishedStep();
            },
            error: (res) => {
                addToast('fail', 'Error', res.responseJSON.error || 'An Error Occurred');
                confirmDeliveryBtn.removeAttr('disabled');
            }
        })
    })

    confirmFilesButton.on('click', () => {
        $.ajax(confirmFilesButton.data('url'), {
            type: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            data: JSON.stringify({
                '_token': confirmFilesButton.data('token'),
                'file_names[]': deliveryFiles,
            }),
            beforeSend: () => confirmFilesButton.attr('disabled', true),
            success: (res) => {
                addToast('success', 'Success', res.success);
                $('#UploadFilesStep').parent().addClass('finished');
                chooseUnFinishedStep();
            },
            error: (res) => {
                addToast('fail', 'Error', res.responseJSON.error || 'An Error Occurred');
                confirmFilesButton.removeAttr('disabled');
            }
        })
    })

}

export default UserOrderDeliver;

function chooseUnFinishedStep() {
    const stepBoxes = $('.step-box');
    for(let box of stepBoxes) {
        if($(box).hasClass('finished')) continue;
        viewStep(box);
        break;
    }
}

function viewStep(stepBox) {
    $(stepBox.querySelector('.step-content')).show();
    $(stepBox).css({
        'flex-direction': 'column'
    })
}

