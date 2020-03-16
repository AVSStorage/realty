import React, {useEffect} from 'react';
import MainInfoTab from "./MainInfoTab";
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import {reducers} from "../../helpers/reducers";
import {generateDefaultState} from "../../helpers/utilities";

export default function MainInfoTabContainer({data}) {

    const globalState = useStoreContext();
    const {objectInInfo: items, filledServices, types, services, loading} = globalState;
    const {saveSecondTabToState, updateState} = useStoreActions()




    useEffect(() => {
        data.then((value) => {
            updateState(value);

        })


    }, [])



    let defaultState = {
        services: filledServices.length > 0 ? filledServices :  generateDefaultState(items),
        guests : [...services], items : [...items], types : [...types]};


    return (
        <StateProvider defaultState={defaultState}
                       actions={(dispatch) => ({

                           updateStateOfItem: (data) => {
                               dispatch({type: 'UPDATE_STATE', data});
                           },
                           updateText: (evt, index, services) => {
                               let values = services[0].values;
                               values.set(index, evt.target.value);
                               services[0].values = values;
                               dispatch({type: "UPDATE_INPUT", name: 'services', data: [...services]})
                           },
                           updateCheckBox: (evt, index, services, type) => {
                               let values = services[type].values;
                               values.set(index, evt.target.checked ? 1 : 0);
                               services[type].values = values;
                               dispatch({type: "UPDATE_INPUT", name: 'services', data: [...services]})
                           }
                       })}
                       reducer={(state, action) => {
                           switch (action.type) {
                               case 'UPDATE_INPUT':
                                   return reducers.UPDATE_STATE_ITEM(action, state);
                               case 'UPDATE_STATE':
                                   return reducers.UPDATE_STATE(action, state)
                               default:
                                   throw new Error();
                           }
                       }}>


                <MainInfoTab {...{defaultState,saveSecondTabToState, loading}}/>

        </StateProvider>
    );
};
