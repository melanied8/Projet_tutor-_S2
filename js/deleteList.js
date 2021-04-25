
const openDeleteList = document.querySelector(".delete-forever")
const wrapper = document.querySelector(".wrapper")
const cancelDeleteButton = document.querySelector(".cancel-delete")
const menuDeleteList = document.querySelector(".delete-list");
const header = document.querySelector(".header");

    const openMenuDeleteList = () => {
    menuDeleteList.classList.add("open-delete-list")
    wrapper.classList.add("dark-background")
    header.classList.add("dark-background")
    }
    
    if(openDeleteList)
    {
    openDeleteList.addEventListener("click", openMenuDeleteList)
    }

    const closeMenuDeleteList = () => {
        menuDeleteList.classList.remove("open-delete-list")
        wrapper.classList.remove("dark-background")
        header.classList.remove("dark-background")
        }
    
     if(cancelDeleteButton)
    {
        cancelDeleteButton.addEventListener("click", closeMenuDeleteList)
    }
        

