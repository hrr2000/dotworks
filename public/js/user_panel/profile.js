/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/user_panel/profile/information.js":
/*!********************************************************!*\
  !*** ./resources/js/user_panel/profile/information.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _utils_ImagePreviewer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../utils/ImagePreviewer */ "./resources/js/utils/ImagePreviewer.js");


var UserProfileInformationForm = function UserProfileInformationForm() {
  // frontend image change with preview
  var previewer = (0,_utils_ImagePreviewer__WEBPACK_IMPORTED_MODULE_0__["default"])('frontend-photo-btn', 'frontend-photo');
  previewer.execute();
  $('#frontend-img-btn').on('click', function () {
    $('#frontend-photo-btn').click();
  }); // remove response time input when time is none

  var responseInput = $('#response');
  $('#time').change(function () {
    if ($(this).val() === 'none') return responseInput.hide();
    responseInput.show();
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserProfileInformationForm);

/***/ }),

/***/ "./resources/js/user_panel/profile/languages.js":
/*!******************************************************!*\
  !*** ./resources/js/user_panel/profile/languages.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "addLang": () => (/* binding */ addLang),
/* harmony export */   "editLang": () => (/* binding */ editLang),
/* harmony export */   "deleteLang": () => (/* binding */ deleteLang)
/* harmony export */ });
var UserProfileLanguagesForm = function UserProfileLanguagesForm() {
  $('#lang-tbl').click(function (event) {
    var element = $(event.target).hasClass('lang-btn-edit') || $(event.target).hasClass('lang-btn-delete') ? $(event.target) : $(event.target).parent();

    if (element.hasClass('lang-btn-edit')) {
      event.preventDefault();
      $('#edit-lang-form').attr('action', '/frontend/profile/language/edit/' + $(element).data('edit-id'));
      $('#edit-lang').modal();
    }

    if (element.hasClass('lang-btn-delete')) {
      event.preventDefault();
      $('#delete-lang-form').attr('action', '/frontend/profile/language/delete/' + $(element).data('delete-id'));
      $('#delete-lang').modal();
    }
  });
  var events = {
    'add-lang-form-btn': addLang,
    'edit-lang-form-btn': editLang,
    'delete-lang-form-btn': deleteLang
  };

  var _loop = function _loop(id) {
    $("#".concat(id)).on('click', function (event) {
      event.preventDefault();
      events[id]();
    });
  };

  for (var id in events) {
    _loop(id);
  }
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserProfileLanguagesForm);
var levels = ['Beginner', 'Intermediate', 'Advanced'];

var record = function record(data) {
  return "\n                <tr id=\"lang-item-".concat(data.id, "\">\n                    <td>\n                        ").concat(data.name, "\n                    </td>\n                    <td id=\"lang-level-").concat(data.id, "\">\n                        ").concat(levels[data.level - 1], "\n                    </td>\n                    <td>\n                        <button class=\"btn btn-light lang-btn-edit\" data-edit-id=\"").concat(data.id, "\"><i class=\"fa fa-edit\"></i></button>\n                        <button class=\"btn btn-light lang-btn-delete\" data-delete-id=\"").concat(data.id, "\"><i class=\"fa fa-trash\"></i></button>\n                    </td>\n                </tr>\n");
};

function addLang() {
  var form = $('#add-lang-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $('#lang-tbl').append(function () {
        return record(data);
      });
    },
    error: function error(data) {
      console.log(data);
      $('#err-msg').text(data.responseJSON.error);
      $('#err-modal').modal();
    }
  });
}
function editLang() {
  var form = $('#edit-lang-form');
  $.ajax({
    type: 'PUT',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $("#lang-level-".concat(data.id)).text(levels[data.level - 1]);
    }
  });
}
function deleteLang() {
  var form = $('#delete-lang-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $("#lang-item-".concat(data.id)).remove();
    }
  });
}

/***/ }),

