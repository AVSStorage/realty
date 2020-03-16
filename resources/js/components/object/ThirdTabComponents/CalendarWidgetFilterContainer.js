import CalendarWidgetFilter from "./CalendarWidgetFilter";
import React, {useEffect} from "react";
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import {reducers} from "../../helpers/reducers";
import {generateDefaultState} from "../../helpers/utilities";

export default function CalendarWidgetFilterContainer() {


    const globalState = useStoreContext();

    let {occupation} = globalState;
    let {updateCalendarData} = useStoreActions();


    let data = Object.keys(occupation).length > 0 ? occupation : {
        dateFrom: occupation.dateFrom,
        dateTo: occupation.dateTo,
        minDate: occupation.minDate,
        info: [
            {
                id: 1,
                price: '',
                days: '',
                surcharge: '',
                checked: false
            }
        ]
    };

    let defaultState = {
        disableDateTo: false,
        togglePanel: 1,
        ...data
    }



    return (
        <StateProvider defaultState={defaultState} reducer={(state, action) => {
            switch (action.type) {
                case 'UPDATE_STATE':
                    return reducers.UPDATE_STATE(action, state)
                case 'UPDATE_STATE_ITEM':
                    return reducers.UPDATE_STATE_ITEM(action,state);
                case 'UPDATE_DATE_OR_SELECT' :
                    return reducers.UPDATE_DATE_OR_SELECT(action,state)
            }
        }} actions={(dispatch) => ({
            updateStateOfItem: (data) => {
                dispatch({type: 'UPDATE_STATE', data});
            },
            changeDate: (date, type) => {

                dispatch({type: 'UPDATE_DATE_OR_SELECT', updateProperty: type, updatedValue: date});
                let selectionRange = occupation.selectionRange;

                if (type === "dateFrom") {
                    selectionRange[0] =  {
                        startDate: date,
                        endDate: date,
                        key: 'selection',
                        text: '1234'
                    };
                    updateCalendarData({...occupation, [type]: date, dateTo: date,   selectionRange })
                } else {
                    selectionRange[0] =  {
                        startDate: selectionRange[0].startDate,
                        endDate: date,
                        key: 'selection',
                        text: '1234'
                    };
                    updateCalendarData({...occupation, [type]: date, selectionRange})
                }
            },
            freezeDateTo: (disableDateTo, dateFrom) => {
                let aYearFromNow = new Date();
                aYearFromNow.setFullYear(aYearFromNow.getFullYear() + 1);
                disableDateTo = !disableDateTo;

                dispatch({
                    type: 'UPDATE_STATE_ITEM', name: "disableDateTo", data: disableDateTo
                });
                dispatch({
                    type: 'UPDATE_DATE_OR_SELECT',
                    updateProperty: "dateTo",
                    updatedValue: disableDateTo ? null : dateFrom
                });
               updateCalendarData({...occupation, dateTo: disableDateTo ? null : dateFrom })

            },
            addNewInfo : (evt, days, type, info) => {
                evt.stopPropagation();
                let index = info.findIndex((infos) => infos.id === days);
                let part = info[index];
                part[type] = evt.target.value;
                info[index] = part;
                dispatch({
                    type: 'UPDATE_STATE_ITEM', name: "info", data: info
                });

            },
            resetForm : (evt) => {
                evt.preventDefault();
                dispatch({
                    type: 'UPDATE_STATE_ITEM', name: "togglePanel", data: 1
                });
                dispatch({
                    type: 'UPDATE_STATE_ITEM', name: "info", data: [
                        {
                            id: 1,
                            price: '',
                            days: '',
                            surcharge: '',
                            checked: false
                        }
                    ]
                });
            },
            updateInfo: (evt, day, togglePanel, info) => {

                togglePanel = day;
                let index = info.findIndex((infoItem) => infoItem.id === day);

                if (index === -1) {

                    dispatch({
                        type: 'UPDATE_STATE_ITEM', name: "info", data: [...info, {
                            id: day,
                            price: '',
                            days: '',
                            surcharge: '',
                            checked: evt.target.checked
                        }]
                    });

                    updateCalendarData({...occupation, info: [...info, {
                            id: day,
                            price: '',
                            days: '',
                            surcharge: '',
                            checked: evt.target.checked
                        }], togglePanel})
                } else {
                    if (!evt.target.checked) {
                        if (index !== 0) {
                            info.splice(index, 1);
                        } else {
                            info[0] = index !== 0 ? info[0] : {...info[0], checked: false};
                        }
                        let index2 = info.findIndex((infoItem) => infoItem.checked === true);

                        togglePanel = index2 !== -1 ? (index2 === 0 ? 1 : index2) : 1;
                    } else {
                        info[0] = index !== 0 ? info[0] : {...info[0], checked: true};
                    }



                    dispatch({type: 'UPDATE_STATE_ITEM', name: "info", data: info});
                    updateCalendarData({...occupation, info: info, togglePanel})
                }


                dispatch({type: 'UPDATE_STATE_ITEM', name: "togglePanel", data: togglePanel});
            }
        })}>
            <CalendarWidgetFilter {...{updateCalendarData, defaultState}}/>
        </StateProvider>
    )
}
