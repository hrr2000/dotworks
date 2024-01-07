import ImagePreviewer from '../../utils/ImagePreviewer';

const UserProfileInformationForm = () => {

    // frontend image change with preview
    const previewer = ImagePreviewer('frontend-photo-btn', 'frontend-photo');
    previewer.execute();

    $('#frontend-img-btn').on('click', function(){
        $('#frontend-photo-btn').click();
    })

    // remove response time input when time is none
    const responseInput = $('#response');
    $('#time').change(function(){
        if($(this).val() === 'none')
            return responseInput.hide();
        responseInput.show();
    });

}

export default UserProfileInformationForm;
