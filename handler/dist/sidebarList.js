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

eval("/*Sidebar on left*/\n\nconst openMenuButton = document.querySelector(\".menu-open-button\")\nconst closeMenuButton = document.querySelector(\".menu-close-button\")\nconst menu = document.querySelector(\".sidebar\")\nconst wrapper = document.querySelector(\".wrapper\")\n\n\nconst openMenu = () => {\nmenu.classList.add(\"menu-open\")\nwrapper.classList.add(\"background_dark\")\n}\n\nif(openMenuButton)\n{\nopenMenuButton.addEventListener(\"click\", openMenu)\n}\n\n/*add background effect + sidebar open for mobile version*/\nconst closeMenu = () => {\nmenu.classList.remove(\"menu-open\")\nwrapper.classList.remove(\"background_dark\")\n\n}\n\n/*close the sidebar when you click on the button*/\nif(closeMenuButton)\n{\n  closeMenuButton.addEventListener(\"click\", closeMenu)\n}\n\n\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/sidebarList.js?");

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