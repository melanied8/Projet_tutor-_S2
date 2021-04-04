export const initForm = (itemAddElement, onSubmit) => {

	const input = itemAddElement.querySelector(".js-task-input")
	const addButton = itemAddElement.querySelector(".js-task-button")

	const init = () => {
		updateAddButtonStatus()

    	input.addEventListener("input", updateAddButtonStatus)
    	addButton.addEventListener("click", handleSubmit)
	}

	const updateAddButtonStatus = () => {

    addButton.disabled = (input.value.trim().length === 0)

  	}

  	const handleSubmit = () => {
    const trimmedValue = input.value.trim()
    onSubmit(trimmedValue)
    input.value = ""
  }

  init()
}