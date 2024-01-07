const Toast = () => {
    $('.toast').toast({ autohide: false });
    window.addToast = addToast;
}

export default Toast;

const toastsBox = $('#toasts-box');

const toastTemplate = (type, title, message) => `
    <div class="toast ${type} fade show">
        <div class="toast-header">
            <strong class="mr-auto">${title}</strong>
            <button type="button" class="ml-2 mb-1 close toast-close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            ${message}
        </div>
    </div>
`;

export function addToast(type, title, message, duration = 4000) {

    const toast = $(toastTemplate(type, title, message));

    toastsBox.append(toast);

    toastsBox.on('click', function (e) {
        if($(e.target).hasClass('toast-close')) {
            // console.log(`#toast-id-${$(e.target).data('id')}`);
            $(`#toast-id-${$(e.target).data('id')}`).remove();
        }
    });

    setTimeout(() => {
        toast.hide(300, () => {
            toast.remove();
        });
    }, duration);

}
