/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/user_panel/services/datatable.js":
/*!*******************************************************!*\
  !*** ./resources/js/user_panel/services/datatable.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _utils_helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../utils/helpers */ "./resources/js/utils/helpers.js");


var UserServicesDataTable = function UserServicesDataTable() {
  var table = $('#servicesTable');
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
      data: 'service_image',
      name: 'service_image',
      render: TableImage,
      searchable: 'false'
    }, {
      data: 'title',
      name: 'title',
      orderable: false
    }, {
      data: 'price',
      name: 'price'
    }, {
      data: 'service_status',
      name: 'service_status',
      render: _utils_helpers__WEBPACK_IMPORTED_MODULE_0__.StateBadge
    }, {
      data: 'date',
      name: 'date'
    }, {
      data: 'rating',
      name: 'rating',
      render: RatingView,
      searchable: 'false'
    }, {
      data: 'action',
      name: 'action',
      render: ServiceActionButtons,
      orderable: false,
      searchable: 'false'
    }]
  });
  $(document).on('click', '.delete', function () {
    $('#delete-form').attr('action', '/frontend/services/delete/' + $(this).data('id'));
    $('#delete-modal').modal('show');
  });
  $('#servicesSearch').on('keyup', function (e) {
    dataTable.search(e.target.value);
    dataTable.draw();
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserServicesDataTable);
/**
 *
 * @param url image url
 * @returns {string}
 */

function TableImage(url) {
  return "\n        <div style=\"border-radius: 20%; margin: auto; width: 50px; height: 50px; background-image: url('".concat(url, "'); background-size: cover; background-position: center\"></div>\n    ");
}
/**
 *
 * @param rating the rating of the service
 * @returns {string}
 */


function RatingView(rating) {
  return "\n        <div class=\"rating\"> ".concat(rating || 0, " <i class=\"fa fa-star\"></i></div>\n    ");
}
/**
 *
 * @param service required service data for the action buttons
 * @returns {string}
 */


function ServiceActionButtons(service) {
  return "\n        <a href=\"".concat(service['editUrl'], "\" class=\"edit btn btn-light shadow-0 text-black-50 btn-sm\">\n            <i class=\"fa fa-edit\"></i>\n        </a>\n        <button type=\"button\" name=\"delete\" data-id = \"").concat(service['id'], "\" class=\"delete btn btn-light shadow-0 text-black-50 btn-sm\">\n            <i class=\"fa fa-trash\"></i>\n        </button>\n    ");
}

/***/ }),

/***/ "./resources/js/user_panel/services/serviceForm.js":
/*!*********************************************************!*\
  !*** ./resources/js/user_panel/services/serviceForm.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var _this = undefined;

var imageId = 0;
var offersCounter = +1;
var packageTypes = ['basic', 'standard', 'premium'];
var form = $('#serviceForm');
var submitBtn = $('#serviceSubmitBtn');
var submitLoader = $('#serviceSubmitLoader');
var oldImages = $('.service-old-image');

var UserServicesForm = function UserServicesForm() {
  // get the container of services images
  var serviceImagesBox = $('#serviceImagesBox');
  /* --------------- service images box events handling --------------- */
  // the add image button click

  $('#image-add').click(function (e) {
    if ($(".image-input").length < 5) addImage(serviceImagesBox, imageId);
  }); // changing input after choosing image for upload

  serviceImagesBox.on('change', function (e) {
    var element = e.target;

    if ($(element).hasClass('image-input')) {
      if (element.files.length > 0) upload(serviceImagesBox.data('upload-url'), element);
    }
  }); // service image box clicking events

  serviceImagesBox.on('click', function (e) {
    var element = e.target;
    var id = $(element).data('id'); // trigger input after clicking on the choose button

    if ($(element).hasClass('choose-img-btn') || $(element).hasClass('image-viewer')) $(".image-input[data-id=".concat(id, "]")).click(); // remove image

    if ($(element).hasClass('delete-img-btn')) removeImage(id);
  });
  /* --------------- service packages box events handling --------------- */

  $('.package-offers').on('click', function (event) {
    var element = $(event.target);
    var id = element.data('id');
    var type = element.data('type');

    if (element.hasClass('delete-offer-btn')) {
      removeOffer(type, id);
    }
  });
  packageTypes.map(function (type) {
    addEventToPackagesSwitch(type);
    addEventToOffersButtons(type);
  });
  /* --------------- service form events handling --------------- */

  submitBtn.on('click', function (e) {
    e.preventDefault();
    saveServiceFormData($(_this).data('url'));
  }); // restore old images for edit form

  oldImages.toArray().forEach(function (image) {
    addImage(serviceImagesBox, imageId, $(image).data('url'), $(image).data('name'));
  }); // initialize the offers id

  $('.offer-box').toArray().forEach(function (offer) {
    offersCounter = Math.max(offersCounter, $(offer).data('id'));
  });
  offersCounter++;
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserServicesForm); // submit service form

