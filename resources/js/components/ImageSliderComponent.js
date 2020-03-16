import React, { Component } from 'react';
import SliderComponent from "../hocs/slider";
import ReactDOM from "react-dom";
import Filter from "./index/Filter";

export default function ImageSliderComponent(sliderProps, proccess = false) {

    if (proccess) {
        let photos = sliderProps.data.map(function (item, i) {
            return <div className="slide__choice" key={i}>
                <img width="220" src={`/${item}`} alt="Жилье"/>
            </div>
        });
        let data = {...sliderProps};
        data.data = photos;

        const Component = SliderComponent(data);
        return <Component {...data}/>;
    } else {

        const Component = SliderComponent(sliderProps);
        return <Component {...sliderProps}/>;
    }


}

var root = document.getElementsByClassName('cardSlider');

if (root) {
    Array.from(root).map((r) => {;
        let photos = JSON.parse(r.dataset.photos);
        photos.proccess = true;
        ReactDOM.render(
            <ImageSliderComponent {...photos} />,
            r
        );
    })

}
