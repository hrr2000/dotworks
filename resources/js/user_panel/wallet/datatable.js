import {StateBadge} from '../../utils/helpers';

const UserInvoicesDataTable = () => {
    const table = $('#invoicesTable');
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
                render: InvoiceServiceAnchor,
            },
            {
                data: 'provider',
                name: 'provider',
                orderable: false,
                render: InvoiceProviderAnchor,
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'state',
                name: 'state',
                render: InvoiceStateRender,
            },
            {
                data: 'method',
                name: 'method',
                // render: StateBadge,
            },
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'action',
                name: 'Actions',
                render: InvoiceActionButtons,
                orderable: false,
                searchable: false
            }
        ]
    });
    $(document).on('click', '.delete', function(){
        $('#delete-form').attr('action', '/frontend/services/delete/' + $(this).attr('data-id'));
        $('#delete-modal').modal('show');
    });
    $('#invoicesSearch').on('keyup', (e) => {
        dataTable.search(e.target.value);
        dataTable.draw();
    });
}

export default UserInvoicesDataTable;

/**
 *
 * @param provider required client data
 * @returns {string}
 */
function InvoiceProviderAnchor(provider) {
    if(provider['profileUrl'] === '#') return '-';
    return `<a href="${provider['profileUrl']}">${provider['name']}</a>`
}

/**
 *
 * @param invoice required client data
 * @returns {string}
 */
function InvoiceServiceAnchor(invoice) {
    if(invoice['serviceUrl'] === '#') return '-';
    return `<a href="${invoice['serviceUrl']}">${invoice['serviceTitle']}</a>`
}

/**
 *
 * @param invoice required order data for the action buttons
 * @returns {string}
 */
function InvoiceActionButtons(invoice) {
    return `
        <a href="#" class="btn btn-light shadow-0 text-dark btn-sm" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
              <path id="Path_2380" data-name="Path 2380" d="M14,3H13V2a2.006,2.006,0,0,0-2-2H5A2.006,2.006,0,0,0,3,2V3H2A2.006,2.006,0,0,0,0,5v6a2.006,2.006,0,0,0,2,2H3v1a2.006,2.006,0,0,0,2,2h6a2.006,2.006,0,0,0,2-2V13h1a2.006,2.006,0,0,0,2-2V5a2.006,2.006,0,0,0-2-2M5,2h6V3H5Zm6,12H5V11h6Zm3-3H13a2.006,2.006,0,0,0-2-2H5a2.006,2.006,0,0,0-2,2H2V5H14ZM12,8a1,1,0,1,0-1-1,1,1,0,0,0,1,1" fill="#777" fill-rule="evenodd"/>
            </svg>
        </a>
    `;
}

const statesStyles = {
    complete: 'text-success',
    pending: 'text-primary',
    under_review: 'text-warning'
}

function InvoiceStateRender(state) {
    return `
        <span class="${statesStyles[state]}">${state}</span>
    `;
}
