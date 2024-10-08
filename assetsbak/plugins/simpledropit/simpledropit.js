/**
 * SimpleDropit.js - v0.1.1
 * Drag-n-drop files, Simple for modern browsers
 * https://nishantk02.github.io/SimpleDropit
 *
 * Made by Nishant K
 * Under MIT License
 */

 (function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.SimpleDropit = factory());
  }(this, (function () { 'use strict';
  
    function _extends() {
      _extends = Object.assign || function (target) {
        for (var i = 1; i < arguments.length; i++) {
          var source = arguments[i];
  
          for (var key in source) {
            if (Object.prototype.hasOwnProperty.call(source, key)) {
              target[key] = source[key];
            }
          }
        }
  
        return target;
      };
  
      return _extends.apply(this, arguments);
    }
  
    function _inheritsLoose(subClass, superClass) {
      subClass.prototype = Object.create(superClass.prototype);
      subClass.prototype.constructor = subClass;
  
      _setPrototypeOf(subClass, superClass);
    }
  
    function _setPrototypeOf(o, p) {
      _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
        o.__proto__ = p;
        return o;
      };
  
      return _setPrototypeOf(o, p);
    }
  
    function _assertThisInitialized(self) {
      if (self === void 0) {
        throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
      }
  
      return self;
    }
  
    // Helper functions
    function getElementDocument(element) {
      if (!element || !element.ownerDocument) {
        return document;
      }
  
      return element.ownerDocument;
    }
    function hasClass(element, className) {
      if (element) {
        return element.classList.contains(className);
      } else {
        return null;
      }
    }
    function triggerClick(element) {
      if (element.click) {
        element.click();
      } else if (document.createEvent) {
        var eventObj = document.createEvent('MouseEvents');
        eventObj.initEvent('click', true, true);
        element.dispatchEvent(eventObj);
      }
    }
  
    var SimpleDropitMethods = /*#__PURE__*/function () {
      function SimpleDropitMethods() {}
  
      SimpleDropitMethods.isFiles = function isFiles(arg) {
        var r = false;
  
        if (arg.types === undefined && arg.files) {
          for (var _i = 0, _Object$entries = Object.entries(arg.files); _i < _Object$entries.length; _i++) {
            var _Object$entries$_i = _Object$entries[_i];
                _Object$entries$_i[0];
                var file = _Object$entries$_i[1];
  
            if (file.name !== '') {
              r = true;
            }
          }
        } else {
          arg.types.forEach(function (file, index) {
            if (file === "Files" || file === "application/x-moz-file") {
              r = true;
            }
          });
        }
  
        return r;
      };
  
      return SimpleDropitMethods;
    }();
  
    var SimpleDropit = /*#__PURE__*/function (_SimpleDropitMethods) {
      _inheritsLoose(SimpleDropit, _SimpleDropitMethods);
  
      /**
       * SimpleDropit Object
       * @param {String} selector Element object
       * @param {Object} options User options
       */
      function SimpleDropit(selector, options) {
        var _this;
  
        _this = _SimpleDropitMethods.call(this) || this;
  
        _this.isAdvancedUpload = function () {
          var div = document.createElement('div');
          return ('draggable' in div || 'ondragstart' in div && 'ondrop' in div) && 'FormData' in window && 'FileReader' in window;
        };
  
        _this.onChange = function (event) {
          if (!SimpleDropit.isFiles(event.target)) {
            return;
          }
  
          SimpleDropit.showFiles(_this.filenameEl, event.target.files);
  
          _this.boxEl.classList.add('is-dropped');
        };
  
        _this.dragIn = function (event) {
          // Check the dragged elements are Files
          if (!SimpleDropit.isFiles(event.dataTransfer)) {
            return;
          }
  
          if (!hasClass(_this.boxEl, 'is-dragover')) _this.boxEl.classList.add('is-dragover');
        };
  
        _this.dragOut = function (event) {
          // Check the dragged elements are Files
          if (!SimpleDropit.isFiles(event.dataTransfer)) {
            return;
          }
  
          if (hasClass(_this.boxEl, 'is-dragover')) _this.boxEl.classList.remove('is-dragover');
        };
  
        _this.drop = function (event) {
          // Check the dropped elements are Files
          if (!SimpleDropit.isFiles(event.dataTransfer)) {
            return;
          }
  
          _this.droppedFiles = event.dataTransfer.files;
          SimpleDropit.showFiles(_this.filenameEl, _this.droppedFiles);
  
          _this.boxEl.classList.add('is-dropped');
        };
  
        _this.preventEventPropagation = function (event) {
          event.preventDefault();
          event.stopPropagation();
        };
  
        try {
          if (typeof selector === 'string') {
            throw new Error('Invalid Element Object');
          } else if (typeof selector === 'object' && selector !== null) {
            _this.el = selector;
          } else {
            throw new Error('Element Object does not exists');
          }
        } catch (error) {
          console.error(error.name + ': ' + error.message);
          return _assertThisInitialized(_this);
        }
  
        _this.options = _extends({}, SimpleDropit.defaultOptions, options);
        _this.classNames = _extends({}, SimpleDropit.defaultOptions.classNames, _this.options.classNames);
  
        if (SimpleDropit.instances.has(_this.el)) {
          return _assertThisInitialized(_this);
        }
  
        _this.init();
  
        return _this;
      }
  
      var _proto = SimpleDropit.prototype;
  
      _proto.init = function init() {
        // Save a reference to the instance, so we know this DOM node has already been instanciated
        SimpleDropit.instances.set(this.el, this);
        this.initDom();
        this.initListeners();
      };
  
      _proto.initDom = function initDom() {
        // Assuring this element doesn't have the wrapper elements yet
        if (this.el.closest('.' + this.classNames.boxEl) !== null) {
          // Assume that element has his DOM already initiated
          this.boxEl = this.el.closest('.' + this.classNames.boxEl);
          this.boxWrapperEl = this.boxEl.querySelector('.' + this.classNames.boxWrapperEl);
          this.labelWrapperEl = this.boxEl.querySelector('.' + this.classNames.labelWrapperEl);
          this.supportedLabelEl = this.boxEl.querySelector('.' + this.classNames.supportedLabelEl);
          this.filenameEl = this.boxEl.querySelector('.' + this.classNames.filenameEl);
          this.browseLabelEl = this.boxEl.querySelector('.' + this.classNames.browseLabelEl);
        } else {
          // Prepare DOM
          var elClone = this.el.cloneNode(true);
          this.boxEl = document.createElement('div');
          this.boxWrapperEl = document.createElement('div');
          this.labelWrapperEl = document.createElement('div');
          this.supportedLabelEl = document.createElement('span');
          this.filenameEl = document.createElement('span');
          this.browseLabelEl = document.createElement('label');
          this.boxEl.classList.add(this.classNames.boxEl);
          this.boxWrapperEl.classList.add(this.classNames.boxWrapperEl);
          this.labelWrapperEl.classList.add(this.classNames.labelWrapperEl);
          this.supportedLabelEl.classList.add(this.classNames.supportedLabelEl);
          this.filenameEl.classList.add(this.classNames.filenameEl);
          this.browseLabelEl.classList.add(this.classNames.browseLabelEl);
          this.el.classList.add('sd-file-input', 'sd-file-input-hide');
          this.supportedLabelEl.innerHTML = this.options.supportedLabel + '&nbsp;';
          this.labelWrapperEl.appendChild(this.supportedLabelEl);
          this.labelWrapperEl.appendChild(this.filenameEl);
          this.browseLabelEl.innerHTML = 'Browse <span class="sd-box-browse-file">File</span></span>';
          this.labelWrapperEl.appendChild(this.browseLabelEl);
          this.labelWrapperEl.appendChild(elClone);
          this.boxWrapperEl.appendChild(this.labelWrapperEl);
          this.boxEl.appendChild(this.boxWrapperEl);
          this.el.after(this.boxEl);
          this.el.remove();
          this.el = elClone;
        }
  
        if (this.isAdvancedUpload) {
          this.boxEl.classList.add('sd-advanced-upload');
        }
      };
  
      _proto.initListeners = function initListeners() {
        var _this2 = this;
  
        ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (e) {
          getElementDocument(_this2.boxEl).addEventListener(e, _this2.preventEventPropagation, false);
  
          _this2.boxEl.addEventListener(e, _this2.preventEventPropagation, false);
        });
        ['dragenter', 'dragover'].forEach(function (e) {
          getElementDocument(_this2.boxEl).addEventListener(e, _this2.dragIn, true);
        });
        ['dragleave', 'drop'].forEach(function (e) {
          getElementDocument(_this2.boxEl).addEventListener(e, _this2.dragOut, true);
        });
        this.boxEl.addEventListener('drop', this.drop, true);
        this.el.addEventListener('change', this.onChange, true);
        this.browseLabelEl.addEventListener('click', function (event) {
          triggerClick(_this2.el);
        });
      };
  
      SimpleDropit.showFiles = function showFiles(el, files) {
        var fileName = files[0].name;
  
        if (fileName !== '' && fileName !== undefined) {
          el.innerText = files.length > 1 ? files.length + ' files selected / ' : fileName + ' / ';
          return true;
        } else {
          return false;
        }
      };
  
      return SimpleDropit;
    }(SimpleDropitMethods);
  
    SimpleDropit.instances = new WeakMap();
    SimpleDropit.defaultOptions = {
      classNames: {
        boxEl: 'sd-box',
        boxWrapperEl: 'sd-box-wrapper',
        browseLabelEl: 'sd-label',
        filenameEl: 'sd-box-file-name',
        labelWrapperEl: 'sd-label-wrapper',
        supportedLabelEl: 'sd-box-dragndrop'
      },
      supportedLabel: 'Drop file here /'
    };
  
    return SimpleDropit;
  
  })));
  