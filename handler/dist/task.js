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

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/task.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;