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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (false) { var throwOnDirectAccess, ReactIs; } else {
  // By explicitly using `prop-types` you are opting into new production behavior.
  // http://fb.me/prop-types-in-prod
  module.exports = __webpack_require__(42)();
}


/***/ }),
/* 2 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),
/* 3 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["data"]; }());

/***/ }),
/* 4 */
/***/ (function(module, exports) {

(function() { module.exports = window["lodash"]; }());

/***/ }),
/* 5 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["components"]; }());

/***/ }),
/* 6 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["navigation"]; }());

/***/ }),
/* 7 */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  }, module.exports.__esModule = true, module.exports["default"] = module.exports;
  return _getPrototypeOf(o);
}
module.exports = _getPrototypeOf, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 8 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["date"]; }());

/***/ }),
/* 9 */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }
  return obj;
}
module.exports = _defineProperty, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 10 */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}
module.exports = _classCallCheck, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 11 */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}
function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  Object.defineProperty(Constructor, "prototype", {
    writable: false
  });
  return Constructor;
}
module.exports = _createClass, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(36);
function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }
  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  Object.defineProperty(subClass, "prototype", {
    writable: false
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}
module.exports = _inherits, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(37)["default"];
var assertThisInitialized = __webpack_require__(20);
function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  } else if (call !== void 0) {
    throw new TypeError("Derived constructors may only return object or undefined");
  }
  return assertThisInitialized(self);
}
module.exports = _possibleConstructorReturn, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 14 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["number"]; }());

/***/ }),
/* 15 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["wcSettings"]; }());

/***/ }),
/* 16 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),
/* 17 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["compose"]; }());

/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(33);
var iterableToArray = __webpack_require__(34);
var unsupportedIterableToArray = __webpack_require__(27);
var nonIterableSpread = __webpack_require__(35);
function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}
module.exports = _toConsumableArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 19 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["hooks"]; }());

/***/ }),
/* 20 */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }
  return self;
}
module.exports = _assertThisInitialized, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 21 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["date"]; }());

/***/ }),
/* 22 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),
/* 23 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["csvExport"]; }());

/***/ }),
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

var objectWithoutPropertiesLoose = __webpack_require__(41);
function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};
  var target = objectWithoutPropertiesLoose(source, excluded);
  var key, i;
  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);
    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }
  return target;
}
module.exports = _objectWithoutProperties, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 25 */
/***/ (function(module, exports) {

(function() { module.exports = window["wc"]["currency"]; }());

/***/ }),
/* 26 */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;
  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }
  return arr2;
}
module.exports = _arrayLikeToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(26);
function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}
module.exports = _unsupportedIterableToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 28 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["apiFetch"]; }());

/***/ }),
/* 29 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["url"]; }());

/***/ }),
/* 30 */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign ? Object.assign.bind() : function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];
      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }
    return target;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports;
  return _extends.apply(this, arguments);
}
module.exports = _extends, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 31 */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(38);
var iterableToArrayLimit = __webpack_require__(39);
var unsupportedIterableToArray = __webpack_require__(27);
var nonIterableRest = __webpack_require__(40);
function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}
module.exports = _slicedToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 32 */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["dom"]; }());

