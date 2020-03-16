import React, {createContext, useReducer} from 'react';

let  initialState = {};
const store = createContext(initialState);
const { Provider } = store;


const StoreStateContext = React.createContext();
const StoreActionsContext = React.createContext();

const StateProvider = ({ defaultState, reducer, actions, children }) => {

    const [state, dispatch] = useReducer(reducer, defaultState);

    actions = actions(dispatch);


    return (
        <StoreStateContext.Provider value={state}>
            <StoreActionsContext.Provider value={actions}>
                {children}
            </StoreActionsContext.Provider>
        </StoreStateContext.Provider>
    )
}


export function useStoreContext() {
    return React.useContext(StoreStateContext)
}

export function useStoreActions() {
    return React.useContext(StoreActionsContext)
}
// const StateProvider = ( { defaultState, children } ) => {
//     initialState = defaultState;
//     const [state, dispatch] = useReducer((state, action) => {
//         switch(action.type) {
//             case 'GET_TEXT_DATA':
//                 let newState = {...state};
//                 if (action.data.split(',').length > 3) {
//                     newState.validateGeo =  true;
//                 } else {
//                     newState.validateGeo =  false;
//                     newState.geo = action.data.trim().split(',');
//                 }
//                 return newState;
//             case 'UPDATE_DATE' :
//                 if (action.updateProperty === 'dateFrom') {
//                     newState = {...state, [action.updateProperty]: action.updatedValue, minDate: action.updatedValue, dateTo: action.updatedValue };
//                 } else {
//                     newState = {...state, [action.updateProperty]: action.updatedValue};
//                 }
//                 return newState;
//             case 'UPDATE_SELECT' :
//                 newState = {...state};
//                 newState.guests = action.data;
//                 return newState;
//             default:
//                 throw new Error();
//         };
//     }, initialState);
//
//     return <Provider value={{ state, dispatch }}>{children}</Provider>;
// };

export { store, StateProvider, StoreStateContext }
