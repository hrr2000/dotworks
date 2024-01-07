
const ImagePreviewer = (inputId, viewerId) => {
    return {
        execute: () => preview(inputId, viewerId)
    }
}

export default ImagePreviewer;

function preview(inputId, viewerId) {
    $(`#${inputId}`).change(function(){
        const reader = new FileReader();
        if (this.files && this.files[0]) {
            reader.onload = function(event) {
                const src = event.target.result.toString();
                const image = new Image();
                image.onload = () => $(`#${viewerId}`).attr('src', src);
                image.onerror = () => alert( "not a valid file: " + this.files[0].type);
                image.src = src;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
}