/***/ }),
/* 33 */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(26);
function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}
module.exports = _arrayWithoutHoles, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 34 */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}
module.exports = _iterableToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 35 */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
module.exports = _nonIterableSpread, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 36 */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports;
  return _setPrototypeOf(o, p);
}
module.exports = _setPrototypeOf, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 37 */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  return (module.exports = _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) {
    return typeof obj;
  } : function (obj) {
    return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports), _typeof(obj);
}
module.exports = _typeof, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 38 */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}
module.exports = _arrayWithHoles, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 39 */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];
  if (_i == null) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _s, _e;
  try {
    for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
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
module.exports = _iterableToArrayLimit, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 40 */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
module.exports = _nonIterableRest, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 41 */
/***/ (function(module, exports) {

function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;
  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }
  return target;
}
module.exports = _objectWithoutPropertiesLoose, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 42 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = __webpack_require__(43);

function emptyFunction() {}
function emptyFunctionWithReset() {}
emptyFunctionWithReset.resetWarningCache = emptyFunction;

module.exports = function() {
  function shim(props, propName, componentName, location, propFullName, secret) {
    if (secret === ReactPropTypesSecret) {
      // It is still safe when called from React.
      return;
    }
    var err = new Error(
      'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
      'Use PropTypes.checkPropTypes() to call them. ' +
      'Read more at http://fb.me/use-check-prop-types'
    );
    err.name = 'Invariant Violation';
    throw err;
  };
  shim.isRequired = shim;
  function getShim() {
    return shim;
  };
  // Important!
  // Keep this list in sync with production version in `./factoryWithTypeCheckers.js`.
  var ReactPropTypes = {
    array: shim,
    bigint: shim,
    bool: shim,
    func: shim,
    number: shim,
    object: shim,
    string: shim,
    symbol: shim,

    any: shim,
    arrayOf: getShim,
    element: shim,
    elementType: shim,
    instanceOf: getShim,
    node: shim,
    objectOf: getShim,
    oneOf: getShim,
    oneOfType: getShim,
    shape: getShim,
    exact: getShim,

    checkPropTypes: emptyFunctionWithReset,
    resetWarningCache: emptyFunction
  };

  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),
/* 43 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),
/* 44 */,
/* 45 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/toConsumableArray.js
var toConsumableArray = __webpack_require__(18);
var toConsumableArray_default = /*#__PURE__*/__webpack_require__.n(toConsumableArray);

// EXTERNAL MODULE: external ["wp","hooks"]
var external_wp_hooks_ = __webpack_require__(19);

// EXTERNAL MODULE: external ["wp","i18n"]
var external_wp_i18n_ = __webpack_require__(0);

// EXTERNAL MODULE: external ["wp","element"]
var external_wp_element_ = __webpack_require__(2);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__(9);
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/classCallCheck.js
var classCallCheck = __webpack_require__(10);
var classCallCheck_default = /*#__PURE__*/__webpack_require__.n(classCallCheck);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/createClass.js
var createClass = __webpack_require__(11);
var createClass_default = /*#__PURE__*/__webpack_require__.n(createClass);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/inherits.js
var inherits = __webpack_require__(12);
var inherits_default = /*#__PURE__*/__webpack_require__.n(inherits);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js
var possibleConstructorReturn = __webpack_require__(13);
var possibleConstructorReturn_default = /*#__PURE__*/__webpack_require__.n(possibleConstructorReturn);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/getPrototypeOf.js
var getPrototypeOf = __webpack_require__(7);
var getPrototypeOf_default = /*#__PURE__*/__webpack_require__.n(getPrototypeOf);

// EXTERNAL MODULE: ./node_modules/prop-types/index.js
var prop_types = __webpack_require__(1);
var prop_types_default = /*#__PURE__*/__webpack_require__.n(prop_types);

// EXTERNAL MODULE: external ["wc","components"]
var external_wc_components_ = __webpack_require__(5);

// EXTERNAL MODULE: external ["wc","data"]
var external_wc_data_ = __webpack_require__(3);

// EXTERNAL MODULE: external ["wc","wcSettings"]
var external_wc_wcSettings_ = __webpack_require__(15);

// EXTERNAL MODULE: external "lodash"
var external_lodash_ = __webpack_require__(4);

// EXTERNAL MODULE: external ["wp","apiFetch"]
var external_wp_apiFetch_ = __webpack_require__(28);
var external_wp_apiFetch_default = /*#__PURE__*/__webpack_require__.n(external_wp_apiFetch_);

// EXTERNAL MODULE: external ["wp","url"]
var external_wp_url_ = __webpack_require__(29);

// EXTERNAL MODULE: external ["wc","navigation"]
var external_wc_navigation_ = __webpack_require__(6);

// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/lib/index.js
/**
 * External dependencies.
 */





/**
 * Exports.
 */
function getRequestByIdString(path) {
  var handleData = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : identity;
  return function () {
    var queryString = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
    var pathString = path;
    var idList = Object(external_wc_navigation_["getIdsFromQuery"])(queryString);
    if (idList.length < 1) {
      return Promise.resolve([]);
    }
    var payload = {
      include: idList.join(','),
      per_page: idList.length
    };
    return external_wp_apiFetch_default()({
      path: Object(external_wp_url_["addQueryArgs"])(pathString, payload)
    }).then(function (data) {
      return data.map(handleData);
    });
  };
}

/**
 * Takes a chart name returns the configuration for that chart from and array
 * of charts. If the chart is not found it will return the first chart.
 *
 * @param {string} chartName - the name of the chart to get configuration for
 * @param {Array} charts - list of charts for a particular report
 * @return {Object} - chart configuration object
 */
function getSelectedChart(chartName) {
  var charts = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [];
  var chart = Object(external_lodash_["find"])(charts, {
    key: chartName
  });
  if (chart) {
    return chart;
  }
  return charts[0];
}
// CONCATENATED MODULE: ./resources/js/admin/analytics/report/config.js
/**
 * External dependencies.
 */


/**
 * WooCommerce dependencies.
 */



/**
 * SomewhereWarm dependencies.
 */


/**
 * Helpers.
 */
var getProductLabels = getRequestByIdString(external_wc_data_["NAMESPACE"] + '/products', function (product) {
  return {
    key: product.id,
    label: product.name
  };
});
var config_getLocationOptions = function getLocationOptions() {
  var adminSettings = Object(external_wc_wcSettings_["getSetting"])('admin', {});
  var prlLocationOptions = (adminSettings === null || adminSettings === void 0 ? void 0 : adminSettings.prlLocationOptions) || [];
  return prlLocationOptions;
};

/**
 * Exports.
 */
var config_advancedFilters = {
  title: Object(external_wp_i18n_["__"])(
  // A sentence describing filters for Orders
  // See screen shot for context: https://cloudup.com/cSsUY9VeCVJ
  // 'Orders Match {{select /}} Filters',
  'Filter by Product and Location', 'woocommerce-product-recommendations'),
  filters: {
    location: {
      allowMultiple: true,
      labels: {
        add: Object(external_wp_i18n_["__"])('Location', 'woocommerce-product-recommendations'),
        remove: Object(external_wp_i18n_["__"])('Remove Location filter', 'woocommerce-product-recommendations'),
        rule: Object(external_wp_i18n_["__"])('Choose a Location', 'woocommerce-product-recommendations'),
        title: Object(external_wp_i18n_["__"])('Location {{rule /}} {{filter /}}', 'woocommerce-product-recommendations'),
        filter: Object(external_wp_i18n_["__"])('Select a Location', 'woocommerce-product-recommendations')
      },
      rules: [{
        value: 'includes',
        label: Object(external_wp_i18n_["_x"])('Is', 'location-status-report-filter', 'woocommerce-product-recommendations')
      }, {
        value: 'excludes',
        label: Object(external_wp_i18n_["_x"])('Is not', 'location-status-report-filter', 'woocommerce-product-recommendations')
      }],
      input: {
        component: 'SelectControl',
        options: config_getLocationOptions()
      }
    },
    product: {
      labels: {
        add: Object(external_wp_i18n_["__"])('Products', 'woocommerce-product-recommendations'),
        placeholder: Object(external_wp_i18n_["__"])('Search products', 'woocommerce-product-recommendations'),
        remove: Object(external_wp_i18n_["__"])('Remove Products filter', 'woocommerce-product-recommendations'),
        rule: Object(external_wp_i18n_["__"])('Choose Products', 'woocommerce-product-recommendations'),
        /* translators: A sentence describing a Product filter. See screen shot for context: https://cloudup.com/cSsUY9VeCVJ */
        title: Object(external_wp_i18n_["__"])('{{title}}Product{{/title}} {{rule /}} {{filter /}}', 'woocommerce-product-recommendations'),
        filter: Object(external_wp_i18n_["__"])('Select Products', 'woocommerce-product-recommendations')
      },
      rules: [{
        value: 'includes',
        /* translators: Sentence fragment, logical, "Includes" refers to orders including a given product(s). Screenshot for context: https://cloudup.com/cSsUY9VeCVJ */
        label: Object(external_wp_i18n_["_x"])('Includes', 'products-report-filter', 'woocommerce-product-recommendations')
      }, {
        value: 'excludes',
        /* translators: Sentence fragment, logical, "Excludes" refers to orders excluding a given product(s). Screenshot for context: https://cloudup.com/cSsUY9VeCVJ */
        label: Object(external_wp_i18n_["_x"])('Excludes', 'products-report-filter', 'woocommerce-product-recommendations')
      }],
      input: {
        component: 'Search',
        type: 'products',
        getLabels: getProductLabels
      }
    }
  }
};
var config_filters = [{
  label: Object(external_wp_i18n_["__"])('Show', 'woocommerce-product-recommendations'),
  staticParams: ['section', 'paged', 'per_page'],
  param: 'filter',
  showFilters: function showFilters() {
    return true;
  },
  filters: [{
    label: Object(external_wp_i18n_["__"])('All revenue', 'woocommerce-product-recommendations'),
    value: 'all'
  }, {
    label: Object(external_wp_i18n_["__"])('Advanced filters', 'woocommerce-product-recommendations'),
    value: 'advanced'
  }]
}];
// CONCATENATED MODULE: ./resources/js/admin/analytics/report/revenue/config.js
/**
 * External dependencies.
 */


/**
 * Exports.
 */
var ENDPOINT = 'recommendations-revenue';
var config_charts = [{
  key: 'gross_sales',
  label: Object(external_wp_i18n_["__"])('Gross sales', 'woocommerce-product-recommendations'),
  order: 'desc',
  orderby: 'gross_sales',
  type: 'currency'
}, {
  key: 'net_sales',
  label: Object(external_wp_i18n_["__"])('Net sales', 'woocommerce-product-recommendations'),
  order: 'desc',
  orderby: 'net_sales',
  type: 'currency'
}, {
  key: 'items_sold',
  label: Object(external_wp_i18n_["__"])('Items sold', 'woocommerce-product-recommendations'),
  order: 'desc',
  orderby: 'items_sold',
  type: 'number'
}, {
  key: 'orders_count',
  label: Object(external_wp_i18n_["__"])('Orders', 'woocommerce-product-recommendations'),
  order: 'desc',
  orderby: 'orders_count',
  type: 'number'
}];
// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/assertThisInitialized.js
var assertThisInitialized = __webpack_require__(20);
var assertThisInitialized_default = /*#__PURE__*/__webpack_require__.n(assertThisInitialized);

// EXTERNAL MODULE: external ["wp","compose"]
var external_wp_compose_ = __webpack_require__(17);

// EXTERNAL MODULE: external ["wp","data"]
var external_wp_data_ = __webpack_require__(16);

// EXTERNAL MODULE: external ["wp","date"]
var external_wp_date_ = __webpack_require__(21);

// EXTERNAL MODULE: external ["wc","number"]
var external_wc_number_ = __webpack_require__(14);

// EXTERNAL MODULE: external ["wc","date"]
var external_wc_date_ = __webpack_require__(8);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/extends.js
var helpers_extends = __webpack_require__(30);
var extends_default = /*#__PURE__*/__webpack_require__.n(helpers_extends);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/slicedToArray.js
var slicedToArray = __webpack_require__(31);
var slicedToArray_default = /*#__PURE__*/__webpack_require__.n(slicedToArray);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/objectWithoutProperties.js
var objectWithoutProperties = __webpack_require__(24);
var objectWithoutProperties_default = /*#__PURE__*/__webpack_require__.n(objectWithoutProperties);

// EXTERNAL MODULE: external ["wp","components"]
var external_wp_components_ = __webpack_require__(22);

// EXTERNAL MODULE: external ["wp","dom"]
var external_wp_dom_ = __webpack_require__(32);

// EXTERNAL MODULE: external ["wc","csvExport"]
var external_wc_csvExport_ = __webpack_require__(23);

// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-table/download-icon.js

/* harmony default export */ var download_icon = (function () {
  return Object(external_wp_element_["createElement"])("svg", {
    role: "img",
    "aria-hidden": "true",
    focusable: "false",
    version: "1.1",
    xmlns: "http://www.w3.org/2000/svg",
    x: "0px",
    y: "0px",
    viewBox: "0 0 24 24"
  }, Object(external_wp_element_["createElement"])("path", {
    d: "M18,9c-0.009,0-0.017,0.002-0.025,0.003C17.72,5.646,14.922,3,11.5,3C7.91,3,5,5.91,5,9.5c0,0.524,0.069,1.031,0.186,1.519 C5.123,11.016,5.064,11,5,11c-2.209,0-4,1.791-4,4c0,1.202,0.541,2.267,1.38,3h18.593C22.196,17.089,23,15.643,23,14 C23,11.239,20.761,9,18,9z M12,16l-4-5h3V8h2v3h3L12,16z"
  }));
});
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-error/index.js






function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
/**
 * External dependencies
 */






/**
 * Component to render when there is an error in a report component due to data
 * not being loaded or being invalid.
 */
var report_error_ReportError = /*#__PURE__*/function (_Component) {
  inherits_default()(ReportError, _Component);
  var _super = _createSuper(ReportError);
  function ReportError() {
    classCallCheck_default()(this, ReportError);
    return _super.apply(this, arguments);
  }
  createClass_default()(ReportError, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
        className = _this$props.className,
        isError = _this$props.isError,
        isEmpty = _this$props.isEmpty;
      var title, actionLabel, actionURL, actionCallback;
      if (isError) {
        title = Object(external_wp_i18n_["__"])('There was an error getting your stats. Please try again.', 'woocommerce-product-bundles');
        actionLabel = Object(external_wp_i18n_["__"])('Reload', 'woocommerce-product-bundles');
        actionCallback = function actionCallback() {
          window.location.reload();
        };
      } else if (isEmpty) {
        title = Object(external_wp_i18n_["__"])('No results could be found for this date range.', 'woocommerce-product-bundles');
        actionLabel = Object(external_wp_i18n_["__"])('View Orders', 'woocommerce-product-bundles');
        actionURL = Object(external_wc_wcSettings_["getAdminLink"])('edit.php?post_type=shop_order');
      }
      return Object(external_wp_element_["createElement"])(external_wc_components_["EmptyContent"], {
        className: className,
        title: title,
        actionLabel: actionLabel,
        actionURL: actionURL,
        actionCallback: actionCallback
      });
    }
  }]);
  return ReportError;
}(external_wp_element_["Component"]);
report_error_ReportError.propTypes = {
  /**
   * Additional class name to style the component.
   */
  className: prop_types_default.a.string,
  /**
   * Boolean representing whether there was an error.
   */
  isError: prop_types_default.a.bool,
  /**
   * Boolean representing whether the issue is that there is no data.
   */
  isEmpty: prop_types_default.a.bool
};
report_error_ReportError.defaultProps = {
  className: ''
};
/* harmony default export */ var report_error = (report_error_ReportError);
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-table/utils.js

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { defineProperty_default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
/**
 * External dependencies
 */

function extendTableData(select, props, queriedTableData) {
  var extendItemsMethodNames = props.extendItemsMethodNames,
    extendedItemsStoreName = props.extendedItemsStoreName,
    itemIdField = props.itemIdField;
  var itemsData = queriedTableData.items.data;
  if (!Array.isArray(itemsData) || !itemsData.length || !extendItemsMethodNames || !itemIdField) {
    return queriedTableData;
  }
  var _select = select(extendedItemsStoreName),
    getErrorMethod = _select[extendItemsMethodNames.getError],
    isRequestingMethod = _select[extendItemsMethodNames.isRequesting],
    loadMethod = _select[extendItemsMethodNames.load];
  var extendQuery = {
    include: itemsData.map(function (item) {
      return item[itemIdField];
    }).join(','),
    per_page: itemsData.length
  };
  var extendedItems = loadMethod(extendQuery);
  var isExtendedItemsRequesting = isRequestingMethod ? isRequestingMethod(extendQuery) : false;
  var isExtendedItemsError = getErrorMethod ? getErrorMethod(extendQuery) : false;
  var extendedItemsData = itemsData.map(function (item) {
    var extendedItemData = Object(external_lodash_["first"])(extendedItems.filter(function (extendedItem) {
      return item.id === extendedItem.id;
    }));
    return _objectSpread(_objectSpread({}, item), extendedItemData);
  });
  var isRequesting = queriedTableData.isRequesting || isExtendedItemsRequesting;
  var isError = queriedTableData.isError || isExtendedItemsError;
  return _objectSpread(_objectSpread({}, queriedTableData), {}, {
    isRequesting: isRequesting,
    isError: isError,
    items: _objectSpread(_objectSpread({}, queriedTableData.items), {}, {
      data: extendedItemsData
    })
  });
}
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-table/index.js





var _excluded = ["getHeadersContent", "getRowsContent", "getSummary", "isRequesting", "primaryData", "tableData", "endpoint", "itemIdField", "tableQuery", "compareBy", "compareParam", "searchBy", "labels"],
  _excluded2 = ["updateUserPreferences"];

function report_table_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function report_table_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? report_table_ownKeys(Object(source), !0).forEach(function (key) { defineProperty_default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : report_table_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
/**
 * External dependencies
 */














/**
 * Internal dependencies
 */



var TABLE_FILTER = 'woocommerce_admin_report_table';
var report_table_ReportTable = function ReportTable(props) {
  var getHeadersContent = props.getHeadersContent,
    getRowsContent = props.getRowsContent,
    getSummary = props.getSummary,
    isRequesting = props.isRequesting,
    primaryData = props.primaryData,
    tableData = props.tableData,
    endpoint = props.endpoint,
    itemIdField = props.itemIdField,
    tableQuery = props.tableQuery,
    compareBy = props.compareBy,
    compareParam = props.compareParam,
    searchBy = props.searchBy,
    _props$labels = props.labels,
    labels = _props$labels === void 0 ? {} : _props$labels,
    tableProps = objectWithoutProperties_default()(props, _excluded);

  // Pull these props out separately because they need to be included in tableProps.
  var query = props.query,
    columnPrefsKey = props.columnPrefsKey;
  var items = tableData.items,
    reportQuery = tableData.query;
  var initialSelectedRows = query[compareParam] ? Object(external_wc_navigation_["getIdsFromQuery"])(query[compareBy]) : [];
  var _useState = Object(external_wp_element_["useState"])(initialSelectedRows),
    _useState2 = slicedToArray_default()(_useState, 2),
    selectedRows = _useState2[0],
    setSelectedRows = _useState2[1];
  var scrollPointRef = Object(external_wp_element_["useRef"])(null);
  var _useUserPreferences = Object(external_wc_data_["useUserPreferences"])(),
    updateUserPreferences = _useUserPreferences.updateUserPreferences,
    userData = objectWithoutProperties_default()(_useUserPreferences, _excluded2);

  // Bail early if we've encountered an error.
  var isError = tableData.isError || primaryData.isError;
  if (isError) {
    return Object(external_wp_element_["createElement"])(report_error, {
      isError: true
    });
  }
  var userPrefColumns = [];
  if (columnPrefsKey) {
    userPrefColumns = userData && userData[columnPrefsKey] ? userData[columnPrefsKey] : userPrefColumns;
  }
  var onPageChange = function onPageChange(newPage, source) {
    scrollPointRef.current.scrollIntoView();
    var tableElement = scrollPointRef.current.nextSibling.querySelector('.woocommerce-table__table');
    var focusableElements = external_wp_dom_["focus"].focusable.find(tableElement);
    if (focusableElements.length) {
      focusableElements[0].focus();
    }
  };
  var onSort = function onSort(key, direction) {
    Object(external_wc_navigation_["onQueryChange"])('sort')(key, direction);
    var eventProps = {
      report: endpoint,
      column: key,
      direction: direction
    };
  };
  var filterShownHeaders = function filterShownHeaders(headers, hiddenKeys) {
    // If no user preferences, set visibilty based on column default.
    if (!hiddenKeys) {
      return headers.map(function (header) {
        return report_table_objectSpread(report_table_objectSpread({}, header), {}, {
          visible: header.required || !header.hiddenByDefault
        });
      });
    }

    // Set visibilty based on user preferences.
    return headers.map(function (header) {
      return report_table_objectSpread(report_table_objectSpread({}, header), {}, {
        visible: header.required || !hiddenKeys.includes(header.key)
      });
    });
  };
  var applyTableFilters = function applyTableFilters(data, totals, totalResults) {
    var summary = getSummary ? getSummary(totals, totalResults) : null;

    /**
     * Filter report table for the CSV download.
     *
     * Enables manipulation of data used to create the report CSV.
     *
     * @param {Object} reportTableData - data used to create the table.
     * @param {string} reportTableData.endpoint - table api endpoint.
     * @param {Array} reportTableData.headers - table headers data.
     * @param {Array} reportTableData.rows - table rows data.
     * @param {Object} reportTableData.totals - total aggregates for request.
     * @param {Array} reportTableData.summary - summary numbers data.
     * @param {Object} reportTableData.items - response from api requerst.
     */
    return Object(external_wp_hooks_["applyFilters"])(TABLE_FILTER, {
      endpoint: endpoint,
      headers: getHeadersContent(),
      rows: getRowsContent(data),
      totals: totals,
      summary: summary,
      items: items
    });
  };
  var onClickDownload = function onClickDownload() {
    var createNotice = props.createNotice,
      startExport = props.startExport,
      title = props.title;
    var params = Object.assign({}, query);
    var data = items.data,
      totalResults = items.totalResults;
    var downloadType = 'browser';

    // Delete unnecessary items from filename.
    delete params.extended_info;
    if (params.search) {
      delete params[searchBy];
    }
    if (data && data.length === totalResults) {
      var _applyTableFilters = applyTableFilters(data, totalResults),
        _headers = _applyTableFilters.headers,
        _rows = _applyTableFilters.rows;
      Object(external_wc_csvExport_["downloadCSVFile"])(Object(external_wc_csvExport_["generateCSVFileName"])(title, params), Object(external_wc_csvExport_["generateCSVDataFromTable"])(_headers, _rows));
    } else {
      downloadType = 'email';
      startExport(endpoint, reportQuery).then(function () {
        return createNotice('success', Object(external_wp_i18n_["sprintf"])( /* translators: %s = type of report */
        Object(external_wp_i18n_["__"])('Your %s Report will be emailed to you.', 'woocommerce-admin'), title));
      }).catch(function (error) {
        return createNotice('error', error.message || Object(external_wp_i18n_["sprintf"])( /* translators: %s = type of report */
        Object(external_wp_i18n_["__"])('There was a problem exporting your %s Report. Please try again.', 'woocommerce-admin'), title));
      });
    }
  };
  var onCompare = function onCompare() {
    if (compareBy) {
      Object(external_wc_navigation_["onQueryChange"])('compare')(compareBy, compareParam, selectedRows.join(','));
    }
  };
  var onSearchChange = function onSearchChange(values) {
    var baseSearchQuery = props.baseSearchQuery;
    // A comma is used as a separator between search terms, so we want to escape
    // any comma they contain.
    var searchTerms = values.map(function (v) {
      return v.label.replace(',', '%2C');
    });
    if (searchTerms.length) {
      var _objectSpread2;
      Object(external_wc_navigation_["updateQueryString"])(report_table_objectSpread(report_table_objectSpread((_objectSpread2 = {
        filter: undefined
      }, defineProperty_default()(_objectSpread2, compareParam, undefined), defineProperty_default()(_objectSpread2, searchBy, undefined), _objectSpread2), baseSearchQuery), {}, {
        search: Object(external_lodash_["uniq"])(searchTerms).join(',')
      }));
    } else {
      Object(external_wc_navigation_["updateQueryString"])({
        search: undefined
      });
    }
  };
  var selectAllRows = function selectAllRows(checked) {
    var ids = props.ids;
    setSelectedRows(checked ? ids : []);
  };
  var selectRow = function selectRow(i, checked) {
    var ids = props.ids;
    if (checked) {
      setSelectedRows(Object(external_lodash_["uniq"])([ids[i]].concat(toConsumableArray_default()(selectedRows))));
    } else {
      var index = selectedRows.indexOf(ids[i]);
      setSelectedRows([].concat(toConsumableArray_default()(selectedRows.slice(0, index)), toConsumableArray_default()(selectedRows.slice(index + 1))));
    }
  };
  var getCheckbox = function getCheckbox(i) {
    var _props$ids = props.ids,
      ids = _props$ids === void 0 ? [] : _props$ids;
    var isChecked = selectedRows.indexOf(ids[i]) !== -1;
    return {
      display: Object(external_wp_element_["createElement"])(external_wp_components_["CheckboxControl"], {
        onChange: Object(external_lodash_["partial"])(selectRow, i),
        checked: isChecked
      }),
      value: false
    };
  };
  var getAllCheckbox = function getAllCheckbox() {
    var _props$ids2 = props.ids,
      ids = _props$ids2 === void 0 ? [] : _props$ids2;
    var hasData = ids.length > 0;
    var isAllChecked = hasData && ids.length === selectedRows.length;
    return {
      cellClassName: 'is-checkbox-column',
      key: 'compare',
      label: Object(external_wp_element_["createElement"])(external_wp_components_["CheckboxControl"], {
        onChange: selectAllRows,
        "aria-label": Object(external_wp_i18n_["__"])('Select All'),
        checked: isAllChecked,
        disabled: !hasData
      }),
      required: true
    };
  };
  var isLoading = isRequesting || tableData.isRequesting || primaryData.isRequesting;
  var totals = Object(external_lodash_["get"])(primaryData, ['data', 'totals'], {});
  var totalResults = items.totalResults || 0;
  var downloadable = totalResults > 0;
  // Search words are in the query string, not the table query.
  var searchWords = Object(external_wc_navigation_["getSearchWords"])(query);
  var searchedLabels = searchWords.map(function (v) {
    return {
      key: v,
      label: v
    };
  });
  var data = items.data;
  var applyTableFiltersResult = applyTableFilters(data, totals, totalResults);
  var headers = applyTableFiltersResult.headers,
    rows = applyTableFiltersResult.rows;
  var summary = applyTableFiltersResult.summary;
  var onColumnsChange = function onColumnsChange(shownColumns, toggledColumn) {
    var columns = headers.map(function (header) {
      return header.key;
    });
    var hiddenColumns = columns.filter(function (column) {
      return !shownColumns.includes(column);
    });
    if (columnPrefsKey) {
      var userDataFields = defineProperty_default()({}, columnPrefsKey, hiddenColumns);
      updateUserPreferences(userDataFields);
    }
  };

  // Add in selection for comparisons.
  if (compareBy) {
    rows = rows.map(function (row, i) {
      return [getCheckbox(i)].concat(toConsumableArray_default()(row));
    });
    headers = [getAllCheckbox()].concat(toConsumableArray_default()(headers));
  }

  // Hide any headers based on user prefs, if loaded.
  var filteredHeaders = filterShownHeaders(headers, userPrefColumns);
  return Object(external_wp_element_["createElement"])(external_wp_element_["Fragment"], null, Object(external_wp_element_["createElement"])("div", {
    className: "woocommerce-report-table__scroll-point",
    ref: scrollPointRef,
    "aria-hidden": true
  }), Object(external_wp_element_["createElement"])(external_wc_components_["TableCard"], extends_default()({
    className: ('woocommerce-report-table', 'woocommerce-report-table-' + endpoint.replace('/', '-')),
    hasSearch: !!searchBy,
    actions: [compareBy && Object(external_wp_element_["createElement"])(external_wc_components_["CompareButton"], {
      key: "compare",
      className: "woocommerce-table__compare",
      count: selectedRows.length,
      helpText: labels.helpText || Object(external_wp_i18n_["__"])('Check at least two items below to compare', 'woocommerce-admin'),
      onClick: onCompare,
      disabled: !downloadable
    }, labels.compareButton || Object(external_wp_i18n_["__"])('Compare', 'woocommerce-admin')), searchBy && Object(external_wp_element_["createElement"])(external_wc_components_["Search"], {
      allowFreeTextSearch: true,
      inlineTags: true,
      key: "search",
      onChange: onSearchChange,
      placeholder: labels.placeholder || Object(external_wp_i18n_["__"])('Search by item name', 'woocommerce-admin'),
      selected: searchedLabels,
      showClearButton: true,
      type: searchBy,
      disabled: !downloadable
    }), downloadable && Object(external_wp_element_["createElement"])(external_wp_components_["Button"], {
      key: "download",
      className: "woocommerce-table__download-button",
      disabled: isLoading,
      onClick: onClickDownload
    }, Object(external_wp_element_["createElement"])(download_icon, null), Object(external_wp_element_["createElement"])("span", {
      className: "woocommerce-table__download-button__label"
    }, labels.downloadButton || Object(external_wp_i18n_["__"])('Download', 'woocommerce-admin')))],
    headers: filteredHeaders,
    isLoading: isLoading,
    onQueryChange: external_wc_navigation_["onQueryChange"],
    onColumnsChange: onColumnsChange,
    onSort: onSort,
    onPageChange: onPageChange,
    rows: rows,
    rowsPerPage: parseInt(reportQuery.per_page, 10) || external_wc_data_["QUERY_DEFAULTS"].pageSize,
    summary: summary,
    totalRows: totalResults
  }, tableProps)));
};
report_table_ReportTable.propTypes = {
  /**
   * Pass in query parameters to be included in the path when onSearch creates a new url.
   */
  baseSearchQuery: prop_types_default.a.object,
  /**
   * The string to use as a query parameter when comparing row items.
   */
  compareBy: prop_types_default.a.string,
  /**
   * Url query parameter compare function operates on
   */
  compareParam: prop_types_default.a.string,
  /**
   * The key for user preferences settings for column visibility.
   */
  columnPrefsKey: prop_types_default.a.string,
  /**
   * The endpoint to use in API calls to populate the table rows and summary.
   * For example, if `taxes` is provided, data will be fetched from the report
   * `taxes` endpoint (ie: `/wc-analytics/reports/taxes` and `/wc/v4/reports/taxes/stats`).
   * If the provided endpoint doesn't exist, an error will be shown to the user
   * with `ReportError`.
   */
  endpoint: prop_types_default.a.string,
  /**
   * A function that returns the headers object to build the table.
   */
  getHeadersContent: prop_types_default.a.func.isRequired,
  /**
   * A function that returns the rows array to build the table.
   */
  getRowsContent: prop_types_default.a.func.isRequired,
  /**
   * A function that returns the summary object to build the table.
   */
  getSummary: prop_types_default.a.func,
  /**
   * The name of the property in the item object which contains the id.
   */
  itemIdField: prop_types_default.a.string,
  /**
   * Custom labels for table header actions.
   */
  labels: prop_types_default.a.shape({
    compareButton: prop_types_default.a.string,
    downloadButton: prop_types_default.a.string,
    helpText: prop_types_default.a.string,
    placeholder: prop_types_default.a.string
  }),
  /**
   * Primary data of that report. If it's not provided, it will be automatically
   * loaded via the provided `endpoint`.
   */
  primaryData: prop_types_default.a.object,
  /**
   * The string to use as a query parameter when searching row items.
   */
  searchBy: prop_types_default.a.string,
  /**
   * List of fields used for summary numbers. (Reduces queries)
   */
  summaryFields: prop_types_default.a.arrayOf(prop_types_default.a.string),
  /**
   * Table data of that report. If it's not provided, it will be automatically
   * loaded via the provided `endpoint`.
   */
  tableData: prop_types_default.a.object.isRequired,
  /**
   * Properties to be added to the query sent to the report table endpoint.
   */
  tableQuery: prop_types_default.a.object,
  /**
   * String to display as the title of the table.
   */
  title: prop_types_default.a.string.isRequired
};
report_table_ReportTable.defaultProps = {
  primaryData: {},
  tableData: {
    items: {
      data: [],
      totalResults: 0
    },
    query: {}
  },
  tableQuery: {},
  compareParam: 'filter',
  downloadable: false,
  onSearch: external_lodash_["noop"],
  baseSearchQuery: {}
};
var EMPTY_ARRAY = [];
var EMPTY_OBJECT = {};
/* harmony default export */ var report_table = (Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select, props) {
  var endpoint = props.endpoint,
    getSummary = props.getSummary,
    isRequesting = props.isRequesting,
    itemIdField = props.itemIdField,
    query = props.query,
    tableData = props.tableData,
    tableQuery = props.tableQuery,
    filters = props.filters,
    advancedFilters = props.advancedFilters,
    summaryFields = props.summaryFields,
    extendedItemsStoreName = props.extendedItemsStoreName;
  var _select$getSetting = select(external_wc_data_["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
    defaultDateRange = _select$getSetting.woocommerce_default_date_range;
  if (isRequesting) {
    return EMPTY_OBJECT;
  }

  /* eslint @wordpress/no-unused-vars-before-return: "off" */
  var reportStoreSelector = select(external_wc_data_["REPORTS_STORE_NAME"]);
  var extendedStoreSelector = extendedItemsStoreName ? select(extendedItemsStoreName) : null;
  var primaryData = getSummary ? Object(external_wc_data_["getReportChartData"])({
    endpoint: endpoint,
    dataType: 'primary',
    query: query,
    // Hint: Leave this param for backwards compatibility WC-Admin lt 2.6.
    select: select,
    selector: reportStoreSelector,
    filters: filters,
    advancedFilters: advancedFilters,
    defaultDateRange: defaultDateRange,
    fields: summaryFields
  }) : EMPTY_OBJECT;
  var queriedTableData = tableData || Object(external_wc_data_["getReportTableData"])({
    endpoint: endpoint,
    query: query,
    // Hint: Leave this param for backwards compatibility WC-Admin lt 2.6.
    select: select,
    selector: reportStoreSelector,
    tableQuery: tableQuery,
    filters: filters,
    advancedFilters: advancedFilters,
    defaultDateRange: defaultDateRange
  });
  return {
    primaryData: primaryData,
    tableData: queriedTableData,
    query: query
  };
}), Object(external_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch(external_wc_data_["EXPORT_STORE_NAME"]),
    startExport = _dispatch.startExport;
  var _dispatch2 = dispatch('core/notices'),
    createNotice = _dispatch2.createNotice;
  return {
    createNotice: createNotice,
    startExport: startExport
  };
}))(report_table_ReportTable));
// EXTERNAL MODULE: external ["wc","currency"]
var external_wc_currency_ = __webpack_require__(25);
var external_wc_currency_default = /*#__PURE__*/__webpack_require__.n(external_wc_currency_);

// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/lib/currency-context.js
/**
 * External dependencies
 */




/**
 * Internal dependencies
 */

var appCurrency = external_wc_currency_default()(external_wc_wcSettings_["CURRENCY"]);
var currency_context_getFilteredCurrencyInstance = function getFilteredCurrencyInstance(query) {
  var config = appCurrency.getCurrencyConfig();
  var filteredConfig = Object(external_wp_hooks_["applyFilters"])('woocommerce_admin_report_currency', config, query);
  return external_wc_currency_default()(filteredConfig);
};
var CurrencyContext = Object(external_wp_element_["createContext"])(appCurrency // default value
);
// CONCATENATED MODULE: ./resources/js/admin/analytics/report/revenue/table.js







function table_createSuper(Derived) { var hasNativeReflectConstruct = table_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }
function table_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
/**
 * External dependencies.
 */













/**
 * SomewhereWarm dependencies.
 */



/**
 * Internal dependencies.
 */

var table_RevenueReportTable = /*#__PURE__*/function (_Component) {
  inherits_default()(RevenueReportTable, _Component);
  var _super = table_createSuper(RevenueReportTable);
  function RevenueReportTable() {
    var _this;
    classCallCheck_default()(this, RevenueReportTable);
    _this = _super.call(this);
    _this.getHeadersContent = _this.getHeadersContent.bind(assertThisInitialized_default()(_this));
    _this.getRowsContent = _this.getRowsContent.bind(assertThisInitialized_default()(_this));
    _this.getSummary = _this.getSummary.bind(assertThisInitialized_default()(_this));
    return _this;
  }
  createClass_default()(RevenueReportTable, [{
    key: "getHeadersContent",
    value: function getHeadersContent() {
      return [{
        label: Object(external_wp_i18n_["__"])('Date', 'woocommerce-product-recommendations'),
        key: 'date',
        required: true,
        isLeftAligned: true,
        isSortable: false
      }, {
        label: Object(external_wp_i18n_["__"])('Items sold', 'woocommerce-product-recommendations'),
        key: 'items_sold',
        isSortable: true,
        isNumeric: true
      }, {
        label: Object(external_wp_i18n_["__"])('Gross sales', 'woocommerce-product-recommendations'),
        key: 'gross_sales',
        defaultSort: true,
        isSortable: true,
        isNumeric: true
      }, {
        label: Object(external_wp_i18n_["__"])('Net sales', 'woocommerce-product-recommendations'),
        key: 'net_sales',
        isSortable: true,
        isNumeric: true
      }, {
        label: Object(external_wp_i18n_["__"])('Orders', 'woocommerce-product-recommendations'),
        key: 'orders_count',
        isSortable: true,
        isNumeric: true
      }, {
        label: Object(external_wp_i18n_["__"])('Products', 'woocommerce-product-recommendations'),
        key: 'products_count',
        isSortable: true,
        isNumeric: true
      }].filter(Boolean);
    }
  }, {
    key: "getRowsContent",
    value: function getRowsContent() {
      var data = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
      var query = this.props.query;
      var persistedQuery = Object(external_wc_navigation_["getPersistedQuery"])(query);
      var admin = Object(external_wc_wcSettings_["getSetting"])('admin', {});
      var dateFormat = admin.dateFormat ? admin.dateFormat : external_wc_date_["defaultTableDateFormat"];
      var _this$context = this.context,
        renderCurrency = _this$context.render,
        getCurrencyFormatDecimal = _this$context.formatDecimal,
        getCurrencyConfig = _this$context.getCurrencyConfig;
      var currency = getCurrencyConfig();
      return data.map(function (row) {
        var _row$subtotals = row.subtotals,
          grossSales = _row$subtotals.gross_sales,
          netSales = _row$subtotals.net_sales,
          itemsSold = _row$subtotals.items_sold,
          ordersCount = _row$subtotals.orders_count,
          productsCount = _row$subtotals.products_count;
        return [{
          display: Object(external_wp_element_["createElement"])(external_wc_components_["Date"], {
            date: row.date_start,
            visibleFormat: dateFormat
          }),
          value: row.date_start
        }, {
          display: Object(external_wc_number_["formatValue"])(currency, 'number', itemsSold),
          // ? itemsSold : '0',
          value: Number(itemsSold)
        }, {
          display: renderCurrency(grossSales),
          value: getCurrencyFormatDecimal(grossSales)
        }, {
          display: renderCurrency(netSales),
          value: getCurrencyFormatDecimal(netSales)
        }, {
          display: Object(external_wc_number_["formatValue"])(currency, 'number', ordersCount),
          value: Number(ordersCount)
        }, {
          display: Object(external_wc_number_["formatValue"])(currency, 'number', productsCount),
          value: Number(productsCount)
        }];
      });
    }
  }, {
    key: "getSummary",
    value: function getSummary(totals) {
      var _totals$orders_count = totals.orders_count,
        ordersCount = _totals$orders_count === void 0 ? 0 : _totals$orders_count,
        _totals$products_coun = totals.products_count,
        productsCount = _totals$products_coun === void 0 ? 0 : _totals$products_coun,
        _totals$items_sold = totals.items_sold,
        itemsSold = _totals$items_sold === void 0 ? 0 : _totals$items_sold,
        _totals$net_sales = totals.net_sales,
        netSales = _totals$net_sales === void 0 ? 0 : _totals$net_sales,
        _totals$gross_sales = totals.gross_sales,
        grossSales = _totals$gross_sales === void 0 ? 0 : _totals$gross_sales;
      var _this$context2 = this.context,
        formatAmount = _this$context2.formatAmount,
        getCurrencyConfig = _this$context2.getCurrencyConfig;
      var currency = getCurrencyConfig();
      return [{
        label: Object(external_wp_i18n_["_n"])('item sold', 'items sold', itemsSold, 'woocommerce-product-recommendations'),
        value: Object(external_wc_number_["formatValue"])(currency, 'number', itemsSold)
      }, {
        label: Object(external_wp_i18n_["__"])('gross', 'woocommerce-product-recommendations'),
        value: formatAmount(grossSales)
      }, {
        label: Object(external_wp_i18n_["__"])('net', 'woocommerce-product-recommendations'),
        value: formatAmount(netSales)
      }, {
        label: Object(external_wp_i18n_["_n"])('product', 'products', productsCount, 'woocommerce-product-recommendations'),
        value: Object(external_wc_number_["formatValue"])(currency, 'number', productsCount)
      }, {
        label: Object(external_wp_i18n_["_n"])('order', 'orders', ordersCount, 'woocommerce-product-recommendations'),
        value: Object(external_wc_number_["formatValue"])(currency, 'number', ordersCount)
      }];
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
        filters = _this$props.filters,
        advancedFilters = _this$props.advancedFilters,
        isRequesting = _this$props.isRequesting,
        hideCompare = _this$props.hideCompare,
        query = _this$props.query,
        tableData = _this$props.tableData,
        endpoint = _this$props.endpoint;
      return Object(external_wp_element_["createElement"])(report_table, {
        endpoint: endpoint,
        getHeadersContent: this.getHeadersContent,
        getRowsContent: this.getRowsContent,
        getSummary: this.getSummary,
        summaryFields: ['orders_count', 'products_count', 'items_sold', 'net_sales', 'gross_sales'],
        isRequesting: isRequesting,
        query: query,
        tableData: tableData,
        columnPrefsKey: "prl_revenue_report_columns",
        compareBy: hideCompare ? undefined : 'recommendations',
        title: Object(external_wp_i18n_["__"])('Revenue', 'woocommerce-product-recommendations'),
        filters: filters,
        advancedFilters: advancedFilters
      });
    }
  }]);
  return RevenueReportTable;
}(external_wp_element_["Component"]);
table_RevenueReportTable.contextType = CurrencyContext;
var table_EMPTY_ARRAY = [];
var table_EMPTY_OBJECT = {};

/**
 * Memoized props object formatting function.
 *
 * @param {boolean} isError
 * @param {boolean} isRequesting
 * @param {Object}  tableQuery
 * @param {Object}  revenueData
 * @return {Object} formatted tableData prop
 */
var table_formatProps = function formatProps(isError, isRequesting, tableQuery, revenueData) {
  return {
    tableData: {
      items: {
        data: Object(external_lodash_["get"])(revenueData, ['data', 'intervals'], table_EMPTY_ARRAY),
        totalResults: Object(external_lodash_["get"])(revenueData, ['totalResults'], 0)
      },
      isError: isError,
      isRequesting: isRequesting,
      query: tableQuery
    }
  };
};

/**
 * Memoized table query formatting function.
 *
 * @param {string} order
 * @param {string} orderBy
 * @param {number} page
 * @param {number} pageSize
 * @param {Object} datesFromQuery
 * @return {Object} formatted tableQuery object
 */
var formatTableQuery = Object(external_lodash_["memoize"])(
// @todo Support hour here when viewing a single day
function (order, orderBy, page, pageSize, datesFromQuery) {
  return {
    interval: 'day',
    orderby: orderBy,
    order: order,
    page: page,
    per_page: pageSize,
    after: Object(external_wc_date_["appendTimestamp"])(datesFromQuery.primary.after, 'start'),
    before: Object(external_wc_date_["appendTimestamp"])(datesFromQuery.primary.before, 'end')
  };
}, function (order, orderBy, page, pageSize, datesFromQuery) {
  return [order, orderBy, page, pageSize, datesFromQuery.primary.after, datesFromQuery.primary.before].join(':');
});
/* harmony default export */ var table = (Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select, props) {
  var query = props.query,
    filters = props.filters,
    advancedFilters = props.advancedFilters;
  var _select$getSetting = select(external_wc_data_["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
    defaultDateRange = _select$getSetting.woocommerce_default_date_range;
  var datesFromQuery = Object(external_wc_date_["getCurrentDates"])(query, defaultDateRange);
  var _select = select(external_wc_data_["REPORTS_STORE_NAME"]),
    getReportStats = _select.getReportStats,
    getReportStatsError = _select.getReportStatsError,
    isResolving = _select.isResolving;
  var tableQuery = formatTableQuery(query.order || 'desc', query.orderby || 'date', query.paged || 1, query.per_page || external_wc_data_["QUERY_DEFAULTS"].pageSize, datesFromQuery);
  var filteredTableQuery = Object(external_wc_data_["getReportTableQuery"])({
    endpoint: ENDPOINT,
    query: query,
    select: select,
    tableQuery: tableQuery,
    filters: filters,
    advancedFilters: advancedFilters
  });
  var revenueData = getReportStats(ENDPOINT, filteredTableQuery);
  var isError = Boolean(getReportStatsError(ENDPOINT, filteredTableQuery));
  var isRequesting = isResolving('getReportStats', [ENDPOINT, filteredTableQuery]);
  return table_formatProps(isError, isRequesting, tableQuery, revenueData);
}))(table_RevenueReportTable));
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-summary/index.js






