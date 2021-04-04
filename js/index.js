import "../css/style.css"


const sideBar = document.querySelector(".edit")
const closeButton = document.querySelector(".close")

const close = () => {
	sideBar.classList.add("open")
}

closeButton.addEventListener("click", close)




