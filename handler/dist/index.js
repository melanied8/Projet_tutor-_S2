/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/app.js":
/*!*******************!*\
  !*** ./js/app.js ***!
  \*******************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initApp\": () => (/* binding */ initApp)\n/* harmony export */ });\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./form */ \"./js/form.js\");\n/* harmony import */ var _list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list */ \"./js/list.js\");\n\n\n\n/**\n *\n * @param {itemAddElement} listDetails form\n * @param {listElement} listDetails list\n */\nconst initApp = (itemAddElement, listElement) => {\n\n\tconst list = (0,_list__WEBPACK_IMPORTED_MODULE_1__.initList)(listElement)\n\n\t;(0,_form__WEBPACK_IMPORTED_MODULE_0__.initForm)(itemAddElement, list.addItem)\n\n\tconst list2 = (0,_list__WEBPACK_IMPORTED_MODULE_1__.initList)()\n}\n\n\n\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/app.js?");

/***/ }),

/***/ "./js/form.js":
/*!********************!*\
  !*** ./js/form.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initForm\": () => (/* binding */ initForm)\n/* harmony export */ });\n/**\n *\n * @param {itemAddElement} listDetails list\n * @param {onSubmit} makeItem\n */\nconst initForm = (itemAddElement, onSubmit) => {\n\n\t\t\n\t\t\tconst input = itemAddElement.querySelector(\".js-task-input\")\n\n\t\t\tconst addButton = itemAddElement.querySelector(\".js-task-button\")\n\t\t\t\n\n\nconst init = () => {\n\nif(addButton)\n{\n  updateAddButtonStatus()\n}\n\n\n  if(input)\n  {\n\tinput.addEventListener(\"input\", updateAddButtonStatus)\n  }\n\n  if(addButton)\n  {\n\taddButton.addEventListener(\"click\", handleSubmit)\n  }\n\t\n}\n\nconst updateAddButtonStatus = () => {\n\nif(addButton)\n{\n  addButton.disabled = (input.value.trim().length === 0)\n}\n\n\n  }\n\n  const handleSubmit = () => {\nconst trimmedValue = input.value.trim()\nonSubmit(trimmedValue)\ninput.value = \"\"\n}\n\ninit()\n}\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/form.js?");

/***/ }),

/***/ "./js/index.js":
/*!*********************!*\
  !*** ./js/index.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _app__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./app */ \"./js/app.js\");\n\n\nconst itemAddElement = document.querySelector(\".add-item\")\nconst listElement = document.querySelector(\".task-list\")\n\n;(0,_app__WEBPACK_IMPORTED_MODULE_0__.initApp)(itemAddElement, listElement)\n\n\nconst sideBar = document.querySelector(\".edit\")\nconst closeButton = document.querySelector(\".close\")\nconst cancelButton = document.querySelector(\".cancel-button\")\n\nconst close = () => {\n\tsideBar.classList.remove(\"open-link\")\n}\n\ncloseButton.addEventListener(\"click\", close)\ncancelButton.addEventListener(\"click\", close)\n\n\n\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/index.js?");

/***/ }),

/***/ "./js/list.js":
/*!********************!*\
  !*** ./js/list.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initList\": () => (/* binding */ initList)\n/* harmony export */ });\n/* harmony import */ var _request_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./request.js */ \"./js/request.js\");\n\n\n/**\n * Creation of a task\n *\n * @param {listElement} listDetails list\n * @return {item} the task item \n */\nconst initList = (listElement) => {\n\n  const addItem = (label) => {\n    //asynchronous request \n    (0,_request_js__WEBPACK_IMPORTED_MODULE_0__.addTask)(label, 'http://localhost/workspace/ptut/handler/processAddTask.php')\n    const item = makeItem(label)\n\n    listElement.prepend(item)\n\n    \n  }\n\n  return {addItem}\n}\n\n\nconst makeItem = (label) => {\n  const element = createItemElement(label)\n\n  const input = element.querySelector(\"input\")\n  const button = element.querySelector(\"button\")\n  const link = element.querySelector(\"a\")\n\n  const init = () => {\n    button.addEventListener(\"click\", destroy)\n    link.addEventListener(\"click\", open)\n  }\n\n  const destroy = () => {\n    element.remove()\n\n    button.removeEventListener(\"click\", destroy)\n  }\n\nconst open = () => {\n  const sideBar = document.querySelector(\".edit\")\n  sideBar.classList.add(\"open-link\")\n}\n\n  init()\n\n  return element\n}\n\nconst createItemElement = (itemLabel) => {\n  const item = document.createElement(\"li\")\n\n  item.classList.add(\"nav-box\", \"flex-item\", \"item-size\", \"space-between\")\n\n  const div = document.createElement(\"div\")\n  div.classList.add(\"flex-item\")\n\n  const input = document.createElement(\"input\")\n  input.type = \"radio\"\n  input.classList.add(\"radio-size\", \"radio\")\n\n  const label = document.createElement(\"label\")\n  label.for = \"radio\"\n\n  const link = document.createElement(\"a\")\n  link.classList.add(\"open-link\")\n  link.append(itemLabel)\n\n  const button = document.createElement(\"button\")\n  button.type = \"button\"\n  button.classList.add(\"delete-task\")\n\n  const img = document.createElement(\"img\")\n  img.classList.add(\"delete\")\n  img.setAttribute(\"src\", \"../assets/delete.svg\")\n\n\n  label.append(link)\n  div.append(input, label)\n  button.append(img)\n  item.append(div, button)\n\n  return item\n}\n\n\n\n\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/list.js?");

/***/ }),

/***/ "./js/request.js":
/*!***********************!*\
  !*** ./js/request.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"addTask\": () => (/* binding */ addTask)\n/* harmony export */ });\n/**\n * send a request to the server to add a new task\n *\n * @param {label} task description\n * @param {url} php page url\n */\nconst addTask = async (label, url) => {\n  const options = {\n    method: 'POST',\n    body: JSON.stringify(label),\n    headers: {\n      \"Content-Type\": \"application/json;charset=utf-8\"\n    }\n  }\n  \n  fetch(url, options).then(response => {\n                        console.log(response);\n                        console.log('la reponse est : ' + response.ok)\n                        console.log('le status est : ' + response.status)\n                        console.log('le statusText est : ' + response.statusText)\n                        console.log('le Text est : ' + response.responseText)\n                        return response.text()\n                    }).then(data => console.log(data))\n}  \n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/request.js?");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./js/index.js");
/******/ 	
/******/ })()
;