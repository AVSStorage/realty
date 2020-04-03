import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';
import CustomDatePicker from "./DatePicker";
import {Select, MenuItem} from '@material-ui/core';
import GoogleMaps from "./CustomAutoComplete";
import FilterForm from "./FilterForm";
import {StateProvider, useStoreContext} from "../../store/store";
import {reducers} from "../helpers/reducers";
import {actions} from "../helpers/actions";

export default class Filter extends Component {
    constructor(props) {
        super(props);

        let tomorrow = new Date();

        // let search = this.props.region && (Number(this.props.region) !== 1) ? this.props.region : '';
        //
        // search += this.props.city && (Number(this.props.city) !== 1) ? ',' + this.props.city : '';
        // search += this.props.place && (Number(this.props.place) !== 1) ? this.props.region : '';
        this.state = {
            dateFrom: this.props.from ? new Date(Number(this.props.from)) : new Date(),
            dateTo: this.props.to ? new Date(Number(this.props.to)) : tomorrow.setDate(tomorrow.getDate() + 1),
            minDate: new Date(),
            guests: this.props.guests ? Number(this.props.guests) : 1,
            geo: this.props.city ? {city: this.props.city} : '',
            validateGeo: false,
            sessionData: {},
            hiddenForm : true
        }


        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleSubmit(evt, currentState) {
        evt.preventDefault();


        let newState = JSON.stringify({...currentState  , dateFrom: currentState.dateFrom.getTime() + Math.abs(currentState.dateFrom.getTimezoneOffset()*60000) , dateTo: typeof currentState.dateTo === 'number' ? currentState.dateTo : currentState.dateTo.getTime()  + Math.abs(currentState.dateTo.getTimezoneOffset()*60000)});
        delete currentState.minDate;
        delete currentState.validateGeo;
        delete currentState.hiddenForm;
        delete currentState.sessionData;
        let state = {...currentState};
        let param = new URLSearchParams();

        for (const property in state) {
            if (property === 'dateFrom' || (isNaN(parseInt(state['dateTo'])) && property === 'dateTo')) {
                param.append(property, state[property] ? state[property].getTime() : 0);
                //param += `${property}=${state[property] ? state[property].getTime() : 0}&`
            } else if (property === 'geo') {
              //  state[property][0] && param.append('region', state[property][0]);


                state[property].city !== undefined && param.append('city', state[property].city);
             //   state[property][2] && param.append('place', state[property][2]);
                //    param += `region=${this.state[property][0] ? this.state[property][0] : 1}&city=${this.state[property][1] ? this.state[property][1] : 1}&place=${this.state[property][2] ? this.state[property][2] : 1}`
            } else {
                param.append(property, state[property]);
                //  param += `${property}=${state[property]}&`
            }

        }

        newState = JSON.parse(newState);

        axios.post('/objects/session/update', {sessionData: JSON.stringify({...newState,geo : newState.geo.city, dateTo: newState.dateTo,  dateFrom: newState.dateFrom , sessionData: newState.sessionData})}).then(() => {
            window.location.href = '/catalog?' + param.toString();
        })


    }

    render() {

        return (
            <StateProvider defaultState={this.state} reducer={(state, action) => {
                switch (action.type) {
                    case 'GET_TEXT_DATA':
                        let newState = {...state};
                        if (action.data.length > 3) {
                            newState.validateGeo = true;
                            newState.geo = action.data;
                        } else {
                            newState.validateGeo = false;
                            newState.geo = action.data;
                        }
                        return newState;
                    case 'UPDATE_DATE_OR_SELECT' :
                        return reducers.UPDATE_DATE_OR_SELECT(action, state);
                    case 'UPDATE_STATE_ITEM' :
                        return reducers.UPDATE_STATE_ITEM(action, state);
                    default:
                        throw new Error();
                }
                ;
            }} actions={(dispatch) => ({
                updateGuests : (name, data, session) => {
                    dispatch({type: 'UPDATE_STATE_ITEM', name, data});
                    dispatch({type: 'UPDATE_STATE_ITEM', name: 'sessionData', data: session});
                },
                updateField : (name,data) => {  dispatch({type: 'UPDATE_STATE_ITEM', name, data})},
                getTextValues: (data) => {dispatch({type: 'GET_TEXT_DATA', data: data})},
                handleDateAndSelectChange: (data, type) => actions.UPDATE_DATE_OR_SELECT(data,type,dispatch)
            })}>
                <FilterForm handleSubmit={this.handleSubmit}/>
            </StateProvider>
        )

    }
}

var root = document.getElementById('example3');

if (root) {
    ReactDOM.render(
        <Filter {...(root.dataset)} />,
        root
    );
}
