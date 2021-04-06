import {initForm} from "./form"
import {initList} from "./list"


export const initApp = (itemAddElement, listElement) => {

	const list = initList(listElement)

	initForm(itemAddElement, list.addItem)

	const list2 = initList()
}
