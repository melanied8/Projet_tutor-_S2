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

/***/ "./js/task.js":
/*!********************!*\
  !*** ./js/task.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"initItem\": () => (/* binding */ initItem)\n/* harmony export */ });\n/**\r\n\t*\r\n\t*initializes task deletion and updating\r\n\t*\r\n\t* @param {HTMLLIElement} LIElement - task list\r\n\t*/\r\nconst initItem = (LIElement) => {\r\n\t\tconst input = LIElement.querySelector(\".radio\");\r\n\t\tconst button = LIElement.querySelector(\".delete-task\");\r\n\r\n\t\tconst init = () => {\r\n\t\t\tinput.addEventListener(\"change\", updateTaskStatus);\r\n\t\t\tbutton.addEventListener(\"click\", removeTask);\r\n\t\t}\r\n\r\n\t\tconst destroy = () => {\r\n\t\t\tinput.removeEventListener(\"change\", updateTaskStatus);\r\n\t\t\tbutton.removeEventListener(\"click\", removeTask);\r\n\t\t}\r\n\r\n\t\t/**\r\n\t\t* update the status of the task\r\n\t\t*\r\n\t\t* \r\n\t\t*/\r\n\t\tconst updateTaskStatus = (e) => {\r\n\t\t\tconst id = LIElement.id;\r\n\t\t\tlet status = 0;\r\n\t\t\tif(e.target.checked) {\r\n\t\t\t\tLIElement.classList.add(\"done\");\r\n\t\t\t\tstatus = 1;\r\n\t\t\t}\r\n\t\t\telse\r\n\t\t\t\tLIElement.classList.remove(\"done\");\r\n\t\t\tupdateDB(\"http://localhost/workspace/ptut/handler/processUpdateTaskStatus.php\", {status: status, id: id});\r\n\t\t}\r\n\r\n\r\n\t\t/**\r\n\t\t* remove definitly the task\r\n\t\t*\r\n\t\t*/\r\n\t\tconst removeTask = (e) => {\r\n\t\t\tconst id = LIElement.id;\r\n\t\t\tLIElement.remove();\r\n\t\t\tupdateDB('http://localhost/workspace/ptut/handler/processDeleteTask.php', {id: id}); // no data needed here\r\n\t\t\tdestroy(LIElement);\r\n\t\t}\r\n\r\n\r\n\t/**\r\n\t* update the database \r\n\t*\r\n\t* @param {string} url - the url of the php page\r\n\t* @param {string} data - the data we want to send\r\n\t*/\r\n\tconst updateDB = async (url, data) => { \r\n\t\tconst options = {\r\n\t\t\tmethod : \"POST\",\r\n\t\t\theaders : {\r\n\t\t\t\t\"Content-Type\": \"application/json;charset=utf-8\"\r\n\t\t\t},\r\n\t\t\tbody : JSON.stringify(data)\r\n\t}\r\n\r\n\t\tconst response = await fetch(url, options);\r\n\r\n\t\treturn response.status;\r\n\t}\r\n\r\n\t\tinit()\r\n\r\n}\r\n\r\n// we do it for each item loaded with php\r\nconst lis = Array.from(document.querySelectorAll(\".task\"));\r\n  lis.map(li => {\r\n  \tinitItem(li);\r\n})\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/task.js?");

/***/ }),