function saveServiceFormData(url) {
  $.ajax(url, {
    type: 'POST',
    data: new FormData(form[0]),
    beforeSend: beforeSendSaveService,
    complete: completeSaveService,
    success: function success() {
      return addToast('success', 'Successful', 'Your service was saved successfully');
    },
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
  var _res$responseJSON;

  completeSaveService();
  addToast('fail', 'Failed', 'Service isn\'t saved');
  var errors = res === null || res === void 0 ? void 0 : (_res$responseJSON = res.responseJSON) === null || _res$responseJSON === void 0 ? void 0 : _res$responseJSON.errors;
  fillErrorMessages(errors);
  var location = window.location;
}

function fillErrorMessages(errors) {
  if (!errors) return;
  $('.error-msg').html('<ul></ul>');

  var _loop = function _loop(key) {
    var _errors$key;

    (_errors$key = errors[key]) === null || _errors$key === void 0 ? void 0 : _errors$key.map(function (message) {
      $(document.getElementById("".concat(key, "_err_msg")).firstChild).append("<li>".concat(message, "</li>"));
    });
  };

  for (var key in errors) {
    _loop(key);
  }
} // start service packages & offers section functions


var ServicePackageOfferTemplate = function ServicePackageOfferTemplate(type, id) {
  return "\n    <div id=\"offerBox-".concat(id, "\" class=\"").concat(type, "-offer-box\" style=\"display: none;\">\n        <div class=\"input-group mb-1 mt-1\">\n            <div class=\"input-group-prepend\">\n                <button type=\"button\" data-id=\"").concat(id, "\" data-type=\"").concat(type, "\" class=\"btn btn-outline-danger delete-offer-btn shadow-0 border-0\"><i class=\"fa fa-trash\"></i></button>\n            </div>\n            <input class=\"form-control ml-1\" type=\"text\" name=\"").concat(type, "_offers[").concat(id, "][value]\" placeholder=\"offer here ..\" />\n        </div>\n        <div class=\"form-check offset-2\">\n            <input class=\"form-check-input offers-checkbox\" type=\"checkbox\" id=\"offerTypeCheck-").concat(id, "\" name=\"").concat(type, "_offers[").concat(id, "][type]\" value=\"off\"/>\n            <label class=\"form-check-label ml-2\" for=\"offerTypeCheck-").concat(id, "\">Main Offer</label>\n        </div>\n        <span id=\"").concat(type, "_offers.").concat(id, ".value_err_msg\" class=\"error-msg\" role=\"alert\"></span>\n    </div>\n");
};

function addOffer(type) {
  var offers = $(".".concat(type, "-offer-box"));
  var parent = $("#".concat(type, "Offers"));
  var id = offersCounter;
  if (offers.length >= 10) return;
  if (!offers.length) parent.html('');
  parent.append(ServicePackageOfferTemplate(type, id));
  var offersBox = $("#offerBox-".concat(id));
  offersBox.show(300);
  offersCounter++;
}

function removeOffer(type, id) {
  var offersBox = $("#offerBox-".concat(id));
  offersBox.hide(300, function () {
    offersBox.remove();
    if (!$(".".concat(type, "-offer-box")).length) offersBox.parent().html("No Offers ..");
  });
}

function addEventToOffersButtons(type) {
  $("#".concat(type, "OfferBtn")).on('click', function () {
    addOffer(type);
  });
}

function addEventToPackagesSwitch(type) {
  var checkbox = $("#".concat(type, "Switch")),
      body = $("#".concat(type, "Body"));
  checkbox.on('change', function () {
    checkbox[0].checked ? body.slideDown(500) : body.slideUp(500);
  });
} // end service packages & offers section functions
// start service images section functions


var ServiceImageTemplate = function ServiceImageTemplate(id) {
  var url = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var name = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  return "\n    <div class=\"card col-lg-3 col-md-4 mr-md-4 ml-md-4\" data-imageId=\"".concat(id, "\" style=\"display: none;\">\n        <div class=\"card-header p-0  text-center\">\n            <button type=\"button\" class=\"btn btn-outline-danger delete-img-btn\" data-id=\"").concat(id, "\"><i class=\"fa fa-trash\"></i> delete</button>\n            <input type=\"file\" class=\"image-input d-none\" data-id=\"").concat(id, "\" accept=\"\">\n            <input name=\"images[]\" type=\"hidden\" id=\"imageName-").concat(id, "\" value=\"").concat(name, "\">\n        </div>\n        <div class=\"card-body \">\n            <button type=\"button\" data-id=\"").concat(id, "\" class=\"btn ripple-surface-dark shadow-0 choose-img-btn w-100\" style=\"\">\n            <span\n                id=\"imageLoader-").concat(id, "\"\n                class=\"spinner-border spinner-border-md\"\n                role=\"status\"\n                aria-hidden=\"true\"\n                style=\"display:none;\"\n            ></span>\n            <img src=\"").concat(url, "\" class=\"image-viewer w-100\" data-id=\"").concat(id, "\" alt=\"\">\n            <i class=\"fa fa-image\" style=\"font-size: 1.4rem;\"></i>\n            Choose Image\n        </button>\n        </div>\n    </div>\n");
};

function addImage(serviceImagesBox, id) {
  var imageUrl = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var name = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  serviceImagesBox.append(ServiceImageTemplate(id, imageUrl, name));
  var card = $(".card[data-imageId=".concat(id, "]"));
  card.show(300);
  imageId++;
}

function removeImage(id) {
  var card = $(".card[data-imageId=".concat(id, "]"));
  card.hide(300, function () {
    card.remove();
  });
}

function upload(uploadUrl, element) {
  var id = $(element).data('id');
  var form = new FormData();
  form.append('image', element.files[0]);
  form.append('_token', $('input[name="_token"]')[0].value);
  $.ajax(uploadUrl, {
    type: 'POST',
    data: form,
    beforeSend: function beforeSend() {
      return beforeSendUpload(id);
    },
    complete: function complete() {
      return completeUpload(id);
    },
    success: function success(data) {
      return successUpload(id, data);
    },
    error: function error() {
      return $(element).val('');
    },
    processData: false,
    contentType: false
  });
}

function beforeSendUpload(id) {
  $(".btn[data-id=".concat(id, "]")).attr('disabled', 'true');
  $("#imageLoader-".concat(id)).show(100);
}

function completeUpload(id) {
  $(".btn[data-id=".concat(id, "]")).removeAttr('disabled');
  $("#imageLoader-".concat(id)).hide(100);
}

function successUpload(id, data) {
  $("#imageName-".concat(id)).val(data.imageName);
  $(".image-viewer[data-id=".concat(id, "]")).attr('src', data.imageURL);
  addToast('success', 'Successful', 'Image Uploaded successfully');
} // end service images section functions

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
/*!***************************************************!*\
  !*** ./resources/js/user_panel/services/index.js ***!
  \***************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Services)
/* harmony export */ });
/* harmony import */ var _datatable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./datatable */ "./resources/js/user_panel/services/datatable.js");
/* harmony import */ var _serviceForm__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./serviceForm */ "./resources/js/user_panel/services/serviceForm.js");


function Services() {
  (0,_datatable__WEBPACK_IMPORTED_MODULE_0__["default"])();
  (0,_serviceForm__WEBPACK_IMPORTED_MODULE_1__["default"])();
}
Services();
})();

/******/ })()
;
