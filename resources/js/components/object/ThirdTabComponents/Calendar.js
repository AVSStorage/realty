import React, {useMemo, Fragment} from 'react';
import TextField from "@material-ui/core/TextField";
import CalendarWidget from './CalendarWidget'
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import LabelWithCheckBox from "../components/LabelWithCheckBox"
import {reducers} from "../../helpers/reducers";
import {KeyboardTimePicker, MuiPickersUtilsProvider} from "@material-ui/pickers";
import DateFnsUtils from '@date-io/date-fns';
import TmiPickerContainer from '../../TimePicker';
export default function CalendarTab({defaultState, loading, saveThirdTabToState, updateThirdTabToState}) {


    const globalState = useStoreContext();
    let {items, calendar, services, minTime, maxTime, occupation} = globalState;
    let {updateStateOfItem, handleCheckboxValue, handleTextChange, handleTimeChange} = useStoreActions();
    useMemo(() => updateStateOfItem(defaultState), [defaultState]);


    console.log(calendar);
    const ids = new Map([
        [204, '2000 руб.'],
        [205, '3 гостей'],
        [206, '14:00'],
        [207, '500 руб.'],
        [208, '3 суток'],
        [209, '10:00']
    ]);


    return (
        <form style={{position: "relative"}} onSubmit={(evt) => {
            evt.preventDefault();evt.stopPropagation();saveThirdTabToState(services, occupation)
        }}>
            <div className={`preloader ${loading ? 'active' : ''}`}>

                <div className="blobs m-auto">
                    <div className="blob-center"></div>
                    <div className="blob"></div>
                    <div className="blob"></div>
                    <div className="blob"></div>
                    <div className="blob"></div>
                    <div className="blob"></div>
                    <div className="blob"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"/>
                            <feColorMatrix in="blur" mode="matrix"
                                           values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"/>
                            <feBlend in="SourceGraphic" in2="goo"/>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div className="characteristic">

                <div className="container">
                    <div className="chara__inner">
                        <div className="chara__left">
                            <div className="chara__title" id="charaTitle">
                                Принимается оплата
                            </div>

                            <div className="services">
                                <div className="serivce__inner">
                                    {items[0].slice(0, 2).map((service) => (
                                        <LabelWithCheckBox key={service.id} {...{
                                            checked: services[0].values.get(service.id),
                                            onChange: handleCheckboxValue,
                                            name: service.name,
                                            index: 0,
                                            id: service.id,
                                            services
                                        }}/>
                                    ))
                                    }

                                </div>

                                <div className="serivce__inner">
                                    {items[0].slice(2, 4).map((service) => (
                                        <LabelWithCheckBox key={service.id} {...{
                                            checked: services[0].values.get(service.id),
                                            onChange: handleCheckboxValue,
                                            name: service.name,
                                            index: 0,
                                            id: service.id,
                                            services
                                        }}/>
                                    ))}
                                </div>
                            </div>


                            <div className="chara__title" id="charaTitle">
                                Цены
                            </div>

                            <div className="chara__km-inner">

                                <div className="attraction__left">
                                    {items[1].slice(0, 3).map((service) => {
                                        return (
                                            <div key={service.id}>
                                                <div className="attraction">
                                                    {service.name}
                                                </div>
                                                {Number(service.id) === 206 || Number(service.id) === 209 ? (


                                                    <TmiPickerContainer value={services[1].values.get(service.id)} onChange={(time, timeString) => {
                                                        let type = Number(service.id) === 209 ? 206 : 209;
                                                        handleTimeChange(time._d.getTime(), service.id, 1, services, type)
                                                    }} format={"HH:mm"}/>

                                                       ) : (
                                                    <TextField
                                                        value={!services[1].values.get(service.id) ? (service.id === 209 ? maxTime : "") : services[1].values.get(service.id)}
                                                        required={service.id === 204}
                                                        onChange={(evt) => handleTextChange(evt.target.value, service.id, 1, services)}
                                                        type={Number(service.id) === 206 || Number(service.id) === 209 ? 'time' : 'number'}
                                                        className="attraction-km" variant="outlined"
                                                        placeholder={ids.get(service.id)} margin="normal"/>
                                                )}
                                            </div>
                                        )
                                    })}
                                </div>

                                <div className="attraction__right">
                                    {items[1].slice(3, 6).map((service) => (
                                        <div key={service.id}>
                                            <div className="attraction">
                                                {service.name}
                                            </div>
                                            {Number(service.id) === 206 || Number(service.id) === 209 ? (
                                                <TmiPickerContainer value={services[1].values.get(service.id)} onChange={(time, timeString) => {
                                                    let type = Number(service.id) === 209 ? 206 : 209;
                                                    handleTimeChange(time._d.getTime(), service.id, 1, services, type)
                                                }} format={"HH:mm"}/>
                                                ) : (
                                                <TextField
                                                    value={!services[1].values.get(service.id) ? (service.id === 209 ? maxTime : "") : services[1].values.get(service.id)}
                                                    required={service.id === 204}
                                                    onChange={(evt) => handleTextChange(evt.target.value, service.id, 1, services)}

                                                    type={Number(service.id) === 206 || Number(service.id) === 209 ? 'time' : 'number'}
                                                    className="attraction-km" variant="outlined"
                                                    placeholder={ids.get(service.id)} margin="normal"/>
                                            )}

                                        </div>
                                    ))}
                                </div>
                            </div>


                            <div className="chara__title sub" id="charaAtt">
                                Услуги за дополнительную плату<br/>
                                <span className="chara__subtitle-text">
		*если эти услуги уже включены в стоимость или Вы их не предоставляете, просто пропустите
	</span>
                            </div>


                            <div className="services">
                                <div className="services__inner">
                                    {items[2].slice(0, 2).map((service) => (
                                        <div key={service.id} className="service serv">
                                            <LabelWithCheckBox {...{
                                                checked: services[2].values.get(service.id),
                                                onChange: handleCheckboxValue,
                                                name: service.name,
                                                index: 2,
                                                id: service.id,
                                                services
                                            }} />
                                        </div>

                                    ))}

                                </div>
                                <div className="services__inner">
                                    {items[2].slice(2, 4).map((service) => (
                                        <div key={service.id} className="service serv">
                                            <LabelWithCheckBox {...{
                                                checked: services[2].values.get(service.id),
                                                onChange: handleCheckboxValue,
                                                name: service.name,
                                                index: 2,
                                                id: service.id,
                                                services
                                            }} />
                                        </div>

                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <StateProvider defaultState={calendar} reducer={(state, action) => {
                    switch (action.type) {
                        case 'UPDATE_STATE':
                            return reducers.UPDATE_STATE(action, state)
                        case 'UPDATE_STATE_ITEM':
                            return reducers.UPDATE_STATE_ITEM(action, state);
                    }
                }} actions={(dispatch) => ({
                    updateDate: (ranges, selectionRange, disabledDates) => {

                        let index = selectionRange.findIndex((range) => ranges[range.key]);
                        let newState = selectionRange;
                        if (index !== -1) {
                            newState[index] = ranges[newState[index].key];
                        } else {
                            newState = [...newState, ranges.selection]
                        }

                        dispatch({type: "UPDATE_STATE_ITEM", name: "selectionRange", data: newState});
                        updateThirdTabToState(services, { ...occupation,dateTo: newState[0]["endDate"], dateFrom: newState[0]["startDate"]},  selectionRange,  disabledDates);
                    },
                    updateStateOfItem: (data) => {
                        dispatch({type: 'UPDATE_STATE', data});
                    },
                    updateCalendar: (evt, selectionRange, disableDatesArray) => {
                        evt.preventDefault();
                        let item = {...selectionRange[0], color: "#FF3300", disabled: true, key: 'disables'};
                        disableDatesArray.push(item);
                        selectionRange.push(item);

                        dispatch({type: "UPDATE_STATE_ITEM", name: "disableDates", data: disableDatesArray});
                        dispatch({type: "UPDATE_STATE_ITEM", name: "selectionRange", data: selectionRange});
                        updateThirdTabToState(services, { ...occupation, dateTo: selectionRange[0]["endDate"], dateFrom: selectionRange[0]["startDate"]}, selectionRange, disableDatesArray);

                    }
                })}>
                    <CalendarWidget {...{calendar}}/>
                </StateProvider>
            </div>
            <button type={"submit"} className="chara__btn">
                Далее
            </button>
        </form>


    )
}
