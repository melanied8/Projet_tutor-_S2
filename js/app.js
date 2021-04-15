import {initForm} from "./form"
import {initList} from "./list"

console.log('hello world')


export const initApp = (itemAddElement, listElement) => {

	const list = initList(listElement)

	initForm(itemAddElement, list.addItem)

	const list2 = initList()
}



