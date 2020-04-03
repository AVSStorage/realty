import React, {Component} from 'react';

import {withStyles, makeStyles} from '@material-ui/core/styles';
import Slider from '@material-ui/core/Slider';
import Typography from '@material-ui/core/Typography';
import Tooltip from '@material-ui/core/Tooltip';
import FilterForm from "../index/FilterForm";
import ReactDOM from "react-dom";
import Input from '@material-ui/core/Input';
import RangeFilter from "./RangeFilter";
import CheckBoxFilter from "./CheckBoxFilter";
import CardsList from "./CadrsList";
import ReactCSSTransitionGroup from 'react-addons-css-transition-group';
import {StateProvider} from "../../store/store";
import {reducers} from "../helpers/reducers";
import {actions} from "../helpers/actions";
import FormContainer from "./FormContainer";
import {Pagination, declOfNum} from "../helpers/utilities";
import {WrapperStateContainer} from "./hocs/WrapperStateContainer";
import {StoreStateContext} from "../../store/store";

const formRef = '';
class ObjectsFilter extends Component {

    static contextType = StoreStateContext;

    constructor(props) {
        super(props);


        this.checkboxes = new Set();
        this.state = {
            loading: true,
            limit: 4,
            error: this.props.error ? this.props.error : '' ,
            hideOnMobile: true,
            sortedFilter: 0,
            transitionIn: 0,
            count: 4
        }

        this.hideOnMobile = this.hideOnMobile.bind(this);
        this.updateState = this.updateState.bind(this);
        this.initialState = this.updateState(this.props.filtereditems);
    }


    processData = (data, itemsNames) => {
        let allItems = [];
        let items = {
            id: '',
            title: '',
            items: []
        };

        itemsNames.forEach((name, i) => {
            items.id = name.id;
            items.title = name.service_type_name;
            data.forEach((item, index) => {

                if (Number(item.service_id) === Number(name.id)) {
                    items.items.push({
                        name: item.name,
                        id: item.id,
                        value: false
                    });
                }
            });
            allItems.push(items);
            items = {
                id: '',
                title: '',
                items: []
            };
        });


        return {items: allItems, itemsNames: itemsNames};

    }

    updateState(initialItems) {


        let promise1 = fetch('/objects/names', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.json())


        let promise2 = fetch('/objects/values', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.json())


        let promise3 = fetch('/objects/filters', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.json())

        let promise4 = fetch('/objects/objects/max', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.json())

        let promise5 = fetch('/objects/objects', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.json());
        // .then(obj => dispatch({type: 'UPDATE_STATE_ITEM', name, data: obj.objects}));
        return Promise.all([promise1, promise2, promise3, promise4, promise5]).then((data) => {

            var newState = {};

            let newStateObject = {
                ...this.processData(data[1], data[0].slice(1)),
                priceMin: Number(data[2].prices.min),
                priceMax: Number(data[2].prices.max),
                priceMinFix: Number(data[2].prices.min),
                priceMaxFix: Number(data[2].prices.max),
                seaMin: Number(data[2].seas.min),
                seaMax: Number(data[2].seas.max),
                seaMinFix: Number(data[2].seas.min),
                seaMaxFix: Number(data[2].seas.max),
                metroMin: Number(data[2].metros.min),
                metroMax: Number(data[2].metros.max),
                metroMinFix: Number(data[2].metros.min),
                loading: false,
                metroMaxFix: Number(data[2].metros.max),
                total: data[3].total, checkboxes: new Set(),
                data: initialItems ? JSON.parse(initialItems) : data[4].objects,
                filteredItems: initialItems ? Pagination(JSON.parse(initialItems), 1, 4) : Pagination(data[4].objects, 1, 4)
            }


            this.setState((state) => {
                newState = JSON.parse(JSON.stringify({...state, ...newStateObject}))
                return {...state, ...newStateObject}
            }, () => {
                $('.right__object').html('Найдено ' + this.state.filteredItems.total + ' ' + declOfNum(this.state.filteredItems.total, ['объект', 'объекта', 'объектов']));
            });

            newState.checkboxes = new Set();

            return newState
        }).then((newState) => newState);
    }


    hideOnMobile() {
        this.setState({hideOnMobile: !this.state.hideOnMobile});
    }


    toggleTab = (evt, pos) => {
        $(evt.target).find('.tabs').toggle('slide');
    }


