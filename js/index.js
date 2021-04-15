import {initApp} from "./app"

const itemAddElement = document.querySelector(".add-item")
const listElement = document.querySelector(".task-list")

initApp(itemAddElement, listElement)


const sideBar = document.querySelector(".edit")
const closeButton = document.querySelector(".close")
const cancelButton = document.querySelector(".cancel-button")

const close = () => {
	sideBar.classList.remove("open-link")
}

closeButton.addEventListener("click", close)
cancelButton.addEventListener("click", close)



