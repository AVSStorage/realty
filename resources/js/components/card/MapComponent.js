import ReactDOM from "react-dom";
import { YMaps, Map, Placemark } from 'react-yandex-maps';
import React from "react";


const MapComponent = ({coordinatex, coordinatey}) => (
    <YMaps
        query={{
            apikey: '5286bf48-72bf-4c1a-9b3e-616d66a674e8',
        }}
    >
        <Map
             width={"100%"} height={450}  defaultState={{ center: [coordinatex, coordinatey], zoom: 18 }} >
            <Placemark geometry={[coordinatex, coordinatey]} />
        </Map>
    </YMaps>
)



const app = document.getElementById('MapComponent');

if (app) {
    ReactDOM.render(<MapComponent {...app.dataset} />, app);
}
