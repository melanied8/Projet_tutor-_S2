/**
 * send a request to the server to add a new task
 *
 * @param {label} task description
 * @param {url} php page url
 */
export const addTask = async (label, url) => {
  const options = {
    method: 'POST',
    body: JSON.stringify(label),
    headers: {
      "Content-Type": "application/json;charset=utf-8"
    }
  }
  
  fetch(url, options).then(response => {
                        console.log(response);
                        console.log('la reponse est : ' + response.ok)
                        console.log('le status est : ' + response.status)
                        console.log('le statusText est : ' + response.statusText)
                        console.log('le Text est : ' + response.responseText)
                        return response.text()
                    }).then(data => console.log(data))
}  