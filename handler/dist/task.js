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

/***/ "./js/task.js":
/*!********************!*\
  !*** ./js/task.js ***!
  \********************/
/***/ (() => {

eval("/**\r\n* initiates the addition of new tasks\r\n*\r\n* @param {HTMLUListElement} UListElement - task list\r\n*\r\n*/\r\nconst initTask = (UListElement) => {\r\n\r\n\tconst button = UListElement.querySelector(\".js-task-button\");\r\n\tconst input = UListElement.querySelector(\".js-task-input\");\r\n\r\n\r\n\tconst init = () => {\r\n\t\tupdateAddButtonStatus()\r\n\t\tinput.addEventListener(\"change\", updateAddButtonStatus);\r\n\t\tbutton.addEventListener(\"click\", handleSubmit);\r\n\t}\r\n\r\n\r\n\tconst handleSubmit = async () => {\r\n\t\tconst title = document.querySelector(\".title-list\");\r\n\t\tconst id = title.id;\r\n\t\tconst inputValue = input.value;\r\n\t\tconst data = {\r\n\t\t\tinput: inputValue, \r\n\t\t\tid: id\r\n\t\t};\r\n\t\tconst response = await updateDB('http://localhost/workspace/ptut/handler/processAddTask.php', data);\r\n\t\tif(response !== 200) {\r\n\t\t\t//ecrire un message à l'utilisateur?\r\n\t\t\treturn;\r\n\t\t}\r\n\t\tconst response2 = await fetch('http://localhost/workspace/ptut/handler/processGetId.php');\r\n\t\tconst data2 = await response2.json();\r\n\t\tconst item = createItem(input.value);\r\n\t\titem.id=data2.dernierItem;\r\n\t\tinitItem(item);\r\n\t\tUListElement.prepend(item);\r\n\t\tinput.value = \"\";\r\n\t}\r\n\r\n\tconst updateAddButtonStatus = () => {\r\n\t\tbutton.disabled = (input.value.trim().length === 0);\r\n\t}\r\n\r\n\tconst initItem = (item) => {\r\n\t\tconst input = item.querySelector(\".radio\");\r\n\t\tconst button = item.querySelector(\".delete-task\");\r\n\r\n\t\tconst init = () => {\r\n\t\t\tinput.addEventListener(\"change\", updateTaskStatus);\r\n\t\t\tbutton.addEventListener(\"click\", removeTask);\r\n\t\t}\r\n\r\n\t\tconst destroy = () => {\r\n\t\t\tinput.removeEventListener(\"change\", updateTaskStatus);\r\n\t\t\tbutton.removeEventListener(\"click\", removeTask);\r\n\t\t}\r\n\r\n\t\t/**\r\n\t\t* update the status of the task\r\n\t\t*\r\n\t\t* \r\n\t\t*/\r\n\t\tconst updateTaskStatus = (e) => {\r\n\t\t\tconst id = item.id;\r\n\t\t\tlet status = 0;\r\n\t\t\tif(e.target.checked)\r\n\t\t\t\tstatus = 1;\r\n\t\t\tconsole.log(status);\r\n\t\t\tconsole.log(id);\r\n\t\t\tupdateDB(\"http://localhost/workspace/ptut2/handler/processUpdateTaskStatus.php\", {status: status, id: id});\r\n\t\t}\r\n\r\n\r\n\t\t/**\r\n\t\t* remove definitly the task\r\n\t\t*\r\n\t\t*/\r\n\t\tconst removeTask = (e) => {\r\n\t\t\tconst id = item.id;\r\n\t\t\tconsole.log(id);\r\n\t\t\titem.remove();\r\n\t\t\tupdateDB('http://localhost/workspace/ptut/handler/processDeleteTask.php', {id: id}); // no data needed here\r\n\t\t\tdestroy(item);\r\n\t\t}\r\n\r\n\t\tinit()\r\n\r\n\t}\r\n\r\n\r\n\r\n\r\n\tconst createItem = (inputValue) => {\r\n\t\tconst item = document.createElement(\"li\");\r\n\t\titem.classList.add(\"task\",\"nav-box\", \"flex-item\", \"item-size\", \"space-between\");\r\n\r\n\t\tconst div = document.createElement(\"div\");\r\n\t\tdiv.classList.add(\"flex-item\");\r\n\r\n\t\tconst input = document.createElement(\"input\");\r\n\t\tinput.classList.add(\"radio-size\", \"radio\");\r\n\t\tinput.type = \"radio\";\r\n\t\tinput.name = \"radio\";\r\n\t\tinput.id=\"radio\";\r\n\r\n\t\tconst label = document.createElement(\"label\");\r\n\t\tlabel.for=\"radio\";\r\n\r\n\t\tconst link = document.createElement(\"a\");\r\n\t\tlink.classList.add(\"open-link\");\r\n\t\tlink.textContent = inputValue;\r\n\r\n\t\tlabel.append(link);\r\n\r\n\t\tdiv.append(input);\r\n\t\tdiv.append(label);\r\n\r\n\t\tconst button = document.createElement(\"button\");\r\n\t\tbutton.classList.add(\"delete-task\");\r\n\r\n\t\tconst img = document.createElement(\"img\");\r\n\t\timg.classList.add(\"delete\");\r\n\t\timg.src=\"./assets/delete.svg\";\r\n\r\n\t\tbutton.append(img);\r\n\r\n\t\titem.append(div);\r\n\t\titem.append(button);\r\n\r\n\t\treturn item;\r\n\r\n\t}\r\n\r\n\t/**\r\n\t* update the database \r\n\t*\r\n\t* @param {string} url - the url of the php page\r\n\t* @param {string} data - the data we want to send\r\n\t*/\r\n\tconst updateDB = async (url, data) => { \r\n\t\tconst options = {\r\n\t\t\tmethod : \"POST\",\r\n\t\t\theaders : {\r\n\t\t\t\t\"Content-Type\": \"application/json;charset=utf-8\"\r\n\t\t\t},\r\n\t\t\tbody : JSON.stringify(data)\r\n\t\t}\r\n\r\n\t\tconst response = await fetch(url, options);\r\n\r\n\t\treturn response.status;\r\n\t}\r\n\r\n\tinit()\r\n\r\n\r\n}\r\n\r\n\r\nconst list = document.querySelector(\".task-list\");\r\n\r\ninitTask(list);\n\n//# sourceURL=webpack://exemple-menu-hamburger/./js/task.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/task.js"]();
/******/ 	
/******/ })()
;