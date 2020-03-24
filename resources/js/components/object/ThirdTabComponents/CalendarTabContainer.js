import CalendarTab from "./Calendar";
import React, {useEffect} from "react";
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import {reducers} from "../../helpers/reducers";
import {generateDefaultState} from "../../helpers/utilities";


export default function CalendarTabContainer({data}) {


    const globalState = useStoreContext();
    let {mainInfo, calendarData, occupation, loading } = globalState;
    const {updateState, saveThirdTabToState, updateThirdTabToState} = useStoreActions()

    useEffect(() => {

        data.then((value) => {
            updateState(value);
        })


    }, [])


    const defaultState = {services: mainInfo.length > 0 ? mainInfo : generateDefaultState(calendarData, false,12) , items: calendarData, occupation,   calendar: {
            selectionRange : occupation.selectionRange,
            disableDates: occupation.disabledDates
        }, minTime: new Date(2020,2,12,12,0,0), maxTime: new Date()};


    return (
        <StateProvider defaultState={defaultState} actions={(dispatch) => ({
            updateStateOfItem: (data) => {
                dispatch({type: 'UPDATE_STATE', data});
            },
            handleCheckboxValue : (evt, index, type, service) => {
                let values =  service[type].values;
                values.set(index, evt.target.checked ? 1 : 0);
                service[type].values = values;
                dispatch({type: 'UPDATE_STATE_ITEM', name: "services", data: service});
            },
            handleTimeChange : (evt, index, type, service, timeType) => {
                let values = service[type].values;
                let hours = 30*60*1000;
                values.set(index, evt);

                if (timeType === 206) {
                    if (values.get(timeType) - values.get(index) < hours) {
                        values.set(timeType, evt + hours);
                    }
                } else {
                    if (values.get(index) + hours > values.get(timeType) ) {
                        values.set(timeType, evt - hours);
                    }
                }

                service[type].values = values;
                dispatch({type: 'UPDATE_STATE_ITEM', name: "services", data: service});
            },

            handleTextChange : (evt, index, type, service) => {
                let values = service[type].values;
                values.set(index, evt);
                service[type].values = values;
                dispatch({type: 'UPDATE_STATE_ITEM', name: "services", data: service});
            }
        })} reducer={(state, action) => {
            switch (action.type) {
                case 'UPDATE_STATE':
                    return reducers.UPDATE_STATE(action, state)
                case 'UPDATE_STATE_ITEM':
                    return reducers.UPDATE_STATE_ITEM(action,state);
            }
        }}>

            <CalendarTab {...{ defaultState, loading, saveThirdTabToState, updateThirdTabToState}}/>

        </StateProvider>
    );
};
