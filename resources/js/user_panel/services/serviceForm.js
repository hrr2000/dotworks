
let imageId = 0;
let offersCounter = + 1;
const packageTypes = ['basic', 'standard', 'premium'];

const form = $('#serviceForm');
const submitBtn = $('#serviceSubmitBtn');
const submitLoader = $('#serviceSubmitLoader');
const oldImages = $('.service-old-image');



const UserServicesForm = () => {

    // get the container of services images
    const serviceImagesBox = $('#serviceImagesBox');

    /* --------------- service images box events handling --------------- */

    // the add image button click
    $('#image-add').click(function(e) {
        if($(`.image-input`).length < 5)
            addImage(serviceImagesBox, imageId);
    });

    // changing input after choosing image for upload
    serviceImagesBox.on('change', (e) => {
        const element = e.target;
        if($(element).hasClass('image-input')) {
            if(element.files.length > 0)
                upload(serviceImagesBox.data('upload-url'), element);
        }
    });

    // service image box clicking events
    serviceImagesBox.on('click', (e) => {
        const element = e.target;
        const id = $(element).data('id');

        // trigger input after clicking on the choose button
        if($(element).hasClass('choose-img-btn') || $(element).hasClass('image-viewer'))
            $(`.image-input[data-id=${id}]`).click();

        // remove image
        if($(element).hasClass('delete-img-btn'))
            removeImage(id)

    });

    /* --------------- service packages box events handling --------------- */
    $('.package-offers').on('click', (event) => {
        const element = $(event.target);
        const id = element.data('id');
        const type = element.data('type');
        if(element.hasClass('delete-offer-btn')) {
            removeOffer(type, id);
        }
    })

    packageTypes.map((type) => {
        addEventToPackagesSwitch(type);
        addEventToOffersButtons(type);
    });

    /* --------------- service form events handling --------------- */
    submitBtn.on('click', (e) => {
        e.preventDefault();
        saveServiceFormData($(this).data('url'));
    });

    // restore old images for edit form
    oldImages.toArray().forEach((image) => {
        addImage(serviceImagesBox, imageId, $(image).data('url'), $(image).data('name'));
    });

    // initialize the offers id
    $('.offer-box').toArray().forEach((offer) => {
        offersCounter = Math.max(offersCounter, $(offer).data('id'));
    });
    offersCounter++;

}

export default UserServicesForm;

// submit service form


function saveServiceFormData(url) {
    $.ajax(url, {
        type: 'POST',
        data: new FormData(form[0]),
        beforeSend: beforeSendSaveService,
        complete: completeSaveService,
        success: () => addToast('success', 'Successful', 'Your service was saved successfully'),
        error: errorSaveService,
        processData: false,
        contentType: false
    });
}

function beforeSendSaveService() {
    $('.error-msg').html('');
    submitBtn.attr('disabled', 'true');
    submitLoader.show(100);
}

function completeSaveService() {
    submitBtn.removeAttr('disabled');
    submitLoader.hide(100);
    location.assign(location.origin + location.pathname + '#');
}

function errorSaveService(res) {
    completeSaveService();
    addToast('fail', 'Failed', 'Service isn\'t saved');
    const errors = res?.responseJSON?.errors;
    fillErrorMessages(errors);
    const location = window.location;
}

function fillErrorMessages(errors) {
    if(!errors) return;
    $('.error-msg').html('<ul></ul>');
    for (let key in errors) {
        errors[key]?.map(message => {
            $(document.getElementById(`${key}_err_msg`).firstChild).append(`<li>${message}</li>`);
        })
    }
}

// start service packages & offers section functions
const ServicePackageOfferTemplate = (type, id) => `
    <div id="offerBox-${id}" class="${type}-offer-box" style="display: none;">
        <div class="input-group mb-1 mt-1">
            <div class="input-group-prepend">
                <button type="button" data-id="${id}" data-type="${type}" class="btn btn-outline-danger delete-offer-btn shadow-0 border-0"><i class="fa fa-trash"></i></button>
            </div>
            <input class="form-control ml-1" type="text" name="${type}_offers[${    id}][value]" placeholder="offer here .." />
        </div>
        <div class="form-check offset-2">
            <input class="form-check-input offers-checkbox" type="checkbox" id="offerTypeCheck-${id}" name="${type}_offers[${id}][type]" value="off"/>
            <label class="form-check-label ml-2" for="offerTypeCheck-${id}">Main Offer</label>
        </div>
        <span id="${type}_offers.${id}.value_err_msg" class="error-msg" role="alert"></span>
    </div>
`;

