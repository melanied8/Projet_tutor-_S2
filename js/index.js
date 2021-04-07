import "../css/style.css"



const sideBar = document.querySelector(".edit")
const closeButton = document.querySelector(".close")
const openLink = document.querySelector(".open-link")
const cancelButton = document.querySelector(".cancel-button")


const close = () => {
	sideBar.classList.remove("open-link")
}

const open = () => {
	sideBar.classList.add("open-link")
}

if(closeButton)
{
  closeButton.addEventListener("click", close)
}

if(openLink)
{
  openLink.addEventListener("click", open)
}

if(cancelButton)
{
  cancelButton.addEventListener("click", close)
}




/*Barre de menu à gauche*/

const openMenuButton = document.querySelector(".menu-open-button")
const closeMenuButton = document.querySelector(".menu-close-button")
const menu = document.querySelector(".sidebar")
const wrapper = document.querySelector(".wrapper")
const newList = document.querySelector(".new-list")
let writeList = document.getElementById("write-new-list");

const openMenu = () => {
  menu.classList.add("menu-open")
  wrapper.classList.add("background_dark")
}

if(openMenuButton)
{
  openMenuButton.addEventListener("click", openMenu)
}


const closeMenu = () => {
  menu.classList.remove("menu-open")
  wrapper.classList.remove("background_dark")
  
}

  if(closeMenuButton)
  {
    closeMenuButton.addEventListener("click", closeMenu)
  }


  const writeNewList = () => {
    if(getComputedStyle(writeList).display != "none")
    {
      writeList.style.display = "none";
    }
    else 
    {
      writeList.style.display = "block";
    }
  }

  newList.addEventListener("click",writeNewList)






