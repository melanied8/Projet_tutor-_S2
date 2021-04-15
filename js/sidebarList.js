
/*Barre de menu à gauche*/


const openMenuButton = document.querySelector(".menu-open-button")
const closeMenuButton = document.querySelector(".menu-close-button")
const menu = document.querySelector(".sidebar")
const wrapper = document.querySelector(".wrapper")
const newList = document.querySelector(".new-list")
let writeList = document.getElementById("write-new-list")



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