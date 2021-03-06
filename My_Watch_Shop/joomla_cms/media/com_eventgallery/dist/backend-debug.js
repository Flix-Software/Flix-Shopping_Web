/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./eventgallery-backend.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/array/from.js":
/*!*********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/array/from.js ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/array/from */ "../../../../build/node_modules/core-js/library/fn/array/from.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/array/is-array.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/array/is-array.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/array/is-array */ "../../../../build/node_modules/core-js/library/fn/array/is-array.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/get-iterator.js":
/*!***********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/get-iterator.js ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/get-iterator */ "../../../../build/node_modules/core-js/library/fn/get-iterator.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/is-iterable.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/is-iterable.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/is-iterable */ "../../../../build/node_modules/core-js/library/fn/is-iterable.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/json/stringify.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/json/stringify.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/json/stringify */ "../../../../build/node_modules/core-js/library/fn/json/stringify.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/map.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/map.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/map */ "../../../../build/node_modules/core-js/library/fn/map.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/create.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/object/create.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/object/create */ "../../../../build/node_modules/core-js/library/fn/object/create.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/define-property.js":
/*!*********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/object/define-property.js ***!
  \*********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/object/define-property */ "../../../../build/node_modules/core-js/library/fn/object/define-property.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/entries.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/object/entries.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/object/entries */ "../../../../build/node_modules/core-js/library/fn/object/entries.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/get-prototype-of.js":
/*!**********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/object/get-prototype-of.js ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/object/get-prototype-of */ "../../../../build/node_modules/core-js/library/fn/object/get-prototype-of.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/set-prototype-of.js":
/*!**********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/object/set-prototype-of.js ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/object/set-prototype-of */ "../../../../build/node_modules/core-js/library/fn/object/set-prototype-of.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-float.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/parse-float.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/parse-float */ "../../../../build/node_modules/core-js/library/fn/parse-float.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-int.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/parse-int.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/parse-int */ "../../../../build/node_modules/core-js/library/fn/parse-int.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/reflect/construct.js":
/*!****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/reflect/construct.js ***!
  \****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/reflect/construct */ "../../../../build/node_modules/core-js/library/fn/reflect/construct.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/set.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/set.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/set */ "../../../../build/node_modules/core-js/library/fn/set.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/symbol.js":
/*!*****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/symbol.js ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/symbol */ "../../../../build/node_modules/core-js/library/fn/symbol/index.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/symbol/iterator.js":
/*!**************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/core-js/symbol/iterator.js ***!
  \**************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! core-js/library/fn/symbol/iterator */ "../../../../build/node_modules/core-js/library/fn/symbol/iterator.js");

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithHoles.js":
/*!*****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithHoles.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayWithHoles; });
/* harmony import */ var _core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/array/is-array */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/array/is-array.js");
/* harmony import */ var _core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0__);

function _arrayWithHoles(arr) {
  if (_core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0___default()(arr)) return arr;
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithoutHoles.js":
/*!********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithoutHoles.js ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayWithoutHoles; });
/* harmony import */ var _core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/array/is-array */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/array/is-array.js");
/* harmony import */ var _core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0__);

function _arrayWithoutHoles(arr) {
  if (_core_js_array_is_array__WEBPACK_IMPORTED_MODULE_0___default()(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/assertThisInitialized.js":
/*!************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/assertThisInitialized.js ***!
  \************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _assertThisInitialized; });
function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/classCallCheck.js":
/*!*****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/classCallCheck.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _classCallCheck; });
function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/construct.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/construct.js ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _construct; });
/* harmony import */ var _core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/reflect/construct */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/reflect/construct.js");
/* harmony import */ var _core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _setPrototypeOf__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./setPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/setPrototypeOf.js");



function isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !_core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0___default.a) return false;
  if (_core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0___default.a.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(_core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0___default()(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _construct(Parent, args, Class) {
  if (isNativeReflectConstruct()) {
    _construct = _core_js_reflect_construct__WEBPACK_IMPORTED_MODULE_0___default.a;
  } else {
    _construct = function _construct(Parent, args, Class) {
      var a = [null];
      a.push.apply(a, args);
      var Constructor = Function.bind.apply(Parent, a);
      var instance = new Constructor();
      if (Class) Object(_setPrototypeOf__WEBPACK_IMPORTED_MODULE_1__["default"])(instance, Class.prototype);
      return instance;
    };
  }

  return _construct.apply(null, arguments);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/createClass.js":
/*!**************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/createClass.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _createClass; });
/* harmony import */ var _core_js_object_define_property__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/object/define-property */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/define-property.js");
/* harmony import */ var _core_js_object_define_property__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_define_property__WEBPACK_IMPORTED_MODULE_0__);


function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;

    _core_js_object_define_property__WEBPACK_IMPORTED_MODULE_0___default()(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/getPrototypeOf.js":
/*!*****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/getPrototypeOf.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _getPrototypeOf; });
/* harmony import */ var _core_js_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/object/get-prototype-of */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/get-prototype-of.js");
/* harmony import */ var _core_js_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core-js/object/set-prototype-of */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/set-prototype-of.js");
/* harmony import */ var _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_1__);


function _getPrototypeOf(o) {
  _getPrototypeOf = _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_1___default.a ? _core_js_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_0___default.a : function _getPrototypeOf(o) {
    return o.__proto__ || _core_js_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_0___default()(o);
  };
  return _getPrototypeOf(o);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/inherits.js":
/*!***********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/inherits.js ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _inherits; });
/* harmony import */ var _core_js_object_create__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/object/create */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/create.js");
/* harmony import */ var _core_js_object_create__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_create__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _setPrototypeOf__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./setPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/setPrototypeOf.js");


function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = _core_js_object_create__WEBPACK_IMPORTED_MODULE_0___default()(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object(_setPrototypeOf__WEBPACK_IMPORTED_MODULE_1__["default"])(subClass, superClass);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/isNativeFunction.js":
/*!*******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/isNativeFunction.js ***!
  \*******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _isNativeFunction; });
function _isNativeFunction(fn) {
  return Function.toString.call(fn).indexOf("[native code]") !== -1;
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArray.js":
/*!******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArray.js ***!
  \******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _iterableToArray; });
/* harmony import */ var _core_js_array_from__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/array/from */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/array/from.js");
/* harmony import */ var _core_js_array_from__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_array_from__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _core_js_is_iterable__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core-js/is-iterable */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/is-iterable.js");
/* harmony import */ var _core_js_is_iterable__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_core_js_is_iterable__WEBPACK_IMPORTED_MODULE_1__);


function _iterableToArray(iter) {
  if (_core_js_is_iterable__WEBPACK_IMPORTED_MODULE_1___default()(Object(iter)) || Object.prototype.toString.call(iter) === "[object Arguments]") return _core_js_array_from__WEBPACK_IMPORTED_MODULE_0___default()(iter);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArrayLimit.js":
/*!***********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArrayLimit.js ***!
  \***********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _iterableToArrayLimit; });
/* harmony import */ var _core_js_get_iterator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/get-iterator */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/get-iterator.js");
/* harmony import */ var _core_js_get_iterator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_0__);

function _iterableToArrayLimit(arr, i) {
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = _core_js_get_iterator__WEBPACK_IMPORTED_MODULE_0___default()(arr), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableRest.js":
/*!******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableRest.js ***!
  \******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _nonIterableRest; });
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance");
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableSpread.js":
/*!********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableSpread.js ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _nonIterableSpread; });
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/possibleConstructorReturn.js":
/*!****************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/possibleConstructorReturn.js ***!
  \****************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _possibleConstructorReturn; });
/* harmony import */ var _helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/esm/typeof */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/typeof.js");
/* harmony import */ var _assertThisInitialized__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./assertThisInitialized */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/assertThisInitialized.js");


function _possibleConstructorReturn(self, call) {
  if (call && (Object(_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__["default"])(call) === "object" || typeof call === "function")) {
    return call;
  }

  return Object(_assertThisInitialized__WEBPACK_IMPORTED_MODULE_1__["default"])(self);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/setPrototypeOf.js":
/*!*****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/setPrototypeOf.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _setPrototypeOf; });
/* harmony import */ var _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/object/set-prototype-of */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/set-prototype-of.js");
/* harmony import */ var _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_0__);

function _setPrototypeOf(o, p) {
  _setPrototypeOf = _core_js_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_0___default.a || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/slicedToArray.js":
/*!****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/slicedToArray.js ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _slicedToArray; });
/* harmony import */ var _arrayWithHoles__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayWithHoles */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithHoles.js");
/* harmony import */ var _iterableToArrayLimit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./iterableToArrayLimit */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArrayLimit.js");
/* harmony import */ var _nonIterableRest__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./nonIterableRest */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableRest.js");



function _slicedToArray(arr, i) {
  return Object(_arrayWithHoles__WEBPACK_IMPORTED_MODULE_0__["default"])(arr) || Object(_iterableToArrayLimit__WEBPACK_IMPORTED_MODULE_1__["default"])(arr, i) || Object(_nonIterableRest__WEBPACK_IMPORTED_MODULE_2__["default"])();
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/toConsumableArray.js":
/*!********************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/toConsumableArray.js ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _toConsumableArray; });
/* harmony import */ var _arrayWithoutHoles__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayWithoutHoles */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithoutHoles.js");
/* harmony import */ var _iterableToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./iterableToArray */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArray.js");
/* harmony import */ var _nonIterableSpread__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./nonIterableSpread */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableSpread.js");



function _toConsumableArray(arr) {
  return Object(_arrayWithoutHoles__WEBPACK_IMPORTED_MODULE_0__["default"])(arr) || Object(_iterableToArray__WEBPACK_IMPORTED_MODULE_1__["default"])(arr) || Object(_nonIterableSpread__WEBPACK_IMPORTED_MODULE_2__["default"])();
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/typeof.js":
/*!*********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/typeof.js ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _typeof; });
/* harmony import */ var _core_js_symbol_iterator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/symbol/iterator */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/symbol/iterator.js");
/* harmony import */ var _core_js_symbol_iterator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_symbol_iterator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _core_js_symbol__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core-js/symbol */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/symbol.js");
/* harmony import */ var _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_core_js_symbol__WEBPACK_IMPORTED_MODULE_1__);



function _typeof2(obj) { if (typeof _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a === "function" && typeof _core_js_symbol_iterator__WEBPACK_IMPORTED_MODULE_0___default.a === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a === "function" && obj.constructor === _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a && obj !== _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

function _typeof(obj) {
  if (typeof _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a === "function" && _typeof2(_core_js_symbol_iterator__WEBPACK_IMPORTED_MODULE_0___default.a) === "symbol") {
    _typeof = function _typeof(obj) {
      return _typeof2(obj);
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a === "function" && obj.constructor === _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a && obj !== _core_js_symbol__WEBPACK_IMPORTED_MODULE_1___default.a.prototype ? "symbol" : _typeof2(obj);
    };
  }

  return _typeof(obj);
}

/***/ }),

/***/ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/wrapNativeSuper.js":
/*!******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/@babel/runtime-corejs2/helpers/esm/wrapNativeSuper.js ***!
  \******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _wrapNativeSuper; });
/* harmony import */ var _core_js_object_create__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../core-js/object/create */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/create.js");
/* harmony import */ var _core_js_object_create__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_core_js_object_create__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _core_js_map__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core-js/map */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/map.js");
/* harmony import */ var _core_js_map__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_core_js_map__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _getPrototypeOf__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _setPrototypeOf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./setPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/setPrototypeOf.js");
/* harmony import */ var _isNativeFunction__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./isNativeFunction */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/isNativeFunction.js");
/* harmony import */ var _construct__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./construct */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/construct.js");






function _wrapNativeSuper(Class) {
  var _cache = typeof _core_js_map__WEBPACK_IMPORTED_MODULE_1___default.a === "function" ? new _core_js_map__WEBPACK_IMPORTED_MODULE_1___default.a() : undefined;

  _wrapNativeSuper = function _wrapNativeSuper(Class) {
    if (Class === null || !Object(_isNativeFunction__WEBPACK_IMPORTED_MODULE_4__["default"])(Class)) return Class;

    if (typeof Class !== "function") {
      throw new TypeError("Super expression must either be null or a function");
    }

    if (typeof _cache !== "undefined") {
      if (_cache.has(Class)) return _cache.get(Class);

      _cache.set(Class, Wrapper);
    }

    function Wrapper() {
      return Object(_construct__WEBPACK_IMPORTED_MODULE_5__["default"])(Class, arguments, Object(_getPrototypeOf__WEBPACK_IMPORTED_MODULE_2__["default"])(this).constructor);
    }

    Wrapper.prototype = _core_js_object_create__WEBPACK_IMPORTED_MODULE_0___default()(Class.prototype, {
      constructor: {
        value: Wrapper,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    return Object(_setPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(Wrapper, Class);
  };

  return _wrapNativeSuper(Class);
}

/***/ }),

/***/ "../../../../build/node_modules/async/asyncify.js":
/*!******************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/asyncify.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = asyncify;

var _initialParams = __webpack_require__(/*! ./internal/initialParams */ "../../../../build/node_modules/async/internal/initialParams.js");

var _initialParams2 = _interopRequireDefault(_initialParams);

var _setImmediate = __webpack_require__(/*! ./internal/setImmediate */ "../../../../build/node_modules/async/internal/setImmediate.js");

var _setImmediate2 = _interopRequireDefault(_setImmediate);

var _wrapAsync = __webpack_require__(/*! ./internal/wrapAsync */ "../../../../build/node_modules/async/internal/wrapAsync.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/**
 * Take a sync function and make it async, passing its return value to a
 * callback. This is useful for plugging sync functions into a waterfall,
 * series, or other async functions. Any arguments passed to the generated
 * function will be passed to the wrapped function (except for the final
 * callback argument). Errors thrown will be passed to the callback.
 *
 * If the function passed to `asyncify` returns a Promise, that promises's
 * resolved/rejected state will be used to call the callback, rather than simply
 * the synchronous return value.
 *
 * This also means you can asyncify ES2017 `async` functions.
 *
 * @name asyncify
 * @static
 * @memberOf module:Utils
 * @method
 * @alias wrapSync
 * @category Util
 * @param {Function} func - The synchronous function, or Promise-returning
 * function to convert to an {@link AsyncFunction}.
 * @returns {AsyncFunction} An asynchronous wrapper of the `func`. To be
 * invoked with `(args..., callback)`.
 * @example
 *
 * // passing a regular synchronous function
 * async.waterfall([
 *     async.apply(fs.readFile, filename, "utf8"),
 *     async.asyncify(JSON.parse),
 *     function (data, next) {
 *         // data is the result of parsing the text.
 *         // If there was a parsing error, it would have been caught.
 *     }
 * ], callback);
 *
 * // passing a function returning a promise
 * async.waterfall([
 *     async.apply(fs.readFile, filename, "utf8"),
 *     async.asyncify(function (contents) {
 *         return db.model.create(contents);
 *     }),
 *     function (model, next) {
 *         // `model` is the instantiated model object.
 *         // If there was an error, this function would be skipped.
 *     }
 * ], callback);
 *
 * // es2017 example, though `asyncify` is not needed if your JS environment
 * // supports async functions out of the box
 * var q = async.queue(async.asyncify(async function(file) {
 *     var intermediateStep = await processFile(file);
 *     return await somePromise(intermediateStep)
 * }));
 *
 * q.push(files);
 */
function asyncify(func) {
    if ((0, _wrapAsync.isAsync)(func)) {
        return function (...args /*, callback*/) {
            const callback = args.pop();
            const promise = func.apply(this, args);
            return handlePromise(promise, callback);
        };
    }

    return (0, _initialParams2.default)(function (args, callback) {
        var result;
        try {
            result = func.apply(this, args);
        } catch (e) {
            return callback(e);
        }
        // if result is Promise object
        if (result && typeof result.then === 'function') {
            return handlePromise(result, callback);
        } else {
            callback(null, result);
        }
    });
}

function handlePromise(promise, callback) {
    return promise.then(value => {
        invokeCallback(callback, null, value);
    }, err => {
        invokeCallback(callback, err && err.message ? err : new Error(err));
    });
}

function invokeCallback(callback, error, value) {
    try {
        callback(error, value);
    } catch (err) {
        (0, _setImmediate2.default)(e => {
            throw e;
        }, err);
    }
}
module.exports = exports['default'];

/***/ }),

/***/ "../../../../build/node_modules/async/internal/DoublyLinkedList.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/DoublyLinkedList.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
// Simple doubly linked list (https://en.wikipedia.org/wiki/Doubly_linked_list) implementation
// used for queues. This implementation assumes that the node provided by the user can be modified
// to adjust the next and last properties. We implement only the minimal functionality
// for queue support.
class DLL {
    constructor() {
        this.head = this.tail = null;
        this.length = 0;
    }

    removeLink(node) {
        if (node.prev) node.prev.next = node.next;else this.head = node.next;
        if (node.next) node.next.prev = node.prev;else this.tail = node.prev;

        node.prev = node.next = null;
        this.length -= 1;
        return node;
    }

    empty() {
        while (this.head) this.shift();
        return this;
    }

    insertAfter(node, newNode) {
        newNode.prev = node;
        newNode.next = node.next;
        if (node.next) node.next.prev = newNode;else this.tail = newNode;
        node.next = newNode;
        this.length += 1;
    }

    insertBefore(node, newNode) {
        newNode.prev = node.prev;
        newNode.next = node;
        if (node.prev) node.prev.next = newNode;else this.head = newNode;
        node.prev = newNode;
        this.length += 1;
    }

    unshift(node) {
        if (this.head) this.insertBefore(this.head, node);else setInitial(this, node);
    }

    push(node) {
        if (this.tail) this.insertAfter(this.tail, node);else setInitial(this, node);
    }

    shift() {
        return this.head && this.removeLink(this.head);
    }

    pop() {
        return this.tail && this.removeLink(this.tail);
    }

    toArray() {
        return [...this];
    }

    *[Symbol.iterator]() {
        var cur = this.head;
        while (cur) {
            yield cur.data;
            cur = cur.next;
        }
    }

    remove(testFn) {
        var curr = this.head;
        while (curr) {
            var { next } = curr;
            if (testFn(curr)) {
                this.removeLink(curr);
            }
            curr = next;
        }
        return this;
    }
}

exports.default = DLL;
function setInitial(dll, node) {
    dll.length = 1;
    dll.head = dll.tail = node;
}
module.exports = exports["default"];

/***/ }),

/***/ "../../../../build/node_modules/async/internal/initialParams.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/initialParams.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

exports.default = function (fn) {
    return function (...args /*, callback*/) {
        var callback = args.pop();
        return fn.call(this, args, callback);
    };
};

module.exports = exports["default"];

/***/ }),

/***/ "../../../../build/node_modules/async/internal/onlyOnce.js":
/*!***************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/onlyOnce.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = onlyOnce;
function onlyOnce(fn) {
    return function (...args) {
        if (fn === null) throw new Error("Callback was already called.");
        var callFn = fn;
        fn = null;
        callFn.apply(this, args);
    };
}
module.exports = exports["default"];

/***/ }),

/***/ "../../../../build/node_modules/async/internal/queue.js":
/*!************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/queue.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = queue;

var _onlyOnce = __webpack_require__(/*! ./onlyOnce */ "../../../../build/node_modules/async/internal/onlyOnce.js");

var _onlyOnce2 = _interopRequireDefault(_onlyOnce);

var _setImmediate = __webpack_require__(/*! ./setImmediate */ "../../../../build/node_modules/async/internal/setImmediate.js");

var _setImmediate2 = _interopRequireDefault(_setImmediate);

var _DoublyLinkedList = __webpack_require__(/*! ./DoublyLinkedList */ "../../../../build/node_modules/async/internal/DoublyLinkedList.js");

var _DoublyLinkedList2 = _interopRequireDefault(_DoublyLinkedList);

var _wrapAsync = __webpack_require__(/*! ./wrapAsync */ "../../../../build/node_modules/async/internal/wrapAsync.js");

var _wrapAsync2 = _interopRequireDefault(_wrapAsync);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function queue(worker, concurrency, payload) {
    if (concurrency == null) {
        concurrency = 1;
    } else if (concurrency === 0) {
        throw new RangeError('Concurrency must not be zero');
    }

    var _worker = (0, _wrapAsync2.default)(worker);
    var numRunning = 0;
    var workersList = [];
    const events = {
        error: [],
        drain: [],
        saturated: [],
        unsaturated: [],
        empty: []
    };

    function on(event, handler) {
        events[event].push(handler);
    }

    function once(event, handler) {
        const handleAndRemove = (...args) => {
            off(event, handleAndRemove);
            handler(...args);
        };
        events[event].push(handleAndRemove);
    }

    function off(event, handler) {
        if (!event) return Object.keys(events).forEach(ev => events[ev] = []);
        if (!handler) return events[event] = [];
        events[event] = events[event].filter(ev => ev !== handler);
    }

    function trigger(event, ...args) {
        events[event].forEach(handler => handler(...args));
    }

    var processingScheduled = false;
    function _insert(data, insertAtFront, rejectOnError, callback) {
        if (callback != null && typeof callback !== 'function') {
            throw new Error('task callback must be a function');
        }
        q.started = true;

        var res, rej;
        function promiseCallback(err, ...args) {
            // we don't care about the error, let the global error handler
            // deal with it
            if (err) return rejectOnError ? rej(err) : res();
            if (args.length <= 1) return res(args[0]);
            res(args);
        }

        var item = {
            data,
            callback: rejectOnError ? promiseCallback : callback || promiseCallback
        };

        if (insertAtFront) {
            q._tasks.unshift(item);
        } else {
            q._tasks.push(item);
        }

        if (!processingScheduled) {
            processingScheduled = true;
            (0, _setImmediate2.default)(() => {
                processingScheduled = false;
                q.process();
            });
        }

        if (rejectOnError || !callback) {
            return new Promise((resolve, reject) => {
                res = resolve;
                rej = reject;
            });
        }
    }

    function _createCB(tasks) {
        return function (err, ...args) {
            numRunning -= 1;

            for (var i = 0, l = tasks.length; i < l; i++) {
                var task = tasks[i];

                var index = workersList.indexOf(task);
                if (index === 0) {
                    workersList.shift();
                } else if (index > 0) {
                    workersList.splice(index, 1);
                }

                task.callback(err, ...args);

                if (err != null) {
                    trigger('error', err, task.data);
                }
            }

            if (numRunning <= q.concurrency - q.buffer) {
                trigger('unsaturated');
            }

            if (q.idle()) {
                trigger('drain');
            }
            q.process();
        };
    }

    function _maybeDrain(data) {
        if (data.length === 0 && q.idle()) {
            // call drain immediately if there are no tasks
            (0, _setImmediate2.default)(() => trigger('drain'));
            return true;
        }
        return false;
    }

    const eventMethod = name => handler => {
        if (!handler) {
            return new Promise((resolve, reject) => {
                once(name, (err, data) => {
                    if (err) return reject(err);
                    resolve(data);
                });
            });
        }
        off(name);
        on(name, handler);
    };

    var isProcessing = false;
    var q = {
        _tasks: new _DoublyLinkedList2.default(),
        *[Symbol.iterator]() {
            yield* q._tasks[Symbol.iterator]();
        },
        concurrency,
        payload,
        buffer: concurrency / 4,
        started: false,
        paused: false,
        push(data, callback) {
            if (Array.isArray(data)) {
                if (_maybeDrain(data)) return;
                return data.map(datum => _insert(datum, false, false, callback));
            }
            return _insert(data, false, false, callback);
        },
        pushAsync(data, callback) {
            if (Array.isArray(data)) {
                if (_maybeDrain(data)) return;
                return data.map(datum => _insert(datum, false, true, callback));
            }
            return _insert(data, false, true, callback);
        },
        kill() {
            off();
            q._tasks.empty();
        },
        unshift(data, callback) {
            if (Array.isArray(data)) {
                if (_maybeDrain(data)) return;
                return data.map(datum => _insert(datum, true, false, callback));
            }
            return _insert(data, true, false, callback);
        },
        unshiftAsync(data, callback) {
            if (Array.isArray(data)) {
                if (_maybeDrain(data)) return;
                return data.map(datum => _insert(datum, true, true, callback));
            }
            return _insert(data, true, true, callback);
        },
        remove(testFn) {
            q._tasks.remove(testFn);
        },
        process() {
            // Avoid trying to start too many processing operations. This can occur
            // when callbacks resolve synchronously (#1267).
            if (isProcessing) {
                return;
            }
            isProcessing = true;
            while (!q.paused && numRunning < q.concurrency && q._tasks.length) {
                var tasks = [],
                    data = [];
                var l = q._tasks.length;
                if (q.payload) l = Math.min(l, q.payload);
                for (var i = 0; i < l; i++) {
                    var node = q._tasks.shift();
                    tasks.push(node);
                    workersList.push(node);
                    data.push(node.data);
                }

                numRunning += 1;

                if (q._tasks.length === 0) {
                    trigger('empty');
                }

                if (numRunning === q.concurrency) {
                    trigger('saturated');
                }

                var cb = (0, _onlyOnce2.default)(_createCB(tasks));
                _worker(data, cb);
            }
            isProcessing = false;
        },
        length() {
            return q._tasks.length;
        },
        running() {
            return numRunning;
        },
        workersList() {
            return workersList;
        },
        idle() {
            return q._tasks.length + numRunning === 0;
        },
        pause() {
            q.paused = true;
        },
        resume() {
            if (q.paused === false) {
                return;
            }
            q.paused = false;
            (0, _setImmediate2.default)(q.process);
        }
    };
    // define these as fixed properties, so people get useful errors when updating
    Object.defineProperties(q, {
        saturated: {
            writable: false,
            value: eventMethod('saturated')
        },
        unsaturated: {
            writable: false,
            value: eventMethod('unsaturated')
        },
        empty: {
            writable: false,
            value: eventMethod('empty')
        },
        drain: {
            writable: false,
            value: eventMethod('drain')
        },
        error: {
            writable: false,
            value: eventMethod('error')
        }
    });
    return q;
}
module.exports = exports['default'];

/***/ }),

/***/ "../../../../build/node_modules/async/internal/setImmediate.js":
/*!*******************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/setImmediate.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(setImmediate, process) {
/* istanbul ignore file */

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.fallback = fallback;
exports.wrap = wrap;
var hasSetImmediate = exports.hasSetImmediate = typeof setImmediate === 'function' && setImmediate;
var hasNextTick = exports.hasNextTick = typeof process === 'object' && typeof process.nextTick === 'function';

function fallback(fn) {
    setTimeout(fn, 0);
}

function wrap(defer) {
    return (fn, ...args) => defer(() => fn(...args));
}

var _defer;

if (hasSetImmediate) {
    _defer = setImmediate;
} else if (hasNextTick) {
    _defer = process.nextTick;
} else {
    _defer = fallback;
}

exports.default = wrap(_defer);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../timers-browserify/main.js */ "../../../../build/node_modules/timers-browserify/main.js").setImmediate, __webpack_require__(/*! ./../../process/browser.js */ "../../../../build/node_modules/process/browser.js")))

/***/ }),

/***/ "../../../../build/node_modules/async/internal/wrapAsync.js":
/*!****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/internal/wrapAsync.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.isAsyncIterable = exports.isAsyncGenerator = exports.isAsync = undefined;

var _asyncify = __webpack_require__(/*! ../asyncify */ "../../../../build/node_modules/async/asyncify.js");

var _asyncify2 = _interopRequireDefault(_asyncify);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function isAsync(fn) {
    return fn[Symbol.toStringTag] === 'AsyncFunction';
}

function isAsyncGenerator(fn) {
    return fn[Symbol.toStringTag] === 'AsyncGenerator';
}

function isAsyncIterable(obj) {
    return typeof obj[Symbol.asyncIterator] === 'function';
}

function wrapAsync(asyncFn) {
    if (typeof asyncFn !== 'function') throw new Error('expected a function');
    return isAsync(asyncFn) ? (0, _asyncify2.default)(asyncFn) : asyncFn;
}

exports.default = wrapAsync;
exports.isAsync = isAsync;
exports.isAsyncGenerator = isAsyncGenerator;
exports.isAsyncIterable = isAsyncIterable;

/***/ }),

/***/ "../../../../build/node_modules/async/queue.js":
/*!***************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/async/queue.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

exports.default = function (worker, concurrency) {
  var _worker = (0, _wrapAsync2.default)(worker);
  return (0, _queue2.default)((items, cb) => {
    _worker(items[0], cb);
  }, concurrency, 1);
};

var _queue = __webpack_require__(/*! ./internal/queue */ "../../../../build/node_modules/async/internal/queue.js");

var _queue2 = _interopRequireDefault(_queue);

var _wrapAsync = __webpack_require__(/*! ./internal/wrapAsync */ "../../../../build/node_modules/async/internal/wrapAsync.js");

var _wrapAsync2 = _interopRequireDefault(_wrapAsync);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

module.exports = exports['default'];

/**
 * A queue of tasks for the worker function to complete.
 * @typedef {Iterable} QueueObject
 * @memberOf module:ControlFlow
 * @property {Function} length - a function returning the number of items
 * waiting to be processed. Invoke with `queue.length()`.
 * @property {boolean} started - a boolean indicating whether or not any
 * items have been pushed and processed by the queue.
 * @property {Function} running - a function returning the number of items
 * currently being processed. Invoke with `queue.running()`.
 * @property {Function} workersList - a function returning the array of items
 * currently being processed. Invoke with `queue.workersList()`.
 * @property {Function} idle - a function returning false if there are items
 * waiting or being processed, or true if not. Invoke with `queue.idle()`.
 * @property {number} concurrency - an integer for determining how many `worker`
 * functions should be run in parallel. This property can be changed after a
 * `queue` is created to alter the concurrency on-the-fly.
 * @property {number} payload - an integer that specifies how many items are
 * passed to the worker function at a time. only applies if this is a
 * [cargo]{@link module:ControlFlow.cargo} object
 * @property {AsyncFunction} push - add a new task to the `queue`. Calls `callback`
 * once the `worker` has finished processing the task. Instead of a single task,
 * a `tasks` array can be submitted. The respective callback is used for every
 * task in the list. Invoke with `queue.push(task, [callback])`,
 * @property {AsyncFunction} unshift - add a new task to the front of the `queue`.
 * Invoke with `queue.unshift(task, [callback])`.
 * @property {AsyncFunction} pushAsync - the same as `q.push`, except this returns
 * a promise that rejects if an error occurs.
 * @property {AsyncFunction} unshirtAsync - the same as `q.unshift`, except this returns
 * a promise that rejects if an error occurs.
 * @property {Function} remove - remove items from the queue that match a test
 * function.  The test function will be passed an object with a `data` property,
 * and a `priority` property, if this is a
 * [priorityQueue]{@link module:ControlFlow.priorityQueue} object.
 * Invoked with `queue.remove(testFn)`, where `testFn` is of the form
 * `function ({data, priority}) {}` and returns a Boolean.
 * @property {Function} saturated - a function that sets a callback that is
 * called when the number of running workers hits the `concurrency` limit, and
 * further tasks will be queued.  If the callback is omitted, `q.saturated()`
 * returns a promise for the next occurrence.
 * @property {Function} unsaturated - a function that sets a callback that is
 * called when the number of running workers is less than the `concurrency` &
 * `buffer` limits, and further tasks will not be queued. If the callback is
 * omitted, `q.unsaturated()` returns a promise for the next occurrence.
 * @property {number} buffer - A minimum threshold buffer in order to say that
 * the `queue` is `unsaturated`.
 * @property {Function} empty - a function that sets a callback that is called
 * when the last item from the `queue` is given to a `worker`. If the callback
 * is omitted, `q.empty()` returns a promise for the next occurrence.
 * @property {Function} drain - a function that sets a callback that is called
 * when the last item from the `queue` has returned from the `worker`. If the
 * callback is omitted, `q.drain()` returns a promise for the next occurrence.
 * @property {Function} error - a function that sets a callback that is called
 * when a task errors. Has the signature `function(error, task)`. If the
 * callback is omitted, `error()` returns a promise that rejects on the next
 * error.
 * @property {boolean} paused - a boolean for determining whether the queue is
 * in a paused state.
 * @property {Function} pause - a function that pauses the processing of tasks
 * until `resume()` is called. Invoke with `queue.pause()`.
 * @property {Function} resume - a function that resumes the processing of
 * queued tasks when the queue is paused. Invoke with `queue.resume()`.
 * @property {Function} kill - a function that removes the `drain` callback and
 * empties remaining tasks from the queue forcing it to go idle. No more tasks
 * should be pushed to the queue after calling this function. Invoke with `queue.kill()`.
 *
 * @example
 * const q = aync.queue(worker, 2)
 * q.push(item1)
 * q.push(item2)
 * q.push(item3)
 * // queues are iterable, spread into an array to inspect
 * const items = [...q] // [item1, item2, item3]
 * // or use for of
 * for (let item of q) {
 *     console.log(item)
 * }
 *
 * q.drain(() => {
 *     console.log('all done')
 * })
 * // or
 * await q.drain()
 */

/**
 * Creates a `queue` object with the specified `concurrency`. Tasks added to the
 * `queue` are processed in parallel (up to the `concurrency` limit). If all
 * `worker`s are in progress, the task is queued until one becomes available.
 * Once a `worker` completes a `task`, that `task`'s callback is called.
 *
 * @name queue
 * @static
 * @memberOf module:ControlFlow
 * @method
 * @category Control Flow
 * @param {AsyncFunction} worker - An async function for processing a queued task.
 * If you want to handle errors from an individual task, pass a callback to
 * `q.push()`. Invoked with (task, callback).
 * @param {number} [concurrency=1] - An `integer` for determining how many
 * `worker` functions should be run in parallel.  If omitted, the concurrency
 * defaults to `1`.  If the concurrency is `0`, an error is thrown.
 * @returns {module:ControlFlow.QueueObject} A queue object to manage the tasks. Callbacks can be
 * attached as certain properties to listen for specific events during the
 * lifecycle of the queue.
 * @example
 *
 * // create a queue object with concurrency 2
 * var q = async.queue(function(task, callback) {
 *     console.log('hello ' + task.name);
 *     callback();
 * }, 2);
 *
 * // assign a callback
 * q.drain(function() {
 *     console.log('all items have been processed');
 * });
 * // or await the end
 * await q.drain()
 *
 * // assign an error callback
 * q.error(function(err, task) {
 *     console.error('task experienced an error');
 * });
 *
 * // add some items to the queue
 * q.push({name: 'foo'}, function(err) {
 *     console.log('finished processing foo');
 * });
 * // callback is optional
 * q.push({name: 'bar'});
 *
 * // add some items to the queue (batch-wise)
 * q.push([{name: 'baz'},{name: 'bay'},{name: 'bax'}], function(err) {
 *     console.log('finished processing item');
 * });
 *
 * // add some items to the front of the queue
 * q.unshift({name: 'bar'}, function (err) {
 *     console.log('finished processing bar');
 * });
 */

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! async/queue */ "../../../../build/node_modules/async/queue.js");
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(async_queue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Groups_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Groups.vue */ "./backend/vue/cacheclear/Groups.vue");
/* harmony import */ var _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/ProcessSteps.vue */ "./backend/vue/components/ProcessSteps.vue");
/* harmony import */ var _components_Progress_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/Progress.vue */ "./backend/vue/components/Progress.vue");
/* harmony import */ var _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/ErrorPanel.vue */ "./backend/vue/components/ErrorPanel.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Groups: _Groups_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Progress: _components_Progress_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    ErrorPanel: _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    ProcessSteps: _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  props: {
    i18n: null,
    elementsJson: null,
    groupsJson: null,
    cacheClearUrl: null,
    csrfToken: null
  },
  data: function data() {
    return {
      elements: [],
      groups: [],
      failedElements: [],
      errorMessages: [],
      queue: null,
      numberOfRunningTasks: 0,
      numberOfTasks: 0,
      numberOfLastQueuePush: 0,
      running: false
    };
  },
  created: function created() {
    var _this = this;

    this.queue = async_queue__WEBPACK_IMPORTED_MODULE_0___default()(function (task, callback) {
      task(callback);
    }, 1);
    this.queue.drain(function () {
      _this.updateQueueStatus();

      _this.running = false;
    });
  },
  mounted: function mounted() {
    this.elements = JSON.parse(this.elementsJson);
    this.groups = JSON.parse(this.groupsJson);
  },
  computed: {
    selectedElements: function selectedElements() {
      return this.elements.filter(function (element) {
        return element.checked;
      });
    },
    isReadyForCacheDeletion: function isReadyForCacheDeletion() {
      return this.selectedElements.filter(function (element) {
        return !element.removed;
      }).length > 0;
    }
  },
  methods: {
    checkAll: function checkAll() {
      this.elements.forEach(function (element) {
        element.checked = true;
      });
    },
    uncheckAll: function uncheckAll() {
      this.elements.forEach(function (element) {
        element.checked = false;
      });
    },
    stopQueue: function stopQueue() {
      this.queue.remove(function () {
        return true;
      });
    },
    updateQueueStatus: function updateQueueStatus() {
      this.numberOfRunningTasks = this.queue.running();
      this.numberOfTasks = this.queue.length() + this.numberOfRunningTasks;
    },
    clearCache: function clearCache() {
      var _this2 = this;

      this.running = true;
      this.selectedElements.forEach(function (element) {
        _this2.queue.push(function (done) {
          _this2.clearCacheForElement(element, function () {
            done();

            _this2.updateQueueStatus();
          });
        });
      });
      this.numberOfLastQueuePush = this.selectedElements.length;
    },
    clearCacheForElement: function clearCacheForElement(element, done) {
      var _this3 = this;

      var data = element.group + '=' + element.value + '&' + this.csrfToken + '=1';
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              _this3.$set(element, 'removed', true);
            } catch (e) {
              console.log(e);

              _this3.errorMessages.push(xhr.responseText);
            }
          }

          done();
        }
      };

      xhr.open("POST", this.cacheClearUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    group: null,
    elements: null
  },
  computed: {
    sortedElements: function sortedElements() {
      var _this = this;

      return this.elements.slice().filter(function (a) {
        return !a.removed && a.group === _this.group.name && a.count > 0;
      }).sort(function (a, b) {
        return a.name.localeCompare(b.name);
      });
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Elements_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Elements.vue */ "./backend/vue/cacheclear/Elements.vue");
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Elements: _Elements_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    groups: null,
    elements: null,
    blocked: null
  },
  computed: {}
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    headline: null,
    errorMessages: null,
    failedFolders: null
  },
  computed: {
    reversedErrorMessages: function reversedErrorMessages() {
      return this.errorMessages.slice().reverse();
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folder.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    folder: null,
    i18n_labelNeedSync: String
  },
  methods: {},
  computed: {
    folderid: function folderid() {
      return 'folder_' + this.folder.foldername;
    },
    numberOfFilesLeft: function numberOfFilesLeft() {
      return this.folder.files.filter(function (file) {
        return file.status !== 'sync';
      }).length;
    },
    status: function status() {
      return this.folder.status;
    },
    backgroundColor: function backgroundColor() {
      if (!this.folder || !this.folder.status) return "";

      if (this.folder.status === 'sync') {
        console.log(this.numberOfFilesLeft);

        if (this.numberOfFilesLeft === 0) {
          return "lightgreen";
        }

        return '#FAFAD2';
      }

      if (this.folder.status === 'nosync') {
        return "#DDD";
      }

      if (this.folder.status === 'deleted') {
        return 'orange';
      }
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folders.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Folder_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Folder.vue */ "./backend/vue/components/Folder.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Folder: _Folder_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    folders: null,
    blocked: null,
    i18n_labelNeedSync: String
  },
  computed: {
    sortedFolders: function sortedFolders() {
      return this.folders.slice().sort(function (a, b) {
        return a.foldername.localeCompare(b.foldername);
      });
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    running: null,
    isReadyForSyncFiles: null,
    numberOfSelectedFolders: null,
    numberOfSelectedFiles: null,
    i18n_labelStep1: String,
    i18n_labelStep2: String,
    i18n_hintStep2: String,
    i18n_labelButtonStep2: String,
    i18n_labelStep3: String,
    i18n_hintStep3: String,
    i18n_labelButtonStep3: String,
    i18n_labelItemsStep2: String,
    i18n_labelItemsStep3: String
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Progress.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    remaining: null,
    total: null
  },
  computed: {
    progress: function progress() {
      return (this.total - this.remaining) / this.total * 100;
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! async/queue */ "../../../../build/node_modules/async/queue.js");
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(async_queue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_js_BatchCreator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../common/js/BatchCreator */ "./common/js/BatchCreator.js");
/* harmony import */ var _components_Folders_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Folders.vue */ "./backend/vue/components/Folders.vue");
/* harmony import */ var _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/ProcessSteps.vue */ "./backend/vue/components/ProcessSteps.vue");
/* harmony import */ var _components_Progress_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/Progress.vue */ "./backend/vue/components/Progress.vue");
/* harmony import */ var _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../components/ErrorPanel.vue */ "./backend/vue/components/ErrorPanel.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Folders: _components_Folders_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Progress: _components_Progress_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    ErrorPanel: _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_5__["default"],
    ProcessSteps: _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  props: {
    i18n: null,
    loadFoldersUrl: null,
    fileSyncUrl: null,
    folderSyncUrl: null,
    csrfToken: null,
    fileBatchSize: null,
    maxParallelRequests: null
  },
  data: function data() {
    return {
      folders: [],
      failedFolders: [],
      errorMessages: [],
      queue: null,
      numberOfRunningTasks: 0,
      numberOfTasks: 0,
      numberOfLastQueuePush: 0,
      running: false
    };
  },
  created: function created() {
    var _this = this;

    this.queue = async_queue__WEBPACK_IMPORTED_MODULE_0___default()(function (task, callback) {
      task(callback);
    }, this.maxParallelRequests);
    this.queue.drain(function () {
      _this.updateQueueStatus();

      _this.running = false;
    });
  },
  mounted: function mounted() {
    this.loadFolders();
  },
  computed: {
    numberOfSyncableFiles: function numberOfSyncableFiles() {
      var number = 0;
      this.selectedFolders.forEach(function (folder) {
        if (folder.files) {
          number += folder.files.length;
        }
      });
      return number;
    },
    selectedFolders: function selectedFolders() {
      return this.folders.filter(function (folder) {
        return folder.checked;
      });
    },
    isSyncFilesProcessReadyToStart: function isSyncFilesProcessReadyToStart() {
      var isReady = this.selectedFolders.length > 0;
      this.selectedFolders.forEach(function (folder) {
        if (!folder.files) {
          isReady = false;
        }
      });
      return isReady;
    }
  },
  methods: {
    checkAll: function checkAll() {
      this.folders.forEach(function (folder) {
        folder.checked = true;
      });
    },
    uncheckAll: function uncheckAll() {
      this.folders.forEach(function (folder) {
        folder.checked = false;
      });
    },
    stopQueue: function stopQueue() {
      this.queue.remove(function () {
        return true;
      });
    },
    updateQueueStatus: function updateQueueStatus() {
      this.numberOfRunningTasks = this.queue.running();
      this.numberOfTasks = this.queue.length() + this.numberOfRunningTasks;
    },
    syncFolders: function syncFolders() {
      var _this2 = this;

      this.running = true;
      this.selectedFolders.forEach(function (folder) {
        _this2.queue.push(function (done) {
          _this2.syncFolder(folder, function () {
            done();

            _this2.updateQueueStatus();
          });
        });
      });
      this.numberOfLastQueuePush = this.selectedFolders.length;
    },
    syncFolder: function syncFolder(folder, done) {
      var _this3 = this;

      var data = 'folder=' + folder.foldername + "&foldertype=" + folder.foldertype + '&' + this.csrfToken + '=1';
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              var responseJSON = JSON.parse(xhr.responseText);
              var files = [];
              responseJSON.files.forEach(function (file) {
                files.push({
                  foldername: folder.foldername,
                  filename: file,
                  status: 'new'
                });
              });

              _this3.$set(folder, 'files', files);

              _this3.$set(folder, 'status', responseJSON.status);
            } catch (e) {
              console.log(e);

              _this3.errorMessages.push(xhr.responseText);
            }
          }

          done();
        }
      };

      xhr.open("POST", this.folderSyncUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    },
    syncFiles: function syncFiles() {
      var _this4 = this;

      this.running = true;
      var files = [];
      this.folders.forEach(function (folder) {
        if (folder.checked) {
          folder.files.forEach(function (file) {
            files.push(file);
          });
        }
      });
      var batches = Object(_common_js_BatchCreator__WEBPACK_IMPORTED_MODULE_1__["createBatches"])(files, this.fileBatchSize);
      batches.forEach(function (fileBatch) {
        _this4.queue.push(function (done) {
          _this4.syncFileBatch(fileBatch, function () {
            done();

            _this4.updateQueueStatus();
          });
        });
      });
      this.numberOfLastQueuePush = files.length > 0 ? batches.length : 0;
    },
    syncFileBatch: function syncFileBatch(fileBatch, done) {
      var _this5 = this;

      var data = this.csrfToken + '=1';
      fileBatch.forEach(function (file) {
        data += '&folder[]=' + encodeURIComponent(file.foldername) + '&file[]=' + encodeURIComponent(file.filename);
      });
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              var resultFiles = JSON.parse(xhr.responseText);
              fileBatch.forEach(function (file) {
                resultFiles.forEach(function (resultFile) {
                  if (file.foldername === resultFile.foldername && file.filename === resultFile.filename) {
                    file.status = resultFile.sync;
                  }
                });
              });
            } catch (e) {
              console.log(e);

              _this5.errorMessages.push(xhr.responseText);
            }
          }

          done();
        }
      };

      xhr.open("POST", this.fileSyncUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    },
    loadFolders: function loadFolders() {
      var _this6 = this;

      var xhr = new XMLHttpRequest();
      var data = this.csrfToken + '=1';

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          try {
            var folders = JSON.parse(xhr.responseText);
            folders.forEach(function (folder) {
              if (folder.error != null) {
                _this6.failedFolders.push(folder);
              } else {
                folder.checked = folder.isNew;

                _this6.folders.push(folder);
              }
            });
          } catch (e) {
            console.log(e);

            _this6.errorMessages.push(xhr.responseText);
          }
        }
      };

      xhr.open("POST", this.loadFoldersUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageSelector_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageSelector.vue */ "./backend/vue/imagecontentpluginform/ImageSelector.vue");
/* harmony import */ var _Input_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Input.vue */ "./backend/vue/imagecontentpluginform/Input.vue");
/* harmony import */ var _Select_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Select.vue */ "./backend/vue/imagecontentpluginform/Select.vue");
/* harmony import */ var _Radio_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Radio.vue */ "./backend/vue/imagecontentpluginform/Radio.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    ImageSelector: _ImageSelector_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    Input: _Input_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Select: _Select_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Radio: _Radio_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  props: {
    editorName: null,
    loadFoldersUrl: null,
    loadFilesUrl: null,
    formId: null,
    formDefinitionJson: null,
    i18n: null
  },
  data: function data() {
    return {
      data: {
        attr: null,
        image_crop: null,
        image_mode: null,
        image_width: null,
        cssclass: null,
        use_cart: null,
        image: {
          file: null,
          folder: null,
          thumb: null
        }
      },
      formDefinition: JSON.parse(this.formDefinitionJson)
    };
  },
  computed: {
    tagContent: function tagContent() {
      var tag = "{eventgallery-image ";
      tag = tag + "event='" + this.data.image.folder + "' ";
      tag = tag + "file='" + this.data.image.file + "' ";
      tag = tag + "attr='" + this.data.attr + "' ";

      if (this.data.attr === "image") {
        tag = tag + "mode='" + this.data.image_mode + "' ";
        tag = tag + "crop='" + this.data.image_crop + "' ";
        if (this.data.image_width) tag = tag + "thumb_width='" + this.data.image_width + "' ";
        if (this.data.cssclass) tag = tag + "cssclass='" + this.data.cssclass + "' ";
      }

      tag = tag + "}";
      return tag;
    }
  },
  methods: {
    insertImageContentTag: function insertImageContentTag() {
      console.log(this.tagContent); // Joomla 3.x code

      if (window.parent.jInsertEditorText) {
        window.parent.jInsertEditorText(this.tagContent, this.editorName);
        window.parent.SqueezeBox.close();
      } else {
        // Joomla 4 code
        window.parent.Joomla.editors.instances[this.editorName].replaceSelection(this.tagContent);
        window.parent.Joomla.Modal.getCurrent().close();
      }

      return false;
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Label__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label */ "./backend/vue/imagecontentpluginform/Label.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Label: _Label__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    name: null,
    label: null,
    description: null,
    loadFoldersUrl: null,
    loadFilesUrl: null,
    value: null
  },
  data: function data() {
    return {
      file: "",
      thumb: "",
      folder: "",
      folders: [],
      files: [],
      isLoading: false,
      folderFilter: "",
      showImageSelectorState: false
    };
  },
  computed: {
    filteredFolders: function filteredFolders() {
      var _this = this;

      if (this.folderFilter === "") return this.folders;
      return this.folders.filter(function (folder) {
        if (folder.folder.toLowerCase().indexOf(_this.folderFilter.toLowerCase()) > 0) {
          return true;
        }

        if (folder.name.toLowerCase().indexOf(_this.folderFilter.toLowerCase()) > 0) {
          return true;
        }

        return false;
      });
    },
    image: function image() {
      var imageObject = {
        file: this.file,
        folder: this.folder,
        thumb: this.thumb
      };
      return imageObject;
    }
  },
  created: function created() {
    var _this2 = this;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          try {
            _this2.folders = JSON.parse(xhr.responseText);
          } catch (e) {
            console.log(e);
          }
        }
      }
    };

    xhr.open("GET", this.loadFoldersUrl);
    xhr.send();
  },
  methods: {
    loadFiles: function loadFiles(folder) {
      var _this3 = this;

      if (this.isLoading) return;
      this.folder = folder;
      this.isLoading = true;
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              _this3.files = JSON.parse(xhr.responseText);
              setTimeout(_this3.sendCustomEvent, 500);
            } catch (e) {
              console.log(e);
            }

            _this3.isLoading = false;
          }
        }
      };

      xhr.open("GET", this.loadFilesUrl + '&folder=' + folder);
      xhr.send();
    },
    setImage: function setImage(file) {
      if (file) {
        this.folder = file.folder;
        this.file = file.file;
        this.thumb = file.thumb;
      }

      this.$emit('input', this.image);
      if (this.callback) this.callback();
      this.hideImageSelector();
      setTimeout(this.sendCustomEvent, 500);
    },
    sendCustomEvent: function sendCustomEvent() {
      var event = new CustomEvent('eventgallery-images-added');
      document.dispatchEvent(event);
    },
    showImageSelector: function showImageSelector() {
      this.showImageSelectorState = true;
    },
    hideImageSelector: function hideImageSelector() {
      this.showImageSelectorState = false;
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Label__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label */ "./backend/vue/imagecontentpluginform/Label.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Label: _Label__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    name: null,
    label: null,
    description: null,
    value: null
  },
  data: function data() {
    return {};
  },
  methods: {}
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    label: String,
    description: String
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Label__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label */ "./backend/vue/imagecontentpluginform/Label.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Label: _Label__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    name: null,
    label: null,
    description: null,
    value: null,
    options: null,
    defaultValue: null
  },
  data: function data() {
    return {
      currentOption: ""
    };
  },
  watch: {
    value: function value(newValue) {
      this.currentOption = newValue;
    }
  },
  mounted: function mounted() {
    this.currentOption = this.options[0].value;
    this.$emit('input', this.currentOption);
  },
  methods: {}
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Label__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label */ "./backend/vue/imagecontentpluginform/Label.vue");
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Label: _Label__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    name: null,
    label: null,
    description: null,
    value: null,
    options: null,
    defaultValue: null
  },
  data: function data() {
    return {
      currentOption: ""
    };
  },
  watch: {
    value: function value(newValue) {
      this.currentOption = newValue;
    }
  },
  mounted: function mounted() {
    this.currentOption = this.defaultValue;
    this.$emit('input', this.currentOption);
  },
  methods: {}
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_core_js_object_entries__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/object/entries */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/object/entries.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_object_entries__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_object_entries__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/json/stringify */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/json/stringify.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/parse-int */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-int.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_2__);



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    inputName: null,
    inputId: null,
    inputValue: null,
    i18n: null
  },
  data: function data() {
    return {
      scalePrices: [],
      newQuantity: '',
      newPrice: '',
      currentId: 0
    };
  },
  computed: {
    sortedScalePrices: function sortedScalePrices() {
      return this.scalePrices.sort(function (sp1, sp2) {
        var n1 = _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_2___default()(sp1.quantity);

        var n2 = _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_2___default()(sp2.quantity);

        if (n1 > n2) return 1;
        if (n1 < n2) return -1;
        return 0;
      });
    },
    currentInputValue: function currentInputValue() {
      var simpleDataStructure = [];
      this.sortedScalePrices.map(function (scalePrice) {
        return {
          quantity: scalePrice.quantity,
          price: scalePrice.price
        };
      });
      return _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_1___default()(simpleDataStructure);
    }
  },
  mounted: function mounted() {
    var _this = this;

    var data = JSON.parse(this.inputValue);
    this.scalePrices = [];

    _babel_runtime_corejs2_core_js_object_entries__WEBPACK_IMPORTED_MODULE_0___default()(data).forEach(function (entry) {
      _this.createEntry(entry.quantity, entry.price);
    });
  },
  methods: {
    addScalePrice: function addScalePrice() {
      if (this.newQuantity > 1 && this.newPrice.length > 0) {
        this.deleteQuantity(this.newQuantity);
        this.createEntry(this.newQuantity, this.newPrice);
        this.newPrice = '';
        this.newQuantity = '';
      }
    },
    deleteQuantity: function deleteQuantity(quantity) {
      this.scalePrices = this.scalePrices.filter(function (scalePrice) {
        return scalePrice.quantity !== quantity;
      });
    },
    createEntry: function createEntry(quantity, price) {
      this.scalePrices.push({
        price: price,
        quantity: quantity,
        id: this.getNextId()
      });
    },
    getNextId: function getNextId() {
      return this.currentId++;
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! async/queue */ "../../../../build/node_modules/async/queue.js");
/* harmony import */ var async_queue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(async_queue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_js_BatchCreator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../common/js/BatchCreator */ "./common/js/BatchCreator.js");
/* harmony import */ var _components_Folders_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Folders.vue */ "./backend/vue/components/Folders.vue");
/* harmony import */ var _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/ProcessSteps.vue */ "./backend/vue/components/ProcessSteps.vue");
/* harmony import */ var _components_Progress_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/Progress.vue */ "./backend/vue/components/Progress.vue");
/* harmony import */ var _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../components/ErrorPanel.vue */ "./backend/vue/components/ErrorPanel.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Folders: _components_Folders_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Progress: _components_Progress_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    ErrorPanel: _components_ErrorPanel_vue__WEBPACK_IMPORTED_MODULE_5__["default"],
    ProcessSteps: _components_ProcessSteps_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  props: {
    i18n: null,
    loadFoldersUrl: null,
    fileSyncUrl: null,
    folderSyncUrl: null,
    csrfToken: null,
    fileBatchSize: null,
    maxParallelRequests: null
  },
  data: function data() {
    return {
      folders: [],
      failedFolders: [],
      errorMessages: [],
      queue: null,
      numberOfRunningTasks: 0,
      numberOfTasks: 0,
      numberOfLastQueuePush: 0,
      running: false,
      refreshetags: true
    };
  },
  created: function created() {
    var _this = this;

    this.queue = async_queue__WEBPACK_IMPORTED_MODULE_0___default()(function (task, callback) {
      task(callback);
    }, this.maxParallelRequests);
    this.queue.drain(function () {
      _this.updateQueueStatus();

      _this.running = false;
    });
  },
  mounted: function mounted() {
    this.loadFolders();
  },
  computed: {
    numberOfSyncableFiles: function numberOfSyncableFiles() {
      var number = 0;
      this.selectedFolders.forEach(function (folder) {
        if (folder.files) {
          number += folder.files.filter(function (file) {
            return file.status !== 'synced';
          }).length; //number +=folder.files.length
        }
      });
      return number;
    },
    selectedFolders: function selectedFolders() {
      return this.folders.filter(function (folder) {
        return folder.checked;
      });
    },
    isSyncFilesProcessReadyToStart: function isSyncFilesProcessReadyToStart() {
      var isReady = this.selectedFolders.length > 0;
      this.selectedFolders.forEach(function (folder) {
        if (!folder.files) {
          isReady = false;
        }
      });
      return isReady;
    }
  },
  methods: {
    checkAll: function checkAll() {
      this.folders.forEach(function (folder) {
        folder.checked = true;
      });
    },
    uncheckAll: function uncheckAll() {
      this.folders.forEach(function (folder) {
        folder.checked = false;
      });
    },
    stopQueue: function stopQueue() {
      this.queue.remove(function () {
        return true;
      });
    },
    updateQueueStatus: function updateQueueStatus() {
      this.numberOfRunningTasks = this.queue.running();
      this.numberOfTasks = this.queue.length() + this.numberOfRunningTasks;
    },
    syncFolders: function syncFolders() {
      var _this2 = this;

      this.running = true;
      this.selectedFolders.forEach(function (folder) {
        _this2.queue.push(function (done) {
          _this2.syncFolder(folder, function () {
            done();

            _this2.updateQueueStatus();
          });
        });
      });
      this.numberOfLastQueuePush = this.selectedFolders.length;
    },
    syncFolder: function syncFolder(folder, done) {
      var _this3 = this;

      var data = 'folder=' + folder.foldername + "&foldertype=" + folder.foldertype + '&refreshetags=' + this.refreshetags + '&' + this.csrfToken + '=1';
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              var responseJSON = JSON.parse(xhr.responseText);
              var files = [];
              responseJSON.files.forEach(function (file) {
                files.push({
                  foldername: folder.foldername,
                  filename: file,
                  status: 'new'
                });
              });

              _this3.$set(folder, 'files', files);

              _this3.$set(folder, 'status', responseJSON.status);
            } catch (e) {
              console.log(e);

              _this3.errorMessages.push(xhr.responseText);
            }
          }

          done();
        }
      };

      xhr.open("POST", this.folderSyncUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    },
    syncFiles: function syncFiles() {
      var _this4 = this;

      this.running = true;
      var files = [];
      this.folders.forEach(function (folder) {
        if (folder.checked) {
          folder.files.forEach(function (file) {
            files.push(file);
          });
        }
      });
      var batches = Object(_common_js_BatchCreator__WEBPACK_IMPORTED_MODULE_1__["createBatches"])(files, this.fileBatchSize);
      batches.forEach(function (fileBatch) {
        _this4.queue.push(function (done) {
          _this4.syncFileBatch(fileBatch, function () {
            done();

            _this4.updateQueueStatus();
          });
        });
      });
      this.numberOfLastQueuePush = files.length > 0 ? batches.length : 0;
    },
    syncFileBatch: function syncFileBatch(fileBatch, done) {
      var _this5 = this;

      var data = this.csrfToken + '=1';
      fileBatch.forEach(function (file) {
        data += '&folder[]=' + encodeURIComponent(file.foldername) + '&file[]=' + encodeURIComponent(file.filename);
      });
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            try {
              var resultFiles = JSON.parse(xhr.responseText);
              fileBatch.forEach(function (file) {
                resultFiles.forEach(function (resultFile) {
                  if (file.foldername === resultFile.foldername && file.filename === resultFile.filename) {
                    file.status = 'sync';
                  }
                });
              });
            } catch (e) {
              console.log(e);

              _this5.errorMessages.push(xhr.responseText);
            }
          }

          done();
        }
      };

      xhr.open("POST", this.fileSyncUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    },
    loadFolders: function loadFolders() {
      var _this6 = this;

      var xhr = new XMLHttpRequest();
      var data = this.csrfToken + '=1';

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          try {
            var folders = JSON.parse(xhr.responseText);
            folders.forEach(function (folder) {
              if (folder.error != null) {
                _this6.failedFolders.push(folder);
              } else {
                folder.checked = folder.isNew;

                _this6.folders.push(folder);
              }
            });
          } catch (e) {
            console.log(e);

            _this6.errorMessages.push(xhr.responseText);
          }
        }
      };

      xhr.open("POST", this.loadFoldersUrl);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/babel-loader/lib??ref--2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_js_Helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../common/js/Helpers */ "./common/js/Helpers.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    i18n: null,
    uploadUrl: null,
    maxFileSize: null
  },
  computed: {
    progress: function progress() {
      var total = this.pendingFiles.length + this.inProgressFiles.length + this.finishedFilesContent.length + this.failedFilesContent.length;
      var progress = (total - this.pendingFiles.length) / total * 100;
      return progress;
    },
    revertedPendingFiles: function revertedPendingFiles() {
      return this.pendingFiles.slice().reverse();
    },
    revertedFinishedFilesContent: function revertedFinishedFilesContent() {
      return this.finishedFilesContent.slice().reverse();
    }
  },
  data: function data() {
    return {
      pendingFiles: [],
      inProgressFiles: [],
      finishedFilesContent: [],
      failedFilesContent: []
    };
  },
  methods: {
    addFiles: function addFiles(event) {
      var newFiles = event.target.files || event.dataTransfer.files;

      for (var i = 0; i < newFiles.length; i++) {
        var f = newFiles[i];
        this.pendingFiles.push(f);
      }

      this.upload();
    },
    upload: function upload() {
      var _this = this;

      if (this.pendingFiles.length === 0) {
        return;
      }

      var file = this.pendingFiles.pop();
      var data = new FormData();
      var xhr = new XMLHttpRequest();

      if (xhr.upload && file.size <= this.maxFileSize) {
        this.inProgressFiles.push(file); // file received/failed

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              _this.finishedFilesContent.push({
                id: _this.finishedFilesContent.length,
                'content': xhr.responseText
              });
            } else {
              _this.failedFilesContent.push({
                id: _this.failedFilesContent.length,
                'content': xhr.responseText
              });
            }

            Object(_common_js_Helpers__WEBPACK_IMPORTED_MODULE_0__["removeElement"])(_this.inProgressFiles, file);

            _this.upload();
          }
        };

        data.append('file', file, file.name);
        xhr.open("POST", this.uploadUrl, true);
        xhr.send(data);
      } else {
        console.log("invalid file, will not try to upload it");
        this.upload();
      }
    }
  }
});

/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/array/from.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/array/from.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
__webpack_require__(/*! ../../modules/es6.array.from */ "../../../../build/node_modules/core-js/library/modules/es6.array.from.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Array.from;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/array/is-array.js":
/*!*************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/array/is-array.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.array.is-array */ "../../../../build/node_modules/core-js/library/modules/es6.array.is-array.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Array.isArray;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/get-iterator.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/get-iterator.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/web.dom.iterable */ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js");
__webpack_require__(/*! ../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
module.exports = __webpack_require__(/*! ../modules/core.get-iterator */ "../../../../build/node_modules/core-js/library/modules/core.get-iterator.js");


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/is-iterable.js":
/*!**********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/is-iterable.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/web.dom.iterable */ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js");
__webpack_require__(/*! ../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
module.exports = __webpack_require__(/*! ../modules/core.is-iterable */ "../../../../build/node_modules/core-js/library/modules/core.is-iterable.js");


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/json/stringify.js":
/*!*************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/json/stringify.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var $JSON = core.JSON || (core.JSON = { stringify: JSON.stringify });
module.exports = function stringify(it) { // eslint-disable-line no-unused-vars
  return $JSON.stringify.apply($JSON, arguments);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/map.js":
/*!**************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/map.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/es6.object.to-string */ "../../../../build/node_modules/core-js/library/modules/es6.object.to-string.js");
__webpack_require__(/*! ../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
__webpack_require__(/*! ../modules/web.dom.iterable */ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js");
__webpack_require__(/*! ../modules/es6.map */ "../../../../build/node_modules/core-js/library/modules/es6.map.js");
__webpack_require__(/*! ../modules/es7.map.to-json */ "../../../../build/node_modules/core-js/library/modules/es7.map.to-json.js");
__webpack_require__(/*! ../modules/es7.map.of */ "../../../../build/node_modules/core-js/library/modules/es7.map.of.js");
__webpack_require__(/*! ../modules/es7.map.from */ "../../../../build/node_modules/core-js/library/modules/es7.map.from.js");
module.exports = __webpack_require__(/*! ../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Map;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/object/create.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/object/create.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.object.create */ "../../../../build/node_modules/core-js/library/modules/es6.object.create.js");
var $Object = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Object;
module.exports = function create(P, D) {
  return $Object.create(P, D);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/object/define-property.js":
/*!*********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/object/define-property.js ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.object.define-property */ "../../../../build/node_modules/core-js/library/modules/es6.object.define-property.js");
var $Object = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Object;
module.exports = function defineProperty(it, key, desc) {
  return $Object.defineProperty(it, key, desc);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/object/entries.js":
/*!*************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/object/entries.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es7.object.entries */ "../../../../build/node_modules/core-js/library/modules/es7.object.entries.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Object.entries;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/object/get-prototype-of.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/object/get-prototype-of.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.object.get-prototype-of */ "../../../../build/node_modules/core-js/library/modules/es6.object.get-prototype-of.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Object.getPrototypeOf;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/object/set-prototype-of.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/object/set-prototype-of.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.object.set-prototype-of */ "../../../../build/node_modules/core-js/library/modules/es6.object.set-prototype-of.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Object.setPrototypeOf;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/parse-float.js":
/*!**********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/parse-float.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/es6.parse-float */ "../../../../build/node_modules/core-js/library/modules/es6.parse-float.js");
module.exports = __webpack_require__(/*! ../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").parseFloat;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/parse-int.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/parse-int.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/es6.parse-int */ "../../../../build/node_modules/core-js/library/modules/es6.parse-int.js");
module.exports = __webpack_require__(/*! ../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").parseInt;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/reflect/construct.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/reflect/construct.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.reflect.construct */ "../../../../build/node_modules/core-js/library/modules/es6.reflect.construct.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Reflect.construct;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/set.js":
/*!**************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/set.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../modules/es6.object.to-string */ "../../../../build/node_modules/core-js/library/modules/es6.object.to-string.js");
__webpack_require__(/*! ../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
__webpack_require__(/*! ../modules/web.dom.iterable */ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js");
__webpack_require__(/*! ../modules/es6.set */ "../../../../build/node_modules/core-js/library/modules/es6.set.js");
__webpack_require__(/*! ../modules/es7.set.to-json */ "../../../../build/node_modules/core-js/library/modules/es7.set.to-json.js");
__webpack_require__(/*! ../modules/es7.set.of */ "../../../../build/node_modules/core-js/library/modules/es7.set.of.js");
__webpack_require__(/*! ../modules/es7.set.from */ "../../../../build/node_modules/core-js/library/modules/es7.set.from.js");
module.exports = __webpack_require__(/*! ../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Set;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/symbol/index.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/symbol/index.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.symbol */ "../../../../build/node_modules/core-js/library/modules/es6.symbol.js");
__webpack_require__(/*! ../../modules/es6.object.to-string */ "../../../../build/node_modules/core-js/library/modules/es6.object.to-string.js");
__webpack_require__(/*! ../../modules/es7.symbol.async-iterator */ "../../../../build/node_modules/core-js/library/modules/es7.symbol.async-iterator.js");
__webpack_require__(/*! ../../modules/es7.symbol.observable */ "../../../../build/node_modules/core-js/library/modules/es7.symbol.observable.js");
module.exports = __webpack_require__(/*! ../../modules/_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").Symbol;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/fn/symbol/iterator.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/fn/symbol/iterator.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../modules/es6.string.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js");
__webpack_require__(/*! ../../modules/web.dom.iterable */ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js");
module.exports = __webpack_require__(/*! ../../modules/_wks-ext */ "../../../../build/node_modules/core-js/library/modules/_wks-ext.js").f('iterator');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_a-function.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_a-function.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (it) {
  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
  return it;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_add-to-unscopables.js":
/*!***********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_add-to-unscopables.js ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function () { /* empty */ };


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_an-instance.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_an-instance.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (it, Constructor, name, forbiddenField) {
  if (!(it instanceof Constructor) || (forbiddenField !== undefined && forbiddenField in it)) {
    throw TypeError(name + ': incorrect invocation!');
  } return it;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_an-object.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_an-object.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
module.exports = function (it) {
  if (!isObject(it)) throw TypeError(it + ' is not an object!');
  return it;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_array-from-iterable.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_array-from-iterable.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var forOf = __webpack_require__(/*! ./_for-of */ "../../../../build/node_modules/core-js/library/modules/_for-of.js");

module.exports = function (iter, ITERATOR) {
  var result = [];
  forOf(iter, false, result.push, result, ITERATOR);
  return result;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_array-includes.js":
/*!*******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_array-includes.js ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var toLength = __webpack_require__(/*! ./_to-length */ "../../../../build/node_modules/core-js/library/modules/_to-length.js");
var toAbsoluteIndex = __webpack_require__(/*! ./_to-absolute-index */ "../../../../build/node_modules/core-js/library/modules/_to-absolute-index.js");
module.exports = function (IS_INCLUDES) {
  return function ($this, el, fromIndex) {
    var O = toIObject($this);
    var length = toLength(O.length);
    var index = toAbsoluteIndex(fromIndex, length);
    var value;
    // Array#includes uses SameValueZero equality algorithm
    // eslint-disable-next-line no-self-compare
    if (IS_INCLUDES && el != el) while (length > index) {
      value = O[index++];
      // eslint-disable-next-line no-self-compare
      if (value != value) return true;
    // Array#indexOf ignores holes, Array#includes - not
    } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
      if (O[index] === el) return IS_INCLUDES || index || 0;
    } return !IS_INCLUDES && -1;
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_array-methods.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_array-methods.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 0 -> Array#forEach
// 1 -> Array#map
// 2 -> Array#filter
// 3 -> Array#some
// 4 -> Array#every
// 5 -> Array#find
// 6 -> Array#findIndex
var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var IObject = __webpack_require__(/*! ./_iobject */ "../../../../build/node_modules/core-js/library/modules/_iobject.js");
var toObject = __webpack_require__(/*! ./_to-object */ "../../../../build/node_modules/core-js/library/modules/_to-object.js");
var toLength = __webpack_require__(/*! ./_to-length */ "../../../../build/node_modules/core-js/library/modules/_to-length.js");
var asc = __webpack_require__(/*! ./_array-species-create */ "../../../../build/node_modules/core-js/library/modules/_array-species-create.js");
module.exports = function (TYPE, $create) {
  var IS_MAP = TYPE == 1;
  var IS_FILTER = TYPE == 2;
  var IS_SOME = TYPE == 3;
  var IS_EVERY = TYPE == 4;
  var IS_FIND_INDEX = TYPE == 6;
  var NO_HOLES = TYPE == 5 || IS_FIND_INDEX;
  var create = $create || asc;
  return function ($this, callbackfn, that) {
    var O = toObject($this);
    var self = IObject(O);
    var f = ctx(callbackfn, that, 3);
    var length = toLength(self.length);
    var index = 0;
    var result = IS_MAP ? create($this, length) : IS_FILTER ? create($this, 0) : undefined;
    var val, res;
    for (;length > index; index++) if (NO_HOLES || index in self) {
      val = self[index];
      res = f(val, index, O);
      if (TYPE) {
        if (IS_MAP) result[index] = res;   // map
        else if (res) switch (TYPE) {
          case 3: return true;             // some
          case 5: return val;              // find
          case 6: return index;            // findIndex
          case 2: result.push(val);        // filter
        } else if (IS_EVERY) return false; // every
      }
    }
    return IS_FIND_INDEX ? -1 : IS_SOME || IS_EVERY ? IS_EVERY : result;
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_array-species-constructor.js":
/*!******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_array-species-constructor.js ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var isArray = __webpack_require__(/*! ./_is-array */ "../../../../build/node_modules/core-js/library/modules/_is-array.js");
var SPECIES = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('species');

module.exports = function (original) {
  var C;
  if (isArray(original)) {
    C = original.constructor;
    // cross-realm fallback
    if (typeof C == 'function' && (C === Array || isArray(C.prototype))) C = undefined;
    if (isObject(C)) {
      C = C[SPECIES];
      if (C === null) C = undefined;
    }
  } return C === undefined ? Array : C;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_array-species-create.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_array-species-create.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 9.4.2.3 ArraySpeciesCreate(originalArray, length)
var speciesConstructor = __webpack_require__(/*! ./_array-species-constructor */ "../../../../build/node_modules/core-js/library/modules/_array-species-constructor.js");

module.exports = function (original, length) {
  return new (speciesConstructor(original))(length);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_bind.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_bind.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var aFunction = __webpack_require__(/*! ./_a-function */ "../../../../build/node_modules/core-js/library/modules/_a-function.js");
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var invoke = __webpack_require__(/*! ./_invoke */ "../../../../build/node_modules/core-js/library/modules/_invoke.js");
var arraySlice = [].slice;
var factories = {};

var construct = function (F, len, args) {
  if (!(len in factories)) {
    for (var n = [], i = 0; i < len; i++) n[i] = 'a[' + i + ']';
    // eslint-disable-next-line no-new-func
    factories[len] = Function('F,a', 'return new F(' + n.join(',') + ')');
  } return factories[len](F, args);
};

module.exports = Function.bind || function bind(that /* , ...args */) {
  var fn = aFunction(this);
  var partArgs = arraySlice.call(arguments, 1);
  var bound = function (/* args... */) {
    var args = partArgs.concat(arraySlice.call(arguments));
    return this instanceof bound ? construct(fn, args.length, args) : invoke(fn, args, that);
  };
  if (isObject(fn.prototype)) bound.prototype = fn.prototype;
  return bound;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_classof.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_classof.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// getting tag from 19.1.3.6 Object.prototype.toString()
var cof = __webpack_require__(/*! ./_cof */ "../../../../build/node_modules/core-js/library/modules/_cof.js");
var TAG = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('toStringTag');
// ES3 wrong here
var ARG = cof(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
var tryGet = function (it, key) {
  try {
    return it[key];
  } catch (e) { /* empty */ }
};

module.exports = function (it) {
  var O, T, B;
  return it === undefined ? 'Undefined' : it === null ? 'Null'
    // @@toStringTag case
    : typeof (T = tryGet(O = Object(it), TAG)) == 'string' ? T
    // builtinTag case
    : ARG ? cof(O)
    // ES3 arguments fallback
    : (B = cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_cof.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_cof.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var toString = {}.toString;

module.exports = function (it) {
  return toString.call(it).slice(8, -1);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_collection-strong.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_collection-strong.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var dP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f;
var create = __webpack_require__(/*! ./_object-create */ "../../../../build/node_modules/core-js/library/modules/_object-create.js");
var redefineAll = __webpack_require__(/*! ./_redefine-all */ "../../../../build/node_modules/core-js/library/modules/_redefine-all.js");
var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var anInstance = __webpack_require__(/*! ./_an-instance */ "../../../../build/node_modules/core-js/library/modules/_an-instance.js");
var forOf = __webpack_require__(/*! ./_for-of */ "../../../../build/node_modules/core-js/library/modules/_for-of.js");
var $iterDefine = __webpack_require__(/*! ./_iter-define */ "../../../../build/node_modules/core-js/library/modules/_iter-define.js");
var step = __webpack_require__(/*! ./_iter-step */ "../../../../build/node_modules/core-js/library/modules/_iter-step.js");
var setSpecies = __webpack_require__(/*! ./_set-species */ "../../../../build/node_modules/core-js/library/modules/_set-species.js");
var DESCRIPTORS = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js");
var fastKey = __webpack_require__(/*! ./_meta */ "../../../../build/node_modules/core-js/library/modules/_meta.js").fastKey;
var validate = __webpack_require__(/*! ./_validate-collection */ "../../../../build/node_modules/core-js/library/modules/_validate-collection.js");
var SIZE = DESCRIPTORS ? '_s' : 'size';

var getEntry = function (that, key) {
  // fast case
  var index = fastKey(key);
  var entry;
  if (index !== 'F') return that._i[index];
  // frozen object case
  for (entry = that._f; entry; entry = entry.n) {
    if (entry.k == key) return entry;
  }
};

module.exports = {
  getConstructor: function (wrapper, NAME, IS_MAP, ADDER) {
    var C = wrapper(function (that, iterable) {
      anInstance(that, C, NAME, '_i');
      that._t = NAME;         // collection type
      that._i = create(null); // index
      that._f = undefined;    // first entry
      that._l = undefined;    // last entry
      that[SIZE] = 0;         // size
      if (iterable != undefined) forOf(iterable, IS_MAP, that[ADDER], that);
    });
    redefineAll(C.prototype, {
      // 23.1.3.1 Map.prototype.clear()
      // 23.2.3.2 Set.prototype.clear()
      clear: function clear() {
        for (var that = validate(this, NAME), data = that._i, entry = that._f; entry; entry = entry.n) {
          entry.r = true;
          if (entry.p) entry.p = entry.p.n = undefined;
          delete data[entry.i];
        }
        that._f = that._l = undefined;
        that[SIZE] = 0;
      },
      // 23.1.3.3 Map.prototype.delete(key)
      // 23.2.3.4 Set.prototype.delete(value)
      'delete': function (key) {
        var that = validate(this, NAME);
        var entry = getEntry(that, key);
        if (entry) {
          var next = entry.n;
          var prev = entry.p;
          delete that._i[entry.i];
          entry.r = true;
          if (prev) prev.n = next;
          if (next) next.p = prev;
          if (that._f == entry) that._f = next;
          if (that._l == entry) that._l = prev;
          that[SIZE]--;
        } return !!entry;
      },
      // 23.2.3.6 Set.prototype.forEach(callbackfn, thisArg = undefined)
      // 23.1.3.5 Map.prototype.forEach(callbackfn, thisArg = undefined)
      forEach: function forEach(callbackfn /* , that = undefined */) {
        validate(this, NAME);
        var f = ctx(callbackfn, arguments.length > 1 ? arguments[1] : undefined, 3);
        var entry;
        while (entry = entry ? entry.n : this._f) {
          f(entry.v, entry.k, this);
          // revert to the last existing entry
          while (entry && entry.r) entry = entry.p;
        }
      },
      // 23.1.3.7 Map.prototype.has(key)
      // 23.2.3.7 Set.prototype.has(value)
      has: function has(key) {
        return !!getEntry(validate(this, NAME), key);
      }
    });
    if (DESCRIPTORS) dP(C.prototype, 'size', {
      get: function () {
        return validate(this, NAME)[SIZE];
      }
    });
    return C;
  },
  def: function (that, key, value) {
    var entry = getEntry(that, key);
    var prev, index;
    // change existing entry
    if (entry) {
      entry.v = value;
    // create new entry
    } else {
      that._l = entry = {
        i: index = fastKey(key, true), // <- index
        k: key,                        // <- key
        v: value,                      // <- value
        p: prev = that._l,             // <- previous entry
        n: undefined,                  // <- next entry
        r: false                       // <- removed
      };
      if (!that._f) that._f = entry;
      if (prev) prev.n = entry;
      that[SIZE]++;
      // add to index
      if (index !== 'F') that._i[index] = entry;
    } return that;
  },
  getEntry: getEntry,
  setStrong: function (C, NAME, IS_MAP) {
    // add .keys, .values, .entries, [@@iterator]
    // 23.1.3.4, 23.1.3.8, 23.1.3.11, 23.1.3.12, 23.2.3.5, 23.2.3.8, 23.2.3.10, 23.2.3.11
    $iterDefine(C, NAME, function (iterated, kind) {
      this._t = validate(iterated, NAME); // target
      this._k = kind;                     // kind
      this._l = undefined;                // previous
    }, function () {
      var that = this;
      var kind = that._k;
      var entry = that._l;
      // revert to the last existing entry
      while (entry && entry.r) entry = entry.p;
      // get next entry
      if (!that._t || !(that._l = entry = entry ? entry.n : that._t._f)) {
        // or finish the iteration
        that._t = undefined;
        return step(1);
      }
      // return step by kind
      if (kind == 'keys') return step(0, entry.k);
      if (kind == 'values') return step(0, entry.v);
      return step(0, [entry.k, entry.v]);
    }, IS_MAP ? 'entries' : 'values', !IS_MAP, true);

    // add [@@species], 23.1.2.2, 23.2.2.2
    setSpecies(NAME);
  }
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_collection-to-json.js":
/*!***********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_collection-to-json.js ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://github.com/DavidBruant/Map-Set.prototype.toJSON
var classof = __webpack_require__(/*! ./_classof */ "../../../../build/node_modules/core-js/library/modules/_classof.js");
var from = __webpack_require__(/*! ./_array-from-iterable */ "../../../../build/node_modules/core-js/library/modules/_array-from-iterable.js");
module.exports = function (NAME) {
  return function toJSON() {
    if (classof(this) != NAME) throw TypeError(NAME + "#toJSON isn't generic");
    return from(this);
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_collection.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_collection.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var meta = __webpack_require__(/*! ./_meta */ "../../../../build/node_modules/core-js/library/modules/_meta.js");
var fails = __webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js");
var hide = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");
var redefineAll = __webpack_require__(/*! ./_redefine-all */ "../../../../build/node_modules/core-js/library/modules/_redefine-all.js");
var forOf = __webpack_require__(/*! ./_for-of */ "../../../../build/node_modules/core-js/library/modules/_for-of.js");
var anInstance = __webpack_require__(/*! ./_an-instance */ "../../../../build/node_modules/core-js/library/modules/_an-instance.js");
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var setToStringTag = __webpack_require__(/*! ./_set-to-string-tag */ "../../../../build/node_modules/core-js/library/modules/_set-to-string-tag.js");
var dP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f;
var each = __webpack_require__(/*! ./_array-methods */ "../../../../build/node_modules/core-js/library/modules/_array-methods.js")(0);
var DESCRIPTORS = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js");

module.exports = function (NAME, wrapper, methods, common, IS_MAP, IS_WEAK) {
  var Base = global[NAME];
  var C = Base;
  var ADDER = IS_MAP ? 'set' : 'add';
  var proto = C && C.prototype;
  var O = {};
  if (!DESCRIPTORS || typeof C != 'function' || !(IS_WEAK || proto.forEach && !fails(function () {
    new C().entries().next();
  }))) {
    // create collection constructor
    C = common.getConstructor(wrapper, NAME, IS_MAP, ADDER);
    redefineAll(C.prototype, methods);
    meta.NEED = true;
  } else {
    C = wrapper(function (target, iterable) {
      anInstance(target, C, NAME, '_c');
      target._c = new Base();
      if (iterable != undefined) forOf(iterable, IS_MAP, target[ADDER], target);
    });
    each('add,clear,delete,forEach,get,has,set,keys,values,entries,toJSON'.split(','), function (KEY) {
      var IS_ADDER = KEY == 'add' || KEY == 'set';
      if (KEY in proto && !(IS_WEAK && KEY == 'clear')) hide(C.prototype, KEY, function (a, b) {
        anInstance(this, C, KEY);
        if (!IS_ADDER && IS_WEAK && !isObject(a)) return KEY == 'get' ? undefined : false;
        var result = this._c[KEY](a === 0 ? 0 : a, b);
        return IS_ADDER ? this : result;
      });
    });
    IS_WEAK || dP(C.prototype, 'size', {
      get: function () {
        return this._c.size;
      }
    });
  }

  setToStringTag(C, NAME);

  O[NAME] = C;
  $export($export.G + $export.W + $export.F, O);

  if (!IS_WEAK) common.setStrong(C, NAME, IS_MAP);

  return C;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_core.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_core.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var core = module.exports = { version: '2.6.11' };
if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_create-property.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_create-property.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $defineProperty = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js");
var createDesc = __webpack_require__(/*! ./_property-desc */ "../../../../build/node_modules/core-js/library/modules/_property-desc.js");

module.exports = function (object, index, value) {
  if (index in object) $defineProperty.f(object, index, createDesc(0, value));
  else object[index] = value;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_ctx.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_ctx.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
var aFunction = __webpack_require__(/*! ./_a-function */ "../../../../build/node_modules/core-js/library/modules/_a-function.js");
module.exports = function (fn, that, length) {
  aFunction(fn);
  if (that === undefined) return fn;
  switch (length) {
    case 1: return function (a) {
      return fn.call(that, a);
    };
    case 2: return function (a, b) {
      return fn.call(that, a, b);
    };
    case 3: return function (a, b, c) {
      return fn.call(that, a, b, c);
    };
  }
  return function (/* ...args */) {
    return fn.apply(that, arguments);
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_defined.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_defined.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
module.exports = function (it) {
  if (it == undefined) throw TypeError("Can't call method on  " + it);
  return it;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_descriptors.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_descriptors.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
module.exports = !__webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js")(function () {
  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_dom-create.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_dom-create.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var document = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").document;
// typeof document.createElement is 'object' in old IE
var is = isObject(document) && isObject(document.createElement);
module.exports = function (it) {
  return is ? document.createElement(it) : {};
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_enum-bug-keys.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_enum-bug-keys.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// IE 8- don't enum bug keys
module.exports = (
  'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
).split(',');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_enum-keys.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_enum-keys.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// all enumerable object keys, includes symbols
var getKeys = __webpack_require__(/*! ./_object-keys */ "../../../../build/node_modules/core-js/library/modules/_object-keys.js");
var gOPS = __webpack_require__(/*! ./_object-gops */ "../../../../build/node_modules/core-js/library/modules/_object-gops.js");
var pIE = __webpack_require__(/*! ./_object-pie */ "../../../../build/node_modules/core-js/library/modules/_object-pie.js");
module.exports = function (it) {
  var result = getKeys(it);
  var getSymbols = gOPS.f;
  if (getSymbols) {
    var symbols = getSymbols(it);
    var isEnum = pIE.f;
    var i = 0;
    var key;
    while (symbols.length > i) if (isEnum.call(it, key = symbols[i++])) result.push(key);
  } return result;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_export.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_export.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var core = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var hide = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var PROTOTYPE = 'prototype';

var $export = function (type, name, source) {
  var IS_FORCED = type & $export.F;
  var IS_GLOBAL = type & $export.G;
  var IS_STATIC = type & $export.S;
  var IS_PROTO = type & $export.P;
  var IS_BIND = type & $export.B;
  var IS_WRAP = type & $export.W;
  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
  var expProto = exports[PROTOTYPE];
  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] : (global[name] || {})[PROTOTYPE];
  var key, own, out;
  if (IS_GLOBAL) source = name;
  for (key in source) {
    // contains in native
    own = !IS_FORCED && target && target[key] !== undefined;
    if (own && has(exports, key)) continue;
    // export native or passed
    out = own ? target[key] : source[key];
    // prevent global pollution for namespaces
    exports[key] = IS_GLOBAL && typeof target[key] != 'function' ? source[key]
    // bind timers to global for call from export context
    : IS_BIND && own ? ctx(out, global)
    // wrap global constructors for prevent change them in library
    : IS_WRAP && target[key] == out ? (function (C) {
      var F = function (a, b, c) {
        if (this instanceof C) {
          switch (arguments.length) {
            case 0: return new C();
            case 1: return new C(a);
            case 2: return new C(a, b);
          } return new C(a, b, c);
        } return C.apply(this, arguments);
      };
      F[PROTOTYPE] = C[PROTOTYPE];
      return F;
    // make static versions for prototype methods
    })(out) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
    // export proto methods to core.%CONSTRUCTOR%.methods.%NAME%
    if (IS_PROTO) {
      (exports.virtual || (exports.virtual = {}))[key] = out;
      // export proto methods to core.%CONSTRUCTOR%.prototype.%NAME%
      if (type & $export.R && expProto && !expProto[key]) hide(expProto, key, out);
    }
  }
};
// type bitmap
$export.F = 1;   // forced
$export.G = 2;   // global
$export.S = 4;   // static
$export.P = 8;   // proto
$export.B = 16;  // bind
$export.W = 32;  // wrap
$export.U = 64;  // safe
$export.R = 128; // real proto method for `library`
module.exports = $export;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_fails.js":
/*!**********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_fails.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (exec) {
  try {
    return !!exec();
  } catch (e) {
    return true;
  }
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_for-of.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_for-of.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var call = __webpack_require__(/*! ./_iter-call */ "../../../../build/node_modules/core-js/library/modules/_iter-call.js");
var isArrayIter = __webpack_require__(/*! ./_is-array-iter */ "../../../../build/node_modules/core-js/library/modules/_is-array-iter.js");
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var toLength = __webpack_require__(/*! ./_to-length */ "../../../../build/node_modules/core-js/library/modules/_to-length.js");
var getIterFn = __webpack_require__(/*! ./core.get-iterator-method */ "../../../../build/node_modules/core-js/library/modules/core.get-iterator-method.js");
var BREAK = {};
var RETURN = {};
var exports = module.exports = function (iterable, entries, fn, that, ITERATOR) {
  var iterFn = ITERATOR ? function () { return iterable; } : getIterFn(iterable);
  var f = ctx(fn, that, entries ? 2 : 1);
  var index = 0;
  var length, step, iterator, result;
  if (typeof iterFn != 'function') throw TypeError(iterable + ' is not iterable!');
  // fast case for arrays with default iterator
  if (isArrayIter(iterFn)) for (length = toLength(iterable.length); length > index; index++) {
    result = entries ? f(anObject(step = iterable[index])[0], step[1]) : f(iterable[index]);
    if (result === BREAK || result === RETURN) return result;
  } else for (iterator = iterFn.call(iterable); !(step = iterator.next()).done;) {
    result = call(iterator, f, step.value, entries);
    if (result === BREAK || result === RETURN) return result;
  }
};
exports.BREAK = BREAK;
exports.RETURN = RETURN;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_global.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_global.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
var global = module.exports = typeof window != 'undefined' && window.Math == Math
  ? window : typeof self != 'undefined' && self.Math == Math ? self
  // eslint-disable-next-line no-new-func
  : Function('return this')();
if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_has.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_has.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var hasOwnProperty = {}.hasOwnProperty;
module.exports = function (it, key) {
  return hasOwnProperty.call(it, key);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_hide.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_hide.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js");
var createDesc = __webpack_require__(/*! ./_property-desc */ "../../../../build/node_modules/core-js/library/modules/_property-desc.js");
module.exports = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js") ? function (object, key, value) {
  return dP.f(object, key, createDesc(1, value));
} : function (object, key, value) {
  object[key] = value;
  return object;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_html.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_html.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var document = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").document;
module.exports = document && document.documentElement;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_ie8-dom-define.js":
/*!*******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_ie8-dom-define.js ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = !__webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js") && !__webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js")(function () {
  return Object.defineProperty(__webpack_require__(/*! ./_dom-create */ "../../../../build/node_modules/core-js/library/modules/_dom-create.js")('div'), 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_invoke.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_invoke.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// fast apply, http://jsperf.lnkit.com/fast-apply/5
module.exports = function (fn, args, that) {
  var un = that === undefined;
  switch (args.length) {
    case 0: return un ? fn()
                      : fn.call(that);
    case 1: return un ? fn(args[0])
                      : fn.call(that, args[0]);
    case 2: return un ? fn(args[0], args[1])
                      : fn.call(that, args[0], args[1]);
    case 3: return un ? fn(args[0], args[1], args[2])
                      : fn.call(that, args[0], args[1], args[2]);
    case 4: return un ? fn(args[0], args[1], args[2], args[3])
                      : fn.call(that, args[0], args[1], args[2], args[3]);
  } return fn.apply(that, args);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iobject.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iobject.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
var cof = __webpack_require__(/*! ./_cof */ "../../../../build/node_modules/core-js/library/modules/_cof.js");
// eslint-disable-next-line no-prototype-builtins
module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
  return cof(it) == 'String' ? it.split('') : Object(it);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_is-array-iter.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_is-array-iter.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// check on default Array iterator
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
var ITERATOR = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator');
var ArrayProto = Array.prototype;

module.exports = function (it) {
  return it !== undefined && (Iterators.Array === it || ArrayProto[ITERATOR] === it);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_is-array.js":
/*!*************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_is-array.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 7.2.2 IsArray(argument)
var cof = __webpack_require__(/*! ./_cof */ "../../../../build/node_modules/core-js/library/modules/_cof.js");
module.exports = Array.isArray || function isArray(arg) {
  return cof(arg) == 'Array';
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_is-object.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_is-object.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (it) {
  return typeof it === 'object' ? it !== null : typeof it === 'function';
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iter-call.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iter-call.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// call something on iterator step with safe closing on error
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
module.exports = function (iterator, fn, value, entries) {
  try {
    return entries ? fn(anObject(value)[0], value[1]) : fn(value);
  // 7.4.6 IteratorClose(iterator, completion)
  } catch (e) {
    var ret = iterator['return'];
    if (ret !== undefined) anObject(ret.call(iterator));
    throw e;
  }
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iter-create.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iter-create.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var create = __webpack_require__(/*! ./_object-create */ "../../../../build/node_modules/core-js/library/modules/_object-create.js");
var descriptor = __webpack_require__(/*! ./_property-desc */ "../../../../build/node_modules/core-js/library/modules/_property-desc.js");
var setToStringTag = __webpack_require__(/*! ./_set-to-string-tag */ "../../../../build/node_modules/core-js/library/modules/_set-to-string-tag.js");
var IteratorPrototype = {};

// 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
__webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js")(IteratorPrototype, __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator'), function () { return this; });

module.exports = function (Constructor, NAME, next) {
  Constructor.prototype = create(IteratorPrototype, { next: descriptor(1, next) });
  setToStringTag(Constructor, NAME + ' Iterator');
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iter-define.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iter-define.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var LIBRARY = __webpack_require__(/*! ./_library */ "../../../../build/node_modules/core-js/library/modules/_library.js");
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var redefine = __webpack_require__(/*! ./_redefine */ "../../../../build/node_modules/core-js/library/modules/_redefine.js");
var hide = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
var $iterCreate = __webpack_require__(/*! ./_iter-create */ "../../../../build/node_modules/core-js/library/modules/_iter-create.js");
var setToStringTag = __webpack_require__(/*! ./_set-to-string-tag */ "../../../../build/node_modules/core-js/library/modules/_set-to-string-tag.js");
var getPrototypeOf = __webpack_require__(/*! ./_object-gpo */ "../../../../build/node_modules/core-js/library/modules/_object-gpo.js");
var ITERATOR = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator');
var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
var FF_ITERATOR = '@@iterator';
var KEYS = 'keys';
var VALUES = 'values';

var returnThis = function () { return this; };

module.exports = function (Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
  $iterCreate(Constructor, NAME, next);
  var getMethod = function (kind) {
    if (!BUGGY && kind in proto) return proto[kind];
    switch (kind) {
      case KEYS: return function keys() { return new Constructor(this, kind); };
      case VALUES: return function values() { return new Constructor(this, kind); };
    } return function entries() { return new Constructor(this, kind); };
  };
  var TAG = NAME + ' Iterator';
  var DEF_VALUES = DEFAULT == VALUES;
  var VALUES_BUG = false;
  var proto = Base.prototype;
  var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
  var $default = $native || getMethod(DEFAULT);
  var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
  var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
  var methods, key, IteratorPrototype;
  // Fix native
  if ($anyNative) {
    IteratorPrototype = getPrototypeOf($anyNative.call(new Base()));
    if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
      // Set @@toStringTag to native iterators
      setToStringTag(IteratorPrototype, TAG, true);
      // fix for some old engines
      if (!LIBRARY && typeof IteratorPrototype[ITERATOR] != 'function') hide(IteratorPrototype, ITERATOR, returnThis);
    }
  }
  // fix Array#{values, @@iterator}.name in V8 / FF
  if (DEF_VALUES && $native && $native.name !== VALUES) {
    VALUES_BUG = true;
    $default = function values() { return $native.call(this); };
  }
  // Define iterator
  if ((!LIBRARY || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
    hide(proto, ITERATOR, $default);
  }
  // Plug for library
  Iterators[NAME] = $default;
  Iterators[TAG] = returnThis;
  if (DEFAULT) {
    methods = {
      values: DEF_VALUES ? $default : getMethod(VALUES),
      keys: IS_SET ? $default : getMethod(KEYS),
      entries: $entries
    };
    if (FORCED) for (key in methods) {
      if (!(key in proto)) redefine(proto, key, methods[key]);
    } else $export($export.P + $export.F * (BUGGY || VALUES_BUG), NAME, methods);
  }
  return methods;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iter-detect.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iter-detect.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var ITERATOR = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator');
var SAFE_CLOSING = false;

try {
  var riter = [7][ITERATOR]();
  riter['return'] = function () { SAFE_CLOSING = true; };
  // eslint-disable-next-line no-throw-literal
  Array.from(riter, function () { throw 2; });
} catch (e) { /* empty */ }

module.exports = function (exec, skipClosing) {
  if (!skipClosing && !SAFE_CLOSING) return false;
  var safe = false;
  try {
    var arr = [7];
    var iter = arr[ITERATOR]();
    iter.next = function () { return { done: safe = true }; };
    arr[ITERATOR] = function () { return iter; };
    exec(arr);
  } catch (e) { /* empty */ }
  return safe;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iter-step.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iter-step.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (done, value) {
  return { value: value, done: !!done };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_iterators.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_iterators.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = {};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_library.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_library.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = true;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_meta.js":
/*!*********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_meta.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var META = __webpack_require__(/*! ./_uid */ "../../../../build/node_modules/core-js/library/modules/_uid.js")('meta');
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var setDesc = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f;
var id = 0;
var isExtensible = Object.isExtensible || function () {
  return true;
};
var FREEZE = !__webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js")(function () {
  return isExtensible(Object.preventExtensions({}));
});
var setMeta = function (it) {
  setDesc(it, META, { value: {
    i: 'O' + ++id, // object ID
    w: {}          // weak collections IDs
  } });
};
var fastKey = function (it, create) {
  // return primitive with prefix
  if (!isObject(it)) return typeof it == 'symbol' ? it : (typeof it == 'string' ? 'S' : 'P') + it;
  if (!has(it, META)) {
    // can't set metadata to uncaught frozen object
    if (!isExtensible(it)) return 'F';
    // not necessary to add metadata
    if (!create) return 'E';
    // add missing metadata
    setMeta(it);
  // return object ID
  } return it[META].i;
};
var getWeak = function (it, create) {
  if (!has(it, META)) {
    // can't set metadata to uncaught frozen object
    if (!isExtensible(it)) return true;
    // not necessary to add metadata
    if (!create) return false;
    // add missing metadata
    setMeta(it);
  // return hash weak collections IDs
  } return it[META].w;
};
// add metadata on freeze-family methods calling
var onFreeze = function (it) {
  if (FREEZE && meta.NEED && isExtensible(it) && !has(it, META)) setMeta(it);
  return it;
};
var meta = module.exports = {
  KEY: META,
  NEED: false,
  fastKey: fastKey,
  getWeak: getWeak,
  onFreeze: onFreeze
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-create.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-create.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var dPs = __webpack_require__(/*! ./_object-dps */ "../../../../build/node_modules/core-js/library/modules/_object-dps.js");
var enumBugKeys = __webpack_require__(/*! ./_enum-bug-keys */ "../../../../build/node_modules/core-js/library/modules/_enum-bug-keys.js");
var IE_PROTO = __webpack_require__(/*! ./_shared-key */ "../../../../build/node_modules/core-js/library/modules/_shared-key.js")('IE_PROTO');
var Empty = function () { /* empty */ };
var PROTOTYPE = 'prototype';

// Create object with fake `null` prototype: use iframe Object with cleared prototype
var createDict = function () {
  // Thrash, waste and sodomy: IE GC bug
  var iframe = __webpack_require__(/*! ./_dom-create */ "../../../../build/node_modules/core-js/library/modules/_dom-create.js")('iframe');
  var i = enumBugKeys.length;
  var lt = '<';
  var gt = '>';
  var iframeDocument;
  iframe.style.display = 'none';
  __webpack_require__(/*! ./_html */ "../../../../build/node_modules/core-js/library/modules/_html.js").appendChild(iframe);
  iframe.src = 'javascript:'; // eslint-disable-line no-script-url
  // createDict = iframe.contentWindow.Object;
  // html.removeChild(iframe);
  iframeDocument = iframe.contentWindow.document;
  iframeDocument.open();
  iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
  iframeDocument.close();
  createDict = iframeDocument.F;
  while (i--) delete createDict[PROTOTYPE][enumBugKeys[i]];
  return createDict();
};

module.exports = Object.create || function create(O, Properties) {
  var result;
  if (O !== null) {
    Empty[PROTOTYPE] = anObject(O);
    result = new Empty();
    Empty[PROTOTYPE] = null;
    // add "__proto__" for Object.getPrototypeOf polyfill
    result[IE_PROTO] = O;
  } else result = createDict();
  return Properties === undefined ? result : dPs(result, Properties);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-dp.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-dp.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var IE8_DOM_DEFINE = __webpack_require__(/*! ./_ie8-dom-define */ "../../../../build/node_modules/core-js/library/modules/_ie8-dom-define.js");
var toPrimitive = __webpack_require__(/*! ./_to-primitive */ "../../../../build/node_modules/core-js/library/modules/_to-primitive.js");
var dP = Object.defineProperty;

exports.f = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
  anObject(O);
  P = toPrimitive(P, true);
  anObject(Attributes);
  if (IE8_DOM_DEFINE) try {
    return dP(O, P, Attributes);
  } catch (e) { /* empty */ }
  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
  if ('value' in Attributes) O[P] = Attributes.value;
  return O;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-dps.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-dps.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js");
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var getKeys = __webpack_require__(/*! ./_object-keys */ "../../../../build/node_modules/core-js/library/modules/_object-keys.js");

module.exports = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js") ? Object.defineProperties : function defineProperties(O, Properties) {
  anObject(O);
  var keys = getKeys(Properties);
  var length = keys.length;
  var i = 0;
  var P;
  while (length > i) dP.f(O, P = keys[i++], Properties[P]);
  return O;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-gopd.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-gopd.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var pIE = __webpack_require__(/*! ./_object-pie */ "../../../../build/node_modules/core-js/library/modules/_object-pie.js");
var createDesc = __webpack_require__(/*! ./_property-desc */ "../../../../build/node_modules/core-js/library/modules/_property-desc.js");
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var toPrimitive = __webpack_require__(/*! ./_to-primitive */ "../../../../build/node_modules/core-js/library/modules/_to-primitive.js");
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var IE8_DOM_DEFINE = __webpack_require__(/*! ./_ie8-dom-define */ "../../../../build/node_modules/core-js/library/modules/_ie8-dom-define.js");
var gOPD = Object.getOwnPropertyDescriptor;

exports.f = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js") ? gOPD : function getOwnPropertyDescriptor(O, P) {
  O = toIObject(O);
  P = toPrimitive(P, true);
  if (IE8_DOM_DEFINE) try {
    return gOPD(O, P);
  } catch (e) { /* empty */ }
  if (has(O, P)) return createDesc(!pIE.f.call(O, P), O[P]);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-gopn-ext.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-gopn-ext.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// fallback for IE11 buggy Object.getOwnPropertyNames with iframe and window
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var gOPN = __webpack_require__(/*! ./_object-gopn */ "../../../../build/node_modules/core-js/library/modules/_object-gopn.js").f;
var toString = {}.toString;

var windowNames = typeof window == 'object' && window && Object.getOwnPropertyNames
  ? Object.getOwnPropertyNames(window) : [];

var getWindowNames = function (it) {
  try {
    return gOPN(it);
  } catch (e) {
    return windowNames.slice();
  }
};

module.exports.f = function getOwnPropertyNames(it) {
  return windowNames && toString.call(it) == '[object Window]' ? getWindowNames(it) : gOPN(toIObject(it));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-gopn.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-gopn.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.7 / 15.2.3.4 Object.getOwnPropertyNames(O)
var $keys = __webpack_require__(/*! ./_object-keys-internal */ "../../../../build/node_modules/core-js/library/modules/_object-keys-internal.js");
var hiddenKeys = __webpack_require__(/*! ./_enum-bug-keys */ "../../../../build/node_modules/core-js/library/modules/_enum-bug-keys.js").concat('length', 'prototype');

exports.f = Object.getOwnPropertyNames || function getOwnPropertyNames(O) {
  return $keys(O, hiddenKeys);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-gops.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-gops.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

exports.f = Object.getOwnPropertySymbols;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-gpo.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-gpo.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var toObject = __webpack_require__(/*! ./_to-object */ "../../../../build/node_modules/core-js/library/modules/_to-object.js");
var IE_PROTO = __webpack_require__(/*! ./_shared-key */ "../../../../build/node_modules/core-js/library/modules/_shared-key.js")('IE_PROTO');
var ObjectProto = Object.prototype;

module.exports = Object.getPrototypeOf || function (O) {
  O = toObject(O);
  if (has(O, IE_PROTO)) return O[IE_PROTO];
  if (typeof O.constructor == 'function' && O instanceof O.constructor) {
    return O.constructor.prototype;
  } return O instanceof Object ? ObjectProto : null;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-keys-internal.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-keys-internal.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var arrayIndexOf = __webpack_require__(/*! ./_array-includes */ "../../../../build/node_modules/core-js/library/modules/_array-includes.js")(false);
var IE_PROTO = __webpack_require__(/*! ./_shared-key */ "../../../../build/node_modules/core-js/library/modules/_shared-key.js")('IE_PROTO');

module.exports = function (object, names) {
  var O = toIObject(object);
  var i = 0;
  var result = [];
  var key;
  for (key in O) if (key != IE_PROTO) has(O, key) && result.push(key);
  // Don't enum bug & hidden keys
  while (names.length > i) if (has(O, key = names[i++])) {
    ~arrayIndexOf(result, key) || result.push(key);
  }
  return result;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-keys.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-keys.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 / 15.2.3.14 Object.keys(O)
var $keys = __webpack_require__(/*! ./_object-keys-internal */ "../../../../build/node_modules/core-js/library/modules/_object-keys-internal.js");
var enumBugKeys = __webpack_require__(/*! ./_enum-bug-keys */ "../../../../build/node_modules/core-js/library/modules/_enum-bug-keys.js");

module.exports = Object.keys || function keys(O) {
  return $keys(O, enumBugKeys);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-pie.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-pie.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

exports.f = {}.propertyIsEnumerable;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-sap.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-sap.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// most Object methods by ES6 should accept primitives
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var core = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var fails = __webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js");
module.exports = function (KEY, exec) {
  var fn = (core.Object || {})[KEY] || Object[KEY];
  var exp = {};
  exp[KEY] = exec(fn);
  $export($export.S + $export.F * fails(function () { fn(1); }), 'Object', exp);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_object-to-array.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_object-to-array.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var DESCRIPTORS = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js");
var getKeys = __webpack_require__(/*! ./_object-keys */ "../../../../build/node_modules/core-js/library/modules/_object-keys.js");
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var isEnum = __webpack_require__(/*! ./_object-pie */ "../../../../build/node_modules/core-js/library/modules/_object-pie.js").f;
module.exports = function (isEntries) {
  return function (it) {
    var O = toIObject(it);
    var keys = getKeys(O);
    var length = keys.length;
    var i = 0;
    var result = [];
    var key;
    while (length > i) {
      key = keys[i++];
      if (!DESCRIPTORS || isEnum.call(O, key)) {
        result.push(isEntries ? [key, O[key]] : O[key]);
      }
    }
    return result;
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_parse-float.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_parse-float.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $parseFloat = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").parseFloat;
var $trim = __webpack_require__(/*! ./_string-trim */ "../../../../build/node_modules/core-js/library/modules/_string-trim.js").trim;

module.exports = 1 / $parseFloat(__webpack_require__(/*! ./_string-ws */ "../../../../build/node_modules/core-js/library/modules/_string-ws.js") + '-0') !== -Infinity ? function parseFloat(str) {
  var string = $trim(String(str), 3);
  var result = $parseFloat(string);
  return result === 0 && string.charAt(0) == '-' ? -0 : result;
} : $parseFloat;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_parse-int.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_parse-int.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $parseInt = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").parseInt;
var $trim = __webpack_require__(/*! ./_string-trim */ "../../../../build/node_modules/core-js/library/modules/_string-trim.js").trim;
var ws = __webpack_require__(/*! ./_string-ws */ "../../../../build/node_modules/core-js/library/modules/_string-ws.js");
var hex = /^[-+]?0[xX]/;

module.exports = $parseInt(ws + '08') !== 8 || $parseInt(ws + '0x16') !== 22 ? function parseInt(str, radix) {
  var string = $trim(String(str), 3);
  return $parseInt(string, (radix >>> 0) || (hex.test(string) ? 16 : 10));
} : $parseInt;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_property-desc.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_property-desc.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (bitmap, value) {
  return {
    enumerable: !(bitmap & 1),
    configurable: !(bitmap & 2),
    writable: !(bitmap & 4),
    value: value
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_redefine-all.js":
/*!*****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_redefine-all.js ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var hide = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");
module.exports = function (target, src, safe) {
  for (var key in src) {
    if (safe && target[key]) target[key] = src[key];
    else hide(target, key, src[key]);
  } return target;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_redefine.js":
/*!*************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_redefine.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_set-collection-from.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_set-collection-from.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// https://tc39.github.io/proposal-setmap-offrom/
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var aFunction = __webpack_require__(/*! ./_a-function */ "../../../../build/node_modules/core-js/library/modules/_a-function.js");
var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var forOf = __webpack_require__(/*! ./_for-of */ "../../../../build/node_modules/core-js/library/modules/_for-of.js");

module.exports = function (COLLECTION) {
  $export($export.S, COLLECTION, { from: function from(source /* , mapFn, thisArg */) {
    var mapFn = arguments[1];
    var mapping, A, n, cb;
    aFunction(this);
    mapping = mapFn !== undefined;
    if (mapping) aFunction(mapFn);
    if (source == undefined) return new this();
    A = [];
    if (mapping) {
      n = 0;
      cb = ctx(mapFn, arguments[2], 2);
      forOf(source, false, function (nextItem) {
        A.push(cb(nextItem, n++));
      });
    } else {
      forOf(source, false, A.push, A);
    }
    return new this(A);
  } });
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_set-collection-of.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_set-collection-of.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// https://tc39.github.io/proposal-setmap-offrom/
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");

module.exports = function (COLLECTION) {
  $export($export.S, COLLECTION, { of: function of() {
    var length = arguments.length;
    var A = new Array(length);
    while (length--) A[length] = arguments[length];
    return new this(A);
  } });
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_set-proto.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_set-proto.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Works with __proto__ only. Old v8 can't work with null proto objects.
/* eslint-disable no-proto */
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var check = function (O, proto) {
  anObject(O);
  if (!isObject(proto) && proto !== null) throw TypeError(proto + ": can't set as prototype!");
};
module.exports = {
  set: Object.setPrototypeOf || ('__proto__' in {} ? // eslint-disable-line
    function (test, buggy, set) {
      try {
        set = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js")(Function.call, __webpack_require__(/*! ./_object-gopd */ "../../../../build/node_modules/core-js/library/modules/_object-gopd.js").f(Object.prototype, '__proto__').set, 2);
        set(test, []);
        buggy = !(test instanceof Array);
      } catch (e) { buggy = true; }
      return function setPrototypeOf(O, proto) {
        check(O, proto);
        if (buggy) O.__proto__ = proto;
        else set(O, proto);
        return O;
      };
    }({}, false) : undefined),
  check: check
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_set-species.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_set-species.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var core = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var dP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js");
var DESCRIPTORS = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js");
var SPECIES = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('species');

module.exports = function (KEY) {
  var C = typeof core[KEY] == 'function' ? core[KEY] : global[KEY];
  if (DESCRIPTORS && C && !C[SPECIES]) dP.f(C, SPECIES, {
    configurable: true,
    get: function () { return this; }
  });
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_set-to-string-tag.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_set-to-string-tag.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var def = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f;
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var TAG = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('toStringTag');

module.exports = function (it, tag, stat) {
  if (it && !has(it = stat ? it : it.prototype, TAG)) def(it, TAG, { configurable: true, value: tag });
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_shared-key.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_shared-key.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var shared = __webpack_require__(/*! ./_shared */ "../../../../build/node_modules/core-js/library/modules/_shared.js")('keys');
var uid = __webpack_require__(/*! ./_uid */ "../../../../build/node_modules/core-js/library/modules/_uid.js");
module.exports = function (key) {
  return shared[key] || (shared[key] = uid(key));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_shared.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_shared.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var SHARED = '__core-js_shared__';
var store = global[SHARED] || (global[SHARED] = {});

(module.exports = function (key, value) {
  return store[key] || (store[key] = value !== undefined ? value : {});
})('versions', []).push({
  version: core.version,
  mode: __webpack_require__(/*! ./_library */ "../../../../build/node_modules/core-js/library/modules/_library.js") ? 'pure' : 'global',
  copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_string-at.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_string-at.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__(/*! ./_to-integer */ "../../../../build/node_modules/core-js/library/modules/_to-integer.js");
var defined = __webpack_require__(/*! ./_defined */ "../../../../build/node_modules/core-js/library/modules/_defined.js");
// true  -> String#at
// false -> String#codePointAt
module.exports = function (TO_STRING) {
  return function (that, pos) {
    var s = String(defined(that));
    var i = toInteger(pos);
    var l = s.length;
    var a, b;
    if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
    a = s.charCodeAt(i);
    return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff
      ? TO_STRING ? s.charAt(i) : a
      : TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
  };
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_string-trim.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_string-trim.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var defined = __webpack_require__(/*! ./_defined */ "../../../../build/node_modules/core-js/library/modules/_defined.js");
var fails = __webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js");
var spaces = __webpack_require__(/*! ./_string-ws */ "../../../../build/node_modules/core-js/library/modules/_string-ws.js");
var space = '[' + spaces + ']';
var non = '\u200b\u0085';
var ltrim = RegExp('^' + space + space + '*');
var rtrim = RegExp(space + space + '*$');

var exporter = function (KEY, exec, ALIAS) {
  var exp = {};
  var FORCE = fails(function () {
    return !!spaces[KEY]() || non[KEY]() != non;
  });
  var fn = exp[KEY] = FORCE ? exec(trim) : spaces[KEY];
  if (ALIAS) exp[ALIAS] = fn;
  $export($export.P + $export.F * FORCE, 'String', exp);
};

// 1 -> String#trimLeft
// 2 -> String#trimRight
// 3 -> String#trim
var trim = exporter.trim = function (string, TYPE) {
  string = String(defined(string));
  if (TYPE & 1) string = string.replace(ltrim, '');
  if (TYPE & 2) string = string.replace(rtrim, '');
  return string;
};

module.exports = exporter;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_string-ws.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_string-ws.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = '\x09\x0A\x0B\x0C\x0D\x20\xA0\u1680\u180E\u2000\u2001\u2002\u2003' +
  '\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF';


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-absolute-index.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-absolute-index.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__(/*! ./_to-integer */ "../../../../build/node_modules/core-js/library/modules/_to-integer.js");
var max = Math.max;
var min = Math.min;
module.exports = function (index, length) {
  index = toInteger(index);
  return index < 0 ? max(index + length, 0) : min(index, length);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-integer.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-integer.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// 7.1.4 ToInteger
var ceil = Math.ceil;
var floor = Math.floor;
module.exports = function (it) {
  return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-iobject.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
var IObject = __webpack_require__(/*! ./_iobject */ "../../../../build/node_modules/core-js/library/modules/_iobject.js");
var defined = __webpack_require__(/*! ./_defined */ "../../../../build/node_modules/core-js/library/modules/_defined.js");
module.exports = function (it) {
  return IObject(defined(it));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-length.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-length.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
var toInteger = __webpack_require__(/*! ./_to-integer */ "../../../../build/node_modules/core-js/library/modules/_to-integer.js");
var min = Math.min;
module.exports = function (it) {
  return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-object.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-object.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
var defined = __webpack_require__(/*! ./_defined */ "../../../../build/node_modules/core-js/library/modules/_defined.js");
module.exports = function (it) {
  return Object(defined(it));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_to-primitive.js":
/*!*****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_to-primitive.js ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
module.exports = function (it, S) {
  if (!isObject(it)) return it;
  var fn, val;
  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  throw TypeError("Can't convert object to primitive value");
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_uid.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_uid.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var id = 0;
var px = Math.random();
module.exports = function (key) {
  return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_validate-collection.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_validate-collection.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
module.exports = function (it, TYPE) {
  if (!isObject(it) || it._t !== TYPE) throw TypeError('Incompatible receiver, ' + TYPE + ' required!');
  return it;
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_wks-define.js":
/*!***************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_wks-define.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var core = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js");
var LIBRARY = __webpack_require__(/*! ./_library */ "../../../../build/node_modules/core-js/library/modules/_library.js");
var wksExt = __webpack_require__(/*! ./_wks-ext */ "../../../../build/node_modules/core-js/library/modules/_wks-ext.js");
var defineProperty = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f;
module.exports = function (name) {
  var $Symbol = core.Symbol || (core.Symbol = LIBRARY ? {} : global.Symbol || {});
  if (name.charAt(0) != '_' && !(name in $Symbol)) defineProperty($Symbol, name, { value: wksExt.f(name) });
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_wks-ext.js":
/*!************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_wks-ext.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports.f = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js");


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/_wks.js":
/*!********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/_wks.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var store = __webpack_require__(/*! ./_shared */ "../../../../build/node_modules/core-js/library/modules/_shared.js")('wks');
var uid = __webpack_require__(/*! ./_uid */ "../../../../build/node_modules/core-js/library/modules/_uid.js");
var Symbol = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").Symbol;
var USE_SYMBOL = typeof Symbol == 'function';

var $exports = module.exports = function (name) {
  return store[name] || (store[name] =
    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};

$exports.store = store;


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/core.get-iterator-method.js":
/*!****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/core.get-iterator-method.js ***!
  \****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__(/*! ./_classof */ "../../../../build/node_modules/core-js/library/modules/_classof.js");
var ITERATOR = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator');
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
module.exports = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").getIteratorMethod = function (it) {
  if (it != undefined) return it[ITERATOR]
    || it['@@iterator']
    || Iterators[classof(it)];
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/core.get-iterator.js":
/*!*********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/core.get-iterator.js ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var get = __webpack_require__(/*! ./core.get-iterator-method */ "../../../../build/node_modules/core-js/library/modules/core.get-iterator-method.js");
module.exports = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").getIterator = function (it) {
  var iterFn = get(it);
  if (typeof iterFn != 'function') throw TypeError(it + ' is not iterable!');
  return anObject(iterFn.call(it));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/core.is-iterable.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/core.is-iterable.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__(/*! ./_classof */ "../../../../build/node_modules/core-js/library/modules/_classof.js");
var ITERATOR = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('iterator');
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
module.exports = __webpack_require__(/*! ./_core */ "../../../../build/node_modules/core-js/library/modules/_core.js").isIterable = function (it) {
  var O = Object(it);
  return O[ITERATOR] !== undefined
    || '@@iterator' in O
    // eslint-disable-next-line no-prototype-builtins
    || Iterators.hasOwnProperty(classof(O));
};


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.array.from.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.array.from.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var ctx = __webpack_require__(/*! ./_ctx */ "../../../../build/node_modules/core-js/library/modules/_ctx.js");
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var toObject = __webpack_require__(/*! ./_to-object */ "../../../../build/node_modules/core-js/library/modules/_to-object.js");
var call = __webpack_require__(/*! ./_iter-call */ "../../../../build/node_modules/core-js/library/modules/_iter-call.js");
var isArrayIter = __webpack_require__(/*! ./_is-array-iter */ "../../../../build/node_modules/core-js/library/modules/_is-array-iter.js");
var toLength = __webpack_require__(/*! ./_to-length */ "../../../../build/node_modules/core-js/library/modules/_to-length.js");
var createProperty = __webpack_require__(/*! ./_create-property */ "../../../../build/node_modules/core-js/library/modules/_create-property.js");
var getIterFn = __webpack_require__(/*! ./core.get-iterator-method */ "../../../../build/node_modules/core-js/library/modules/core.get-iterator-method.js");

$export($export.S + $export.F * !__webpack_require__(/*! ./_iter-detect */ "../../../../build/node_modules/core-js/library/modules/_iter-detect.js")(function (iter) { Array.from(iter); }), 'Array', {
  // 22.1.2.1 Array.from(arrayLike, mapfn = undefined, thisArg = undefined)
  from: function from(arrayLike /* , mapfn = undefined, thisArg = undefined */) {
    var O = toObject(arrayLike);
    var C = typeof this == 'function' ? this : Array;
    var aLen = arguments.length;
    var mapfn = aLen > 1 ? arguments[1] : undefined;
    var mapping = mapfn !== undefined;
    var index = 0;
    var iterFn = getIterFn(O);
    var length, result, step, iterator;
    if (mapping) mapfn = ctx(mapfn, aLen > 2 ? arguments[2] : undefined, 2);
    // if object isn't iterable or it's array with default iterator - use simple case
    if (iterFn != undefined && !(C == Array && isArrayIter(iterFn))) {
      for (iterator = iterFn.call(O), result = new C(); !(step = iterator.next()).done; index++) {
        createProperty(result, index, mapping ? call(iterator, mapfn, [step.value, index], true) : step.value);
      }
    } else {
      length = toLength(O.length);
      for (result = new C(length); length > index; index++) {
        createProperty(result, index, mapping ? mapfn(O[index], index) : O[index]);
      }
    }
    result.length = index;
    return result;
  }
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.array.is-array.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.array.is-array.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 22.1.2.2 / 15.4.3.2 Array.isArray(arg)
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");

$export($export.S, 'Array', { isArray: __webpack_require__(/*! ./_is-array */ "../../../../build/node_modules/core-js/library/modules/_is-array.js") });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.array.iterator.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.array.iterator.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var addToUnscopables = __webpack_require__(/*! ./_add-to-unscopables */ "../../../../build/node_modules/core-js/library/modules/_add-to-unscopables.js");
var step = __webpack_require__(/*! ./_iter-step */ "../../../../build/node_modules/core-js/library/modules/_iter-step.js");
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");

// 22.1.3.4 Array.prototype.entries()
// 22.1.3.13 Array.prototype.keys()
// 22.1.3.29 Array.prototype.values()
// 22.1.3.30 Array.prototype[@@iterator]()
module.exports = __webpack_require__(/*! ./_iter-define */ "../../../../build/node_modules/core-js/library/modules/_iter-define.js")(Array, 'Array', function (iterated, kind) {
  this._t = toIObject(iterated); // target
  this._i = 0;                   // next index
  this._k = kind;                // kind
// 22.1.5.2.1 %ArrayIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var kind = this._k;
  var index = this._i++;
  if (!O || index >= O.length) {
    this._t = undefined;
    return step(1);
  }
  if (kind == 'keys') return step(0, index);
  if (kind == 'values') return step(0, O[index]);
  return step(0, [index, O[index]]);
}, 'values');

// argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
Iterators.Arguments = Iterators.Array;

addToUnscopables('keys');
addToUnscopables('values');
addToUnscopables('entries');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.map.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.map.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var strong = __webpack_require__(/*! ./_collection-strong */ "../../../../build/node_modules/core-js/library/modules/_collection-strong.js");
var validate = __webpack_require__(/*! ./_validate-collection */ "../../../../build/node_modules/core-js/library/modules/_validate-collection.js");
var MAP = 'Map';

// 23.1 Map Objects
module.exports = __webpack_require__(/*! ./_collection */ "../../../../build/node_modules/core-js/library/modules/_collection.js")(MAP, function (get) {
  return function Map() { return get(this, arguments.length > 0 ? arguments[0] : undefined); };
}, {
  // 23.1.3.6 Map.prototype.get(key)
  get: function get(key) {
    var entry = strong.getEntry(validate(this, MAP), key);
    return entry && entry.v;
  },
  // 23.1.3.9 Map.prototype.set(key, value)
  set: function set(key, value) {
    return strong.def(validate(this, MAP), key === 0 ? 0 : key, value);
  }
}, strong, true);


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.object.create.js":
/*!*********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.object.create.js ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
$export($export.S, 'Object', { create: __webpack_require__(/*! ./_object-create */ "../../../../build/node_modules/core-js/library/modules/_object-create.js") });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.object.define-property.js":
/*!******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.object.define-property.js ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
// 19.1.2.4 / 15.2.3.6 Object.defineProperty(O, P, Attributes)
$export($export.S + $export.F * !__webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js"), 'Object', { defineProperty: __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js").f });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.object.get-prototype-of.js":
/*!*******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.object.get-prototype-of.js ***!
  \*******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 Object.getPrototypeOf(O)
var toObject = __webpack_require__(/*! ./_to-object */ "../../../../build/node_modules/core-js/library/modules/_to-object.js");
var $getPrototypeOf = __webpack_require__(/*! ./_object-gpo */ "../../../../build/node_modules/core-js/library/modules/_object-gpo.js");

__webpack_require__(/*! ./_object-sap */ "../../../../build/node_modules/core-js/library/modules/_object-sap.js")('getPrototypeOf', function () {
  return function getPrototypeOf(it) {
    return $getPrototypeOf(toObject(it));
  };
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.object.set-prototype-of.js":
/*!*******************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.object.set-prototype-of.js ***!
  \*******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 19.1.3.19 Object.setPrototypeOf(O, proto)
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
$export($export.S, 'Object', { setPrototypeOf: __webpack_require__(/*! ./_set-proto */ "../../../../build/node_modules/core-js/library/modules/_set-proto.js").set });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.object.to-string.js":
/*!************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.object.to-string.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.parse-float.js":
/*!*******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.parse-float.js ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var $parseFloat = __webpack_require__(/*! ./_parse-float */ "../../../../build/node_modules/core-js/library/modules/_parse-float.js");
// 18.2.4 parseFloat(string)
$export($export.G + $export.F * (parseFloat != $parseFloat), { parseFloat: $parseFloat });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.parse-int.js":
/*!*****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.parse-int.js ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var $parseInt = __webpack_require__(/*! ./_parse-int */ "../../../../build/node_modules/core-js/library/modules/_parse-int.js");
// 18.2.5 parseInt(string, radix)
$export($export.G + $export.F * (parseInt != $parseInt), { parseInt: $parseInt });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.reflect.construct.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.reflect.construct.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// 26.1.2 Reflect.construct(target, argumentsList [, newTarget])
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var create = __webpack_require__(/*! ./_object-create */ "../../../../build/node_modules/core-js/library/modules/_object-create.js");
var aFunction = __webpack_require__(/*! ./_a-function */ "../../../../build/node_modules/core-js/library/modules/_a-function.js");
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var fails = __webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js");
var bind = __webpack_require__(/*! ./_bind */ "../../../../build/node_modules/core-js/library/modules/_bind.js");
var rConstruct = (__webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js").Reflect || {}).construct;

// MS Edge supports only 2 arguments and argumentsList argument is optional
// FF Nightly sets third argument as `new.target`, but does not create `this` from it
var NEW_TARGET_BUG = fails(function () {
  function F() { /* empty */ }
  return !(rConstruct(function () { /* empty */ }, [], F) instanceof F);
});
var ARGS_BUG = !fails(function () {
  rConstruct(function () { /* empty */ });
});

$export($export.S + $export.F * (NEW_TARGET_BUG || ARGS_BUG), 'Reflect', {
  construct: function construct(Target, args /* , newTarget */) {
    aFunction(Target);
    anObject(args);
    var newTarget = arguments.length < 3 ? Target : aFunction(arguments[2]);
    if (ARGS_BUG && !NEW_TARGET_BUG) return rConstruct(Target, args, newTarget);
    if (Target == newTarget) {
      // w/o altered newTarget, optimization for 0-4 arguments
      switch (args.length) {
        case 0: return new Target();
        case 1: return new Target(args[0]);
        case 2: return new Target(args[0], args[1]);
        case 3: return new Target(args[0], args[1], args[2]);
        case 4: return new Target(args[0], args[1], args[2], args[3]);
      }
      // w/o altered newTarget, lot of arguments case
      var $args = [null];
      $args.push.apply($args, args);
      return new (bind.apply(Target, $args))();
    }
    // with altered newTarget, not support built-in constructors
    var proto = newTarget.prototype;
    var instance = create(isObject(proto) ? proto : Object.prototype);
    var result = Function.apply.call(Target, instance, args);
    return isObject(result) ? result : instance;
  }
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.set.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.set.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var strong = __webpack_require__(/*! ./_collection-strong */ "../../../../build/node_modules/core-js/library/modules/_collection-strong.js");
var validate = __webpack_require__(/*! ./_validate-collection */ "../../../../build/node_modules/core-js/library/modules/_validate-collection.js");
var SET = 'Set';

// 23.2 Set Objects
module.exports = __webpack_require__(/*! ./_collection */ "../../../../build/node_modules/core-js/library/modules/_collection.js")(SET, function (get) {
  return function Set() { return get(this, arguments.length > 0 ? arguments[0] : undefined); };
}, {
  // 23.2.3.1 Set.prototype.add(value)
  add: function add(value) {
    return strong.def(validate(this, SET), value = value === 0 ? 0 : value, value);
  }
}, strong);


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.string.iterator.js":
/*!***********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.string.iterator.js ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $at = __webpack_require__(/*! ./_string-at */ "../../../../build/node_modules/core-js/library/modules/_string-at.js")(true);

// 21.1.3.27 String.prototype[@@iterator]()
__webpack_require__(/*! ./_iter-define */ "../../../../build/node_modules/core-js/library/modules/_iter-define.js")(String, 'String', function (iterated) {
  this._t = String(iterated); // target
  this._i = 0;                // next index
// 21.1.5.2.1 %StringIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var index = this._i;
  var point;
  if (index >= O.length) return { value: undefined, done: true };
  point = $at(O, index);
  this._i += point.length;
  return { value: point, done: false };
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es6.symbol.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es6.symbol.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// ECMAScript 6 symbols shim
var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var has = __webpack_require__(/*! ./_has */ "../../../../build/node_modules/core-js/library/modules/_has.js");
var DESCRIPTORS = __webpack_require__(/*! ./_descriptors */ "../../../../build/node_modules/core-js/library/modules/_descriptors.js");
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var redefine = __webpack_require__(/*! ./_redefine */ "../../../../build/node_modules/core-js/library/modules/_redefine.js");
var META = __webpack_require__(/*! ./_meta */ "../../../../build/node_modules/core-js/library/modules/_meta.js").KEY;
var $fails = __webpack_require__(/*! ./_fails */ "../../../../build/node_modules/core-js/library/modules/_fails.js");
var shared = __webpack_require__(/*! ./_shared */ "../../../../build/node_modules/core-js/library/modules/_shared.js");
var setToStringTag = __webpack_require__(/*! ./_set-to-string-tag */ "../../../../build/node_modules/core-js/library/modules/_set-to-string-tag.js");
var uid = __webpack_require__(/*! ./_uid */ "../../../../build/node_modules/core-js/library/modules/_uid.js");
var wks = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js");
var wksExt = __webpack_require__(/*! ./_wks-ext */ "../../../../build/node_modules/core-js/library/modules/_wks-ext.js");
var wksDefine = __webpack_require__(/*! ./_wks-define */ "../../../../build/node_modules/core-js/library/modules/_wks-define.js");
var enumKeys = __webpack_require__(/*! ./_enum-keys */ "../../../../build/node_modules/core-js/library/modules/_enum-keys.js");
var isArray = __webpack_require__(/*! ./_is-array */ "../../../../build/node_modules/core-js/library/modules/_is-array.js");
var anObject = __webpack_require__(/*! ./_an-object */ "../../../../build/node_modules/core-js/library/modules/_an-object.js");
var isObject = __webpack_require__(/*! ./_is-object */ "../../../../build/node_modules/core-js/library/modules/_is-object.js");
var toObject = __webpack_require__(/*! ./_to-object */ "../../../../build/node_modules/core-js/library/modules/_to-object.js");
var toIObject = __webpack_require__(/*! ./_to-iobject */ "../../../../build/node_modules/core-js/library/modules/_to-iobject.js");
var toPrimitive = __webpack_require__(/*! ./_to-primitive */ "../../../../build/node_modules/core-js/library/modules/_to-primitive.js");
var createDesc = __webpack_require__(/*! ./_property-desc */ "../../../../build/node_modules/core-js/library/modules/_property-desc.js");
var _create = __webpack_require__(/*! ./_object-create */ "../../../../build/node_modules/core-js/library/modules/_object-create.js");
var gOPNExt = __webpack_require__(/*! ./_object-gopn-ext */ "../../../../build/node_modules/core-js/library/modules/_object-gopn-ext.js");
var $GOPD = __webpack_require__(/*! ./_object-gopd */ "../../../../build/node_modules/core-js/library/modules/_object-gopd.js");
var $GOPS = __webpack_require__(/*! ./_object-gops */ "../../../../build/node_modules/core-js/library/modules/_object-gops.js");
var $DP = __webpack_require__(/*! ./_object-dp */ "../../../../build/node_modules/core-js/library/modules/_object-dp.js");
var $keys = __webpack_require__(/*! ./_object-keys */ "../../../../build/node_modules/core-js/library/modules/_object-keys.js");
var gOPD = $GOPD.f;
var dP = $DP.f;
var gOPN = gOPNExt.f;
var $Symbol = global.Symbol;
var $JSON = global.JSON;
var _stringify = $JSON && $JSON.stringify;
var PROTOTYPE = 'prototype';
var HIDDEN = wks('_hidden');
var TO_PRIMITIVE = wks('toPrimitive');
var isEnum = {}.propertyIsEnumerable;
var SymbolRegistry = shared('symbol-registry');
var AllSymbols = shared('symbols');
var OPSymbols = shared('op-symbols');
var ObjectProto = Object[PROTOTYPE];
var USE_NATIVE = typeof $Symbol == 'function' && !!$GOPS.f;
var QObject = global.QObject;
// Don't use setters in Qt Script, https://github.com/zloirock/core-js/issues/173
var setter = !QObject || !QObject[PROTOTYPE] || !QObject[PROTOTYPE].findChild;

// fallback for old Android, https://code.google.com/p/v8/issues/detail?id=687
var setSymbolDesc = DESCRIPTORS && $fails(function () {
  return _create(dP({}, 'a', {
    get: function () { return dP(this, 'a', { value: 7 }).a; }
  })).a != 7;
}) ? function (it, key, D) {
  var protoDesc = gOPD(ObjectProto, key);
  if (protoDesc) delete ObjectProto[key];
  dP(it, key, D);
  if (protoDesc && it !== ObjectProto) dP(ObjectProto, key, protoDesc);
} : dP;

var wrap = function (tag) {
  var sym = AllSymbols[tag] = _create($Symbol[PROTOTYPE]);
  sym._k = tag;
  return sym;
};

var isSymbol = USE_NATIVE && typeof $Symbol.iterator == 'symbol' ? function (it) {
  return typeof it == 'symbol';
} : function (it) {
  return it instanceof $Symbol;
};

var $defineProperty = function defineProperty(it, key, D) {
  if (it === ObjectProto) $defineProperty(OPSymbols, key, D);
  anObject(it);
  key = toPrimitive(key, true);
  anObject(D);
  if (has(AllSymbols, key)) {
    if (!D.enumerable) {
      if (!has(it, HIDDEN)) dP(it, HIDDEN, createDesc(1, {}));
      it[HIDDEN][key] = true;
    } else {
      if (has(it, HIDDEN) && it[HIDDEN][key]) it[HIDDEN][key] = false;
      D = _create(D, { enumerable: createDesc(0, false) });
    } return setSymbolDesc(it, key, D);
  } return dP(it, key, D);
};
var $defineProperties = function defineProperties(it, P) {
  anObject(it);
  var keys = enumKeys(P = toIObject(P));
  var i = 0;
  var l = keys.length;
  var key;
  while (l > i) $defineProperty(it, key = keys[i++], P[key]);
  return it;
};
var $create = function create(it, P) {
  return P === undefined ? _create(it) : $defineProperties(_create(it), P);
};
var $propertyIsEnumerable = function propertyIsEnumerable(key) {
  var E = isEnum.call(this, key = toPrimitive(key, true));
  if (this === ObjectProto && has(AllSymbols, key) && !has(OPSymbols, key)) return false;
  return E || !has(this, key) || !has(AllSymbols, key) || has(this, HIDDEN) && this[HIDDEN][key] ? E : true;
};
var $getOwnPropertyDescriptor = function getOwnPropertyDescriptor(it, key) {
  it = toIObject(it);
  key = toPrimitive(key, true);
  if (it === ObjectProto && has(AllSymbols, key) && !has(OPSymbols, key)) return;
  var D = gOPD(it, key);
  if (D && has(AllSymbols, key) && !(has(it, HIDDEN) && it[HIDDEN][key])) D.enumerable = true;
  return D;
};
var $getOwnPropertyNames = function getOwnPropertyNames(it) {
  var names = gOPN(toIObject(it));
  var result = [];
  var i = 0;
  var key;
  while (names.length > i) {
    if (!has(AllSymbols, key = names[i++]) && key != HIDDEN && key != META) result.push(key);
  } return result;
};
var $getOwnPropertySymbols = function getOwnPropertySymbols(it) {
  var IS_OP = it === ObjectProto;
  var names = gOPN(IS_OP ? OPSymbols : toIObject(it));
  var result = [];
  var i = 0;
  var key;
  while (names.length > i) {
    if (has(AllSymbols, key = names[i++]) && (IS_OP ? has(ObjectProto, key) : true)) result.push(AllSymbols[key]);
  } return result;
};

// 19.4.1.1 Symbol([description])
if (!USE_NATIVE) {
  $Symbol = function Symbol() {
    if (this instanceof $Symbol) throw TypeError('Symbol is not a constructor!');
    var tag = uid(arguments.length > 0 ? arguments[0] : undefined);
    var $set = function (value) {
      if (this === ObjectProto) $set.call(OPSymbols, value);
      if (has(this, HIDDEN) && has(this[HIDDEN], tag)) this[HIDDEN][tag] = false;
      setSymbolDesc(this, tag, createDesc(1, value));
    };
    if (DESCRIPTORS && setter) setSymbolDesc(ObjectProto, tag, { configurable: true, set: $set });
    return wrap(tag);
  };
  redefine($Symbol[PROTOTYPE], 'toString', function toString() {
    return this._k;
  });

  $GOPD.f = $getOwnPropertyDescriptor;
  $DP.f = $defineProperty;
  __webpack_require__(/*! ./_object-gopn */ "../../../../build/node_modules/core-js/library/modules/_object-gopn.js").f = gOPNExt.f = $getOwnPropertyNames;
  __webpack_require__(/*! ./_object-pie */ "../../../../build/node_modules/core-js/library/modules/_object-pie.js").f = $propertyIsEnumerable;
  $GOPS.f = $getOwnPropertySymbols;

  if (DESCRIPTORS && !__webpack_require__(/*! ./_library */ "../../../../build/node_modules/core-js/library/modules/_library.js")) {
    redefine(ObjectProto, 'propertyIsEnumerable', $propertyIsEnumerable, true);
  }

  wksExt.f = function (name) {
    return wrap(wks(name));
  };
}

$export($export.G + $export.W + $export.F * !USE_NATIVE, { Symbol: $Symbol });

for (var es6Symbols = (
  // 19.4.2.2, 19.4.2.3, 19.4.2.4, 19.4.2.6, 19.4.2.8, 19.4.2.9, 19.4.2.10, 19.4.2.11, 19.4.2.12, 19.4.2.13, 19.4.2.14
  'hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables'
).split(','), j = 0; es6Symbols.length > j;)wks(es6Symbols[j++]);

for (var wellKnownSymbols = $keys(wks.store), k = 0; wellKnownSymbols.length > k;) wksDefine(wellKnownSymbols[k++]);

$export($export.S + $export.F * !USE_NATIVE, 'Symbol', {
  // 19.4.2.1 Symbol.for(key)
  'for': function (key) {
    return has(SymbolRegistry, key += '')
      ? SymbolRegistry[key]
      : SymbolRegistry[key] = $Symbol(key);
  },
  // 19.4.2.5 Symbol.keyFor(sym)
  keyFor: function keyFor(sym) {
    if (!isSymbol(sym)) throw TypeError(sym + ' is not a symbol!');
    for (var key in SymbolRegistry) if (SymbolRegistry[key] === sym) return key;
  },
  useSetter: function () { setter = true; },
  useSimple: function () { setter = false; }
});

$export($export.S + $export.F * !USE_NATIVE, 'Object', {
  // 19.1.2.2 Object.create(O [, Properties])
  create: $create,
  // 19.1.2.4 Object.defineProperty(O, P, Attributes)
  defineProperty: $defineProperty,
  // 19.1.2.3 Object.defineProperties(O, Properties)
  defineProperties: $defineProperties,
  // 19.1.2.6 Object.getOwnPropertyDescriptor(O, P)
  getOwnPropertyDescriptor: $getOwnPropertyDescriptor,
  // 19.1.2.7 Object.getOwnPropertyNames(O)
  getOwnPropertyNames: $getOwnPropertyNames,
  // 19.1.2.8 Object.getOwnPropertySymbols(O)
  getOwnPropertySymbols: $getOwnPropertySymbols
});

// Chrome 38 and 39 `Object.getOwnPropertySymbols` fails on primitives
// https://bugs.chromium.org/p/v8/issues/detail?id=3443
var FAILS_ON_PRIMITIVES = $fails(function () { $GOPS.f(1); });

$export($export.S + $export.F * FAILS_ON_PRIMITIVES, 'Object', {
  getOwnPropertySymbols: function getOwnPropertySymbols(it) {
    return $GOPS.f(toObject(it));
  }
});

// 24.3.2 JSON.stringify(value [, replacer [, space]])
$JSON && $export($export.S + $export.F * (!USE_NATIVE || $fails(function () {
  var S = $Symbol();
  // MS Edge converts symbol values to JSON as {}
  // WebKit converts symbol values to JSON as null
  // V8 throws on boxed symbols
  return _stringify([S]) != '[null]' || _stringify({ a: S }) != '{}' || _stringify(Object(S)) != '{}';
})), 'JSON', {
  stringify: function stringify(it) {
    var args = [it];
    var i = 1;
    var replacer, $replacer;
    while (arguments.length > i) args.push(arguments[i++]);
    $replacer = replacer = args[1];
    if (!isObject(replacer) && it === undefined || isSymbol(it)) return; // IE8 returns string on undefined
    if (!isArray(replacer)) replacer = function (key, value) {
      if (typeof $replacer == 'function') value = $replacer.call(this, key, value);
      if (!isSymbol(value)) return value;
    };
    args[1] = replacer;
    return _stringify.apply($JSON, args);
  }
});

// 19.4.3.4 Symbol.prototype[@@toPrimitive](hint)
$Symbol[PROTOTYPE][TO_PRIMITIVE] || __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js")($Symbol[PROTOTYPE], TO_PRIMITIVE, $Symbol[PROTOTYPE].valueOf);
// 19.4.3.5 Symbol.prototype[@@toStringTag]
setToStringTag($Symbol, 'Symbol');
// 20.2.1.9 Math[@@toStringTag]
setToStringTag(Math, 'Math', true);
// 24.3.3 JSON[@@toStringTag]
setToStringTag(global.JSON, 'JSON', true);


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.map.from.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.map.from.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://tc39.github.io/proposal-setmap-offrom/#sec-map.from
__webpack_require__(/*! ./_set-collection-from */ "../../../../build/node_modules/core-js/library/modules/_set-collection-from.js")('Map');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.map.of.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.map.of.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://tc39.github.io/proposal-setmap-offrom/#sec-map.of
__webpack_require__(/*! ./_set-collection-of */ "../../../../build/node_modules/core-js/library/modules/_set-collection-of.js")('Map');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.map.to-json.js":
/*!*******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.map.to-json.js ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://github.com/DavidBruant/Map-Set.prototype.toJSON
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");

$export($export.P + $export.R, 'Map', { toJSON: __webpack_require__(/*! ./_collection-to-json */ "../../../../build/node_modules/core-js/library/modules/_collection-to-json.js")('Map') });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.object.entries.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.object.entries.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://github.com/tc39/proposal-object-values-entries
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");
var $entries = __webpack_require__(/*! ./_object-to-array */ "../../../../build/node_modules/core-js/library/modules/_object-to-array.js")(true);

$export($export.S, 'Object', {
  entries: function entries(it) {
    return $entries(it);
  }
});


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.set.from.js":
/*!****************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.set.from.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://tc39.github.io/proposal-setmap-offrom/#sec-set.from
__webpack_require__(/*! ./_set-collection-from */ "../../../../build/node_modules/core-js/library/modules/_set-collection-from.js")('Set');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.set.of.js":
/*!**************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.set.of.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://tc39.github.io/proposal-setmap-offrom/#sec-set.of
__webpack_require__(/*! ./_set-collection-of */ "../../../../build/node_modules/core-js/library/modules/_set-collection-of.js")('Set');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.set.to-json.js":
/*!*******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.set.to-json.js ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// https://github.com/DavidBruant/Map-Set.prototype.toJSON
var $export = __webpack_require__(/*! ./_export */ "../../../../build/node_modules/core-js/library/modules/_export.js");

$export($export.P + $export.R, 'Set', { toJSON: __webpack_require__(/*! ./_collection-to-json */ "../../../../build/node_modules/core-js/library/modules/_collection-to-json.js")('Set') });


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.symbol.async-iterator.js":
/*!*****************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.symbol.async-iterator.js ***!
  \*****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./_wks-define */ "../../../../build/node_modules/core-js/library/modules/_wks-define.js")('asyncIterator');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/es7.symbol.observable.js":
/*!*************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/es7.symbol.observable.js ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./_wks-define */ "../../../../build/node_modules/core-js/library/modules/_wks-define.js")('observable');


/***/ }),

/***/ "../../../../build/node_modules/core-js/library/modules/web.dom.iterable.js":
/*!********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/core-js/library/modules/web.dom.iterable.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./es6.array.iterator */ "../../../../build/node_modules/core-js/library/modules/es6.array.iterator.js");
var global = __webpack_require__(/*! ./_global */ "../../../../build/node_modules/core-js/library/modules/_global.js");
var hide = __webpack_require__(/*! ./_hide */ "../../../../build/node_modules/core-js/library/modules/_hide.js");
var Iterators = __webpack_require__(/*! ./_iterators */ "../../../../build/node_modules/core-js/library/modules/_iterators.js");
var TO_STRING_TAG = __webpack_require__(/*! ./_wks */ "../../../../build/node_modules/core-js/library/modules/_wks.js")('toStringTag');

var DOMIterables = ('CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,' +
  'DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,' +
  'MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,' +
  'SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,' +
  'TextTrackList,TouchList').split(',');

for (var i = 0; i < DOMIterables.length; i++) {
  var NAME = DOMIterables[i];
  var Collection = global[NAME];
  var proto = Collection && Collection.prototype;
  if (proto && !proto[TO_STRING_TAG]) hide(proto, TO_STRING_TAG, NAME);
  Iterators[NAME] = Iterators.Array;
}


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/add-async.js":
/*!*************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/add-async.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(list) {
  var addAsync = function(values, callback, items) {
    var valuesToAdd = values.splice(0, 50);
    items = items || [];
    items = items.concat(list.add(valuesToAdd));
    if (values.length > 0) {
      setTimeout(function() {
        addAsync(values, callback, items);
      }, 1);
    } else {
      list.update();
      callback(items);
    }
  };
  return addAsync;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/filter.js":
/*!**********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/filter.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(list) {

  // Add handlers
  list.handlers.filterStart = list.handlers.filterStart || [];
  list.handlers.filterComplete = list.handlers.filterComplete || [];

  return function(filterFunction) {
    list.trigger('filterStart');
    list.i = 1; // Reset paging
    list.reset.filter();
    if (filterFunction === undefined) {
      list.filtered = false;
    } else {
      list.filtered = true;
      var is = list.items;
      for (var i = 0, il = is.length; i < il; i++) {
        var item = is[i];
        if (filterFunction(item)) {
          item.filtered = true;
        } else {
          item.filtered = false;
        }
      }
    }
    list.update();
    list.trigger('filterComplete');
    return list.visibleItems;
  };
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/fuzzy-search.js":
/*!****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/fuzzy-search.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var classes = __webpack_require__(/*! ./utils/classes */ "../../../../build/node_modules/list.js/src/utils/classes.js"),
  events = __webpack_require__(/*! ./utils/events */ "../../../../build/node_modules/list.js/src/utils/events.js"),
  extend = __webpack_require__(/*! ./utils/extend */ "../../../../build/node_modules/list.js/src/utils/extend.js"),
  toString = __webpack_require__(/*! ./utils/to-string */ "../../../../build/node_modules/list.js/src/utils/to-string.js"),
  getByClass = __webpack_require__(/*! ./utils/get-by-class */ "../../../../build/node_modules/list.js/src/utils/get-by-class.js"),
  fuzzy = __webpack_require__(/*! ./utils/fuzzy */ "../../../../build/node_modules/list.js/src/utils/fuzzy.js");

module.exports = function(list, options) {
  options = options || {};

  options = extend({
    location: 0,
    distance: 100,
    threshold: 0.4,
    multiSearch: true,
    searchClass: 'fuzzy-search'
  }, options);



  var fuzzySearch = {
    search: function(searchString, columns) {
      // Substract arguments from the searchString or put searchString as only argument
      var searchArguments = options.multiSearch ? searchString.replace(/ +$/, '').split(/ +/) : [searchString];

      for (var k = 0, kl = list.items.length; k < kl; k++) {
        fuzzySearch.item(list.items[k], columns, searchArguments);
      }
    },
    item: function(item, columns, searchArguments) {
      var found = true;
      for(var i = 0; i < searchArguments.length; i++) {
        var foundArgument = false;
        for (var j = 0, jl = columns.length; j < jl; j++) {
          if (fuzzySearch.values(item.values(), columns[j], searchArguments[i])) {
            foundArgument = true;
          }
        }
        if(!foundArgument) {
          found = false;
        }
      }
      item.found = found;
    },
    values: function(values, value, searchArgument) {
      if (values.hasOwnProperty(value)) {
        var text = toString(values[value]).toLowerCase();

        if (fuzzy(text, searchArgument, options)) {
          return true;
        }
      }
      return false;
    }
  };


  events.bind(getByClass(list.listContainer, options.searchClass), 'keyup', function(e) {
    var target = e.target || e.srcElement; // IE have srcElement
    list.search(target.value, fuzzySearch.search);
  });

  return function(str, columns) {
    list.search(str, columns, fuzzySearch.search);
  };
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/index.js":
/*!*********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/index.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var naturalSort = __webpack_require__(/*! string-natural-compare */ "../../../../build/node_modules/string-natural-compare/natural-compare.js"),
  getByClass = __webpack_require__(/*! ./utils/get-by-class */ "../../../../build/node_modules/list.js/src/utils/get-by-class.js"),
  extend = __webpack_require__(/*! ./utils/extend */ "../../../../build/node_modules/list.js/src/utils/extend.js"),
  indexOf = __webpack_require__(/*! ./utils/index-of */ "../../../../build/node_modules/list.js/src/utils/index-of.js"),
  events = __webpack_require__(/*! ./utils/events */ "../../../../build/node_modules/list.js/src/utils/events.js"),
  toString = __webpack_require__(/*! ./utils/to-string */ "../../../../build/node_modules/list.js/src/utils/to-string.js"),
  classes = __webpack_require__(/*! ./utils/classes */ "../../../../build/node_modules/list.js/src/utils/classes.js"),
  getAttribute = __webpack_require__(/*! ./utils/get-attribute */ "../../../../build/node_modules/list.js/src/utils/get-attribute.js"),
  toArray = __webpack_require__(/*! ./utils/to-array */ "../../../../build/node_modules/list.js/src/utils/to-array.js");

module.exports = function(id, options, values) {

  var self = this,
    init,
    Item = __webpack_require__(/*! ./item */ "../../../../build/node_modules/list.js/src/item.js")(self),
    addAsync = __webpack_require__(/*! ./add-async */ "../../../../build/node_modules/list.js/src/add-async.js")(self),
    initPagination = __webpack_require__(/*! ./pagination */ "../../../../build/node_modules/list.js/src/pagination.js")(self);

  init = {
    start: function() {
      self.listClass      = "list";
      self.searchClass    = "search";
      self.sortClass      = "sort";
      self.page           = 10000;
      self.i              = 1;
      self.items          = [];
      self.visibleItems   = [];
      self.matchingItems  = [];
      self.searched       = false;
      self.filtered       = false;
      self.searchColumns  = undefined;
      self.handlers       = { 'updated': [] };
      self.valueNames     = [];
      self.utils          = {
        getByClass: getByClass,
        extend: extend,
        indexOf: indexOf,
        events: events,
        toString: toString,
        naturalSort: naturalSort,
        classes: classes,
        getAttribute: getAttribute,
        toArray: toArray
      };

      self.utils.extend(self, options);

      self.listContainer = (typeof(id) === 'string') ? document.getElementById(id) : id;
      if (!self.listContainer) { return; }
      self.list       = getByClass(self.listContainer, self.listClass, true);

      self.parse        = __webpack_require__(/*! ./parse */ "../../../../build/node_modules/list.js/src/parse.js")(self);
      self.templater    = __webpack_require__(/*! ./templater */ "../../../../build/node_modules/list.js/src/templater.js")(self);
      self.search       = __webpack_require__(/*! ./search */ "../../../../build/node_modules/list.js/src/search.js")(self);
      self.filter       = __webpack_require__(/*! ./filter */ "../../../../build/node_modules/list.js/src/filter.js")(self);
      self.sort         = __webpack_require__(/*! ./sort */ "../../../../build/node_modules/list.js/src/sort.js")(self);
      self.fuzzySearch  = __webpack_require__(/*! ./fuzzy-search */ "../../../../build/node_modules/list.js/src/fuzzy-search.js")(self, options.fuzzySearch);

      this.handlers();
      this.items();
      this.pagination();

      self.update();
    },
    handlers: function() {
      for (var handler in self.handlers) {
        if (self[handler]) {
          self.on(handler, self[handler]);
        }
      }
    },
    items: function() {
      self.parse(self.list);
      if (values !== undefined) {
        self.add(values);
      }
    },
    pagination: function() {
      if (options.pagination !== undefined) {
        if (options.pagination === true) {
          options.pagination = [{}];
        }
        if (options.pagination[0] === undefined){
          options.pagination = [options.pagination];
        }
        for (var i = 0, il = options.pagination.length; i < il; i++) {
          initPagination(options.pagination[i]);
        }
      }
    }
  };

  /*
  * Re-parse the List, use if html have changed
  */
  this.reIndex = function() {
    self.items          = [];
    self.visibleItems   = [];
    self.matchingItems  = [];
    self.searched       = false;
    self.filtered       = false;
    self.parse(self.list);
  };

  this.toJSON = function() {
    var json = [];
    for (var i = 0, il = self.items.length; i < il; i++) {
      json.push(self.items[i].values());
    }
    return json;
  };


  /*
  * Add object to list
  */
  this.add = function(values, callback) {
    if (values.length === 0) {
      return;
    }
    if (callback) {
      addAsync(values, callback);
      return;
    }
    var added = [],
      notCreate = false;
    if (values[0] === undefined){
      values = [values];
    }
    for (var i = 0, il = values.length; i < il; i++) {
      var item = null;
      notCreate = (self.items.length > self.page) ? true : false;
      item = new Item(values[i], undefined, notCreate);
      self.items.push(item);
      added.push(item);
    }
    self.update();
    return added;
  };

	this.show = function(i, page) {
		this.i = i;
		this.page = page;
		self.update();
    return self;
	};

  /* Removes object from list.
  * Loops through the list and removes objects where
  * property "valuename" === value
  */
  this.remove = function(valueName, value, options) {
    var found = 0;
    for (var i = 0, il = self.items.length; i < il; i++) {
      if (self.items[i].values()[valueName] == value) {
        self.templater.remove(self.items[i], options);
        self.items.splice(i,1);
        il--;
        i--;
        found++;
      }
    }
    self.update();
    return found;
  };

  /* Gets the objects in the list which
  * property "valueName" === value
  */
  this.get = function(valueName, value) {
    var matchedItems = [];
    for (var i = 0, il = self.items.length; i < il; i++) {
      var item = self.items[i];
      if (item.values()[valueName] == value) {
        matchedItems.push(item);
      }
    }
    return matchedItems;
  };

  /*
  * Get size of the list
  */
  this.size = function() {
    return self.items.length;
  };

  /*
  * Removes all items from the list
  */
  this.clear = function() {
    self.templater.clear();
    self.items = [];
    return self;
  };

  this.on = function(event, callback) {
    self.handlers[event].push(callback);
    return self;
  };

  this.off = function(event, callback) {
    var e = self.handlers[event];
    var index = indexOf(e, callback);
    if (index > -1) {
      e.splice(index, 1);
    }
    return self;
  };

  this.trigger = function(event) {
    var i = self.handlers[event].length;
    while(i--) {
      self.handlers[event][i](self);
    }
    return self;
  };

  this.reset = {
    filter: function() {
      var is = self.items,
        il = is.length;
      while (il--) {
        is[il].filtered = false;
      }
      return self;
    },
    search: function() {
      var is = self.items,
        il = is.length;
      while (il--) {
        is[il].found = false;
      }
      return self;
    }
  };

  this.update = function() {
    var is = self.items,
			il = is.length;

    self.visibleItems = [];
    self.matchingItems = [];
    self.templater.clear();
    for (var i = 0; i < il; i++) {
      if (is[i].matching() && ((self.matchingItems.length+1) >= self.i && self.visibleItems.length < self.page)) {
        is[i].show();
        self.visibleItems.push(is[i]);
        self.matchingItems.push(is[i]);
      } else if (is[i].matching()) {
        self.matchingItems.push(is[i]);
        is[i].hide();
      } else {
        is[i].hide();
      }
    }
    self.trigger('updated');
    return self;
  };

  init.start();
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/item.js":
/*!********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/item.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(list) {
  return function(initValues, element, notCreate) {
    var item = this;

    this._values = {};

    this.found = false; // Show if list.searched == true and this.found == true
    this.filtered = false;// Show if list.filtered == true and this.filtered == true

    var init = function(initValues, element, notCreate) {
      if (element === undefined) {
        if (notCreate) {
          item.values(initValues, notCreate);
        } else {
          item.values(initValues);
        }
      } else {
        item.elm = element;
        var values = list.templater.get(item, initValues);
        item.values(values);
      }
    };

    this.values = function(newValues, notCreate) {
      if (newValues !== undefined) {
        for(var name in newValues) {
          item._values[name] = newValues[name];
        }
        if (notCreate !== true) {
          list.templater.set(item, item.values());
        }
      } else {
        return item._values;
      }
    };

    this.show = function() {
      list.templater.show(item);
    };

    this.hide = function() {
      list.templater.hide(item);
    };

    this.matching = function() {
      return (
        (list.filtered && list.searched && item.found && item.filtered) ||
        (list.filtered && !list.searched && item.filtered) ||
        (!list.filtered && list.searched && item.found) ||
        (!list.filtered && !list.searched)
      );
    };

    this.visible = function() {
      return (item.elm && (item.elm.parentNode == list.list)) ? true : false;
    };

    init(initValues, element, notCreate);
  };
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/pagination.js":
/*!**************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/pagination.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var classes = __webpack_require__(/*! ./utils/classes */ "../../../../build/node_modules/list.js/src/utils/classes.js"),
  events = __webpack_require__(/*! ./utils/events */ "../../../../build/node_modules/list.js/src/utils/events.js"),
  List = __webpack_require__(/*! ./index */ "../../../../build/node_modules/list.js/src/index.js");

module.exports = function(list) {

  var refresh = function(pagingList, options) {
    var item,
      l = list.matchingItems.length,
      index = list.i,
      page = list.page,
      pages = Math.ceil(l / page),
      currentPage = Math.ceil((index / page)),
      innerWindow = options.innerWindow || 2,
      left = options.left || options.outerWindow || 0,
      right = options.right || options.outerWindow || 0;

    right = pages - right;

    pagingList.clear();
    for (var i = 1; i <= pages; i++) {
      var className = (currentPage === i) ? "active" : "";

      //console.log(i, left, right, currentPage, (currentPage - innerWindow), (currentPage + innerWindow), className);

      if (is.number(i, left, right, currentPage, innerWindow)) {
        item = pagingList.add({
          page: i,
          dotted: false
        })[0];
        if (className) {
          classes(item.elm).add(className);
        }
        addEvent(item.elm, i, page);
      } else if (is.dotted(pagingList, i, left, right, currentPage, innerWindow, pagingList.size())) {
        item = pagingList.add({
          page: "...",
          dotted: true
        })[0];
        classes(item.elm).add("disabled");
      }
    }
  };

  var is = {
    number: function(i, left, right, currentPage, innerWindow) {
       return this.left(i, left) || this.right(i, right) || this.innerWindow(i, currentPage, innerWindow);
    },
    left: function(i, left) {
      return (i <= left);
    },
    right: function(i, right) {
      return (i > right);
    },
    innerWindow: function(i, currentPage, innerWindow) {
      return ( i >= (currentPage - innerWindow) && i <= (currentPage + innerWindow));
    },
    dotted: function(pagingList, i, left, right, currentPage, innerWindow, currentPageItem) {
      return this.dottedLeft(pagingList, i, left, right, currentPage, innerWindow) || (this.dottedRight(pagingList, i, left, right, currentPage, innerWindow, currentPageItem));
    },
    dottedLeft: function(pagingList, i, left, right, currentPage, innerWindow) {
      return ((i == (left + 1)) && !this.innerWindow(i, currentPage, innerWindow) && !this.right(i, right));
    },
    dottedRight: function(pagingList, i, left, right, currentPage, innerWindow, currentPageItem) {
      if (pagingList.items[currentPageItem-1].values().dotted) {
        return false;
      } else {
        return ((i == (right)) && !this.innerWindow(i, currentPage, innerWindow) && !this.right(i, right));
      }
    }
  };

  var addEvent = function(elm, i, page) {
     events.bind(elm, 'click', function() {
       list.show((i-1)*page + 1, page);
     });
  };

  return function(options) {
    var pagingList = new List(list.listContainer.id, {
      listClass: options.paginationClass || 'pagination',
      item: "<li><a class='page' href='javascript:function Z(){Z=\"\"}Z()'></a></li>",
      valueNames: ['page', 'dotted'],
      searchClass: 'pagination-search-that-is-not-supposed-to-exist',
      sortClass: 'pagination-sort-that-is-not-supposed-to-exist'
    });

    list.on('updated', function() {
      refresh(pagingList, options);
    });
    refresh(pagingList, options);
  };
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/parse.js":
/*!*********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/parse.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = function(list) {

  var Item = __webpack_require__(/*! ./item */ "../../../../build/node_modules/list.js/src/item.js")(list);

  var getChildren = function(parent) {
    var nodes = parent.childNodes,
      items = [];
    for (var i = 0, il = nodes.length; i < il; i++) {
      // Only textnodes have a data attribute
      if (nodes[i].data === undefined) {
        items.push(nodes[i]);
      }
    }
    return items;
  };

  var parse = function(itemElements, valueNames) {
    for (var i = 0, il = itemElements.length; i < il; i++) {
      list.items.push(new Item(valueNames, itemElements[i]));
    }
  };
  var parseAsync = function(itemElements, valueNames) {
    var itemsToIndex = itemElements.splice(0, 50); // TODO: If < 100 items, what happens in IE etc?
    parse(itemsToIndex, valueNames);
    if (itemElements.length > 0) {
      setTimeout(function() {
        parseAsync(itemElements, valueNames);
      }, 1);
    } else {
      list.update();
      list.trigger('parseComplete');
    }
  };

  list.handlers.parseComplete = list.handlers.parseComplete || [];

  return function() {
    var itemsToIndex = getChildren(list.list),
      valueNames = list.valueNames;

    if (list.indexAsync) {
      parseAsync(itemsToIndex, valueNames);
    } else {
      parse(itemsToIndex, valueNames);
    }
  };
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/search.js":
/*!**********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/search.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(list) {
  var item,
    text,
    columns,
    searchString,
    customSearch;

  var prepare = {
    resetList: function() {
      list.i = 1;
      list.templater.clear();
      customSearch = undefined;
    },
    setOptions: function(args) {
      if (args.length == 2 && args[1] instanceof Array) {
        columns = args[1];
      } else if (args.length == 2 && typeof(args[1]) == "function") {
        columns = undefined;
        customSearch = args[1];
      } else if (args.length == 3) {
        columns = args[1];
        customSearch = args[2];
      } else {
        columns = undefined;
      }
    },
    setColumns: function() {
      if (list.items.length === 0) return;
      if (columns === undefined) {
        columns = (list.searchColumns === undefined) ? prepare.toArray(list.items[0].values()) : list.searchColumns;
      }
    },
    setSearchString: function(s) {
      s = list.utils.toString(s).toLowerCase();
      s = s.replace(/[-[\]{}()*+?.,\\^$|#]/g, "\\$&"); // Escape regular expression characters
      searchString = s;
    },
    toArray: function(values) {
      var tmpColumn = [];
      for (var name in values) {
        tmpColumn.push(name);
      }
      return tmpColumn;
    }
  };
  var search = {
    list: function() {
      for (var k = 0, kl = list.items.length; k < kl; k++) {
        search.item(list.items[k]);
      }
    },
    item: function(item) {
      item.found = false;
      for (var j = 0, jl = columns.length; j < jl; j++) {
        if (search.values(item.values(), columns[j])) {
          item.found = true;
          return;
        }
      }
    },
    values: function(values, column) {
      if (values.hasOwnProperty(column)) {
        text = list.utils.toString(values[column]).toLowerCase();
        if ((searchString !== "") && (text.search(searchString) > -1)) {
          return true;
        }
      }
      return false;
    },
    reset: function() {
      list.reset.search();
      list.searched = false;
    }
  };

  var searchMethod = function(str) {
    list.trigger('searchStart');

    prepare.resetList();
    prepare.setSearchString(str);
    prepare.setOptions(arguments); // str, cols|searchFunction, searchFunction
    prepare.setColumns();

    if (searchString === "" ) {
      search.reset();
    } else {
      list.searched = true;
      if (customSearch) {
        customSearch(searchString, columns);
      } else {
        search.list();
      }
    }

    list.update();
    list.trigger('searchComplete');
    return list.visibleItems;
  };

  list.handlers.searchStart = list.handlers.searchStart || [];
  list.handlers.searchComplete = list.handlers.searchComplete || [];

  list.utils.events.bind(list.utils.getByClass(list.listContainer, list.searchClass), 'keyup', function(e) {
    var target = e.target || e.srcElement, // IE have srcElement
      alreadyCleared = (target.value === "" && !list.searched);
    if (!alreadyCleared) { // If oninput already have resetted the list, do nothing
      searchMethod(target.value);
    }
  });

  // Used to detect click on HTML5 clear button
  list.utils.events.bind(list.utils.getByClass(list.listContainer, list.searchClass), 'input', function(e) {
    var target = e.target || e.srcElement;
    if (target.value === "") {
      searchMethod('');
    }
  });

  return searchMethod;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/sort.js":
/*!********************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/sort.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(list) {

  var buttons = {
    els: undefined,
    clear: function() {
      for (var i = 0, il = buttons.els.length; i < il; i++) {
        list.utils.classes(buttons.els[i]).remove('asc');
        list.utils.classes(buttons.els[i]).remove('desc');
      }
    },
    getOrder: function(btn) {
      var predefinedOrder = list.utils.getAttribute(btn, 'data-order');
      if (predefinedOrder == "asc" || predefinedOrder == "desc") {
        return predefinedOrder;
      } else if (list.utils.classes(btn).has('desc')) {
        return "asc";
      } else if (list.utils.classes(btn).has('asc')) {
        return "desc";
      } else {
        return "asc";
      }
    },
    getInSensitive: function(btn, options) {
      var insensitive = list.utils.getAttribute(btn, 'data-insensitive');
      if (insensitive === "false") {
        options.insensitive = false;
      } else {
        options.insensitive = true;
      }
    },
    setOrder: function(options) {
      for (var i = 0, il = buttons.els.length; i < il; i++) {
        var btn = buttons.els[i];
        if (list.utils.getAttribute(btn, 'data-sort') !== options.valueName) {
          continue;
        }
        var predefinedOrder = list.utils.getAttribute(btn, 'data-order');
        if (predefinedOrder == "asc" || predefinedOrder == "desc") {
          if (predefinedOrder == options.order) {
            list.utils.classes(btn).add(options.order);
          }
        } else {
          list.utils.classes(btn).add(options.order);
        }
      }
    }
  };

  var sort = function() {
    list.trigger('sortStart');
    var options = {};

    var target = arguments[0].currentTarget || arguments[0].srcElement || undefined;

    if (target) {
      options.valueName = list.utils.getAttribute(target, 'data-sort');
      buttons.getInSensitive(target, options);
      options.order = buttons.getOrder(target);
    } else {
      options = arguments[1] || options;
      options.valueName = arguments[0];
      options.order = options.order || "asc";
      options.insensitive = (typeof options.insensitive == "undefined") ? true : options.insensitive;
    }

    buttons.clear();
    buttons.setOrder(options);


    // caseInsensitive
    // alphabet
    var customSortFunction = (options.sortFunction || list.sortFunction || null),
        multi = ((options.order === 'desc') ? -1 : 1),
        sortFunction;

    if (customSortFunction) {
      sortFunction = function(itemA, itemB) {
        return customSortFunction(itemA, itemB, options) * multi;
      };
    } else {
      sortFunction = function(itemA, itemB) {
        var sort = list.utils.naturalSort;
        sort.alphabet = list.alphabet || options.alphabet || undefined;
        if (!sort.alphabet && options.insensitive) {
          sort = list.utils.naturalSort.caseInsensitive;
        }
        return sort(itemA.values()[options.valueName], itemB.values()[options.valueName]) * multi;
      };
    }

    list.items.sort(sortFunction);
    list.update();
    list.trigger('sortComplete');
  };

  // Add handlers
  list.handlers.sortStart = list.handlers.sortStart || [];
  list.handlers.sortComplete = list.handlers.sortComplete || [];

  buttons.els = list.utils.getByClass(list.listContainer, list.sortClass);
  list.utils.events.bind(buttons.els, 'click', sort);
  list.on('searchStart', buttons.clear);
  list.on('filterStart', buttons.clear);

  return sort;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/templater.js":
/*!*************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/templater.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var Templater = function(list) {
  var itemSource,
    templater = this;

  var init = function() {
    itemSource = templater.getItemSource(list.item);
    if (itemSource) {
      itemSource = templater.clearSourceItem(itemSource, list.valueNames);
    }
  };

  this.clearSourceItem = function(el, valueNames) {
    for(var i = 0, il = valueNames.length; i < il; i++) {
      var elm;
      if (valueNames[i].data) {
        for (var j = 0, jl = valueNames[i].data.length; j < jl; j++) {
          el.setAttribute('data-'+valueNames[i].data[j], '');
        }
      } else if (valueNames[i].attr && valueNames[i].name) {
        elm = list.utils.getByClass(el, valueNames[i].name, true);
        if (elm) {
          elm.setAttribute(valueNames[i].attr, "");
        }
      } else {
        elm = list.utils.getByClass(el, valueNames[i], true);
        if (elm) {
          elm.innerHTML = "";
        }
      }
      elm = undefined;
    }
    return el;
  };

  this.getItemSource = function(item) {
    if (item === undefined) {
      var nodes = list.list.childNodes,
        items = [];

      for (var i = 0, il = nodes.length; i < il; i++) {
        // Only textnodes have a data attribute
        if (nodes[i].data === undefined) {
          return nodes[i].cloneNode(true);
        }
      }
    } else if (/<tr[\s>]/g.exec(item)) {
      var tbody = document.createElement('tbody');
      tbody.innerHTML = item;
      return tbody.firstChild;
    } else if (item.indexOf("<") !== -1) {
      var div = document.createElement('div');
      div.innerHTML = item;
      return div.firstChild;
    } else {
      var source = document.getElementById(list.item);
      if (source) {
        return source;
      }
    }
    return undefined;
  };

  this.get = function(item, valueNames) {
    templater.create(item);
    var values = {};
    for(var i = 0, il = valueNames.length; i < il; i++) {
      var elm;
      if (valueNames[i].data) {
        for (var j = 0, jl = valueNames[i].data.length; j < jl; j++) {
          values[valueNames[i].data[j]] = list.utils.getAttribute(item.elm, 'data-'+valueNames[i].data[j]);
        }
      } else if (valueNames[i].attr && valueNames[i].name) {
        elm = list.utils.getByClass(item.elm, valueNames[i].name, true);
        values[valueNames[i].name] = elm ? list.utils.getAttribute(elm, valueNames[i].attr) : "";
      } else {
        elm = list.utils.getByClass(item.elm, valueNames[i], true);
        values[valueNames[i]] = elm ? elm.innerHTML : "";
      }
      elm = undefined;
    }
    return values;
  };

  this.set = function(item, values) {
    var getValueName = function(name) {
      for (var i = 0, il = list.valueNames.length; i < il; i++) {
        if (list.valueNames[i].data) {
          var data = list.valueNames[i].data;
          for (var j = 0, jl = data.length; j < jl; j++) {
            if (data[j] === name) {
              return { data: name };
            }
          }
        } else if (list.valueNames[i].attr && list.valueNames[i].name && list.valueNames[i].name == name) {
          return list.valueNames[i];
        } else if (list.valueNames[i] === name) {
          return name;
        }
      }
    };
    var setValue = function(name, value) {
      var elm;
      var valueName = getValueName(name);
      if (!valueName)
        return;
      if (valueName.data) {
        item.elm.setAttribute('data-'+valueName.data, value);
      } else if (valueName.attr && valueName.name) {
        elm = list.utils.getByClass(item.elm, valueName.name, true);
        if (elm) {
          elm.setAttribute(valueName.attr, value);
        }
      } else {
        elm = list.utils.getByClass(item.elm, valueName, true);
        if (elm) {
          elm.innerHTML = value;
        }
      }
      elm = undefined;
    };
    if (!templater.create(item)) {
      for(var v in values) {
        if (values.hasOwnProperty(v)) {
          setValue(v, values[v]);
        }
      }
    }
  };

  this.create = function(item) {
    if (item.elm !== undefined) {
      return false;
    }
    if (itemSource === undefined) {
      throw new Error("The list need to have at list one item on init otherwise you'll have to add a template.");
    }
    /* If item source does not exists, use the first item in list as
    source for new items */
    var newItem = itemSource.cloneNode(true);
    newItem.removeAttribute('id');
    item.elm = newItem;
    templater.set(item, item.values());
    return true;
  };
  this.remove = function(item) {
    if (item.elm.parentNode === list.list) {
      list.list.removeChild(item.elm);
    }
  };
  this.show = function(item) {
    templater.create(item);
    list.list.appendChild(item.elm);
  };
  this.hide = function(item) {
    if (item.elm !== undefined && item.elm.parentNode === list.list) {
      list.list.removeChild(item.elm);
    }
  };
  this.clear = function() {
    /* .innerHTML = ''; fucks up IE */
    if (list.list.hasChildNodes()) {
      while (list.list.childNodes.length >= 1)
      {
        list.list.removeChild(list.list.firstChild);
      }
    }
  };

  init();
};

module.exports = function(list) {
  return new Templater(list);
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/classes.js":
/*!*****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/classes.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Module dependencies.
 */

var index = __webpack_require__(/*! ./index-of */ "../../../../build/node_modules/list.js/src/utils/index-of.js");

/**
 * Whitespace regexp.
 */

var re = /\s+/;

/**
 * toString reference.
 */

var toString = Object.prototype.toString;

/**
 * Wrap `el` in a `ClassList`.
 *
 * @param {Element} el
 * @return {ClassList}
 * @api public
 */

module.exports = function(el){
  return new ClassList(el);
};

/**
 * Initialize a new ClassList for `el`.
 *
 * @param {Element} el
 * @api private
 */

function ClassList(el) {
  if (!el || !el.nodeType) {
    throw new Error('A DOM element reference is required');
  }
  this.el = el;
  this.list = el.classList;
}

/**
 * Add class `name` if not already present.
 *
 * @param {String} name
 * @return {ClassList}
 * @api public
 */

ClassList.prototype.add = function(name){
  // classList
  if (this.list) {
    this.list.add(name);
    return this;
  }

  // fallback
  var arr = this.array();
  var i = index(arr, name);
  if (!~i) arr.push(name);
  this.el.className = arr.join(' ');
  return this;
};

/**
 * Remove class `name` when present, or
 * pass a regular expression to remove
 * any which match.
 *
 * @param {String|RegExp} name
 * @return {ClassList}
 * @api public
 */

ClassList.prototype.remove = function(name){
  // classList
  if (this.list) {
    this.list.remove(name);
    return this;
  }

  // fallback
  var arr = this.array();
  var i = index(arr, name);
  if (~i) arr.splice(i, 1);
  this.el.className = arr.join(' ');
  return this;
};


/**
 * Toggle class `name`, can force state via `force`.
 *
 * For browsers that support classList, but do not support `force` yet,
 * the mistake will be detected and corrected.
 *
 * @param {String} name
 * @param {Boolean} force
 * @return {ClassList}
 * @api public
 */

ClassList.prototype.toggle = function(name, force){
  // classList
  if (this.list) {
    if ("undefined" !== typeof force) {
      if (force !== this.list.toggle(name, force)) {
        this.list.toggle(name); // toggle again to correct
      }
    } else {
      this.list.toggle(name);
    }
    return this;
  }

  // fallback
  if ("undefined" !== typeof force) {
    if (!force) {
      this.remove(name);
    } else {
      this.add(name);
    }
  } else {
    if (this.has(name)) {
      this.remove(name);
    } else {
      this.add(name);
    }
  }

  return this;
};

/**
 * Return an array of classes.
 *
 * @return {Array}
 * @api public
 */

ClassList.prototype.array = function(){
  var className = this.el.getAttribute('class') || '';
  var str = className.replace(/^\s+|\s+$/g, '');
  var arr = str.split(re);
  if ('' === arr[0]) arr.shift();
  return arr;
};

/**
 * Check if class `name` is present.
 *
 * @param {String} name
 * @return {ClassList}
 * @api public
 */

ClassList.prototype.has =
ClassList.prototype.contains = function(name){
  return this.list ? this.list.contains(name) : !! ~index(this.array(), name);
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/events.js":
/*!****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/events.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var bind = window.addEventListener ? 'addEventListener' : 'attachEvent',
    unbind = window.removeEventListener ? 'removeEventListener' : 'detachEvent',
    prefix = bind !== 'addEventListener' ? 'on' : '',
    toArray = __webpack_require__(/*! ./to-array */ "../../../../build/node_modules/list.js/src/utils/to-array.js");

/**
 * Bind `el` event `type` to `fn`.
 *
 * @param {Element} el, NodeList, HTMLCollection or Array
 * @param {String} type
 * @param {Function} fn
 * @param {Boolean} capture
 * @api public
 */

exports.bind = function(el, type, fn, capture){
  el = toArray(el);
  for ( var i = 0; i < el.length; i++ ) {
    el[i][bind](prefix + type, fn, capture || false);
  }
};

/**
 * Unbind `el` event `type`'s callback `fn`.
 *
 * @param {Element} el, NodeList, HTMLCollection or Array
 * @param {String} type
 * @param {Function} fn
 * @param {Boolean} capture
 * @api public
 */

exports.unbind = function(el, type, fn, capture){
  el = toArray(el);
  for ( var i = 0; i < el.length; i++ ) {
    el[i][unbind](prefix + type, fn, capture || false);
  }
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/extend.js":
/*!****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/extend.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
 * Source: https://github.com/segmentio/extend
 */

module.exports = function extend (object) {
    // Takes an unlimited number of extenders.
    var args = Array.prototype.slice.call(arguments, 1);

    // For each extender, copy their properties on our object.
    for (var i = 0, source; source = args[i]; i++) {
        if (!source) continue;
        for (var property in source) {
            object[property] = source[property];
        }
    }

    return object;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/fuzzy.js":
/*!***************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/fuzzy.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(text, pattern, options) {
    // Aproximately where in the text is the pattern expected to be found?
    var Match_Location = options.location || 0;

    //Determines how close the match must be to the fuzzy location (specified above). An exact letter match which is 'distance' characters away from the fuzzy location would score as a complete mismatch. A distance of '0' requires the match be at the exact location specified, a threshold of '1000' would require a perfect match to be within 800 characters of the fuzzy location to be found using a 0.8 threshold.
    var Match_Distance = options.distance || 100;

    // At what point does the match algorithm give up. A threshold of '0.0' requires a perfect match (of both letters and location), a threshold of '1.0' would match anything.
    var Match_Threshold = options.threshold || 0.4;

    if (pattern === text) return true; // Exact match
    if (pattern.length > 32) return false; // This algorithm cannot be used

    // Set starting location at beginning text and initialise the alphabet.
    var loc = Match_Location,
        s = (function() {
            var q = {},
                i;

            for (i = 0; i < pattern.length; i++) {
                q[pattern.charAt(i)] = 0;
            }

            for (i = 0; i < pattern.length; i++) {
                q[pattern.charAt(i)] |= 1 << (pattern.length - i - 1);
            }

            return q;
        }());

    // Compute and return the score for a match with e errors and x location.
    // Accesses loc and pattern through being a closure.

    function match_bitapScore_(e, x) {
        var accuracy = e / pattern.length,
            proximity = Math.abs(loc - x);

        if (!Match_Distance) {
            // Dodge divide by zero error.
            return proximity ? 1.0 : accuracy;
        }
        return accuracy + (proximity / Match_Distance);
    }

    var score_threshold = Match_Threshold, // Highest score beyond which we give up.
        best_loc = text.indexOf(pattern, loc); // Is there a nearby exact match? (speedup)

    if (best_loc != -1) {
        score_threshold = Math.min(match_bitapScore_(0, best_loc), score_threshold);
        // What about in the other direction? (speedup)
        best_loc = text.lastIndexOf(pattern, loc + pattern.length);

        if (best_loc != -1) {
            score_threshold = Math.min(match_bitapScore_(0, best_loc), score_threshold);
        }
    }

    // Initialise the bit arrays.
    var matchmask = 1 << (pattern.length - 1);
    best_loc = -1;

    var bin_min, bin_mid;
    var bin_max = pattern.length + text.length;
    var last_rd;
    for (var d = 0; d < pattern.length; d++) {
        // Scan for the best match; each iteration allows for one more error.
        // Run a binary search to determine how far from 'loc' we can stray at this
        // error level.
        bin_min = 0;
        bin_mid = bin_max;
        while (bin_min < bin_mid) {
            if (match_bitapScore_(d, loc + bin_mid) <= score_threshold) {
                bin_min = bin_mid;
            } else {
                bin_max = bin_mid;
            }
            bin_mid = Math.floor((bin_max - bin_min) / 2 + bin_min);
        }
        // Use the result from this iteration as the maximum for the next.
        bin_max = bin_mid;
        var start = Math.max(1, loc - bin_mid + 1);
        var finish = Math.min(loc + bin_mid, text.length) + pattern.length;

        var rd = Array(finish + 2);
        rd[finish + 1] = (1 << d) - 1;
        for (var j = finish; j >= start; j--) {
            // The alphabet (s) is a sparse hash, so the following line generates
            // warnings.
            var charMatch = s[text.charAt(j - 1)];
            if (d === 0) {    // First pass: exact match.
                rd[j] = ((rd[j + 1] << 1) | 1) & charMatch;
            } else {    // Subsequent passes: fuzzy match.
                rd[j] = (((rd[j + 1] << 1) | 1) & charMatch) |
                                (((last_rd[j + 1] | last_rd[j]) << 1) | 1) |
                                last_rd[j + 1];
            }
            if (rd[j] & matchmask) {
                var score = match_bitapScore_(d, j - 1);
                // This match will almost certainly be better than any existing match.
                // But check anyway.
                if (score <= score_threshold) {
                    // Told you so.
                    score_threshold = score;
                    best_loc = j - 1;
                    if (best_loc > loc) {
                        // When passing loc, don't exceed our current distance from loc.
                        start = Math.max(1, 2 * loc - best_loc);
                    } else {
                        // Already passed loc, downhill from here on in.
                        break;
                    }
                }
            }
        }
        // No hope for a (better) match at greater error levels.
        if (match_bitapScore_(d + 1, loc) > score_threshold) {
            break;
        }
        last_rd = rd;
    }

    return (best_loc < 0) ? false : true;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/get-attribute.js":
/*!***********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/get-attribute.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A cross-browser implementation of getAttribute.
 * Source found here: http://stackoverflow.com/a/3755343/361337 written by Vivin Paliath
 *
 * Return the value for `attr` at `element`.
 *
 * @param {Element} el
 * @param {String} attr
 * @api public
 */

module.exports = function(el, attr) {
  var result = (el.getAttribute && el.getAttribute(attr)) || null;
  if( !result ) {
    var attrs = el.attributes;
    var length = attrs.length;
    for(var i = 0; i < length; i++) {
      if (attr[i] !== undefined) {
        if(attr[i].nodeName === attr) {
          result = attr[i].nodeValue;
        }
      }
    }
  }
  return result;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/get-by-class.js":
/*!**********************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/get-by-class.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A cross-browser implementation of getElementsByClass.
 * Heavily based on Dustin Diaz's function: http://dustindiaz.com/getelementsbyclass.
 *
 * Find all elements with class `className` inside `container`.
 * Use `single = true` to increase performance in older browsers
 * when only one element is needed.
 *
 * @param {String} className
 * @param {Element} container
 * @param {Boolean} single
 * @api public
 */

var getElementsByClassName = function(container, className, single) {
  if (single) {
    return container.getElementsByClassName(className)[0];
  } else {
    return container.getElementsByClassName(className);
  }
};

var querySelector = function(container, className, single) {
  className = '.' + className;
  if (single) {
    return container.querySelector(className);
  } else {
    return container.querySelectorAll(className);
  }
};

var polyfill = function(container, className, single) {
  var classElements = [],
    tag = '*';

  var els = container.getElementsByTagName(tag);
  var elsLen = els.length;
  var pattern = new RegExp("(^|\\s)"+className+"(\\s|$)");
  for (var i = 0, j = 0; i < elsLen; i++) {
    if ( pattern.test(els[i].className) ) {
      if (single) {
        return els[i];
      } else {
        classElements[j] = els[i];
        j++;
      }
    }
  }
  return classElements;
};

module.exports = (function() {
  return function(container, className, single, options) {
    options = options || {};
    if ((options.test && options.getElementsByClassName) || (!options.test && document.getElementsByClassName)) {
      return getElementsByClassName(container, className, single);
    } else if ((options.test && options.querySelector) || (!options.test && document.querySelector)) {
      return querySelector(container, className, single);
    } else {
      return polyfill(container, className, single);
    }
  };
})();


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/index-of.js":
/*!******************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/index-of.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var indexOf = [].indexOf;

module.exports = function(arr, obj){
  if (indexOf) return arr.indexOf(obj);
  for (var i = 0; i < arr.length; ++i) {
    if (arr[i] === obj) return i;
  }
  return -1;
};


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/to-array.js":
/*!******************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/to-array.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Source: https://github.com/timoxley/to-array
 *
 * Convert an array-like object into an `Array`.
 * If `collection` is already an `Array`, then will return a clone of `collection`.
 *
 * @param {Array | Mixed} collection An `Array` or array-like object to convert e.g. `arguments` or `NodeList`
 * @return {Array} Naive conversion of `collection` to a new `Array`.
 * @api public
 */

module.exports = function toArray(collection) {
  if (typeof collection === 'undefined') return [];
  if (collection === null) return [null];
  if (collection === window) return [window];
  if (typeof collection === 'string') return [collection];
  if (isArray(collection)) return collection;
  if (typeof collection.length != 'number') return [collection];
  if (typeof collection === 'function' && collection instanceof Function) return [collection];

  var arr = [];
  for (var i = 0; i < collection.length; i++) {
    if (Object.prototype.hasOwnProperty.call(collection, i) || i in collection) {
      arr.push(collection[i]);
    }
  }
  if (!arr.length) return [];
  return arr;
};

function isArray(arr) {
  return Object.prototype.toString.call(arr) === "[object Array]";
}


/***/ }),

/***/ "../../../../build/node_modules/list.js/src/utils/to-string.js":
/*!*******************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/list.js/src/utils/to-string.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(s) {
  s = (s === undefined) ? "" : s;
  s = (s === null) ? "" : s;
  s = s.toString();
  return s;
};


/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--3-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/less-loader/dist/cjs.js??ref--3-2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--3-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/less-loader/dist/cjs.js??ref--3-2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--3-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/less-loader/dist/cjs.js??ref--3-2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--3-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/less-loader/dist/cjs.js??ref--3-2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--3-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/less-loader/dist/cjs.js??ref--3-2!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/mini-css-extract-plugin/dist/loader.js!/var/www/eventgallery/build/node_modules/css-loader/dist/cjs.js??ref--4-1!/var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "../../../../build/node_modules/process/browser.js":
/*!*******************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/process/browser.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "../../../../build/node_modules/setimmediate/setImmediate.js":
/*!*****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/setimmediate/setImmediate.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, process) {(function (global, undefined) {
    "use strict";

    if (global.setImmediate) {
        return;
    }

    var nextHandle = 1; // Spec says greater than zero
    var tasksByHandle = {};
    var currentlyRunningATask = false;
    var doc = global.document;
    var registerImmediate;

    function setImmediate(callback) {
      // Callback can either be a function or a string
      if (typeof callback !== "function") {
        callback = new Function("" + callback);
      }
      // Copy function arguments
      var args = new Array(arguments.length - 1);
      for (var i = 0; i < args.length; i++) {
          args[i] = arguments[i + 1];
      }
      // Store and register the task
      var task = { callback: callback, args: args };
      tasksByHandle[nextHandle] = task;
      registerImmediate(nextHandle);
      return nextHandle++;
    }

    function clearImmediate(handle) {
        delete tasksByHandle[handle];
    }

    function run(task) {
        var callback = task.callback;
        var args = task.args;
        switch (args.length) {
        case 0:
            callback();
            break;
        case 1:
            callback(args[0]);
            break;
        case 2:
            callback(args[0], args[1]);
            break;
        case 3:
            callback(args[0], args[1], args[2]);
            break;
        default:
            callback.apply(undefined, args);
            break;
        }
    }

    function runIfPresent(handle) {
        // From the spec: "Wait until any invocations of this algorithm started before this one have completed."
        // So if we're currently running a task, we'll need to delay this invocation.
        if (currentlyRunningATask) {
            // Delay by doing a setTimeout. setImmediate was tried instead, but in Firefox 7 it generated a
            // "too much recursion" error.
            setTimeout(runIfPresent, 0, handle);
        } else {
            var task = tasksByHandle[handle];
            if (task) {
                currentlyRunningATask = true;
                try {
                    run(task);
                } finally {
                    clearImmediate(handle);
                    currentlyRunningATask = false;
                }
            }
        }
    }

    function installNextTickImplementation() {
        registerImmediate = function(handle) {
            process.nextTick(function () { runIfPresent(handle); });
        };
    }

    function canUsePostMessage() {
        // The test against `importScripts` prevents this implementation from being installed inside a web worker,
        // where `global.postMessage` means something completely different and can't be used for this purpose.
        if (global.postMessage && !global.importScripts) {
            var postMessageIsAsynchronous = true;
            var oldOnMessage = global.onmessage;
            global.onmessage = function() {
                postMessageIsAsynchronous = false;
            };
            global.postMessage("", "*");
            global.onmessage = oldOnMessage;
            return postMessageIsAsynchronous;
        }
    }

    function installPostMessageImplementation() {
        // Installs an event handler on `global` for the `message` event: see
        // * https://developer.mozilla.org/en/DOM/window.postMessage
        // * http://www.whatwg.org/specs/web-apps/current-work/multipage/comms.html#crossDocumentMessages

        var messagePrefix = "setImmediate$" + Math.random() + "$";
        var onGlobalMessage = function(event) {
            if (event.source === global &&
                typeof event.data === "string" &&
                event.data.indexOf(messagePrefix) === 0) {
                runIfPresent(+event.data.slice(messagePrefix.length));
            }
        };

        if (global.addEventListener) {
            global.addEventListener("message", onGlobalMessage, false);
        } else {
            global.attachEvent("onmessage", onGlobalMessage);
        }

        registerImmediate = function(handle) {
            global.postMessage(messagePrefix + handle, "*");
        };
    }

    function installMessageChannelImplementation() {
        var channel = new MessageChannel();
        channel.port1.onmessage = function(event) {
            var handle = event.data;
            runIfPresent(handle);
        };

        registerImmediate = function(handle) {
            channel.port2.postMessage(handle);
        };
    }

    function installReadyStateChangeImplementation() {
        var html = doc.documentElement;
        registerImmediate = function(handle) {
            // Create a <script> element; its readystatechange event will be fired asynchronously once it is inserted
            // into the document. Do so, thus queuing up the task. Remember to clean up once it's been called.
            var script = doc.createElement("script");
            script.onreadystatechange = function () {
                runIfPresent(handle);
                script.onreadystatechange = null;
                html.removeChild(script);
                script = null;
            };
            html.appendChild(script);
        };
    }

    function installSetTimeoutImplementation() {
        registerImmediate = function(handle) {
            setTimeout(runIfPresent, 0, handle);
        };
    }

    // If supported, we should attach to the prototype of global, since that is where setTimeout et al. live.
    var attachTo = Object.getPrototypeOf && Object.getPrototypeOf(global);
    attachTo = attachTo && attachTo.setTimeout ? attachTo : global;

    // Don't get fooled by e.g. browserify environments.
    if ({}.toString.call(global.process) === "[object process]") {
        // For Node.js before 0.9
        installNextTickImplementation();

    } else if (canUsePostMessage()) {
        // For non-IE10 modern browsers
        installPostMessageImplementation();

    } else if (global.MessageChannel) {
        // For web workers, where supported
        installMessageChannelImplementation();

    } else if (doc && "onreadystatechange" in doc.createElement("script")) {
        // For IE 6–8
        installReadyStateChangeImplementation();

    } else {
        // For older browsers
        installSetTimeoutImplementation();
    }

    attachTo.setImmediate = setImmediate;
    attachTo.clearImmediate = clearImmediate;
}(typeof self === "undefined" ? typeof global === "undefined" ? this : global : self));

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "../../../../build/node_modules/webpack/buildin/global.js"), __webpack_require__(/*! ./../process/browser.js */ "../../../../build/node_modules/process/browser.js")))

/***/ }),

/***/ "../../../../build/node_modules/string-natural-compare/natural-compare.js":
/*!******************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/string-natural-compare/natural-compare.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var alphabet;
var alphabetIndexMap;
var alphabetIndexMapLength = 0;

function isNumberCode(code) {
  return code >= 48 && code <= 57;
}

function naturalCompare(a, b) {
  var lengthA = (a += '').length;
  var lengthB = (b += '').length;
  var aIndex = 0;
  var bIndex = 0;

  while (aIndex < lengthA && bIndex < lengthB) {
    var charCodeA = a.charCodeAt(aIndex);
    var charCodeB = b.charCodeAt(bIndex);

    if (isNumberCode(charCodeA)) {
      if (!isNumberCode(charCodeB)) {
        return charCodeA - charCodeB;
      }

      var numStartA = aIndex;
      var numStartB = bIndex;

      while (charCodeA === 48 && ++numStartA < lengthA) {
        charCodeA = a.charCodeAt(numStartA);
      }
      while (charCodeB === 48 && ++numStartB < lengthB) {
        charCodeB = b.charCodeAt(numStartB);
      }

      var numEndA = numStartA;
      var numEndB = numStartB;

      while (numEndA < lengthA && isNumberCode(a.charCodeAt(numEndA))) {
        ++numEndA;
      }
      while (numEndB < lengthB && isNumberCode(b.charCodeAt(numEndB))) {
        ++numEndB;
      }

      var difference = numEndA - numStartA - numEndB + numStartB; // numA length - numB length
      if (difference) {
        return difference;
      }

      while (numStartA < numEndA) {
        difference = a.charCodeAt(numStartA++) - b.charCodeAt(numStartB++);
        if (difference) {
          return difference;
        }
      }

      aIndex = numEndA;
      bIndex = numEndB;
      continue;
    }

    if (charCodeA !== charCodeB) {
      if (
        charCodeA < alphabetIndexMapLength &&
        charCodeB < alphabetIndexMapLength &&
        alphabetIndexMap[charCodeA] !== -1 &&
        alphabetIndexMap[charCodeB] !== -1
      ) {
        return alphabetIndexMap[charCodeA] - alphabetIndexMap[charCodeB];
      }

      return charCodeA - charCodeB;
    }

    ++aIndex;
    ++bIndex;
  }

  if (aIndex >= lengthA && bIndex < lengthB && lengthA >= lengthB) {
    return -1;
  }

  if (bIndex >= lengthB && aIndex < lengthA && lengthB >= lengthA) {
    return 1;
  }

  return lengthA - lengthB;
}

naturalCompare.caseInsensitive = naturalCompare.i = function(a, b) {
  return naturalCompare(('' + a).toLowerCase(), ('' + b).toLowerCase());
};

Object.defineProperties(naturalCompare, {
  alphabet: {
    get: function() {
      return alphabet;
    },

    set: function(value) {
      alphabet = value;
      alphabetIndexMap = [];

      var i = 0;

      if (alphabet) {
        for (; i < alphabet.length; i++) {
          alphabetIndexMap[alphabet.charCodeAt(i)] = i;
        }
      }

      alphabetIndexMapLength = alphabetIndexMap.length;

      for (i = 0; i < alphabetIndexMapLength; i++) {
        if (alphabetIndexMap[i] === undefined) {
          alphabetIndexMap[i] = -1;
        }
      }
    },
  },
});

module.exports = naturalCompare;


/***/ }),

/***/ "../../../../build/node_modules/timers-browserify/main.js":
/*!**************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/timers-browserify/main.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var scope = (typeof global !== "undefined" && global) ||
            (typeof self !== "undefined" && self) ||
            window;
var apply = Function.prototype.apply;

// DOM APIs, for completeness

exports.setTimeout = function() {
  return new Timeout(apply.call(setTimeout, scope, arguments), clearTimeout);
};
exports.setInterval = function() {
  return new Timeout(apply.call(setInterval, scope, arguments), clearInterval);
};
exports.clearTimeout =
exports.clearInterval = function(timeout) {
  if (timeout) {
    timeout.close();
  }
};

function Timeout(id, clearFn) {
  this._id = id;
  this._clearFn = clearFn;
}
Timeout.prototype.unref = Timeout.prototype.ref = function() {};
Timeout.prototype.close = function() {
  this._clearFn.call(scope, this._id);
};

// Does not start the time, just sets up the members needed.
exports.enroll = function(item, msecs) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = msecs;
};

exports.unenroll = function(item) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = -1;
};

exports._unrefActive = exports.active = function(item) {
  clearTimeout(item._idleTimeoutId);

  var msecs = item._idleTimeout;
  if (msecs >= 0) {
    item._idleTimeoutId = setTimeout(function onTimeout() {
      if (item._onTimeout)
        item._onTimeout();
    }, msecs);
  }
};

// setimmediate attaches itself to the global object
__webpack_require__(/*! setimmediate */ "../../../../build/node_modules/setimmediate/setImmediate.js");
// On some exotic environments, it's not clear which object `setimmediate` was
// able to install onto.  Search each possibility in the same order as the
// `setimmediate` library.
exports.setImmediate = (typeof self !== "undefined" && self.setImmediate) ||
                       (typeof global !== "undefined" && global.setImmediate) ||
                       (this && this.setImmediate);
exports.clearImmediate = (typeof self !== "undefined" && self.clearImmediate) ||
                         (typeof global !== "undefined" && global.clearImmediate) ||
                         (this && this.clearImmediate);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "../../../../build/node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "Cacheclear" } },
    [
      _c("div", [
        _vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_CLEAR_CACHE_START_DESC")))
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "control-group" }, [
        _c("div", { staticClass: "controls" }, [
          _c("div", { staticClass: "btn-group sync-buttons" }, [
            _c(
              "button",
              { staticClass: "btn checkall", on: { click: _vm.checkAll } },
              [
                _vm._v(
                  _vm._s(_vm.i18n.t("COM_EVENTGALLERY_CLEAR_CACHE_CHECK_ALL"))
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "button",
              { staticClass: "btn", on: { click: _vm.uncheckAll } },
              [
                _vm._v(
                  _vm._s(_vm.i18n.t("COM_EVENTGALLERY_CLEAR_CACHE_CHECK_NONE"))
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-warning",
                attrs: { disabled: !_vm.running },
                on: { click: _vm.stopQueue }
              },
              [
                _vm._v(
                  _vm._s(_vm.i18n.t("COM_EVENTGALLERY_CLEAR_CACHE_STOP_QUEUE"))
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-danger",
                attrs: {
                  disabled: _vm.running || !_vm.isReadyForCacheDeletion
                },
                on: { click: _vm.clearCache }
              },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_CLEAR_CACHE_START")))]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm.numberOfTasks > 0
        ? _c("Progress", {
            attrs: {
              remaining: _vm.numberOfTasks,
              total: _vm.numberOfLastQueuePush
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _c("Groups", {
        attrs: {
          groups: _vm.groups,
          elements: _vm.elements,
          blocked: _vm.running
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.sortedElements.length > 0
    ? _c("div", [
        _c("h2", [_vm._v(_vm._s(_vm.group.displayname))]),
        _vm._v(" "),
        _c(
          "ul",
          { staticClass: "elements" },
          [
            _vm._l(_vm.sortedElements, function(element) {
              return [
                _c(
                  "li",
                  {
                    key: element.value,
                    on: {
                      click: function($event) {
                        element.checked = !element.checked
                      }
                    }
                  },
                  [
                    _c("div", { staticClass: "checkbox" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: element.checked,
                            expression: "element.checked"
                          }
                        ],
                        attrs: { type: "checkbox" },
                        domProps: {
                          checked: Array.isArray(element.checked)
                            ? _vm._i(element.checked, null) > -1
                            : element.checked
                        },
                        on: {
                          change: function($event) {
                            var $$a = element.checked,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = null,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 &&
                                  _vm.$set(
                                    element,
                                    "checked",
                                    $$a.concat([$$v])
                                  )
                              } else {
                                $$i > -1 &&
                                  _vm.$set(
                                    element,
                                    "checked",
                                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                  )
                              }
                            } else {
                              _vm.$set(element, "checked", $$c)
                            }
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "description" }, [
                      _vm._v("\n                " + _vm._s(element.name) + " "),
                      _c("span", { staticClass: "filecount" }, [
                        _vm._v(
                          "(" +
                            _vm._s(element.count) +
                            " / " +
                            _vm._s(element.size) +
                            ")"
                        )
                      ])
                    ])
                  ]
                )
              ]
            })
          ],
          2
        )
      ])
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "groups", class: { blocked: _vm.blocked } },
    _vm._l(_vm.groups, function(group) {
      return _c("Elements", {
        key: group.value,
        attrs: { group: group, elements: _vm.elements }
      })
    }),
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.errorMessages.length > 0 || _vm.failedFolders.length > 0
    ? _c(
        "div",
        { attrs: { id: "errorMessages" } },
        [
          _c("h2", [_vm._v(_vm._s(_vm.headline))]),
          _vm._v(" "),
          _vm.errorMessages.length > 0
            ? _c(
                "pre",
                [
                  _vm._l(_vm.reversedErrorMessages, function(message) {
                    return [_vm._v(_vm._s(message))]
                  })
                ],
                2
              )
            : _vm._e(),
          _vm._v(" "),
          _vm._l(_vm.failedFolders, function(failedFolder) {
            return _c("div", [
              _vm._v("\n        " + _vm._s(failedFolder.error) + "\n    ")
            ])
          })
        ],
        2
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "li",
    {
      style: { backgroundColor: _vm.backgroundColor },
      on: {
        click: function($event) {
          _vm.folder.checked = !_vm.folder.checked
        }
      }
    },
    [
      _c("div", [
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.folder.checked,
              expression: "folder.checked"
            }
          ],
          attrs: { type: "checkbox" },
          domProps: {
            checked: Array.isArray(_vm.folder.checked)
              ? _vm._i(_vm.folder.checked, null) > -1
              : _vm.folder.checked
          },
          on: {
            change: function($event) {
              var $$a = _vm.folder.checked,
                $$el = $event.target,
                $$c = $$el.checked ? true : false
              if (Array.isArray($$a)) {
                var $$v = null,
                  $$i = _vm._i($$a, $$v)
                if ($$el.checked) {
                  $$i < 0 && _vm.$set(_vm.folder, "checked", $$a.concat([$$v]))
                } else {
                  $$i > -1 &&
                    _vm.$set(
                      _vm.folder,
                      "checked",
                      $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                    )
                }
              } else {
                _vm.$set(_vm.folder, "checked", $$c)
              }
            }
          }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "description" }, [
        _c("div", [_vm._v(_vm._s(_vm.folder.foldername))]),
        _vm._v(" "),
        _c("div", [_c("strong", [_vm._v(_vm._s(_vm.status))])]),
        _vm._v(" "),
        _vm.folder.files
          ? _c("div", { staticClass: "filecount" }, [
              _vm._v(
                "(" +
                  _vm._s(_vm.numberOfFilesLeft) +
                  " / " +
                  _vm._s(_vm.folder.files.length) +
                  " " +
                  _vm._s(_vm.i18n_labelNeedSync) +
                  ")"
              )
            ])
          : _vm._e()
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "ul",
    { staticClass: "folders", class: { blocked: _vm.blocked } },
    _vm._l(_vm.sortedFolders, function(folder) {
      return _c("folder", {
        key: folder.foldername,
        attrs: {
          folder: folder,
          "i18n_label-need-sync": _vm.i18n_labelNeedSync
        }
      })
    }),
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c("ul", { staticClass: "progressbar" }, [
      _c("li", { class: { active: true } }, [
        _c("span", { staticClass: "title" }, [
          _vm._v(_vm._s(_vm.i18n_labelStep1))
        ])
      ]),
      _vm._v(" "),
      _c("li", { class: { active: _vm.numberOfSelectedFolders > 0 } }, [
        _c("span", { staticClass: "title" }, [
          _vm._v(_vm._s(_vm.i18n_labelStep2))
        ]),
        _vm._v(" "),
        _vm.numberOfSelectedFolders === 0
          ? _c("span", [_vm._v(_vm._s(_vm.i18n_hintStep2))])
          : _vm._e(),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "btn btn-primary sync-folders",
            attrs: {
              disabled: _vm.running || _vm.numberOfSelectedFolders === 0
            },
            on: {
              click: function($event) {
                return _vm.$emit("sync-folders")
              }
            }
          },
          [
            _vm._v(
              _vm._s(_vm.i18n_labelButtonStep2) +
                " (" +
                _vm._s(_vm.numberOfSelectedFolders) +
                " " +
                _vm._s(_vm.i18n_labelItemsStep2) +
                ")"
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c("li", { class: { active: _vm.isReadyForSyncFiles > 0 } }, [
        _c("span", { staticClass: "title" }, [
          _vm._v(_vm._s(_vm.i18n_labelStep3))
        ]),
        _vm._v(" "),
        _vm.isReadyForSyncFiles
          ? _c("span", [_vm._v(_vm._s(_vm.i18n_hintStep3))])
          : _vm._e(),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "btn btn-primary sync-files",
            attrs: { disabled: _vm.running || !_vm.isReadyForSyncFiles },
            on: {
              click: function($event) {
                return _vm.$emit("sync-files")
              }
            }
          },
          [
            _vm._v(
              _vm._s(_vm.i18n_labelButtonStep3) +
                " (" +
                _vm._s(_vm.numberOfSelectedFiles) +
                " " +
                _vm._s(_vm.i18n_labelItemsStep3) +
                ")"
            )
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "eg-progressbar" }, [
    _c(
      "div",
      {
        staticClass: "eg-progressbar-state",
        style: { width: _vm.progress + "%" }
      },
      [_vm.remaining > 0 ? void 0 : _vm._e()],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "Filesync" } },
    [
      _c("ErrorPanel", {
        attrs: {
          "error-messages": _vm.errorMessages,
          "failed-folders": _vm.failedFolders,
          headline: _vm.i18n.t("COM_EVENTGALLERY_SYNC_ERROR_HEADLINE")
        }
      }),
      _vm._v(" "),
      _c("ProcessSteps", {
        attrs: {
          i18n: _vm.i18n,
          "number-of-selected-files": _vm.numberOfSyncableFiles,
          "number-of-selected-folders": _vm.selectedFolders.length,
          "is-ready-for-sync-files": _vm.isSyncFilesProcessReadyToStart,
          running: _vm.running,
          "i18n_label-step1": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP1"),
          "i18n_label-step2": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP2"),
          "i18n_label-items-step2": _vm.i18n.t(
            "COM_EVENTGALLERY_SYNC_STEP2_ITEMS"
          ),
          "i18n_label-step3": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP3"),
          "i18n_label-items-step3": _vm.i18n.t(
            "COM_EVENTGALLERY_SYNC_STEP3_ITEMS"
          ),
          "i18n_hint-step2": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP2_HINT"),
          "i18n_hint-step3": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP3_HINT"),
          "i18n_label-button-step2": _vm.i18n.t(
            "COM_EVENTGALLERY_SYNC_STEP2_BUTTON_LABEL"
          ),
          "i18n_label-button-step3": _vm.i18n.t(
            "COM_EVENTGALLERY_SYNC_STEP3_BUTTON_LABEL"
          )
        },
        on: { "sync-files": _vm.syncFiles, "sync-folders": _vm.syncFolders }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "control-group" }, [
        _c("div", { staticClass: "controls" }, [
          _c("div", { staticClass: "btn-group sync-buttons" }, [
            _c(
              "button",
              { staticClass: "btn checkall", on: { click: _vm.checkAll } },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_CHECK_ALL")))]
            ),
            _vm._v(" "),
            _c(
              "button",
              { staticClass: "btn", on: { click: _vm.uncheckAll } },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_CHECK_NONE")))]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-warning",
                attrs: { disabled: !_vm.running },
                on: { click: _vm.stopQueue }
              },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_STOP_QUEUE")))]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm.numberOfTasks > 0
        ? _c("Progress", {
            attrs: {
              remaining: _vm.numberOfTasks,
              total: _vm.numberOfLastQueuePush
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _c("Folders", {
        attrs: {
          folders: _vm.folders,
          blocked: _vm.running,
          "i18n_label-need-sync": _vm.i18n.t(
            "COM_EVENTGALLERY_SYNC_OPEN_IMAGES_NEEDS_SYNC"
          )
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("form", [
      _c(
        "div",
        { staticClass: "adminform form-horizontal" },
        [
          _vm._l(_vm.formDefinition.form.fieldset.field, function(field) {
            return [
              field.type === "text"
                ? _c("Input", {
                    attrs: {
                      name: field.name,
                      label: field.label,
                      description: field.description
                    },
                    model: {
                      value: _vm.data[field.name],
                      callback: function($$v) {
                        _vm.$set(_vm.data, field.name, $$v)
                      },
                      expression: "data[field.name]"
                    }
                  })
                : field.type === "list"
                ? _c("Select", {
                    attrs: {
                      name: field.name,
                      label: field.label,
                      description: field.description,
                      options: field.option,
                      "default-value": field.default
                    },
                    model: {
                      value: _vm.data[field.name],
                      callback: function($$v) {
                        _vm.$set(_vm.data, field.name, $$v)
                      },
                      expression: "data[field.name]"
                    }
                  })
                : field.type === "radio"
                ? _c("Radio", {
                    attrs: {
                      name: field.name,
                      label: field.label,
                      description: field.description,
                      options: field.option,
                      "default-value": field.default
                    },
                    model: {
                      value: _vm.data[field.name],
                      callback: function($$v) {
                        _vm.$set(_vm.data, field.name, $$v)
                      },
                      expression: "data[field.name]"
                    }
                  })
                : field.type === "imageselector"
                ? _c("ImageSelector", {
                    attrs: {
                      "load-folders-url": _vm.loadFoldersUrl,
                      "load-files-url": _vm.loadFilesUrl,
                      name: field.name,
                      label: field.label,
                      description: field.description
                    },
                    model: {
                      value: _vm.data.image,
                      callback: function($$v) {
                        _vm.$set(_vm.data, "image", $$v)
                      },
                      expression: "data.image"
                    }
                  })
                : _c("div", [
                    _vm._v("Unsupported form element " + _vm._s(field))
                  ])
            ]
          })
        ],
        2
      ),
      _vm._v(" "),
      _c("pre", { attrs: { id: "imagetagfield" } }, [
        _vm._v(_vm._s(_vm.tagContent))
      ]),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "btn btn-primary",
          on: { click: _vm.insertImageContentTag }
        },
        [
          _vm._v(
            _vm._s(
              _vm.i18n.t("COM_EVENTGALLERY_CONTENTPLUGINBUTTON_BUTTON_INSERT")
            )
          )
        ]
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: !_vm.showImageSelectorState,
            expression: "!showImageSelectorState"
          }
        ]
      },
      [
        _c("div", { staticClass: "control-group" }, [
          _c(
            "div",
            { staticClass: "control-label" },
            [
              _c("Label", {
                attrs: { description: _vm.description, label: _vm.label }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("div", { staticClass: "controls" }, [
            _c(
              "p",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.value.thumb,
                    expression: "value.thumb"
                  }
                ]
              },
              [
                _c("img", {
                  staticStyle: { "max-height": "150px" },
                  attrs: { src: _vm.value.thumb }
                })
              ]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                on: {
                  click: function($event) {
                    $event.preventDefault()
                    return _vm.showImageSelector($event)
                  }
                }
              },
              [_vm._v(_vm._s(_vm.label))]
            )
          ])
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.showImageSelectorState,
            expression: "showImageSelectorState"
          }
        ],
        staticClass: "fullscreenOverlay"
      },
      [
        _c("div", { staticClass: "overlay-content" }, [
          _c("div", { staticClass: "ImageSelector" }, [
            _c("div", { staticClass: "folders" }, [
              _c(
                "button",
                {
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      return _vm.hideImageSelector($event)
                    }
                  }
                },
                [_vm._v("<<")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.folderFilter,
                    expression: "folderFilter"
                  }
                ],
                attrs: { type: "text" },
                domProps: { value: _vm.folderFilter },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.folderFilter = $event.target.value
                  }
                }
              }),
              _vm._v(" "),
              _c(
                "ul",
                _vm._l(_vm.filteredFolders, function(myFolder) {
                  return _c(
                    "li",
                    {
                      key: myFolder.folder,
                      class: { active: myFolder.folder === _vm.folder },
                      on: {
                        click: function($event) {
                          return _vm.loadFiles(myFolder.folder)
                        }
                      }
                    },
                    [_vm._v(_vm._s(myFolder.name))]
                  )
                }),
                0
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "files" }, [
              _c(
                "div",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.isLoading,
                      expression: "isLoading"
                    }
                  ]
                },
                [_c("div", { staticClass: "lds-dual-ring" })]
              ),
              _vm._v(" "),
              _c(
                "ul",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: !_vm.isLoading,
                      expression: "!isLoading"
                    }
                  ]
                },
                _vm._l(_vm.files, function(file) {
                  return _c(
                    "li",
                    {
                      key: file.id,
                      on: {
                        click: function($event) {
                          return _vm.setImage(file)
                        }
                      }
                    },
                    [
                      _c("label", [_vm._v(_vm._s(file.file))]),
                      _vm._v(" "),
                      _c("img", { attrs: { src: file.thumb } })
                    ]
                  )
                }),
                0
              )
            ])
          ])
        ])
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062&":
/*!***********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "control-group" }, [
    _c(
      "div",
      { staticClass: "control-label" },
      [
        _c("Label", {
          attrs: { description: _vm.description, label: _vm.label }
        })
      ],
      1
    ),
    _vm._v(" "),
    _c("div", { staticClass: "controls" }, [
      _c("input", {
        attrs: { name: _vm.name },
        domProps: { value: _vm.value },
        on: {
          input: function($event) {
            return _vm.$emit("input", $event.target.value)
          }
        }
      })
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("label", { staticClass: "eg-tooltip" }, [
    _c("span", { staticClass: "eg-tooltiptext eg-tooltip-right" }, [
      _vm._v(_vm._s(_vm.description))
    ]),
    _vm._v(_vm._s(_vm.label))
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da&":
/*!***********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "control-group" }, [
    _c(
      "div",
      { staticClass: "control-label" },
      [
        _c("Label", {
          attrs: { description: _vm.description, label: _vm.label }
        })
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "controls" },
      _vm._l(_vm.options, function(item) {
        return _c("fieldset", { staticClass: "btn-group" }, [
          _c("label", { staticClass: "radio" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.value,
                  expression: "value"
                }
              ],
              key: item.Id,
              staticClass: "btn",
              attrs: { type: "radio", selected: _vm.value === item.value },
              domProps: {
                value: item.value,
                checked: _vm._q(_vm.value, item.value)
              },
              on: {
                input: function($event) {
                  return _vm.$emit("input", $event.target.value)
                },
                change: function($event) {
                  _vm.value = item.value
                }
              }
            }),
            _vm._v("\n                " + _vm._s(item.text) + "\n            ")
          ])
        ])
      }),
      0
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94&":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94& ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "control-group" }, [
    _c(
      "div",
      { staticClass: "control-label" },
      [
        _c("Label", {
          attrs: { description: _vm.description, label: _vm.label }
        })
      ],
      1
    ),
    _vm._v(" "),
    _c("div", { staticClass: "controls" }, [
      _c(
        "select",
        {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.currentOption,
              expression: "currentOption"
            }
          ],
          on: {
            input: function($event) {
              return _vm.$emit("input", $event.target.value)
            },
            change: function($event) {
              var $$selectedVal = Array.prototype.filter
                .call($event.target.options, function(o) {
                  return o.selected
                })
                .map(function(o) {
                  var val = "_value" in o ? o._value : o.value
                  return val
                })
              _vm.currentOption = $event.target.multiple
                ? $$selectedVal
                : $$selectedVal[0]
            }
          }
        },
        _vm._l(_vm.options, function(item) {
          return _c(
            "option",
            {
              key: item.value,
              domProps: {
                value: item.value,
                selected: _vm.value === item.value
              }
            },
            [_vm._v(_vm._s(item.text))]
          )
        }),
        0
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("input", {
      attrs: { type: "hidden", name: _vm.inputName, id: _vm.inputId },
      domProps: { value: _vm.currentInputValue }
    }),
    _vm._v(" "),
    _c("div", { staticClass: "input-append" }, [
      _c("span", { staticClass: "add-on" }, [_vm._v("Quantity")]),
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.newQuantity,
            expression: "newQuantity"
          }
        ],
        staticClass: "form-control",
        attrs: { type: "number", min: "2" },
        domProps: { value: _vm.newQuantity },
        on: {
          input: function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.newQuantity = $event.target.value
          }
        }
      }),
      _vm._v(" "),
      _c("span", { staticClass: "add-on" }, [_vm._v("Price")]),
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.newPrice,
            expression: "newPrice"
          }
        ],
        staticClass: "form-control",
        attrs: { type: "text" },
        domProps: { value: _vm.newPrice },
        on: {
          input: function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.newPrice = $event.target.value
          }
        }
      }),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "btn btn-success",
          on: {
            click: function($event) {
              $event.preventDefault()
              return _vm.addScalePrice($event)
            }
          }
        },
        [_vm._v("+")]
      )
    ]),
    _vm._v(" "),
    _c(
      "table",
      [
        _vm._m(0),
        _vm._v(" "),
        _vm._l(_vm.sortedScalePrices, function(scalePrice) {
          return _c("tr", { key: scalePrice.id }, [
            _c("td", [_vm._v(_vm._s(scalePrice.quantity))]),
            _vm._v(" "),
            _c("td", [_vm._v(_vm._s(scalePrice.price))]),
            _vm._v(" "),
            _c("td", { staticClass: "action" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-danger",
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      return _vm.deleteQuantity(scalePrice.quantity)
                    }
                  }
                },
                [_vm._v("-")]
              )
            ])
          ])
        })
      ],
      2
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("tr", [
      _c("th", [_vm._v("Quantity")]),
      _vm._v(" "),
      _c("th", [_vm._v("Price")]),
      _vm._v(" "),
      _c("th", [_vm._v(" ")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "Thumbnailcreator" } },
    [
      _c("p", { staticClass: "well" }, [
        _c("span", {
          domProps: {
            innerHTML: _vm._s(
              _vm.i18n.t("COM_EVENTGALLERY_THUMBNAILGENERATOR_START2_DESC")
            )
          }
        }),
        _vm._v(" "),
        _c("br"),
        _c("br"),
        _vm._v(" "),
        _c("label", { staticClass: "checkbox" }, [
          _c("input", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.refreshetags,
                expression: "refreshetags"
              }
            ],
            attrs: { type: "checkbox" },
            domProps: {
              checked: Array.isArray(_vm.refreshetags)
                ? _vm._i(_vm.refreshetags, null) > -1
                : _vm.refreshetags
            },
            on: {
              change: function($event) {
                var $$a = _vm.refreshetags,
                  $$el = $event.target,
                  $$c = $$el.checked ? true : false
                if (Array.isArray($$a)) {
                  var $$v = null,
                    $$i = _vm._i($$a, $$v)
                  if ($$el.checked) {
                    $$i < 0 && (_vm.refreshetags = $$a.concat([$$v]))
                  } else {
                    $$i > -1 &&
                      (_vm.refreshetags = $$a
                        .slice(0, $$i)
                        .concat($$a.slice($$i + 1)))
                  }
                } else {
                  _vm.refreshetags = $$c
                }
              }
            }
          }),
          _vm._v(
            "  " +
              _vm._s(
                _vm.i18n.t(
                  "COM_EVENTGALLERY_THUMBNAILGENERATOR_REFRESHETAGS_DESC"
                )
              ) +
              "\n        "
          )
        ])
      ]),
      _vm._v(" "),
      _c("ErrorPanel", {
        attrs: {
          "error-messages": _vm.errorMessages,
          "failed-folders": _vm.failedFolders,
          headline: _vm.i18n.t("COM_EVENTGALLERY_SYNC_ERROR_HEADLINE")
        }
      }),
      _vm._v(" "),
      _c("ProcessSteps", {
        attrs: {
          i18n: _vm.i18n,
          "number-of-selected-files": _vm.numberOfSyncableFiles,
          "number-of-selected-folders": _vm.selectedFolders.length,
          "is-ready-for-sync-files": _vm.isSyncFilesProcessReadyToStart,
          running: _vm.running,
          "i18n_label-step1": _vm.i18n.t("COM_EVENTGALLERY_SYNC_STEP1"),
          "i18n_label-step2": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_GETMISSINGTHUMBNAILS"
          ),
          "i18n_label-step3": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_START_THUMBNAILCREATION"
          ),
          "i18n_hint-step2": _vm.i18n.t(""),
          "i18n_hint-step3": _vm.i18n.t(""),
          "i18n_label-button-step2": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_START"
          ),
          "i18n_label-button-step3": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_START"
          ),
          "i18n_label-items-step2": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_STEP2_ITEMS"
          ),
          "i18n_label-items-step3": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_STEP3_ITEMS"
          )
        },
        on: { "sync-files": _vm.syncFiles, "sync-folders": _vm.syncFolders }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "control-group" }, [
        _c("div", { staticClass: "controls" }, [
          _c("div", { staticClass: "btn-group sync-buttons" }, [
            _c(
              "button",
              { staticClass: "btn checkall", on: { click: _vm.checkAll } },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_CHECK_ALL")))]
            ),
            _vm._v(" "),
            _c(
              "button",
              { staticClass: "btn", on: { click: _vm.uncheckAll } },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_CHECK_NONE")))]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-warning",
                attrs: { disabled: !_vm.running },
                on: { click: _vm.stopQueue }
              },
              [_vm._v(_vm._s(_vm.i18n.t("COM_EVENTGALLERY_SYNC_STOP_QUEUE")))]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm.numberOfTasks > 0
        ? _c("Progress", {
            attrs: {
              remaining: _vm.numberOfTasks,
              total: _vm.numberOfLastQueuePush
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _c("Folders", {
        attrs: {
          folders: _vm.folders,
          blocked: _vm.running,
          "i18n_label-need-sync": _vm.i18n.t(
            "COM_EVENTGALLERY_THUMBNAILGENERATOR_OPEN_IMAGES_NEEDS_SYNC"
          )
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!/var/www/eventgallery/build/node_modules/vue-loader/lib??vue-loader-options!./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "Uploader" }, [
    _c("label", { attrs: { for: "fileselect" } }, [
      _vm._v(
        _vm._s(_vm.i18n.COM_EVENTGALLERY_EVENT_UPLOAD_FILES_TO_UPLOAD) + ":"
      )
    ]),
    _vm._v(" "),
    _c("input", {
      attrs: { id: "fileselect", type: "file", multiple: "multiple" },
      on: { change: _vm.addFiles }
    }),
    _vm._v(" "),
    _vm.pendingFiles.length + _vm.inProgressFiles.length > 0
      ? _c("div", { staticClass: "eg-progressbar" }, [
          _c("div", {
            staticClass: "eg-progressbar-state",
            style: { width: _vm.progress + "%" }
          })
        ])
      : _vm._e(),
    _vm._v(" "),
    _c("div", { staticClass: "eg-bo-row" }, [
      _vm.pendingFiles.length > 0
        ? _c("div", { staticClass: "eg-bo-column3" }, [
            _c("h2", [
              _vm._v(_vm._s(_vm.i18n.COM_EVENTGALLERY_EVENT_UPLOAD_PENDING))
            ]),
            _vm._v(" "),
            _c(
              "ul",
              { attrs: { id: "pending" } },
              _vm._l(_vm.revertedPendingFiles, function(pendingFile) {
                return _c("li", [
                  _vm._v(
                    "\n                    " +
                      _vm._s(pendingFile.name) +
                      "\n                "
                  )
                ])
              }),
              0
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.finishedFilesContent.length > 0 ||
      _vm.inProgressFiles.length > 0 ||
      _vm.failedFilesContent.length > 0
        ? _c("div", { staticClass: "eg-bo-column9" }, [
            _c("h2", [
              _vm._v(_vm._s(_vm.i18n.COM_EVENTGALLERY_EVENT_UPLOAD_FINISHED))
            ]),
            _vm._v(" "),
            _c(
              "ul",
              {
                staticClass: "eg-bo-row",
                staticStyle: { "flex-wrap": "wrap" },
                attrs: { id: "finished" }
              },
              [
                _vm._l(_vm.inProgressFiles, function(inProgressFile) {
                  return _c("li", { staticClass: "eg-bo-column3" }, [
                    _c("div", [_vm._v(_vm._s(inProgressFile.name))]),
                    _vm._v(" "),
                    _vm._m(0, true)
                  ])
                }),
                _vm._v(" "),
                _vm._l(_vm.failedFilesContent, function(failedFileContent) {
                  return _c("li", {
                    key: failedFileContent.id,
                    staticClass: "eg-bo-column3",
                    domProps: { innerHTML: _vm._s(failedFileContent.content) }
                  })
                }),
                _vm._v(" "),
                _vm._l(_vm.revertedFinishedFilesContent, function(
                  finishedFileContent
                ) {
                  return _c("li", {
                    key: finishedFileContent.id,
                    staticClass: "eg-bo-column3",
                    domProps: { innerHTML: _vm._s(finishedFileContent.content) }
                  })
                })
              ],
              2
            )
          ])
        : _vm._e()
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "lds-ring" }, [
      _c("div"),
      _c("div"),
      _c("div"),
      _c("div")
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!**********************************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js":
/*!****************************************************************************!*\
  !*** /var/www/eventgallery/build/node_modules/vue/dist/vue.runtime.esm.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global, setImmediate) {/*!
 * Vue.js v2.6.11
 * (c) 2014-2019 Evan You
 * Released under the MIT License.
 */
/*  */

var emptyObject = Object.freeze({});

// These helpers produce better VM code in JS engines due to their
// explicitness and function inlining.
function isUndef (v) {
  return v === undefined || v === null
}

function isDef (v) {
  return v !== undefined && v !== null
}

function isTrue (v) {
  return v === true
}

function isFalse (v) {
  return v === false
}

/**
 * Check if value is primitive.
 */
function isPrimitive (value) {
  return (
    typeof value === 'string' ||
    typeof value === 'number' ||
    // $flow-disable-line
    typeof value === 'symbol' ||
    typeof value === 'boolean'
  )
}

/**
 * Quick object check - this is primarily used to tell
 * Objects from primitive values when we know the value
 * is a JSON-compliant type.
 */
function isObject (obj) {
  return obj !== null && typeof obj === 'object'
}

/**
 * Get the raw type string of a value, e.g., [object Object].
 */
var _toString = Object.prototype.toString;

function toRawType (value) {
  return _toString.call(value).slice(8, -1)
}

/**
 * Strict object type check. Only returns true
 * for plain JavaScript objects.
 */
function isPlainObject (obj) {
  return _toString.call(obj) === '[object Object]'
}

function isRegExp (v) {
  return _toString.call(v) === '[object RegExp]'
}

/**
 * Check if val is a valid array index.
 */
function isValidArrayIndex (val) {
  var n = parseFloat(String(val));
  return n >= 0 && Math.floor(n) === n && isFinite(val)
}

function isPromise (val) {
  return (
    isDef(val) &&
    typeof val.then === 'function' &&
    typeof val.catch === 'function'
  )
}

/**
 * Convert a value to a string that is actually rendered.
 */
function toString (val) {
  return val == null
    ? ''
    : Array.isArray(val) || (isPlainObject(val) && val.toString === _toString)
      ? JSON.stringify(val, null, 2)
      : String(val)
}

/**
 * Convert an input value to a number for persistence.
 * If the conversion fails, return original string.
 */
function toNumber (val) {
  var n = parseFloat(val);
  return isNaN(n) ? val : n
}

/**
 * Make a map and return a function for checking if a key
 * is in that map.
 */
function makeMap (
  str,
  expectsLowerCase
) {
  var map = Object.create(null);
  var list = str.split(',');
  for (var i = 0; i < list.length; i++) {
    map[list[i]] = true;
  }
  return expectsLowerCase
    ? function (val) { return map[val.toLowerCase()]; }
    : function (val) { return map[val]; }
}

/**
 * Check if a tag is a built-in tag.
 */
var isBuiltInTag = makeMap('slot,component', true);

/**
 * Check if an attribute is a reserved attribute.
 */
var isReservedAttribute = makeMap('key,ref,slot,slot-scope,is');

/**
 * Remove an item from an array.
 */
function remove (arr, item) {
  if (arr.length) {
    var index = arr.indexOf(item);
    if (index > -1) {
      return arr.splice(index, 1)
    }
  }
}

/**
 * Check whether an object has the property.
 */
var hasOwnProperty = Object.prototype.hasOwnProperty;
function hasOwn (obj, key) {
  return hasOwnProperty.call(obj, key)
}

/**
 * Create a cached version of a pure function.
 */
function cached (fn) {
  var cache = Object.create(null);
  return (function cachedFn (str) {
    var hit = cache[str];
    return hit || (cache[str] = fn(str))
  })
}

/**
 * Camelize a hyphen-delimited string.
 */
var camelizeRE = /-(\w)/g;
var camelize = cached(function (str) {
  return str.replace(camelizeRE, function (_, c) { return c ? c.toUpperCase() : ''; })
});

/**
 * Capitalize a string.
 */
var capitalize = cached(function (str) {
  return str.charAt(0).toUpperCase() + str.slice(1)
});

/**
 * Hyphenate a camelCase string.
 */
var hyphenateRE = /\B([A-Z])/g;
var hyphenate = cached(function (str) {
  return str.replace(hyphenateRE, '-$1').toLowerCase()
});

/**
 * Simple bind polyfill for environments that do not support it,
 * e.g., PhantomJS 1.x. Technically, we don't need this anymore
 * since native bind is now performant enough in most browsers.
 * But removing it would mean breaking code that was able to run in
 * PhantomJS 1.x, so this must be kept for backward compatibility.
 */

/* istanbul ignore next */
function polyfillBind (fn, ctx) {
  function boundFn (a) {
    var l = arguments.length;
    return l
      ? l > 1
        ? fn.apply(ctx, arguments)
        : fn.call(ctx, a)
      : fn.call(ctx)
  }

  boundFn._length = fn.length;
  return boundFn
}

function nativeBind (fn, ctx) {
  return fn.bind(ctx)
}

var bind = Function.prototype.bind
  ? nativeBind
  : polyfillBind;

/**
 * Convert an Array-like object to a real Array.
 */
function toArray (list, start) {
  start = start || 0;
  var i = list.length - start;
  var ret = new Array(i);
  while (i--) {
    ret[i] = list[i + start];
  }
  return ret
}

/**
 * Mix properties into target object.
 */
function extend (to, _from) {
  for (var key in _from) {
    to[key] = _from[key];
  }
  return to
}

/**
 * Merge an Array of Objects into a single Object.
 */
function toObject (arr) {
  var res = {};
  for (var i = 0; i < arr.length; i++) {
    if (arr[i]) {
      extend(res, arr[i]);
    }
  }
  return res
}

/* eslint-disable no-unused-vars */

/**
 * Perform no operation.
 * Stubbing args to make Flow happy without leaving useless transpiled code
 * with ...rest (https://flow.org/blog/2017/05/07/Strict-Function-Call-Arity/).
 */
function noop (a, b, c) {}

/**
 * Always return false.
 */
var no = function (a, b, c) { return false; };

/* eslint-enable no-unused-vars */

/**
 * Return the same value.
 */
var identity = function (_) { return _; };

/**
 * Check if two values are loosely equal - that is,
 * if they are plain objects, do they have the same shape?
 */
function looseEqual (a, b) {
  if (a === b) { return true }
  var isObjectA = isObject(a);
  var isObjectB = isObject(b);
  if (isObjectA && isObjectB) {
    try {
      var isArrayA = Array.isArray(a);
      var isArrayB = Array.isArray(b);
      if (isArrayA && isArrayB) {
        return a.length === b.length && a.every(function (e, i) {
          return looseEqual(e, b[i])
        })
      } else if (a instanceof Date && b instanceof Date) {
        return a.getTime() === b.getTime()
      } else if (!isArrayA && !isArrayB) {
        var keysA = Object.keys(a);
        var keysB = Object.keys(b);
        return keysA.length === keysB.length && keysA.every(function (key) {
          return looseEqual(a[key], b[key])
        })
      } else {
        /* istanbul ignore next */
        return false
      }
    } catch (e) {
      /* istanbul ignore next */
      return false
    }
  } else if (!isObjectA && !isObjectB) {
    return String(a) === String(b)
  } else {
    return false
  }
}

/**
 * Return the first index at which a loosely equal value can be
 * found in the array (if value is a plain object, the array must
 * contain an object of the same shape), or -1 if it is not present.
 */
function looseIndexOf (arr, val) {
  for (var i = 0; i < arr.length; i++) {
    if (looseEqual(arr[i], val)) { return i }
  }
  return -1
}

/**
 * Ensure a function is called only once.
 */
function once (fn) {
  var called = false;
  return function () {
    if (!called) {
      called = true;
      fn.apply(this, arguments);
    }
  }
}

var SSR_ATTR = 'data-server-rendered';

var ASSET_TYPES = [
  'component',
  'directive',
  'filter'
];

var LIFECYCLE_HOOKS = [
  'beforeCreate',
  'created',
  'beforeMount',
  'mounted',
  'beforeUpdate',
  'updated',
  'beforeDestroy',
  'destroyed',
  'activated',
  'deactivated',
  'errorCaptured',
  'serverPrefetch'
];

/*  */



var config = ({
  /**
   * Option merge strategies (used in core/util/options)
   */
  // $flow-disable-line
  optionMergeStrategies: Object.create(null),

  /**
   * Whether to suppress warnings.
   */
  silent: false,

  /**
   * Show production mode tip message on boot?
   */
  productionTip: "development" !== 'production',

  /**
   * Whether to enable devtools
   */
  devtools: "development" !== 'production',

  /**
   * Whether to record perf
   */
  performance: false,

  /**
   * Error handler for watcher errors
   */
  errorHandler: null,

  /**
   * Warn handler for watcher warns
   */
  warnHandler: null,

  /**
   * Ignore certain custom elements
   */
  ignoredElements: [],

  /**
   * Custom user key aliases for v-on
   */
  // $flow-disable-line
  keyCodes: Object.create(null),

  /**
   * Check if a tag is reserved so that it cannot be registered as a
   * component. This is platform-dependent and may be overwritten.
   */
  isReservedTag: no,

  /**
   * Check if an attribute is reserved so that it cannot be used as a component
   * prop. This is platform-dependent and may be overwritten.
   */
  isReservedAttr: no,

  /**
   * Check if a tag is an unknown element.
   * Platform-dependent.
   */
  isUnknownElement: no,

  /**
   * Get the namespace of an element
   */
  getTagNamespace: noop,

  /**
   * Parse the real tag name for the specific platform.
   */
  parsePlatformTagName: identity,

  /**
   * Check if an attribute must be bound using property, e.g. value
   * Platform-dependent.
   */
  mustUseProp: no,

  /**
   * Perform updates asynchronously. Intended to be used by Vue Test Utils
   * This will significantly reduce performance if set to false.
   */
  async: true,

  /**
   * Exposed for legacy reasons
   */
  _lifecycleHooks: LIFECYCLE_HOOKS
});

/*  */

/**
 * unicode letters used for parsing html tags, component names and property paths.
 * using https://www.w3.org/TR/html53/semantics-scripting.html#potentialcustomelementname
 * skipping \u10000-\uEFFFF due to it freezing up PhantomJS
 */
var unicodeRegExp = /a-zA-Z\u00B7\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u037D\u037F-\u1FFF\u200C-\u200D\u203F-\u2040\u2070-\u218F\u2C00-\u2FEF\u3001-\uD7FF\uF900-\uFDCF\uFDF0-\uFFFD/;

/**
 * Check if a string starts with $ or _
 */
function isReserved (str) {
  var c = (str + '').charCodeAt(0);
  return c === 0x24 || c === 0x5F
}

/**
 * Define a property.
 */
function def (obj, key, val, enumerable) {
  Object.defineProperty(obj, key, {
    value: val,
    enumerable: !!enumerable,
    writable: true,
    configurable: true
  });
}

/**
 * Parse simple path.
 */
var bailRE = new RegExp(("[^" + (unicodeRegExp.source) + ".$_\\d]"));
function parsePath (path) {
  if (bailRE.test(path)) {
    return
  }
  var segments = path.split('.');
  return function (obj) {
    for (var i = 0; i < segments.length; i++) {
      if (!obj) { return }
      obj = obj[segments[i]];
    }
    return obj
  }
}

/*  */

// can we use __proto__?
var hasProto = '__proto__' in {};

// Browser environment sniffing
var inBrowser = typeof window !== 'undefined';
var inWeex = typeof WXEnvironment !== 'undefined' && !!WXEnvironment.platform;
var weexPlatform = inWeex && WXEnvironment.platform.toLowerCase();
var UA = inBrowser && window.navigator.userAgent.toLowerCase();
var isIE = UA && /msie|trident/.test(UA);
var isIE9 = UA && UA.indexOf('msie 9.0') > 0;
var isEdge = UA && UA.indexOf('edge/') > 0;
var isAndroid = (UA && UA.indexOf('android') > 0) || (weexPlatform === 'android');
var isIOS = (UA && /iphone|ipad|ipod|ios/.test(UA)) || (weexPlatform === 'ios');
var isChrome = UA && /chrome\/\d+/.test(UA) && !isEdge;
var isPhantomJS = UA && /phantomjs/.test(UA);
var isFF = UA && UA.match(/firefox\/(\d+)/);

// Firefox has a "watch" function on Object.prototype...
var nativeWatch = ({}).watch;

var supportsPassive = false;
if (inBrowser) {
  try {
    var opts = {};
    Object.defineProperty(opts, 'passive', ({
      get: function get () {
        /* istanbul ignore next */
        supportsPassive = true;
      }
    })); // https://github.com/facebook/flow/issues/285
    window.addEventListener('test-passive', null, opts);
  } catch (e) {}
}

// this needs to be lazy-evaled because vue may be required before
// vue-server-renderer can set VUE_ENV
var _isServer;
var isServerRendering = function () {
  if (_isServer === undefined) {
    /* istanbul ignore if */
    if (!inBrowser && !inWeex && typeof global !== 'undefined') {
      // detect presence of vue-server-renderer and avoid
      // Webpack shimming the process
      _isServer = global['process'] && global['process'].env.VUE_ENV === 'server';
    } else {
      _isServer = false;
    }
  }
  return _isServer
};

// detect devtools
var devtools = inBrowser && window.__VUE_DEVTOOLS_GLOBAL_HOOK__;

/* istanbul ignore next */
function isNative (Ctor) {
  return typeof Ctor === 'function' && /native code/.test(Ctor.toString())
}

var hasSymbol =
  typeof Symbol !== 'undefined' && isNative(Symbol) &&
  typeof Reflect !== 'undefined' && isNative(Reflect.ownKeys);

var _Set;
/* istanbul ignore if */ // $flow-disable-line
if (typeof Set !== 'undefined' && isNative(Set)) {
  // use native Set when available.
  _Set = Set;
} else {
  // a non-standard Set polyfill that only works with primitive keys.
  _Set = /*@__PURE__*/(function () {
    function Set () {
      this.set = Object.create(null);
    }
    Set.prototype.has = function has (key) {
      return this.set[key] === true
    };
    Set.prototype.add = function add (key) {
      this.set[key] = true;
    };
    Set.prototype.clear = function clear () {
      this.set = Object.create(null);
    };

    return Set;
  }());
}

/*  */

var warn = noop;
var tip = noop;
var generateComponentTrace = (noop); // work around flow check
var formatComponentName = (noop);

if (true) {
  var hasConsole = typeof console !== 'undefined';
  var classifyRE = /(?:^|[-_])(\w)/g;
  var classify = function (str) { return str
    .replace(classifyRE, function (c) { return c.toUpperCase(); })
    .replace(/[-_]/g, ''); };

  warn = function (msg, vm) {
    var trace = vm ? generateComponentTrace(vm) : '';

    if (config.warnHandler) {
      config.warnHandler.call(null, msg, vm, trace);
    } else if (hasConsole && (!config.silent)) {
      console.error(("[Vue warn]: " + msg + trace));
    }
  };

  tip = function (msg, vm) {
    if (hasConsole && (!config.silent)) {
      console.warn("[Vue tip]: " + msg + (
        vm ? generateComponentTrace(vm) : ''
      ));
    }
  };

  formatComponentName = function (vm, includeFile) {
    if (vm.$root === vm) {
      return '<Root>'
    }
    var options = typeof vm === 'function' && vm.cid != null
      ? vm.options
      : vm._isVue
        ? vm.$options || vm.constructor.options
        : vm;
    var name = options.name || options._componentTag;
    var file = options.__file;
    if (!name && file) {
      var match = file.match(/([^/\\]+)\.vue$/);
      name = match && match[1];
    }

    return (
      (name ? ("<" + (classify(name)) + ">") : "<Anonymous>") +
      (file && includeFile !== false ? (" at " + file) : '')
    )
  };

  var repeat = function (str, n) {
    var res = '';
    while (n) {
      if (n % 2 === 1) { res += str; }
      if (n > 1) { str += str; }
      n >>= 1;
    }
    return res
  };

  generateComponentTrace = function (vm) {
    if (vm._isVue && vm.$parent) {
      var tree = [];
      var currentRecursiveSequence = 0;
      while (vm) {
        if (tree.length > 0) {
          var last = tree[tree.length - 1];
          if (last.constructor === vm.constructor) {
            currentRecursiveSequence++;
            vm = vm.$parent;
            continue
          } else if (currentRecursiveSequence > 0) {
            tree[tree.length - 1] = [last, currentRecursiveSequence];
            currentRecursiveSequence = 0;
          }
        }
        tree.push(vm);
        vm = vm.$parent;
      }
      return '\n\nfound in\n\n' + tree
        .map(function (vm, i) { return ("" + (i === 0 ? '---> ' : repeat(' ', 5 + i * 2)) + (Array.isArray(vm)
            ? ((formatComponentName(vm[0])) + "... (" + (vm[1]) + " recursive calls)")
            : formatComponentName(vm))); })
        .join('\n')
    } else {
      return ("\n\n(found in " + (formatComponentName(vm)) + ")")
    }
  };
}

/*  */

var uid = 0;

/**
 * A dep is an observable that can have multiple
 * directives subscribing to it.
 */
var Dep = function Dep () {
  this.id = uid++;
  this.subs = [];
};

Dep.prototype.addSub = function addSub (sub) {
  this.subs.push(sub);
};

Dep.prototype.removeSub = function removeSub (sub) {
  remove(this.subs, sub);
};

Dep.prototype.depend = function depend () {
  if (Dep.target) {
    Dep.target.addDep(this);
  }
};

Dep.prototype.notify = function notify () {
  // stabilize the subscriber list first
  var subs = this.subs.slice();
  if ( true && !config.async) {
    // subs aren't sorted in scheduler if not running async
    // we need to sort them now to make sure they fire in correct
    // order
    subs.sort(function (a, b) { return a.id - b.id; });
  }
  for (var i = 0, l = subs.length; i < l; i++) {
    subs[i].update();
  }
};

// The current target watcher being evaluated.
// This is globally unique because only one watcher
// can be evaluated at a time.
Dep.target = null;
var targetStack = [];

function pushTarget (target) {
  targetStack.push(target);
  Dep.target = target;
}

function popTarget () {
  targetStack.pop();
  Dep.target = targetStack[targetStack.length - 1];
}

/*  */

var VNode = function VNode (
  tag,
  data,
  children,
  text,
  elm,
  context,
  componentOptions,
  asyncFactory
) {
  this.tag = tag;
  this.data = data;
  this.children = children;
  this.text = text;
  this.elm = elm;
  this.ns = undefined;
  this.context = context;
  this.fnContext = undefined;
  this.fnOptions = undefined;
  this.fnScopeId = undefined;
  this.key = data && data.key;
  this.componentOptions = componentOptions;
  this.componentInstance = undefined;
  this.parent = undefined;
  this.raw = false;
  this.isStatic = false;
  this.isRootInsert = true;
  this.isComment = false;
  this.isCloned = false;
  this.isOnce = false;
  this.asyncFactory = asyncFactory;
  this.asyncMeta = undefined;
  this.isAsyncPlaceholder = false;
};

var prototypeAccessors = { child: { configurable: true } };

// DEPRECATED: alias for componentInstance for backwards compat.
/* istanbul ignore next */
prototypeAccessors.child.get = function () {
  return this.componentInstance
};

Object.defineProperties( VNode.prototype, prototypeAccessors );

var createEmptyVNode = function (text) {
  if ( text === void 0 ) text = '';

  var node = new VNode();
  node.text = text;
  node.isComment = true;
  return node
};

function createTextVNode (val) {
  return new VNode(undefined, undefined, undefined, String(val))
}

// optimized shallow clone
// used for static nodes and slot nodes because they may be reused across
// multiple renders, cloning them avoids errors when DOM manipulations rely
// on their elm reference.
function cloneVNode (vnode) {
  var cloned = new VNode(
    vnode.tag,
    vnode.data,
    // #7975
    // clone children array to avoid mutating original in case of cloning
    // a child.
    vnode.children && vnode.children.slice(),
    vnode.text,
    vnode.elm,
    vnode.context,
    vnode.componentOptions,
    vnode.asyncFactory
  );
  cloned.ns = vnode.ns;
  cloned.isStatic = vnode.isStatic;
  cloned.key = vnode.key;
  cloned.isComment = vnode.isComment;
  cloned.fnContext = vnode.fnContext;
  cloned.fnOptions = vnode.fnOptions;
  cloned.fnScopeId = vnode.fnScopeId;
  cloned.asyncMeta = vnode.asyncMeta;
  cloned.isCloned = true;
  return cloned
}

/*
 * not type checking this file because flow doesn't play well with
 * dynamically accessing methods on Array prototype
 */

var arrayProto = Array.prototype;
var arrayMethods = Object.create(arrayProto);

var methodsToPatch = [
  'push',
  'pop',
  'shift',
  'unshift',
  'splice',
  'sort',
  'reverse'
];

/**
 * Intercept mutating methods and emit events
 */
methodsToPatch.forEach(function (method) {
  // cache original method
  var original = arrayProto[method];
  def(arrayMethods, method, function mutator () {
    var args = [], len = arguments.length;
    while ( len-- ) args[ len ] = arguments[ len ];

    var result = original.apply(this, args);
    var ob = this.__ob__;
    var inserted;
    switch (method) {
      case 'push':
      case 'unshift':
        inserted = args;
        break
      case 'splice':
        inserted = args.slice(2);
        break
    }
    if (inserted) { ob.observeArray(inserted); }
    // notify change
    ob.dep.notify();
    return result
  });
});

/*  */

var arrayKeys = Object.getOwnPropertyNames(arrayMethods);

/**
 * In some cases we may want to disable observation inside a component's
 * update computation.
 */
var shouldObserve = true;

function toggleObserving (value) {
  shouldObserve = value;
}

/**
 * Observer class that is attached to each observed
 * object. Once attached, the observer converts the target
 * object's property keys into getter/setters that
 * collect dependencies and dispatch updates.
 */
var Observer = function Observer (value) {
  this.value = value;
  this.dep = new Dep();
  this.vmCount = 0;
  def(value, '__ob__', this);
  if (Array.isArray(value)) {
    if (hasProto) {
      protoAugment(value, arrayMethods);
    } else {
      copyAugment(value, arrayMethods, arrayKeys);
    }
    this.observeArray(value);
  } else {
    this.walk(value);
  }
};

/**
 * Walk through all properties and convert them into
 * getter/setters. This method should only be called when
 * value type is Object.
 */
Observer.prototype.walk = function walk (obj) {
  var keys = Object.keys(obj);
  for (var i = 0; i < keys.length; i++) {
    defineReactive$$1(obj, keys[i]);
  }
};

/**
 * Observe a list of Array items.
 */
Observer.prototype.observeArray = function observeArray (items) {
  for (var i = 0, l = items.length; i < l; i++) {
    observe(items[i]);
  }
};

// helpers

/**
 * Augment a target Object or Array by intercepting
 * the prototype chain using __proto__
 */
function protoAugment (target, src) {
  /* eslint-disable no-proto */
  target.__proto__ = src;
  /* eslint-enable no-proto */
}

/**
 * Augment a target Object or Array by defining
 * hidden properties.
 */
/* istanbul ignore next */
function copyAugment (target, src, keys) {
  for (var i = 0, l = keys.length; i < l; i++) {
    var key = keys[i];
    def(target, key, src[key]);
  }
}

/**
 * Attempt to create an observer instance for a value,
 * returns the new observer if successfully observed,
 * or the existing observer if the value already has one.
 */
function observe (value, asRootData) {
  if (!isObject(value) || value instanceof VNode) {
    return
  }
  var ob;
  if (hasOwn(value, '__ob__') && value.__ob__ instanceof Observer) {
    ob = value.__ob__;
  } else if (
    shouldObserve &&
    !isServerRendering() &&
    (Array.isArray(value) || isPlainObject(value)) &&
    Object.isExtensible(value) &&
    !value._isVue
  ) {
    ob = new Observer(value);
  }
  if (asRootData && ob) {
    ob.vmCount++;
  }
  return ob
}

/**
 * Define a reactive property on an Object.
 */
function defineReactive$$1 (
  obj,
  key,
  val,
  customSetter,
  shallow
) {
  var dep = new Dep();

  var property = Object.getOwnPropertyDescriptor(obj, key);
  if (property && property.configurable === false) {
    return
  }

  // cater for pre-defined getter/setters
  var getter = property && property.get;
  var setter = property && property.set;
  if ((!getter || setter) && arguments.length === 2) {
    val = obj[key];
  }

  var childOb = !shallow && observe(val);
  Object.defineProperty(obj, key, {
    enumerable: true,
    configurable: true,
    get: function reactiveGetter () {
      var value = getter ? getter.call(obj) : val;
      if (Dep.target) {
        dep.depend();
        if (childOb) {
          childOb.dep.depend();
          if (Array.isArray(value)) {
            dependArray(value);
          }
        }
      }
      return value
    },
    set: function reactiveSetter (newVal) {
      var value = getter ? getter.call(obj) : val;
      /* eslint-disable no-self-compare */
      if (newVal === value || (newVal !== newVal && value !== value)) {
        return
      }
      /* eslint-enable no-self-compare */
      if ( true && customSetter) {
        customSetter();
      }
      // #7981: for accessor properties without setter
      if (getter && !setter) { return }
      if (setter) {
        setter.call(obj, newVal);
      } else {
        val = newVal;
      }
      childOb = !shallow && observe(newVal);
      dep.notify();
    }
  });
}

/**
 * Set a property on an object. Adds the new property and
 * triggers change notification if the property doesn't
 * already exist.
 */
function set (target, key, val) {
  if ( true &&
    (isUndef(target) || isPrimitive(target))
  ) {
    warn(("Cannot set reactive property on undefined, null, or primitive value: " + ((target))));
  }
  if (Array.isArray(target) && isValidArrayIndex(key)) {
    target.length = Math.max(target.length, key);
    target.splice(key, 1, val);
    return val
  }
  if (key in target && !(key in Object.prototype)) {
    target[key] = val;
    return val
  }
  var ob = (target).__ob__;
  if (target._isVue || (ob && ob.vmCount)) {
     true && warn(
      'Avoid adding reactive properties to a Vue instance or its root $data ' +
      'at runtime - declare it upfront in the data option.'
    );
    return val
  }
  if (!ob) {
    target[key] = val;
    return val
  }
  defineReactive$$1(ob.value, key, val);
  ob.dep.notify();
  return val
}

/**
 * Delete a property and trigger change if necessary.
 */
function del (target, key) {
  if ( true &&
    (isUndef(target) || isPrimitive(target))
  ) {
    warn(("Cannot delete reactive property on undefined, null, or primitive value: " + ((target))));
  }
  if (Array.isArray(target) && isValidArrayIndex(key)) {
    target.splice(key, 1);
    return
  }
  var ob = (target).__ob__;
  if (target._isVue || (ob && ob.vmCount)) {
     true && warn(
      'Avoid deleting properties on a Vue instance or its root $data ' +
      '- just set it to null.'
    );
    return
  }
  if (!hasOwn(target, key)) {
    return
  }
  delete target[key];
  if (!ob) {
    return
  }
  ob.dep.notify();
}

/**
 * Collect dependencies on array elements when the array is touched, since
 * we cannot intercept array element access like property getters.
 */
function dependArray (value) {
  for (var e = (void 0), i = 0, l = value.length; i < l; i++) {
    e = value[i];
    e && e.__ob__ && e.__ob__.dep.depend();
    if (Array.isArray(e)) {
      dependArray(e);
    }
  }
}

/*  */

/**
 * Option overwriting strategies are functions that handle
 * how to merge a parent option value and a child option
 * value into the final value.
 */
var strats = config.optionMergeStrategies;

/**
 * Options with restrictions
 */
if (true) {
  strats.el = strats.propsData = function (parent, child, vm, key) {
    if (!vm) {
      warn(
        "option \"" + key + "\" can only be used during instance " +
        'creation with the `new` keyword.'
      );
    }
    return defaultStrat(parent, child)
  };
}

/**
 * Helper that recursively merges two data objects together.
 */
function mergeData (to, from) {
  if (!from) { return to }
  var key, toVal, fromVal;

  var keys = hasSymbol
    ? Reflect.ownKeys(from)
    : Object.keys(from);

  for (var i = 0; i < keys.length; i++) {
    key = keys[i];
    // in case the object is already observed...
    if (key === '__ob__') { continue }
    toVal = to[key];
    fromVal = from[key];
    if (!hasOwn(to, key)) {
      set(to, key, fromVal);
    } else if (
      toVal !== fromVal &&
      isPlainObject(toVal) &&
      isPlainObject(fromVal)
    ) {
      mergeData(toVal, fromVal);
    }
  }
  return to
}

/**
 * Data
 */
function mergeDataOrFn (
  parentVal,
  childVal,
  vm
) {
  if (!vm) {
    // in a Vue.extend merge, both should be functions
    if (!childVal) {
      return parentVal
    }
    if (!parentVal) {
      return childVal
    }
    // when parentVal & childVal are both present,
    // we need to return a function that returns the
    // merged result of both functions... no need to
    // check if parentVal is a function here because
    // it has to be a function to pass previous merges.
    return function mergedDataFn () {
      return mergeData(
        typeof childVal === 'function' ? childVal.call(this, this) : childVal,
        typeof parentVal === 'function' ? parentVal.call(this, this) : parentVal
      )
    }
  } else {
    return function mergedInstanceDataFn () {
      // instance merge
      var instanceData = typeof childVal === 'function'
        ? childVal.call(vm, vm)
        : childVal;
      var defaultData = typeof parentVal === 'function'
        ? parentVal.call(vm, vm)
        : parentVal;
      if (instanceData) {
        return mergeData(instanceData, defaultData)
      } else {
        return defaultData
      }
    }
  }
}

strats.data = function (
  parentVal,
  childVal,
  vm
) {
  if (!vm) {
    if (childVal && typeof childVal !== 'function') {
       true && warn(
        'The "data" option should be a function ' +
        'that returns a per-instance value in component ' +
        'definitions.',
        vm
      );

      return parentVal
    }
    return mergeDataOrFn(parentVal, childVal)
  }

  return mergeDataOrFn(parentVal, childVal, vm)
};

/**
 * Hooks and props are merged as arrays.
 */
function mergeHook (
  parentVal,
  childVal
) {
  var res = childVal
    ? parentVal
      ? parentVal.concat(childVal)
      : Array.isArray(childVal)
        ? childVal
        : [childVal]
    : parentVal;
  return res
    ? dedupeHooks(res)
    : res
}

function dedupeHooks (hooks) {
  var res = [];
  for (var i = 0; i < hooks.length; i++) {
    if (res.indexOf(hooks[i]) === -1) {
      res.push(hooks[i]);
    }
  }
  return res
}

LIFECYCLE_HOOKS.forEach(function (hook) {
  strats[hook] = mergeHook;
});

/**
 * Assets
 *
 * When a vm is present (instance creation), we need to do
 * a three-way merge between constructor options, instance
 * options and parent options.
 */
function mergeAssets (
  parentVal,
  childVal,
  vm,
  key
) {
  var res = Object.create(parentVal || null);
  if (childVal) {
     true && assertObjectType(key, childVal, vm);
    return extend(res, childVal)
  } else {
    return res
  }
}

ASSET_TYPES.forEach(function (type) {
  strats[type + 's'] = mergeAssets;
});

/**
 * Watchers.
 *
 * Watchers hashes should not overwrite one
 * another, so we merge them as arrays.
 */
strats.watch = function (
  parentVal,
  childVal,
  vm,
  key
) {
  // work around Firefox's Object.prototype.watch...
  if (parentVal === nativeWatch) { parentVal = undefined; }
  if (childVal === nativeWatch) { childVal = undefined; }
  /* istanbul ignore if */
  if (!childVal) { return Object.create(parentVal || null) }
  if (true) {
    assertObjectType(key, childVal, vm);
  }
  if (!parentVal) { return childVal }
  var ret = {};
  extend(ret, parentVal);
  for (var key$1 in childVal) {
    var parent = ret[key$1];
    var child = childVal[key$1];
    if (parent && !Array.isArray(parent)) {
      parent = [parent];
    }
    ret[key$1] = parent
      ? parent.concat(child)
      : Array.isArray(child) ? child : [child];
  }
  return ret
};

/**
 * Other object hashes.
 */
strats.props =
strats.methods =
strats.inject =
strats.computed = function (
  parentVal,
  childVal,
  vm,
  key
) {
  if (childVal && "development" !== 'production') {
    assertObjectType(key, childVal, vm);
  }
  if (!parentVal) { return childVal }
  var ret = Object.create(null);
  extend(ret, parentVal);
  if (childVal) { extend(ret, childVal); }
  return ret
};
strats.provide = mergeDataOrFn;

/**
 * Default strategy.
 */
var defaultStrat = function (parentVal, childVal) {
  return childVal === undefined
    ? parentVal
    : childVal
};

/**
 * Validate component names
 */
function checkComponents (options) {
  for (var key in options.components) {
    validateComponentName(key);
  }
}

function validateComponentName (name) {
  if (!new RegExp(("^[a-zA-Z][\\-\\.0-9_" + (unicodeRegExp.source) + "]*$")).test(name)) {
    warn(
      'Invalid component name: "' + name + '". Component names ' +
      'should conform to valid custom element name in html5 specification.'
    );
  }
  if (isBuiltInTag(name) || config.isReservedTag(name)) {
    warn(
      'Do not use built-in or reserved HTML elements as component ' +
      'id: ' + name
    );
  }
}

/**
 * Ensure all props option syntax are normalized into the
 * Object-based format.
 */
function normalizeProps (options, vm) {
  var props = options.props;
  if (!props) { return }
  var res = {};
  var i, val, name;
  if (Array.isArray(props)) {
    i = props.length;
    while (i--) {
      val = props[i];
      if (typeof val === 'string') {
        name = camelize(val);
        res[name] = { type: null };
      } else if (true) {
        warn('props must be strings when using array syntax.');
      }
    }
  } else if (isPlainObject(props)) {
    for (var key in props) {
      val = props[key];
      name = camelize(key);
      res[name] = isPlainObject(val)
        ? val
        : { type: val };
    }
  } else if (true) {
    warn(
      "Invalid value for option \"props\": expected an Array or an Object, " +
      "but got " + (toRawType(props)) + ".",
      vm
    );
  }
  options.props = res;
}

/**
 * Normalize all injections into Object-based format
 */
function normalizeInject (options, vm) {
  var inject = options.inject;
  if (!inject) { return }
  var normalized = options.inject = {};
  if (Array.isArray(inject)) {
    for (var i = 0; i < inject.length; i++) {
      normalized[inject[i]] = { from: inject[i] };
    }
  } else if (isPlainObject(inject)) {
    for (var key in inject) {
      var val = inject[key];
      normalized[key] = isPlainObject(val)
        ? extend({ from: key }, val)
        : { from: val };
    }
  } else if (true) {
    warn(
      "Invalid value for option \"inject\": expected an Array or an Object, " +
      "but got " + (toRawType(inject)) + ".",
      vm
    );
  }
}

/**
 * Normalize raw function directives into object format.
 */
function normalizeDirectives (options) {
  var dirs = options.directives;
  if (dirs) {
    for (var key in dirs) {
      var def$$1 = dirs[key];
      if (typeof def$$1 === 'function') {
        dirs[key] = { bind: def$$1, update: def$$1 };
      }
    }
  }
}

function assertObjectType (name, value, vm) {
  if (!isPlainObject(value)) {
    warn(
      "Invalid value for option \"" + name + "\": expected an Object, " +
      "but got " + (toRawType(value)) + ".",
      vm
    );
  }
}

/**
 * Merge two option objects into a new one.
 * Core utility used in both instantiation and inheritance.
 */
function mergeOptions (
  parent,
  child,
  vm
) {
  if (true) {
    checkComponents(child);
  }

  if (typeof child === 'function') {
    child = child.options;
  }

  normalizeProps(child, vm);
  normalizeInject(child, vm);
  normalizeDirectives(child);

  // Apply extends and mixins on the child options,
  // but only if it is a raw options object that isn't
  // the result of another mergeOptions call.
  // Only merged options has the _base property.
  if (!child._base) {
    if (child.extends) {
      parent = mergeOptions(parent, child.extends, vm);
    }
    if (child.mixins) {
      for (var i = 0, l = child.mixins.length; i < l; i++) {
        parent = mergeOptions(parent, child.mixins[i], vm);
      }
    }
  }

  var options = {};
  var key;
  for (key in parent) {
    mergeField(key);
  }
  for (key in child) {
    if (!hasOwn(parent, key)) {
      mergeField(key);
    }
  }
  function mergeField (key) {
    var strat = strats[key] || defaultStrat;
    options[key] = strat(parent[key], child[key], vm, key);
  }
  return options
}

/**
 * Resolve an asset.
 * This function is used because child instances need access
 * to assets defined in its ancestor chain.
 */
function resolveAsset (
  options,
  type,
  id,
  warnMissing
) {
  /* istanbul ignore if */
  if (typeof id !== 'string') {
    return
  }
  var assets = options[type];
  // check local registration variations first
  if (hasOwn(assets, id)) { return assets[id] }
  var camelizedId = camelize(id);
  if (hasOwn(assets, camelizedId)) { return assets[camelizedId] }
  var PascalCaseId = capitalize(camelizedId);
  if (hasOwn(assets, PascalCaseId)) { return assets[PascalCaseId] }
  // fallback to prototype chain
  var res = assets[id] || assets[camelizedId] || assets[PascalCaseId];
  if ( true && warnMissing && !res) {
    warn(
      'Failed to resolve ' + type.slice(0, -1) + ': ' + id,
      options
    );
  }
  return res
}

/*  */



function validateProp (
  key,
  propOptions,
  propsData,
  vm
) {
  var prop = propOptions[key];
  var absent = !hasOwn(propsData, key);
  var value = propsData[key];
  // boolean casting
  var booleanIndex = getTypeIndex(Boolean, prop.type);
  if (booleanIndex > -1) {
    if (absent && !hasOwn(prop, 'default')) {
      value = false;
    } else if (value === '' || value === hyphenate(key)) {
      // only cast empty string / same name to boolean if
      // boolean has higher priority
      var stringIndex = getTypeIndex(String, prop.type);
      if (stringIndex < 0 || booleanIndex < stringIndex) {
        value = true;
      }
    }
  }
  // check default value
  if (value === undefined) {
    value = getPropDefaultValue(vm, prop, key);
    // since the default value is a fresh copy,
    // make sure to observe it.
    var prevShouldObserve = shouldObserve;
    toggleObserving(true);
    observe(value);
    toggleObserving(prevShouldObserve);
  }
  if (
    true
  ) {
    assertProp(prop, key, value, vm, absent);
  }
  return value
}

/**
 * Get the default value of a prop.
 */
function getPropDefaultValue (vm, prop, key) {
  // no default, return undefined
  if (!hasOwn(prop, 'default')) {
    return undefined
  }
  var def = prop.default;
  // warn against non-factory defaults for Object & Array
  if ( true && isObject(def)) {
    warn(
      'Invalid default value for prop "' + key + '": ' +
      'Props with type Object/Array must use a factory function ' +
      'to return the default value.',
      vm
    );
  }
  // the raw prop value was also undefined from previous render,
  // return previous default value to avoid unnecessary watcher trigger
  if (vm && vm.$options.propsData &&
    vm.$options.propsData[key] === undefined &&
    vm._props[key] !== undefined
  ) {
    return vm._props[key]
  }
  // call factory function for non-Function types
  // a value is Function if its prototype is function even across different execution context
  return typeof def === 'function' && getType(prop.type) !== 'Function'
    ? def.call(vm)
    : def
}

/**
 * Assert whether a prop is valid.
 */
function assertProp (
  prop,
  name,
  value,
  vm,
  absent
) {
  if (prop.required && absent) {
    warn(
      'Missing required prop: "' + name + '"',
      vm
    );
    return
  }
  if (value == null && !prop.required) {
    return
  }
  var type = prop.type;
  var valid = !type || type === true;
  var expectedTypes = [];
  if (type) {
    if (!Array.isArray(type)) {
      type = [type];
    }
    for (var i = 0; i < type.length && !valid; i++) {
      var assertedType = assertType(value, type[i]);
      expectedTypes.push(assertedType.expectedType || '');
      valid = assertedType.valid;
    }
  }

  if (!valid) {
    warn(
      getInvalidTypeMessage(name, value, expectedTypes),
      vm
    );
    return
  }
  var validator = prop.validator;
  if (validator) {
    if (!validator(value)) {
      warn(
        'Invalid prop: custom validator check failed for prop "' + name + '".',
        vm
      );
    }
  }
}

var simpleCheckRE = /^(String|Number|Boolean|Function|Symbol)$/;

function assertType (value, type) {
  var valid;
  var expectedType = getType(type);
  if (simpleCheckRE.test(expectedType)) {
    var t = typeof value;
    valid = t === expectedType.toLowerCase();
    // for primitive wrapper objects
    if (!valid && t === 'object') {
      valid = value instanceof type;
    }
  } else if (expectedType === 'Object') {
    valid = isPlainObject(value);
  } else if (expectedType === 'Array') {
    valid = Array.isArray(value);
  } else {
    valid = value instanceof type;
  }
  return {
    valid: valid,
    expectedType: expectedType
  }
}

/**
 * Use function string name to check built-in types,
 * because a simple equality check will fail when running
 * across different vms / iframes.
 */
function getType (fn) {
  var match = fn && fn.toString().match(/^\s*function (\w+)/);
  return match ? match[1] : ''
}

function isSameType (a, b) {
  return getType(a) === getType(b)
}

function getTypeIndex (type, expectedTypes) {
  if (!Array.isArray(expectedTypes)) {
    return isSameType(expectedTypes, type) ? 0 : -1
  }
  for (var i = 0, len = expectedTypes.length; i < len; i++) {
    if (isSameType(expectedTypes[i], type)) {
      return i
    }
  }
  return -1
}

function getInvalidTypeMessage (name, value, expectedTypes) {
  var message = "Invalid prop: type check failed for prop \"" + name + "\"." +
    " Expected " + (expectedTypes.map(capitalize).join(', '));
  var expectedType = expectedTypes[0];
  var receivedType = toRawType(value);
  var expectedValue = styleValue(value, expectedType);
  var receivedValue = styleValue(value, receivedType);
  // check if we need to specify expected value
  if (expectedTypes.length === 1 &&
      isExplicable(expectedType) &&
      !isBoolean(expectedType, receivedType)) {
    message += " with value " + expectedValue;
  }
  message += ", got " + receivedType + " ";
  // check if we need to specify received value
  if (isExplicable(receivedType)) {
    message += "with value " + receivedValue + ".";
  }
  return message
}

function styleValue (value, type) {
  if (type === 'String') {
    return ("\"" + value + "\"")
  } else if (type === 'Number') {
    return ("" + (Number(value)))
  } else {
    return ("" + value)
  }
}

function isExplicable (value) {
  var explicitTypes = ['string', 'number', 'boolean'];
  return explicitTypes.some(function (elem) { return value.toLowerCase() === elem; })
}

function isBoolean () {
  var args = [], len = arguments.length;
  while ( len-- ) args[ len ] = arguments[ len ];

  return args.some(function (elem) { return elem.toLowerCase() === 'boolean'; })
}

/*  */

function handleError (err, vm, info) {
  // Deactivate deps tracking while processing error handler to avoid possible infinite rendering.
  // See: https://github.com/vuejs/vuex/issues/1505
  pushTarget();
  try {
    if (vm) {
      var cur = vm;
      while ((cur = cur.$parent)) {
        var hooks = cur.$options.errorCaptured;
        if (hooks) {
          for (var i = 0; i < hooks.length; i++) {
            try {
              var capture = hooks[i].call(cur, err, vm, info) === false;
              if (capture) { return }
            } catch (e) {
              globalHandleError(e, cur, 'errorCaptured hook');
            }
          }
        }
      }
    }
    globalHandleError(err, vm, info);
  } finally {
    popTarget();
  }
}

function invokeWithErrorHandling (
  handler,
  context,
  args,
  vm,
  info
) {
  var res;
  try {
    res = args ? handler.apply(context, args) : handler.call(context);
    if (res && !res._isVue && isPromise(res) && !res._handled) {
      res.catch(function (e) { return handleError(e, vm, info + " (Promise/async)"); });
      // issue #9511
      // avoid catch triggering multiple times when nested calls
      res._handled = true;
    }
  } catch (e) {
    handleError(e, vm, info);
  }
  return res
}

function globalHandleError (err, vm, info) {
  if (config.errorHandler) {
    try {
      return config.errorHandler.call(null, err, vm, info)
    } catch (e) {
      // if the user intentionally throws the original error in the handler,
      // do not log it twice
      if (e !== err) {
        logError(e, null, 'config.errorHandler');
      }
    }
  }
  logError(err, vm, info);
}

function logError (err, vm, info) {
  if (true) {
    warn(("Error in " + info + ": \"" + (err.toString()) + "\""), vm);
  }
  /* istanbul ignore else */
  if ((inBrowser || inWeex) && typeof console !== 'undefined') {
    console.error(err);
  } else {
    throw err
  }
}

/*  */

var isUsingMicroTask = false;

var callbacks = [];
var pending = false;

function flushCallbacks () {
  pending = false;
  var copies = callbacks.slice(0);
  callbacks.length = 0;
  for (var i = 0; i < copies.length; i++) {
    copies[i]();
  }
}

// Here we have async deferring wrappers using microtasks.
// In 2.5 we used (macro) tasks (in combination with microtasks).
// However, it has subtle problems when state is changed right before repaint
// (e.g. #6813, out-in transitions).
// Also, using (macro) tasks in event handler would cause some weird behaviors
// that cannot be circumvented (e.g. #7109, #7153, #7546, #7834, #8109).
// So we now use microtasks everywhere, again.
// A major drawback of this tradeoff is that there are some scenarios
// where microtasks have too high a priority and fire in between supposedly
// sequential events (e.g. #4521, #6690, which have workarounds)
// or even between bubbling of the same event (#6566).
var timerFunc;

// The nextTick behavior leverages the microtask queue, which can be accessed
// via either native Promise.then or MutationObserver.
// MutationObserver has wider support, however it is seriously bugged in
// UIWebView in iOS >= 9.3.3 when triggered in touch event handlers. It
// completely stops working after triggering a few times... so, if native
// Promise is available, we will use it:
/* istanbul ignore next, $flow-disable-line */
if (typeof Promise !== 'undefined' && isNative(Promise)) {
  var p = Promise.resolve();
  timerFunc = function () {
    p.then(flushCallbacks);
    // In problematic UIWebViews, Promise.then doesn't completely break, but
    // it can get stuck in a weird state where callbacks are pushed into the
    // microtask queue but the queue isn't being flushed, until the browser
    // needs to do some other work, e.g. handle a timer. Therefore we can
    // "force" the microtask queue to be flushed by adding an empty timer.
    if (isIOS) { setTimeout(noop); }
  };
  isUsingMicroTask = true;
} else if (!isIE && typeof MutationObserver !== 'undefined' && (
  isNative(MutationObserver) ||
  // PhantomJS and iOS 7.x
  MutationObserver.toString() === '[object MutationObserverConstructor]'
)) {
  // Use MutationObserver where native Promise is not available,
  // e.g. PhantomJS, iOS7, Android 4.4
  // (#6466 MutationObserver is unreliable in IE11)
  var counter = 1;
  var observer = new MutationObserver(flushCallbacks);
  var textNode = document.createTextNode(String(counter));
  observer.observe(textNode, {
    characterData: true
  });
  timerFunc = function () {
    counter = (counter + 1) % 2;
    textNode.data = String(counter);
  };
  isUsingMicroTask = true;
} else if (typeof setImmediate !== 'undefined' && isNative(setImmediate)) {
  // Fallback to setImmediate.
  // Technically it leverages the (macro) task queue,
  // but it is still a better choice than setTimeout.
  timerFunc = function () {
    setImmediate(flushCallbacks);
  };
} else {
  // Fallback to setTimeout.
  timerFunc = function () {
    setTimeout(flushCallbacks, 0);
  };
}

function nextTick (cb, ctx) {
  var _resolve;
  callbacks.push(function () {
    if (cb) {
      try {
        cb.call(ctx);
      } catch (e) {
        handleError(e, ctx, 'nextTick');
      }
    } else if (_resolve) {
      _resolve(ctx);
    }
  });
  if (!pending) {
    pending = true;
    timerFunc();
  }
  // $flow-disable-line
  if (!cb && typeof Promise !== 'undefined') {
    return new Promise(function (resolve) {
      _resolve = resolve;
    })
  }
}

/*  */

/* not type checking this file because flow doesn't play well with Proxy */

var initProxy;

if (true) {
  var allowedGlobals = makeMap(
    'Infinity,undefined,NaN,isFinite,isNaN,' +
    'parseFloat,parseInt,decodeURI,decodeURIComponent,encodeURI,encodeURIComponent,' +
    'Math,Number,Date,Array,Object,Boolean,String,RegExp,Map,Set,JSON,Intl,' +
    'require' // for Webpack/Browserify
  );

  var warnNonPresent = function (target, key) {
    warn(
      "Property or method \"" + key + "\" is not defined on the instance but " +
      'referenced during render. Make sure that this property is reactive, ' +
      'either in the data option, or for class-based components, by ' +
      'initializing the property. ' +
      'See: https://vuejs.org/v2/guide/reactivity.html#Declaring-Reactive-Properties.',
      target
    );
  };

  var warnReservedPrefix = function (target, key) {
    warn(
      "Property \"" + key + "\" must be accessed with \"$data." + key + "\" because " +
      'properties starting with "$" or "_" are not proxied in the Vue instance to ' +
      'prevent conflicts with Vue internals. ' +
      'See: https://vuejs.org/v2/api/#data',
      target
    );
  };

  var hasProxy =
    typeof Proxy !== 'undefined' && isNative(Proxy);

  if (hasProxy) {
    var isBuiltInModifier = makeMap('stop,prevent,self,ctrl,shift,alt,meta,exact');
    config.keyCodes = new Proxy(config.keyCodes, {
      set: function set (target, key, value) {
        if (isBuiltInModifier(key)) {
          warn(("Avoid overwriting built-in modifier in config.keyCodes: ." + key));
          return false
        } else {
          target[key] = value;
          return true
        }
      }
    });
  }

  var hasHandler = {
    has: function has (target, key) {
      var has = key in target;
      var isAllowed = allowedGlobals(key) ||
        (typeof key === 'string' && key.charAt(0) === '_' && !(key in target.$data));
      if (!has && !isAllowed) {
        if (key in target.$data) { warnReservedPrefix(target, key); }
        else { warnNonPresent(target, key); }
      }
      return has || !isAllowed
    }
  };

  var getHandler = {
    get: function get (target, key) {
      if (typeof key === 'string' && !(key in target)) {
        if (key in target.$data) { warnReservedPrefix(target, key); }
        else { warnNonPresent(target, key); }
      }
      return target[key]
    }
  };

  initProxy = function initProxy (vm) {
    if (hasProxy) {
      // determine which proxy handler to use
      var options = vm.$options;
      var handlers = options.render && options.render._withStripped
        ? getHandler
        : hasHandler;
      vm._renderProxy = new Proxy(vm, handlers);
    } else {
      vm._renderProxy = vm;
    }
  };
}

/*  */

var seenObjects = new _Set();

/**
 * Recursively traverse an object to evoke all converted
 * getters, so that every nested property inside the object
 * is collected as a "deep" dependency.
 */
function traverse (val) {
  _traverse(val, seenObjects);
  seenObjects.clear();
}

function _traverse (val, seen) {
  var i, keys;
  var isA = Array.isArray(val);
  if ((!isA && !isObject(val)) || Object.isFrozen(val) || val instanceof VNode) {
    return
  }
  if (val.__ob__) {
    var depId = val.__ob__.dep.id;
    if (seen.has(depId)) {
      return
    }
    seen.add(depId);
  }
  if (isA) {
    i = val.length;
    while (i--) { _traverse(val[i], seen); }
  } else {
    keys = Object.keys(val);
    i = keys.length;
    while (i--) { _traverse(val[keys[i]], seen); }
  }
}

var mark;
var measure;

if (true) {
  var perf = inBrowser && window.performance;
  /* istanbul ignore if */
  if (
    perf &&
    perf.mark &&
    perf.measure &&
    perf.clearMarks &&
    perf.clearMeasures
  ) {
    mark = function (tag) { return perf.mark(tag); };
    measure = function (name, startTag, endTag) {
      perf.measure(name, startTag, endTag);
      perf.clearMarks(startTag);
      perf.clearMarks(endTag);
      // perf.clearMeasures(name)
    };
  }
}

/*  */

var normalizeEvent = cached(function (name) {
  var passive = name.charAt(0) === '&';
  name = passive ? name.slice(1) : name;
  var once$$1 = name.charAt(0) === '~'; // Prefixed last, checked first
  name = once$$1 ? name.slice(1) : name;
  var capture = name.charAt(0) === '!';
  name = capture ? name.slice(1) : name;
  return {
    name: name,
    once: once$$1,
    capture: capture,
    passive: passive
  }
});

function createFnInvoker (fns, vm) {
  function invoker () {
    var arguments$1 = arguments;

    var fns = invoker.fns;
    if (Array.isArray(fns)) {
      var cloned = fns.slice();
      for (var i = 0; i < cloned.length; i++) {
        invokeWithErrorHandling(cloned[i], null, arguments$1, vm, "v-on handler");
      }
    } else {
      // return handler return value for single handlers
      return invokeWithErrorHandling(fns, null, arguments, vm, "v-on handler")
    }
  }
  invoker.fns = fns;
  return invoker
}

function updateListeners (
  on,
  oldOn,
  add,
  remove$$1,
  createOnceHandler,
  vm
) {
  var name, def$$1, cur, old, event;
  for (name in on) {
    def$$1 = cur = on[name];
    old = oldOn[name];
    event = normalizeEvent(name);
    if (isUndef(cur)) {
       true && warn(
        "Invalid handler for event \"" + (event.name) + "\": got " + String(cur),
        vm
      );
    } else if (isUndef(old)) {
      if (isUndef(cur.fns)) {
        cur = on[name] = createFnInvoker(cur, vm);
      }
      if (isTrue(event.once)) {
        cur = on[name] = createOnceHandler(event.name, cur, event.capture);
      }
      add(event.name, cur, event.capture, event.passive, event.params);
    } else if (cur !== old) {
      old.fns = cur;
      on[name] = old;
    }
  }
  for (name in oldOn) {
    if (isUndef(on[name])) {
      event = normalizeEvent(name);
      remove$$1(event.name, oldOn[name], event.capture);
    }
  }
}

/*  */

function mergeVNodeHook (def, hookKey, hook) {
  if (def instanceof VNode) {
    def = def.data.hook || (def.data.hook = {});
  }
  var invoker;
  var oldHook = def[hookKey];

  function wrappedHook () {
    hook.apply(this, arguments);
    // important: remove merged hook to ensure it's called only once
    // and prevent memory leak
    remove(invoker.fns, wrappedHook);
  }

  if (isUndef(oldHook)) {
    // no existing hook
    invoker = createFnInvoker([wrappedHook]);
  } else {
    /* istanbul ignore if */
    if (isDef(oldHook.fns) && isTrue(oldHook.merged)) {
      // already a merged invoker
      invoker = oldHook;
      invoker.fns.push(wrappedHook);
    } else {
      // existing plain hook
      invoker = createFnInvoker([oldHook, wrappedHook]);
    }
  }

  invoker.merged = true;
  def[hookKey] = invoker;
}

/*  */

function extractPropsFromVNodeData (
  data,
  Ctor,
  tag
) {
  // we are only extracting raw values here.
  // validation and default values are handled in the child
  // component itself.
  var propOptions = Ctor.options.props;
  if (isUndef(propOptions)) {
    return
  }
  var res = {};
  var attrs = data.attrs;
  var props = data.props;
  if (isDef(attrs) || isDef(props)) {
    for (var key in propOptions) {
      var altKey = hyphenate(key);
      if (true) {
        var keyInLowerCase = key.toLowerCase();
        if (
          key !== keyInLowerCase &&
          attrs && hasOwn(attrs, keyInLowerCase)
        ) {
          tip(
            "Prop \"" + keyInLowerCase + "\" is passed to component " +
            (formatComponentName(tag || Ctor)) + ", but the declared prop name is" +
            " \"" + key + "\". " +
            "Note that HTML attributes are case-insensitive and camelCased " +
            "props need to use their kebab-case equivalents when using in-DOM " +
            "templates. You should probably use \"" + altKey + "\" instead of \"" + key + "\"."
          );
        }
      }
      checkProp(res, props, key, altKey, true) ||
      checkProp(res, attrs, key, altKey, false);
    }
  }
  return res
}

function checkProp (
  res,
  hash,
  key,
  altKey,
  preserve
) {
  if (isDef(hash)) {
    if (hasOwn(hash, key)) {
      res[key] = hash[key];
      if (!preserve) {
        delete hash[key];
      }
      return true
    } else if (hasOwn(hash, altKey)) {
      res[key] = hash[altKey];
      if (!preserve) {
        delete hash[altKey];
      }
      return true
    }
  }
  return false
}

/*  */

// The template compiler attempts to minimize the need for normalization by
// statically analyzing the template at compile time.
//
// For plain HTML markup, normalization can be completely skipped because the
// generated render function is guaranteed to return Array<VNode>. There are
// two cases where extra normalization is needed:

// 1. When the children contains components - because a functional component
// may return an Array instead of a single root. In this case, just a simple
// normalization is needed - if any child is an Array, we flatten the whole
// thing with Array.prototype.concat. It is guaranteed to be only 1-level deep
// because functional components already normalize their own children.
function simpleNormalizeChildren (children) {
  for (var i = 0; i < children.length; i++) {
    if (Array.isArray(children[i])) {
      return Array.prototype.concat.apply([], children)
    }
  }
  return children
}

// 2. When the children contains constructs that always generated nested Arrays,
// e.g. <template>, <slot>, v-for, or when the children is provided by user
// with hand-written render functions / JSX. In such cases a full normalization
// is needed to cater to all possible types of children values.
function normalizeChildren (children) {
  return isPrimitive(children)
    ? [createTextVNode(children)]
    : Array.isArray(children)
      ? normalizeArrayChildren(children)
      : undefined
}

function isTextNode (node) {
  return isDef(node) && isDef(node.text) && isFalse(node.isComment)
}

function normalizeArrayChildren (children, nestedIndex) {
  var res = [];
  var i, c, lastIndex, last;
  for (i = 0; i < children.length; i++) {
    c = children[i];
    if (isUndef(c) || typeof c === 'boolean') { continue }
    lastIndex = res.length - 1;
    last = res[lastIndex];
    //  nested
    if (Array.isArray(c)) {
      if (c.length > 0) {
        c = normalizeArrayChildren(c, ((nestedIndex || '') + "_" + i));
        // merge adjacent text nodes
        if (isTextNode(c[0]) && isTextNode(last)) {
          res[lastIndex] = createTextVNode(last.text + (c[0]).text);
          c.shift();
        }
        res.push.apply(res, c);
      }
    } else if (isPrimitive(c)) {
      if (isTextNode(last)) {
        // merge adjacent text nodes
        // this is necessary for SSR hydration because text nodes are
        // essentially merged when rendered to HTML strings
        res[lastIndex] = createTextVNode(last.text + c);
      } else if (c !== '') {
        // convert primitive to vnode
        res.push(createTextVNode(c));
      }
    } else {
      if (isTextNode(c) && isTextNode(last)) {
        // merge adjacent text nodes
        res[lastIndex] = createTextVNode(last.text + c.text);
      } else {
        // default key for nested array children (likely generated by v-for)
        if (isTrue(children._isVList) &&
          isDef(c.tag) &&
          isUndef(c.key) &&
          isDef(nestedIndex)) {
          c.key = "__vlist" + nestedIndex + "_" + i + "__";
        }
        res.push(c);
      }
    }
  }
  return res
}

/*  */

function initProvide (vm) {
  var provide = vm.$options.provide;
  if (provide) {
    vm._provided = typeof provide === 'function'
      ? provide.call(vm)
      : provide;
  }
}

function initInjections (vm) {
  var result = resolveInject(vm.$options.inject, vm);
  if (result) {
    toggleObserving(false);
    Object.keys(result).forEach(function (key) {
      /* istanbul ignore else */
      if (true) {
        defineReactive$$1(vm, key, result[key], function () {
          warn(
            "Avoid mutating an injected value directly since the changes will be " +
            "overwritten whenever the provided component re-renders. " +
            "injection being mutated: \"" + key + "\"",
            vm
          );
        });
      } else {}
    });
    toggleObserving(true);
  }
}

function resolveInject (inject, vm) {
  if (inject) {
    // inject is :any because flow is not smart enough to figure out cached
    var result = Object.create(null);
    var keys = hasSymbol
      ? Reflect.ownKeys(inject)
      : Object.keys(inject);

    for (var i = 0; i < keys.length; i++) {
      var key = keys[i];
      // #6574 in case the inject object is observed...
      if (key === '__ob__') { continue }
      var provideKey = inject[key].from;
      var source = vm;
      while (source) {
        if (source._provided && hasOwn(source._provided, provideKey)) {
          result[key] = source._provided[provideKey];
          break
        }
        source = source.$parent;
      }
      if (!source) {
        if ('default' in inject[key]) {
          var provideDefault = inject[key].default;
          result[key] = typeof provideDefault === 'function'
            ? provideDefault.call(vm)
            : provideDefault;
        } else if (true) {
          warn(("Injection \"" + key + "\" not found"), vm);
        }
      }
    }
    return result
  }
}

/*  */



/**
 * Runtime helper for resolving raw children VNodes into a slot object.
 */
function resolveSlots (
  children,
  context
) {
  if (!children || !children.length) {
    return {}
  }
  var slots = {};
  for (var i = 0, l = children.length; i < l; i++) {
    var child = children[i];
    var data = child.data;
    // remove slot attribute if the node is resolved as a Vue slot node
    if (data && data.attrs && data.attrs.slot) {
      delete data.attrs.slot;
    }
    // named slots should only be respected if the vnode was rendered in the
    // same context.
    if ((child.context === context || child.fnContext === context) &&
      data && data.slot != null
    ) {
      var name = data.slot;
      var slot = (slots[name] || (slots[name] = []));
      if (child.tag === 'template') {
        slot.push.apply(slot, child.children || []);
      } else {
        slot.push(child);
      }
    } else {
      (slots.default || (slots.default = [])).push(child);
    }
  }
  // ignore slots that contains only whitespace
  for (var name$1 in slots) {
    if (slots[name$1].every(isWhitespace)) {
      delete slots[name$1];
    }
  }
  return slots
}

function isWhitespace (node) {
  return (node.isComment && !node.asyncFactory) || node.text === ' '
}

/*  */

function normalizeScopedSlots (
  slots,
  normalSlots,
  prevSlots
) {
  var res;
  var hasNormalSlots = Object.keys(normalSlots).length > 0;
  var isStable = slots ? !!slots.$stable : !hasNormalSlots;
  var key = slots && slots.$key;
  if (!slots) {
    res = {};
  } else if (slots._normalized) {
    // fast path 1: child component re-render only, parent did not change
    return slots._normalized
  } else if (
    isStable &&
    prevSlots &&
    prevSlots !== emptyObject &&
    key === prevSlots.$key &&
    !hasNormalSlots &&
    !prevSlots.$hasNormal
  ) {
    // fast path 2: stable scoped slots w/ no normal slots to proxy,
    // only need to normalize once
    return prevSlots
  } else {
    res = {};
    for (var key$1 in slots) {
      if (slots[key$1] && key$1[0] !== '$') {
        res[key$1] = normalizeScopedSlot(normalSlots, key$1, slots[key$1]);
      }
    }
  }
  // expose normal slots on scopedSlots
  for (var key$2 in normalSlots) {
    if (!(key$2 in res)) {
      res[key$2] = proxyNormalSlot(normalSlots, key$2);
    }
  }
  // avoriaz seems to mock a non-extensible $scopedSlots object
  // and when that is passed down this would cause an error
  if (slots && Object.isExtensible(slots)) {
    (slots)._normalized = res;
  }
  def(res, '$stable', isStable);
  def(res, '$key', key);
  def(res, '$hasNormal', hasNormalSlots);
  return res
}

function normalizeScopedSlot(normalSlots, key, fn) {
  var normalized = function () {
    var res = arguments.length ? fn.apply(null, arguments) : fn({});
    res = res && typeof res === 'object' && !Array.isArray(res)
      ? [res] // single vnode
      : normalizeChildren(res);
    return res && (
      res.length === 0 ||
      (res.length === 1 && res[0].isComment) // #9658
    ) ? undefined
      : res
  };
  // this is a slot using the new v-slot syntax without scope. although it is
  // compiled as a scoped slot, render fn users would expect it to be present
  // on this.$slots because the usage is semantically a normal slot.
  if (fn.proxy) {
    Object.defineProperty(normalSlots, key, {
      get: normalized,
      enumerable: true,
      configurable: true
    });
  }
  return normalized
}

function proxyNormalSlot(slots, key) {
  return function () { return slots[key]; }
}

/*  */

/**
 * Runtime helper for rendering v-for lists.
 */
function renderList (
  val,
  render
) {
  var ret, i, l, keys, key;
  if (Array.isArray(val) || typeof val === 'string') {
    ret = new Array(val.length);
    for (i = 0, l = val.length; i < l; i++) {
      ret[i] = render(val[i], i);
    }
  } else if (typeof val === 'number') {
    ret = new Array(val);
    for (i = 0; i < val; i++) {
      ret[i] = render(i + 1, i);
    }
  } else if (isObject(val)) {
    if (hasSymbol && val[Symbol.iterator]) {
      ret = [];
      var iterator = val[Symbol.iterator]();
      var result = iterator.next();
      while (!result.done) {
        ret.push(render(result.value, ret.length));
        result = iterator.next();
      }
    } else {
      keys = Object.keys(val);
      ret = new Array(keys.length);
      for (i = 0, l = keys.length; i < l; i++) {
        key = keys[i];
        ret[i] = render(val[key], key, i);
      }
    }
  }
  if (!isDef(ret)) {
    ret = [];
  }
  (ret)._isVList = true;
  return ret
}

/*  */

/**
 * Runtime helper for rendering <slot>
 */
function renderSlot (
  name,
  fallback,
  props,
  bindObject
) {
  var scopedSlotFn = this.$scopedSlots[name];
  var nodes;
  if (scopedSlotFn) { // scoped slot
    props = props || {};
    if (bindObject) {
      if ( true && !isObject(bindObject)) {
        warn(
          'slot v-bind without argument expects an Object',
          this
        );
      }
      props = extend(extend({}, bindObject), props);
    }
    nodes = scopedSlotFn(props) || fallback;
  } else {
    nodes = this.$slots[name] || fallback;
  }

  var target = props && props.slot;
  if (target) {
    return this.$createElement('template', { slot: target }, nodes)
  } else {
    return nodes
  }
}

/*  */

/**
 * Runtime helper for resolving filters
 */
function resolveFilter (id) {
  return resolveAsset(this.$options, 'filters', id, true) || identity
}

/*  */

function isKeyNotMatch (expect, actual) {
  if (Array.isArray(expect)) {
    return expect.indexOf(actual) === -1
  } else {
    return expect !== actual
  }
}

/**
 * Runtime helper for checking keyCodes from config.
 * exposed as Vue.prototype._k
 * passing in eventKeyName as last argument separately for backwards compat
 */
function checkKeyCodes (
  eventKeyCode,
  key,
  builtInKeyCode,
  eventKeyName,
  builtInKeyName
) {
  var mappedKeyCode = config.keyCodes[key] || builtInKeyCode;
  if (builtInKeyName && eventKeyName && !config.keyCodes[key]) {
    return isKeyNotMatch(builtInKeyName, eventKeyName)
  } else if (mappedKeyCode) {
    return isKeyNotMatch(mappedKeyCode, eventKeyCode)
  } else if (eventKeyName) {
    return hyphenate(eventKeyName) !== key
  }
}

/*  */

/**
 * Runtime helper for merging v-bind="object" into a VNode's data.
 */
function bindObjectProps (
  data,
  tag,
  value,
  asProp,
  isSync
) {
  if (value) {
    if (!isObject(value)) {
       true && warn(
        'v-bind without argument expects an Object or Array value',
        this
      );
    } else {
      if (Array.isArray(value)) {
        value = toObject(value);
      }
      var hash;
      var loop = function ( key ) {
        if (
          key === 'class' ||
          key === 'style' ||
          isReservedAttribute(key)
        ) {
          hash = data;
        } else {
          var type = data.attrs && data.attrs.type;
          hash = asProp || config.mustUseProp(tag, type, key)
            ? data.domProps || (data.domProps = {})
            : data.attrs || (data.attrs = {});
        }
        var camelizedKey = camelize(key);
        var hyphenatedKey = hyphenate(key);
        if (!(camelizedKey in hash) && !(hyphenatedKey in hash)) {
          hash[key] = value[key];

          if (isSync) {
            var on = data.on || (data.on = {});
            on[("update:" + key)] = function ($event) {
              value[key] = $event;
            };
          }
        }
      };

      for (var key in value) loop( key );
    }
  }
  return data
}

/*  */

/**
 * Runtime helper for rendering static trees.
 */
function renderStatic (
  index,
  isInFor
) {
  var cached = this._staticTrees || (this._staticTrees = []);
  var tree = cached[index];
  // if has already-rendered static tree and not inside v-for,
  // we can reuse the same tree.
  if (tree && !isInFor) {
    return tree
  }
  // otherwise, render a fresh tree.
  tree = cached[index] = this.$options.staticRenderFns[index].call(
    this._renderProxy,
    null,
    this // for render fns generated for functional component templates
  );
  markStatic(tree, ("__static__" + index), false);
  return tree
}

/**
 * Runtime helper for v-once.
 * Effectively it means marking the node as static with a unique key.
 */
function markOnce (
  tree,
  index,
  key
) {
  markStatic(tree, ("__once__" + index + (key ? ("_" + key) : "")), true);
  return tree
}

function markStatic (
  tree,
  key,
  isOnce
) {
  if (Array.isArray(tree)) {
    for (var i = 0; i < tree.length; i++) {
      if (tree[i] && typeof tree[i] !== 'string') {
        markStaticNode(tree[i], (key + "_" + i), isOnce);
      }
    }
  } else {
    markStaticNode(tree, key, isOnce);
  }
}

function markStaticNode (node, key, isOnce) {
  node.isStatic = true;
  node.key = key;
  node.isOnce = isOnce;
}

/*  */

function bindObjectListeners (data, value) {
  if (value) {
    if (!isPlainObject(value)) {
       true && warn(
        'v-on without argument expects an Object value',
        this
      );
    } else {
      var on = data.on = data.on ? extend({}, data.on) : {};
      for (var key in value) {
        var existing = on[key];
        var ours = value[key];
        on[key] = existing ? [].concat(existing, ours) : ours;
      }
    }
  }
  return data
}

/*  */

function resolveScopedSlots (
  fns, // see flow/vnode
  res,
  // the following are added in 2.6
  hasDynamicKeys,
  contentHashKey
) {
  res = res || { $stable: !hasDynamicKeys };
  for (var i = 0; i < fns.length; i++) {
    var slot = fns[i];
    if (Array.isArray(slot)) {
      resolveScopedSlots(slot, res, hasDynamicKeys);
    } else if (slot) {
      // marker for reverse proxying v-slot without scope on this.$slots
      if (slot.proxy) {
        slot.fn.proxy = true;
      }
      res[slot.key] = slot.fn;
    }
  }
  if (contentHashKey) {
    (res).$key = contentHashKey;
  }
  return res
}

/*  */

function bindDynamicKeys (baseObj, values) {
  for (var i = 0; i < values.length; i += 2) {
    var key = values[i];
    if (typeof key === 'string' && key) {
      baseObj[values[i]] = values[i + 1];
    } else if ( true && key !== '' && key !== null) {
      // null is a special value for explicitly removing a binding
      warn(
        ("Invalid value for dynamic directive argument (expected string or null): " + key),
        this
      );
    }
  }
  return baseObj
}

// helper to dynamically append modifier runtime markers to event names.
// ensure only append when value is already string, otherwise it will be cast
// to string and cause the type check to miss.
function prependModifier (value, symbol) {
  return typeof value === 'string' ? symbol + value : value
}

/*  */

function installRenderHelpers (target) {
  target._o = markOnce;
  target._n = toNumber;
  target._s = toString;
  target._l = renderList;
  target._t = renderSlot;
  target._q = looseEqual;
  target._i = looseIndexOf;
  target._m = renderStatic;
  target._f = resolveFilter;
  target._k = checkKeyCodes;
  target._b = bindObjectProps;
  target._v = createTextVNode;
  target._e = createEmptyVNode;
  target._u = resolveScopedSlots;
  target._g = bindObjectListeners;
  target._d = bindDynamicKeys;
  target._p = prependModifier;
}

/*  */

function FunctionalRenderContext (
  data,
  props,
  children,
  parent,
  Ctor
) {
  var this$1 = this;

  var options = Ctor.options;
  // ensure the createElement function in functional components
  // gets a unique context - this is necessary for correct named slot check
  var contextVm;
  if (hasOwn(parent, '_uid')) {
    contextVm = Object.create(parent);
    // $flow-disable-line
    contextVm._original = parent;
  } else {
    // the context vm passed in is a functional context as well.
    // in this case we want to make sure we are able to get a hold to the
    // real context instance.
    contextVm = parent;
    // $flow-disable-line
    parent = parent._original;
  }
  var isCompiled = isTrue(options._compiled);
  var needNormalization = !isCompiled;

  this.data = data;
  this.props = props;
  this.children = children;
  this.parent = parent;
  this.listeners = data.on || emptyObject;
  this.injections = resolveInject(options.inject, parent);
  this.slots = function () {
    if (!this$1.$slots) {
      normalizeScopedSlots(
        data.scopedSlots,
        this$1.$slots = resolveSlots(children, parent)
      );
    }
    return this$1.$slots
  };

  Object.defineProperty(this, 'scopedSlots', ({
    enumerable: true,
    get: function get () {
      return normalizeScopedSlots(data.scopedSlots, this.slots())
    }
  }));

  // support for compiled functional template
  if (isCompiled) {
    // exposing $options for renderStatic()
    this.$options = options;
    // pre-resolve slots for renderSlot()
    this.$slots = this.slots();
    this.$scopedSlots = normalizeScopedSlots(data.scopedSlots, this.$slots);
  }

  if (options._scopeId) {
    this._c = function (a, b, c, d) {
      var vnode = createElement(contextVm, a, b, c, d, needNormalization);
      if (vnode && !Array.isArray(vnode)) {
        vnode.fnScopeId = options._scopeId;
        vnode.fnContext = parent;
      }
      return vnode
    };
  } else {
    this._c = function (a, b, c, d) { return createElement(contextVm, a, b, c, d, needNormalization); };
  }
}

installRenderHelpers(FunctionalRenderContext.prototype);

function createFunctionalComponent (
  Ctor,
  propsData,
  data,
  contextVm,
  children
) {
  var options = Ctor.options;
  var props = {};
  var propOptions = options.props;
  if (isDef(propOptions)) {
    for (var key in propOptions) {
      props[key] = validateProp(key, propOptions, propsData || emptyObject);
    }
  } else {
    if (isDef(data.attrs)) { mergeProps(props, data.attrs); }
    if (isDef(data.props)) { mergeProps(props, data.props); }
  }

  var renderContext = new FunctionalRenderContext(
    data,
    props,
    children,
    contextVm,
    Ctor
  );

  var vnode = options.render.call(null, renderContext._c, renderContext);

  if (vnode instanceof VNode) {
    return cloneAndMarkFunctionalResult(vnode, data, renderContext.parent, options, renderContext)
  } else if (Array.isArray(vnode)) {
    var vnodes = normalizeChildren(vnode) || [];
    var res = new Array(vnodes.length);
    for (var i = 0; i < vnodes.length; i++) {
      res[i] = cloneAndMarkFunctionalResult(vnodes[i], data, renderContext.parent, options, renderContext);
    }
    return res
  }
}

function cloneAndMarkFunctionalResult (vnode, data, contextVm, options, renderContext) {
  // #7817 clone node before setting fnContext, otherwise if the node is reused
  // (e.g. it was from a cached normal slot) the fnContext causes named slots
  // that should not be matched to match.
  var clone = cloneVNode(vnode);
  clone.fnContext = contextVm;
  clone.fnOptions = options;
  if (true) {
    (clone.devtoolsMeta = clone.devtoolsMeta || {}).renderContext = renderContext;
  }
  if (data.slot) {
    (clone.data || (clone.data = {})).slot = data.slot;
  }
  return clone
}

function mergeProps (to, from) {
  for (var key in from) {
    to[camelize(key)] = from[key];
  }
}

/*  */

/*  */

/*  */

/*  */

// inline hooks to be invoked on component VNodes during patch
var componentVNodeHooks = {
  init: function init (vnode, hydrating) {
    if (
      vnode.componentInstance &&
      !vnode.componentInstance._isDestroyed &&
      vnode.data.keepAlive
    ) {
      // kept-alive components, treat as a patch
      var mountedNode = vnode; // work around flow
      componentVNodeHooks.prepatch(mountedNode, mountedNode);
    } else {
      var child = vnode.componentInstance = createComponentInstanceForVnode(
        vnode,
        activeInstance
      );
      child.$mount(hydrating ? vnode.elm : undefined, hydrating);
    }
  },

  prepatch: function prepatch (oldVnode, vnode) {
    var options = vnode.componentOptions;
    var child = vnode.componentInstance = oldVnode.componentInstance;
    updateChildComponent(
      child,
      options.propsData, // updated props
      options.listeners, // updated listeners
      vnode, // new parent vnode
      options.children // new children
    );
  },

  insert: function insert (vnode) {
    var context = vnode.context;
    var componentInstance = vnode.componentInstance;
    if (!componentInstance._isMounted) {
      componentInstance._isMounted = true;
      callHook(componentInstance, 'mounted');
    }
    if (vnode.data.keepAlive) {
      if (context._isMounted) {
        // vue-router#1212
        // During updates, a kept-alive component's child components may
        // change, so directly walking the tree here may call activated hooks
        // on incorrect children. Instead we push them into a queue which will
        // be processed after the whole patch process ended.
        queueActivatedComponent(componentInstance);
      } else {
        activateChildComponent(componentInstance, true /* direct */);
      }
    }
  },

  destroy: function destroy (vnode) {
    var componentInstance = vnode.componentInstance;
    if (!componentInstance._isDestroyed) {
      if (!vnode.data.keepAlive) {
        componentInstance.$destroy();
      } else {
        deactivateChildComponent(componentInstance, true /* direct */);
      }
    }
  }
};

var hooksToMerge = Object.keys(componentVNodeHooks);

function createComponent (
  Ctor,
  data,
  context,
  children,
  tag
) {
  if (isUndef(Ctor)) {
    return
  }

  var baseCtor = context.$options._base;

  // plain options object: turn it into a constructor
  if (isObject(Ctor)) {
    Ctor = baseCtor.extend(Ctor);
  }

  // if at this stage it's not a constructor or an async component factory,
  // reject.
  if (typeof Ctor !== 'function') {
    if (true) {
      warn(("Invalid Component definition: " + (String(Ctor))), context);
    }
    return
  }

  // async component
  var asyncFactory;
  if (isUndef(Ctor.cid)) {
    asyncFactory = Ctor;
    Ctor = resolveAsyncComponent(asyncFactory, baseCtor);
    if (Ctor === undefined) {
      // return a placeholder node for async component, which is rendered
      // as a comment node but preserves all the raw information for the node.
      // the information will be used for async server-rendering and hydration.
      return createAsyncPlaceholder(
        asyncFactory,
        data,
        context,
        children,
        tag
      )
    }
  }

  data = data || {};

  // resolve constructor options in case global mixins are applied after
  // component constructor creation
  resolveConstructorOptions(Ctor);

  // transform component v-model data into props & events
  if (isDef(data.model)) {
    transformModel(Ctor.options, data);
  }

  // extract props
  var propsData = extractPropsFromVNodeData(data, Ctor, tag);

  // functional component
  if (isTrue(Ctor.options.functional)) {
    return createFunctionalComponent(Ctor, propsData, data, context, children)
  }

  // extract listeners, since these needs to be treated as
  // child component listeners instead of DOM listeners
  var listeners = data.on;
  // replace with listeners with .native modifier
  // so it gets processed during parent component patch.
  data.on = data.nativeOn;

  if (isTrue(Ctor.options.abstract)) {
    // abstract components do not keep anything
    // other than props & listeners & slot

    // work around flow
    var slot = data.slot;
    data = {};
    if (slot) {
      data.slot = slot;
    }
  }

  // install component management hooks onto the placeholder node
  installComponentHooks(data);

  // return a placeholder vnode
  var name = Ctor.options.name || tag;
  var vnode = new VNode(
    ("vue-component-" + (Ctor.cid) + (name ? ("-" + name) : '')),
    data, undefined, undefined, undefined, context,
    { Ctor: Ctor, propsData: propsData, listeners: listeners, tag: tag, children: children },
    asyncFactory
  );

  return vnode
}

function createComponentInstanceForVnode (
  vnode, // we know it's MountedComponentVNode but flow doesn't
  parent // activeInstance in lifecycle state
) {
  var options = {
    _isComponent: true,
    _parentVnode: vnode,
    parent: parent
  };
  // check inline-template render functions
  var inlineTemplate = vnode.data.inlineTemplate;
  if (isDef(inlineTemplate)) {
    options.render = inlineTemplate.render;
    options.staticRenderFns = inlineTemplate.staticRenderFns;
  }
  return new vnode.componentOptions.Ctor(options)
}

function installComponentHooks (data) {
  var hooks = data.hook || (data.hook = {});
  for (var i = 0; i < hooksToMerge.length; i++) {
    var key = hooksToMerge[i];
    var existing = hooks[key];
    var toMerge = componentVNodeHooks[key];
    if (existing !== toMerge && !(existing && existing._merged)) {
      hooks[key] = existing ? mergeHook$1(toMerge, existing) : toMerge;
    }
  }
}

function mergeHook$1 (f1, f2) {
  var merged = function (a, b) {
    // flow complains about extra args which is why we use any
    f1(a, b);
    f2(a, b);
  };
  merged._merged = true;
  return merged
}

// transform component v-model info (value and callback) into
// prop and event handler respectively.
function transformModel (options, data) {
  var prop = (options.model && options.model.prop) || 'value';
  var event = (options.model && options.model.event) || 'input'
  ;(data.attrs || (data.attrs = {}))[prop] = data.model.value;
  var on = data.on || (data.on = {});
  var existing = on[event];
  var callback = data.model.callback;
  if (isDef(existing)) {
    if (
      Array.isArray(existing)
        ? existing.indexOf(callback) === -1
        : existing !== callback
    ) {
      on[event] = [callback].concat(existing);
    }
  } else {
    on[event] = callback;
  }
}

/*  */

var SIMPLE_NORMALIZE = 1;
var ALWAYS_NORMALIZE = 2;

// wrapper function for providing a more flexible interface
// without getting yelled at by flow
function createElement (
  context,
  tag,
  data,
  children,
  normalizationType,
  alwaysNormalize
) {
  if (Array.isArray(data) || isPrimitive(data)) {
    normalizationType = children;
    children = data;
    data = undefined;
  }
  if (isTrue(alwaysNormalize)) {
    normalizationType = ALWAYS_NORMALIZE;
  }
  return _createElement(context, tag, data, children, normalizationType)
}

function _createElement (
  context,
  tag,
  data,
  children,
  normalizationType
) {
  if (isDef(data) && isDef((data).__ob__)) {
     true && warn(
      "Avoid using observed data object as vnode data: " + (JSON.stringify(data)) + "\n" +
      'Always create fresh vnode data objects in each render!',
      context
    );
    return createEmptyVNode()
  }
  // object syntax in v-bind
  if (isDef(data) && isDef(data.is)) {
    tag = data.is;
  }
  if (!tag) {
    // in case of component :is set to falsy value
    return createEmptyVNode()
  }
  // warn against non-primitive key
  if ( true &&
    isDef(data) && isDef(data.key) && !isPrimitive(data.key)
  ) {
    {
      warn(
        'Avoid using non-primitive value as key, ' +
        'use string/number value instead.',
        context
      );
    }
  }
  // support single function children as default scoped slot
  if (Array.isArray(children) &&
    typeof children[0] === 'function'
  ) {
    data = data || {};
    data.scopedSlots = { default: children[0] };
    children.length = 0;
  }
  if (normalizationType === ALWAYS_NORMALIZE) {
    children = normalizeChildren(children);
  } else if (normalizationType === SIMPLE_NORMALIZE) {
    children = simpleNormalizeChildren(children);
  }
  var vnode, ns;
  if (typeof tag === 'string') {
    var Ctor;
    ns = (context.$vnode && context.$vnode.ns) || config.getTagNamespace(tag);
    if (config.isReservedTag(tag)) {
      // platform built-in elements
      if ( true && isDef(data) && isDef(data.nativeOn)) {
        warn(
          ("The .native modifier for v-on is only valid on components but it was used on <" + tag + ">."),
          context
        );
      }
      vnode = new VNode(
        config.parsePlatformTagName(tag), data, children,
        undefined, undefined, context
      );
    } else if ((!data || !data.pre) && isDef(Ctor = resolveAsset(context.$options, 'components', tag))) {
      // component
      vnode = createComponent(Ctor, data, context, children, tag);
    } else {
      // unknown or unlisted namespaced elements
      // check at runtime because it may get assigned a namespace when its
      // parent normalizes children
      vnode = new VNode(
        tag, data, children,
        undefined, undefined, context
      );
    }
  } else {
    // direct component options / constructor
    vnode = createComponent(tag, data, context, children);
  }
  if (Array.isArray(vnode)) {
    return vnode
  } else if (isDef(vnode)) {
    if (isDef(ns)) { applyNS(vnode, ns); }
    if (isDef(data)) { registerDeepBindings(data); }
    return vnode
  } else {
    return createEmptyVNode()
  }
}

function applyNS (vnode, ns, force) {
  vnode.ns = ns;
  if (vnode.tag === 'foreignObject') {
    // use default namespace inside foreignObject
    ns = undefined;
    force = true;
  }
  if (isDef(vnode.children)) {
    for (var i = 0, l = vnode.children.length; i < l; i++) {
      var child = vnode.children[i];
      if (isDef(child.tag) && (
        isUndef(child.ns) || (isTrue(force) && child.tag !== 'svg'))) {
        applyNS(child, ns, force);
      }
    }
  }
}

// ref #5318
// necessary to ensure parent re-render when deep bindings like :style and
// :class are used on slot nodes
function registerDeepBindings (data) {
  if (isObject(data.style)) {
    traverse(data.style);
  }
  if (isObject(data.class)) {
    traverse(data.class);
  }
}

/*  */

function initRender (vm) {
  vm._vnode = null; // the root of the child tree
  vm._staticTrees = null; // v-once cached trees
  var options = vm.$options;
  var parentVnode = vm.$vnode = options._parentVnode; // the placeholder node in parent tree
  var renderContext = parentVnode && parentVnode.context;
  vm.$slots = resolveSlots(options._renderChildren, renderContext);
  vm.$scopedSlots = emptyObject;
  // bind the createElement fn to this instance
  // so that we get proper render context inside it.
  // args order: tag, data, children, normalizationType, alwaysNormalize
  // internal version is used by render functions compiled from templates
  vm._c = function (a, b, c, d) { return createElement(vm, a, b, c, d, false); };
  // normalization is always applied for the public version, used in
  // user-written render functions.
  vm.$createElement = function (a, b, c, d) { return createElement(vm, a, b, c, d, true); };

  // $attrs & $listeners are exposed for easier HOC creation.
  // they need to be reactive so that HOCs using them are always updated
  var parentData = parentVnode && parentVnode.data;

  /* istanbul ignore else */
  if (true) {
    defineReactive$$1(vm, '$attrs', parentData && parentData.attrs || emptyObject, function () {
      !isUpdatingChildComponent && warn("$attrs is readonly.", vm);
    }, true);
    defineReactive$$1(vm, '$listeners', options._parentListeners || emptyObject, function () {
      !isUpdatingChildComponent && warn("$listeners is readonly.", vm);
    }, true);
  } else {}
}

var currentRenderingInstance = null;

function renderMixin (Vue) {
  // install runtime convenience helpers
  installRenderHelpers(Vue.prototype);

  Vue.prototype.$nextTick = function (fn) {
    return nextTick(fn, this)
  };

  Vue.prototype._render = function () {
    var vm = this;
    var ref = vm.$options;
    var render = ref.render;
    var _parentVnode = ref._parentVnode;

    if (_parentVnode) {
      vm.$scopedSlots = normalizeScopedSlots(
        _parentVnode.data.scopedSlots,
        vm.$slots,
        vm.$scopedSlots
      );
    }

    // set parent vnode. this allows render functions to have access
    // to the data on the placeholder node.
    vm.$vnode = _parentVnode;
    // render self
    var vnode;
    try {
      // There's no need to maintain a stack because all render fns are called
      // separately from one another. Nested component's render fns are called
      // when parent component is patched.
      currentRenderingInstance = vm;
      vnode = render.call(vm._renderProxy, vm.$createElement);
    } catch (e) {
      handleError(e, vm, "render");
      // return error render result,
      // or previous vnode to prevent render error causing blank component
      /* istanbul ignore else */
      if ( true && vm.$options.renderError) {
        try {
          vnode = vm.$options.renderError.call(vm._renderProxy, vm.$createElement, e);
        } catch (e) {
          handleError(e, vm, "renderError");
          vnode = vm._vnode;
        }
      } else {
        vnode = vm._vnode;
      }
    } finally {
      currentRenderingInstance = null;
    }
    // if the returned array contains only a single node, allow it
    if (Array.isArray(vnode) && vnode.length === 1) {
      vnode = vnode[0];
    }
    // return empty vnode in case the render function errored out
    if (!(vnode instanceof VNode)) {
      if ( true && Array.isArray(vnode)) {
        warn(
          'Multiple root nodes returned from render function. Render function ' +
          'should return a single root node.',
          vm
        );
      }
      vnode = createEmptyVNode();
    }
    // set parent
    vnode.parent = _parentVnode;
    return vnode
  };
}

/*  */

function ensureCtor (comp, base) {
  if (
    comp.__esModule ||
    (hasSymbol && comp[Symbol.toStringTag] === 'Module')
  ) {
    comp = comp.default;
  }
  return isObject(comp)
    ? base.extend(comp)
    : comp
}

function createAsyncPlaceholder (
  factory,
  data,
  context,
  children,
  tag
) {
  var node = createEmptyVNode();
  node.asyncFactory = factory;
  node.asyncMeta = { data: data, context: context, children: children, tag: tag };
  return node
}

function resolveAsyncComponent (
  factory,
  baseCtor
) {
  if (isTrue(factory.error) && isDef(factory.errorComp)) {
    return factory.errorComp
  }

  if (isDef(factory.resolved)) {
    return factory.resolved
  }

  var owner = currentRenderingInstance;
  if (owner && isDef(factory.owners) && factory.owners.indexOf(owner) === -1) {
    // already pending
    factory.owners.push(owner);
  }

  if (isTrue(factory.loading) && isDef(factory.loadingComp)) {
    return factory.loadingComp
  }

  if (owner && !isDef(factory.owners)) {
    var owners = factory.owners = [owner];
    var sync = true;
    var timerLoading = null;
    var timerTimeout = null

    ;(owner).$on('hook:destroyed', function () { return remove(owners, owner); });

    var forceRender = function (renderCompleted) {
      for (var i = 0, l = owners.length; i < l; i++) {
        (owners[i]).$forceUpdate();
      }

      if (renderCompleted) {
        owners.length = 0;
        if (timerLoading !== null) {
          clearTimeout(timerLoading);
          timerLoading = null;
        }
        if (timerTimeout !== null) {
          clearTimeout(timerTimeout);
          timerTimeout = null;
        }
      }
    };

    var resolve = once(function (res) {
      // cache resolved
      factory.resolved = ensureCtor(res, baseCtor);
      // invoke callbacks only if this is not a synchronous resolve
      // (async resolves are shimmed as synchronous during SSR)
      if (!sync) {
        forceRender(true);
      } else {
        owners.length = 0;
      }
    });

    var reject = once(function (reason) {
       true && warn(
        "Failed to resolve async component: " + (String(factory)) +
        (reason ? ("\nReason: " + reason) : '')
      );
      if (isDef(factory.errorComp)) {
        factory.error = true;
        forceRender(true);
      }
    });

    var res = factory(resolve, reject);

    if (isObject(res)) {
      if (isPromise(res)) {
        // () => Promise
        if (isUndef(factory.resolved)) {
          res.then(resolve, reject);
        }
      } else if (isPromise(res.component)) {
        res.component.then(resolve, reject);

        if (isDef(res.error)) {
          factory.errorComp = ensureCtor(res.error, baseCtor);
        }

        if (isDef(res.loading)) {
          factory.loadingComp = ensureCtor(res.loading, baseCtor);
          if (res.delay === 0) {
            factory.loading = true;
          } else {
            timerLoading = setTimeout(function () {
              timerLoading = null;
              if (isUndef(factory.resolved) && isUndef(factory.error)) {
                factory.loading = true;
                forceRender(false);
              }
            }, res.delay || 200);
          }
        }

        if (isDef(res.timeout)) {
          timerTimeout = setTimeout(function () {
            timerTimeout = null;
            if (isUndef(factory.resolved)) {
              reject(
                 true
                  ? ("timeout (" + (res.timeout) + "ms)")
                  : undefined
              );
            }
          }, res.timeout);
        }
      }
    }

    sync = false;
    // return in case resolved synchronously
    return factory.loading
      ? factory.loadingComp
      : factory.resolved
  }
}

/*  */

function isAsyncPlaceholder (node) {
  return node.isComment && node.asyncFactory
}

/*  */

function getFirstComponentChild (children) {
  if (Array.isArray(children)) {
    for (var i = 0; i < children.length; i++) {
      var c = children[i];
      if (isDef(c) && (isDef(c.componentOptions) || isAsyncPlaceholder(c))) {
        return c
      }
    }
  }
}

/*  */

/*  */

function initEvents (vm) {
  vm._events = Object.create(null);
  vm._hasHookEvent = false;
  // init parent attached events
  var listeners = vm.$options._parentListeners;
  if (listeners) {
    updateComponentListeners(vm, listeners);
  }
}

var target;

function add (event, fn) {
  target.$on(event, fn);
}

function remove$1 (event, fn) {
  target.$off(event, fn);
}

function createOnceHandler (event, fn) {
  var _target = target;
  return function onceHandler () {
    var res = fn.apply(null, arguments);
    if (res !== null) {
      _target.$off(event, onceHandler);
    }
  }
}

function updateComponentListeners (
  vm,
  listeners,
  oldListeners
) {
  target = vm;
  updateListeners(listeners, oldListeners || {}, add, remove$1, createOnceHandler, vm);
  target = undefined;
}

function eventsMixin (Vue) {
  var hookRE = /^hook:/;
  Vue.prototype.$on = function (event, fn) {
    var vm = this;
    if (Array.isArray(event)) {
      for (var i = 0, l = event.length; i < l; i++) {
        vm.$on(event[i], fn);
      }
    } else {
      (vm._events[event] || (vm._events[event] = [])).push(fn);
      // optimize hook:event cost by using a boolean flag marked at registration
      // instead of a hash lookup
      if (hookRE.test(event)) {
        vm._hasHookEvent = true;
      }
    }
    return vm
  };

  Vue.prototype.$once = function (event, fn) {
    var vm = this;
    function on () {
      vm.$off(event, on);
      fn.apply(vm, arguments);
    }
    on.fn = fn;
    vm.$on(event, on);
    return vm
  };

  Vue.prototype.$off = function (event, fn) {
    var vm = this;
    // all
    if (!arguments.length) {
      vm._events = Object.create(null);
      return vm
    }
    // array of events
    if (Array.isArray(event)) {
      for (var i$1 = 0, l = event.length; i$1 < l; i$1++) {
        vm.$off(event[i$1], fn);
      }
      return vm
    }
    // specific event
    var cbs = vm._events[event];
    if (!cbs) {
      return vm
    }
    if (!fn) {
      vm._events[event] = null;
      return vm
    }
    // specific handler
    var cb;
    var i = cbs.length;
    while (i--) {
      cb = cbs[i];
      if (cb === fn || cb.fn === fn) {
        cbs.splice(i, 1);
        break
      }
    }
    return vm
  };

  Vue.prototype.$emit = function (event) {
    var vm = this;
    if (true) {
      var lowerCaseEvent = event.toLowerCase();
      if (lowerCaseEvent !== event && vm._events[lowerCaseEvent]) {
        tip(
          "Event \"" + lowerCaseEvent + "\" is emitted in component " +
          (formatComponentName(vm)) + " but the handler is registered for \"" + event + "\". " +
          "Note that HTML attributes are case-insensitive and you cannot use " +
          "v-on to listen to camelCase events when using in-DOM templates. " +
          "You should probably use \"" + (hyphenate(event)) + "\" instead of \"" + event + "\"."
        );
      }
    }
    var cbs = vm._events[event];
    if (cbs) {
      cbs = cbs.length > 1 ? toArray(cbs) : cbs;
      var args = toArray(arguments, 1);
      var info = "event handler for \"" + event + "\"";
      for (var i = 0, l = cbs.length; i < l; i++) {
        invokeWithErrorHandling(cbs[i], vm, args, vm, info);
      }
    }
    return vm
  };
}

/*  */

var activeInstance = null;
var isUpdatingChildComponent = false;

function setActiveInstance(vm) {
  var prevActiveInstance = activeInstance;
  activeInstance = vm;
  return function () {
    activeInstance = prevActiveInstance;
  }
}

function initLifecycle (vm) {
  var options = vm.$options;

  // locate first non-abstract parent
  var parent = options.parent;
  if (parent && !options.abstract) {
    while (parent.$options.abstract && parent.$parent) {
      parent = parent.$parent;
    }
    parent.$children.push(vm);
  }

  vm.$parent = parent;
  vm.$root = parent ? parent.$root : vm;

  vm.$children = [];
  vm.$refs = {};

  vm._watcher = null;
  vm._inactive = null;
  vm._directInactive = false;
  vm._isMounted = false;
  vm._isDestroyed = false;
  vm._isBeingDestroyed = false;
}

function lifecycleMixin (Vue) {
  Vue.prototype._update = function (vnode, hydrating) {
    var vm = this;
    var prevEl = vm.$el;
    var prevVnode = vm._vnode;
    var restoreActiveInstance = setActiveInstance(vm);
    vm._vnode = vnode;
    // Vue.prototype.__patch__ is injected in entry points
    // based on the rendering backend used.
    if (!prevVnode) {
      // initial render
      vm.$el = vm.__patch__(vm.$el, vnode, hydrating, false /* removeOnly */);
    } else {
      // updates
      vm.$el = vm.__patch__(prevVnode, vnode);
    }
    restoreActiveInstance();
    // update __vue__ reference
    if (prevEl) {
      prevEl.__vue__ = null;
    }
    if (vm.$el) {
      vm.$el.__vue__ = vm;
    }
    // if parent is an HOC, update its $el as well
    if (vm.$vnode && vm.$parent && vm.$vnode === vm.$parent._vnode) {
      vm.$parent.$el = vm.$el;
    }
    // updated hook is called by the scheduler to ensure that children are
    // updated in a parent's updated hook.
  };

  Vue.prototype.$forceUpdate = function () {
    var vm = this;
    if (vm._watcher) {
      vm._watcher.update();
    }
  };

  Vue.prototype.$destroy = function () {
    var vm = this;
    if (vm._isBeingDestroyed) {
      return
    }
    callHook(vm, 'beforeDestroy');
    vm._isBeingDestroyed = true;
    // remove self from parent
    var parent = vm.$parent;
    if (parent && !parent._isBeingDestroyed && !vm.$options.abstract) {
      remove(parent.$children, vm);
    }
    // teardown watchers
    if (vm._watcher) {
      vm._watcher.teardown();
    }
    var i = vm._watchers.length;
    while (i--) {
      vm._watchers[i].teardown();
    }
    // remove reference from data ob
    // frozen object may not have observer.
    if (vm._data.__ob__) {
      vm._data.__ob__.vmCount--;
    }
    // call the last hook...
    vm._isDestroyed = true;
    // invoke destroy hooks on current rendered tree
    vm.__patch__(vm._vnode, null);
    // fire destroyed hook
    callHook(vm, 'destroyed');
    // turn off all instance listeners.
    vm.$off();
    // remove __vue__ reference
    if (vm.$el) {
      vm.$el.__vue__ = null;
    }
    // release circular reference (#6759)
    if (vm.$vnode) {
      vm.$vnode.parent = null;
    }
  };
}

function mountComponent (
  vm,
  el,
  hydrating
) {
  vm.$el = el;
  if (!vm.$options.render) {
    vm.$options.render = createEmptyVNode;
    if (true) {
      /* istanbul ignore if */
      if ((vm.$options.template && vm.$options.template.charAt(0) !== '#') ||
        vm.$options.el || el) {
        warn(
          'You are using the runtime-only build of Vue where the template ' +
          'compiler is not available. Either pre-compile the templates into ' +
          'render functions, or use the compiler-included build.',
          vm
        );
      } else {
        warn(
          'Failed to mount component: template or render function not defined.',
          vm
        );
      }
    }
  }
  callHook(vm, 'beforeMount');

  var updateComponent;
  /* istanbul ignore if */
  if ( true && config.performance && mark) {
    updateComponent = function () {
      var name = vm._name;
      var id = vm._uid;
      var startTag = "vue-perf-start:" + id;
      var endTag = "vue-perf-end:" + id;

      mark(startTag);
      var vnode = vm._render();
      mark(endTag);
      measure(("vue " + name + " render"), startTag, endTag);

      mark(startTag);
      vm._update(vnode, hydrating);
      mark(endTag);
      measure(("vue " + name + " patch"), startTag, endTag);
    };
  } else {
    updateComponent = function () {
      vm._update(vm._render(), hydrating);
    };
  }

  // we set this to vm._watcher inside the watcher's constructor
  // since the watcher's initial patch may call $forceUpdate (e.g. inside child
  // component's mounted hook), which relies on vm._watcher being already defined
  new Watcher(vm, updateComponent, noop, {
    before: function before () {
      if (vm._isMounted && !vm._isDestroyed) {
        callHook(vm, 'beforeUpdate');
      }
    }
  }, true /* isRenderWatcher */);
  hydrating = false;

  // manually mounted instance, call mounted on self
  // mounted is called for render-created child components in its inserted hook
  if (vm.$vnode == null) {
    vm._isMounted = true;
    callHook(vm, 'mounted');
  }
  return vm
}

function updateChildComponent (
  vm,
  propsData,
  listeners,
  parentVnode,
  renderChildren
) {
  if (true) {
    isUpdatingChildComponent = true;
  }

  // determine whether component has slot children
  // we need to do this before overwriting $options._renderChildren.

  // check if there are dynamic scopedSlots (hand-written or compiled but with
  // dynamic slot names). Static scoped slots compiled from template has the
  // "$stable" marker.
  var newScopedSlots = parentVnode.data.scopedSlots;
  var oldScopedSlots = vm.$scopedSlots;
  var hasDynamicScopedSlot = !!(
    (newScopedSlots && !newScopedSlots.$stable) ||
    (oldScopedSlots !== emptyObject && !oldScopedSlots.$stable) ||
    (newScopedSlots && vm.$scopedSlots.$key !== newScopedSlots.$key)
  );

  // Any static slot children from the parent may have changed during parent's
  // update. Dynamic scoped slots may also have changed. In such cases, a forced
  // update is necessary to ensure correctness.
  var needsForceUpdate = !!(
    renderChildren ||               // has new static slots
    vm.$options._renderChildren ||  // has old static slots
    hasDynamicScopedSlot
  );

  vm.$options._parentVnode = parentVnode;
  vm.$vnode = parentVnode; // update vm's placeholder node without re-render

  if (vm._vnode) { // update child tree's parent
    vm._vnode.parent = parentVnode;
  }
  vm.$options._renderChildren = renderChildren;

  // update $attrs and $listeners hash
  // these are also reactive so they may trigger child update if the child
  // used them during render
  vm.$attrs = parentVnode.data.attrs || emptyObject;
  vm.$listeners = listeners || emptyObject;

  // update props
  if (propsData && vm.$options.props) {
    toggleObserving(false);
    var props = vm._props;
    var propKeys = vm.$options._propKeys || [];
    for (var i = 0; i < propKeys.length; i++) {
      var key = propKeys[i];
      var propOptions = vm.$options.props; // wtf flow?
      props[key] = validateProp(key, propOptions, propsData, vm);
    }
    toggleObserving(true);
    // keep a copy of raw propsData
    vm.$options.propsData = propsData;
  }

  // update listeners
  listeners = listeners || emptyObject;
  var oldListeners = vm.$options._parentListeners;
  vm.$options._parentListeners = listeners;
  updateComponentListeners(vm, listeners, oldListeners);

  // resolve slots + force update if has children
  if (needsForceUpdate) {
    vm.$slots = resolveSlots(renderChildren, parentVnode.context);
    vm.$forceUpdate();
  }

  if (true) {
    isUpdatingChildComponent = false;
  }
}

function isInInactiveTree (vm) {
  while (vm && (vm = vm.$parent)) {
    if (vm._inactive) { return true }
  }
  return false
}

function activateChildComponent (vm, direct) {
  if (direct) {
    vm._directInactive = false;
    if (isInInactiveTree(vm)) {
      return
    }
  } else if (vm._directInactive) {
    return
  }
  if (vm._inactive || vm._inactive === null) {
    vm._inactive = false;
    for (var i = 0; i < vm.$children.length; i++) {
      activateChildComponent(vm.$children[i]);
    }
    callHook(vm, 'activated');
  }
}

function deactivateChildComponent (vm, direct) {
  if (direct) {
    vm._directInactive = true;
    if (isInInactiveTree(vm)) {
      return
    }
  }
  if (!vm._inactive) {
    vm._inactive = true;
    for (var i = 0; i < vm.$children.length; i++) {
      deactivateChildComponent(vm.$children[i]);
    }
    callHook(vm, 'deactivated');
  }
}

function callHook (vm, hook) {
  // #7573 disable dep collection when invoking lifecycle hooks
  pushTarget();
  var handlers = vm.$options[hook];
  var info = hook + " hook";
  if (handlers) {
    for (var i = 0, j = handlers.length; i < j; i++) {
      invokeWithErrorHandling(handlers[i], vm, null, vm, info);
    }
  }
  if (vm._hasHookEvent) {
    vm.$emit('hook:' + hook);
  }
  popTarget();
}

/*  */

var MAX_UPDATE_COUNT = 100;

var queue = [];
var activatedChildren = [];
var has = {};
var circular = {};
var waiting = false;
var flushing = false;
var index = 0;

/**
 * Reset the scheduler's state.
 */
function resetSchedulerState () {
  index = queue.length = activatedChildren.length = 0;
  has = {};
  if (true) {
    circular = {};
  }
  waiting = flushing = false;
}

// Async edge case #6566 requires saving the timestamp when event listeners are
// attached. However, calling performance.now() has a perf overhead especially
// if the page has thousands of event listeners. Instead, we take a timestamp
// every time the scheduler flushes and use that for all event listeners
// attached during that flush.
var currentFlushTimestamp = 0;

// Async edge case fix requires storing an event listener's attach timestamp.
var getNow = Date.now;

// Determine what event timestamp the browser is using. Annoyingly, the
// timestamp can either be hi-res (relative to page load) or low-res
// (relative to UNIX epoch), so in order to compare time we have to use the
// same timestamp type when saving the flush timestamp.
// All IE versions use low-res event timestamps, and have problematic clock
// implementations (#9632)
if (inBrowser && !isIE) {
  var performance = window.performance;
  if (
    performance &&
    typeof performance.now === 'function' &&
    getNow() > document.createEvent('Event').timeStamp
  ) {
    // if the event timestamp, although evaluated AFTER the Date.now(), is
    // smaller than it, it means the event is using a hi-res timestamp,
    // and we need to use the hi-res version for event listener timestamps as
    // well.
    getNow = function () { return performance.now(); };
  }
}

/**
 * Flush both queues and run the watchers.
 */
function flushSchedulerQueue () {
  currentFlushTimestamp = getNow();
  flushing = true;
  var watcher, id;

  // Sort queue before flush.
  // This ensures that:
  // 1. Components are updated from parent to child. (because parent is always
  //    created before the child)
  // 2. A component's user watchers are run before its render watcher (because
  //    user watchers are created before the render watcher)
  // 3. If a component is destroyed during a parent component's watcher run,
  //    its watchers can be skipped.
  queue.sort(function (a, b) { return a.id - b.id; });

  // do not cache length because more watchers might be pushed
  // as we run existing watchers
  for (index = 0; index < queue.length; index++) {
    watcher = queue[index];
    if (watcher.before) {
      watcher.before();
    }
    id = watcher.id;
    has[id] = null;
    watcher.run();
    // in dev build, check and stop circular updates.
    if ( true && has[id] != null) {
      circular[id] = (circular[id] || 0) + 1;
      if (circular[id] > MAX_UPDATE_COUNT) {
        warn(
          'You may have an infinite update loop ' + (
            watcher.user
              ? ("in watcher with expression \"" + (watcher.expression) + "\"")
              : "in a component render function."
          ),
          watcher.vm
        );
        break
      }
    }
  }

  // keep copies of post queues before resetting state
  var activatedQueue = activatedChildren.slice();
  var updatedQueue = queue.slice();

  resetSchedulerState();

  // call component updated and activated hooks
  callActivatedHooks(activatedQueue);
  callUpdatedHooks(updatedQueue);

  // devtool hook
  /* istanbul ignore if */
  if (devtools && config.devtools) {
    devtools.emit('flush');
  }
}

function callUpdatedHooks (queue) {
  var i = queue.length;
  while (i--) {
    var watcher = queue[i];
    var vm = watcher.vm;
    if (vm._watcher === watcher && vm._isMounted && !vm._isDestroyed) {
      callHook(vm, 'updated');
    }
  }
}

/**
 * Queue a kept-alive component that was activated during patch.
 * The queue will be processed after the entire tree has been patched.
 */
function queueActivatedComponent (vm) {
  // setting _inactive to false here so that a render function can
  // rely on checking whether it's in an inactive tree (e.g. router-view)
  vm._inactive = false;
  activatedChildren.push(vm);
}

function callActivatedHooks (queue) {
  for (var i = 0; i < queue.length; i++) {
    queue[i]._inactive = true;
    activateChildComponent(queue[i], true /* true */);
  }
}

/**
 * Push a watcher into the watcher queue.
 * Jobs with duplicate IDs will be skipped unless it's
 * pushed when the queue is being flushed.
 */
function queueWatcher (watcher) {
  var id = watcher.id;
  if (has[id] == null) {
    has[id] = true;
    if (!flushing) {
      queue.push(watcher);
    } else {
      // if already flushing, splice the watcher based on its id
      // if already past its id, it will be run next immediately.
      var i = queue.length - 1;
      while (i > index && queue[i].id > watcher.id) {
        i--;
      }
      queue.splice(i + 1, 0, watcher);
    }
    // queue the flush
    if (!waiting) {
      waiting = true;

      if ( true && !config.async) {
        flushSchedulerQueue();
        return
      }
      nextTick(flushSchedulerQueue);
    }
  }
}

/*  */



var uid$2 = 0;

/**
 * A watcher parses an expression, collects dependencies,
 * and fires callback when the expression value changes.
 * This is used for both the $watch() api and directives.
 */
var Watcher = function Watcher (
  vm,
  expOrFn,
  cb,
  options,
  isRenderWatcher
) {
  this.vm = vm;
  if (isRenderWatcher) {
    vm._watcher = this;
  }
  vm._watchers.push(this);
  // options
  if (options) {
    this.deep = !!options.deep;
    this.user = !!options.user;
    this.lazy = !!options.lazy;
    this.sync = !!options.sync;
    this.before = options.before;
  } else {
    this.deep = this.user = this.lazy = this.sync = false;
  }
  this.cb = cb;
  this.id = ++uid$2; // uid for batching
  this.active = true;
  this.dirty = this.lazy; // for lazy watchers
  this.deps = [];
  this.newDeps = [];
  this.depIds = new _Set();
  this.newDepIds = new _Set();
  this.expression =  true
    ? expOrFn.toString()
    : undefined;
  // parse expression for getter
  if (typeof expOrFn === 'function') {
    this.getter = expOrFn;
  } else {
    this.getter = parsePath(expOrFn);
    if (!this.getter) {
      this.getter = noop;
       true && warn(
        "Failed watching path: \"" + expOrFn + "\" " +
        'Watcher only accepts simple dot-delimited paths. ' +
        'For full control, use a function instead.',
        vm
      );
    }
  }
  this.value = this.lazy
    ? undefined
    : this.get();
};

/**
 * Evaluate the getter, and re-collect dependencies.
 */
Watcher.prototype.get = function get () {
  pushTarget(this);
  var value;
  var vm = this.vm;
  try {
    value = this.getter.call(vm, vm);
  } catch (e) {
    if (this.user) {
      handleError(e, vm, ("getter for watcher \"" + (this.expression) + "\""));
    } else {
      throw e
    }
  } finally {
    // "touch" every property so they are all tracked as
    // dependencies for deep watching
    if (this.deep) {
      traverse(value);
    }
    popTarget();
    this.cleanupDeps();
  }
  return value
};

/**
 * Add a dependency to this directive.
 */
Watcher.prototype.addDep = function addDep (dep) {
  var id = dep.id;
  if (!this.newDepIds.has(id)) {
    this.newDepIds.add(id);
    this.newDeps.push(dep);
    if (!this.depIds.has(id)) {
      dep.addSub(this);
    }
  }
};

/**
 * Clean up for dependency collection.
 */
Watcher.prototype.cleanupDeps = function cleanupDeps () {
  var i = this.deps.length;
  while (i--) {
    var dep = this.deps[i];
    if (!this.newDepIds.has(dep.id)) {
      dep.removeSub(this);
    }
  }
  var tmp = this.depIds;
  this.depIds = this.newDepIds;
  this.newDepIds = tmp;
  this.newDepIds.clear();
  tmp = this.deps;
  this.deps = this.newDeps;
  this.newDeps = tmp;
  this.newDeps.length = 0;
};

/**
 * Subscriber interface.
 * Will be called when a dependency changes.
 */
Watcher.prototype.update = function update () {
  /* istanbul ignore else */
  if (this.lazy) {
    this.dirty = true;
  } else if (this.sync) {
    this.run();
  } else {
    queueWatcher(this);
  }
};

/**
 * Scheduler job interface.
 * Will be called by the scheduler.
 */
Watcher.prototype.run = function run () {
  if (this.active) {
    var value = this.get();
    if (
      value !== this.value ||
      // Deep watchers and watchers on Object/Arrays should fire even
      // when the value is the same, because the value may
      // have mutated.
      isObject(value) ||
      this.deep
    ) {
      // set new value
      var oldValue = this.value;
      this.value = value;
      if (this.user) {
        try {
          this.cb.call(this.vm, value, oldValue);
        } catch (e) {
          handleError(e, this.vm, ("callback for watcher \"" + (this.expression) + "\""));
        }
      } else {
        this.cb.call(this.vm, value, oldValue);
      }
    }
  }
};

/**
 * Evaluate the value of the watcher.
 * This only gets called for lazy watchers.
 */
Watcher.prototype.evaluate = function evaluate () {
  this.value = this.get();
  this.dirty = false;
};

/**
 * Depend on all deps collected by this watcher.
 */
Watcher.prototype.depend = function depend () {
  var i = this.deps.length;
  while (i--) {
    this.deps[i].depend();
  }
};

/**
 * Remove self from all dependencies' subscriber list.
 */
Watcher.prototype.teardown = function teardown () {
  if (this.active) {
    // remove self from vm's watcher list
    // this is a somewhat expensive operation so we skip it
    // if the vm is being destroyed.
    if (!this.vm._isBeingDestroyed) {
      remove(this.vm._watchers, this);
    }
    var i = this.deps.length;
    while (i--) {
      this.deps[i].removeSub(this);
    }
    this.active = false;
  }
};

/*  */

var sharedPropertyDefinition = {
  enumerable: true,
  configurable: true,
  get: noop,
  set: noop
};

function proxy (target, sourceKey, key) {
  sharedPropertyDefinition.get = function proxyGetter () {
    return this[sourceKey][key]
  };
  sharedPropertyDefinition.set = function proxySetter (val) {
    this[sourceKey][key] = val;
  };
  Object.defineProperty(target, key, sharedPropertyDefinition);
}

function initState (vm) {
  vm._watchers = [];
  var opts = vm.$options;
  if (opts.props) { initProps(vm, opts.props); }
  if (opts.methods) { initMethods(vm, opts.methods); }
  if (opts.data) {
    initData(vm);
  } else {
    observe(vm._data = {}, true /* asRootData */);
  }
  if (opts.computed) { initComputed(vm, opts.computed); }
  if (opts.watch && opts.watch !== nativeWatch) {
    initWatch(vm, opts.watch);
  }
}

function initProps (vm, propsOptions) {
  var propsData = vm.$options.propsData || {};
  var props = vm._props = {};
  // cache prop keys so that future props updates can iterate using Array
  // instead of dynamic object key enumeration.
  var keys = vm.$options._propKeys = [];
  var isRoot = !vm.$parent;
  // root instance props should be converted
  if (!isRoot) {
    toggleObserving(false);
  }
  var loop = function ( key ) {
    keys.push(key);
    var value = validateProp(key, propsOptions, propsData, vm);
    /* istanbul ignore else */
    if (true) {
      var hyphenatedKey = hyphenate(key);
      if (isReservedAttribute(hyphenatedKey) ||
          config.isReservedAttr(hyphenatedKey)) {
        warn(
          ("\"" + hyphenatedKey + "\" is a reserved attribute and cannot be used as component prop."),
          vm
        );
      }
      defineReactive$$1(props, key, value, function () {
        if (!isRoot && !isUpdatingChildComponent) {
          warn(
            "Avoid mutating a prop directly since the value will be " +
            "overwritten whenever the parent component re-renders. " +
            "Instead, use a data or computed property based on the prop's " +
            "value. Prop being mutated: \"" + key + "\"",
            vm
          );
        }
      });
    } else {}
    // static props are already proxied on the component's prototype
    // during Vue.extend(). We only need to proxy props defined at
    // instantiation here.
    if (!(key in vm)) {
      proxy(vm, "_props", key);
    }
  };

  for (var key in propsOptions) loop( key );
  toggleObserving(true);
}

function initData (vm) {
  var data = vm.$options.data;
  data = vm._data = typeof data === 'function'
    ? getData(data, vm)
    : data || {};
  if (!isPlainObject(data)) {
    data = {};
     true && warn(
      'data functions should return an object:\n' +
      'https://vuejs.org/v2/guide/components.html#data-Must-Be-a-Function',
      vm
    );
  }
  // proxy data on instance
  var keys = Object.keys(data);
  var props = vm.$options.props;
  var methods = vm.$options.methods;
  var i = keys.length;
  while (i--) {
    var key = keys[i];
    if (true) {
      if (methods && hasOwn(methods, key)) {
        warn(
          ("Method \"" + key + "\" has already been defined as a data property."),
          vm
        );
      }
    }
    if (props && hasOwn(props, key)) {
       true && warn(
        "The data property \"" + key + "\" is already declared as a prop. " +
        "Use prop default value instead.",
        vm
      );
    } else if (!isReserved(key)) {
      proxy(vm, "_data", key);
    }
  }
  // observe data
  observe(data, true /* asRootData */);
}

function getData (data, vm) {
  // #7573 disable dep collection when invoking data getters
  pushTarget();
  try {
    return data.call(vm, vm)
  } catch (e) {
    handleError(e, vm, "data()");
    return {}
  } finally {
    popTarget();
  }
}

var computedWatcherOptions = { lazy: true };

function initComputed (vm, computed) {
  // $flow-disable-line
  var watchers = vm._computedWatchers = Object.create(null);
  // computed properties are just getters during SSR
  var isSSR = isServerRendering();

  for (var key in computed) {
    var userDef = computed[key];
    var getter = typeof userDef === 'function' ? userDef : userDef.get;
    if ( true && getter == null) {
      warn(
        ("Getter is missing for computed property \"" + key + "\"."),
        vm
      );
    }

    if (!isSSR) {
      // create internal watcher for the computed property.
      watchers[key] = new Watcher(
        vm,
        getter || noop,
        noop,
        computedWatcherOptions
      );
    }

    // component-defined computed properties are already defined on the
    // component prototype. We only need to define computed properties defined
    // at instantiation here.
    if (!(key in vm)) {
      defineComputed(vm, key, userDef);
    } else if (true) {
      if (key in vm.$data) {
        warn(("The computed property \"" + key + "\" is already defined in data."), vm);
      } else if (vm.$options.props && key in vm.$options.props) {
        warn(("The computed property \"" + key + "\" is already defined as a prop."), vm);
      }
    }
  }
}

function defineComputed (
  target,
  key,
  userDef
) {
  var shouldCache = !isServerRendering();
  if (typeof userDef === 'function') {
    sharedPropertyDefinition.get = shouldCache
      ? createComputedGetter(key)
      : createGetterInvoker(userDef);
    sharedPropertyDefinition.set = noop;
  } else {
    sharedPropertyDefinition.get = userDef.get
      ? shouldCache && userDef.cache !== false
        ? createComputedGetter(key)
        : createGetterInvoker(userDef.get)
      : noop;
    sharedPropertyDefinition.set = userDef.set || noop;
  }
  if ( true &&
      sharedPropertyDefinition.set === noop) {
    sharedPropertyDefinition.set = function () {
      warn(
        ("Computed property \"" + key + "\" was assigned to but it has no setter."),
        this
      );
    };
  }
  Object.defineProperty(target, key, sharedPropertyDefinition);
}

function createComputedGetter (key) {
  return function computedGetter () {
    var watcher = this._computedWatchers && this._computedWatchers[key];
    if (watcher) {
      if (watcher.dirty) {
        watcher.evaluate();
      }
      if (Dep.target) {
        watcher.depend();
      }
      return watcher.value
    }
  }
}

function createGetterInvoker(fn) {
  return function computedGetter () {
    return fn.call(this, this)
  }
}

function initMethods (vm, methods) {
  var props = vm.$options.props;
  for (var key in methods) {
    if (true) {
      if (typeof methods[key] !== 'function') {
        warn(
          "Method \"" + key + "\" has type \"" + (typeof methods[key]) + "\" in the component definition. " +
          "Did you reference the function correctly?",
          vm
        );
      }
      if (props && hasOwn(props, key)) {
        warn(
          ("Method \"" + key + "\" has already been defined as a prop."),
          vm
        );
      }
      if ((key in vm) && isReserved(key)) {
        warn(
          "Method \"" + key + "\" conflicts with an existing Vue instance method. " +
          "Avoid defining component methods that start with _ or $."
        );
      }
    }
    vm[key] = typeof methods[key] !== 'function' ? noop : bind(methods[key], vm);
  }
}

function initWatch (vm, watch) {
  for (var key in watch) {
    var handler = watch[key];
    if (Array.isArray(handler)) {
      for (var i = 0; i < handler.length; i++) {
        createWatcher(vm, key, handler[i]);
      }
    } else {
      createWatcher(vm, key, handler);
    }
  }
}

function createWatcher (
  vm,
  expOrFn,
  handler,
  options
) {
  if (isPlainObject(handler)) {
    options = handler;
    handler = handler.handler;
  }
  if (typeof handler === 'string') {
    handler = vm[handler];
  }
  return vm.$watch(expOrFn, handler, options)
}

function stateMixin (Vue) {
  // flow somehow has problems with directly declared definition object
  // when using Object.defineProperty, so we have to procedurally build up
  // the object here.
  var dataDef = {};
  dataDef.get = function () { return this._data };
  var propsDef = {};
  propsDef.get = function () { return this._props };
  if (true) {
    dataDef.set = function () {
      warn(
        'Avoid replacing instance root $data. ' +
        'Use nested data properties instead.',
        this
      );
    };
    propsDef.set = function () {
      warn("$props is readonly.", this);
    };
  }
  Object.defineProperty(Vue.prototype, '$data', dataDef);
  Object.defineProperty(Vue.prototype, '$props', propsDef);

  Vue.prototype.$set = set;
  Vue.prototype.$delete = del;

  Vue.prototype.$watch = function (
    expOrFn,
    cb,
    options
  ) {
    var vm = this;
    if (isPlainObject(cb)) {
      return createWatcher(vm, expOrFn, cb, options)
    }
    options = options || {};
    options.user = true;
    var watcher = new Watcher(vm, expOrFn, cb, options);
    if (options.immediate) {
      try {
        cb.call(vm, watcher.value);
      } catch (error) {
        handleError(error, vm, ("callback for immediate watcher \"" + (watcher.expression) + "\""));
      }
    }
    return function unwatchFn () {
      watcher.teardown();
    }
  };
}

/*  */

var uid$3 = 0;

function initMixin (Vue) {
  Vue.prototype._init = function (options) {
    var vm = this;
    // a uid
    vm._uid = uid$3++;

    var startTag, endTag;
    /* istanbul ignore if */
    if ( true && config.performance && mark) {
      startTag = "vue-perf-start:" + (vm._uid);
      endTag = "vue-perf-end:" + (vm._uid);
      mark(startTag);
    }

    // a flag to avoid this being observed
    vm._isVue = true;
    // merge options
    if (options && options._isComponent) {
      // optimize internal component instantiation
      // since dynamic options merging is pretty slow, and none of the
      // internal component options needs special treatment.
      initInternalComponent(vm, options);
    } else {
      vm.$options = mergeOptions(
        resolveConstructorOptions(vm.constructor),
        options || {},
        vm
      );
    }
    /* istanbul ignore else */
    if (true) {
      initProxy(vm);
    } else {}
    // expose real self
    vm._self = vm;
    initLifecycle(vm);
    initEvents(vm);
    initRender(vm);
    callHook(vm, 'beforeCreate');
    initInjections(vm); // resolve injections before data/props
    initState(vm);
    initProvide(vm); // resolve provide after data/props
    callHook(vm, 'created');

    /* istanbul ignore if */
    if ( true && config.performance && mark) {
      vm._name = formatComponentName(vm, false);
      mark(endTag);
      measure(("vue " + (vm._name) + " init"), startTag, endTag);
    }

    if (vm.$options.el) {
      vm.$mount(vm.$options.el);
    }
  };
}

function initInternalComponent (vm, options) {
  var opts = vm.$options = Object.create(vm.constructor.options);
  // doing this because it's faster than dynamic enumeration.
  var parentVnode = options._parentVnode;
  opts.parent = options.parent;
  opts._parentVnode = parentVnode;

  var vnodeComponentOptions = parentVnode.componentOptions;
  opts.propsData = vnodeComponentOptions.propsData;
  opts._parentListeners = vnodeComponentOptions.listeners;
  opts._renderChildren = vnodeComponentOptions.children;
  opts._componentTag = vnodeComponentOptions.tag;

  if (options.render) {
    opts.render = options.render;
    opts.staticRenderFns = options.staticRenderFns;
  }
}

function resolveConstructorOptions (Ctor) {
  var options = Ctor.options;
  if (Ctor.super) {
    var superOptions = resolveConstructorOptions(Ctor.super);
    var cachedSuperOptions = Ctor.superOptions;
    if (superOptions !== cachedSuperOptions) {
      // super option changed,
      // need to resolve new options.
      Ctor.superOptions = superOptions;
      // check if there are any late-modified/attached options (#4976)
      var modifiedOptions = resolveModifiedOptions(Ctor);
      // update base extend options
      if (modifiedOptions) {
        extend(Ctor.extendOptions, modifiedOptions);
      }
      options = Ctor.options = mergeOptions(superOptions, Ctor.extendOptions);
      if (options.name) {
        options.components[options.name] = Ctor;
      }
    }
  }
  return options
}

function resolveModifiedOptions (Ctor) {
  var modified;
  var latest = Ctor.options;
  var sealed = Ctor.sealedOptions;
  for (var key in latest) {
    if (latest[key] !== sealed[key]) {
      if (!modified) { modified = {}; }
      modified[key] = latest[key];
    }
  }
  return modified
}

function Vue (options) {
  if ( true &&
    !(this instanceof Vue)
  ) {
    warn('Vue is a constructor and should be called with the `new` keyword');
  }
  this._init(options);
}

initMixin(Vue);
stateMixin(Vue);
eventsMixin(Vue);
lifecycleMixin(Vue);
renderMixin(Vue);

/*  */

function initUse (Vue) {
  Vue.use = function (plugin) {
    var installedPlugins = (this._installedPlugins || (this._installedPlugins = []));
    if (installedPlugins.indexOf(plugin) > -1) {
      return this
    }

    // additional parameters
    var args = toArray(arguments, 1);
    args.unshift(this);
    if (typeof plugin.install === 'function') {
      plugin.install.apply(plugin, args);
    } else if (typeof plugin === 'function') {
      plugin.apply(null, args);
    }
    installedPlugins.push(plugin);
    return this
  };
}

/*  */

function initMixin$1 (Vue) {
  Vue.mixin = function (mixin) {
    this.options = mergeOptions(this.options, mixin);
    return this
  };
}

/*  */

function initExtend (Vue) {
  /**
   * Each instance constructor, including Vue, has a unique
   * cid. This enables us to create wrapped "child
   * constructors" for prototypal inheritance and cache them.
   */
  Vue.cid = 0;
  var cid = 1;

  /**
   * Class inheritance
   */
  Vue.extend = function (extendOptions) {
    extendOptions = extendOptions || {};
    var Super = this;
    var SuperId = Super.cid;
    var cachedCtors = extendOptions._Ctor || (extendOptions._Ctor = {});
    if (cachedCtors[SuperId]) {
      return cachedCtors[SuperId]
    }

    var name = extendOptions.name || Super.options.name;
    if ( true && name) {
      validateComponentName(name);
    }

    var Sub = function VueComponent (options) {
      this._init(options);
    };
    Sub.prototype = Object.create(Super.prototype);
    Sub.prototype.constructor = Sub;
    Sub.cid = cid++;
    Sub.options = mergeOptions(
      Super.options,
      extendOptions
    );
    Sub['super'] = Super;

    // For props and computed properties, we define the proxy getters on
    // the Vue instances at extension time, on the extended prototype. This
    // avoids Object.defineProperty calls for each instance created.
    if (Sub.options.props) {
      initProps$1(Sub);
    }
    if (Sub.options.computed) {
      initComputed$1(Sub);
    }

    // allow further extension/mixin/plugin usage
    Sub.extend = Super.extend;
    Sub.mixin = Super.mixin;
    Sub.use = Super.use;

    // create asset registers, so extended classes
    // can have their private assets too.
    ASSET_TYPES.forEach(function (type) {
      Sub[type] = Super[type];
    });
    // enable recursive self-lookup
    if (name) {
      Sub.options.components[name] = Sub;
    }

    // keep a reference to the super options at extension time.
    // later at instantiation we can check if Super's options have
    // been updated.
    Sub.superOptions = Super.options;
    Sub.extendOptions = extendOptions;
    Sub.sealedOptions = extend({}, Sub.options);

    // cache constructor
    cachedCtors[SuperId] = Sub;
    return Sub
  };
}

function initProps$1 (Comp) {
  var props = Comp.options.props;
  for (var key in props) {
    proxy(Comp.prototype, "_props", key);
  }
}

function initComputed$1 (Comp) {
  var computed = Comp.options.computed;
  for (var key in computed) {
    defineComputed(Comp.prototype, key, computed[key]);
  }
}

/*  */

function initAssetRegisters (Vue) {
  /**
   * Create asset registration methods.
   */
  ASSET_TYPES.forEach(function (type) {
    Vue[type] = function (
      id,
      definition
    ) {
      if (!definition) {
        return this.options[type + 's'][id]
      } else {
        /* istanbul ignore if */
        if ( true && type === 'component') {
          validateComponentName(id);
        }
        if (type === 'component' && isPlainObject(definition)) {
          definition.name = definition.name || id;
          definition = this.options._base.extend(definition);
        }
        if (type === 'directive' && typeof definition === 'function') {
          definition = { bind: definition, update: definition };
        }
        this.options[type + 's'][id] = definition;
        return definition
      }
    };
  });
}

/*  */



function getComponentName (opts) {
  return opts && (opts.Ctor.options.name || opts.tag)
}

function matches (pattern, name) {
  if (Array.isArray(pattern)) {
    return pattern.indexOf(name) > -1
  } else if (typeof pattern === 'string') {
    return pattern.split(',').indexOf(name) > -1
  } else if (isRegExp(pattern)) {
    return pattern.test(name)
  }
  /* istanbul ignore next */
  return false
}

function pruneCache (keepAliveInstance, filter) {
  var cache = keepAliveInstance.cache;
  var keys = keepAliveInstance.keys;
  var _vnode = keepAliveInstance._vnode;
  for (var key in cache) {
    var cachedNode = cache[key];
    if (cachedNode) {
      var name = getComponentName(cachedNode.componentOptions);
      if (name && !filter(name)) {
        pruneCacheEntry(cache, key, keys, _vnode);
      }
    }
  }
}

function pruneCacheEntry (
  cache,
  key,
  keys,
  current
) {
  var cached$$1 = cache[key];
  if (cached$$1 && (!current || cached$$1.tag !== current.tag)) {
    cached$$1.componentInstance.$destroy();
  }
  cache[key] = null;
  remove(keys, key);
}

var patternTypes = [String, RegExp, Array];

var KeepAlive = {
  name: 'keep-alive',
  abstract: true,

  props: {
    include: patternTypes,
    exclude: patternTypes,
    max: [String, Number]
  },

  created: function created () {
    this.cache = Object.create(null);
    this.keys = [];
  },

  destroyed: function destroyed () {
    for (var key in this.cache) {
      pruneCacheEntry(this.cache, key, this.keys);
    }
  },

  mounted: function mounted () {
    var this$1 = this;

    this.$watch('include', function (val) {
      pruneCache(this$1, function (name) { return matches(val, name); });
    });
    this.$watch('exclude', function (val) {
      pruneCache(this$1, function (name) { return !matches(val, name); });
    });
  },

  render: function render () {
    var slot = this.$slots.default;
    var vnode = getFirstComponentChild(slot);
    var componentOptions = vnode && vnode.componentOptions;
    if (componentOptions) {
      // check pattern
      var name = getComponentName(componentOptions);
      var ref = this;
      var include = ref.include;
      var exclude = ref.exclude;
      if (
        // not included
        (include && (!name || !matches(include, name))) ||
        // excluded
        (exclude && name && matches(exclude, name))
      ) {
        return vnode
      }

      var ref$1 = this;
      var cache = ref$1.cache;
      var keys = ref$1.keys;
      var key = vnode.key == null
        // same constructor may get registered as different local components
        // so cid alone is not enough (#3269)
        ? componentOptions.Ctor.cid + (componentOptions.tag ? ("::" + (componentOptions.tag)) : '')
        : vnode.key;
      if (cache[key]) {
        vnode.componentInstance = cache[key].componentInstance;
        // make current key freshest
        remove(keys, key);
        keys.push(key);
      } else {
        cache[key] = vnode;
        keys.push(key);
        // prune oldest entry
        if (this.max && keys.length > parseInt(this.max)) {
          pruneCacheEntry(cache, keys[0], keys, this._vnode);
        }
      }

      vnode.data.keepAlive = true;
    }
    return vnode || (slot && slot[0])
  }
};

var builtInComponents = {
  KeepAlive: KeepAlive
};

/*  */

function initGlobalAPI (Vue) {
  // config
  var configDef = {};
  configDef.get = function () { return config; };
  if (true) {
    configDef.set = function () {
      warn(
        'Do not replace the Vue.config object, set individual fields instead.'
      );
    };
  }
  Object.defineProperty(Vue, 'config', configDef);

  // exposed util methods.
  // NOTE: these are not considered part of the public API - avoid relying on
  // them unless you are aware of the risk.
  Vue.util = {
    warn: warn,
    extend: extend,
    mergeOptions: mergeOptions,
    defineReactive: defineReactive$$1
  };

  Vue.set = set;
  Vue.delete = del;
  Vue.nextTick = nextTick;

  // 2.6 explicit observable API
  Vue.observable = function (obj) {
    observe(obj);
    return obj
  };

  Vue.options = Object.create(null);
  ASSET_TYPES.forEach(function (type) {
    Vue.options[type + 's'] = Object.create(null);
  });

  // this is used to identify the "base" constructor to extend all plain-object
  // components with in Weex's multi-instance scenarios.
  Vue.options._base = Vue;

  extend(Vue.options.components, builtInComponents);

  initUse(Vue);
  initMixin$1(Vue);
  initExtend(Vue);
  initAssetRegisters(Vue);
}

initGlobalAPI(Vue);

Object.defineProperty(Vue.prototype, '$isServer', {
  get: isServerRendering
});

Object.defineProperty(Vue.prototype, '$ssrContext', {
  get: function get () {
    /* istanbul ignore next */
    return this.$vnode && this.$vnode.ssrContext
  }
});

// expose FunctionalRenderContext for ssr runtime helper installation
Object.defineProperty(Vue, 'FunctionalRenderContext', {
  value: FunctionalRenderContext
});

Vue.version = '2.6.11';

/*  */

// these are reserved for web because they are directly compiled away
// during template compilation
var isReservedAttr = makeMap('style,class');

// attributes that should be using props for binding
var acceptValue = makeMap('input,textarea,option,select,progress');
var mustUseProp = function (tag, type, attr) {
  return (
    (attr === 'value' && acceptValue(tag)) && type !== 'button' ||
    (attr === 'selected' && tag === 'option') ||
    (attr === 'checked' && tag === 'input') ||
    (attr === 'muted' && tag === 'video')
  )
};

var isEnumeratedAttr = makeMap('contenteditable,draggable,spellcheck');

var isValidContentEditableValue = makeMap('events,caret,typing,plaintext-only');

var convertEnumeratedValue = function (key, value) {
  return isFalsyAttrValue(value) || value === 'false'
    ? 'false'
    // allow arbitrary string value for contenteditable
    : key === 'contenteditable' && isValidContentEditableValue(value)
      ? value
      : 'true'
};

var isBooleanAttr = makeMap(
  'allowfullscreen,async,autofocus,autoplay,checked,compact,controls,declare,' +
  'default,defaultchecked,defaultmuted,defaultselected,defer,disabled,' +
  'enabled,formnovalidate,hidden,indeterminate,inert,ismap,itemscope,loop,multiple,' +
  'muted,nohref,noresize,noshade,novalidate,nowrap,open,pauseonexit,readonly,' +
  'required,reversed,scoped,seamless,selected,sortable,translate,' +
  'truespeed,typemustmatch,visible'
);

var xlinkNS = 'http://www.w3.org/1999/xlink';

var isXlink = function (name) {
  return name.charAt(5) === ':' && name.slice(0, 5) === 'xlink'
};

var getXlinkProp = function (name) {
  return isXlink(name) ? name.slice(6, name.length) : ''
};

var isFalsyAttrValue = function (val) {
  return val == null || val === false
};

/*  */

function genClassForVnode (vnode) {
  var data = vnode.data;
  var parentNode = vnode;
  var childNode = vnode;
  while (isDef(childNode.componentInstance)) {
    childNode = childNode.componentInstance._vnode;
    if (childNode && childNode.data) {
      data = mergeClassData(childNode.data, data);
    }
  }
  while (isDef(parentNode = parentNode.parent)) {
    if (parentNode && parentNode.data) {
      data = mergeClassData(data, parentNode.data);
    }
  }
  return renderClass(data.staticClass, data.class)
}

function mergeClassData (child, parent) {
  return {
    staticClass: concat(child.staticClass, parent.staticClass),
    class: isDef(child.class)
      ? [child.class, parent.class]
      : parent.class
  }
}

function renderClass (
  staticClass,
  dynamicClass
) {
  if (isDef(staticClass) || isDef(dynamicClass)) {
    return concat(staticClass, stringifyClass(dynamicClass))
  }
  /* istanbul ignore next */
  return ''
}

function concat (a, b) {
  return a ? b ? (a + ' ' + b) : a : (b || '')
}

function stringifyClass (value) {
  if (Array.isArray(value)) {
    return stringifyArray(value)
  }
  if (isObject(value)) {
    return stringifyObject(value)
  }
  if (typeof value === 'string') {
    return value
  }
  /* istanbul ignore next */
  return ''
}

function stringifyArray (value) {
  var res = '';
  var stringified;
  for (var i = 0, l = value.length; i < l; i++) {
    if (isDef(stringified = stringifyClass(value[i])) && stringified !== '') {
      if (res) { res += ' '; }
      res += stringified;
    }
  }
  return res
}

function stringifyObject (value) {
  var res = '';
  for (var key in value) {
    if (value[key]) {
      if (res) { res += ' '; }
      res += key;
    }
  }
  return res
}

/*  */

var namespaceMap = {
  svg: 'http://www.w3.org/2000/svg',
  math: 'http://www.w3.org/1998/Math/MathML'
};

var isHTMLTag = makeMap(
  'html,body,base,head,link,meta,style,title,' +
  'address,article,aside,footer,header,h1,h2,h3,h4,h5,h6,hgroup,nav,section,' +
  'div,dd,dl,dt,figcaption,figure,picture,hr,img,li,main,ol,p,pre,ul,' +
  'a,b,abbr,bdi,bdo,br,cite,code,data,dfn,em,i,kbd,mark,q,rp,rt,rtc,ruby,' +
  's,samp,small,span,strong,sub,sup,time,u,var,wbr,area,audio,map,track,video,' +
  'embed,object,param,source,canvas,script,noscript,del,ins,' +
  'caption,col,colgroup,table,thead,tbody,td,th,tr,' +
  'button,datalist,fieldset,form,input,label,legend,meter,optgroup,option,' +
  'output,progress,select,textarea,' +
  'details,dialog,menu,menuitem,summary,' +
  'content,element,shadow,template,blockquote,iframe,tfoot'
);

// this map is intentionally selective, only covering SVG elements that may
// contain child elements.
var isSVG = makeMap(
  'svg,animate,circle,clippath,cursor,defs,desc,ellipse,filter,font-face,' +
  'foreignObject,g,glyph,image,line,marker,mask,missing-glyph,path,pattern,' +
  'polygon,polyline,rect,switch,symbol,text,textpath,tspan,use,view',
  true
);

var isReservedTag = function (tag) {
  return isHTMLTag(tag) || isSVG(tag)
};

function getTagNamespace (tag) {
  if (isSVG(tag)) {
    return 'svg'
  }
  // basic support for MathML
  // note it doesn't support other MathML elements being component roots
  if (tag === 'math') {
    return 'math'
  }
}

var unknownElementCache = Object.create(null);
function isUnknownElement (tag) {
  /* istanbul ignore if */
  if (!inBrowser) {
    return true
  }
  if (isReservedTag(tag)) {
    return false
  }
  tag = tag.toLowerCase();
  /* istanbul ignore if */
  if (unknownElementCache[tag] != null) {
    return unknownElementCache[tag]
  }
  var el = document.createElement(tag);
  if (tag.indexOf('-') > -1) {
    // http://stackoverflow.com/a/28210364/1070244
    return (unknownElementCache[tag] = (
      el.constructor === window.HTMLUnknownElement ||
      el.constructor === window.HTMLElement
    ))
  } else {
    return (unknownElementCache[tag] = /HTMLUnknownElement/.test(el.toString()))
  }
}

var isTextInputType = makeMap('text,number,password,search,email,tel,url');

/*  */

/**
 * Query an element selector if it's not an element already.
 */
function query (el) {
  if (typeof el === 'string') {
    var selected = document.querySelector(el);
    if (!selected) {
       true && warn(
        'Cannot find element: ' + el
      );
      return document.createElement('div')
    }
    return selected
  } else {
    return el
  }
}

/*  */

function createElement$1 (tagName, vnode) {
  var elm = document.createElement(tagName);
  if (tagName !== 'select') {
    return elm
  }
  // false or null will remove the attribute but undefined will not
  if (vnode.data && vnode.data.attrs && vnode.data.attrs.multiple !== undefined) {
    elm.setAttribute('multiple', 'multiple');
  }
  return elm
}

function createElementNS (namespace, tagName) {
  return document.createElementNS(namespaceMap[namespace], tagName)
}

function createTextNode (text) {
  return document.createTextNode(text)
}

function createComment (text) {
  return document.createComment(text)
}

function insertBefore (parentNode, newNode, referenceNode) {
  parentNode.insertBefore(newNode, referenceNode);
}

function removeChild (node, child) {
  node.removeChild(child);
}

function appendChild (node, child) {
  node.appendChild(child);
}

function parentNode (node) {
  return node.parentNode
}

function nextSibling (node) {
  return node.nextSibling
}

function tagName (node) {
  return node.tagName
}

function setTextContent (node, text) {
  node.textContent = text;
}

function setStyleScope (node, scopeId) {
  node.setAttribute(scopeId, '');
}

var nodeOps = /*#__PURE__*/Object.freeze({
  createElement: createElement$1,
  createElementNS: createElementNS,
  createTextNode: createTextNode,
  createComment: createComment,
  insertBefore: insertBefore,
  removeChild: removeChild,
  appendChild: appendChild,
  parentNode: parentNode,
  nextSibling: nextSibling,
  tagName: tagName,
  setTextContent: setTextContent,
  setStyleScope: setStyleScope
});

/*  */

var ref = {
  create: function create (_, vnode) {
    registerRef(vnode);
  },
  update: function update (oldVnode, vnode) {
    if (oldVnode.data.ref !== vnode.data.ref) {
      registerRef(oldVnode, true);
      registerRef(vnode);
    }
  },
  destroy: function destroy (vnode) {
    registerRef(vnode, true);
  }
};

function registerRef (vnode, isRemoval) {
  var key = vnode.data.ref;
  if (!isDef(key)) { return }

  var vm = vnode.context;
  var ref = vnode.componentInstance || vnode.elm;
  var refs = vm.$refs;
  if (isRemoval) {
    if (Array.isArray(refs[key])) {
      remove(refs[key], ref);
    } else if (refs[key] === ref) {
      refs[key] = undefined;
    }
  } else {
    if (vnode.data.refInFor) {
      if (!Array.isArray(refs[key])) {
        refs[key] = [ref];
      } else if (refs[key].indexOf(ref) < 0) {
        // $flow-disable-line
        refs[key].push(ref);
      }
    } else {
      refs[key] = ref;
    }
  }
}

/**
 * Virtual DOM patching algorithm based on Snabbdom by
 * Simon Friis Vindum (@paldepind)
 * Licensed under the MIT License
 * https://github.com/paldepind/snabbdom/blob/master/LICENSE
 *
 * modified by Evan You (@yyx990803)
 *
 * Not type-checking this because this file is perf-critical and the cost
 * of making flow understand it is not worth it.
 */

var emptyNode = new VNode('', {}, []);

var hooks = ['create', 'activate', 'update', 'remove', 'destroy'];

function sameVnode (a, b) {
  return (
    a.key === b.key && (
      (
        a.tag === b.tag &&
        a.isComment === b.isComment &&
        isDef(a.data) === isDef(b.data) &&
        sameInputType(a, b)
      ) || (
        isTrue(a.isAsyncPlaceholder) &&
        a.asyncFactory === b.asyncFactory &&
        isUndef(b.asyncFactory.error)
      )
    )
  )
}

function sameInputType (a, b) {
  if (a.tag !== 'input') { return true }
  var i;
  var typeA = isDef(i = a.data) && isDef(i = i.attrs) && i.type;
  var typeB = isDef(i = b.data) && isDef(i = i.attrs) && i.type;
  return typeA === typeB || isTextInputType(typeA) && isTextInputType(typeB)
}

function createKeyToOldIdx (children, beginIdx, endIdx) {
  var i, key;
  var map = {};
  for (i = beginIdx; i <= endIdx; ++i) {
    key = children[i].key;
    if (isDef(key)) { map[key] = i; }
  }
  return map
}

function createPatchFunction (backend) {
  var i, j;
  var cbs = {};

  var modules = backend.modules;
  var nodeOps = backend.nodeOps;

  for (i = 0; i < hooks.length; ++i) {
    cbs[hooks[i]] = [];
    for (j = 0; j < modules.length; ++j) {
      if (isDef(modules[j][hooks[i]])) {
        cbs[hooks[i]].push(modules[j][hooks[i]]);
      }
    }
  }

  function emptyNodeAt (elm) {
    return new VNode(nodeOps.tagName(elm).toLowerCase(), {}, [], undefined, elm)
  }

  function createRmCb (childElm, listeners) {
    function remove$$1 () {
      if (--remove$$1.listeners === 0) {
        removeNode(childElm);
      }
    }
    remove$$1.listeners = listeners;
    return remove$$1
  }

  function removeNode (el) {
    var parent = nodeOps.parentNode(el);
    // element may have already been removed due to v-html / v-text
    if (isDef(parent)) {
      nodeOps.removeChild(parent, el);
    }
  }

  function isUnknownElement$$1 (vnode, inVPre) {
    return (
      !inVPre &&
      !vnode.ns &&
      !(
        config.ignoredElements.length &&
        config.ignoredElements.some(function (ignore) {
          return isRegExp(ignore)
            ? ignore.test(vnode.tag)
            : ignore === vnode.tag
        })
      ) &&
      config.isUnknownElement(vnode.tag)
    )
  }

  var creatingElmInVPre = 0;

  function createElm (
    vnode,
    insertedVnodeQueue,
    parentElm,
    refElm,
    nested,
    ownerArray,
    index
  ) {
    if (isDef(vnode.elm) && isDef(ownerArray)) {
      // This vnode was used in a previous render!
      // now it's used as a new node, overwriting its elm would cause
      // potential patch errors down the road when it's used as an insertion
      // reference node. Instead, we clone the node on-demand before creating
      // associated DOM element for it.
      vnode = ownerArray[index] = cloneVNode(vnode);
    }

    vnode.isRootInsert = !nested; // for transition enter check
    if (createComponent(vnode, insertedVnodeQueue, parentElm, refElm)) {
      return
    }

    var data = vnode.data;
    var children = vnode.children;
    var tag = vnode.tag;
    if (isDef(tag)) {
      if (true) {
        if (data && data.pre) {
          creatingElmInVPre++;
        }
        if (isUnknownElement$$1(vnode, creatingElmInVPre)) {
          warn(
            'Unknown custom element: <' + tag + '> - did you ' +
            'register the component correctly? For recursive components, ' +
            'make sure to provide the "name" option.',
            vnode.context
          );
        }
      }

      vnode.elm = vnode.ns
        ? nodeOps.createElementNS(vnode.ns, tag)
        : nodeOps.createElement(tag, vnode);
      setScope(vnode);

      /* istanbul ignore if */
      {
        createChildren(vnode, children, insertedVnodeQueue);
        if (isDef(data)) {
          invokeCreateHooks(vnode, insertedVnodeQueue);
        }
        insert(parentElm, vnode.elm, refElm);
      }

      if ( true && data && data.pre) {
        creatingElmInVPre--;
      }
    } else if (isTrue(vnode.isComment)) {
      vnode.elm = nodeOps.createComment(vnode.text);
      insert(parentElm, vnode.elm, refElm);
    } else {
      vnode.elm = nodeOps.createTextNode(vnode.text);
      insert(parentElm, vnode.elm, refElm);
    }
  }

  function createComponent (vnode, insertedVnodeQueue, parentElm, refElm) {
    var i = vnode.data;
    if (isDef(i)) {
      var isReactivated = isDef(vnode.componentInstance) && i.keepAlive;
      if (isDef(i = i.hook) && isDef(i = i.init)) {
        i(vnode, false /* hydrating */);
      }
      // after calling the init hook, if the vnode is a child component
      // it should've created a child instance and mounted it. the child
      // component also has set the placeholder vnode's elm.
      // in that case we can just return the element and be done.
      if (isDef(vnode.componentInstance)) {
        initComponent(vnode, insertedVnodeQueue);
        insert(parentElm, vnode.elm, refElm);
        if (isTrue(isReactivated)) {
          reactivateComponent(vnode, insertedVnodeQueue, parentElm, refElm);
        }
        return true
      }
    }
  }

  function initComponent (vnode, insertedVnodeQueue) {
    if (isDef(vnode.data.pendingInsert)) {
      insertedVnodeQueue.push.apply(insertedVnodeQueue, vnode.data.pendingInsert);
      vnode.data.pendingInsert = null;
    }
    vnode.elm = vnode.componentInstance.$el;
    if (isPatchable(vnode)) {
      invokeCreateHooks(vnode, insertedVnodeQueue);
      setScope(vnode);
    } else {
      // empty component root.
      // skip all element-related modules except for ref (#3455)
      registerRef(vnode);
      // make sure to invoke the insert hook
      insertedVnodeQueue.push(vnode);
    }
  }

  function reactivateComponent (vnode, insertedVnodeQueue, parentElm, refElm) {
    var i;
    // hack for #4339: a reactivated component with inner transition
    // does not trigger because the inner node's created hooks are not called
    // again. It's not ideal to involve module-specific logic in here but
    // there doesn't seem to be a better way to do it.
    var innerNode = vnode;
    while (innerNode.componentInstance) {
      innerNode = innerNode.componentInstance._vnode;
      if (isDef(i = innerNode.data) && isDef(i = i.transition)) {
        for (i = 0; i < cbs.activate.length; ++i) {
          cbs.activate[i](emptyNode, innerNode);
        }
        insertedVnodeQueue.push(innerNode);
        break
      }
    }
    // unlike a newly created component,
    // a reactivated keep-alive component doesn't insert itself
    insert(parentElm, vnode.elm, refElm);
  }

  function insert (parent, elm, ref$$1) {
    if (isDef(parent)) {
      if (isDef(ref$$1)) {
        if (nodeOps.parentNode(ref$$1) === parent) {
          nodeOps.insertBefore(parent, elm, ref$$1);
        }
      } else {
        nodeOps.appendChild(parent, elm);
      }
    }
  }

  function createChildren (vnode, children, insertedVnodeQueue) {
    if (Array.isArray(children)) {
      if (true) {
        checkDuplicateKeys(children);
      }
      for (var i = 0; i < children.length; ++i) {
        createElm(children[i], insertedVnodeQueue, vnode.elm, null, true, children, i);
      }
    } else if (isPrimitive(vnode.text)) {
      nodeOps.appendChild(vnode.elm, nodeOps.createTextNode(String(vnode.text)));
    }
  }

  function isPatchable (vnode) {
    while (vnode.componentInstance) {
      vnode = vnode.componentInstance._vnode;
    }
    return isDef(vnode.tag)
  }

  function invokeCreateHooks (vnode, insertedVnodeQueue) {
    for (var i$1 = 0; i$1 < cbs.create.length; ++i$1) {
      cbs.create[i$1](emptyNode, vnode);
    }
    i = vnode.data.hook; // Reuse variable
    if (isDef(i)) {
      if (isDef(i.create)) { i.create(emptyNode, vnode); }
      if (isDef(i.insert)) { insertedVnodeQueue.push(vnode); }
    }
  }

  // set scope id attribute for scoped CSS.
  // this is implemented as a special case to avoid the overhead
  // of going through the normal attribute patching process.
  function setScope (vnode) {
    var i;
    if (isDef(i = vnode.fnScopeId)) {
      nodeOps.setStyleScope(vnode.elm, i);
    } else {
      var ancestor = vnode;
      while (ancestor) {
        if (isDef(i = ancestor.context) && isDef(i = i.$options._scopeId)) {
          nodeOps.setStyleScope(vnode.elm, i);
        }
        ancestor = ancestor.parent;
      }
    }
    // for slot content they should also get the scopeId from the host instance.
    if (isDef(i = activeInstance) &&
      i !== vnode.context &&
      i !== vnode.fnContext &&
      isDef(i = i.$options._scopeId)
    ) {
      nodeOps.setStyleScope(vnode.elm, i);
    }
  }

  function addVnodes (parentElm, refElm, vnodes, startIdx, endIdx, insertedVnodeQueue) {
    for (; startIdx <= endIdx; ++startIdx) {
      createElm(vnodes[startIdx], insertedVnodeQueue, parentElm, refElm, false, vnodes, startIdx);
    }
  }

  function invokeDestroyHook (vnode) {
    var i, j;
    var data = vnode.data;
    if (isDef(data)) {
      if (isDef(i = data.hook) && isDef(i = i.destroy)) { i(vnode); }
      for (i = 0; i < cbs.destroy.length; ++i) { cbs.destroy[i](vnode); }
    }
    if (isDef(i = vnode.children)) {
      for (j = 0; j < vnode.children.length; ++j) {
        invokeDestroyHook(vnode.children[j]);
      }
    }
  }

  function removeVnodes (vnodes, startIdx, endIdx) {
    for (; startIdx <= endIdx; ++startIdx) {
      var ch = vnodes[startIdx];
      if (isDef(ch)) {
        if (isDef(ch.tag)) {
          removeAndInvokeRemoveHook(ch);
          invokeDestroyHook(ch);
        } else { // Text node
          removeNode(ch.elm);
        }
      }
    }
  }

  function removeAndInvokeRemoveHook (vnode, rm) {
    if (isDef(rm) || isDef(vnode.data)) {
      var i;
      var listeners = cbs.remove.length + 1;
      if (isDef(rm)) {
        // we have a recursively passed down rm callback
        // increase the listeners count
        rm.listeners += listeners;
      } else {
        // directly removing
        rm = createRmCb(vnode.elm, listeners);
      }
      // recursively invoke hooks on child component root node
      if (isDef(i = vnode.componentInstance) && isDef(i = i._vnode) && isDef(i.data)) {
        removeAndInvokeRemoveHook(i, rm);
      }
      for (i = 0; i < cbs.remove.length; ++i) {
        cbs.remove[i](vnode, rm);
      }
      if (isDef(i = vnode.data.hook) && isDef(i = i.remove)) {
        i(vnode, rm);
      } else {
        rm();
      }
    } else {
      removeNode(vnode.elm);
    }
  }

  function updateChildren (parentElm, oldCh, newCh, insertedVnodeQueue, removeOnly) {
    var oldStartIdx = 0;
    var newStartIdx = 0;
    var oldEndIdx = oldCh.length - 1;
    var oldStartVnode = oldCh[0];
    var oldEndVnode = oldCh[oldEndIdx];
    var newEndIdx = newCh.length - 1;
    var newStartVnode = newCh[0];
    var newEndVnode = newCh[newEndIdx];
    var oldKeyToIdx, idxInOld, vnodeToMove, refElm;

    // removeOnly is a special flag used only by <transition-group>
    // to ensure removed elements stay in correct relative positions
    // during leaving transitions
    var canMove = !removeOnly;

    if (true) {
      checkDuplicateKeys(newCh);
    }

    while (oldStartIdx <= oldEndIdx && newStartIdx <= newEndIdx) {
      if (isUndef(oldStartVnode)) {
        oldStartVnode = oldCh[++oldStartIdx]; // Vnode has been moved left
      } else if (isUndef(oldEndVnode)) {
        oldEndVnode = oldCh[--oldEndIdx];
      } else if (sameVnode(oldStartVnode, newStartVnode)) {
        patchVnode(oldStartVnode, newStartVnode, insertedVnodeQueue, newCh, newStartIdx);
        oldStartVnode = oldCh[++oldStartIdx];
        newStartVnode = newCh[++newStartIdx];
      } else if (sameVnode(oldEndVnode, newEndVnode)) {
        patchVnode(oldEndVnode, newEndVnode, insertedVnodeQueue, newCh, newEndIdx);
        oldEndVnode = oldCh[--oldEndIdx];
        newEndVnode = newCh[--newEndIdx];
      } else if (sameVnode(oldStartVnode, newEndVnode)) { // Vnode moved right
        patchVnode(oldStartVnode, newEndVnode, insertedVnodeQueue, newCh, newEndIdx);
        canMove && nodeOps.insertBefore(parentElm, oldStartVnode.elm, nodeOps.nextSibling(oldEndVnode.elm));
        oldStartVnode = oldCh[++oldStartIdx];
        newEndVnode = newCh[--newEndIdx];
      } else if (sameVnode(oldEndVnode, newStartVnode)) { // Vnode moved left
        patchVnode(oldEndVnode, newStartVnode, insertedVnodeQueue, newCh, newStartIdx);
        canMove && nodeOps.insertBefore(parentElm, oldEndVnode.elm, oldStartVnode.elm);
        oldEndVnode = oldCh[--oldEndIdx];
        newStartVnode = newCh[++newStartIdx];
      } else {
        if (isUndef(oldKeyToIdx)) { oldKeyToIdx = createKeyToOldIdx(oldCh, oldStartIdx, oldEndIdx); }
        idxInOld = isDef(newStartVnode.key)
          ? oldKeyToIdx[newStartVnode.key]
          : findIdxInOld(newStartVnode, oldCh, oldStartIdx, oldEndIdx);
        if (isUndef(idxInOld)) { // New element
          createElm(newStartVnode, insertedVnodeQueue, parentElm, oldStartVnode.elm, false, newCh, newStartIdx);
        } else {
          vnodeToMove = oldCh[idxInOld];
          if (sameVnode(vnodeToMove, newStartVnode)) {
            patchVnode(vnodeToMove, newStartVnode, insertedVnodeQueue, newCh, newStartIdx);
            oldCh[idxInOld] = undefined;
            canMove && nodeOps.insertBefore(parentElm, vnodeToMove.elm, oldStartVnode.elm);
          } else {
            // same key but different element. treat as new element
            createElm(newStartVnode, insertedVnodeQueue, parentElm, oldStartVnode.elm, false, newCh, newStartIdx);
          }
        }
        newStartVnode = newCh[++newStartIdx];
      }
    }
    if (oldStartIdx > oldEndIdx) {
      refElm = isUndef(newCh[newEndIdx + 1]) ? null : newCh[newEndIdx + 1].elm;
      addVnodes(parentElm, refElm, newCh, newStartIdx, newEndIdx, insertedVnodeQueue);
    } else if (newStartIdx > newEndIdx) {
      removeVnodes(oldCh, oldStartIdx, oldEndIdx);
    }
  }

  function checkDuplicateKeys (children) {
    var seenKeys = {};
    for (var i = 0; i < children.length; i++) {
      var vnode = children[i];
      var key = vnode.key;
      if (isDef(key)) {
        if (seenKeys[key]) {
          warn(
            ("Duplicate keys detected: '" + key + "'. This may cause an update error."),
            vnode.context
          );
        } else {
          seenKeys[key] = true;
        }
      }
    }
  }

  function findIdxInOld (node, oldCh, start, end) {
    for (var i = start; i < end; i++) {
      var c = oldCh[i];
      if (isDef(c) && sameVnode(node, c)) { return i }
    }
  }

  function patchVnode (
    oldVnode,
    vnode,
    insertedVnodeQueue,
    ownerArray,
    index,
    removeOnly
  ) {
    if (oldVnode === vnode) {
      return
    }

    if (isDef(vnode.elm) && isDef(ownerArray)) {
      // clone reused vnode
      vnode = ownerArray[index] = cloneVNode(vnode);
    }

    var elm = vnode.elm = oldVnode.elm;

    if (isTrue(oldVnode.isAsyncPlaceholder)) {
      if (isDef(vnode.asyncFactory.resolved)) {
        hydrate(oldVnode.elm, vnode, insertedVnodeQueue);
      } else {
        vnode.isAsyncPlaceholder = true;
      }
      return
    }

    // reuse element for static trees.
    // note we only do this if the vnode is cloned -
    // if the new node is not cloned it means the render functions have been
    // reset by the hot-reload-api and we need to do a proper re-render.
    if (isTrue(vnode.isStatic) &&
      isTrue(oldVnode.isStatic) &&
      vnode.key === oldVnode.key &&
      (isTrue(vnode.isCloned) || isTrue(vnode.isOnce))
    ) {
      vnode.componentInstance = oldVnode.componentInstance;
      return
    }

    var i;
    var data = vnode.data;
    if (isDef(data) && isDef(i = data.hook) && isDef(i = i.prepatch)) {
      i(oldVnode, vnode);
    }

    var oldCh = oldVnode.children;
    var ch = vnode.children;
    if (isDef(data) && isPatchable(vnode)) {
      for (i = 0; i < cbs.update.length; ++i) { cbs.update[i](oldVnode, vnode); }
      if (isDef(i = data.hook) && isDef(i = i.update)) { i(oldVnode, vnode); }
    }
    if (isUndef(vnode.text)) {
      if (isDef(oldCh) && isDef(ch)) {
        if (oldCh !== ch) { updateChildren(elm, oldCh, ch, insertedVnodeQueue, removeOnly); }
      } else if (isDef(ch)) {
        if (true) {
          checkDuplicateKeys(ch);
        }
        if (isDef(oldVnode.text)) { nodeOps.setTextContent(elm, ''); }
        addVnodes(elm, null, ch, 0, ch.length - 1, insertedVnodeQueue);
      } else if (isDef(oldCh)) {
        removeVnodes(oldCh, 0, oldCh.length - 1);
      } else if (isDef(oldVnode.text)) {
        nodeOps.setTextContent(elm, '');
      }
    } else if (oldVnode.text !== vnode.text) {
      nodeOps.setTextContent(elm, vnode.text);
    }
    if (isDef(data)) {
      if (isDef(i = data.hook) && isDef(i = i.postpatch)) { i(oldVnode, vnode); }
    }
  }

  function invokeInsertHook (vnode, queue, initial) {
    // delay insert hooks for component root nodes, invoke them after the
    // element is really inserted
    if (isTrue(initial) && isDef(vnode.parent)) {
      vnode.parent.data.pendingInsert = queue;
    } else {
      for (var i = 0; i < queue.length; ++i) {
        queue[i].data.hook.insert(queue[i]);
      }
    }
  }

  var hydrationBailed = false;
  // list of modules that can skip create hook during hydration because they
  // are already rendered on the client or has no need for initialization
  // Note: style is excluded because it relies on initial clone for future
  // deep updates (#7063).
  var isRenderedModule = makeMap('attrs,class,staticClass,staticStyle,key');

  // Note: this is a browser-only function so we can assume elms are DOM nodes.
  function hydrate (elm, vnode, insertedVnodeQueue, inVPre) {
    var i;
    var tag = vnode.tag;
    var data = vnode.data;
    var children = vnode.children;
    inVPre = inVPre || (data && data.pre);
    vnode.elm = elm;

    if (isTrue(vnode.isComment) && isDef(vnode.asyncFactory)) {
      vnode.isAsyncPlaceholder = true;
      return true
    }
    // assert node match
    if (true) {
      if (!assertNodeMatch(elm, vnode, inVPre)) {
        return false
      }
    }
    if (isDef(data)) {
      if (isDef(i = data.hook) && isDef(i = i.init)) { i(vnode, true /* hydrating */); }
      if (isDef(i = vnode.componentInstance)) {
        // child component. it should have hydrated its own tree.
        initComponent(vnode, insertedVnodeQueue);
        return true
      }
    }
    if (isDef(tag)) {
      if (isDef(children)) {
        // empty element, allow client to pick up and populate children
        if (!elm.hasChildNodes()) {
          createChildren(vnode, children, insertedVnodeQueue);
        } else {
          // v-html and domProps: innerHTML
          if (isDef(i = data) && isDef(i = i.domProps) && isDef(i = i.innerHTML)) {
            if (i !== elm.innerHTML) {
              /* istanbul ignore if */
              if ( true &&
                typeof console !== 'undefined' &&
                !hydrationBailed
              ) {
                hydrationBailed = true;
                console.warn('Parent: ', elm);
                console.warn('server innerHTML: ', i);
                console.warn('client innerHTML: ', elm.innerHTML);
              }
              return false
            }
          } else {
            // iterate and compare children lists
            var childrenMatch = true;
            var childNode = elm.firstChild;
            for (var i$1 = 0; i$1 < children.length; i$1++) {
              if (!childNode || !hydrate(childNode, children[i$1], insertedVnodeQueue, inVPre)) {
                childrenMatch = false;
                break
              }
              childNode = childNode.nextSibling;
            }
            // if childNode is not null, it means the actual childNodes list is
            // longer than the virtual children list.
            if (!childrenMatch || childNode) {
              /* istanbul ignore if */
              if ( true &&
                typeof console !== 'undefined' &&
                !hydrationBailed
              ) {
                hydrationBailed = true;
                console.warn('Parent: ', elm);
                console.warn('Mismatching childNodes vs. VNodes: ', elm.childNodes, children);
              }
              return false
            }
          }
        }
      }
      if (isDef(data)) {
        var fullInvoke = false;
        for (var key in data) {
          if (!isRenderedModule(key)) {
            fullInvoke = true;
            invokeCreateHooks(vnode, insertedVnodeQueue);
            break
          }
        }
        if (!fullInvoke && data['class']) {
          // ensure collecting deps for deep class bindings for future updates
          traverse(data['class']);
        }
      }
    } else if (elm.data !== vnode.text) {
      elm.data = vnode.text;
    }
    return true
  }

  function assertNodeMatch (node, vnode, inVPre) {
    if (isDef(vnode.tag)) {
      return vnode.tag.indexOf('vue-component') === 0 || (
        !isUnknownElement$$1(vnode, inVPre) &&
        vnode.tag.toLowerCase() === (node.tagName && node.tagName.toLowerCase())
      )
    } else {
      return node.nodeType === (vnode.isComment ? 8 : 3)
    }
  }

  return function patch (oldVnode, vnode, hydrating, removeOnly) {
    if (isUndef(vnode)) {
      if (isDef(oldVnode)) { invokeDestroyHook(oldVnode); }
      return
    }

    var isInitialPatch = false;
    var insertedVnodeQueue = [];

    if (isUndef(oldVnode)) {
      // empty mount (likely as component), create new root element
      isInitialPatch = true;
      createElm(vnode, insertedVnodeQueue);
    } else {
      var isRealElement = isDef(oldVnode.nodeType);
      if (!isRealElement && sameVnode(oldVnode, vnode)) {
        // patch existing root node
        patchVnode(oldVnode, vnode, insertedVnodeQueue, null, null, removeOnly);
      } else {
        if (isRealElement) {
          // mounting to a real element
          // check if this is server-rendered content and if we can perform
          // a successful hydration.
          if (oldVnode.nodeType === 1 && oldVnode.hasAttribute(SSR_ATTR)) {
            oldVnode.removeAttribute(SSR_ATTR);
            hydrating = true;
          }
          if (isTrue(hydrating)) {
            if (hydrate(oldVnode, vnode, insertedVnodeQueue)) {
              invokeInsertHook(vnode, insertedVnodeQueue, true);
              return oldVnode
            } else if (true) {
              warn(
                'The client-side rendered virtual DOM tree is not matching ' +
                'server-rendered content. This is likely caused by incorrect ' +
                'HTML markup, for example nesting block-level elements inside ' +
                '<p>, or missing <tbody>. Bailing hydration and performing ' +
                'full client-side render.'
              );
            }
          }
          // either not server-rendered, or hydration failed.
          // create an empty node and replace it
          oldVnode = emptyNodeAt(oldVnode);
        }

        // replacing existing element
        var oldElm = oldVnode.elm;
        var parentElm = nodeOps.parentNode(oldElm);

        // create new node
        createElm(
          vnode,
          insertedVnodeQueue,
          // extremely rare edge case: do not insert if old element is in a
          // leaving transition. Only happens when combining transition +
          // keep-alive + HOCs. (#4590)
          oldElm._leaveCb ? null : parentElm,
          nodeOps.nextSibling(oldElm)
        );

        // update parent placeholder node element, recursively
        if (isDef(vnode.parent)) {
          var ancestor = vnode.parent;
          var patchable = isPatchable(vnode);
          while (ancestor) {
            for (var i = 0; i < cbs.destroy.length; ++i) {
              cbs.destroy[i](ancestor);
            }
            ancestor.elm = vnode.elm;
            if (patchable) {
              for (var i$1 = 0; i$1 < cbs.create.length; ++i$1) {
                cbs.create[i$1](emptyNode, ancestor);
              }
              // #6513
              // invoke insert hooks that may have been merged by create hooks.
              // e.g. for directives that uses the "inserted" hook.
              var insert = ancestor.data.hook.insert;
              if (insert.merged) {
                // start at index 1 to avoid re-invoking component mounted hook
                for (var i$2 = 1; i$2 < insert.fns.length; i$2++) {
                  insert.fns[i$2]();
                }
              }
            } else {
              registerRef(ancestor);
            }
            ancestor = ancestor.parent;
          }
        }

        // destroy old node
        if (isDef(parentElm)) {
          removeVnodes([oldVnode], 0, 0);
        } else if (isDef(oldVnode.tag)) {
          invokeDestroyHook(oldVnode);
        }
      }
    }

    invokeInsertHook(vnode, insertedVnodeQueue, isInitialPatch);
    return vnode.elm
  }
}

/*  */

var directives = {
  create: updateDirectives,
  update: updateDirectives,
  destroy: function unbindDirectives (vnode) {
    updateDirectives(vnode, emptyNode);
  }
};

function updateDirectives (oldVnode, vnode) {
  if (oldVnode.data.directives || vnode.data.directives) {
    _update(oldVnode, vnode);
  }
}

function _update (oldVnode, vnode) {
  var isCreate = oldVnode === emptyNode;
  var isDestroy = vnode === emptyNode;
  var oldDirs = normalizeDirectives$1(oldVnode.data.directives, oldVnode.context);
  var newDirs = normalizeDirectives$1(vnode.data.directives, vnode.context);

  var dirsWithInsert = [];
  var dirsWithPostpatch = [];

  var key, oldDir, dir;
  for (key in newDirs) {
    oldDir = oldDirs[key];
    dir = newDirs[key];
    if (!oldDir) {
      // new directive, bind
      callHook$1(dir, 'bind', vnode, oldVnode);
      if (dir.def && dir.def.inserted) {
        dirsWithInsert.push(dir);
      }
    } else {
      // existing directive, update
      dir.oldValue = oldDir.value;
      dir.oldArg = oldDir.arg;
      callHook$1(dir, 'update', vnode, oldVnode);
      if (dir.def && dir.def.componentUpdated) {
        dirsWithPostpatch.push(dir);
      }
    }
  }

  if (dirsWithInsert.length) {
    var callInsert = function () {
      for (var i = 0; i < dirsWithInsert.length; i++) {
        callHook$1(dirsWithInsert[i], 'inserted', vnode, oldVnode);
      }
    };
    if (isCreate) {
      mergeVNodeHook(vnode, 'insert', callInsert);
    } else {
      callInsert();
    }
  }

  if (dirsWithPostpatch.length) {
    mergeVNodeHook(vnode, 'postpatch', function () {
      for (var i = 0; i < dirsWithPostpatch.length; i++) {
        callHook$1(dirsWithPostpatch[i], 'componentUpdated', vnode, oldVnode);
      }
    });
  }

  if (!isCreate) {
    for (key in oldDirs) {
      if (!newDirs[key]) {
        // no longer present, unbind
        callHook$1(oldDirs[key], 'unbind', oldVnode, oldVnode, isDestroy);
      }
    }
  }
}

var emptyModifiers = Object.create(null);

function normalizeDirectives$1 (
  dirs,
  vm
) {
  var res = Object.create(null);
  if (!dirs) {
    // $flow-disable-line
    return res
  }
  var i, dir;
  for (i = 0; i < dirs.length; i++) {
    dir = dirs[i];
    if (!dir.modifiers) {
      // $flow-disable-line
      dir.modifiers = emptyModifiers;
    }
    res[getRawDirName(dir)] = dir;
    dir.def = resolveAsset(vm.$options, 'directives', dir.name, true);
  }
  // $flow-disable-line
  return res
}

function getRawDirName (dir) {
  return dir.rawName || ((dir.name) + "." + (Object.keys(dir.modifiers || {}).join('.')))
}

function callHook$1 (dir, hook, vnode, oldVnode, isDestroy) {
  var fn = dir.def && dir.def[hook];
  if (fn) {
    try {
      fn(vnode.elm, dir, vnode, oldVnode, isDestroy);
    } catch (e) {
      handleError(e, vnode.context, ("directive " + (dir.name) + " " + hook + " hook"));
    }
  }
}

var baseModules = [
  ref,
  directives
];

/*  */

function updateAttrs (oldVnode, vnode) {
  var opts = vnode.componentOptions;
  if (isDef(opts) && opts.Ctor.options.inheritAttrs === false) {
    return
  }
  if (isUndef(oldVnode.data.attrs) && isUndef(vnode.data.attrs)) {
    return
  }
  var key, cur, old;
  var elm = vnode.elm;
  var oldAttrs = oldVnode.data.attrs || {};
  var attrs = vnode.data.attrs || {};
  // clone observed objects, as the user probably wants to mutate it
  if (isDef(attrs.__ob__)) {
    attrs = vnode.data.attrs = extend({}, attrs);
  }

  for (key in attrs) {
    cur = attrs[key];
    old = oldAttrs[key];
    if (old !== cur) {
      setAttr(elm, key, cur);
    }
  }
  // #4391: in IE9, setting type can reset value for input[type=radio]
  // #6666: IE/Edge forces progress value down to 1 before setting a max
  /* istanbul ignore if */
  if ((isIE || isEdge) && attrs.value !== oldAttrs.value) {
    setAttr(elm, 'value', attrs.value);
  }
  for (key in oldAttrs) {
    if (isUndef(attrs[key])) {
      if (isXlink(key)) {
        elm.removeAttributeNS(xlinkNS, getXlinkProp(key));
      } else if (!isEnumeratedAttr(key)) {
        elm.removeAttribute(key);
      }
    }
  }
}

function setAttr (el, key, value) {
  if (el.tagName.indexOf('-') > -1) {
    baseSetAttr(el, key, value);
  } else if (isBooleanAttr(key)) {
    // set attribute for blank value
    // e.g. <option disabled>Select one</option>
    if (isFalsyAttrValue(value)) {
      el.removeAttribute(key);
    } else {
      // technically allowfullscreen is a boolean attribute for <iframe>,
      // but Flash expects a value of "true" when used on <embed> tag
      value = key === 'allowfullscreen' && el.tagName === 'EMBED'
        ? 'true'
        : key;
      el.setAttribute(key, value);
    }
  } else if (isEnumeratedAttr(key)) {
    el.setAttribute(key, convertEnumeratedValue(key, value));
  } else if (isXlink(key)) {
    if (isFalsyAttrValue(value)) {
      el.removeAttributeNS(xlinkNS, getXlinkProp(key));
    } else {
      el.setAttributeNS(xlinkNS, key, value);
    }
  } else {
    baseSetAttr(el, key, value);
  }
}

function baseSetAttr (el, key, value) {
  if (isFalsyAttrValue(value)) {
    el.removeAttribute(key);
  } else {
    // #7138: IE10 & 11 fires input event when setting placeholder on
    // <textarea>... block the first input event and remove the blocker
    // immediately.
    /* istanbul ignore if */
    if (
      isIE && !isIE9 &&
      el.tagName === 'TEXTAREA' &&
      key === 'placeholder' && value !== '' && !el.__ieph
    ) {
      var blocker = function (e) {
        e.stopImmediatePropagation();
        el.removeEventListener('input', blocker);
      };
      el.addEventListener('input', blocker);
      // $flow-disable-line
      el.__ieph = true; /* IE placeholder patched */
    }
    el.setAttribute(key, value);
  }
}

var attrs = {
  create: updateAttrs,
  update: updateAttrs
};

/*  */

function updateClass (oldVnode, vnode) {
  var el = vnode.elm;
  var data = vnode.data;
  var oldData = oldVnode.data;
  if (
    isUndef(data.staticClass) &&
    isUndef(data.class) && (
      isUndef(oldData) || (
        isUndef(oldData.staticClass) &&
        isUndef(oldData.class)
      )
    )
  ) {
    return
  }

  var cls = genClassForVnode(vnode);

  // handle transition classes
  var transitionClass = el._transitionClasses;
  if (isDef(transitionClass)) {
    cls = concat(cls, stringifyClass(transitionClass));
  }

  // set the class
  if (cls !== el._prevClass) {
    el.setAttribute('class', cls);
    el._prevClass = cls;
  }
}

var klass = {
  create: updateClass,
  update: updateClass
};

/*  */

/*  */

/*  */

/*  */

// in some cases, the event used has to be determined at runtime
// so we used some reserved tokens during compile.
var RANGE_TOKEN = '__r';
var CHECKBOX_RADIO_TOKEN = '__c';

/*  */

// normalize v-model event tokens that can only be determined at runtime.
// it's important to place the event as the first in the array because
// the whole point is ensuring the v-model callback gets called before
// user-attached handlers.
function normalizeEvents (on) {
  /* istanbul ignore if */
  if (isDef(on[RANGE_TOKEN])) {
    // IE input[type=range] only supports `change` event
    var event = isIE ? 'change' : 'input';
    on[event] = [].concat(on[RANGE_TOKEN], on[event] || []);
    delete on[RANGE_TOKEN];
  }
  // This was originally intended to fix #4521 but no longer necessary
  // after 2.5. Keeping it for backwards compat with generated code from < 2.4
  /* istanbul ignore if */
  if (isDef(on[CHECKBOX_RADIO_TOKEN])) {
    on.change = [].concat(on[CHECKBOX_RADIO_TOKEN], on.change || []);
    delete on[CHECKBOX_RADIO_TOKEN];
  }
}

var target$1;

function createOnceHandler$1 (event, handler, capture) {
  var _target = target$1; // save current target element in closure
  return function onceHandler () {
    var res = handler.apply(null, arguments);
    if (res !== null) {
      remove$2(event, onceHandler, capture, _target);
    }
  }
}

// #9446: Firefox <= 53 (in particular, ESR 52) has incorrect Event.timeStamp
// implementation and does not fire microtasks in between event propagation, so
// safe to exclude.
var useMicrotaskFix = isUsingMicroTask && !(isFF && Number(isFF[1]) <= 53);

function add$1 (
  name,
  handler,
  capture,
  passive
) {
  // async edge case #6566: inner click event triggers patch, event handler
  // attached to outer element during patch, and triggered again. This
  // happens because browsers fire microtask ticks between event propagation.
  // the solution is simple: we save the timestamp when a handler is attached,
  // and the handler would only fire if the event passed to it was fired
  // AFTER it was attached.
  if (useMicrotaskFix) {
    var attachedTimestamp = currentFlushTimestamp;
    var original = handler;
    handler = original._wrapper = function (e) {
      if (
        // no bubbling, should always fire.
        // this is just a safety net in case event.timeStamp is unreliable in
        // certain weird environments...
        e.target === e.currentTarget ||
        // event is fired after handler attachment
        e.timeStamp >= attachedTimestamp ||
        // bail for environments that have buggy event.timeStamp implementations
        // #9462 iOS 9 bug: event.timeStamp is 0 after history.pushState
        // #9681 QtWebEngine event.timeStamp is negative value
        e.timeStamp <= 0 ||
        // #9448 bail if event is fired in another document in a multi-page
        // electron/nw.js app, since event.timeStamp will be using a different
        // starting reference
        e.target.ownerDocument !== document
      ) {
        return original.apply(this, arguments)
      }
    };
  }
  target$1.addEventListener(
    name,
    handler,
    supportsPassive
      ? { capture: capture, passive: passive }
      : capture
  );
}

function remove$2 (
  name,
  handler,
  capture,
  _target
) {
  (_target || target$1).removeEventListener(
    name,
    handler._wrapper || handler,
    capture
  );
}

function updateDOMListeners (oldVnode, vnode) {
  if (isUndef(oldVnode.data.on) && isUndef(vnode.data.on)) {
    return
  }
  var on = vnode.data.on || {};
  var oldOn = oldVnode.data.on || {};
  target$1 = vnode.elm;
  normalizeEvents(on);
  updateListeners(on, oldOn, add$1, remove$2, createOnceHandler$1, vnode.context);
  target$1 = undefined;
}

var events = {
  create: updateDOMListeners,
  update: updateDOMListeners
};

/*  */

var svgContainer;

function updateDOMProps (oldVnode, vnode) {
  if (isUndef(oldVnode.data.domProps) && isUndef(vnode.data.domProps)) {
    return
  }
  var key, cur;
  var elm = vnode.elm;
  var oldProps = oldVnode.data.domProps || {};
  var props = vnode.data.domProps || {};
  // clone observed objects, as the user probably wants to mutate it
  if (isDef(props.__ob__)) {
    props = vnode.data.domProps = extend({}, props);
  }

  for (key in oldProps) {
    if (!(key in props)) {
      elm[key] = '';
    }
  }

  for (key in props) {
    cur = props[key];
    // ignore children if the node has textContent or innerHTML,
    // as these will throw away existing DOM nodes and cause removal errors
    // on subsequent patches (#3360)
    if (key === 'textContent' || key === 'innerHTML') {
      if (vnode.children) { vnode.children.length = 0; }
      if (cur === oldProps[key]) { continue }
      // #6601 work around Chrome version <= 55 bug where single textNode
      // replaced by innerHTML/textContent retains its parentNode property
      if (elm.childNodes.length === 1) {
        elm.removeChild(elm.childNodes[0]);
      }
    }

    if (key === 'value' && elm.tagName !== 'PROGRESS') {
      // store value as _value as well since
      // non-string values will be stringified
      elm._value = cur;
      // avoid resetting cursor position when value is the same
      var strCur = isUndef(cur) ? '' : String(cur);
      if (shouldUpdateValue(elm, strCur)) {
        elm.value = strCur;
      }
    } else if (key === 'innerHTML' && isSVG(elm.tagName) && isUndef(elm.innerHTML)) {
      // IE doesn't support innerHTML for SVG elements
      svgContainer = svgContainer || document.createElement('div');
      svgContainer.innerHTML = "<svg>" + cur + "</svg>";
      var svg = svgContainer.firstChild;
      while (elm.firstChild) {
        elm.removeChild(elm.firstChild);
      }
      while (svg.firstChild) {
        elm.appendChild(svg.firstChild);
      }
    } else if (
      // skip the update if old and new VDOM state is the same.
      // `value` is handled separately because the DOM value may be temporarily
      // out of sync with VDOM state due to focus, composition and modifiers.
      // This  #4521 by skipping the unnecesarry `checked` update.
      cur !== oldProps[key]
    ) {
      // some property updates can throw
      // e.g. `value` on <progress> w/ non-finite value
      try {
        elm[key] = cur;
      } catch (e) {}
    }
  }
}

// check platforms/web/util/attrs.js acceptValue


function shouldUpdateValue (elm, checkVal) {
  return (!elm.composing && (
    elm.tagName === 'OPTION' ||
    isNotInFocusAndDirty(elm, checkVal) ||
    isDirtyWithModifiers(elm, checkVal)
  ))
}

function isNotInFocusAndDirty (elm, checkVal) {
  // return true when textbox (.number and .trim) loses focus and its value is
  // not equal to the updated value
  var notInFocus = true;
  // #6157
  // work around IE bug when accessing document.activeElement in an iframe
  try { notInFocus = document.activeElement !== elm; } catch (e) {}
  return notInFocus && elm.value !== checkVal
}

function isDirtyWithModifiers (elm, newVal) {
  var value = elm.value;
  var modifiers = elm._vModifiers; // injected by v-model runtime
  if (isDef(modifiers)) {
    if (modifiers.number) {
      return toNumber(value) !== toNumber(newVal)
    }
    if (modifiers.trim) {
      return value.trim() !== newVal.trim()
    }
  }
  return value !== newVal
}

var domProps = {
  create: updateDOMProps,
  update: updateDOMProps
};

/*  */

var parseStyleText = cached(function (cssText) {
  var res = {};
  var listDelimiter = /;(?![^(]*\))/g;
  var propertyDelimiter = /:(.+)/;
  cssText.split(listDelimiter).forEach(function (item) {
    if (item) {
      var tmp = item.split(propertyDelimiter);
      tmp.length > 1 && (res[tmp[0].trim()] = tmp[1].trim());
    }
  });
  return res
});

// merge static and dynamic style data on the same vnode
function normalizeStyleData (data) {
  var style = normalizeStyleBinding(data.style);
  // static style is pre-processed into an object during compilation
  // and is always a fresh object, so it's safe to merge into it
  return data.staticStyle
    ? extend(data.staticStyle, style)
    : style
}

// normalize possible array / string values into Object
function normalizeStyleBinding (bindingStyle) {
  if (Array.isArray(bindingStyle)) {
    return toObject(bindingStyle)
  }
  if (typeof bindingStyle === 'string') {
    return parseStyleText(bindingStyle)
  }
  return bindingStyle
}

/**
 * parent component style should be after child's
 * so that parent component's style could override it
 */
function getStyle (vnode, checkChild) {
  var res = {};
  var styleData;

  if (checkChild) {
    var childNode = vnode;
    while (childNode.componentInstance) {
      childNode = childNode.componentInstance._vnode;
      if (
        childNode && childNode.data &&
        (styleData = normalizeStyleData(childNode.data))
      ) {
        extend(res, styleData);
      }
    }
  }

  if ((styleData = normalizeStyleData(vnode.data))) {
    extend(res, styleData);
  }

  var parentNode = vnode;
  while ((parentNode = parentNode.parent)) {
    if (parentNode.data && (styleData = normalizeStyleData(parentNode.data))) {
      extend(res, styleData);
    }
  }
  return res
}

/*  */

var cssVarRE = /^--/;
var importantRE = /\s*!important$/;
var setProp = function (el, name, val) {
  /* istanbul ignore if */
  if (cssVarRE.test(name)) {
    el.style.setProperty(name, val);
  } else if (importantRE.test(val)) {
    el.style.setProperty(hyphenate(name), val.replace(importantRE, ''), 'important');
  } else {
    var normalizedName = normalize(name);
    if (Array.isArray(val)) {
      // Support values array created by autoprefixer, e.g.
      // {display: ["-webkit-box", "-ms-flexbox", "flex"]}
      // Set them one by one, and the browser will only set those it can recognize
      for (var i = 0, len = val.length; i < len; i++) {
        el.style[normalizedName] = val[i];
      }
    } else {
      el.style[normalizedName] = val;
    }
  }
};

var vendorNames = ['Webkit', 'Moz', 'ms'];

var emptyStyle;
var normalize = cached(function (prop) {
  emptyStyle = emptyStyle || document.createElement('div').style;
  prop = camelize(prop);
  if (prop !== 'filter' && (prop in emptyStyle)) {
    return prop
  }
  var capName = prop.charAt(0).toUpperCase() + prop.slice(1);
  for (var i = 0; i < vendorNames.length; i++) {
    var name = vendorNames[i] + capName;
    if (name in emptyStyle) {
      return name
    }
  }
});

function updateStyle (oldVnode, vnode) {
  var data = vnode.data;
  var oldData = oldVnode.data;

  if (isUndef(data.staticStyle) && isUndef(data.style) &&
    isUndef(oldData.staticStyle) && isUndef(oldData.style)
  ) {
    return
  }

  var cur, name;
  var el = vnode.elm;
  var oldStaticStyle = oldData.staticStyle;
  var oldStyleBinding = oldData.normalizedStyle || oldData.style || {};

  // if static style exists, stylebinding already merged into it when doing normalizeStyleData
  var oldStyle = oldStaticStyle || oldStyleBinding;

  var style = normalizeStyleBinding(vnode.data.style) || {};

  // store normalized style under a different key for next diff
  // make sure to clone it if it's reactive, since the user likely wants
  // to mutate it.
  vnode.data.normalizedStyle = isDef(style.__ob__)
    ? extend({}, style)
    : style;

  var newStyle = getStyle(vnode, true);

  for (name in oldStyle) {
    if (isUndef(newStyle[name])) {
      setProp(el, name, '');
    }
  }
  for (name in newStyle) {
    cur = newStyle[name];
    if (cur !== oldStyle[name]) {
      // ie9 setting to null has no effect, must use empty string
      setProp(el, name, cur == null ? '' : cur);
    }
  }
}

var style = {
  create: updateStyle,
  update: updateStyle
};

/*  */

var whitespaceRE = /\s+/;

/**
 * Add class with compatibility for SVG since classList is not supported on
 * SVG elements in IE
 */
function addClass (el, cls) {
  /* istanbul ignore if */
  if (!cls || !(cls = cls.trim())) {
    return
  }

  /* istanbul ignore else */
  if (el.classList) {
    if (cls.indexOf(' ') > -1) {
      cls.split(whitespaceRE).forEach(function (c) { return el.classList.add(c); });
    } else {
      el.classList.add(cls);
    }
  } else {
    var cur = " " + (el.getAttribute('class') || '') + " ";
    if (cur.indexOf(' ' + cls + ' ') < 0) {
      el.setAttribute('class', (cur + cls).trim());
    }
  }
}

/**
 * Remove class with compatibility for SVG since classList is not supported on
 * SVG elements in IE
 */
function removeClass (el, cls) {
  /* istanbul ignore if */
  if (!cls || !(cls = cls.trim())) {
    return
  }

  /* istanbul ignore else */
  if (el.classList) {
    if (cls.indexOf(' ') > -1) {
      cls.split(whitespaceRE).forEach(function (c) { return el.classList.remove(c); });
    } else {
      el.classList.remove(cls);
    }
    if (!el.classList.length) {
      el.removeAttribute('class');
    }
  } else {
    var cur = " " + (el.getAttribute('class') || '') + " ";
    var tar = ' ' + cls + ' ';
    while (cur.indexOf(tar) >= 0) {
      cur = cur.replace(tar, ' ');
    }
    cur = cur.trim();
    if (cur) {
      el.setAttribute('class', cur);
    } else {
      el.removeAttribute('class');
    }
  }
}

/*  */

function resolveTransition (def$$1) {
  if (!def$$1) {
    return
  }
  /* istanbul ignore else */
  if (typeof def$$1 === 'object') {
    var res = {};
    if (def$$1.css !== false) {
      extend(res, autoCssTransition(def$$1.name || 'v'));
    }
    extend(res, def$$1);
    return res
  } else if (typeof def$$1 === 'string') {
    return autoCssTransition(def$$1)
  }
}

var autoCssTransition = cached(function (name) {
  return {
    enterClass: (name + "-enter"),
    enterToClass: (name + "-enter-to"),
    enterActiveClass: (name + "-enter-active"),
    leaveClass: (name + "-leave"),
    leaveToClass: (name + "-leave-to"),
    leaveActiveClass: (name + "-leave-active")
  }
});

var hasTransition = inBrowser && !isIE9;
var TRANSITION = 'transition';
var ANIMATION = 'animation';

// Transition property/event sniffing
var transitionProp = 'transition';
var transitionEndEvent = 'transitionend';
var animationProp = 'animation';
var animationEndEvent = 'animationend';
if (hasTransition) {
  /* istanbul ignore if */
  if (window.ontransitionend === undefined &&
    window.onwebkittransitionend !== undefined
  ) {
    transitionProp = 'WebkitTransition';
    transitionEndEvent = 'webkitTransitionEnd';
  }
  if (window.onanimationend === undefined &&
    window.onwebkitanimationend !== undefined
  ) {
    animationProp = 'WebkitAnimation';
    animationEndEvent = 'webkitAnimationEnd';
  }
}

// binding to window is necessary to make hot reload work in IE in strict mode
var raf = inBrowser
  ? window.requestAnimationFrame
    ? window.requestAnimationFrame.bind(window)
    : setTimeout
  : /* istanbul ignore next */ function (fn) { return fn(); };

function nextFrame (fn) {
  raf(function () {
    raf(fn);
  });
}

function addTransitionClass (el, cls) {
  var transitionClasses = el._transitionClasses || (el._transitionClasses = []);
  if (transitionClasses.indexOf(cls) < 0) {
    transitionClasses.push(cls);
    addClass(el, cls);
  }
}

function removeTransitionClass (el, cls) {
  if (el._transitionClasses) {
    remove(el._transitionClasses, cls);
  }
  removeClass(el, cls);
}

function whenTransitionEnds (
  el,
  expectedType,
  cb
) {
  var ref = getTransitionInfo(el, expectedType);
  var type = ref.type;
  var timeout = ref.timeout;
  var propCount = ref.propCount;
  if (!type) { return cb() }
  var event = type === TRANSITION ? transitionEndEvent : animationEndEvent;
  var ended = 0;
  var end = function () {
    el.removeEventListener(event, onEnd);
    cb();
  };
  var onEnd = function (e) {
    if (e.target === el) {
      if (++ended >= propCount) {
        end();
      }
    }
  };
  setTimeout(function () {
    if (ended < propCount) {
      end();
    }
  }, timeout + 1);
  el.addEventListener(event, onEnd);
}

var transformRE = /\b(transform|all)(,|$)/;

function getTransitionInfo (el, expectedType) {
  var styles = window.getComputedStyle(el);
  // JSDOM may return undefined for transition properties
  var transitionDelays = (styles[transitionProp + 'Delay'] || '').split(', ');
  var transitionDurations = (styles[transitionProp + 'Duration'] || '').split(', ');
  var transitionTimeout = getTimeout(transitionDelays, transitionDurations);
  var animationDelays = (styles[animationProp + 'Delay'] || '').split(', ');
  var animationDurations = (styles[animationProp + 'Duration'] || '').split(', ');
  var animationTimeout = getTimeout(animationDelays, animationDurations);

  var type;
  var timeout = 0;
  var propCount = 0;
  /* istanbul ignore if */
  if (expectedType === TRANSITION) {
    if (transitionTimeout > 0) {
      type = TRANSITION;
      timeout = transitionTimeout;
      propCount = transitionDurations.length;
    }
  } else if (expectedType === ANIMATION) {
    if (animationTimeout > 0) {
      type = ANIMATION;
      timeout = animationTimeout;
      propCount = animationDurations.length;
    }
  } else {
    timeout = Math.max(transitionTimeout, animationTimeout);
    type = timeout > 0
      ? transitionTimeout > animationTimeout
        ? TRANSITION
        : ANIMATION
      : null;
    propCount = type
      ? type === TRANSITION
        ? transitionDurations.length
        : animationDurations.length
      : 0;
  }
  var hasTransform =
    type === TRANSITION &&
    transformRE.test(styles[transitionProp + 'Property']);
  return {
    type: type,
    timeout: timeout,
    propCount: propCount,
    hasTransform: hasTransform
  }
}

function getTimeout (delays, durations) {
  /* istanbul ignore next */
  while (delays.length < durations.length) {
    delays = delays.concat(delays);
  }

  return Math.max.apply(null, durations.map(function (d, i) {
    return toMs(d) + toMs(delays[i])
  }))
}

// Old versions of Chromium (below 61.0.3163.100) formats floating pointer numbers
// in a locale-dependent way, using a comma instead of a dot.
// If comma is not replaced with a dot, the input will be rounded down (i.e. acting
// as a floor function) causing unexpected behaviors
function toMs (s) {
  return Number(s.slice(0, -1).replace(',', '.')) * 1000
}

/*  */

function enter (vnode, toggleDisplay) {
  var el = vnode.elm;

  // call leave callback now
  if (isDef(el._leaveCb)) {
    el._leaveCb.cancelled = true;
    el._leaveCb();
  }

  var data = resolveTransition(vnode.data.transition);
  if (isUndef(data)) {
    return
  }

  /* istanbul ignore if */
  if (isDef(el._enterCb) || el.nodeType !== 1) {
    return
  }

  var css = data.css;
  var type = data.type;
  var enterClass = data.enterClass;
  var enterToClass = data.enterToClass;
  var enterActiveClass = data.enterActiveClass;
  var appearClass = data.appearClass;
  var appearToClass = data.appearToClass;
  var appearActiveClass = data.appearActiveClass;
  var beforeEnter = data.beforeEnter;
  var enter = data.enter;
  var afterEnter = data.afterEnter;
  var enterCancelled = data.enterCancelled;
  var beforeAppear = data.beforeAppear;
  var appear = data.appear;
  var afterAppear = data.afterAppear;
  var appearCancelled = data.appearCancelled;
  var duration = data.duration;

  // activeInstance will always be the <transition> component managing this
  // transition. One edge case to check is when the <transition> is placed
  // as the root node of a child component. In that case we need to check
  // <transition>'s parent for appear check.
  var context = activeInstance;
  var transitionNode = activeInstance.$vnode;
  while (transitionNode && transitionNode.parent) {
    context = transitionNode.context;
    transitionNode = transitionNode.parent;
  }

  var isAppear = !context._isMounted || !vnode.isRootInsert;

  if (isAppear && !appear && appear !== '') {
    return
  }

  var startClass = isAppear && appearClass
    ? appearClass
    : enterClass;
  var activeClass = isAppear && appearActiveClass
    ? appearActiveClass
    : enterActiveClass;
  var toClass = isAppear && appearToClass
    ? appearToClass
    : enterToClass;

  var beforeEnterHook = isAppear
    ? (beforeAppear || beforeEnter)
    : beforeEnter;
  var enterHook = isAppear
    ? (typeof appear === 'function' ? appear : enter)
    : enter;
  var afterEnterHook = isAppear
    ? (afterAppear || afterEnter)
    : afterEnter;
  var enterCancelledHook = isAppear
    ? (appearCancelled || enterCancelled)
    : enterCancelled;

  var explicitEnterDuration = toNumber(
    isObject(duration)
      ? duration.enter
      : duration
  );

  if ( true && explicitEnterDuration != null) {
    checkDuration(explicitEnterDuration, 'enter', vnode);
  }

  var expectsCSS = css !== false && !isIE9;
  var userWantsControl = getHookArgumentsLength(enterHook);

  var cb = el._enterCb = once(function () {
    if (expectsCSS) {
      removeTransitionClass(el, toClass);
      removeTransitionClass(el, activeClass);
    }
    if (cb.cancelled) {
      if (expectsCSS) {
        removeTransitionClass(el, startClass);
      }
      enterCancelledHook && enterCancelledHook(el);
    } else {
      afterEnterHook && afterEnterHook(el);
    }
    el._enterCb = null;
  });

  if (!vnode.data.show) {
    // remove pending leave element on enter by injecting an insert hook
    mergeVNodeHook(vnode, 'insert', function () {
      var parent = el.parentNode;
      var pendingNode = parent && parent._pending && parent._pending[vnode.key];
      if (pendingNode &&
        pendingNode.tag === vnode.tag &&
        pendingNode.elm._leaveCb
      ) {
        pendingNode.elm._leaveCb();
      }
      enterHook && enterHook(el, cb);
    });
  }

  // start enter transition
  beforeEnterHook && beforeEnterHook(el);
  if (expectsCSS) {
    addTransitionClass(el, startClass);
    addTransitionClass(el, activeClass);
    nextFrame(function () {
      removeTransitionClass(el, startClass);
      if (!cb.cancelled) {
        addTransitionClass(el, toClass);
        if (!userWantsControl) {
          if (isValidDuration(explicitEnterDuration)) {
            setTimeout(cb, explicitEnterDuration);
          } else {
            whenTransitionEnds(el, type, cb);
          }
        }
      }
    });
  }

  if (vnode.data.show) {
    toggleDisplay && toggleDisplay();
    enterHook && enterHook(el, cb);
  }

  if (!expectsCSS && !userWantsControl) {
    cb();
  }
}

function leave (vnode, rm) {
  var el = vnode.elm;

  // call enter callback now
  if (isDef(el._enterCb)) {
    el._enterCb.cancelled = true;
    el._enterCb();
  }

  var data = resolveTransition(vnode.data.transition);
  if (isUndef(data) || el.nodeType !== 1) {
    return rm()
  }

  /* istanbul ignore if */
  if (isDef(el._leaveCb)) {
    return
  }

  var css = data.css;
  var type = data.type;
  var leaveClass = data.leaveClass;
  var leaveToClass = data.leaveToClass;
  var leaveActiveClass = data.leaveActiveClass;
  var beforeLeave = data.beforeLeave;
  var leave = data.leave;
  var afterLeave = data.afterLeave;
  var leaveCancelled = data.leaveCancelled;
  var delayLeave = data.delayLeave;
  var duration = data.duration;

  var expectsCSS = css !== false && !isIE9;
  var userWantsControl = getHookArgumentsLength(leave);

  var explicitLeaveDuration = toNumber(
    isObject(duration)
      ? duration.leave
      : duration
  );

  if ( true && isDef(explicitLeaveDuration)) {
    checkDuration(explicitLeaveDuration, 'leave', vnode);
  }

  var cb = el._leaveCb = once(function () {
    if (el.parentNode && el.parentNode._pending) {
      el.parentNode._pending[vnode.key] = null;
    }
    if (expectsCSS) {
      removeTransitionClass(el, leaveToClass);
      removeTransitionClass(el, leaveActiveClass);
    }
    if (cb.cancelled) {
      if (expectsCSS) {
        removeTransitionClass(el, leaveClass);
      }
      leaveCancelled && leaveCancelled(el);
    } else {
      rm();
      afterLeave && afterLeave(el);
    }
    el._leaveCb = null;
  });

  if (delayLeave) {
    delayLeave(performLeave);
  } else {
    performLeave();
  }

  function performLeave () {
    // the delayed leave may have already been cancelled
    if (cb.cancelled) {
      return
    }
    // record leaving element
    if (!vnode.data.show && el.parentNode) {
      (el.parentNode._pending || (el.parentNode._pending = {}))[(vnode.key)] = vnode;
    }
    beforeLeave && beforeLeave(el);
    if (expectsCSS) {
      addTransitionClass(el, leaveClass);
      addTransitionClass(el, leaveActiveClass);
      nextFrame(function () {
        removeTransitionClass(el, leaveClass);
        if (!cb.cancelled) {
          addTransitionClass(el, leaveToClass);
          if (!userWantsControl) {
            if (isValidDuration(explicitLeaveDuration)) {
              setTimeout(cb, explicitLeaveDuration);
            } else {
              whenTransitionEnds(el, type, cb);
            }
          }
        }
      });
    }
    leave && leave(el, cb);
    if (!expectsCSS && !userWantsControl) {
      cb();
    }
  }
}

// only used in dev mode
function checkDuration (val, name, vnode) {
  if (typeof val !== 'number') {
    warn(
      "<transition> explicit " + name + " duration is not a valid number - " +
      "got " + (JSON.stringify(val)) + ".",
      vnode.context
    );
  } else if (isNaN(val)) {
    warn(
      "<transition> explicit " + name + " duration is NaN - " +
      'the duration expression might be incorrect.',
      vnode.context
    );
  }
}

function isValidDuration (val) {
  return typeof val === 'number' && !isNaN(val)
}

/**
 * Normalize a transition hook's argument length. The hook may be:
 * - a merged hook (invoker) with the original in .fns
 * - a wrapped component method (check ._length)
 * - a plain function (.length)
 */
function getHookArgumentsLength (fn) {
  if (isUndef(fn)) {
    return false
  }
  var invokerFns = fn.fns;
  if (isDef(invokerFns)) {
    // invoker
    return getHookArgumentsLength(
      Array.isArray(invokerFns)
        ? invokerFns[0]
        : invokerFns
    )
  } else {
    return (fn._length || fn.length) > 1
  }
}

function _enter (_, vnode) {
  if (vnode.data.show !== true) {
    enter(vnode);
  }
}

var transition = inBrowser ? {
  create: _enter,
  activate: _enter,
  remove: function remove$$1 (vnode, rm) {
    /* istanbul ignore else */
    if (vnode.data.show !== true) {
      leave(vnode, rm);
    } else {
      rm();
    }
  }
} : {};

var platformModules = [
  attrs,
  klass,
  events,
  domProps,
  style,
  transition
];

/*  */

// the directive module should be applied last, after all
// built-in modules have been applied.
var modules = platformModules.concat(baseModules);

var patch = createPatchFunction({ nodeOps: nodeOps, modules: modules });

/**
 * Not type checking this file because flow doesn't like attaching
 * properties to Elements.
 */

/* istanbul ignore if */
if (isIE9) {
  // http://www.matts411.com/post/internet-explorer-9-oninput/
  document.addEventListener('selectionchange', function () {
    var el = document.activeElement;
    if (el && el.vmodel) {
      trigger(el, 'input');
    }
  });
}

var directive = {
  inserted: function inserted (el, binding, vnode, oldVnode) {
    if (vnode.tag === 'select') {
      // #6903
      if (oldVnode.elm && !oldVnode.elm._vOptions) {
        mergeVNodeHook(vnode, 'postpatch', function () {
          directive.componentUpdated(el, binding, vnode);
        });
      } else {
        setSelected(el, binding, vnode.context);
      }
      el._vOptions = [].map.call(el.options, getValue);
    } else if (vnode.tag === 'textarea' || isTextInputType(el.type)) {
      el._vModifiers = binding.modifiers;
      if (!binding.modifiers.lazy) {
        el.addEventListener('compositionstart', onCompositionStart);
        el.addEventListener('compositionend', onCompositionEnd);
        // Safari < 10.2 & UIWebView doesn't fire compositionend when
        // switching focus before confirming composition choice
        // this also fixes the issue where some browsers e.g. iOS Chrome
        // fires "change" instead of "input" on autocomplete.
        el.addEventListener('change', onCompositionEnd);
        /* istanbul ignore if */
        if (isIE9) {
          el.vmodel = true;
        }
      }
    }
  },

  componentUpdated: function componentUpdated (el, binding, vnode) {
    if (vnode.tag === 'select') {
      setSelected(el, binding, vnode.context);
      // in case the options rendered by v-for have changed,
      // it's possible that the value is out-of-sync with the rendered options.
      // detect such cases and filter out values that no longer has a matching
      // option in the DOM.
      var prevOptions = el._vOptions;
      var curOptions = el._vOptions = [].map.call(el.options, getValue);
      if (curOptions.some(function (o, i) { return !looseEqual(o, prevOptions[i]); })) {
        // trigger change event if
        // no matching option found for at least one value
        var needReset = el.multiple
          ? binding.value.some(function (v) { return hasNoMatchingOption(v, curOptions); })
          : binding.value !== binding.oldValue && hasNoMatchingOption(binding.value, curOptions);
        if (needReset) {
          trigger(el, 'change');
        }
      }
    }
  }
};

function setSelected (el, binding, vm) {
  actuallySetSelected(el, binding, vm);
  /* istanbul ignore if */
  if (isIE || isEdge) {
    setTimeout(function () {
      actuallySetSelected(el, binding, vm);
    }, 0);
  }
}

function actuallySetSelected (el, binding, vm) {
  var value = binding.value;
  var isMultiple = el.multiple;
  if (isMultiple && !Array.isArray(value)) {
     true && warn(
      "<select multiple v-model=\"" + (binding.expression) + "\"> " +
      "expects an Array value for its binding, but got " + (Object.prototype.toString.call(value).slice(8, -1)),
      vm
    );
    return
  }
  var selected, option;
  for (var i = 0, l = el.options.length; i < l; i++) {
    option = el.options[i];
    if (isMultiple) {
      selected = looseIndexOf(value, getValue(option)) > -1;
      if (option.selected !== selected) {
        option.selected = selected;
      }
    } else {
      if (looseEqual(getValue(option), value)) {
        if (el.selectedIndex !== i) {
          el.selectedIndex = i;
        }
        return
      }
    }
  }
  if (!isMultiple) {
    el.selectedIndex = -1;
  }
}

function hasNoMatchingOption (value, options) {
  return options.every(function (o) { return !looseEqual(o, value); })
}

function getValue (option) {
  return '_value' in option
    ? option._value
    : option.value
}

function onCompositionStart (e) {
  e.target.composing = true;
}

function onCompositionEnd (e) {
  // prevent triggering an input event for no reason
  if (!e.target.composing) { return }
  e.target.composing = false;
  trigger(e.target, 'input');
}

function trigger (el, type) {
  var e = document.createEvent('HTMLEvents');
  e.initEvent(type, true, true);
  el.dispatchEvent(e);
}

/*  */

// recursively search for possible transition defined inside the component root
function locateNode (vnode) {
  return vnode.componentInstance && (!vnode.data || !vnode.data.transition)
    ? locateNode(vnode.componentInstance._vnode)
    : vnode
}

var show = {
  bind: function bind (el, ref, vnode) {
    var value = ref.value;

    vnode = locateNode(vnode);
    var transition$$1 = vnode.data && vnode.data.transition;
    var originalDisplay = el.__vOriginalDisplay =
      el.style.display === 'none' ? '' : el.style.display;
    if (value && transition$$1) {
      vnode.data.show = true;
      enter(vnode, function () {
        el.style.display = originalDisplay;
      });
    } else {
      el.style.display = value ? originalDisplay : 'none';
    }
  },

  update: function update (el, ref, vnode) {
    var value = ref.value;
    var oldValue = ref.oldValue;

    /* istanbul ignore if */
    if (!value === !oldValue) { return }
    vnode = locateNode(vnode);
    var transition$$1 = vnode.data && vnode.data.transition;
    if (transition$$1) {
      vnode.data.show = true;
      if (value) {
        enter(vnode, function () {
          el.style.display = el.__vOriginalDisplay;
        });
      } else {
        leave(vnode, function () {
          el.style.display = 'none';
        });
      }
    } else {
      el.style.display = value ? el.__vOriginalDisplay : 'none';
    }
  },

  unbind: function unbind (
    el,
    binding,
    vnode,
    oldVnode,
    isDestroy
  ) {
    if (!isDestroy) {
      el.style.display = el.__vOriginalDisplay;
    }
  }
};

var platformDirectives = {
  model: directive,
  show: show
};

/*  */

var transitionProps = {
  name: String,
  appear: Boolean,
  css: Boolean,
  mode: String,
  type: String,
  enterClass: String,
  leaveClass: String,
  enterToClass: String,
  leaveToClass: String,
  enterActiveClass: String,
  leaveActiveClass: String,
  appearClass: String,
  appearActiveClass: String,
  appearToClass: String,
  duration: [Number, String, Object]
};

// in case the child is also an abstract component, e.g. <keep-alive>
// we want to recursively retrieve the real component to be rendered
function getRealChild (vnode) {
  var compOptions = vnode && vnode.componentOptions;
  if (compOptions && compOptions.Ctor.options.abstract) {
    return getRealChild(getFirstComponentChild(compOptions.children))
  } else {
    return vnode
  }
}

function extractTransitionData (comp) {
  var data = {};
  var options = comp.$options;
  // props
  for (var key in options.propsData) {
    data[key] = comp[key];
  }
  // events.
  // extract listeners and pass them directly to the transition methods
  var listeners = options._parentListeners;
  for (var key$1 in listeners) {
    data[camelize(key$1)] = listeners[key$1];
  }
  return data
}

function placeholder (h, rawChild) {
  if (/\d-keep-alive$/.test(rawChild.tag)) {
    return h('keep-alive', {
      props: rawChild.componentOptions.propsData
    })
  }
}

function hasParentTransition (vnode) {
  while ((vnode = vnode.parent)) {
    if (vnode.data.transition) {
      return true
    }
  }
}

function isSameChild (child, oldChild) {
  return oldChild.key === child.key && oldChild.tag === child.tag
}

var isNotTextNode = function (c) { return c.tag || isAsyncPlaceholder(c); };

var isVShowDirective = function (d) { return d.name === 'show'; };

var Transition = {
  name: 'transition',
  props: transitionProps,
  abstract: true,

  render: function render (h) {
    var this$1 = this;

    var children = this.$slots.default;
    if (!children) {
      return
    }

    // filter out text nodes (possible whitespaces)
    children = children.filter(isNotTextNode);
    /* istanbul ignore if */
    if (!children.length) {
      return
    }

    // warn multiple elements
    if ( true && children.length > 1) {
      warn(
        '<transition> can only be used on a single element. Use ' +
        '<transition-group> for lists.',
        this.$parent
      );
    }

    var mode = this.mode;

    // warn invalid mode
    if ( true &&
      mode && mode !== 'in-out' && mode !== 'out-in'
    ) {
      warn(
        'invalid <transition> mode: ' + mode,
        this.$parent
      );
    }

    var rawChild = children[0];

    // if this is a component root node and the component's
    // parent container node also has transition, skip.
    if (hasParentTransition(this.$vnode)) {
      return rawChild
    }

    // apply transition data to child
    // use getRealChild() to ignore abstract components e.g. keep-alive
    var child = getRealChild(rawChild);
    /* istanbul ignore if */
    if (!child) {
      return rawChild
    }

    if (this._leaving) {
      return placeholder(h, rawChild)
    }

    // ensure a key that is unique to the vnode type and to this transition
    // component instance. This key will be used to remove pending leaving nodes
    // during entering.
    var id = "__transition-" + (this._uid) + "-";
    child.key = child.key == null
      ? child.isComment
        ? id + 'comment'
        : id + child.tag
      : isPrimitive(child.key)
        ? (String(child.key).indexOf(id) === 0 ? child.key : id + child.key)
        : child.key;

    var data = (child.data || (child.data = {})).transition = extractTransitionData(this);
    var oldRawChild = this._vnode;
    var oldChild = getRealChild(oldRawChild);

    // mark v-show
    // so that the transition module can hand over the control to the directive
    if (child.data.directives && child.data.directives.some(isVShowDirective)) {
      child.data.show = true;
    }

    if (
      oldChild &&
      oldChild.data &&
      !isSameChild(child, oldChild) &&
      !isAsyncPlaceholder(oldChild) &&
      // #6687 component root is a comment node
      !(oldChild.componentInstance && oldChild.componentInstance._vnode.isComment)
    ) {
      // replace old child transition data with fresh one
      // important for dynamic transitions!
      var oldData = oldChild.data.transition = extend({}, data);
      // handle transition mode
      if (mode === 'out-in') {
        // return placeholder node and queue update when leave finishes
        this._leaving = true;
        mergeVNodeHook(oldData, 'afterLeave', function () {
          this$1._leaving = false;
          this$1.$forceUpdate();
        });
        return placeholder(h, rawChild)
      } else if (mode === 'in-out') {
        if (isAsyncPlaceholder(child)) {
          return oldRawChild
        }
        var delayedLeave;
        var performLeave = function () { delayedLeave(); };
        mergeVNodeHook(data, 'afterEnter', performLeave);
        mergeVNodeHook(data, 'enterCancelled', performLeave);
        mergeVNodeHook(oldData, 'delayLeave', function (leave) { delayedLeave = leave; });
      }
    }

    return rawChild
  }
};

/*  */

var props = extend({
  tag: String,
  moveClass: String
}, transitionProps);

delete props.mode;

var TransitionGroup = {
  props: props,

  beforeMount: function beforeMount () {
    var this$1 = this;

    var update = this._update;
    this._update = function (vnode, hydrating) {
      var restoreActiveInstance = setActiveInstance(this$1);
      // force removing pass
      this$1.__patch__(
        this$1._vnode,
        this$1.kept,
        false, // hydrating
        true // removeOnly (!important, avoids unnecessary moves)
      );
      this$1._vnode = this$1.kept;
      restoreActiveInstance();
      update.call(this$1, vnode, hydrating);
    };
  },

  render: function render (h) {
    var tag = this.tag || this.$vnode.data.tag || 'span';
    var map = Object.create(null);
    var prevChildren = this.prevChildren = this.children;
    var rawChildren = this.$slots.default || [];
    var children = this.children = [];
    var transitionData = extractTransitionData(this);

    for (var i = 0; i < rawChildren.length; i++) {
      var c = rawChildren[i];
      if (c.tag) {
        if (c.key != null && String(c.key).indexOf('__vlist') !== 0) {
          children.push(c);
          map[c.key] = c
          ;(c.data || (c.data = {})).transition = transitionData;
        } else if (true) {
          var opts = c.componentOptions;
          var name = opts ? (opts.Ctor.options.name || opts.tag || '') : c.tag;
          warn(("<transition-group> children must be keyed: <" + name + ">"));
        }
      }
    }

    if (prevChildren) {
      var kept = [];
      var removed = [];
      for (var i$1 = 0; i$1 < prevChildren.length; i$1++) {
        var c$1 = prevChildren[i$1];
        c$1.data.transition = transitionData;
        c$1.data.pos = c$1.elm.getBoundingClientRect();
        if (map[c$1.key]) {
          kept.push(c$1);
        } else {
          removed.push(c$1);
        }
      }
      this.kept = h(tag, null, kept);
      this.removed = removed;
    }

    return h(tag, null, children)
  },

  updated: function updated () {
    var children = this.prevChildren;
    var moveClass = this.moveClass || ((this.name || 'v') + '-move');
    if (!children.length || !this.hasMove(children[0].elm, moveClass)) {
      return
    }

    // we divide the work into three loops to avoid mixing DOM reads and writes
    // in each iteration - which helps prevent layout thrashing.
    children.forEach(callPendingCbs);
    children.forEach(recordPosition);
    children.forEach(applyTranslation);

    // force reflow to put everything in position
    // assign to this to avoid being removed in tree-shaking
    // $flow-disable-line
    this._reflow = document.body.offsetHeight;

    children.forEach(function (c) {
      if (c.data.moved) {
        var el = c.elm;
        var s = el.style;
        addTransitionClass(el, moveClass);
        s.transform = s.WebkitTransform = s.transitionDuration = '';
        el.addEventListener(transitionEndEvent, el._moveCb = function cb (e) {
          if (e && e.target !== el) {
            return
          }
          if (!e || /transform$/.test(e.propertyName)) {
            el.removeEventListener(transitionEndEvent, cb);
            el._moveCb = null;
            removeTransitionClass(el, moveClass);
          }
        });
      }
    });
  },

  methods: {
    hasMove: function hasMove (el, moveClass) {
      /* istanbul ignore if */
      if (!hasTransition) {
        return false
      }
      /* istanbul ignore if */
      if (this._hasMove) {
        return this._hasMove
      }
      // Detect whether an element with the move class applied has
      // CSS transitions. Since the element may be inside an entering
      // transition at this very moment, we make a clone of it and remove
      // all other transition classes applied to ensure only the move class
      // is applied.
      var clone = el.cloneNode();
      if (el._transitionClasses) {
        el._transitionClasses.forEach(function (cls) { removeClass(clone, cls); });
      }
      addClass(clone, moveClass);
      clone.style.display = 'none';
      this.$el.appendChild(clone);
      var info = getTransitionInfo(clone);
      this.$el.removeChild(clone);
      return (this._hasMove = info.hasTransform)
    }
  }
};

function callPendingCbs (c) {
  /* istanbul ignore if */
  if (c.elm._moveCb) {
    c.elm._moveCb();
  }
  /* istanbul ignore if */
  if (c.elm._enterCb) {
    c.elm._enterCb();
  }
}

function recordPosition (c) {
  c.data.newPos = c.elm.getBoundingClientRect();
}

function applyTranslation (c) {
  var oldPos = c.data.pos;
  var newPos = c.data.newPos;
  var dx = oldPos.left - newPos.left;
  var dy = oldPos.top - newPos.top;
  if (dx || dy) {
    c.data.moved = true;
    var s = c.elm.style;
    s.transform = s.WebkitTransform = "translate(" + dx + "px," + dy + "px)";
    s.transitionDuration = '0s';
  }
}

var platformComponents = {
  Transition: Transition,
  TransitionGroup: TransitionGroup
};

/*  */

// install platform specific utils
Vue.config.mustUseProp = mustUseProp;
Vue.config.isReservedTag = isReservedTag;
Vue.config.isReservedAttr = isReservedAttr;
Vue.config.getTagNamespace = getTagNamespace;
Vue.config.isUnknownElement = isUnknownElement;

// install platform runtime directives & components
extend(Vue.options.directives, platformDirectives);
extend(Vue.options.components, platformComponents);

// install platform patch function
Vue.prototype.__patch__ = inBrowser ? patch : noop;

// public mount method
Vue.prototype.$mount = function (
  el,
  hydrating
) {
  el = el && inBrowser ? query(el) : undefined;
  return mountComponent(this, el, hydrating)
};

// devtools global hook
/* istanbul ignore next */
if (inBrowser) {
  setTimeout(function () {
    if (config.devtools) {
      if (devtools) {
        devtools.emit('init', Vue);
      } else if (
        true
      ) {
        console[console.info ? 'info' : 'log'](
          'Download the Vue Devtools extension for a better development experience:\n' +
          'https://github.com/vuejs/vue-devtools'
        );
      }
    }
    if ( true &&
      config.productionTip !== false &&
      typeof console !== 'undefined'
    ) {
      console[console.info ? 'info' : 'log'](
        "You are running Vue in development mode.\n" +
        "Make sure to turn on production mode when deploying for production.\n" +
        "See more tips at https://vuejs.org/guide/deployment.html"
      );
    }
  }, 0);
}

/*  */

/* harmony default export */ __webpack_exports__["default"] = (Vue);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/global.js */ "../../../../build/node_modules/webpack/buildin/global.js"), __webpack_require__(/*! ./../../timers-browserify/main.js */ "../../../../build/node_modules/timers-browserify/main.js").setImmediate))

/***/ }),

/***/ "../../../../build/node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./backend/css/eventgallery.css":
/*!**************************************!*\
  !*** ./backend/css/eventgallery.css ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./backend/js/Albumselector.js":
/*!*************************************!*\
  !*** ./backend/js/Albumselector.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/json/stringify */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/json/stringify.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/classCallCheck */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/createClass */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/possibleConstructorReturn */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/getPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/inherits */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/inherits.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_wrapNativeSuper__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/wrapNativeSuper */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/wrapNativeSuper.js");
/* harmony import */ var list_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! list.js */ "../../../../build/node_modules/list.js/src/index.js");
/* harmony import */ var list_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(list_js__WEBPACK_IMPORTED_MODULE_7__);







var template = document.createElement('template');
template.innerHTML = "\n  <style>\n    .list {\n      font-family:sans-serif;\n      margin:0;\n      padding:20px 0 0;\n    }\n    \n    table {\n    width: 100%;\n    }\n    \n    tr:nth-child(even) {background: #EEE}\n    tr:nth-child(odd) {}\n    \n    img {\n      max-width: 100%;\n    }\n    input {\n      border:solid 1px #ccc;\n      border-radius: 5px;\n      padding:7px 14px;\n      margin-bottom:10px\n    }\n    input:focus {\n      outline:none;\n      border-color:#aaa;\n    }\n    .sort {\n      padding:8px 30px;\n      border-radius: 6px;\n      border:none;\n      display:inline-block;\n      color:#fff;\n      text-decoration: none;\n      background-color: #28a8e0;\n    }\n    .sort:hover {\n      text-decoration: none;\n      background-color:#1b8aba;\n    }\n    .sort:focus {\n      outline:none;\n    }\n    .sort:after {\n      width: 0;\n      height: 0;\n      border-left: 5px solid transparent;\n      border-right: 5px solid transparent;\n      border-bottom: 5px solid transparent;\n      content:\"\";\n      position: relative;\n      top:-10px;\n      right:-5px;\n    }\n    .sort.asc:after {\n      width: 0;\n      height: 0;\n      border-left: 5px solid transparent;\n      border-right: 5px solid transparent;\n      border-top: 5px solid #fff;\n      content:\"\";\n      position: relative;\n      top:13px;\n      right:-5px;\n    }\n    .sort.desc:after {\n      width: 0;\n      height: 0;\n      border-left: 5px solid transparent;\n      border-right: 5px solid transparent;\n      border-bottom: 5px solid #fff;\n      content:\"\";\n      position: relative;\n      top:-10px;\n      right:-5px;\n    }\n  </style>\n \n    <div id=\"albumlist\">\n    \n      <input class=\"search\" />\n      <span class=\"sort\" data-sort=\"title\">Sort by title</span>\n      <span class=\"sort\" data-sort=\"mediaItemsCount\">Sort by count</span>\n    \n      <table class=\"list\">\n      </table>\n      \n    </div>\n\n    <div id=\"loading\" class=\"well\">\n        <p id=\"loading_label\"></p>\n    </div>\n  \n";


var Albumselector =
/*#__PURE__*/
function (_HTMLElement) {
  Object(_babel_runtime_corejs2_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_5__["default"])(Albumselector, _HTMLElement);

  function Albumselector() {
    var _this;

    Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_1__["default"])(this, Albumselector);

    _this = Object(_babel_runtime_corejs2_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__["default"])(this, Object(_babel_runtime_corejs2_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__["default"])(Albumselector).call(this));
    _this._shadowRoot = _this.attachShadow({
      mode: 'open'
    });

    _this._shadowRoot.appendChild(template.content.cloneNode(true));

    _this.$loadingLabel = _this._shadowRoot.querySelector('#loading_label');
    _this.$loading = _this._shadowRoot.querySelector('#loading');
    _this.$albumlist = _this._shadowRoot.querySelector('#albumlist');
    _this['accountid'] = 1; //the url for the iframe can't be changed dynamically, so we need to grab this from the parent.

    var element = parent.document.getElementById('foldertype_4_account');

    if (element) {
      _this['accountid'] = element.value;
    }

    return _this;
  }

  Object(_babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_2__["default"])(Albumselector, [{
    key: "getData",
    value: function getData() {
      var _this2 = this;

      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          var data = JSON.parse(xhr.response);

          _this2.createTable(data.albums);
        }
      };

      xhr.open('GET', this.url + '&id=' + this.accountid, true);
      xhr.send('');
    }
  }, {
    key: "createTable",
    value: function createTable(albums) {
      var _this3 = this;

      var options = {
        page: 5000,
        valueNames: [{
          name: 'previewThumbnail',
          attr: 'src'
        }, {
          name: 'encodedTitle',
          attr: 'data-title'
        }, {
          name: 'albumid',
          attr: 'data-albumid'
        }, 'title', 'mediaItemsCount', {
          name: 'link',
          attr: 'href'
        }],
        item: '<tr>' + '<td><button class="encodedTitle albumid" data-title="" data-albumid="">Select</button></td>' + '<td><img class="previewThumbnail" src=""></td>' + '<td><span class="title"></span></td>' + '<td><span class="mediaItemsCount"></span></td>' + '<td><a class="link" href="" target="_blank">Link</a></td>' + '</tr>'
      };
      var values = [];

      for (var i = 0; i < albums.length; i++) {
        var album = albums[i];
        values.push({
          previewThumbnail: album.coverPhotoBaseUrl + '=w200-h200',
          encodedTitle: encodeURI(album.title),
          title: album.title,
          mediaItemsCount: album.mediaItemsCount,
          albumid: album.id,
          link: album.productUrl
        });
      }

      var myList = new list_js__WEBPACK_IMPORTED_MODULE_7___default.a(this.$albumlist, options);
      myList.add(values, function () {
        var buttons = _this3._shadowRoot.querySelectorAll('button.albumid');

        var _loop = function _loop(_i) {
          var button = buttons[_i];
          button.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var data = {
              albumid: button.getAttribute("data-albumid"),
              title: decodeURI(button.getAttribute("data-title"))
            };
            parent.postMessage('eventgalleryGooglePhotosAlbum_' + _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0___default()(data), '*');
          });
        };

        for (var _i = 0; _i < buttons.length; _i++) {
          _loop(_i);
        }
      });
      this.$loading.style.display = 'none';
    }
  }, {
    key: "attributeChangedCallback",
    value: function attributeChangedCallback(name, oldVal, newVal) {
      this[name] = newVal;
    }
  }, {
    key: "connectedCallback",
    value: function connectedCallback() {
      this.$loadingLabel.innerHTML = this.label;
      this.getData();
    }
  }], [{
    key: "observedAttributes",
    get: function get() {
      return ['label', 'url'];
    }
  }]);

  return Albumselector;
}(Object(_babel_runtime_corejs2_helpers_esm_wrapNativeSuper__WEBPACK_IMPORTED_MODULE_6__["default"])(HTMLElement));

window.customElements.define('album-selector', Albumselector);

/***/ }),

/***/ "./backend/js/EventgalleryBehavior.js":
/*!********************************************!*\
  !*** ./backend/js/EventgalleryBehavior.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function (Eventgallery) {
  document.addEventListener('DOMContentLoaded', function () {
    var googlePhotosProcessor = new Eventgallery.GooglePhotosProcessor();
    googlePhotosProcessor.processImages();
  });
})(Eventgallery);

/***/ }),

/***/ "./backend/js/EventgalleryGooglePhotos.js":
/*!************************************************!*\
  !*** ./backend/js/EventgalleryGooglePhotos.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  "use strict";
  /**
   * process selector input
   */

  window.addEventListener('message', function (e) {
    if (!e.data) return;
    var dataStr = e.data;

    if (typeof dataStr !== 'string') {
      return;
    }

    if (dataStr.startsWith('eventgalleryGooglePhotosAlbum_')) {
      var data = JSON.parse(dataStr.replace('eventgalleryGooglePhotosAlbum_', ''));
      var albumField = document.getElementById('foldertype-4-album');
      albumField.value = data.albumid;
      var titleField = document.getElementById('foldertype-4-title');
      titleField.value = data.title;
      albumField.onchange();
      document.querySelector('#google-photos-album-selector-modal .modal-header button.close').click();
    }
  });
  document.addEventListener('DOMContentLoaded', function () {
    var button = document.querySelector('.google-photos-api-oauth-trigger-button');

    if (button) {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        var id = e.target.getAttribute('data-id');
        var oauthWindow = window.open("index.php?option=com_eventgallery&view=googlephotos&layout=getauthtoken&tmpl=component&id=" + id, "_blank", "width=700,height=400");

        if (!oauthWindow || oauthWindow.closed || typeof oauthWindow.closed === 'undefined') {
          alert('Failed');
        }
      });
    }
  });
})();

/***/ }),

/***/ "./backend/js/EventgalleryInlineFormEdit.js":
/*!**************************************************!*\
  !*** ./backend/js/EventgalleryInlineFormEdit.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_js_Helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/js/Helpers */ "./common/js/Helpers.js");


(function () {
  "use strict";

  var fireDomLoadEvent = function fireDomLoadEvent() {
    window.document.dispatchEvent(new Event("eventgallery.localizableContentLoaded", {
      bubbles: true,
      cancelable: true
    }));
  };

  document.addEventListener('DOMContentLoaded', function () {
    assignClickEvents();
  });

  var assignClickEvents = function assignClickEvents() {
    assignClickEvent('.openInlineForm', openInlineForm);
    assignClickEvent('.saveInlineForm', saveInlineForm);
    assignClickEvent('.closeInlineForm', closeInlineForm);
  };

  var assignClickEvent = function assignClickEvent(querySelector, callback) {
    var elements = document.querySelectorAll(querySelector);

    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.removeEventListener('click', callback);
      element.addEventListener('click', callback);
    }
  };

  var openInlineForm = function openInlineForm(e) {
    e.preventDefault();
    var currentContainer = e.target.closest('div[data-id]');
    currentContainer.innerHTML = 'Loading...';
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        currentContainer.innerHTML = this.responseText;
        fireDomLoadEvent();
        assignClickEvents();
      }
    };

    xhttp.open("GET", currentContainer.getAttribute('data-editlink'), true);
    xhttp.send();
  };

  var saveInlineForm = function saveInlineForm(e) {
    e.preventDefault();
    var id = e.target.getAttribute('data-id');
    var form = e.target.closest('div[data-action]');
    var currentContainer = document.querySelector('div[data-id="' + id + '"]');
    var url = form.getAttribute('data-action');
    form.querySelector('input[name="task"]').value = e.target.getAttribute('data-task');
    currentContainer.innerHTML = 'Loading.. ';
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        currentContainer.innerHTML = this.responseText;
        fireDomLoadEvent();
        assignClickEvents();
      }
    };

    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(Object(_common_js_Helpers__WEBPACK_IMPORTED_MODULE_0__["serializeForm"])(form));
  };

  var closeInlineForm = function closeInlineForm(e) {
    e.preventDefault();
    var id = e.target.getAttribute('data-id');
    var currentContainer = document.querySelector('div[data-id="' + id + '"]');
    var url = e.target.getAttribute('data-href');
    currentContainer.innerHTML = 'Loading.. ';
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        currentContainer.innerHTML = this.responseText;
        assignClickEvents();
      }
    };

    xhttp.open("GET", url, true);
    xhttp.send();
  };
})();

/***/ }),

/***/ "./backend/js/LocalizableText.js":
/*!***************************************!*\
  !*** ./backend/js/LocalizableText.js ***!
  \***************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/json/stringify */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/json/stringify.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0__);


(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function (event) {
    window.document.dispatchEvent(new Event("eventgallery.localizableContentLoaded", {
      bubbles: true,
      cancelable: true
    }));
  }, {
    once: true
  });
  /**
   * the event eventgallery.localizableContentLoaded is fired and the editor will start
   * initializing.
   */

  document.addEventListener("eventgallery.localizableContentLoaded", function (event) {
    var elements = document.querySelectorAll('input[data-localizabletext]');

    var _loop = function _loop(i) {
      var element = elements[i];

      if (element.getAttribute('data-localizedtext-enabled')) {
        return "continue";
      }

      element.setAttribute('data-localizedtext-enabled', true);
      var container = element.closest(".localizabletext");
      var inputFields = container.getElementsByClassName('lc_' + element.id);

      for (var _i = 0; _i < inputFields.length; _i++) {
        inputFields[_i].addEventListener('blur', function () {
          return collectData(element);
        });
      }
    };

    for (var i = 0; i < elements.length; i++) {
      var _ret = _loop(i);

      if (_ret === "continue") continue;
    }
  });

  var collectData = function collectData(element) {
    var data = {};
    var container = element.closest(".localizabletext");
    var inputFields = container.getElementsByClassName('lc_' + element.id);

    for (var i = 0; i < inputFields.length; i++) {
      var field = inputFields[i];
      var value = field.value;
      var languageTag = field.getAttribute("data-tag");

      if (value.trim().length > 0) {
        data[languageTag] = value;
      }
    }

    var jsonData = _babel_runtime_corejs2_core_js_json_stringify__WEBPACK_IMPORTED_MODULE_0___default()(data);

    if (jsonData.length < 3) {
      jsonData = "";
    }

    element.value = jsonData;
  };
})();

/***/ }),

/***/ "./backend/vue/cacheclear/Cacheclear.vue":
/*!***********************************************!*\
  !*** ./backend/vue/cacheclear/Cacheclear.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true& */ "./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true&");
/* harmony import */ var _Cacheclear_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Cacheclear.vue?vue&type=script&lang=js& */ "./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Cacheclear_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "50807fe6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/cacheclear/Cacheclear.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Cacheclear_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Cacheclear.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Cacheclear.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Cacheclear_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true&":
/*!******************************************************************************************!*\
  !*** ./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Cacheclear.vue?vue&type=template&id=50807fe6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Cacheclear_vue_vue_type_template_id_50807fe6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/cacheclear/Elements.vue":
/*!*********************************************!*\
  !*** ./backend/vue/cacheclear/Elements.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Elements.vue?vue&type=template&id=5d3d150e&scoped=true& */ "./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true&");
/* harmony import */ var _Elements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Elements.vue?vue&type=script&lang=js& */ "./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true& */ "./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Elements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5d3d150e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/cacheclear/Elements.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Elements.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true&":
/*!*******************************************************************************************************!*\
  !*** ./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true& ***!
  \*******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--3-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/less-loader/dist/cjs.js??ref--3-2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=style&index=0&id=5d3d150e&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_style_index_0_id_5d3d150e_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true&":
/*!****************************************************************************************!*\
  !*** ./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Elements.vue?vue&type=template&id=5d3d150e&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Elements.vue?vue&type=template&id=5d3d150e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Elements_vue_vue_type_template_id_5d3d150e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/cacheclear/Groups.vue":
/*!*******************************************!*\
  !*** ./backend/vue/cacheclear/Groups.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Groups.vue?vue&type=template&id=ef71ab54&scoped=true& */ "./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true&");
/* harmony import */ var _Groups_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Groups.vue?vue&type=script&lang=js& */ "./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true& */ "./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Groups_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "ef71ab54",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/cacheclear/Groups.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Groups.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true& ***!
  \*****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--3-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/less-loader/dist/cjs.js??ref--3-2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=style&index=0&id=ef71ab54&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_style_index_0_id_ef71ab54_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true&":
/*!**************************************************************************************!*\
  !*** ./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Groups.vue?vue&type=template&id=ef71ab54&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/cacheclear/Groups.vue?vue&type=template&id=ef71ab54&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Groups_vue_vue_type_template_id_ef71ab54_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/cacheclear/index.js":
/*!*****************************************!*\
  !*** ./backend/vue/cacheclear/index.js ***!
  \*****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _Cacheclear_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Cacheclear.vue */ "./backend/vue/cacheclear/Cacheclear.vue");
/* harmony import */ var _common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../common/vue/helper/LocalizationMapper */ "./common/vue/helper/LocalizationMapper.js");



document.addEventListener('DOMContentLoaded', function () {
  var rootId = 'cacheclear';

  if (document.getElementById(rootId)) {
    new vue__WEBPACK_IMPORTED_MODULE_0__["default"]({
      el: '#' + rootId,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_Cacheclear_vue__WEBPACK_IMPORTED_MODULE_1__["default"], {
          props: {
            cacheClearUrl: this.$el.getAttribute('data-cache-clear-url'),
            elementsJson: decodeURI(this.$el.getAttribute('data-elements-json')),
            groupsJson: decodeURI(this.$el.getAttribute('data-groups-json')),
            csrfToken: this.$el.getAttribute('data-csrf-token'),
            i18n: Object(_common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_2__["mapLocalizationData"])(this.$el)
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./backend/vue/components/ErrorPanel.vue":
/*!***********************************************!*\
  !*** ./backend/vue/components/ErrorPanel.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true& */ "./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true&");
/* harmony import */ var _ErrorPanel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ErrorPanel.vue?vue&type=script&lang=js& */ "./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less& */ "./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ErrorPanel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "462fe1f3",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/components/ErrorPanel.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ErrorPanel.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less&":
/*!*********************************************************************************************************!*\
  !*** ./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less& ***!
  \*********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--3-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/less-loader/dist/cjs.js??ref--3-2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=style&index=0&id=462fe1f3&scoped=true&lang=less&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_style_index_0_id_462fe1f3_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true&":
/*!******************************************************************************************!*\
  !*** ./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ErrorPanel.vue?vue&type=template&id=462fe1f3&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorPanel_vue_vue_type_template_id_462fe1f3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/components/Folder.vue":
/*!*******************************************!*\
  !*** ./backend/vue/components/Folder.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Folder.vue?vue&type=template&id=1ec29ff6&scoped=true& */ "./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true&");
/* harmony import */ var _Folder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Folder.vue?vue&type=script&lang=js& */ "./backend/vue/components/Folder.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css& */ "./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Folder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1ec29ff6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/components/Folder.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/components/Folder.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./backend/vue/components/Folder.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folder.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css&":
/*!****************************************************************************************************!*\
  !*** ./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css& ***!
  \****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=style&index=0&id=1ec29ff6&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_style_index_0_id_1ec29ff6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true&":
/*!**************************************************************************************!*\
  !*** ./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folder.vue?vue&type=template&id=1ec29ff6&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folder.vue?vue&type=template&id=1ec29ff6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folder_vue_vue_type_template_id_1ec29ff6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/components/Folders.vue":
/*!********************************************!*\
  !*** ./backend/vue/components/Folders.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Folders.vue?vue&type=template&id=26e2f1be&scoped=true& */ "./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true&");
/* harmony import */ var _Folders_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Folders.vue?vue&type=script&lang=js& */ "./backend/vue/components/Folders.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true& */ "./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Folders_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "26e2f1be",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/components/Folders.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/components/Folders.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./backend/vue/components/Folders.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folders.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true& ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--3-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/less-loader/dist/cjs.js??ref--3-2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=style&index=0&id=26e2f1be&lang=less&scoped=true&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_style_index_0_id_26e2f1be_lang_less_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true&":
/*!***************************************************************************************!*\
  !*** ./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Folders.vue?vue&type=template&id=26e2f1be&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Folders.vue?vue&type=template&id=26e2f1be&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Folders_vue_vue_type_template_id_26e2f1be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/components/ProcessSteps.vue":
/*!*************************************************!*\
  !*** ./backend/vue/components/ProcessSteps.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true& */ "./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true&");
/* harmony import */ var _ProcessSteps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProcessSteps.vue?vue&type=script&lang=js& */ "./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css& */ "./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ProcessSteps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "269a1562",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/components/ProcessSteps.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ProcessSteps.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css&":
/*!**********************************************************************************************************!*\
  !*** ./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css& ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=style&index=0&id=269a1562&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_style_index_0_id_269a1562_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/ProcessSteps.vue?vue&type=template&id=269a1562&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ProcessSteps_vue_vue_type_template_id_269a1562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/components/Progress.vue":
/*!*********************************************!*\
  !*** ./backend/vue/components/Progress.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Progress.vue?vue&type=template&id=15a54af8&scoped=true& */ "./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true&");
/* harmony import */ var _Progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Progress.vue?vue&type=script&lang=js& */ "./backend/vue/components/Progress.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css& */ "./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "15a54af8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/components/Progress.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/components/Progress.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./backend/vue/components/Progress.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Progress.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css&":
/*!******************************************************************************************************!*\
  !*** ./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css& ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=style&index=0&id=15a54af8&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_style_index_0_id_15a54af8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true&":
/*!****************************************************************************************!*\
  !*** ./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Progress.vue?vue&type=template&id=15a54af8&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/components/Progress.vue?vue&type=template&id=15a54af8&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Progress_vue_vue_type_template_id_15a54af8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/filesync/Filesync.vue":
/*!*******************************************!*\
  !*** ./backend/vue/filesync/Filesync.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Filesync.vue?vue&type=template&id=c4440ce6&scoped=true& */ "./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true&");
/* harmony import */ var _Filesync_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Filesync.vue?vue&type=script&lang=js& */ "./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Filesync_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "c4440ce6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/filesync/Filesync.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Filesync_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Filesync.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/filesync/Filesync.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Filesync_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true&":
/*!**************************************************************************************!*\
  !*** ./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Filesync.vue?vue&type=template&id=c4440ce6&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/filesync/Filesync.vue?vue&type=template&id=c4440ce6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Filesync_vue_vue_type_template_id_c4440ce6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/filesync/index.js":
/*!***************************************!*\
  !*** ./backend/vue/filesync/index.js ***!
  \***************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/parse-int */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-int.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _Filesync_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Filesync.vue */ "./backend/vue/filesync/Filesync.vue");
/* harmony import */ var _common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../common/vue/helper/LocalizationMapper */ "./common/vue/helper/LocalizationMapper.js");




document.addEventListener('DOMContentLoaded', function () {
  var rootId = 'filesync';

  if (document.getElementById(rootId)) {
    new vue__WEBPACK_IMPORTED_MODULE_1__["default"]({
      el: '#' + rootId,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_Filesync_vue__WEBPACK_IMPORTED_MODULE_2__["default"], {
          props: {
            loadFoldersUrl: this.$el.getAttribute('data-load-folders-url'),
            fileSyncUrl: this.$el.getAttribute('data-file-sync-url'),
            folderSyncUrl: this.$el.getAttribute('data-folder-sync-url'),
            csrfToken: this.$el.getAttribute('data-csrf-token'),
            fileBatchSize: _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0___default()(this.$el.getAttribute('data-file-batch-size')),
            maxParallelRequests: 4,
            i18n: Object(_common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_3__["mapLocalizationData"])(this.$el)
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue":
/*!***********************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed& */ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed&");
/* harmony import */ var _ImageContentPluginForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ImageContentPluginForm.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ImageContentPluginForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/ImageContentPluginForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js&":
/*!************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageContentPluginForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ImageContentPluginForm.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageContentPluginForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed&":
/*!******************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue?vue&type=template&id=4c7c98ed&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageContentPluginForm_vue_vue_type_template_id_4c7c98ed___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageSelector.vue":
/*!**************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageSelector.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true& */ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true&");
/* harmony import */ var _ImageSelector_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ImageSelector.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css& */ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ImageSelector_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "f64e921c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/ImageSelector.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ImageSelector.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css&":
/*!***********************************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css& ***!
  \***********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=style&index=0&id=f64e921c&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_style_index_0_id_f64e921c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true&":
/*!*********************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/ImageSelector.vue?vue&type=template&id=f64e921c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSelector_vue_vue_type_template_id_f64e921c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Input.vue":
/*!******************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Input.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Input.vue?vue&type=template&id=622b6062& */ "./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062&");
/* harmony import */ var _Input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Input.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/Input.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Input.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Input.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062&":
/*!*************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Input.vue?vue&type=template&id=622b6062& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Input.vue?vue&type=template&id=622b6062&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_template_id_622b6062___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Label.vue":
/*!******************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Label.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label.vue?vue&type=template&id=4f983ae8&scoped=true& */ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true&");
/* harmony import */ var _Label_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Label.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css& */ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Label_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "4f983ae8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/Label.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Label.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css&":
/*!***************************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css& ***!
  \***************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=style&index=0&id=4f983ae8&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_style_index_0_id_4f983ae8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true&":
/*!*************************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Label.vue?vue&type=template&id=4f983ae8&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Label.vue?vue&type=template&id=4f983ae8&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Label_vue_vue_type_template_id_4f983ae8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Radio.vue":
/*!******************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Radio.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Radio.vue?vue&type=template&id=7acec7da& */ "./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da&");
/* harmony import */ var _Radio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Radio.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Radio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/Radio.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Radio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Radio.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Radio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da&":
/*!*************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Radio.vue?vue&type=template&id=7acec7da& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Radio.vue?vue&type=template&id=7acec7da&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Radio_vue_vue_type_template_id_7acec7da___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Select.vue":
/*!*******************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Select.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Select.vue?vue&type=template&id=30861e94& */ "./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94&");
/* harmony import */ var _Select_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Select.vue?vue&type=script&lang=js& */ "./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Select_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/imagecontentpluginform/Select.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Select_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Select.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Select.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Select_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94&":
/*!**************************************************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Select.vue?vue&type=template&id=30861e94& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/imagecontentpluginform/Select.vue?vue&type=template&id=30861e94&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Select_vue_vue_type_template_id_30861e94___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/imagecontentpluginform/index.js":
/*!*****************************************************!*\
  !*** ./backend/vue/imagecontentpluginform/index.js ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../common/vue/helper/LocalizationMapper */ "./common/vue/helper/LocalizationMapper.js");
/* harmony import */ var _ImageContentPluginForm_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ImageContentPluginForm.vue */ "./backend/vue/imagecontentpluginform/ImageContentPluginForm.vue");



document.addEventListener('DOMContentLoaded', function () {
  var rootId = 'imagecontentpluginform';

  if (document.getElementById(rootId)) {
    new vue__WEBPACK_IMPORTED_MODULE_0__["default"]({
      el: '#' + rootId,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_ImageContentPluginForm_vue__WEBPACK_IMPORTED_MODULE_2__["default"], {
          props: {
            editorName: this.$el.getAttribute('data-editor-name'),
            loadFoldersUrl: this.$el.getAttribute('data-load-folders-url'),
            loadFilesUrl: this.$el.getAttribute('data-load-files-url'),
            formId: this.$el.getAttribute('data-form-id'),
            formDefinitionJson: this.$el.getAttribute('data-form-definition-json'),
            csrfToken: this.$el.getAttribute('data-csrf-token'),
            i18n: Object(_common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_1__["mapLocalizationData"])(this.$el)
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue":
/*!***********************************************************!*\
  !*** ./backend/vue/scalepriceeditor/Scalepriceeditor.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true& */ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true&");
/* harmony import */ var _Scalepriceeditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Scalepriceeditor.vue?vue&type=script&lang=js& */ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css& */ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Scalepriceeditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "eacbcba6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/scalepriceeditor/Scalepriceeditor.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Scalepriceeditor.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css&":
/*!********************************************************************************************************************!*\
  !*** ./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css& ***!
  \********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--4-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=style&index=0&id=eacbcba6&scoped=true&lang=css&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_4_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_style_index_0_id_eacbcba6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/scalepriceeditor/Scalepriceeditor.vue?vue&type=template&id=eacbcba6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Scalepriceeditor_vue_vue_type_template_id_eacbcba6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/scalepriceeditor/index.js":
/*!***********************************************!*\
  !*** ./backend/vue/scalepriceeditor/index.js ***!
  \***********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../common/vue/helper/LocalizationMapper */ "./common/vue/helper/LocalizationMapper.js");
/* harmony import */ var _Scalepriceeditor_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Scalepriceeditor.vue */ "./backend/vue/scalepriceeditor/Scalepriceeditor.vue");



document.addEventListener('DOMContentLoaded', function () {
  var rootSelector = '.scale-price-editor';
  var nodes = document.querySelectorAll(rootSelector);

  for (var i = 0; i < nodes.length; i++) {
    var node = nodes[i];
    new vue__WEBPACK_IMPORTED_MODULE_0__["default"]({
      el: node,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_Scalepriceeditor_vue__WEBPACK_IMPORTED_MODULE_2__["default"], {
          props: {
            inputName: this.$el.getAttribute('name'),
            inputId: this.$el.getAttribute('id'),
            inputValue: this.$el.getAttribute('value'),
            i18n: Object(_common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_1__["mapLocalizationData"])(this.$el)
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue":
/*!***********************************************************!*\
  !*** ./backend/vue/thumbnailcreator/Thumbnailcreator.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true& */ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true&");
/* harmony import */ var _Thumbnailcreator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Thumbnailcreator.vue?vue&type=script&lang=js& */ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Thumbnailcreator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "9fc9a6a6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/thumbnailcreator/Thumbnailcreator.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Thumbnailcreator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Thumbnailcreator.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Thumbnailcreator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/thumbnailcreator/Thumbnailcreator.vue?vue&type=template&id=9fc9a6a6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Thumbnailcreator_vue_vue_type_template_id_9fc9a6a6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/thumbnailcreator/index.js":
/*!***********************************************!*\
  !*** ./backend/vue/thumbnailcreator/index.js ***!
  \***********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/parse-int */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-int.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _Thumbnailcreator_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Thumbnailcreator.vue */ "./backend/vue/thumbnailcreator/Thumbnailcreator.vue");
/* harmony import */ var _common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../common/vue/helper/LocalizationMapper */ "./common/vue/helper/LocalizationMapper.js");




document.addEventListener('DOMContentLoaded', function () {
  var rootId = 'thumbnailcreator';

  if (document.getElementById(rootId)) {
    new vue__WEBPACK_IMPORTED_MODULE_1__["default"]({
      el: '#' + rootId,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_Thumbnailcreator_vue__WEBPACK_IMPORTED_MODULE_2__["default"], {
          props: {
            loadFoldersUrl: this.$el.getAttribute('data-load-folders-url'),
            fileSyncUrl: this.$el.getAttribute('data-file-sync-url'),
            folderSyncUrl: this.$el.getAttribute('data-folder-sync-url'),
            csrfToken: this.$el.getAttribute('data-csrf-token'),
            fileBatchSize: _babel_runtime_corejs2_core_js_parse_int__WEBPACK_IMPORTED_MODULE_0___default()(this.$el.getAttribute('data-file-batch-size')),
            maxParallelRequests: 4,
            i18n: Object(_common_vue_helper_LocalizationMapper__WEBPACK_IMPORTED_MODULE_3__["mapLocalizationData"])(this.$el)
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./backend/vue/uploader/Uploader.vue":
/*!*******************************************!*\
  !*** ./backend/vue/uploader/Uploader.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Uploader.vue?vue&type=template&id=3d2e0926&scoped=true& */ "./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true&");
/* harmony import */ var _Uploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Uploader.vue?vue&type=script&lang=js& */ "./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less& */ "./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less&");
/* harmony import */ var _build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "../../../../build/node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_build_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Uploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "3d2e0926",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "backend/vue/uploader/Uploader.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/babel-loader/lib??ref--2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Uploader.vue?vue&type=script&lang=js& */ "../../../../build/node_modules/babel-loader/lib/index.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_babel_loader_lib_index_js_ref_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less&":
/*!*****************************************************************************************************!*\
  !*** ./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less& ***!
  \*****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../../../../build/node_modules/css-loader/dist/cjs.js??ref--3-1!../../../../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../build/node_modules/less-loader/dist/cjs.js??ref--3-2!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less& */ "../../../../build/node_modules/mini-css-extract-plugin/dist/loader.js!../../../../build/node_modules/css-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../build/node_modules/less-loader/dist/cjs.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=style&index=0&id=3d2e0926&scoped=true&lang=less&");
/* harmony import */ var _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_build_node_modules_mini_css_extract_plugin_dist_loader_js_build_node_modules_css_loader_dist_cjs_js_ref_3_1_build_node_modules_vue_loader_lib_loaders_stylePostLoader_js_build_node_modules_less_loader_dist_cjs_js_ref_3_2_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_style_index_0_id_3d2e0926_scoped_true_lang_less___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true&":
/*!**************************************************************************************!*\
  !*** ./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../build/node_modules/vue-loader/lib??vue-loader-options!./Uploader.vue?vue&type=template&id=3d2e0926&scoped=true& */ "../../../../build/node_modules/vue-loader/lib/loaders/templateLoader.js?!../../../../build/node_modules/vue-loader/lib/index.js?!./backend/vue/uploader/Uploader.vue?vue&type=template&id=3d2e0926&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _build_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_build_node_modules_vue_loader_lib_index_js_vue_loader_options_Uploader_vue_vue_type_template_id_3d2e0926_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./backend/vue/uploader/_Uploader.less":
/*!*********************************************!*\
  !*** ./backend/vue/uploader/_Uploader.less ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./backend/vue/uploader/index.js":
/*!***************************************!*\
  !*** ./backend/vue/uploader/index.js ***!
  \***************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "../../../../build/node_modules/vue/dist/vue.runtime.esm.js");
/* harmony import */ var _Uploader_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Uploader.vue */ "./backend/vue/uploader/Uploader.vue");



__webpack_require__(/*! ./_Uploader.less */ "./backend/vue/uploader/_Uploader.less");

document.addEventListener('DOMContentLoaded', function () {
  var rootId = 'uploader';

  if (document.getElementById(rootId)) {
    new vue__WEBPACK_IMPORTED_MODULE_0__["default"]({
      el: '#' + rootId,
      mounted: function mounted() {
        this.id = this.$el.getAttribute('data-id');
      },
      render: function render(createElement) {
        return createElement(_Uploader_vue__WEBPACK_IMPORTED_MODULE_1__["default"], {
          props: {
            maxFileSize: this.$el.getAttribute('data-max-file-size'),
            uploadUrl: this.$el.getAttribute('data-upload-url'),
            i18n: {
              COM_EVENTGALLERY_EVENT_UPLOAD_FILES_TO_UPLOAD: this.$el.getAttribute('data-i18n-COM_EVENTGALLERY_EVENT_UPLOAD_FILES_TO_UPLOAD'),
              COM_EVENTGALLERY_EVENT_UPLOAD_PENDING: this.$el.getAttribute('data-i18n-COM_EVENTGALLERY_EVENT_UPLOAD_PENDING'),
              COM_EVENTGALLERY_EVENT_UPLOAD_FINISHED: this.$el.getAttribute('data-i18n-COM_EVENTGALLERY_EVENT_UPLOAD_FINISHED')
            }
          }
        });
      }
    });
  }
});

/***/ }),

/***/ "./common/js/BatchCreator.js":
/*!***********************************!*\
  !*** ./common/js/BatchCreator.js ***!
  \***********************************/
/*! exports provided: createBatches */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createBatches", function() { return createBatches; });
function createBatches(items, max_items_per_batch) {
  var batches = [],
      currentBatch = [],
      i;

  for (i = 0; i < items.length; i++) {
    if (currentBatch.length === max_items_per_batch) {
      batches.push(currentBatch);
      currentBatch = [];
    }

    currentBatch.push(items[i]);
  }

  batches.push(currentBatch);
  return batches;
}

/***/ }),

/***/ "./common/js/EventgalleryTools.js":
/*!****************************************!*\
  !*** ./common/js/EventgalleryTools.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Helpers */ "./common/js/Helpers.js");

window.Eventgallery = window.Eventgallery || {};

if (typeof eventgallery !== 'undefined') {
  Eventgallery.jQuery = eventgallery.jQuery;
}

Eventgallery.Tools = {};
Eventgallery.Tools.mergeObjects = _Helpers__WEBPACK_IMPORTED_MODULE_0__["mergeObjects"];
Eventgallery.Tools.calcBorderWidth = _Helpers__WEBPACK_IMPORTED_MODULE_0__["calcBorderWidth"];
Eventgallery.Tools.addUrlHashParameter = _Helpers__WEBPACK_IMPORTED_MODULE_0__["addUrlHashParameter"];
Eventgallery.Tools.getUrlHashParameterValue = _Helpers__WEBPACK_IMPORTED_MODULE_0__["getUrlHashParameterValue"];
Eventgallery.Tools.removeUrlHashParameter = _Helpers__WEBPACK_IMPORTED_MODULE_0__["removeUrlHashParameter"];
Eventgallery.Tools.addUrlParameter = _Helpers__WEBPACK_IMPORTED_MODULE_0__["addUrlParameter"];
Eventgallery.Tools.removeUrlParameter = _Helpers__WEBPACK_IMPORTED_MODULE_0__["removeUrlParameter"];
Eventgallery.Tools.setCSSStyle = _Helpers__WEBPACK_IMPORTED_MODULE_0__["setCSSStyle"];

/***/ }),

/***/ "./common/js/Helpers.js":
/*!******************************!*\
  !*** ./common/js/Helpers.js ***!
  \******************************/
/*! exports provided: removeElement, addUrlHashParameter, calcBorderWidth, mergeObjects, addUrlParameter, getUrlHashParameterValue, removeUrlHashParameter, removeUrlParameter, setCSSStyle, getParents, serializeForm */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeElement", function() { return removeElement; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addUrlHashParameter", function() { return addUrlHashParameter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "calcBorderWidth", function() { return calcBorderWidth; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mergeObjects", function() { return mergeObjects; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addUrlParameter", function() { return addUrlParameter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getUrlHashParameterValue", function() { return getUrlHashParameterValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeUrlHashParameter", function() { return removeUrlHashParameter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeUrlParameter", function() { return removeUrlParameter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setCSSStyle", function() { return setCSSStyle; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getParents", function() { return getParents; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "serializeForm", function() { return serializeForm; });
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_float__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/parse-float */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/parse-float.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_parse_float__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_parse_float__WEBPACK_IMPORTED_MODULE_0__);


function removeElement(array, elm) {
  var index = array.indexOf(elm);

  if (index > -1) {
    array.splice(index, 1);
  }
}

function mergeObjects(defaults, options) {
  if (options === null || defaults === null) {
    return defaults;
  }

  for (var key in options) {
    defaults[key] = options[key];
  }

  return defaults;
}
/**
 * calculates the border of the given elements with the given properties
 */


function calcBorderWidth(elements, properties) {
  var sum = 0;

  for (var i = 0; i < elements.length; i++) {
    for (var j = 0; j < properties.length; j++) {
      var value = _babel_runtime_corejs2_core_js_parse_float__WEBPACK_IMPORTED_MODULE_0___default()(elements[i].css(properties[j]));

      if (!isNaN(value)) {
        sum += value;
      }
    }
  }

  return sum;
}

function addUrlHashParameter(initialUrl, key, value) {
  var url = removeUrlHashParameter(initialUrl, key),
      fragments = url.split('#'),
      urlpart = fragments[0],
      hashparts = fragments.length > 1 ? fragments[1].split("&") : [],
      result;
  hashparts.push(encodeURIComponent(key) + "=" + encodeURIComponent(value));

  if (hashparts.length > 0) {
    result = urlpart + '#' + hashparts.join('&');
  } else {
    result = urlpart;
  }

  return result;
}

function getUrlHashParameterValue(url, key) {
  var fragments = url.split('#'),
      hashparts = fragments.length > 1 ? fragments[1].split("&") : [],
      result;

  if (hashparts.length > 0) {
    var prefix = encodeURIComponent(key) + '=';

    for (var i = 0; i < hashparts.length; i++) {
      if (hashparts[i].indexOf(prefix, 0) === 0) {
        result = hashparts[i].replace(prefix, '');
      }
    }
  }

  return result;
}

function removeUrlHashParameter(url, key) {
  var fragments = url.split('#'),
      urlpart = fragments[0],
      hashparts = fragments.length > 1 ? fragments[1].split("&") : [],
      result;

  if (hashparts.length > 0) {
    var prefix = encodeURIComponent(key) + '=',
        newHashParts = [];

    for (var i = 0; i < hashparts.length; i++) {
      if (hashparts[i].indexOf(prefix, 0) === 0) {} else {
        newHashParts.push(hashparts[i]);
      }
    }

    hashparts = newHashParts;
  }

  if (hashparts.length > 0) {
    result = urlpart + '#' + hashparts.join('&');
  } else {
    result = urlpart;
  }

  return result;
}

function addUrlParameter(initialUrl, key, value) {
  var url = removeUrlParameter(initialUrl, key),
      fragments = url.split('#'),
      urlparts = fragments[0].split('?'),
      result;

  if (urlparts.length === 1) {
    result = urlparts[0] + '?' + encodeURIComponent(key) + "=" + encodeURIComponent(value);
  } else {
    result = urlparts.join('?') + '&' + encodeURIComponent(key) + "=" + encodeURIComponent(value);
  }

  if (fragments.length > 1) {
    return result + '#' + fragments[1];
  }

  return result;
}

function removeUrlParameter(url, key) {
  var fragments = url.split('#'),
      urlparts = fragments[0].split('?'),
      result;

  if (urlparts.length > 1) {
    var prefix = encodeURIComponent(key) + '=';
    var pars = urlparts[1].split('&');

    for (var i = 0; i < pars.length; i++) {
      if (pars[i].indexOf(prefix, 0) === 0) {
        pars.splice(i, 1);
      }
    }

    if (pars.length > 0) {
      result = urlparts[0] + '?' + pars.join('&');
    } else {
      result = urlparts[0];
    }
  } else {
    result = urlparts[0];
  }

  if (fragments.length > 1) {
    return result + '#' + fragments[1];
  }

  return result;
}

function setCSSStyle(nodes, style, value) {
  for (var i = 0; i < nodes.length; i++) {
    nodes[i].style[style] = value;
  }
}
/**
 *
 * @param node HTMLElement
 */


function getParents(node) {
  var parents = [];

  if (node === null) {
    return parents;
  }

  while (node.parentElement != null) {
    var parent = node.parentElement;
    parents.push(parent);
    node = parent;
  }

  return parents;
}
/*!
 * Serialize all form data into a query string
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 * Modified to use any HTML element instead of a form element.
 * @param  {Node}   form The form container to serialize
 * @return {String}      The serialized form data
 */


var serializeForm = function serializeForm(form) {
  // Setup our serialized data
  var serialized = [];
  var inputElements = form.querySelectorAll('input,select,textarea'); // Loop through each field in the form

  for (var i = 0; i < inputElements.length; i++) {
    var field = inputElements[i]; // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields

    if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue; // If a multi-select, get all selections

    if (field.type === 'select-multiple') {
      for (var n = 0; n < field.options.length; n++) {
        if (!field.options[n].selected) continue;
        serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[n].value));
      }
    } // Convert field data to a query string
    else if (field.type !== 'checkbox' && field.type !== 'radio' || field.checked) {
        serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value));
      }
  }

  return serialized.join('&');
};



/***/ }),

/***/ "./common/vue/helper/LocalizationMapper.js":
/*!*************************************************!*\
  !*** ./common/vue/helper/LocalizationMapper.js ***!
  \*************************************************/
/*! exports provided: mapLocalizationData */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mapLocalizationData", function() { return mapLocalizationData; });
/**
 * Prefix for the data attribute if we want to identify it as a localization key/value pair
 * @type {string}
 */
var dataI18n = 'data-i18n-';
/**
 * Creates a class which can translate things.
 *
 * @param hmltElement
 * @returns {{t: (function(*): *)}}
 */

var mapLocalizationData = function mapLocalizationData(hmltElement) {
  var _elements = [];

  for (var i = 0; i < hmltElement.attributes.length; i++) {
    var attrib = hmltElement.attributes[i];

    if (attrib.name.indexOf(dataI18n) === 0) {
      _elements[attrib.name.replace(dataI18n, '').toUpperCase()] = attrib.value;
    }
  }

  return {
    /**
     * Performs a translation using the given localization key
     *
     * @param localizationKey
     * @returns {*}
     */
    t: function t(localizationKey) {
      var lookup = localizationKey.toUpperCase();
      return _elements[lookup] ? _elements[lookup] : localizationKey;
    }
  };
};

/***/ }),

/***/ "./eventgallery-backend.js":
/*!*********************************!*\
  !*** ./eventgallery-backend.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by sven.bluege on 04.04.2017.
 */
__webpack_require__(/*! ./common/js/EventgalleryTools.js */ "./common/js/EventgalleryTools.js");

__webpack_require__(/*! ./backend/vue/uploader/index.js */ "./backend/vue/uploader/index.js");

__webpack_require__(/*! ./backend/vue/filesync/index.js */ "./backend/vue/filesync/index.js");

__webpack_require__(/*! ./backend/vue/thumbnailcreator/index.js */ "./backend/vue/thumbnailcreator/index.js");

__webpack_require__(/*! ./backend/vue/cacheclear/index.js */ "./backend/vue/cacheclear/index.js");

__webpack_require__(/*! ./backend/vue/imagecontentpluginform/index.js */ "./backend/vue/imagecontentpluginform/index.js");

__webpack_require__(/*! ./backend/vue/scalepriceeditor/index.js */ "./backend/vue/scalepriceeditor/index.js");

__webpack_require__(/*! ./backend/js/EventgalleryBehavior.js */ "./backend/js/EventgalleryBehavior.js");

__webpack_require__(/*! ./backend/js/EventgalleryInlineFormEdit.js */ "./backend/js/EventgalleryInlineFormEdit.js");

__webpack_require__(/*! ./backend/js/EventgalleryGooglePhotos.js */ "./backend/js/EventgalleryGooglePhotos.js");

__webpack_require__(/*! ./frontend/js/EventgalleryGooglePhotosProcessor.js */ "./frontend/js/EventgalleryGooglePhotosProcessor.js");

__webpack_require__(/*! ./backend/js/Albumselector.js */ "./backend/js/Albumselector.js");

__webpack_require__(/*! ./backend/js/LocalizableText.js */ "./backend/js/LocalizableText.js");

__webpack_require__(/*! ./backend/css/eventgallery.css */ "./backend/css/eventgallery.css");

__webpack_require__(/*! ./frontend/less/font-awesome/font-awesome.less */ "./frontend/less/font-awesome/font-awesome.less");

/***/ }),

/***/ "./frontend/js/EventgalleryGooglePhotosProcessor.js":
/*!**********************************************************!*\
  !*** ./frontend/js/EventgalleryGooglePhotosProcessor.js ***!
  \**********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/possibleConstructorReturn */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/getPrototypeOf */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/inherits */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/inherits.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/set */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/set.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/map */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/map.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/slicedToArray */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/slicedToArray.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/get-iterator */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/get-iterator.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/toConsumableArray */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/classCallCheck */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/createClass */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/createClass.js");
/* harmony import */ var _URLHelper__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./URLHelper */ "./frontend/js/URLHelper.js");












(function (Eventgallery) {
  var LOADING_MATCHER = 'gp.svg';
  var MARKER_IMAGE_IS_IN_PROGRESS_ATTRIBUTE = 'data-eg-gp-processing';

  Eventgallery.GooglePhotosProcessor =
  /*#__PURE__*/
  function () {
    function _class() {
      var _this = this;

      Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_8__["default"])(this, _class);

      this.albumUrl = "";
      this.albumsUrl = ""; // noinspection JSUnresolvedVariable

      if (window.EventGalleryGooglePhotosConfiguration) {
        this.albumUrl = window.EventGalleryGooglePhotosConfiguration.albumUrl;
        this.albumsUrl = window.EventGalleryGooglePhotosConfiguration.albumsUrl;
      }

      document.addEventListener("eventgallery-images-added", function () {
        return _this.processImages();
      });
    }

    Object(_babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_9__["default"])(_class, [{
      key: "processImages",
      // noinspection JSUnusedGlobalSymbols
      value: function processImages() {
        var albums = this._groupByAlbum(this._collectHTMLElements());

        this._markImagesAsInProgress(albums);

        this._getMainImageDataFromServer(albums);
      } // noinspection JSMethodCanBeStatic

      /**
       * Grabs IMG tag items from the DOM for Google Photos image placeholder.
       *
       * @returns <Element>[]
       * @private
       */

    }, {
      key: "_collectHTMLElements",
      value: function _collectHTMLElements() {
        var htmlCollection = document.getElementsByTagName('IMG');

        var foundImageHTMLElements =
        /** @type {HTMLElement} */
        Object(_babel_runtime_corejs2_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_7__["default"])(htmlCollection);

        var result = foundImageHTMLElements.filter(function (img) {
          var backgroundImage = img.style.backgroundImage;
          var longDesc = img.getAttribute('longdesc');
          var src = img.src;

          if (img.getAttribute(MARKER_IMAGE_IS_IN_PROGRESS_ATTRIBUTE) === '1') {
            return false;
          }

          return backgroundImage && backgroundImage.indexOf(LOADING_MATCHER) > 0 || longDesc && longDesc.indexOf(LOADING_MATCHER) > 0 || src && src.indexOf(LOADING_MATCHER) > 0;
        });
        htmlCollection = document.getElementsByTagName('A');

        var foundLinkHTMLElements =
        /** @type {HTMLElement} */
        Object(_babel_runtime_corejs2_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_7__["default"])(htmlCollection);

        result = result.concat(foundLinkHTMLElements.filter(function (a) {
          var longDesc = a.getAttribute('longdesc');
          var rel = a.getAttribute('rel');
          var href = a.getAttribute('href');

          if (a.getAttribute(MARKER_IMAGE_IS_IN_PROGRESS_ATTRIBUTE) === '1') {
            return false;
          }

          return href && href.indexOf(LOADING_MATCHER) > 0 || longDesc && longDesc.indexOf(LOADING_MATCHER) > 0 || rel && rel.indexOf(LOADING_MATCHER) > 0;
        }));
        return result;
      }
      /**
       *
       * @param albums {Map<any, any>}
       * @private
       */

    }, {
      key: "_markImagesAsInProgress",
      value: function _markImagesAsInProgress(albums) {
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(albums), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            var _step$value = Object(_babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__["default"])(_step.value, 2),
                foldername = _step$value[0],
                album = _step$value[1];

            /**
             * @var ParsedHTMLElement parsedHTMLElement
             */
            album.forEach(function (parsedHTMLElement) {
              parsedHTMLElement.getHTMLElement().setAttribute(MARKER_IMAGE_IS_IN_PROGRESS_ATTRIBUTE, 1);
            });
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator.return != null) {
              _iterator.return();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }
      }
      /**
       * sorts all found images into a map: key=folder, value=array of
       *
       * @param htmlElements
       * @returns {Map<any, any>}
       * @private
       */

    }, {
      key: "_groupByAlbum",
      value: function _groupByAlbum(htmlElements) {
        var _this2 = this;

        var albums = new _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_4___default.a();
        htmlElements.forEach(function (imageHTMLElement) {
          var parsedHTMLElement = _this2._parseHTMLElement(imageHTMLElement);

          parsedHTMLElement.updateParameters();
          var folder = parsedHTMLElement.parameters.get('folder');

          if (!albums.get(folder)) {
            albums.set(folder, []);
          }

          albums.get(folder).push(parsedHTMLElement);
        });
        return albums;
      } // noinspection JSMethodCanBeStatic

      /**
       *
       * @param htmlElement
       * @returns {ParsedHTMLElement}
       * @private
       */

    }, {
      key: "_parseHTMLElement",
      value: function _parseHTMLElement(htmlElement) {
        if (htmlElement.tagName === 'IMG') {
          return new ParsedImageHTMLElement(htmlElement);
        }

        return new ParsedLinkHTMLElement(htmlElement);
      }
      /**
       * starts several requests to the server to determine
       *
       * @param albums
       * @private
       */

    }, {
      key: "_getAlbumDataFromServer",
      value: function _getAlbumDataFromServer(albums) {
        var _iteratorNormalCompletion2 = true;
        var _didIteratorError2 = false;
        var _iteratorError2 = undefined;

        try {
          for (var _iterator2 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(albums), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
            var _step2$value = Object(_babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__["default"])(_step2.value, 2),
                foldername = _step2$value[0],
                album = _step2$value[1];

            this._doAlbumRequest(foldername, album);
          }
        } catch (err) {
          _didIteratorError2 = true;
          _iteratorError2 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
              _iterator2.return();
            }
          } finally {
            if (_didIteratorError2) {
              throw _iteratorError2;
            }
          }
        }
      }
    }, {
      key: "_doAlbumRequest",
      value: function _doAlbumRequest(foldername, album) {
        var _this3 = this;

        fetch(this.albumUrl + '&folder=' + foldername).then(function (response) {
          return response.json();
        }).then(function (data) {
          return _this3._processAlbumResult(album, data);
        });
      }
    }, {
      key: "_processAlbumResult",
      value: function _processAlbumResult(album, data) {
        this._replaceImages(album, data);
      }
    }, {
      key: "_getMainImageDataFromServer",
      value: function _getMainImageDataFromServer(albums) {
        var albumsWithMainImagesOnly = this._filterForAlbumsWithMainImageOnly(albums);

        if (albumsWithMainImagesOnly.size > 0) {
          this._doAlbumsRequest(albumsWithMainImagesOnly, albums);

          var _iteratorNormalCompletion3 = true;
          var _didIteratorError3 = false;
          var _iteratorError3 = undefined;

          try {
            for (var _iterator3 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(albumsWithMainImagesOnly), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
              var _step3$value = Object(_babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__["default"])(_step3.value, 2),
                  foldername = _step3$value[0],
                  album = _step3$value[1];

              albums.delete(foldername);
            }
          } catch (err) {
            _didIteratorError3 = true;
            _iteratorError3 = err;
          } finally {
            try {
              if (!_iteratorNormalCompletion3 && _iterator3.return != null) {
                _iterator3.return();
              }
            } finally {
              if (_didIteratorError3) {
                throw _iteratorError3;
              }
            }
          }
        }

        this._getAlbumDataFromServer(albums);
      }
    }, {
      key: "_doAlbumsRequest",
      value: function _doAlbumsRequest(albumsWithMainImagesOnly, albums) {
        var _this4 = this;

        fetch(this.albumsUrl).then(function (response) {
          return response.json();
        }).then(function (data) {
          return _this4._processAlbumsResult(albumsWithMainImagesOnly, albums, data);
        });
      }
    }, {
      key: "_processAlbumsResult",
      value: function _processAlbumsResult(albumsWithMainImagesOnly, albums, data) {
        var _iteratorNormalCompletion4 = true;
        var _didIteratorError4 = false;
        var _iteratorError4 = undefined;

        try {
          for (var _iterator4 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(albumsWithMainImagesOnly), _step4; !(_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done); _iteratorNormalCompletion4 = true) {
            var _step4$value = Object(_babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__["default"])(_step4.value, 2),
                key = _step4$value[0],
                album = _step4$value[1];

            this._replaceImages(album, data[key]);
          }
        } catch (err) {
          _didIteratorError4 = true;
          _iteratorError4 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion4 && _iterator4.return != null) {
              _iterator4.return();
            }
          } finally {
            if (_didIteratorError4) {
              throw _iteratorError4;
            }
          }
        }

        this._getAlbumDataFromServer(albums);
      } // noinspection JSMethodCanBeStatic

    }, {
      key: "_filterForAlbumsWithMainImageOnly",
      value: function _filterForAlbumsWithMainImageOnly(albums) {
        var newAlbums = new _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_4___default.a();
        var _iteratorNormalCompletion5 = true;
        var _didIteratorError5 = false;
        var _iteratorError5 = undefined;

        try {
          for (var _iterator5 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(albums), _step5; !(_iteratorNormalCompletion5 = (_step5 = _iterator5.next()).done); _iteratorNormalCompletion5 = true) {
            var _step5$value = Object(_babel_runtime_corejs2_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_5__["default"])(_step5.value, 2),
                key = _step5$value[0],
                album = _step5$value[1];

            var mainImages = album.filter(function (image) {
              return image.isMainImage();
            });

            if (mainImages.length > 0 && mainImages.length === album.length) {
              newAlbums.set(key, album);
            }
          }
        } catch (err) {
          _didIteratorError5 = true;
          _iteratorError5 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion5 && _iterator5.return != null) {
              _iterator5.return();
            }
          } finally {
            if (_didIteratorError5) {
              throw _iteratorError5;
            }
          }
        }

        return newAlbums;
      }
    }, {
      key: "_replaceImages",
      value: function _replaceImages(album, serverResult) {
        if (album === undefined || serverResult === undefined) {
          return;
        }

        album.forEach(function (parsedImageHTMLElement) {
          var imageUrl = serverResult[parsedImageHTMLElement.getFile()];

          if (imageUrl === undefined) {
            return false;
          }

          parsedImageHTMLElement.updateParameters();
          parsedImageHTMLElement.replaceElementLinks(imageUrl);
          parsedImageHTMLElement.getHTMLElement().setAttribute(MARKER_IMAGE_IS_IN_PROGRESS_ATTRIBUTE, 0);
        });

        if (Eventgallery.lightbox) {
          if (Eventgallery.lightbox.isOpen()) {
            var link = Eventgallery.lightbox.getCurrentSlide().thumbnailContainer;

            Eventgallery.lightbox._gallery.close();

            setTimeout(function () {
              return link.click();
            }, 500);
          }
        }
      }
    }]);

    return _class;
  }();

  var ParsedHTMLElement =
  /*#__PURE__*/
  function () {
    function ParsedHTMLElement(htmlElement) {
      Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_8__["default"])(this, ParsedHTMLElement);

      this.htmlElement = htmlElement;
      this.parameters = null;
      this.attributeNames = new _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default.a();
      this.styleAttributeNames = new _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default.a();
    }

    Object(_babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_9__["default"])(ParsedHTMLElement, [{
      key: "updateParametersWithUrl",
      value: function updateParametersWithUrl(url) {
        var parameterString = url.substring(url.indexOf('#') + 1);
        this.parameters = _URLHelper__WEBPACK_IMPORTED_MODULE_10__["default"].parseURLParameter(parameterString);
      }
    }, {
      key: "updateParameters",
      value: function updateParameters() {
        var _iteratorNormalCompletion6 = true;
        var _didIteratorError6 = false;
        var _iteratorError6 = undefined;

        try {
          for (var _iterator6 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(this.attributeNames), _step6; !(_iteratorNormalCompletion6 = (_step6 = _iterator6.next()).done); _iteratorNormalCompletion6 = true) {
            var n = _step6.value;
            var url = this.getHTMLElement().getAttribute(n);

            if (url && url.indexOf(LOADING_MATCHER) > 0) {
              this.updateParametersWithUrl(url);
              return;
            }
          }
        } catch (err) {
          _didIteratorError6 = true;
          _iteratorError6 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion6 && _iterator6.return != null) {
              _iterator6.return();
            }
          } finally {
            if (_didIteratorError6) {
              throw _iteratorError6;
            }
          }
        }

        var _iteratorNormalCompletion7 = true;
        var _didIteratorError7 = false;
        var _iteratorError7 = undefined;

        try {
          for (var _iterator7 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(this.styleAttributeNames), _step7; !(_iteratorNormalCompletion7 = (_step7 = _iterator7.next()).done); _iteratorNormalCompletion7 = true) {
            var _n = _step7.value;

            var _url = _URLHelper__WEBPACK_IMPORTED_MODULE_10__["default"].extractBackgroudUrl(this.getHTMLElement().style[_n]);

            if (_url && _url.indexOf(LOADING_MATCHER) > 0) {
              this.updateParametersWithUrl(_url);
              return;
            }
          }
        } catch (err) {
          _didIteratorError7 = true;
          _iteratorError7 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion7 && _iterator7.return != null) {
              _iterator7.return();
            }
          } finally {
            if (_didIteratorError7) {
              throw _iteratorError7;
            }
          }
        }
      }
    }, {
      key: "replaceElementLinks",
      value: function replaceElementLinks(imageUrl) {
        var _iteratorNormalCompletion8 = true;
        var _didIteratorError8 = false;
        var _iteratorError8 = undefined;

        try {
          for (var _iterator8 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(this.attributeNames), _step8; !(_iteratorNormalCompletion8 = (_step8 = _iterator8.next()).done); _iteratorNormalCompletion8 = true) {
            var n = _step8.value;
            var url = this.getHTMLElement().getAttribute(n);

            if (url && url.indexOf(LOADING_MATCHER) > 0) {
              this.getHTMLElement().setAttribute(n, this.getImageUrl(imageUrl, this.getWidth(url)));
            }
          }
        } catch (err) {
          _didIteratorError8 = true;
          _iteratorError8 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion8 && _iterator8.return != null) {
              _iterator8.return();
            }
          } finally {
            if (_didIteratorError8) {
              throw _iteratorError8;
            }
          }
        }

        var _iteratorNormalCompletion9 = true;
        var _didIteratorError9 = false;
        var _iteratorError9 = undefined;

        try {
          for (var _iterator9 = _babel_runtime_corejs2_core_js_get_iterator__WEBPACK_IMPORTED_MODULE_6___default()(this.styleAttributeNames), _step9; !(_iteratorNormalCompletion9 = (_step9 = _iterator9.next()).done); _iteratorNormalCompletion9 = true) {
            var _n2 = _step9.value;

            var _url2 = _URLHelper__WEBPACK_IMPORTED_MODULE_10__["default"].extractBackgroudUrl(this.getHTMLElement().style[_n2]);

            if (_url2 && _url2.indexOf(LOADING_MATCHER) > 0) {
              this.getHTMLElement().style[_n2] = 'url(' + this.getImageUrl(imageUrl, this.getWidth(_url2)) + ')';
            }
          }
        } catch (err) {
          _didIteratorError9 = true;
          _iteratorError9 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion9 && _iterator9.return != null) {
              _iterator9.return();
            }
          } finally {
            if (_didIteratorError9) {
              throw _iteratorError9;
            }
          }
        }
      }
    }, {
      key: "getHTMLElement",
      value: function getHTMLElement() {
        return this.htmlElement;
      }
    }, {
      key: "getFolder",
      value: function getFolder() {
        return this.parameters.get('folder');
      }
    }, {
      key: "getFile",
      value: function getFile() {
        return this.parameters.get('file');
      }
    }, {
      key: "getWidth",
      value: function getWidth(url) {
        return _URLHelper__WEBPACK_IMPORTED_MODULE_10__["default"].parseURLParameter(url).get('width');
      }
    }, {
      key: "getImageUrl",
      value: function getImageUrl(imageUrl, width) {
        return imageUrl + '=w' + width;
      }
    }, {
      key: "isMainImage",
      value: function isMainImage() {
        return this.parameters.get('m') === '1';
      }
    }]);

    return ParsedHTMLElement;
  }();

  var ParsedLinkHTMLElement =
  /*#__PURE__*/
  function (_ParsedHTMLElement) {
    Object(_babel_runtime_corejs2_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_2__["default"])(ParsedLinkHTMLElement, _ParsedHTMLElement);

    function ParsedLinkHTMLElement(htmlElement) {
      var _this5;

      Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_8__["default"])(this, ParsedLinkHTMLElement);

      _this5 = Object(_babel_runtime_corejs2_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_0__["default"])(this, Object(_babel_runtime_corejs2_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_1__["default"])(ParsedLinkHTMLElement).call(this, htmlElement));
      _this5.attributeNames = new _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default.a(['href', 'longDesc', 'rel']);
      return _this5;
    }

    return ParsedLinkHTMLElement;
  }(ParsedHTMLElement);

  var ParsedImageHTMLElement =
  /*#__PURE__*/
  function (_ParsedHTMLElement2) {
    Object(_babel_runtime_corejs2_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_2__["default"])(ParsedImageHTMLElement, _ParsedHTMLElement2);

    function ParsedImageHTMLElement(htmlElement) {
      var _this6;

      Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_8__["default"])(this, ParsedImageHTMLElement);

      _this6 = Object(_babel_runtime_corejs2_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_0__["default"])(this, Object(_babel_runtime_corejs2_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_1__["default"])(ParsedImageHTMLElement).call(this, htmlElement));
      _this6.attributeNames = new _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default.a(['src', 'longDesc']);
      _this6.styleAttributeNames = new _babel_runtime_corejs2_core_js_set__WEBPACK_IMPORTED_MODULE_3___default.a(['backgroundImage']);
      return _this6;
    }

    return ParsedImageHTMLElement;
  }(ParsedHTMLElement);
})(Eventgallery);

/***/ }),

/***/ "./frontend/js/URLHelper.js":
/*!**********************************!*\
  !*** ./frontend/js/URLHelper.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return URLHelper; });
/* harmony import */ var _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime-corejs2/core-js/map */ "../../../../build/node_modules/@babel/runtime-corejs2/core-js/map.js");
/* harmony import */ var _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/classCallCheck */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime-corejs2/helpers/esm/createClass */ "../../../../build/node_modules/@babel/runtime-corejs2/helpers/esm/createClass.js");




var URLHelper =
/*#__PURE__*/
function () {
  function URLHelper() {
    Object(_babel_runtime_corejs2_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_1__["default"])(this, URLHelper);
  }
  /**
   * splits a URL parameter like foo=bar&1=2 into a parameter map
   *
   * @param urlParameterString
   * @returns {Map<any, any>}
   */


  Object(_babel_runtime_corejs2_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_2__["default"])(URLHelper, null, [{
    key: "parseURLParameter",
    value: function parseURLParameter(urlParameterString) {
      var pairs = urlParameterString.split('&');
      var parameters = new _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_0___default.a();
      pairs.forEach(function (pair) {
        var splittedPair = pair.split('=');

        if (splittedPair.length === 2) {
          parameters.set(splittedPair[0], splittedPair[1]);
        }
      });
      return parameters;
    }
    /**
     * returns a map of the query string of an full url
     *
     * @param urlSring
     * @returns {URLSearchParams}
     */

  }, {
    key: "getParameters",
    value: function getParameters(urlSring) {
      var parts = urlSring.split('?');

      if (parts.length < 2) {
        return new _babel_runtime_corejs2_core_js_map__WEBPACK_IMPORTED_MODULE_0___default.a();
      }

      var queryParts = parts[1].split('#');
      return URLHelper.parseURLParameter(queryParts[0]);
    }
    /**
     * returns the url from strings like "url ('foobar.jpg')"
     *
     * @param urlString
     * @returns {*}
     */

  }, {
    key: "extractBackgroudUrl",
    value: function extractBackgroudUrl(urlString) {
      return urlString.replace(/(url\(|\)|"|')/g, '');
    }
  }]);

  return URLHelper;
}();


;

/***/ }),

/***/ "./frontend/less/font-awesome/font-awesome.less":
/*!******************************************************!*\
  !*** ./frontend/less/font-awesome/font-awesome.less ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=backend-debug.js.map