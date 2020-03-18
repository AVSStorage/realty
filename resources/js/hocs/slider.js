import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Slider from "react-slick";


const SampleNextArrow = ({onClick}) => {
    // const { className, style, onClick } = props;
    return (
        <button
            onClick={onClick}
            className="slick-btn slick-next"
        />
    );
};

const SamplePrevArrow = ({onClick}) => {
    //  const { className, style, onClick } = props;
    return (
        <button
            onClick={onClick}
            className="slick-btn slick-prev"
        />


    );
};


const CustomNextArrow = ({onClick}) => {
    // const { className, style, onClick } = props;
    return (
        <button
            onClick={onClick}
            className="choice__btn  choice--next"
        />
    );
};

const CustomPrevArrow = ({onClick}) => {
    //  const { className, style, onClick } = props;
    return (
        <button
            onClick={onClick}
            className="choice__btn  choice--prev"
        />


    );
};


const SliderComponent = ({settings, data = [], customArrow = false}) =>
    class SimpleSlider extends React.Component {

        constructor(props) {
            super(props);
        }


        render() {
            let settings = this.props.settings ? {
                ...this.props.settings,
                nextArrow: customArrow ? <CustomNextArrow/> : <SampleNextArrow/>,
                prevArrow: customArrow ? <CustomPrevArrow/> : <SamplePrevArrow/>,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            } : {
                slidesToShow: 4,
                slidesToScroll: 4,
                speed: 1000,
                arrows: true,
                autoplay: true,
                lazyLoad: true,
                nextArrow: <SampleNextArrow/>,
                prevArrow: <SamplePrevArrow/>,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            };

            return (
                <Slider className="slider__content" {...settings} onInit={() => $('.preloader').removeClass('active')}>
                    {data}
                </Slider>
            );
        }
    };


export default SliderComponent;