function report_summary_createSuper(Derived) { var hasNativeReflectConstruct = report_summary_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }
function report_summary_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
/**
 * External dependencies
 */






/**
 * WooCommerce dependencies
 */






/**
 * Internal dependencies
 */
// import ReportError from '../report-error';


/**
 * Component to render summary numbers in reports.
 */
var report_summary_ReportSummary = /*#__PURE__*/function (_Component) {
  inherits_default()(ReportSummary, _Component);
  var _super = report_summary_createSuper(ReportSummary);
  function ReportSummary() {
    classCallCheck_default()(this, ReportSummary);
    return _super.apply(this, arguments);
  }
  createClass_default()(ReportSummary, [{
    key: "formatVal",
    value: function formatVal(val, type) {
      var _this$context = this.context,
        formatAmount = _this$context.formatAmount,
        getCurrencyConfig = _this$context.getCurrencyConfig;
      return type === 'currency' ? formatAmount(val) : Object(external_wc_number_["formatValue"])(getCurrencyConfig(), type, val);
    }
  }, {
    key: "getValues",
    value: function getValues(key, type) {
      var _this$props = this.props,
        emptySearchResults = _this$props.emptySearchResults,
        summaryData = _this$props.summaryData;
      var totals = summaryData.totals;
      var primaryTotal = totals.primary ? totals.primary[key] : 0;
      var secondaryTotal = totals.secondary ? totals.secondary[key] : 0;
      var primaryValue = emptySearchResults ? 0 : primaryTotal;
      var secondaryValue = emptySearchResults ? 0 : secondaryTotal;
      return {
        delta: Object(external_wc_number_["calculateDelta"])(primaryValue, secondaryValue),
        prevValue: this.formatVal(secondaryValue, type),
        value: this.formatVal(primaryValue, type)
      };
    }
  }, {
    key: "render",
    value: function render() {
      var _this = this;
      var _this$props2 = this.props,
        charts = _this$props2.charts,
        query = _this$props2.query,
        selectedChart = _this$props2.selectedChart,
        summaryData = _this$props2.summaryData,
        endpoint = _this$props2.endpoint,
        report = _this$props2.report,
        defaultDateRange = _this$props2.defaultDateRange;
      var isError = summaryData.isError,
        isRequesting = summaryData.isRequesting;
      if (isError) {
        // return <ReportError isError />;
        return;
      }
      if (isRequesting) {
        return Object(external_wp_element_["createElement"])(external_wc_components_["SummaryListPlaceholder"], {
          numberOfItems: charts.length
        });
      }
      var _getDateParamsFromQue = Object(external_wc_date_["getDateParamsFromQuery"])(query, defaultDateRange),
        compare = _getDateParamsFromQue.compare;
      var renderSummaryNumbers = function renderSummaryNumbers(_ref) {
        var onToggle = _ref.onToggle;
        return charts.map(function (chart) {
          var key = chart.key,
            order = chart.order,
            orderby = chart.orderby,
            label = chart.label,
            type = chart.type;
          var newPath = {
            chart: key
          };
          if (orderby) {
            newPath.orderby = orderby;
          }
          if (order) {
            newPath.order = order;
          }
          var href = Object(external_wc_navigation_["getNewPath"])(newPath);
          var isSelected = selectedChart.key === key;
          var _this$getValues = _this.getValues(key, type),
            delta = _this$getValues.delta,
            prevValue = _this$getValues.prevValue,
            value = _this$getValues.value;
          return Object(external_wp_element_["createElement"])(external_wc_components_["SummaryNumber"], {
            key: key,
            delta: delta,
            href: href,
            label: label,
            prevLabel: compare === 'previous_period' ? Object(external_wp_i18n_["__"])('Previous Period:', 'woocommerce-product-bundles') : Object(external_wp_i18n_["__"])('Previous Year:', 'woocommerce-product-bundles'),
            prevValue: prevValue,
            selected: isSelected,
            value: value,
            onLinkClickCallback: function onLinkClickCallback() {
              // Wider than a certain breakpoint, there is no dropdown so avoid calling onToggle.
              if (onToggle) {
                onToggle();
              }
            }
          });
        });
      };
      return Object(external_wp_element_["createElement"])(external_wc_components_["SummaryList"], null, renderSummaryNumbers);
    }
  }]);
  return ReportSummary;
}(external_wp_element_["Component"]);
report_summary_ReportSummary.propTypes = {
  /**
   * Properties of all the charts available for that report.
   */
  charts: prop_types_default.a.array.isRequired,
  /**
   * The endpoint to use in API calls to populate the Summary Numbers.
   * For example, if `taxes` is provided, data will be fetched from the report
   * `taxes` endpoint (ie: `/wc-analytics/reports/taxes/stats`). If the provided endpoint
   * doesn't exist, an error will be shown to the user with `ReportError`.
   */
  endpoint: prop_types_default.a.string.isRequired,
  /**
   * The query string represented in object form.
   */
  query: prop_types_default.a.object.isRequired,
  /**
   * Properties of the selected chart.
   */
  selectedChart: prop_types_default.a.shape({
    /**
     * Key of the selected chart.
     */
    key: prop_types_default.a.string.isRequired,
    /**
     * Chart label.
     */
    label: prop_types_default.a.string.isRequired,
    /**
     * Order query argument.
     */
    order: prop_types_default.a.oneOf(['asc', 'desc']),
    /**
     * Order by query argument.
     */
    orderby: prop_types_default.a.string,
    /**
     * Number type for formatting.
     */
    type: prop_types_default.a.oneOf(['average', 'number', 'currency']).isRequired
  }).isRequired,
  /**
   * Data to display in the SummaryNumbers.
   */
  summaryData: prop_types_default.a.object,
  /**
   * Report name, if different than the endpoint.
   */
  report: prop_types_default.a.string
};
report_summary_ReportSummary.defaultProps = {
  summaryData: {
    totals: {
      primary: {},
      secondary: {}
    },
    isError: false
  }
};
report_summary_ReportSummary.contextType = CurrencyContext;
/* harmony default export */ var report_summary = (Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select, props) {
  var charts = props.charts,
    endpoint = props.endpoint,
    limitProperties = props.limitProperties,
    query = props.query,
    filters = props.filters,
    advancedFilters = props.advancedFilters;
  var limitBy = limitProperties || [endpoint];
  var hasLimitByParam = limitBy.some(function (item) {
    return query[item] && query[item].length;
  });
  if (query.search && !hasLimitByParam) {
    return {
      emptySearchResults: true
    };
  }
  var fields = charts && charts.map(function (chart) {
    return chart.key;
  });
  var _select$getSetting = select(external_wc_data_["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
    defaultDateRange = _select$getSetting.woocommerce_default_date_range;
  var summaryData = Object(external_wc_data_["getSummaryNumbers"])({
    endpoint: endpoint,
    query: query,
    select: select,
    limitBy: limitBy,
    filters: filters,
    advancedFilters: advancedFilters,
    defaultDateRange: defaultDateRange,
    fields: fields
  });
  return {
    summaryData: summaryData,
    defaultDateRange: defaultDateRange
  };
}))(report_summary_ReportSummary));
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-chart/utils.js
/**
 * External dependencies
 */


