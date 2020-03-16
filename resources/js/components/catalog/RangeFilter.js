
import React, { Component,useEffect } from 'react';

import { withStyles, makeStyles } from '@material-ui/core/styles';
import Slider from '@material-ui/core/Slider';
import Typography from '@material-ui/core/Typography';
import Tooltip from '@material-ui/core/Tooltip';
import FilterForm from "../index/FilterForm";
import ReactDOM from "react-dom";
import Input from '@material-ui/core/Input';

import {useStoreContext ,useStoreActions} from "../../store/store";


const AirbnbSlider = withStyles({
    root: {
        color: '#01be66',
        height: 3,
        padding: '13px 0',
        width: '90%'
    },
    thumb: {
        height: 27,
        width: 27,
        backgroundColor: '#fff',
        border: '1px solid currentColor',
        marginTop: -12,
        borderRadius: 2,
        marginLeft: -13,
        boxShadow: '#ebebeb 0px 2px 2px',
        '&:focus,&:hover,&$active': {
            boxShadow: '#ccc 0px 2px 3px 1px',
        },
        '& .bar': {
            // display: inline-block !important;
            height: 9,
            width: 1,
            backgroundColor: 'currentColor',
            marginLeft: 1,
            marginRight: 1,
        },
    },
    active: {},
    valueLabel: {
        left: 'calc(-50% + 4px)',
    },
    track: {
        height: 3,
    },
    rail: {
        color: '#959595',
        opacity: 1,
        height: 3,
    },
})(Slider);

function AirbnbThumbComponent(props) {
    return (
        <span className="filter-item"  {...props}></span>
    );
}
const RangeFilter = ({title, inputMin, inputMax, data}) => {

    const globalStore = useStoreContext();
    const { maxFix} = globalStore;
    let maxValue = globalStore[inputMax];

    let minValue = globalStore[inputMin];
    const {handleSliderChange, updateState, renderCards} = useStoreActions();
    useEffect(() => {
        data.then((value) => updateState(value));
    },[])

    let range = (Number(globalStore[inputMax + 'Fix']) - Number(globalStore[inputMin + 'Fix']))/100;
    let currentMinValue = (minValue - Number(globalStore[inputMin + 'Fix']))/range
    let currentMaxValue = (maxValue - Number(globalStore[inputMin + 'Fix']))/range
    return (
        <div className={'range_filter'}>
            <div className="content__left-much">
                <div className="content__left-price">
                    {title}
                </div>
                <div className="content__left-max">
                    {maxFix}
                </div>
            </div>
            <AirbnbSlider
                ThumbComponent={AirbnbThumbComponent}
                getAriaLabel={index => (index === 0 ? 'Minimum price' : 'Maximum price')}
                defaultValue={[0, 100]}
                value={[currentMinValue,currentMaxValue]}
                onChange={(evt, value) => {handleSliderChange(value, inputMin, inputMax, renderCards )}}
            />
            <div className="content__left-km">
                <div className="content__left-min">
                    от    <Input
                    className={'input-number'}
                    value={minValue}
                    margin="dense"

                    inputProps={{
                        type: 'number',
                        'aria-labelledby': 'input-slider',
                    }}
                />
                </div>
                <div className="content__left-maxi">
                    до   <Input
                    className={'input-number'}
                    value={maxValue}
                    margin="dense"
                    inputProps={{
                        type: 'number',
                        'aria-labelledby': 'input-slider',
                    }}
                />
                </div>
            </div>
        </div>

    )
}


export default  RangeFilter;
