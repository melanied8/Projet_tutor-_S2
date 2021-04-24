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

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initApp\": () => (/* binding */ initApp)\n/* harmony export */ });\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./form */ \"./js/form.js\");\n/* harmony import */ var _list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list */ \"./js/list.js\");\n\r\n\r\n\r\n/**\r\n *\r\n * @param {itemAddElement} listDetails form\r\n * @param {listElement} listDetails list\r\n */\r\nconst initApp = (itemAddElement, listElement) => {\r\n\r\n\tconst list = (0,_list__WEBPACK_IMPORTED_MODULE_1__.initList)(listElement)\r\n\r\n\t;(0,_form__WEBPACK_IMPORTED_MODULE_0__.initForm)(itemAddElement, list.addItem)\r\n\r\n\tconst list2 = (0,_list__WEBPACK_IMPORTED_MODULE_1__.initList)()\r\n}\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/app.js?");

/***/ }),

/***/ "./js/form.js":
/*!********************!*\
  !*** ./js/form.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initForm\": () => (/* binding */ initForm)\n/* harmony export */ });\n/**\r\n *\r\n * @param {itemAddElement} listDetails list\r\n * @param {onSubmit} makeItem\r\n */\r\nconst initForm = (itemAddElement, onSubmit) => {\r\n\r\n\t\t\r\n\t\t\tconst input = itemAddElement.querySelector(\".js-task-input\")\r\n\r\n\t\t\tconst addButton = itemAddElement.querySelector(\".js-task-button\")\r\n\t\t\t\r\n\r\n\r\nconst init = () => {\r\n\r\nif(addButton)\r\n{\r\n  updateAddButtonStatus()\r\n}\r\n\r\n\r\n  if(input)\r\n  {\r\n\tinput.addEventListener(\"input\", updateAddButtonStatus)\r\n  }\r\n\r\n  if(addButton)\r\n  {\r\n\taddButton.addEventListener(\"click\", handleSubmit)\r\n  }\r\n\t\r\n}\r\n\r\nconst updateAddButtonStatus = () => {\r\n\r\nif(addButton)\r\n{\r\n  addButton.disabled = (input.value.trim().length === 0)\r\n}\r\n\r\n\r\n  }\r\n\r\n  const handleSubmit = () => {\r\nconst trimmedValue = input.value.trim()\r\nonSubmit(trimmedValue)\r\ninput.value = \"\"\r\n}\r\n\r\ninit()\r\n}\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/form.js?");

/***/ }),

/***/ "./js/list.js":
/*!********************!*\
  !*** ./js/list.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initList\": () => (/* binding */ initList)\n/* harmony export */ });\n/* harmony import */ var _request_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./request.js */ \"./js/request.js\");\n\r\n\r\n/**\r\n * Creation of a task\r\n *\r\n * @param {listElement} listDetails list\r\n * @return {item} the task item \r\n */\r\nconst initList = (listElement) => {\r\n\r\n  const addItem = (label) => {\r\n    //asynchronous request \r\n    (0,_request_js__WEBPACK_IMPORTED_MODULE_0__.addTask)(label, 'http://localhost/workspace/ptut/handler/processAddTask.php')\r\n    const item = makeItem(label)\r\n\r\n    listElement.prepend(item)\r\n\r\n    \r\n  }\r\n\r\n  return {addItem}\r\n}\r\n\r\n\r\nconst makeItem = (label) => {\r\n  const element = createItemElement(label)\r\n\r\n  const input = element.querySelector(\"input\")\r\n  const button = element.querySelector(\"button\")\r\n  const link = element.querySelector(\"a\")\r\n\r\n  const init = () => {\r\n    button.addEventListener(\"click\", destroy)\r\n    /*link.addEventListener(\"click\", open)*/\r\n  }\r\n\r\n  const destroy = () => {\r\n    element.remove()\r\n    link.removeEventListener(\"click\", open)\r\n    button.removeEventListener(\"click\", destroy)\r\n  }\r\n\r\n/*\r\nconst open = () => {\r\n  const sideBar = document.querySelector(\".edit\")\r\n  sideBar.classList.add(\"open-link\")\r\n}\r\n*/\r\n\r\n  init()\r\n\r\n  return element\r\n}\r\n\r\nconst createItemElement = (itemLabel) => {\r\n  const item = document.createElement(\"li\")\r\n\r\n  item.classList.add(\"nav-box\", \"flex-item\", \"item-size\", \"space-between\")\r\n\r\n  const div = document.createElement(\"div\")\r\n  div.classList.add(\"flex-item\")\r\n\r\n  const input = document.createElement(\"input\")\r\n  input.type = \"radio\"\r\n  input.classList.add(\"radio-size\", \"radio\")\r\n\r\n  const label = document.createElement(\"label\")\r\n  label.for = \"radio\"\r\n\r\n  const link = document.createElement(\"a\")\r\n  link.classList.add(\"open-link\")\r\n  link.append(itemLabel)\r\n\r\n  const button = document.createElement(\"button\")\r\n  button.type = \"button\"\r\n  button.classList.add(\"delete-task\")\r\n\r\n  const img = document.createElement(\"img\")\r\n  img.classList.add(\"delete\")\r\n  img.setAttribute(\"src\", \"../assets/delete.svg\")\r\n\r\n\r\n  label.append(link)\r\n  div.append(input, label)\r\n  button.append(img)\r\n  item.append(div, button)\r\n\r\n  return item\r\n}\r\n\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/list.js?");

/***/ }),

/***/ "./js/request.js":
/*!***********************!*\
  !*** ./js/request.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"addTask\": () => (/* binding */ addTask)\n/* harmony export */ });\n/**\r\n * send a request to the server to add a new task\r\n *\r\n * @param {label} task description\r\n * @param {url} php page url\r\n */\r\nconst addTask = async (label, url) => {\r\n  const options = {\r\n    method: 'POST',\r\n    body: JSON.stringify(label),\r\n    headers: {\r\n      \"Content-Type\": \"application/json;charset=utf-8\"\r\n    }\r\n  }\r\n  \r\n  fetch(url, options).then(response => {\r\n                        console.log(response);\r\n                        console.log('la reponse est : ' + response.ok)\r\n                        console.log('le status est : ' + response.status)\r\n                        console.log('le statusText est : ' + response.statusText)\r\n                        console.log('le Text est : ' + response.responseText)\r\n                        return response.text()\r\n                    }).then(data => console.log(data))\r\n}  \n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/request.js?");

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
/******/ 	var __webpack_exports__ = __webpack_require__("./js/app.js");
/******/ 	
/******/ })()
;