/***/ "./resources/js/user_panel/profile/skills.js":
/*!***************************************************!*\
  !*** ./resources/js/user_panel/profile/skills.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var UserProfileSkillsForm = function UserProfileSkillsForm() {
  $('#skill-tbl').on('click', function (event) {
    var element = $(event.target).hasClass('skill-btn-edit') || $(event.target).hasClass('skill-btn-delete') ? $(event.target) : $(event.target).parent();

    if ($(element).hasClass('skill-btn-edit')) {
      $('#edit-skill-form').attr('action', '/frontend/profile/skill/edit/' + $(element).data('edit-id'));
      $('#skill-name').val($(element).data('skill-name'));
      $('#skill-level').val($(element).data('skill-level'));
      $('#edit-skill').modal();
    }

    if ($(element).hasClass('skill-btn-delete')) {
      $('#delete-skill-form').attr('action', '/frontend/profile/skill/delete/' + $(element).data('delete-id'));
      $('#delete-skill').modal();
    }
  });
  var events = {
    'add-skill-form-btn': addSkill,
    'edit-skill-form-btn': editSkill,
    'delete-skill-form-btn': deleteSkill
  };

  var _loop = function _loop(id) {
    $("#".concat(id)).on('click', function (event) {
      event.preventDefault();
      events[id]();
    });
  };

  for (var id in events) {
    _loop(id);
  }
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserProfileSkillsForm);
var levels = ['Beginner', 'Intermediate', 'Advanced'];

var record = function record(data) {
  return "\n<tr id=\"skill-item-".concat(data.id, "\">\n    <td>\n        ").concat(data.name, "\n    </td>\n    <td id=\"skill-level-").concat(data.id, "\">\n        ").concat(levels[data.level - 1], "\n    </td>\n    <td>\n        <button class=\"btn btn-light skill-btn-edit\" data-edit-id=\"").concat(data.id, "\" data-skill-name=\"").concat(data.name, "\" data-skill-level=\"").concat(data.level, "\"><i class=\"fa fa-edit\"></i></button>\n        <button class=\"btn btn-light skill-btn-delete\" data-delete-id=\"").concat(data.id, "\"\"><i class=\"fa fa-trash\"></i></button>\n    </td>\n</tr>\n");
};

function addSkill() {
  var form = $('#add-skill form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $('#skill-tbl').append(record(data));
    },
    error: function error(data) {
      $('#err-msg').text(data.responseJSON.error);
      $('#err-modal').modal();
    }
  });
}

function editSkill() {
  var form = $('#edit-skill-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      var levels = ['Beginner', 'Intermediate', 'Advanced'];
      $("#skill-name-".concat(data.id)).text(data.name);
      $("#skill-level-".concat(data.id)).text(levels[data.level - 1]);
    }
  });
}

function deleteSkill() {
  var form = $('#delete-skill-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $("#skill-item-".concat(data.id)).remove();
    }
  });
}

/***/ }),

