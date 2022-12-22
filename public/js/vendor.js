"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/vendor"],{

/***/ "./node_modules/vue/dist/vue.cjs.js":
/*!******************************************!*\
  !*** ./node_modules/vue/dist/vue.cjs.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({ value: true }));

var compilerDom = __webpack_require__(/*! @vue/compiler-dom */ "./node_modules/@vue/compiler-dom/dist/compiler-dom.esm-bundler.js");
var runtimeDom = __webpack_require__(/*! @vue/runtime-dom */ "./node_modules/@vue/runtime-dom/dist/runtime-dom.esm-bundler.js");
var shared = __webpack_require__(/*! @vue/shared */ "./node_modules/@vue/shared/dist/shared.esm-bundler.js");

function _interopNamespace(e) {
  if (e && e.__esModule) return e;
  var n = Object.create(null);
  if (e) {
    Object.keys(e).forEach(function (k) {
      n[k] = e[k];
    });
  }
  n['default'] = e;
  return Object.freeze(n);
}

var runtimeDom__namespace = /*#__PURE__*/_interopNamespace(runtimeDom);

// This entry is the "full-build" that includes both the runtime
const compileCache = Object.create(null);
function compileToFunction(template, options) {
    if (!shared.isString(template)) {
        if (template.nodeType) {
            template = template.innerHTML;
        }
        else {
            runtimeDom.warn(`invalid template option: `, template);
            return shared.NOOP;
        }
    }
    const key = template;
    const cached = compileCache[key];
    if (cached) {
        return cached;
    }
    if (template[0] === '#') {
        const el = document.querySelector(template);
        if (!el) {
            runtimeDom.warn(`Template element not found or is empty: ${template}`);
        }
        // __UNSAFE__
        // Reason: potential execution of JS expressions in in-DOM template.
        // The user must make sure the in-DOM template is trusted. If it's rendered
        // by the server, the template should not contain any user data.
        template = el ? el.innerHTML : ``;
    }
    const opts = shared.extend({
        hoistStatic: true,
        onError: onError ,
        onWarn: e => onError(e, true) 
    }, options);
    if (!opts.isCustomElement && typeof customElements !== 'undefined') {
        opts.isCustomElement = tag => !!customElements.get(tag);
    }
    const { code } = compilerDom.compile(template, opts);
    function onError(err, asWarning = false) {
        const message = asWarning
            ? err.message
            : `Template compilation error: ${err.message}`;
        const codeFrame = err.loc &&
            shared.generateCodeFrame(template, err.loc.start.offset, err.loc.end.offset);
        runtimeDom.warn(codeFrame ? `${message}\n${codeFrame}` : message);
    }
    // The wildcard import results in a huge object with every export
    // with keys that cannot be mangled, and can be quite heavy size-wise.
    // In the global build we know `Vue` is available globally so we can avoid
    // the wildcard object.
    const render = (new Function('Vue', code)(runtimeDom__namespace));
    render._rc = true;
    return (compileCache[key] = render);
}
runtimeDom.registerRuntimeCompiler(compileToFunction);

Object.keys(runtimeDom).forEach(function (k) {
  if (k !== 'default') exports[k] = runtimeDom[k];
});
exports.compile = compileToFunction;


/***/ }),

/***/ "./node_modules/vue/index.js":
/*!***********************************!*\
  !*** ./node_modules/vue/index.js ***!
  \***********************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {



if (false) {} else {
  module.exports = __webpack_require__(/*! ./dist/vue.cjs.js */ "./node_modules/vue/dist/vue.cjs.js")
}


/***/ })

}]);