import {YMaps, Map, Placemark} from 'react-yandex-maps';
import ReactDOM from "react-dom";
import React from "react";
import {useStoreActions, useStoreContext} from "../../store/store";

const Maps = () => {
    const globalState = useStoreContext();
    let {coords, ymaps, address} = globalState;

    const {onMapClick, updateInputValue} = useStoreActions();
    return (<YMaps
        query={{
            apikey: '5286bf48-72bf-4c1a-9b3e-616d66a674e8',
        }}
    >
        <Map onClick={(evt) => onMapClick(evt, ymaps, address)} modules={['geocode']} onLoad={ymaps => updateInputValue(ymaps, 'ymaps')}
             width={"100%"} height={450} state={{center: coords, zoom: 18}}
             defaultState={{center: [44.518454, 34.169964], zoom: 18}}>

            <Placemark geometry={coords}/>
        </Map>
    </YMaps>);
};

export default Maps;
