import * as React from 'react';
import {MenuItem, Select} from "@material-ui/core";
import {useStoreActions, useStoreContext} from "../../store/store";


export default function GuestWidget({showed, hideForm}) {

    const globalState = useStoreContext();
    const {man, women, children} = globalState;
    const {updatePersons, updateChildren} = useStoreActions();

    let agesArray = [];
    let childrenCounter = children.count;
    while (childrenCounter > 0) {
        agesArray.push( <Select key={childrenCounter} onChange={(data) => updateChildren([...children.ages, Number(data.target.value)], children, 'ages', globalState, false)}
                                labelId="label" id="select" className={"mr-2 mb-2"}>
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
        </Select>);
        childrenCounter--;
    }

    return (
        <div className={`form-width form-width--fixed form--zIndex ${showed ? 'd-none' : ''}`}>
            <ul className="js-guestCountListPeopleCount">
                <li className="clearfix">
                    <div className="form-group js-guestCountGuestType" data-guest-type="Male">
                        <label className="pull-left control-label">Мужчины:</label>
                        <div
                            className="pull-left">
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('man', 0, globalState)
                            }} className={`toggle-button ${man === 0 ? 'active' : ''}`}>0
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('man', 1, globalState)
                            }} className={`toggle-button ${man === 1 ? 'active' : ''}`}>1
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('man', 2, globalState)
                            }} className={`toggle-button ${man === 2 ? 'active' : ''}`}>2
                            </button>
                            <Select value={man} onChange={(data) => updatePersons('man', Number(data.target.value), globalState)}
                                    labelId="label" id="select">
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">7</MenuItem>
                                <MenuItem value="8">8</MenuItem>
                                <MenuItem value="9">9</MenuItem>
                                <MenuItem value="10">10 и больше</MenuItem>
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
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('women', 0, globalState)
                            }} className={`toggle-button ${women === 0 ? 'active' : ''}`}>0
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('women', 1, globalState)
                            }} className={`toggle-button ${women === 1 ? 'active' : ''}`}>1
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updatePersons('women', 2, globalState)
                            }} className={`toggle-button ${women === 2 ? 'active' : ''}`}>2
                            </button>
                            <Select value={women} onChange={(data) => updatePersons('women', Number(data.target.value), globalState)}
                                    labelId="label" id="select">
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">7</MenuItem>
                                <MenuItem value="8">8</MenuItem>
                                <MenuItem value="9">9</MenuItem>
                                <MenuItem value="10">10 и больше</MenuItem>
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
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updateChildren(0, children,'count', globalState)
                            }} className={`toggle-button ${children.count === 0 ? 'active' : ''}`}>0
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updateChildren(1, children,'count', globalState)
                            }} className={`toggle-button ${children.count === 1 ? 'active' : ''}`}>1
                            </button>
                            <button onClick={(evt) => {
                                evt.preventDefault();
                                updateChildren(2, children,'count', globalState)
                            }} className={`toggle-button ${children.count === 2 ? 'active' : ''}`}>2
                            </button>
                            <Select value={children.count}
                                    onChange={(data) => updateChildren(Number(data.target.value), children,'count', globalState)}
                                    labelId="label" id="select">
                                <MenuItem value="3">3</MenuItem>
                                <MenuItem value="4">4</MenuItem>
                                <MenuItem value="5">5</MenuItem>
                                <MenuItem value="6">6</MenuItem>
                                <MenuItem value="7">7</MenuItem>
                                <MenuItem value="8">8</MenuItem>
                                <MenuItem value="9">9</MenuItem>
                                <MenuItem value="7">10 и больше</MenuItem>
                            </Select>

                        </div>
                    </div>
                </li>
                {children.count > 0 &&
                <li className="js-guestCountChildParent clearfix">
                    <div className="form-group">
                        <label className="pull-left control-label">Возраст детей:</label>
                        <div className="pull-left js-guestCountFormGroupAge">
                            <span className="js-guestCountChildCountClick-1">
                                {agesArray.map((item) => item)}
                                {/*<Select onChange={(data) => updateChildren([...children.ages, data.target.value], children, 'ages')}*/}
                                {/*        labelId="label" id="select">*/}
                                {/*        <MenuItem value="3">3 года</MenuItem>*/}
                                {/*        <MenuItem value="4">4 года</MenuItem>*/}
                                {/*        <MenuItem value="5">5 лет</MenuItem>*/}
                                {/*        <MenuItem value="6">6 лет</MenuItem>*/}
                                {/*        <MenuItem value="7">7 лет</MenuItem>*/}
                                {/*        <MenuItem value="8">8 лет</MenuItem>*/}
                                {/*        <MenuItem value="9">9 лет</MenuItem>*/}
                                {/*        <MenuItem value="10">10 лет</MenuItem>*/}
                                {/*        <MenuItem value="11">11 лет</MenuItem>*/}
                                {/*        <MenuItem value="12">12 лет</MenuItem>*/}
                                {/*        <MenuItem value="13">13 лет</MenuItem>*/}
                                {/*        <MenuItem value="14">14 лет</MenuItem>*/}
                                {/*        <MenuItem value="15">15 лет</MenuItem>*/}
                                {/*        <MenuItem value="16">16 лет</MenuItem>*/}
                                {/*        <MenuItem value="17">17 лет</MenuItem>*/}
                                {/*</Select>*/}
                            </span>
                        </div>
                    </div>
                </li>
                }

            </ul>
            <button onClick={(evt) => {evt.preventDefault(); hideForm('hiddenForm', true)}} className="btn btn-ok btn-success btn--ok js-guestCountDropdownListButtonClose" type="button">
                Применить
            </button>
        </div>
    );

};
