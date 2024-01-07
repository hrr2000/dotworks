import {StateBadge} from '../../utils/helpers';

const UserServicesDataTable = () => {
    const table = $('#servicesTable');
    const dataTable = table.DataTable({
        processing: true,
        info: false,
        lengthChange: false,
        ajax: {
            url: table.data('source-url'),
        },
        order: [
            [ 0, 'desc' ]
        ],
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'service_image',
                name: 'service_image',
                render: TableImage,
                searchable: 'false'
            },
            {
                data: 'title',
                name: 'title',
                orderable: false,
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'service_status',
                name: 'service_status',
                render: StateBadge
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'rating',
                name: 'rating',
                render: RatingView,
                searchable: 'false'
            },
            {
                data: 'action',
                name: 'action',
                render: ServiceActionButtons,
                orderable: false,
                searchable: 'false'
            }
        ]
    });
    $(document).on('click', '.delete', function(){
        $('#delete-form').attr('action', '/frontend/services/delete/' + $(this).data('id'));
        $('#delete-modal').modal('show');
    });
    $('#servicesSearch').on('keyup', (e) => {
        dataTable.search(e.target.value);
        dataTable.draw();
    });
}

export default UserServicesDataTable;

/**
 *
 * @param url image url
 * @returns {string}
 */
function TableImage(url) {
    return `
        <div style="border-radius: 20%; margin: auto; width: 50px; height: 50px; background-image: url('${url}'); background-size: cover; background-position: center"></div>
    `;
}


/**
 *
 * @param rating the rating of the service
 * @returns {string}
 */
function RatingView(rating) {
    return `
        <div class="rating"> ${rating || 0} <i class="fa fa-star"></i></div>
    `;
}

/**
 *
 * @param service required service data for the action buttons
 * @returns {string}
 */
function ServiceActionButtons(service) {
    return `
        <a href="${service['editUrl']}" class="edit btn btn-light shadow-0 text-black-50 btn-sm">
            <i class="fa fa-edit"></i>
        </a>
        <button type="button" name="delete" data-id = "${service['id']}" class="delete btn btn-light shadow-0 text-black-50 btn-sm">
            <i class="fa fa-trash"></i>
        </button>
    `;
}
