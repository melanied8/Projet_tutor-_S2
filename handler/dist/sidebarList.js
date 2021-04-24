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

/***/ "./js/sidebarList.js":
/*!***************************!*\
  !*** ./js/sidebarList.js ***!
  \***************************/
/***/ (() => {

eval("/*Sidebar on left*/\r\n\r\nconst openMenuButton = document.querySelector(\".menu-open-button\")\r\nconst closeMenuButton = document.querySelector(\".menu-close-button\")\r\nconst menu = document.querySelector(\".sidebar\")\r\nconst wrapper = document.querySelector(\".wrapper\")\r\n\r\n\r\nconst openMenu = () => {\r\nmenu.classList.add(\"menu-open\")\r\nwrapper.classList.add(\"background_dark\")\r\n}\r\n\r\nif(openMenuButton)\r\n{\r\nopenMenuButton.addEventListener(\"click\", openMenu)\r\n}\r\n\r\n/*add background effect + sidebar open for mobile version*/\r\nconst closeMenu = () => {\r\nmenu.classList.remove(\"menu-open\")\r\nwrapper.classList.remove(\"background_dark\")\r\n\r\n}\r\n\r\n/*close the sidebar when you click on the button*/\r\nif(closeMenuButton)\r\n{\r\n  closeMenuButton.addEventListener(\"click\", closeMenu)\r\n}\r\n\r\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/sidebarList.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/sidebarList.js"]();
/******/ 	
/******/ })()
;