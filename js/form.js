export const initForm = (itemAddElement, onSubmit) => {

		
			const input = itemAddElement.querySelector(".js-task-input")

			const addButton = itemAddElement.querySelector(".js-task-button")
			


const init = () => {

if(addButton)
{
  updateAddButtonStatus()
}


  if(input)
  {
	input.addEventListener("input", updateAddButtonStatus)
  }

  if(addButton)
  {
	addButton.addEventListener("click", handleSubmit)
  }
	
}

const updateAddButtonStatus = () => {

if(addButton)
{
  addButton.disabled = (input.value.trim().length === 0)
}


  }

  const handleSubmit = () => {
const trimmedValue = input.value.trim()
onSubmit(trimmedValue)
input.value = ""
}

init()
}