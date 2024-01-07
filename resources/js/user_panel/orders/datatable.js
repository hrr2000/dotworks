import {StateBadge} from '../../utils/helpers';

const UserComingOrdersDataTable = () => {
    const table = $('#ordersTable');
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
                data: 'service',
                name: 'service',
                orderable: false,
                render: OrderServiceAnchor,
            },
            {
                data: 'client',
                name: 'client',
                render: OrderClientAnchor,
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'order_status',
                name: 'order_status',
                render: StateBadge,
            },
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'action',
                name: 'Actions',
                render: OrderActionButtons,
                orderable: false,
                searchable: false
            }
        ]
    });
    $(document).on('click', '.delete', function(){
        $('#delete-form').attr('action', '/frontend/services/delete/' + $(this).attr('data-id'));
        $('#delete-modal').modal('show');
    });
    $('#ordersSearch').on('keyup', (e) => {
        dataTable.search(e.target.value);
        dataTable.draw();
    });
}

export default UserComingOrdersDataTable;

/**
 *
 * @param url image url
 * @returns {string}
 */
function TableImage(url) {
    return `
        <div style="border-radius: 50%; width: 50px; height: 50px; background-image: url(${url}); background-size: cover; background-position: center"></div>
    `;
}

/**
 *
 * @param client required client data
 * @returns {string}
 */
function OrderClientAnchor(client) {
    return `<a href="${client['profileUrl']}" target="_blank">${client['name']}</a>`
}

/**
 *
 * @param order required client data
 * @returns {string}
 */
function OrderServiceAnchor(order) {
    return `<a href="${order['serviceUrl']}" target="_blank">${order['serviceTitle']} ${order['packageType']}</a>`
}

/**
 *
 * @param order required order data for the action buttons
 * @returns {string}
 */
function OrderActionButtons(order) {
    return `
        <a href="${order['viewUrl']}" class="btn btn-light shadow-0 text-dark btn-sm" >
            <i class="fa fa-eye"></i>
        </a>
    `;
}
