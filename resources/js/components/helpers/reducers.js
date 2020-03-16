export const reducers = {
    'UPDATE_DATE_OR_SELECT' : (action,state) => {
        let newState = state;
        if (action.updateProperty === 'dateFrom') {
            newState = {
                ...state,
                [action.updateProperty]: action.updatedValue,
                minDate: action.updatedValue,
                dateTo: action.updatedValue
            };
        } else {
            newState = {...state, [action.updateProperty]: action.updatedValue};
        }

        return newState;
    },
    'UPDATE_CHECKBOX_DATA' : (action, state) => {
        let newState = {...state};
        newState.items[action.itemIndex].items[action.checkboxIndex].value = action.checked;

        if (action.checked) {
            newState.checkboxes.add(action.checkboxId)
        } else {
            newState.checkboxes.delete(action.checkboxId);
        }

        return newState;
    },
    'UPDATE_STATE' : (action, state) => {
        return {...state, ...action.data}
    },
    'ADD_NEW_ITEM': (action, state) => {
        let obj = {};
        obj[action.name] = action.data;
        return {...state, [action.field] : {...state[action.field], ...obj}}
    },
    'UPDATE_STATE_ITEM' : (action,state) => {
        let newState = {...state};

        newState[action.name] = action.data;
        return newState;
    },
    'UPDATE_NOT_EMPTY_STATE_ITEM' : (action,state) => {
    let newState = {...state};
    newState[action.name] = {...newState[action.name],...action.data};
    return newState;
    }
}
