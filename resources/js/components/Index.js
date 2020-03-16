import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import SliderWithData from "./SliderWithData";

const IndexComponent = () => {

  return (
      <div className="container">
      <div className="stop">
          <div className="container">
              <div className="slider">
                  <div className="stop__title">
                      Где остановиться?
                  </div>
                  <div className="slider__items">
    <SliderWithData type ={'places'} />
                  </div>
              </div>
          </div>

      <div className="container">
        <div className="stop__title">
        Популярные
    направления
    </div>
    <div className="slider__items">
            <SliderWithData type ={'country'} />
    </div>
    </div>
      </div>
      </div>

  );
};

if (document.getElementById('example2')) {
    ReactDOM.render(<IndexComponent />, document.getElementById('example2'));
}



