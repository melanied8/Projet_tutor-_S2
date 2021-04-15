import {initForm} from "./form"
import {initList} from "./list"

/**
 *
 * @param {itemAddElement} listDetails form
 * @param {listElement} listDetails list
 */
export const initApp = (itemAddElement, listElement) => {

	const list = initList(listElement)

	initForm(itemAddElement, list.addItem)

	const list2 = initList()
}



