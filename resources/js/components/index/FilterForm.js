import React, {Component, useContext} from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';
import CustomDatePicker from "./DatePicker";
import {Select, MenuItem} from '@material-ui/core';
import GoogleMaps from "./CustomAutoComplete";
import SliderWithData from "../SliderWithData";
import {useStoreActions, useStoreContext} from '../../store/store.js';
import GuestWidget from "./GuestWidget";

const FilterForm = ({handleSubmit}) => {

    const globalState = useStoreContext();
    const {dateFrom, dateTo, minDate, guests, validateGeo, geo} = globalState;
    let value = geo ? geo : '';
    const {getTextValues, handleDateAndSelectChange} = useStoreActions();
    return (
        <form onSubmit={(evt) => handleSubmit(evt, globalState)} className="row align-items-center pl-4" style={{position: "relative"}}>
            <div className="automplete-google">
                <GoogleMaps getInputValue={(data) => getTextValues(data)} value={value} validate={validateGeo}/>
            </div>
            <CustomDatePicker selectedDate={dateFrom} minDate={new Date()}
                              handleDateChange={(date) => handleDateAndSelectChange(date, 'dateFrom')}/>
            <CustomDatePicker selectedDate={dateTo} minDate={minDate}
                              handleDateChange={(date) => handleDateAndSelectChange(date, 'dateTo')}/>
            {/*<Select value={guests} onChange={(data) => handleDateAndSelectChange(data, 'guests')} labelId="label"*/}
            {/*        id="select" className="guests">*/}
            {/*    <MenuItem value="1">1 гость</MenuItem>*/}
            {/*    <MenuItem value="2">2 гостя</MenuItem>*/}
            {/*    <MenuItem value="3">3 гостя</MenuItem>*/}
            {/*    <MenuItem value="4">4 гостя</MenuItem>*/}
            {/*    <MenuItem value="5">5 гостей</MenuItem>*/}
            {/*    <MenuItem value="6">6 гостей</MenuItem>*/}
            {/*    <MenuItem value="7">10 гостей и больше</MenuItem>*/}
            {/*</Select>*/}
            <TextField className="guests" value={guests + ' гость'}/>
            <GuestWidget onChange={(data) => handleDateAndSelectChange(data, 'guests')}/>
            <button type="submit" className="btn  form--btn-index  house--btn  btn--header">Найти</button>
        </form>


);
};


export default FilterForm;