var DEFAULT_FILTER = 'all';
function getSelectedFilter(filters, query) {
  var selectedFilterArgs = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
  if (!filters || filters.length === 0) {
    return null;
  }
  var clonedFilters = filters.slice(0);
  var filterConfig = clonedFilters.pop();
  if (filterConfig.showFilters(query, selectedFilterArgs)) {
    var allFilters = Object(external_wc_navigation_["flattenFilters"])(filterConfig.filters);
    var value = query[filterConfig.param] || filterConfig.defaultValue || DEFAULT_FILTER;
    return Object(external_lodash_["find"])(allFilters, {
      value: value
    });
  }
  return getSelectedFilter(clonedFilters, query, selectedFilterArgs);
}
function getChartMode(selectedFilter, query) {
  if (selectedFilter && query) {
    var selectedFilterParam = Object(external_lodash_["get"])(selectedFilter, ['settings', 'param']);
    if (!selectedFilterParam || Object.keys(query).includes(selectedFilterParam)) {
      return Object(external_lodash_["get"])(selectedFilter, ['chartMode']);
    }
  }
  return null;
}
// CONCATENATED MODULE: ./node_modules/@somewherewarm/woocommerce/packages/components/report-chart/index.js







function report_chart_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function report_chart_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? report_chart_ownKeys(Object(source), !0).forEach(function (key) { defineProperty_default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : report_chart_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function report_chart_createSuper(Derived) { var hasNativeReflectConstruct = report_chart_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }
function report_chart_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
/**
 * External dependencies
 */








/**
 * WooCommerce dependencies
 */




/**
 * Internal dependencies
 */




/**
 * Component that renders the chart in reports.
 */
var report_chart_ReportChart = /*#__PURE__*/function (_Component) {
  inherits_default()(ReportChart, _Component);
  var _super = report_chart_createSuper(ReportChart);
  function ReportChart() {
    classCallCheck_default()(this, ReportChart);
    return _super.apply(this, arguments);
  }
  createClass_default()(ReportChart, [{
    key: "shouldComponentUpdate",
    value: function shouldComponentUpdate(nextProps) {
      if (nextProps.isRequesting !== this.props.isRequesting || nextProps.primaryData.isRequesting !== this.props.primaryData.isRequesting || nextProps.secondaryData.isRequesting !== this.props.secondaryData.isRequesting || !Object(external_lodash_["isEqual"])(nextProps.query, this.props.query)) {
        return true;
      }
      return false;
    }
  }, {
    key: "getItemChartData",
    value: function getItemChartData() {
      var _this$props = this.props,
        primaryData = _this$props.primaryData,
        selectedChart = _this$props.selectedChart;
      var chartData = primaryData.data.intervals.map(function (interval) {
        var intervalData = {};
        interval.subtotals.segments.forEach(function (segment) {
          if (segment.segment_label) {
            var label = intervalData[segment.segment_label] ? segment.segment_label + ' (#' + segment.segment_id + ')' : segment.segment_label;
            intervalData[segment.segment_id] = {
              label: label,
              value: segment.subtotals[selectedChart.key] || 0
            };
          }
        });
        return report_chart_objectSpread({
          date: Object(external_wp_date_["format"])('Y-m-d\\TH:i:s', interval.date_start)
        }, intervalData);
      });
      return chartData;
    }
  }, {
    key: "getTimeChartData",
    value: function getTimeChartData() {
      var _this$props2 = this.props,
        query = _this$props2.query,
        primaryData = _this$props2.primaryData,
        secondaryData = _this$props2.secondaryData,
        selectedChart = _this$props2.selectedChart,
        defaultDateRange = _this$props2.defaultDateRange;
      var currentInterval = Object(external_wc_date_["getIntervalForQuery"])(query);
      var _getCurrentDates = Object(external_wc_date_["getCurrentDates"])(query, defaultDateRange),
        primary = _getCurrentDates.primary,
        secondary = _getCurrentDates.secondary;
      var chartData = primaryData.data.intervals.map(function (interval, index) {
        var secondaryDate = Object(external_wc_date_["getPreviousDate"])(interval.date_start, primary.after, secondary.after, query.compare, currentInterval);
        var secondaryInterval = secondaryData.data.intervals[index];
        return {
          date: Object(external_wp_date_["format"])('Y-m-d\\TH:i:s', interval.date_start),
          primary: {
            label: "".concat(primary.label, " (").concat(primary.range, ")"),
            labelDate: interval.date_start,
            value: interval.subtotals[selectedChart.key] || 0
          },
          secondary: {
            label: "".concat(secondary.label, " (").concat(secondary.range, ")"),
            labelDate: secondaryDate.format('YYYY-MM-DD HH:mm:ss'),
            value: secondaryInterval && secondaryInterval.subtotals[selectedChart.key] || 0
          }
        };
      });
      return chartData;
    }
  }, {
    key: "getTimeChartTotals",
    value: function getTimeChartTotals() {
      var _this$props3 = this.props,
        primaryData = _this$props3.primaryData,
        secondaryData = _this$props3.secondaryData,
        selectedChart = _this$props3.selectedChart;
      return {
        primary: Object(external_lodash_["get"])(primaryData, ['data', 'totals', selectedChart.key], null),
        secondary: Object(external_lodash_["get"])(secondaryData, ['data', 'totals', selectedChart.key], null)
      };
    }
  }, {
    key: "renderChart",
    value: function renderChart(mode, isRequesting, chartData, legendTotals) {
      var _this$props4 = this.props,
        emptySearchResults = _this$props4.emptySearchResults,
        filterParam = _this$props4.filterParam,
        interactiveLegend = _this$props4.interactiveLegend,
        itemsLabel = _this$props4.itemsLabel,
        legendPosition = _this$props4.legendPosition,
        path = _this$props4.path,
        query = _this$props4.query,
        selectedChart = _this$props4.selectedChart,
        showHeaderControls = _this$props4.showHeaderControls,
        primaryData = _this$props4.primaryData;
      var currentInterval = Object(external_wc_date_["getIntervalForQuery"])(query);
      var allowedIntervals = Object(external_wc_date_["getAllowedIntervalsForQuery"])(query);
      var formats = Object(external_wc_date_["getDateFormatsForInterval"])(currentInterval, primaryData.data.intervals.length);
      var emptyMessage = emptySearchResults ? Object(external_wp_i18n_["__"])('No data for the current search', 'woocommerce-admin') : Object(external_wp_i18n_["__"])('No data for the selected date range', 'woocommerce-admin');
      var _this$context = this.context,
        formatAmount = _this$context.formatAmount,
        getCurrencyConfig = _this$context.getCurrencyConfig;
      return Object(external_wp_element_["createElement"])(external_wc_components_["Chart"], {
        allowedIntervals: allowedIntervals,
        data: chartData,
        dateParser: '%Y-%m-%dT%H:%M:%S',
        emptyMessage: emptyMessage,
        filterParam: filterParam,
        interactiveLegend: interactiveLegend,
        interval: currentInterval,
        isRequesting: isRequesting,
        itemsLabel: itemsLabel,
        legendPosition: legendPosition,
        legendTotals: legendTotals,
        mode: mode,
        path: path,
        query: query,
        screenReaderFormat: formats.screenReaderFormat,
        showHeaderControls: showHeaderControls,
        title: selectedChart.label,
        tooltipLabelFormat: formats.tooltipLabelFormat,
        tooltipTitle: mode === 'time-comparison' && selectedChart.label || null,
        tooltipValueFormat: Object(external_wc_data_["getTooltipValueFormat"])(selectedChart.type, formatAmount),
        chartType: Object(external_wc_date_["getChartTypeForQuery"])(query),
        valueType: selectedChart.type,
        xFormat: formats.xFormat,
        x2Format: formats.x2Format,
        currency: getCurrencyConfig()
      });
    }
  }, {
    key: "renderItemComparison",
    value: function renderItemComparison() {
      var _this$props5 = this.props,
        isRequesting = _this$props5.isRequesting,
        primaryData = _this$props5.primaryData;
      if (primaryData.isError) {
        return Object(external_wp_element_["createElement"])(report_error, {
          isError: true
        });
      }
      var isChartRequesting = isRequesting || primaryData.isRequesting;
      var chartData = this.getItemChartData();
      return this.renderChart('item-comparison', isChartRequesting, chartData);
    }
  }, {
    key: "renderTimeComparison",
    value: function renderTimeComparison() {
      var _this$props6 = this.props,
        isRequesting = _this$props6.isRequesting,
        primaryData = _this$props6.primaryData,
        secondaryData = _this$props6.secondaryData;
      if (!primaryData || primaryData.isError || secondaryData.isError) {
        return Object(external_wp_element_["createElement"])(report_error, {
          isError: true
        });
      }
      var isChartRequesting = isRequesting || primaryData.isRequesting || secondaryData.isRequesting;
      var chartData = this.getTimeChartData();
      var legendTotals = this.getTimeChartTotals();
      return this.renderChart('time-comparison', isChartRequesting, chartData, legendTotals);
    }
  }, {
    key: "render",
    value: function render() {
      var mode = this.props.mode;
      if (mode === 'item-comparison') {
        return this.renderItemComparison();
      }
      return this.renderTimeComparison();
    }
  }]);
  return ReportChart;
}(external_wp_element_["Component"]);
report_chart_ReportChart.contextType = CurrencyContext;
report_chart_ReportChart.propTypes = {
  /**
   * Filters available for that report.
   */
  filters: prop_types_default.a.array,
  /**
   * Whether there is an API call running.
   */
  isRequesting: prop_types_default.a.bool,
  /**
   * Label describing the legend items.
   */
  itemsLabel: prop_types_default.a.string,
  /**
   * Allows specifying properties different from the `endpoint` that will be used
   * to limit the items when there is an active search.
   */
  limitProperties: prop_types_default.a.array,
  /**
   * `items-comparison` (default) or `time-comparison`, this is used to generate correct
   * ARIA properties.
   */
  mode: prop_types_default.a.string,
  /**
   * Current path
   */
  path: prop_types_default.a.string.isRequired,
  /**
   * Primary data to display in the chart.
   */
  primaryData: prop_types_default.a.object,
  /**
   * The query string represented in object form.
   */
  query: prop_types_default.a.object.isRequired,
  /**
   * Secondary data to display in the chart.
   */
  secondaryData: prop_types_default.a.object,
  /**
   * Properties of the selected chart.
   */
  selectedChart: prop_types_default.a.shape({
    /**
     * Key of the selected chart.
     */
    key: prop_types_default.a.string.isRequired,
    /**
     * Chart label.
     */
    label: prop_types_default.a.string.isRequired,
    /**
     * Order query argument.
     */
    order: prop_types_default.a.oneOf(['asc', 'desc']),
    /**
     * Order by query argument.
     */
    orderby: prop_types_default.a.string,
    /**
     * Number type for formatting.
     */
    type: prop_types_default.a.oneOf(['average', 'number', 'currency']).isRequired
  }).isRequired
};
report_chart_ReportChart.defaultProps = {
  isRequesting: false,
  primaryData: {
    data: {
      intervals: []
    },
    isError: false,
    isRequesting: false
  },
  secondaryData: {
    data: {
      intervals: []
    },
    isError: false,
    isRequesting: false
  }
};
/* harmony default export */ var report_chart = (Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select, props) {
  var charts = props.charts,
    endpoint = props.endpoint,
    filters = props.filters,
    isRequesting = props.isRequesting,
    limitProperties = props.limitProperties,
    query = props.query,
    advancedFilters = props.advancedFilters;
  var limitBy = limitProperties || [endpoint];
  var selectedFilter = getSelectedFilter(filters, query);
  var filterParam = Object(external_lodash_["get"])(selectedFilter, ['settings', 'param']);
  var chartMode = props.mode || getChartMode(selectedFilter, query) || 'time-comparison';
  var _select$getSetting = select(external_wc_data_["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
    defaultDateRange = _select$getSetting.woocommerce_default_date_range;

  /* eslint @wordpress/no-unused-vars-before-return: "off" */
  var reportStoreSelector = select(external_wc_data_["REPORTS_STORE_NAME"]);
  var newProps = {
    mode: chartMode,
    filterParam: filterParam,
    defaultDateRange: defaultDateRange
  };
  if (isRequesting) {
    return newProps;
  }
  var hasLimitByParam = limitBy.some(function (item) {
    return query[item] && query[item].length;
  });
  if (query.search && !hasLimitByParam) {
    return report_chart_objectSpread(report_chart_objectSpread({}, newProps), {}, {
      emptySearchResults: true
    });
  }
  var fields = charts && charts.map(function (chart) {
    return chart.key;
  });
  var primaryData = Object(external_wc_data_["getReportChartData"])({
    endpoint: endpoint,
    dataType: 'primary',
    query: query,
    // Hint: Leave this param for backwards compatibility WC-Admin lt 2.6.
    select: select,
    selector: reportStoreSelector,
    limitBy: limitBy,
    filters: filters,
    advancedFilters: advancedFilters,
    defaultDateRange: defaultDateRange,
    fields: fields
  });
  if (chartMode === 'item-comparison') {
    return report_chart_objectSpread(report_chart_objectSpread({}, newProps), {}, {
      primaryData: primaryData
    });
  }
  var secondaryData = Object(external_wc_data_["getReportChartData"])({
    endpoint: endpoint,
    dataType: 'secondary',
    query: query,
    // Hint: Leave this param for backwards compatibility WC-Admin lt 2.6.
    select: select,
    selector: reportStoreSelector,
    limitBy: limitBy,
    filters: filters,
    advancedFilters: advancedFilters,
    defaultDateRange: defaultDateRange,
    fields: fields
  });
  return report_chart_objectSpread(report_chart_objectSpread({}, newProps), {}, {
    primaryData: primaryData,
    secondaryData: secondaryData
  });
}))(report_chart_ReportChart));
// CONCATENATED MODULE: ./resources/js/admin/analytics/report/revenue/index.js







function revenue_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function revenue_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? revenue_ownKeys(Object(source), !0).forEach(function (key) { defineProperty_default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : revenue_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function revenue_createSuper(Derived) { var hasNativeReflectConstruct = revenue_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }
function revenue_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
/**
 * External dependencies.
 */




/**
 * WooCommerce dependencies.
 */


/**
 * Internal dependencies.
 */





/**
 * SomewhereWarm dependencies.
 */



var revenue_RevenueReport = /*#__PURE__*/function (_Component) {
  inherits_default()(RevenueReport, _Component);
  var _super = revenue_createSuper(RevenueReport);
  function RevenueReport() {
    classCallCheck_default()(this, RevenueReport);
    return _super.apply(this, arguments);
  }
  createClass_default()(RevenueReport, [{
    key: "getChartMeta",
    value: function getChartMeta() {
      var _this$props = this.props,
        query = _this$props.query,
        isSingleProductView = _this$props.isSingleProductView;
      var mode = 'time-comparison';
      var compareObject = 'recommendations';
      /* translators: Number of conversions */
      var label = Object(external_wp_i18n_["__"])('%d conversions', 'woocommerce-product-recommendations');
      return {
        itemsLabel: label,
        mode: mode
      };
    }
  }, {
    key: "render",
    value: function render() {
      var _this$getChartMeta = this.getChartMeta(),
        itemsLabel = _this$getChartMeta.itemsLabel,
        mode = _this$getChartMeta.mode;
      var _this$props2 = this.props,
        path = _this$props2.path,
        query = _this$props2.query,
        isError = _this$props2.isError,
        isRequesting = _this$props2.isRequesting;
      if (isError) {
        return Object(external_wp_element_["createElement"])(ReportError, {
          isError: true
        });
      }
      var chartQuery = revenue_objectSpread({}, query);
      return Object(external_wp_element_["createElement"])(external_wp_element_["Fragment"], null, Object(external_wp_element_["createElement"])(external_wc_components_["ReportFilters"], {
        query: query,
        path: path,
        showDatePicker: true,
        filters: config_filters,
        advancedFilters: config_advancedFilters
      }), Object(external_wp_element_["createElement"])(report_summary, {
        mode: mode,
        charts: config_charts,
        endpoint: ENDPOINT,
        isRequesting: isRequesting,
        query: chartQuery,
        selectedChart: getSelectedChart(query.chart, config_charts),
        filters: config_filters,
        advancedFilters: config_advancedFilters
      }), Object(external_wp_element_["createElement"])(report_chart, {
        charts: config_charts,
        mode: mode,
        endpoint: ENDPOINT,
        isRequesting: isRequesting,
        itemsLabel: itemsLabel,
        path: path,
        query: chartQuery,
        selectedChart: getSelectedChart(chartQuery.chart, config_charts),
        filters: config_filters,
        advancedFilters: config_advancedFilters
      }), Object(external_wp_element_["createElement"])(table, {
        isRequesting: isRequesting,
        endpoint: ENDPOINT,
        hideCompare: true,
        query: query,
        filters: config_filters,
        advancedFilters: config_advancedFilters
      }));
    }
  }]);
  return RevenueReport;
}(external_wp_element_["Component"]);
revenue_RevenueReport.propTypes = {
  path: prop_types_default.a.string.isRequired,
  query: prop_types_default.a.object.isRequired
};
/* harmony default export */ var revenue = (revenue_RevenueReport);
// CONCATENATED MODULE: ./resources/js/admin/analytics/report/index.js

/**
 * Internal dependencies.
 */


/**
 * SomewhereWarm dependencies.
 */

var report_Report = function Report(props) {
  var query = props.query;
  props.query.section = 'revenue';
  var main_content;
  switch (query.section) {
    case 'revenue':
      main_content = Object(external_wp_element_["createElement"])(revenue, props);
      break;
    default:
      main_content = Object(external_wp_element_["createElement"])(report_error, null);
  }
  return main_content;
};
/* harmony default export */ var analytics_report = (report_Report);
// CONCATENATED MODULE: ./resources/js/admin/analytics/index.js

/**
 * External dependencies
 */




/**
 * Local imports
 */


/**
 * Use the 'woocommerce_admin_reports_list' filter to add a report page.
 */
Object(external_wp_hooks_["addFilter"])('woocommerce_admin_reports_list', 'woocommerce-product-recommendations', function (reports) {
  return [].concat(toConsumableArray_default()(reports), [{
    report: 'recommendations',
    title: Object(external_wp_i18n_["_x"])('Recommendations', 'analytics report menu item', 'woocommerce-product-recommendations'),
    component: analytics_report,
    navArgs: {
      id: 'wc-prl-recommendations-analytics-report'
    }
  }]);
});

/***/ })
/******/ ]);