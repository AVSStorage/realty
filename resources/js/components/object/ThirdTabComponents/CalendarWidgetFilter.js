import React, {Component, useMemo} from 'react';
import CustomDatePicker from "../../index/DatePicker";
import FormControlLabel from "@material-ui/core/FormControlLabel";
import Checkbox from "@material-ui/core/Checkbox";
import CheckBoxOutlineBlankIcon from '@material-ui/icons/CheckBoxOutlineBlank';
import CheckBoxIcon from '@material-ui/icons/CheckBox';
import TextField from "@material-ui/core/TextField";
import Tabs from '@material-ui/core/Tabs';
import Typography from '@material-ui/core/Typography';
import {useStoreActions, useStoreContext} from "../../../store/store";

function TabPanel(props) {
    const {children, value, index, ...other} = props;


    return (
        <Typography
            component="div"
            role="tabpanel"
            hidden={value !== index}
            id={`vertical-tabpanel-${index}`}
            aria-labelledby={`vertical-tab-${index}`}
            {...other}
        >
            {value === index && children}
        </Typography>
    );
}

export default function CalendarWidgetFilter({updateCalendarData, defaultState}) {

    let globalState = useStoreContext();
    let {dateFrom, dateTo, minDate, info, disableDateTo, togglePanel} = globalState;
    let {freezeDateTo, updateInfo, changeDate, updateStateOfItem, addNewInfo, resetForm} = useStoreActions();
    useMemo(() => updateStateOfItem(defaultState), [defaultState]);





    let currentItem = info.find((item) => item.id === togglePanel);


    let days = [
        'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'
    ]






    return (
        <form className={"calendar__widget-panel"} onSubmit={(evt) => evt.preventDefault()}>
            <a href="personal-area.html">
                <img className="chara__close" src="img/add/4.png" alt="close"/>
            </a>

            <div className="calendar__right">
                <div className="calendar__right-inner">
                    <div className="calendar-content">
                        <div className="calendar__right-start">С</div>
                        <div className="calendar__right-input">
                            <CustomDatePicker handleDateChange={(date) => changeDate(date,"dateFrom",info)}
                                              selectedDate={dateFrom} minDate={minDate}/>
                        </div>
                    </div>

                    {!disableDateTo && (
                        <div className="calendar-content">
                            <div className="calendar__right-start">До</div>
                            <div className="calendar__right-input">
                                <CustomDatePicker disabled={disableDateTo}
                                                  handleDateChange={(date) => changeDate(date,"dateTo",info)}
                                                  selectedDate={dateTo} minDate={minDate}/>
                            </div>
                        </div>
                    )}

                    <div className="service cal">
                        <FormControlLabel
                            control={
                                <Checkbox
                                    icon={<CheckBoxOutlineBlankIcon fontSize="small"/>}
                                    checkedIcon={<CheckBoxIcon fontSize="small"/>}
                                    onChange={(evt) => {evt.stopPropagation();freezeDateTo(disableDateTo, dateFrom)}}
                                />
                            }
                            label={"без конечной даты"}
                        />

                    </div>


                    <div className="calendar__all-day">
                        Применить изменения к дням
                    </div>
                    <div className="calendar__all">
                        {days.map((day, index) => (
                            <FormControlLabel
                                key={day}
                                control={
                                    <Checkbox

                                        icon={<CheckBoxOutlineBlankIcon fontSize="small"/>}
                                        checkedIcon={<CheckBoxIcon fontSize="small"/>}
                                        value={index}
                                        checked={info.findIndex((inf) => (inf.id === (index + 1)) && inf.checked) !== -1}
                                        onChange={(evt) => {evt.stopPropagation();updateInfo(evt, index + 1, togglePanel, info)}}
                                    />
                                }

                                label={day}
                                className="service call"
                            />
                        ))}

                    </div>


                </div>
                {days[togglePanel - 1] && (<strong>Изменения для {days[togglePanel - 1]}</strong>)}
            </div>
            <Tabs
                value={togglePanel}
                indicatorColor="primary"
                // onChange={handleChange}
                aria-label="disabled tabs example"
            >

                <TabPanel className={"price-tabs"} value={togglePanel} index={togglePanel}>

                    <div className="calendar__price"><span className="cost">Цена</span>
                        <TextField onChange={(evt) => {
                           addNewInfo(evt, togglePanel, 'price', info)
                        }} type={'number'} value={currentItem.price}
                                   className="calendar__in prices" placeholder={"3000 руб."}/>
                    </div>


                    <div className="calendar__min-cost">
                        <div className="calendar__right-start min--cost">Минимальный<br/>срок проживания
                        </div>
                        <TextField onChange={(evt) => {
                            addNewInfo(evt, togglePanel, 'days', info)
                        }} value={currentItem.days} type={'number'}
                                   className="calendar__in prices costt" placeholder={"1 сутки"}/>

                        <div className="calendar__right-start">
                            Доплата за гостя
                        </div>
                        <TextField onChange={(evt) => {
                            addNewInfo(evt, togglePanel, 'surcharge', info)
                        }} value={currentItem.surcharge} type={'number'}
                                   className="calendar__in prices costt" placeholder={"3000 руб."}/>

                        <div className="currency currency--cost">руб.</div>


                    </div>
                </TabPanel>

            </Tabs>

            <div className="calendar__min-btn">
                <div className="calendar__btn-inner">
                    <button onClick={(evt) => resetForm(evt)} type={"submit"} className="button--calendar red">
                        Сбросить
                    </button>
                </div>

                <div className="calendar__btn-inner">
                    <button onClick={(evt) => evt.preventDefault()} type={"submit"} className="button--calendar green">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    )
}
