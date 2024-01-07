/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/user_panel/wallet/datatable.js":
/*!*****************************************************!*\
  !*** ./resources/js/user_panel/wallet/datatable.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _utils_helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../utils/helpers */ "./resources/js/utils/helpers.js");


var UserInvoicesDataTable = function UserInvoicesDataTable() {
  var table = $('#invoicesTable');
  var dataTable = table.DataTable({
    processing: true,
    info: false,
    lengthChange: false,
    ajax: {
      url: table.data('source-url')
    },
    order: [[0, 'desc']],
    columns: [{
      data: 'id',
      name: 'id'
    }, {
      data: 'service',
      name: 'service',
      orderable: false,
      render: InvoiceServiceAnchor
    }, {
      data: 'provider',
      name: 'provider',
      orderable: false,
      render: InvoiceProviderAnchor
    }, {
      data: 'amount',
      name: 'amount'
    }, {
      data: 'total',
      name: 'total'
    }, {
      data: 'state',
      name: 'state',
      render: InvoiceStateRender
    }, {
      data: 'method',
      name: 'method' // render: StateBadge,

    }, {
      data: 'date',
      name: 'date'
    }, {
      data: 'action',
      name: 'Actions',
      render: InvoiceActionButtons,
      orderable: false,
      searchable: false
    }]
  });
  $(document).on('click', '.delete', function () {
    $('#delete-form').attr('action', '/frontend/services/delete/' + $(this).attr('data-id'));
    $('#delete-modal').modal('show');
  });
  $('#invoicesSearch').on('keyup', function (e) {
    dataTable.search(e.target.value);
    dataTable.draw();
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserInvoicesDataTable);
/**
 *
 * @param provider required client data
 * @returns {string}
 */

function InvoiceProviderAnchor(provider) {
  if (provider['profileUrl'] === '#') return '-';
  return "<a href=\"".concat(provider['profileUrl'], "\">").concat(provider['name'], "</a>");
}
/**
 *
 * @param invoice required client data
 * @returns {string}
 */


function InvoiceServiceAnchor(invoice) {
  if (invoice['serviceUrl'] === '#') return '-';
  return "<a href=\"".concat(invoice['serviceUrl'], "\">").concat(invoice['serviceTitle'], "</a>");
}
/**
 *
 * @param invoice required order data for the action buttons
 * @returns {string}
 */


function InvoiceActionButtons(invoice) {
  return "\n        <a href=\"#\" class=\"btn btn-light shadow-0 text-dark btn-sm\" >\n            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" viewBox=\"0 0 16 16\">\n              <path id=\"Path_2380\" data-name=\"Path 2380\" d=\"M14,3H13V2a2.006,2.006,0,0,0-2-2H5A2.006,2.006,0,0,0,3,2V3H2A2.006,2.006,0,0,0,0,5v6a2.006,2.006,0,0,0,2,2H3v1a2.006,2.006,0,0,0,2,2h6a2.006,2.006,0,0,0,2-2V13h1a2.006,2.006,0,0,0,2-2V5a2.006,2.006,0,0,0-2-2M5,2h6V3H5Zm6,12H5V11h6Zm3-3H13a2.006,2.006,0,0,0-2-2H5a2.006,2.006,0,0,0-2,2H2V5H14ZM12,8a1,1,0,1,0-1-1,1,1,0,0,0,1,1\" fill=\"#777\" fill-rule=\"evenodd\"/>\n            </svg>\n        </a>\n    ";
}

var statesStyles = {
  complete: 'text-success',
  pending: 'text-primary',
  under_review: 'text-warning'
};

function InvoiceStateRender(state) {
  return "\n        <span class=\"".concat(statesStyles[state], "\">").concat(state, "</span>\n    ");
}

/***/ }),

/***/ "./resources/js/utils/helpers.js":
/*!***************************************!*\
  !*** ./resources/js/utils/helpers.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "StateBadge": () => (/* binding */ StateBadge)
/* harmony export */ });
/**
 *
 * @param stateObjectString object of the service state {name: 'complete', text: 'Published'}
 * @returns {string}
 */
function StateBadge(stateObjectString) {
  var stateObject = typeof stateObjectString === 'string' ? JSON.parse(stateObjectString) : stateObjectString;
  return "\n        <span class=\"state-badge state-badge--".concat(stateObject.name, "\">").concat(stateObject.text, "</span>\n    ");
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/user_panel/wallet/index.js ***!
  \*************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Invoices)
/* harmony export */ });
/* harmony import */ var _datatable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./datatable */ "./resources/js/user_panel/wallet/datatable.js");

function Invoices() {
  (0,_datatable__WEBPACK_IMPORTED_MODULE_0__["default"])();
}
Invoices();
})();

/******/ })()
;
