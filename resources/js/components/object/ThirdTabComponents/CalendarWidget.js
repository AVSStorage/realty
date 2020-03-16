import React, {Component, useMemo, useState} from 'react';
import ReactDOM from 'react-dom';
import ruLocale from "date-fns/locale/ru";
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import {createMuiTheme} from '@material-ui/core/styles';

const localeMap = {
    ru: ruLocale
};
import * as rdrLocales from 'react-date-range/dist/locale';

import {DateRangePicker} from 'react-date-range';
import {useStoreActions, useStoreContext} from "../../../store/store";


export default function CalendarWidget({range = false, big = false, calendar}) {


    const globalState = useStoreContext();
    let {selectionRange, disableDates} = globalState;
    let {updateDate, updateCalendar, updateStateOfItem} = useStoreActions();
    useMemo(() => updateStateOfItem(calendar), [calendar]);

    selectionRange = range ? [
        range, ...JSON.parse(range)
    ] : selectionRange;

    return (
        <div>
            <div className="chara__title" id="charaTitle">
                Календарь занятости по датам
            </div>
            <button className={"btn btn-danger"}
                    onClick={(evt) => updateCalendar(evt, selectionRange, disableDates)}>Заблокировать даты
            </button>
            <div className="slider__items">
                <div className={`slider__calendar ${big ? 'big-cell' : ''}`}>
                    <div className="slider__item">

                        <div className="App">
                            <DateRangePicker
                                locale={rdrLocales.ru}
                                ranges={selectionRange}
                                moveRangeOnFirstSelection={false}
                                staticRanges={[]}
                                rangeColors={["#3d91ff", "#3ce9a0", "#e81162"]}
                                inputRanges={[]}
                                minDate={new Date()}
                                disabledDates={disableDates}
                                onChange={(ranges) => updateDate(ranges, selectionRange, disableDates)}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

const app = document.getElementById('calendar');

if (app) {


    console.log(app.dataset);
    ReactDOM.render(
        <CalendarWidget {...app.dataset} />,
        app
    );
}
