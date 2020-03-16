import React, {Component, useEffect, useMemo} from 'react';
import ReactDOM from 'react-dom';
import {ReactDadata} from 'react-dadata';
import Checkbox from '@material-ui/core/Checkbox';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import CheckBoxOutlineBlankIcon from '@material-ui/icons/CheckBoxOutlineBlank';
import CheckBoxIcon from '@material-ui/icons/CheckBox';
import {withStyles, makeStyles} from '@material-ui/core/styles';
import TextField from "@material-ui/core/TextField";
import {MenuItem, Select, Radio, RadioGroup} from '@material-ui/core';
import FormControl from "@material-ui/core/FormControl";
import clsx from "clsx";
import {useStoreContext, useStoreActions, StateProvider} from "../../../store/store";


export default function MainInfoTab({defaultState,saveSecondTabToState, loading}) {


    let {updateStateOfItem, updateText, updateCheckBox} = useStoreActions();
    let globalState = useStoreContext();
    let {items, services, guests, types} = globalState;




    useMemo(() => updateStateOfItem(defaultState), [defaultState]);


    let generateTextFieldWithLabel = (indexOfItem, sliceStartIndex, sliceEndIndex) => {
        return items[indexOfItem].slice(sliceStartIndex, sliceEndIndex).map((service, index) => {

            return (
                <div key={index}>
                    {service.name === 'комнаты смежные' || service.name === 'комнаты раздельные' ? (

                        <FormControlLabel
                            key={index}
                            control={
                                <Checkbox
                                    // className={classes.root}
                                    icon={<CheckBoxOutlineBlankIcon fontSize="small"/>}
                                    checkedIcon={<CheckBoxIcon fontSize="small"/>}
                                    checked={services[indexOfItem].values.get(service.id) === indexOfItem + 1}
                                    onChange={(evt) => updateCheckBox(evt, service.id, services,indexOfItem)}
                                />
                            }
                            label={service.name}
                        />

                    ) : (
                        <div className="chara__left-maximum">
                            <div className="chara__type">
                                {service.name}
                            </div>
                            <TextField onChange={(evt) => updateText(evt, service.id, services)} required
                                       value={services[indexOfItem].values.get(service.id)} className="street"
                                       placeholder={'3'}/>
                        </div>
                    )}

                </div>
            )

        })
    }

    let generateCheckBoxWithLabel = (indexOfItem, sliceStartIndex, sliceEndIndex) => {
        return items[indexOfItem].slice(sliceStartIndex, sliceEndIndex).map((service, index) => {
            return (
                <div key={index} className="chara__left-block">
                    <div className="service">
                        <FormControlLabel
                            control={
                                <Checkbox
                                    // className={classes.root}
                                    icon={<CheckBoxOutlineBlankIcon fontSize="small"/>}
                                    checkedIcon={<CheckBoxIcon fontSize="small"/>}
                                    // value={it.value}
                                    checked={services[indexOfItem].values.get(service.id)}
                                    onChange={(evt) => updateCheckBox(evt, service.id,services, indexOfItem)}
                                />
                            }
                            label={service.name}
                        />
                    </div>

                </div>
            )
        })
    }
    return (
        <div>
            <form style={{position: 'relative'}} onSubmit={(evt) => {evt.preventDefault(); saveSecondTabToState(services)}} >
                <div className={`preloader ${loading ? 'active' : ''}`}>

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
            <div className="chara__left">
                <div className="chara__title" id="charaTitle">
                    Характеристики объекта
                </div>
                <div className="chara__left-inner">

                    <div className="chara__item">

                        <div className="chara__left-block">
                            <div className="chara__left-line">
                                <div className="chara__type types">
                                    Тип<br/>строения
                                </div>
                                <Select value={services[0].values.get(1) ? services[0].values.get(1) : 0}
                                        onChange={(evt) => updateText(evt, 1, services)}
                                        labelId="label" id="select" className="guests">
                                    {types.map((type, index) => (
                                        <MenuItem key={index} value={index}>{type.name}</MenuItem>
                                    ))}
                                </Select>
                            </div>
                        </div>
                        <div className="chara__left-line">
                            <div className="chara__type-1 types">
                                Состояние<br/>жилья
                            </div>
                            <Select value={services[0].values.get(2) ? services[0].values.get(2) : 0}
                                    onChange={(evt) => updateText(evt, 2, services)}
                                    labelId="label" id="select" className="guests">
                                {guests.map((type, index) => (
                                    <MenuItem key={index} value={index}>{type.name}</MenuItem>
                                ))}
                            </Select>
                        </div>
                        {generateTextFieldWithLabel(0, 2, 7)}


                    </div>
                    <div className="chara__center-block">
                        {generateTextFieldWithLabel(0, 7, 14)}
                    </div>
                    <div className={'chara__right-block'}>
                        {generateTextFieldWithLabel(0, 14, items[0].length)}
                    </div>
                </div>
            </div>
            <div className="chara__title"
                 id="charaHouse">
                Оснащения
                жилья
            </div>
            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(1, 0, 10)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(1, 10, 21)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(1, 21, items[1].length)}
                </div>
            </div>
            <div className="chara__title" id="charaTer">
                Оснащение территории
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(2, 0, 12)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(2, 12, 24)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(2, 24, items[2].length)}
                </div>
            </div>
            <div className="chara__title" id="charaWash">
                Ванная комната
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(3, 0, 7)}

                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(3, 7, 14)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(3, 14, items[3].length)}
                </div>
            </div>
            <div className="chara__title" id="charaEat">
                Тип питания
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(4, 0, 2)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(4, 2, 4)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(4, 4, 2)}
                </div>
            </div>
            <div className="chara__title" id="charaObj">
                Кухонное оборудование
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(5, 0, 7)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(5, 7, 14)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(5, 14, items[5].length)}
                </div>
            </div>
            <div className="chara__title" id="charaChild">
                Для детей
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(6, 0, 4)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(6, 4, 8)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(6, 8, items[6])}
                </div>
            </div>
            <div className="chara__title" id="charaPark">
                Парковка
            </div>

            <div className="chara__left-inner-house-1">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(7, 0, 2)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(7, 2, 5)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(7, 5, items[7].length)}
                </div>
            </div>

            <div className="chara__title" id="charaLive">
                Правила проживания
            </div>

            <div className="chara__left-inner-house-2">
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(8, 0, 2)}

                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(8, 2, 4)}
                </div>

            </div>
            <div className="chara__title" id="charaFun">
                Инфраструктура и досуг рядом
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(9, 0, 10)}

                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(9, 10, 20)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(9, 20, items[9].length)}
                </div>
            </div>
            <div className="chara__title" id="charaBeach">
                Пляж
            </div>

            <div className="chara__left-inner-house">
                <div className="chara__item">
                    {generateCheckBoxWithLabel(10, 0, 3)}
                </div>
                <div className="chara__center-block">
                    {generateCheckBoxWithLabel(10, 3, 6)}
                </div>
                <div className="chara__right-block">
                    {generateCheckBoxWithLabel(10, 6, items[10].length)}
                </div>
            </div>
            {/*<div className="chara__title" id="charaAtt">*/}
            {/*    Расстояние до достопримечательностей*/}
            {/*</div>*/}

            {/*<div className="chara__km-inner">*/}
            {/*    <div className="attraction__left">*/}
            {/*        <div className="attraction">*/}
            {/*            Крокус Экспо*/}
            {/*        </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}

            {/*        <div className="attraction">*/}
            {/*            Экспоцентр*/}
            {/*        </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}
            {/*    </div>*/}

            {/*    <div className="attraction__right">*/}
            {/*        <div className="attraction">*/}
            {/*            Парк Горького*/}
            {/*        </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}

            {/*            <div className="attraction">*/}
            {/*                Парк ВДНХ*/}
            {/*            </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}
            {/*    </div>*/}
            {/*</div>*/}

            {/*<div className="chara__title" id="charaStreet">*/}
            {/*    Расстояние до улиц*/}
            {/*</div>*/}

            {/*<div className="chara__km-inner">*/}
            {/*    <div className="attraction__left">*/}
            {/*        <div className="attraction">*/}
            {/*            Горького*/}
            {/*        </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}

            {/*            <div className="attraction">*/}
            {/*                Нахимова*/}
            {/*            </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}
            {/*    </div>*/}

            {/*    <div className="attraction__right">*/}
            {/*        <div className="attraction">*/}
            {/*            Нахимова*/}
            {/*        </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}

            {/*            <div className="attraction">*/}
            {/*                Ленина*/}
            {/*            </div>*/}
            {/*        <TextField className="attraction-km" placeholder={'2 км'}/>*/}
            {/*    </div>*/}
            {/*</div>*/}
                <button className="chara__btn">
                    Далее
                </button>
            </form>
        </div>
    )
}
