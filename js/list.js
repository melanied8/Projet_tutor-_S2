export const initList = (listElement) => {

  const addItem = (label) => {
    const item = makeItem(label)

    listElement.prepend(item)

    getTree({ nom: label}, 'http://localhost/workspace/ptut/handler/processAddTask.php')
  }

  return {addItem}
}


const makeItem = (label) => {
  const element = createItemElement(label)

  const input = element.querySelector("input")
  const button = element.querySelector("button")
  const link = element.querySelector("a")

  const init = () => {
    button.addEventListener("click", destroy)
    link.addEventListener("click", open)
  }

  const destroy = () => {
    element.remove()

    button.removeEventListener("click", destroy)
  }

const open = () => {
  const sideBar = document.querySelector(".edit")
  sideBar.classList.add("open-link")
}

  init()

  return element
}

const createItemElement = (itemLabel) => {
  const item = document.createElement("li")

  item.classList.add("nav-box", "flex-item", "item-size", "space-between")

  const div = document.createElement("div")
  div.classList.add("flex-item")

  const input = document.createElement("input")
  input.type = "radio"
  input.classList.add("radio-size", "radio")

  const label = document.createElement("label")
  label.for = "radio"

  const link = document.createElement("a")
  link.classList.add("open-link")
  link.append(itemLabel)

  const button = document.createElement("button")
  button.type = "button"
  button.classList.add("delete-task")

  const img = document.createElement("img")
  img.classList.add("delete")
  img.setAttribute("src", "../assets/delete.svg")


  label.append(link)
  div.append(input, label)
  button.append(img)
  item.append(div, button)

  return item
}

const addItemToDb = (label, url) => {

           const options = {
               method: 'POST',
               body: JSON.stringify(label)
           }

           fetch(url, options)
               .then(response => {
                   console.log(response);
                   console.log('la reponse est : ' + response.ok)
                   console.log('le status est : ' + response.status)
                   console.log('le statusText est : ' + response.statusText)
                   console.log('le Text est : ' + response.responseText)
                   if (response.ok) {
                       console.log('Tout ce passe bien')
                       return response.json()
                   } else {
                       console.log('Erreur : ' + response.statusText)
                   }
                   return response.json()
               })
               .then(json => {
                   if (json.success === true) {
                       console.log('les json est : ', json.success);
                   } else {
                       console.log('le json est ', json.message);
                   }
               })
               .catch(error => console.log('erreur de fetch', error))
               .catch(error => console.log('erreur de json', error))
       }