/***/ "./resources/js/user_panel/profile/slides.js":
/*!***************************************************!*\
  !*** ./resources/js/user_panel/profile/slides.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var UserProfileSlidesForm = function UserProfileSlidesForm() {
  $('#slides-tbl').on('click', function (event) {
    var element = $(event.target).hasClass('slide-btn-edit') || $(event.target).hasClass('slide-btn-delete') ? $(event.target) : $(event.target).parent();

    if ($(element).hasClass('slide-btn-edit')) {
      $('#edit-slide-form').attr('action', '/frontend/profile/slide/edit/' + $(element).data('edit-id'));
      $('#edit-slide').modal();
    }

    if ($(element).hasClass('slide-btn-delete')) {
      $('#delete-slide-form').attr('action', '/frontend/profile/slide/delete/' + $(element).data('delete-id'));
      $('#delete-slide').modal();
    }
  });
  var events = {
    'add-slide-form-btn': addSlide,
    'edit-slide-form-btn': editSlide,
    'delete-slide-form-btn': deleteSlide
  };

  var _loop = function _loop(id) {
    $("#".concat(id)).on('click', function (event) {
      event.preventDefault();
      events[id]();
    });
  };

  for (var id in events) {
    _loop(id);
  }
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserProfileSlidesForm);

var recordTemplate = function recordTemplate(data) {
  return "\n<div class=\"col-md-4 mt-2 mb-2\" id=\"slide-item-".concat(data.id, "\">\n    <a style=\"text-decoration:none\" id=\"slide-path-").concat(data.id, "\" href=\"").concat(data.src, "\" target=\"_blank\">\n        <img class=\"frontend-slides-panel\" id=\"slide-img-").concat(data.id, "\" src=\"").concat(data.src, "\">\n    </a>\n    <div class=\"frontend-slides-controllers\">\n        <button type=\"button\" class=\"btn slide-btn-edit\" data-edit-id=\"").concat(data.id, "\"><i class=\"fa fa-edit\"></i></button>\n        <button type=\"button\" class=\"btn slide-btn-delete\" data-delete-id=\"").concat(data.id, "\"><i class=\"fa fa-trash\"></i></button>\n    </div>\n</div>\n");
};

function addSlide() {
  var form = $('#add-slide-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    processData: false,
    contentType: false,
    data: new FormData(form[0]),
    success: function success(data) {
      $('#slides-tbl').append(recordTemplate(data));
      $('#add-slide').modal('hide');
    }
  });
}

function editSlide() {
  var form = $('#edit-slide-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    processData: false,
    contentType: false,
    data: new FormData(form[0]),
    success: function success(data) {
      $("#slide-img-".concat(data.id)).attr('src', data.src);
      $("#slide-path-".concat(data.id)).attr('href', data.src);
      $('#edit-slide').modal('hide');
    }
  });
}

function deleteSlide() {
  var form = $('#delete-slide-form');
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    success: function success(data) {
      $("#slide-item-".concat(data.id)).remove();
    }
  });
}

/***/ }),

/***/ "./resources/js/utils/ImagePreviewer.js":
/*!**********************************************!*\
  !*** ./resources/js/utils/ImagePreviewer.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var ImagePreviewer = function ImagePreviewer(inputId, viewerId) {
  return {
    execute: function execute() {
      return preview(inputId, viewerId);
    }
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ImagePreviewer);

function preview(inputId, viewerId) {
  $("#".concat(inputId)).change(function () {
    var reader = new FileReader();

    if (this.files && this.files[0]) {
      reader.onload = function (event) {
        var _this = this;

        var src = event.target.result.toString();
        var image = new Image();

        image.onload = function () {
          return $("#".concat(viewerId)).attr('src', src);
        };

        image.onerror = function () {
          return alert("not a valid file: " + _this.files[0].type);
        };

        image.src = src;
      };

      reader.readAsDataURL(this.files[0]);
    }
  });
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
/*!**************************************************!*\
  !*** ./resources/js/user_panel/profile/index.js ***!
  \**************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Profile)
/* harmony export */ });
/* harmony import */ var _information__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./information */ "./resources/js/user_panel/profile/information.js");
/* harmony import */ var _languages__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./languages */ "./resources/js/user_panel/profile/languages.js");
/* harmony import */ var _skills__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./skills */ "./resources/js/user_panel/profile/skills.js");
/* harmony import */ var _slides__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./slides */ "./resources/js/user_panel/profile/slides.js");




function Profile() {
  (0,_information__WEBPACK_IMPORTED_MODULE_0__["default"])();
  (0,_languages__WEBPACK_IMPORTED_MODULE_1__["default"])();
  (0,_skills__WEBPACK_IMPORTED_MODULE_2__["default"])();
  (0,_slides__WEBPACK_IMPORTED_MODULE_3__["default"])();
}
Profile();
})();

/******/ })()
;
