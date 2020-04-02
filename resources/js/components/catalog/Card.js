
import React, {Component, useEffect} from 'react';

import { withStyles, makeStyles } from '@material-ui/core/styles';
import Slider from '@material-ui/core/Slider';
import Typography from '@material-ui/core/Typography';
import Tooltip from '@material-ui/core/Tooltip';
import FilterForm from "../index/FilterForm";
import ReactDOM from "react-dom";
import Input from '@material-ui/core/Input';
import SliderComponent from "../../hocs/slider";
import ImageSliderComponent from "../ImageSliderComponent";
import {useStoreActions, useStoreContext} from "../../store/store";
import ReactCSSTransitionGroup from "react-addons-css-transition-group";

const declOfNum = (number, titles) => {
    let cases = [2, 0, 1, 1, 1, 2];
    return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
};


const Card = ({limit, days}) => {


    // let suffixes = new Map([
    //         [1 , ['дом', 'дома', 'домов']],
    //         [2 , ['квартира', 'квартиры', 'квартир']],
    //         [3 , ['отель', 'отеля', 'отелей']],
    //         [3,  ['кровать','кровати' ,'кроватей']],
    //         [4,  ['кровать','кровати' ,'кроватей']]
    //     ]
    // );

    const globalStore = useStoreContext();
    const {transitionIn} = globalStore;
    const { data: items } = globalStore.filteredItems;
    const {renderCards} = useStoreActions();






    const types =  new Map([
        [1, 'Гостиница'],
        [2, 'квратира'],
        [3,  'Дом'],
        [4,  'Комната'],
    ]);
    //
    const services =  new Map([
        [4, 'комнатная'],
        [2, 'квратира'],
        [3,  'дом'],
        // [4,  'комната'],
    ]);





    return (

        <ReactCSSTransitionGroup
            transitionName="example"
            transitionAppear={true}
            transitionAppearTimeout={500}
            transitionEnterTimeout={500}
            transitionLeave={false}
        >
            <div key={transitionIn}>
            {items.map((item,i) => (
                <div className="choice" key={i} id={i + 1}>
                    <div className="choice__inner">
                        <div className="choice__left">
                            <div className="choice__left-content">
                                <div className="choice__left-slider">
                                    <div className="slider__choice">
                                        { ImageSliderComponent ({
                                            settings: {
                                                slidesToShow: 1,
                                                slidesToScroll: 1,
                                                speed: 1000,
                                                arrows: true,
                                                autoplay: false,
                                                lazyLoad: false,
                                                rows: 1
                                            },
                                            data:  item.photos.map(function(item,i) {
                                                return <div className="slide__choice" key={i}>
                                                    <img src={`${item}`} alt="Жилье"/>
                                                </div>
                                            }),
                                            customArrow: true
                                        })
                                        }
                                    </div>
                                </div>
                                <div className="choice__left-info">
                                    { Number(item.type_id) === 1 && (
                                        <div className="choice__info-title">
                                            { item.name }
                                        </div>
                                    )

                                    }
                                    { Number(item.type_id) === 2  && (
                                        <div className="choice__info-title">
                                            { item.name } - {item.services ? item.services["16"] : ''} м²
                                        </div>
                                    )

                                    }
                                    { (Number(item.type_id) === 3) && (
                                        <div className="choice__info-title">
                                            { item.name }  - {item.services ? item.services["16"] : ''} м²
                                        </div>
                                    )

                                    }
                                    { Number(item.type_id) === 4 && (
                                        <div className="choice__info-title">
                                            { item.name } - {item.services ? item.services["16"] : ''} м²
                                        </div>
                                    )

                                    }
                                    <div className="choice__street">
                                        {item.city}, ул. {item.string}, {item.housing ? `к. ${item.housing}` : item.housing} д. {item.house}
                                    </div>
                                    <div className="choice__reviews">
                                        <img className="choice__star" src="img/star/2.png" alt="Ratting"/>
                                        94 отзыва
                                    </div>
                                    <div className="choice__services-item">

                                        <img src="img/service/1.png" alt="service"/>
                                        { item.services &&  item.services["21"]  ? (
                                            <img src="img/service/2.png" alt="service"/>
                                        ) : ''

                                        }
                                        {item.services && item.services["23"] ? (
                                            <img src="img/service/3.png" alt="service"/>
                                        ) : ''

                                        }
                                        {item.services && Number(item.services["38"]) !== 0   ? (
                                            <img src="img/service/4.png" alt="service"/>
                                        ) : ''

                                        }
                                        {item.services && Number(item.services["196"]) !== 0 ? (
                                            <img src="img/service/5.png" alt="service"/>
                                        ) : ''

                                        }
                                        {item.services && Number(item.services["154"]) !== 0 ? (
                                            <img src="img/service/6.png" alt="service"/>
                                        ) : ''

                                        }

                                        {/*<img src="img/service/4.png" alt="service"/>*/}
                                        {/*<img src="img/service/5.png" alt="service"/>*/}
                                        {/*<img src="img/service/6.png" alt="service"/>*/}
                                    </div>

                                    {
                                        item.seas ?

                                            (item.seas.map((sea, index) =>
                                              Number(sea.sea_path) !== 0  && (<div className="choice__km" key={index}>
                                                    {sea.sea_path} м.
                                                    <span className="choice__km-span">до моря</span>
                                                </div>)
                                        )) : ''
                                    }


                                    {item.center_path && Number(item.center_path) !== 0 && (
                                        <div className="choice__km">
                                            {item.center_path} км.
                                            <span className="choice__km-span">до центра</span>
                                        </div>
                                    )}

                                    {
                                        item.metros ?

                                            (item.metros.map((metro, index) =>
                                                Number(metro.metro_path) !== 0 && ( <div className="choice__km" key={index}>
                                                    {metro.metro_path} м.
                                                    <span className="choice__km-span">до метро, ст. {metro.metro}</span>
                                                </div>
                                                ))) : ''
                                    }


                                </div>


                            </div>

                        </div>



                        <div className="choice__right">
                            <div className="choice__right-contents">
                                { !days ? (
                                    <div className="choice__right-price">
                                        {item.services ? item.services["204"] : ''} руб. <span className="choice__price-span">сутки</span>
                                    </div>
                                ) : (
                                    <div className="choice__right-price">
                                        {item.services ? days * item.services["204"] : ''} руб. <span className="choice__price-span"> {days} {declOfNum(days,['сутки','суток','суток']) }</span>
                                    </div>
                                )}

                                {/*<div className="choice__right-prices">*/}
                                {/*    {item.services["204"]} руб. <span className="choice__price-span">сутки</span>*/}
                                {/*</div>*/}
                                <a href={`/object/${item.id}`} className="form--btn  choice--btn">Подробнее</a>
                                <button style={{backgroundColor: "transparent", border:"none", padding:0}} onClick={(evt) => fetch('/objects/favourite/' + item.id, {
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                }).then(response => response.json()).then(result => {}) } className="choice__best">
                                    <img src="img/heart.png" alt="like"/>в избранное
                                </button>
                                <a href="#" className="choice__best  best">
                                    <img src="img/house.png" alt="like"/>в сравнение
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            ))}
            </div>
        </ReactCSSTransitionGroup>)
}

Card.defaultProps = {
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        arrows: true,
        autoplay: false,
        lazyLoad: true
    },
    data: ' <div class="slide__choice">' +
        '<img src="img/choice/1.png" alt="Жилье">' +
        '</div>'
        +
        '<div class="slide__choice">' +
        '<img src="img/choice/1.png" alt="Жилье">' +
        ' </div>' +
        '<div class="slide__choice">' +
        '<img src="img/choice/1.png" alt="Жилье">' +
        '</div>' +
        '<div class="slide__choice">' +
        '<img src="img/choice/1.png" alt="Жилье">' +
        '</div>'
}
export default Card;