function addOffer(type) {

    const offers = $(`.${type}-offer-box`);
    const parent = $(`#${type}Offers`);
    const id = offersCounter;

    if(offers.length >= 10) return;
    if(!offers.length) parent.html('');

    parent.append(ServicePackageOfferTemplate(type, id));
    const offersBox = $(`#offerBox-${id}`);
    offersBox.show(300);

    offersCounter++;

}

function removeOffer(type, id) {
    const offersBox = $(`#offerBox-${id}`);
    offersBox.hide(300, () => {
        offersBox.remove();
        if(!$(`.${type}-offer-box`).length) offersBox.parent().html("No Offers ..");
    });
}

function addEventToOffersButtons(type) {
    $(`#${type}OfferBtn`).on('click', function() {
        addOffer(type);
    });
}

function addEventToPackagesSwitch(type) {
    const checkbox = $(`#${type}Switch`), body = $(`#${type}Body`);
    checkbox.on('change', function() {
        checkbox[0].checked ? body.slideDown(500) : body.slideUp(500);
    });
}
// end service packages & offers section functions


// start service images section functions
const ServiceImageTemplate = (id, url = '', name = '') => `
    <div class="card col-lg-3 col-md-4 mr-md-4 ml-md-4" data-imageId="${id}" style="display: none;">
        <div class="card-header p-0  text-center">
            <button type="button" class="btn btn-outline-danger delete-img-btn" data-id="${id}"><i class="fa fa-trash"></i> delete</button>
            <input type="file" class="image-input d-none" data-id="${id}" accept="">
            <input name="images[]" type="hidden" id="imageName-${id}" value="${name}">
        </div>
        <div class="card-body ">
            <button type="button" data-id="${id}" class="btn ripple-surface-dark shadow-0 choose-img-btn w-100" style="">
            <span
                id="imageLoader-${id}"
                class="spinner-border spinner-border-md"
                role="status"
                aria-hidden="true"
                style="display:none;"
            ></span>
            <img src="${url}" class="image-viewer w-100" data-id="${id}" alt="">
            <i class="fa fa-image" style="font-size: 1.4rem;"></i>
            Choose Image
        </button>
        </div>
    </div>
`

function addImage(serviceImagesBox, id, imageUrl = '', name = '') {

    serviceImagesBox.append(ServiceImageTemplate(id, imageUrl, name));
    const card = $(`.card[data-imageId=${id}]`);
    card.show(300);
    imageId++;

}

function removeImage(id) {
    const card = $(`.card[data-imageId=${id}]`);
    card.hide(300, () => {
        card.remove();
    });
}

function upload(uploadUrl, element) {

    const id = $(element).data('id');
    const form = new FormData();
    form.append('image', element.files[0]);
    form.append('_token', $('input[name="_token"]')[0].value);

    $.ajax(uploadUrl, {
        type: 'POST',
        data: form,
        beforeSend: () => beforeSendUpload(id),
        complete: () => completeUpload(id),
        success: (data) => successUpload(id, data),
        error: () => $(element).val(''),
        processData: false,
        contentType: false
    });

}

function beforeSendUpload(id) {
    $(`.btn[data-id=${id}]`).attr('disabled', 'true');
    $(`#imageLoader-${id}`).show(100);
}

function completeUpload(id) {
    $(`.btn[data-id=${id}]`).removeAttr('disabled');
    $(`#imageLoader-${id}`).hide(100);
}

function successUpload(id, data) {
    $(`#imageName-${id}`).val(data.imageName);
    $(`.image-viewer[data-id=${id}]`).attr('src', data.imageURL);
    addToast('success', 'Successful', 'Image Uploaded successfully');
}
// end service images section functions

