import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import SliderComponent from "../hocs/slider";



const declOfNum = (number, titles) => {
    let cases = [2, 0, 1, 1, 1, 2];
    return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
};


export default class SliderWithData extends Component {


    constructor(props) {
        super(props);

        this.state = {loading: 0, items: {}, descriptions: []};
        this.finishes = new Map([
                [0 , ['дом', 'дома', 'домов']],
                [1 , ['квартира', 'квартиры', 'квартир']],
                [2 , ['отель', 'отеля', 'отелей']],
                [3,  ['кровать','кровати' ,'кроватей']],
                [4,  ['кровать','кровати' ,'кроватей']]
            ]
        );

    }

    static defaultProps = {
        type: 'places'
    }


    componentWillMount() {

        fetch('/rating?type=' + this.props.type,{
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then (response => response.json()).
        then(obj => this.setState({loading:1,items:obj['objects'],descriptions:obj['descriptions']}))
    }


    render() {

        let items = Object.keys(this.state.items).map(function(key,index) {
            return <div className="slider__item" key={index}>
                <img src={`img/${this.props.type}/${(index % 4 === 0 ? 3 : index) + 1}.png`} alt="Hotel" className="slider__img"/>
                <div className="slider__title">{key}</div>
                {this.props.type === 'places' ? (
                <div
                    className="slider__text">{this.state.items[key]} {declOfNum(this.state.items[key], this.finishes.get(index))}</div>) :
                    (
                    <img className="star" src="img/star/2.png" alt="Ratting"/>
                    )
                }
                <a href="/catalog" className="slider__btn">Смотреть все</a>
                {this.props.type === 'places' ? (
                <div className="slider__subtext">{this.state.descriptions[index]}</div> ) :
                    (
                        <div className="slider__subtext">{this.state.items[key]}</div>
                    )
                }
            </div>
        }.bind(this));

        let sliderSettings =  {
            slidesToShow: 4,
            slidesToScroll: 4,
            speed: 1000,
            arrows: true,
            autoplay: true,
            lazyLoad: true
        };

        let sliderProps = {
            settings : sliderSettings,
            data : items
        };

        const ImageSliderComponent = SliderComponent(sliderProps);

        return <ImageSliderComponent {...sliderProps}/>;
    }
}
