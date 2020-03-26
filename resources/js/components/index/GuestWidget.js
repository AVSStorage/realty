import * as React from 'react';
import {MenuItem, Select} from "@material-ui/core";


export default function GuestWidget({onChange}) {

    return (
        <div className="form-width form-width--fixed form--zIndex" style={{display:'none'}}>
            <ul className="js-guestCountListPeopleCount">
                <li className="clearfix">
                    <div className="form-group js-guestCountGuestType" data-guest-type="Male">
                        <label className="pull-left control-label">Мужчины:</label>
                        <div
                            className="pull-left">
                            <button className={"toggle-button"}>0</button>
                            <button className={"toggle-button"}>1</button>
                            <button className={"toggle-button"}>2</button>
                            <Select  onChange={(data) => handleDateAndSelectChange(data, 'guests')}
                                    labelId="label" id="select">
                                <MenuItem value="1">1</MenuItem>
                                <MenuItem value="2">2</MenuItem>
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">10 и больше</MenuItem>
                            </Select>
                        </div>
                    </div>
                </li>
                <li className="clearfix">
                    <div className="form-group js-guestCountGuestType" data-guest-type="Female">
                        <label
                            className="pull-left control-label">Женщины:</label>
                        <div
                            className="pull-left">
                            <button className={"toggle-button"}>0</button>
                            <button className={"toggle-button"}>1</button>
                            <button className={"toggle-button"}>2</button>
                            <Select onChange={(data) => handleDateAndSelectChange(data, 'guests')}
                                    labelId="label" id="select" >
                                <MenuItem value="1">1</MenuItem>
                                <MenuItem value="2">2</MenuItem>
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">10 и больше</MenuItem>
                            </Select>

                        </div>
                    </div>
                </li>
                <li className="clearfix">
                    <div className="form-group js-guestCountGuestType" data-guest-type="Child">
                        <label
                            className="pull-left control-label">Дети:</label>
                        <div
                            className="pull-left">
                            <button className={"toggle-button"}>0</button>
                            <button className={"toggle-button"}>1</button>
                            <button className={"toggle-button"}>2</button>
                            <Select onChange={(data) => handleDateAndSelectChange(data, 'guests')}
                                    labelId="label" id="select" >
                                <MenuItem value="1">1</MenuItem>
                                <MenuItem value="2">2</MenuItem>
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">10 и больше</MenuItem>
                            </Select>

                        </div>
                    </div>
                </li>

                <li className="js-guestCountChildParent clearfix">
                    <div className="form-group">
                        <label className="pull-left control-label">Возраст детей:</label>
                        <div
                            className="pull-left js-guestCountFormGroupAge">

                        <span className="js-guestCountChildCountClick-0">

                            <Select onChange={(data) => handleDateAndSelectChange(data, 'guests')}
                                    labelId="label" id="select">
                                <MenuItem value="1">1</MenuItem>
                                <MenuItem value="2">2</MenuItem>
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">10 и больше</MenuItem>
                               </Select>
                        </span>
                            <span className="js-guestCountChildCountClick-1">


                            <Select  onChange={(data) => handleDateAndSelectChange(data, 'guests')}
                                    labelId="label" id="select" >
                                <MenuItem value="3">3 года</MenuItem>
                                <MenuItem value="4">4 года</MenuItem>
                                <MenuItem value="5">5 лет</MenuItem>
                                <MenuItem value="6">6 лет</MenuItem>
                                <MenuItem value="7">7 лет</MenuItem>
                                <MenuItem value="8">8 лет</MenuItem>
                                <MenuItem value="9">9 лет</MenuItem>
                                <MenuItem value="10">10 лет</MenuItem>
                                <MenuItem value="11">11 лет</MenuItem>
                                <MenuItem value="12">12 лет</MenuItem>
                                <MenuItem value="13">13 лет</MenuItem>
                                <MenuItem value="14">14 лет</MenuItem>
                                <MenuItem value="15">15 лет</MenuItem>
                                <MenuItem value="16">16 лет</MenuItem>
                                <MenuItem value="17">17 лет</MenuItem>

                            </Select>
                      </span>
                        </div>
                    </div>
                </li>
            </ul>
            <button className="btn btn-ok btn-success btn--ok js-guestCountDropdownListButtonClose" type="button">
                Применить
            </button>
        </div>
    );

};
