/**
	*
	*initializes task deletion and updating
	*
	* @param {HTMLLIElement} LIElement - task list
	*/
export const initItem = (LIElement) => {
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
			if(e.target.checked) {
				LIElement.classList.add("done");
				status = 1;
			}
			else
				LIElement.classList.remove("done");
			updateDB("http://localhost/workspace/ptut/handler/processUpdateTaskStatus.php", {status: status, id: id});
		}


		/**
		* remove definitly the task
		*
		*/
		const removeTask = (e) => {
			const id = LIElement.id;
			LIElement.remove();
			updateDB('http://localhost/workspace/ptut/handler/processDeleteTask.php', {id: id}); // no data needed here
			destroy(LIElement);
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

// we do it for each item loaded with php
const lis = Array.from(document.querySelectorAll(".task"));
  lis.map(li => {
  	initItem(li);
})