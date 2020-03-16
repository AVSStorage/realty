import RangeFilter from "./RangeFilter";
import CheckBoxFilter from "./CheckBoxFilter";
import React from "react";
import {useStoreActions, useStoreContext} from "../../store/store";


export default function FormContainer({initialState, toggle}) {
    const {resetForm} = useStoreActions();

    return (
        <form className={"filter-form"} >
            <RangeFilter data={initialState} title={'Цена'}  inputMin={'priceMin'} inputMax={'priceMax'} /*maxFix={`макс. ${this.state.priceMaxFix} руб.`} */ />
            <RangeFilter data={initialState}  title={'До моря'} inputMin={'seaMin'} inputMax={'seaMax'}   /* maxFix={`макс. ${this.state.seaMaxFix} км`} *//>
            <RangeFilter data={initialState}  title={'До метро'} inputMin={'metroMin'} inputMax={'metroMax'} /* maxFix={`макс. ${this.state.metroMaxFix} км`} *//>
            {/*<RangeFilter title={'До достоприм-стей'} handleSliderChange={(evt, value) => this.handleSliderChange(evt,value,'placesMin', 'placesMax')} maxValue={this.state.placesMax} minValue={this.state.placesMin} maxFix={'макс. 5 км'} />*/}
            <CheckBoxFilter toggle={toggle}/>
            <div className="content__left-btn">
                <button className="content__del" onClick={(evt) => resetForm(evt,initialState)}> Очистить фильтры
                </button>
            </div>
        </form>
    )
}
