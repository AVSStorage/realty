import React from 'react';
import ObjectTypeTab from "./ObjectTypeTab";
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import {reducers} from "../../helpers/reducers";

export default function ObjectTypeTabContainer() {

    const globalState = useStoreContext();
    const {distance, objType: type, coords, address, validAddressField} = globalState;
    const {saveFirstTabToState} = useStoreActions();
    return (
        <StateProvider defaultState={{
            type,
            distance,
            validAddressField,
            address,
            coords,
            metros: distance.metros.length,
            seas: distance.seas.length,
            ymaps: {},
            loaded: false,
            options: {

                'Гостиница':
                    [
                        {id: 1, name: 'Отель'}, {id: 2, name: 'Гостиница'}, {id: 3, name: 'Гостевой дом'}, {
                        id: 5,
                        name: 'Мини гостиница'
                    }
                    ]
                ,
                'Квартира, апартаменты':
                    [{id: 6, name: 'Отель эконом-класс'}, {id: 7, name: 'Эллинг по номерам'}, {
                        id: 8,
                        name: 'База отдыха'
                    }, {id: 9, name: 'Тур база'}]
                ,
                'Дом, коттедж, эллинг':
                    [{id: 10, name: 'Отель эконом-класс'}, {id: 11, name: 'Эллинг по номерам'}, {
                        id: 12,
                        name: 'База отдыха'
                    }, {id: 13, name: 'Тур база'}]
                ,
                'Комната':
                    [{id: 14, name: 'Санаторий'}, {id: 15, name: 'Пансионат'}, {id: 16, name: 'Хостел'}, {
                        id: 17,
                        name: 'Кровать и завтрак'
                    }]
            }
        }} actions={(dispatch) => ({
            updateInputValue: (value, type) => {
                dispatch({type: "UPDATE_INPUT", name: type, data: value});
            },
            updateText: (type, evt, field) => {
                let value = type === 'metroPath' || type === 'seaPath' ? Number(evt.trim()) : evt.trim();
                dispatch({type: "ADD_NEW_FROM_INPUT", name: type, field: field, data: value});
            },
            setDistanceValue: (evt, type, index, stateName, distance) => {

                let obj = [...distance[type]];
                let newObj = {...obj[index]};
                newObj[stateName] = evt.target.value;
                obj[index] = {...newObj};

                let newObj2 = {};
                newObj2[type] = obj;

                dispatch({type: "UPDATE_NOT_EMPTY_STATE_ITEM", name: 'distance', data: {...newObj2}});
            },
            deleteDistanceComponent: (index, type, state) => {

                let array = state.distance[type];
                array.splice(index, 1);

                let obj = {...state.distance};
                obj[type] = array;

                let newType = {};
                newType[type] = state[type] - 1;

                dispatch({type: "UPDATE_INPUT", name: type, data: state[type] - 1});
                dispatch({type: "UPDATE_INPUT", name: 'distance', data: obj});


            },
            changeMap: (address, ymaps, valid) => {

                if (valid) {
                    let fullAddress = address.country + ', ' + address.city + ', ' + address.string + ', ' + address.house;
                    ymaps.geocode(fullAddress, {
                        results: 1
                    }).then(function (res) {
                        var firstGeoObject = res.geoObjects.get(0);
                        dispatch({
                            type: "UPDATE_INPUT",
                            name: 'coords',
                            data: firstGeoObject.geometry.getCoordinates()
                        });

                    });

                }
            },
            checkNotEmptyAddressFields: (address) => {
                let valid = false;
                let fields = ['country', 'city', 'string', 'house'];

                valid = fields.every((field) => {
                    return address[field] !== '';
                });

                dispatch({type: "UPDATE_INPUT", name: 'validAddressField', data: valid});

            },
            addNewDistanceValue: (evt, value, distance, type) => {
                evt.preventDefault();
                let newObj = type === 'seas' ?   {id: value + 1, seaName: '', seaPath: 0} :  {id: value + 1, metroName: '', metroPath: 0};
                dispatch({type: "UPDATE_INPUT", name: type, data: value + 1});
                dispatch({
                    type: "UPDATE_NOT_EMPTY_STATE_ITEM", name: 'distance', data: {
                        ...distance,
                        [type]: [...distance[type], newObj]
                    }
                });
            },

            onMapClick: (evt, ymaps, address) => {
                ymaps.geocode(evt.get("coords"), {
                    results: 1
                }).then(function (res) {
                    var firstGeoObject = res.geoObjects.get(0);

                    let addressLine = firstGeoObject.properties.get('name').split(',');
                    let region = firstGeoObject.properties.get('text').split(',')[1];

                    let city = firstGeoObject.getAddressLine().split(',').length > 4 ? firstGeoObject.getAddressLine().split(',')[2] : firstGeoObject.getLocalities()[0];
                    dispatch({type: "UPDATE_INPUT", name: 'coords', data: evt.get("coords")});
                    dispatch({
                        type: "UPDATE_INPUT", name: 'address', data: {
                            ...address,
                            country: firstGeoObject.getCountry() ? firstGeoObject.getCountry().trim() : address.country,
                            region: region ? region.trim() : address.region,
                            city: city ? city.trim() : address.city,
                            string: addressLine[0].replace('улица', '') ? addressLine[0].replace('улица', '').trim() : address.string,
                            house: firstGeoObject.getPremiseNumber() ? firstGeoObject.getPremiseNumber() : address.house
                        }
                    });
                });

            }

        })} reducer={(state, action) => {
            switch (action.type) {
                case 'UPDATE_INPUT':
                    return reducers.UPDATE_STATE_ITEM(action, state);
                case "ADD_NEW_FROM_INPUT":
                    return reducers.ADD_NEW_ITEM(action, state);
                case "UPDATE_NOT_EMPTY_STATE_ITEM":
                    return reducers.UPDATE_NOT_EMPTY_STATE_ITEM(action, state);
                default:
                    throw new Error();
            }
        }}>
            <ObjectTypeTab saveFirstTabToState={saveFirstTabToState}/>
        </StateProvider>
    );
};