    render() {



        return (

                <div style={{width: '100%', display: 'flex', flexWrap: 'wrap', position: 'relative'}}>

                    <div className={`preloader ${this.state.loading ? 'active' : ''}`}>

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

                    <div className={`content__left  d-md-block ${this.state.hideOnMobile ? "d-none" : "d-block"}`}>
                        <div className="content__left-inner">
                            {!this.state.hideOnMobile && (
                                <button onClick={this.hideOnMobile} type="button" className="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>)}
                            <img className={"d-none d-md-block"} src="img/content/map.png" alt="Карта"/>
                            <div className="d-none d-md-block content__left-object">
                                Все объекты на карте
                            </div>
                            <FormContainer toggle={this.toggleTab} initialState={this.initialState}/>
                        </div>
                    </div>

                    <CardsList error={this.state.error} hideOnMobile={this.hideOnMobile} region={this.props.region} days={this.props.days}/>


                </div>

        )

    }


}

const WrappedObjectsFilter = WrapperStateContainer({
    children: ObjectsFilter,
    defaultState :  {
        priceMin: 0,
        checkboxes: new Set(),
        priceMax: 100,
        seaMax: 100,
        seaMinFix: 0,
        seaMaxFix: 10,
        priceMaxFix: 10000,
        priceMinFix: 0,
        seaMin: 0,
        metroMin: 0,
        metroMax: 100,
        placesMax: 100,
        placesMin: 0,
        items: [],
        itemsNames: [],


        data: [],
        limit: 4,
        loading: true,

        count: 4,
        toggle: false,

        filteredItems: {data: [], paginateLinksArray: [], page: 1},
        hideOnMobile: true,
        transitionIn: 0,
        sortedFilter: 0,
        metroMinFix: 0,
        metroMaxFix: 1
    },
    actions: (dispatch) => ({
        updateState: function(data) {

            dispatch({type: 'UPDATE_STATE', data: data});
            this.setState({loading: false})
        },
        handleSliderChange: (value, min, max, cb) => {
            dispatch({type: 'UPDATE_SLIDER_DATA', value, min, max, cb});
        },

        handleCheckBoxChange: (event, itemIndex, checkboxIndex, checkboxId, cb) => {

            dispatch({
                type: 'UPDATE_CHECKBOX_DATA',
                checked: event.target.checked,
                itemIndex,
                checkboxIndex,
                checkboxId,
                cb
            });

        },
        loadMore: () => {
            dispatch({type: 'LOAD_MORE'})
        },
        resetForm: (evt, data) => {
            evt.preventDefault();
            data.then(state => {
                state.checkboxes = new Set();
                state.items.forEach(item => {
                    item.items.forEach( value =>
                        value.value = false
                    )
                });
                $('.right__object').html('Найдено ' + state.data.length + ' ' + declOfNum(state.data.length, ['объект', 'объекта', 'объектов']));
            dispatch({type: 'RESET_STATE', value: state}) } )
           // this.updateState().then((data) => data).then(response => )
        },
        paginateCheckboxes: (evt, length) => {
            evt.stopPropagation();
            evt.preventDefault();
            dispatch({type: 'PAGINATE_CHECKBOXES', length})
        },
        renderCards: (state) => {
            let {priceMin, priceMax, seaMax, seaMin, metroMin, metroMax, limit, total, checkboxes} = state;
            fetch(`/objects/filter`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    priceMin: priceMin,
                    priceMax: priceMax,
                    seaMax: seaMax,
                    seaMin: seaMin,
                    metroMin: metroMin,
                    metroMax: metroMax,
                    checkboxes: Array.from(checkboxes)
                })
            }).then(response => response.json()).then(obj => {

                $('.right__object').html('Найдено ' + obj.objects.length + ' ' + declOfNum(obj.objects.length, ['объект', 'объекта', 'объектов']));

                dispatch({type: 'SEND_DATA', data: obj.objects, empty: obj.objects.length === 0})
            });

        },
        sortArray: (data) => {
            dispatch({type: 'SORT_ARRAY', name: 'filteredItems', by: data.target.value})
        },
        paginateCards: (page, per_page) => {
            dispatch({type: 'PAGINATE', page, per_page, name: 'filteredItems'})
        }
    }),
    reducer: (state, action) => {
        switch (action.type) {
            case 'UPDATE_STATE_ITEM':
                return reducers.UPDATE_STATE_ITEM(action,state);
            case 'UPDATE_STATE' :

                let newState = {...action.data};
                return newState;
            case 'UPDATE_CHECKBOX_DATA':
                newState = reducers.UPDATE_CHECKBOX_DATA(action,state);
                action.cb(newState);
                return newState;
            case 'UPDATE_SLIDER_DATA':
                newState = {...state};

                let range = (Number(state[action.max + 'Fix']) - Number(state[action.min + 'Fix'])) / 100;

                newState[action.min] = Math.floor(state[action.min + 'Fix'] + action.value[0] * range);
                newState[action.max] = Math.floor(state[action.min + 'Fix'] + action.value[1] * range);
                newState.limit = 4;

                action.cb(newState);

                return newState;
            case 'PAGINATE':
                return {
                    ...state,
                    [action.name]: Pagination(state.data, action.page, action.per_page),
                    transitionIn: state.transitionIn + 1
                }
            case 'PAGINATE_CHECKBOXES':
                return {...state, count: state.count < action.length ? state.count + 2 : action.length};
            case 'RESET_STATE':
                return {...action.value}
            case 'LOAD_MORE':
                let newLimit = state.data.length < state.limit - 4 ? state.data.length % state.limit : state.limit + 4;
                return {...state, filteredItems: Pagination(state.data, 1, newLimit), limit: newLimit}
            case 'SEND_DATA':
                return {
                    ...state,
                    filteredItems: Pagination([...action.data], 1, state.limit),
                    data: [...action.data],
                    toggle: action.empty
                }
            case 'SORT_ARRAY':

                let sortedArray = state.data;

                if (action.by === 0) {

                } else if (action.by === 1) {
                    sortedArray = state.data.sort((item1, item2) => {
                        return item1.services["204"] > item2.services["204"]
                    });
                }

                return {...state, sortedFilter: action.by, [action.name]: Pagination([...sortedArray], 1, state.limit)}
            default:
                throw new Error();
        }
    }
});

export default WrappedObjectsFilter;
const app = document.getElementById('cardFilters');

if (app) {
    ReactDOM.render(<WrappedObjectsFilter {...app.dataset} />, app);
}

