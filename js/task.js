/**
* initiates the addition of new tasks
*
* @param {HTMLUListElement} UListElement - task list
*
*/
const initTask = (UListElement) => {

	const button = UListElement.querySelector(".js-task-button");
	const input = UListElement.querySelector(".js-task-input");


	const init = () => {
		updateAddButtonStatus()
		input.addEventListener("change", updateAddButtonStatus);
		button.addEventListener("click", handleSubmit);
	}


	const handleSubmit = async () => {
		const title = document.querySelector(".title-list");
		const id = title.id;
		const inputValue = input.value;
		const data = {
			input: inputValue, 
			id: id
		};
		const response = await updateDB('http://localhost/workspace/ptut/handler/processAddTask.php', data);
		if(response !== 200) { // we managed to access the page?
			//ecrire un message à l'utilisateur ?
			return;
		}
		const response2 = await fetch('http://localhost/workspace/ptut/handler/processGetId.php');
		if(response2 !== 200) { // we managed to access the page?
			//ecrire un message à l'utilisateur ?
			return;
		}
		const data2 = await response2.json();
		if(data2 === null) { // we managed to retrieve the id?
			// ecrire un message à l'utilisateur ?
			return;
		}
		// in this case we create the item
		const item = createItem(input.value);
		item.id=data2.dernierItem; // we add the id we retrieved to the item
		initItem(item);
		UListElement.prepend(item);
		input.value = "";
	}

	const updateAddButtonStatus = () => {
		button.disabled = (input.value.trim().length === 0);
	}


	/**
	*
	*initializes task deletion and updating
	*
	* @param {HTMLLIElement} LIElement - task list
	*/
	const initItem = (LIElement) => {
		const input = LIElement.querySelector(".radio");
		const button = LIElement.querySelector(".delete-task");

		const init = () => {
			input.addEventListener("change", updateTaskStatus);
			button.addEventListener("click", removeTask);
		}

		const destroy = () => {
			input.removeEventListener("change", updateTaskStatus);
			button.removeEventListener("click", removeTask);
		}

		/**
		* update the status of the task
		*
		* 
		*/
		const updateTaskStatus = (e) => {
			const id = LIElement.id;
			let status = 0;
			if(e.target.checked)
				status = 1;
			console.log(status);
			console.log(id);
			updateDB("http://localhost/workspace/ptut2/handler/processUpdateTaskStatus.php", {status: status, id: id});
		}


		/**
		* remove definitly the task
		*
		*/
		const removeTask = (e) => {
			const id = LIElement.id;
			console.log(id);
			LIElement.remove();
			updateDB('http://localhost/workspace/ptut/handler/processDeleteTask.php', {id: id}); // no data needed here
			destroy(LIElement);
		}

		init()

	}



	/**
	*
	* create an item
	*
	* @param {string} inputValue - the string in the input
	*
	*/
	const createItem = (inputValue) => {
		const item = document.createElement("li");
		item.classList.add("task","nav-box", "flex-item", "item-size", "space-between");

		const div = document.createElement("div");
		div.classList.add("flex-item");

		const input = document.createElement("input");
		input.classList.add("radio-size", "radio");
		input.type = "radio";
		input.name = "radio";
		input.id="radio";

		const label = document.createElement("label");
		label.for="radio";

		const link = document.createElement("a");
		link.classList.add("open-link");
		link.textContent = inputValue;

		label.append(link);

		div.append(input);
		div.append(label);

		const button = document.createElement("button");
		button.classList.add("delete-task");

		const img = document.createElement("img");
		img.classList.add("delete");
		img.src="./assets/delete.svg";

		button.append(img);

		item.append(div);
		item.append(button);

		return item;

	}

	/**
	* update the database 
	*
	* @param {string} url - the url of the php page
	* @param {string} data - the data we want to send
	*/
	const updateDB = async (url, data) => { 
		const options = {
			method : "POST",
			headers : {
				"Content-Type": "application/json;charset=utf-8"
			},
			body : JSON.stringify(data)
		}

		const response = await fetch(url, options);

		return response.status;
	}

	init()


}

const list = document.querySelector(".task-list");

initTask(list);