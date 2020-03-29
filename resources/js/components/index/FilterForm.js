import React, {Component, useContext} from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';
import CustomDatePicker from "./DatePicker";
import {Select, MenuItem} from '@material-ui/core';
import GoogleMaps from "./CustomAutoComplete";
import SliderWithData from "../SliderWithData";
import {useStoreActions, useStoreContext} from '../../store/store.js';
import GuestWidget from "./GuestWidget";
import {StateProvider} from "../../store/store";
import {reducers} from "../helpers/reducers";
import {declOfNum} from "../helpers/utilities";

const FilterForm = ({handleSubmit}) => {

    const globalState = useStoreContext();
    const {dateFrom, dateTo, minDate, guests, validateGeo, geo, hiddenForm} = globalState;
    let value = geo ? geo : '';
    const {getTextValues, handleDateAndSelectChange, updateGuests} = useStoreActions();
    return (
        <form onSubmit={(evt) => handleSubmit(evt, globalState)} className="row align-items-center pl-4"
              style={{position: "relative"}}>
            <div className="automplete-google">
                <GoogleMaps getInputValue={(data) => getTextValues(data)} value={value} validate={validateGeo}/>
            </div>
            <CustomDatePicker selectedDate={dateFrom} minDate={new Date()}
                              handleDateChange={(date) => handleDateAndSelectChange(date, 'dateFrom')}/>
            <CustomDatePicker selectedDate={dateTo} minDate={minDate}
                              handleDateChange={(date) => handleDateAndSelectChange(date, 'dateTo')}/>
            <StateProvider defaultState={{
                man: 0,
                women: 0,

                children: {
                    count: 0,
                    ages: []
                }
            }} actions={(dispatch) => ({
                updatePersons: (name, data, {man, women, children }) => {
                    name === 'woman' ?  updateGuests('guests', man + data + children.count) : updateGuests('guests', women + data + children.count);
                    dispatch({type: 'UPDATE_STATE_ITEM', name, data});

                },
                updateChildren : (data, children, field, {man, women}, update = true) => {

                    dispatch({type: 'UPDATE_STATE_ITEM', name: 'children', data: {...children, [field]: data}});
                    if (update) {
                        updateGuests('guests', man + women + data);
                    }
                }
            })} reducer={(state, action) => {
                switch (action.type) {
                    case 'UPDATE_STATE_ITEM' :
                        return reducers.UPDATE_STATE_ITEM(action, state);
                    default:
                        throw new Error();
                }
                ;
            }}>
                <TextField onFocus={() => updateGuests('hiddenForm', false)}   InputProps={{
                    readOnly: true,
                }} className="guests mr-2" value={guests + ' ' + declOfNum(guests, ['гость','гостя','гостей'])}/>
                <GuestWidget showed={hiddenForm} hideForm={updateGuests}/>
            </StateProvider>
            <button type="submit" className="btn  form--btn-index  house--btn  btn--header">Найти</button>
        </form>


    );
};


export default FilterForm;