/***/ "./js/tasklist.js":
/*!************************!*\
  !*** ./js/tasklist.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _task_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./task.js */ \"./js/task.js\");\n\r\n\r\n\r\n/**\r\n* initiates the addition of new tasks\r\n*\r\n* @param {HTMLUListElement} UListElement - task list\r\n*\r\n*/\r\nconst initTaskList = (UListElement, initItem) => {\r\n\r\n\tconst button = UListElement.querySelector(\".js-task-button\");\r\n\tconst input = UListElement.querySelector(\".js-task-input\");\r\n\r\n\r\n\tconst init = () => {\r\n\t\tupdateAddButtonStatus();\r\n\t\tinput.addEventListener(\"change\", updateAddButtonStatus);\r\n\t\tbutton.addEventListener(\"click\", handleSubmit);\r\n\t\tinput.addEventListener(\"keyup\", handleSubmitKey);\r\n\t}\r\n\r\n\r\n\tconst handleSubmit = async () => {\r\n\t\tconst title = document.querySelector(\".title-list\");\r\n\t\tconst id = title.id;\r\n\t\tconst inputValue = escapeHtml(input.value);\r\n\t\tconst data = {\r\n\t\t\tinput: inputValue, \r\n\t\t\tid: id\r\n\t\t};\r\n\t\tconst response = await updateDB('http://localhost/workspace/ptut/handler/processAddTask.php', data);\r\n\t\tconst response2 = await fetch('http://localhost/workspace/ptut/handler/processGetId.php');\r\n\t\tconst data2 = await response2.json();\r\n\t\t// in this case we create the item\r\n\t\tconst item = createItem(input.value);\r\n\t\titem.id=data2.dernierItem; // we add the id we retrieved to the item\r\n\t\tinitItem(item);\r\n\t\tUListElement.prepend(item);\r\n\t\tinput.value = \"\";\r\n\t\tinput.focus();\r\n\t}\r\n\r\n\tconst handleSubmitKey = (e) => {\r\n\t\tif(e.keyCode === 13)\r\n\t\t\thandleSubmit();\r\n\t}\r\n\r\n\tconst updateAddButtonStatus = (e) => {\r\n\t\tbutton.disabled = (input.value.trim().length === 0);\r\n\t}\r\n\r\n\r\n\t/**\r\n\t*\r\n\t* escape special characters - equivalent to htmlspecialchar in php\r\n\t*\r\n\t* @param {string} text - unsafe text\r\n\t*/\r\n\tconst escapeHtml = (text) => {\r\n \t\t return text\r\n      \t\t.replace(/&/g, \"&amp;\")\r\n      \t\t.replace(/</g, \"&lt;\")\r\n      \t\t.replace(/>/g, \"&gt;\")\r\n      \t\t.replace(/\"/g, \"&quot;\")\r\n      \t\t.replace(/'/g, \"&#039;\");\r\n\t}\r\n\r\n\r\n\t/**\r\n\t*\r\n\t* create an item\r\n\t*\r\n\t* @param {string} inputValue - the string in the input\r\n\t*\r\n\t*/\r\n\tconst createItem = (inputValue) => {\r\n\t\tconst item = document.createElement(\"li\");\r\n\t\titem.classList.add(\"task\",\"nav-box\", \"flex-item\", \"item-size\", \"space-between\");\r\n\r\n\t\tconst div = document.createElement(\"div\");\r\n\t\tdiv.classList.add(\"flex-item\");\r\n\r\n\t\tconst input = document.createElement(\"input\");\r\n\t\tinput.classList.add(\"radio-size\", \"radio\");\r\n\t\tinput.type = \"checkbox\";\r\n\t\tinput.name = \"checkbox\";\r\n\t\tinput.id=\"checkbox\";\r\n\r\n\t\tconst label = document.createElement(\"label\");\r\n\t\tlabel.for=\"checkbox\";\r\n\r\n\t\tconst link = document.createElement(\"a\");\r\n\t\tlink.classList.add(\"open-link\");\r\n\t\tlink.textContent = escapeHtml(inputValue);\r\n\r\n\t\tlabel.append(link);\r\n\r\n\t\tdiv.append(input);\r\n\t\tdiv.append(label);\r\n\r\n\t\tconst button = document.createElement(\"button\");\r\n\t\tbutton.classList.add(\"delete-task\");\r\n\r\n\t\tconst img = document.createElement(\"img\");\r\n\t\timg.classList.add(\"delete\");\r\n\t\timg.src=\"./assets/delete.svg\";\r\n\r\n\t\tbutton.append(img);\r\n\r\n\t\titem.append(div);\r\n\t\titem.append(button);\r\n\r\n\t\treturn item;\r\n\r\n\t}\r\n\r\n\t\r\n\t/**\r\n\t* update the database \r\n\t*\r\n\t* @param {string} url - the url of the php page\r\n\t* @param {string} data - the data we want to send\r\n\t*/\r\n\tconst updateDB = async (url, data) => { \r\n\t\tconst options = {\r\n\t\t\tmethod : \"POST\",\r\n\t\t\theaders : {\r\n\t\t\t\t\"Content-Type\": \"application/json;charset=utf-8\"\r\n\t\t\t},\r\n\t\t\tbody : JSON.stringify(data)\r\n\t\t}\r\n\r\n\t\tconst response = await fetch(url, options);\r\n\r\n\t\treturn response.status;\r\n\t}\r\n\r\n\tinit()\r\n\r\n}\r\n\r\n\r\nconst list = document.querySelector(\".task-list\");\r\n\r\ninitTaskList(list, _task_js__WEBPACK_IMPORTED_MODULE_0__.initItem);\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/tasklist.js?");

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
/******/ 	var __webpack_exports__ = __webpack_require__("./js/tasklist.js");
/******/ 	
/******/ })()
;