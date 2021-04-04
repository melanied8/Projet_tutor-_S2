import "../css/style.css"


const sideBar = document.querySelector(".edit")
const closeButton = document.querySelector(".close")
const openLink = document.querySelector(".open-link")

const close = () => {
	sideBar.classList.remove("open-link")
}

const open = () => {
	sideBar.classList.add("open-link")
}

closeButton.addEventListener("click", close)
openLink.addEventListener("click", open)




