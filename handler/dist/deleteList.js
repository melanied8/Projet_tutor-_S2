/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/deleteList.js":
/*!**************************!*\
  !*** ./js/deleteList.js ***!
  \**************************/
/***/ (() => {

eval("\r\nconst openDeleteList = document.querySelector(\".delete-forever\")\r\nconst wrapper = document.querySelector(\".wrapper\")\r\nconst cancelDeleteButton = document.querySelector(\".cancel-delete\")\r\nconst menuDeleteList = document.querySelector(\".delete-list\");\r\nconst header = document.querySelector(\".header\");\r\n\r\n    const openMenuDeleteList = () => {\r\n    menuDeleteList.classList.add(\"open-delete-list\")\r\n    wrapper.classList.add(\"dark-background\")\r\n    header.classList.add(\"dark-background\")\r\n    }\r\n    \r\n    if(openDeleteList)\r\n    {\r\n    openDeleteList.addEventListener(\"click\", openMenuDeleteList)\r\n    }\r\n\r\n    const closeMenuDeleteList = () => {\r\n        menuDeleteList.classList.remove(\"open-delete-list\")\r\n        wrapper.classList.remove(\"dark-background\")\r\n        header.classList.remove(\"dark-background\")\r\n        }\r\n    \r\n     if(cancelDeleteButton)\r\n    {\r\n        cancelDeleteButton.addEventListener(\"click\", closeMenuDeleteList)\r\n    }\r\n        \r\n\r\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/deleteList.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/deleteList.js"]();
/******/ 	
/******/ })()
;