/*Sidebar on left*/

const openMenuButton = document.querySelector(".menu-open-button")
const closeMenuButton = document.querySelector(".menu-close-button")
const menu = document.querySelector(".sidebar")
const wrapper = document.querySelector(".wrapper")


const openMenu = () => {
menu.classList.add("menu-open")
wrapper.classList.add("background_dark")
}

if(openMenuButton)
{
openMenuButton.addEventListener("click", openMenu)
}

/*add background effect + sidebar open for mobile version*/
const closeMenu = () => {
menu.classList.remove("menu-open")
wrapper.classList.remove("background_dark")

}

/*close the sidebar when you click on the button*/
if(closeMenuButton)
{
  closeMenuButton.addEventListener("click", closeMenu)
}

