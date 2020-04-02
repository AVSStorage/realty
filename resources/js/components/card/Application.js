import React, {Component} from 'react';
import {IconButton, InputAdornment, makeStyles} from "@material-ui/core";
import ruLocale from "date-fns/locale/ru";
import SvgIcon from '@material-ui/core/SvgIcon';
import DateFnsUtils from '@date-io/date-fns';
import {
    DatePicker,
    MuiPickersUtilsProvider
} from '@material-ui/pickers';
import {Select, MenuItem, Badge} from '@material-ui/core';
import GoogleMaps from "../index/CustomAutoComplete";
import ReactDOM from "react-dom";
import Checkbox from '@material-ui/core/Checkbox';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import CheckBoxOutlineBlankIcon from "@material-ui/core/SvgIcon/SvgIcon";
import CheckBoxIcon from '@material-ui/icons/CheckBox';

const localeMap = {
    ru: ruLocale
};


class RuLocalizedUtils extends DateFnsUtils {
    getCalendarHeaderText(date) {
        return format(date, "LLLL", {locale: this.locale});
    }

    getDatePickerHeaderText(date) {
        return format(date, "dd MMMM", {locale: this.locale});
    }
}


const localeUtilsMap = {
    ru: RuLocalizedUtils
};

const localeFormatMap = {
    ru: "d MMM yyyy"
};

const localeCancelLabelMap = {
    ru: "отмена"
};


class Application extends Component {
    constructor(props) {
        super(props)
        this.state = {
            ...this.props,
            geo: '',
            validateGeo: false,
            children: this.props.children,
            guests: this.props.guests,
            name: '',
            email: '',
            disabled: this.props.disable !== "",
            disableDates: JSON.parse(this.props.locking).length >0  ? JSON.parse(this.props.locking) : [],
            phone_number: '',
            authorized: Number($('meta[name="auth"]').attr('content')) ? true : false,
            dateTo: this.props.dateto,
            validationError: false,
            dateFrom: new Date(this.props.datefrom) < new Date() ? new Date() : new Date(this.props.datefrom),
            maxDate: new Date(this.props.maxdate) < new Date() ? new Date() : new Date(this.props.maxdate),
            hideOnMobile: true,
            valid: true,
            minDate: this.props.mindate < new Date() ?  new Date() : this.props.mindate,
            validateError: ''
        }
    }

    handleDateChange = (date, item) => {
        let obj = {};
        obj[item] = date;
        Date.prototype.toISODate = function () {
            return this.getFullYear() + '-' +
                ('0' + (this.getMonth() + 1)).slice(-2) + '-' +
                ('0' + this.getDate()).slice(-2);
        }
        let dateTo = new Date(date);
        let month = this.state.disableDates.map(select => new Date(select.date_from).getUTCMonth() < new Date(select.date_to).getUTCMonth() ? new Date(select.date_from).getUTCMonth() : new Date(select.date_to).getUTCMonth()) ;
        let iseSelected = this.state.disableDates.find((select,index) => (new Date(select.date_from).getTime() <= new Date(dateTo.setDate(date.getDate() + Number(this.props.days))).getTime() + 86400000 && (new Date(select.date_to).getTime() >= new Date(dateTo.setDate(date.getDate() + Number(this.props.days))).getTime())) && (month[index] === (dateTo.getUTCMonth())) );


        let newdate = '';

        if (iseSelected && Object.keys(iseSelected).length > 0 ){
            if (new Date(iseSelected.date_to) < this.state.maxDate){
                newdate = new Date(dateTo.setDate(new Date(iseSelected.date_to).getDate() + 1));


            } else {
                newdate = new Date(dateTo.setDate(new Date(iseSelected.date_from).getDate() - 1));
            }
        }




        obj.mindate = item === 'dateFrom' ? (iseSelected && Object.keys(iseSelected).length > 0 ? newdate : date) : this.state.mindate;
        obj.dateTo = item === 'dateFrom' ? (iseSelected && Object.keys(iseSelected).length > 0 ? newdate :  new Date(dateTo.setDate(date.getDate() + Number(this.props.days)))) : (iseSelected && Object.keys(iseSelected).length > 0 ? newdate : date);
        obj.datefrom = item === 'dateFrom' ? date : this.state.datefrom;


        const date1 = new Date(date);
        const date2 = new Date(this.state.datefrom);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));


        obj.days = diffDays;

        this.setState({...obj});
    }


    getGeo = (data) => {
        if (data.split(',').length > 3) {
            this.setState({validateGeo: true});
        } else {
            this.setState({validateGeo: false});
            this.setState({geo: data.trim().split(',')});

        }
    }

    onSelectChange = (data, item) => {
        let obj = {};
        obj[item] = data.target.value;
        this.setState(obj)
    }


    validateMobile = () => {

    }

    hideModal = (evt) => {
        evt.preventDefault();
        const formData = new FormData(evt.target);
        var data = {};
        formData.forEach(function (value, key) {
            data[key] = value;
        });
        const path = this.state.authorized ? '/orders/create' : '/order/create/new-user';
        const objId = $('#objectId').val();

        fetch(path, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({...data, 'object_id': objId, phone_number : this.state.phone_number})
        }).then(response => response.json()).then((error) => {

            if (!error.error) {
                $.fancybox.close();
                this.setState({valid: true})
                //window.location.href = '/dashboard';
            } else {
                this.setState({validateError: error.error, valid: false})
            }

            }
        )

        // $(evt.target).parents('.fancybox-container').removeClass('fancybox-is-open');
        // $(evt.target).parents('.fancybox-container').addClass('fancybox-is-closing');
        //     $(evt.target).parents('#animModal').css('display','none');
        // $(evt.target).parents('.fancybox-container').hide('fade')
    }

    saveInputValue = (evt, input) => {
        this.setState({
            modalPhone: evt.target.value
        })
    }

    hideOnMobile = () => {
        this.setState({hideOnMobile: !this.state.hideOnMobile})
    }

    render() {



        return (
            <div className={"w-100"}>
                <button className={"main__right-btn d-md-none m-auto"} onClick={this.hideOnMobile}>Моя поездка</button>
                <div className={`${this.state.hideOnMobile ? "d-none" : "d-block"} d-md-block main__right`}>
                    <div className="main__right-inner">
                        {!this.state.hideOnMobile && (
                            <button onClick={this.hideOnMobile} type="button" className="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>)}
                        <div className="main__right-title">
                            Моя поездка
                        </div>


                        <div className="main__right-text">
                            Дата заезда
                        </div>

                        <form>
                            <div className="main__right-form">
                                <label>
                                    <MuiPickersUtilsProvider utils={DateFnsUtils} locale={localeMap['ru']}>
                                        <DatePicker disableToolbar
                                                    autoOk
                                                    variant="inline"
                                                    className="datepicker"
                                                    minDate={this.props.minDate}
                                                    format={localeFormatMap['ru']}
                                                    renderDay={(day, selectedDate, isInCurrentMonth, dayComponent) => {
                                                       // const isSelected = isInCurrentMonth && selectedDays.includes(date.getDate());
                                                        let month = this.state.disableDates.map(select => new Date(select.date_from).getUTCMonth() < new Date(select.date_to).getUTCMonth() ? new Date(select.date_from).getUTCMonth() : new Date(select.date_to).getUTCMonth()) ;

                                                       let iseSelected = this.state.disableDates.findIndex((select,index) => (new Date(select.date_from).getTime() <= day.getTime() + 86400000 && (new Date(select.date_to).getTime() >= day.getTime())) && (month[index] === (day.getUTCMonth())) ) !== -1;
                                                        // You can also use our internal <Day /> component
                                                        return <div className={iseSelected ? "bg-danger" : undefined}>{dayComponent}</div>;
                                                    }}
                                                    InputProps={{
                                                        endAdornment: (
                                                            <InputAdornment position="end">
                                                                <IconButton>
                                                                    <SvgIcon>
                                                                        <path fill="#000000"
                                                                              d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"/>
                                                                    </SvgIcon>
                                                                </IconButton>
                                                            </InputAdornment>
                                                        ),
                                                    }}
                                                    maxDate={this.state.maxDate}
                                                    shouldDisableDate={(date) =>
                                                    {

                                                        let month = this.state.disableDates.map(select => new Date(select.date_from).getUTCMonth() < new Date(select.date_to).getUTCMonth() ? new Date(select.date_from).getUTCMonth() : new Date(select.date_to).getUTCMonth()) ;

                                                        let iseSelected = this.state.disableDates.findIndex((select,index) => (new Date(select.date_from).getTime() <= date.getTime() + 86400000 && (new Date(select.date_to).getTime() >= date.getTime())) && (month[index] === (date.getUTCMonth())) ) !== -1;

                                                        return iseSelected;
                                                    }
                                                        }
                                                    value={new Date(this.state.datefrom) < new Date() ? new Date() : this.state.datefrom}
                                                    onChange={(date) => this.handleDateChange(date, 'dateFrom')}/>
                                    </MuiPickersUtilsProvider>
                                    {/*<input className="main--form" type="text" placeholder="20 cентября 2019 г.">*/}
                                    {/*    <img className="main--form__img" src="{{ asset('/img/calendar.png') }}"*/}
                                    {/*         alt="calendar"/>*/}
                                </label>
                            </div>
                        </form>

                        <div className="main__right-text">
                            Дата выезда
                        </div>

                        <form>
                            <div className="main__right-form">
                                <label>
                                    <MuiPickersUtilsProvider utils={DateFnsUtils} locale={localeMap['ru']}>
                                        <DatePicker disableToolbar
                                                    autoOk
                                                    variant="inline"
                                                    className="datepicker"
                                                    minDate={this.props.minDate}
                                                    format={localeFormatMap['ru']}
                                                    InputProps={{
                                                        endAdornment: (
                                                            <InputAdornment position="end">
                                                                <IconButton>
                                                                    <SvgIcon>
                                                                        <path fill="#000000"
                                                                              d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"/>
                                                                    </SvgIcon>
                                                                </IconButton>
                                                            </InputAdornment>
                                                        ),
                                                    }}
                                                    maxDateMessage={"Выбранный диапазон дат превышает заданный владельцем"}
                                                    renderDay={(day, selectedDate, isInCurrentMonth, dayComponent) => {
                                                        // const isSelected = isInCurrentMonth && selectedDays.includes(date.getDate());
                                                        let month = this.state.disableDates.map(select => new Date(select.date_from).getUTCMonth() < new Date(select.date_to).getUTCMonth() ? new Date(select.date_from).getUTCMonth() : new Date(select.date_to).getUTCMonth()) ;

                                                        let iseSelected = this.state.disableDates.findIndex((select,index) => (new Date(select.date_from).getTime() <= day.getTime() + 86400000 && (new Date(select.date_to).getTime() >= day.getTime())) && (month[index] === (day.getUTCMonth())) ) !== -1;
                                                        // You can also use our internal <Day /> component

                                                        return <div className={iseSelected ? "bg-danger" : undefined}>{dayComponent}</div>;
                                                    }}
                                                    maxDate={this.state.maxDate}
                                                    value={this.state.dateTo}
                                                    shouldDisableDate={(date) =>  {
                                                        let month = this.state.disableDates.map(select => new Date(select.date_from).getUTCMonth() < new Date(select.date_to).getUTCMonth() ? new Date(select.date_from).getUTCMonth() : new Date(select.date_to).getUTCMonth()) ;

                                                        let iseSelected = this.state.disableDates.findIndex((select,index) => (new Date(select.date_from).getTime() <= date.getTime() + 86400000 && (new Date(select.date_to).getTime() >= date.getTime())) && (month[index] === (date.getUTCMonth())) ) !== -1;

                                                        return iseSelected;
                                                    }}
                                                    onChange={(date) => this.handleDateChange(date, 'dateTo')}/>
                                    </MuiPickersUtilsProvider>
                                    {/*<input className="main--form" type="text" placeholder="30 cентября 2019 г.">*/}
                                    {/*    <img className="main--form__img" src="{{ asset('/img/calendar.png') }}"*/}
                                    {/*         alt="calendar"/>*/}
                                </label>
                            </div>
                        </form>

                        <div className="main__right-text">
                            Гостей
                        </div>

                        <form>
                            <div className="main__right-form">
                                <label>
                                    <Select value={this.state.guests}
                                            onChange={(data) => this.onSelectChange(data, 'guests')} labelId="label"
                                            id="select" className="guests">
                                        <MenuItem value="1">1 взрослый</MenuItem>
                                        <MenuItem value="2">2 взрослых</MenuItem>
                                        <MenuItem value="3">3 взрослых</MenuItem>
                                        <MenuItem value="4">4 взрослых</MenuItem>
                                        <MenuItem value="5">5 взрослых</MenuItem>
                                        <MenuItem value="6">6 взрослых</MenuItem>
                                        <MenuItem value="7">10 взрослых и больше</MenuItem>
                                    </Select>
                                    {/*<input className="main--form" type="text" placeholder="2 взрослых"/>*/}
                                    {/*    <img className="main--form__images" src="{{ asset('/img/down.png') }}"*/}
                                    {/*         alt="calendar"/>*/}
                                </label>
                            </div>
                        </form>

                        <form>
                            <div className="main__right-form">
                                <label>
                                    <Select value={this.state.children}
                                            onChange={(data) => this.onSelectChange(data, 'children')} labelId="label"
                                            id="select" className="guests">
                                        <MenuItem value="0">Без детей</MenuItem>
                                        <MenuItem value="1">1 ребенок</MenuItem>
                                        <MenuItem value="2">2 ребенка</MenuItem>
                                        <MenuItem value="3">3 ребенка</MenuItem>
                                        <MenuItem value="4">4 детей и более</MenuItem>
                                    </Select>
                                    {/*<input className="main--form" type="text" placeholder="1 ребенок">*/}
                                    {/*    <img className="main--form__images" src="{{ asset('/img/down.png') }}"*/}
                                    {/*         alt="calendar">*/}
                                </label>
                            </div>
                        </form>
                        <div className="main__right-ask">
                            Вы путешествуете по работе?
                        </div>
                        <div className="main__right-qna">

                            <div className="service  main--active">
                                <FormControlLabel control={<Checkbox value="checkedC"/>} label="да"/>
                                {/*<Checkbox*/}
                                {/*    label={'да'}*/}
                                {/*     icon={<CheckBoxOutlineBlankIcon fill={"#fff"} fontSize="small"/>}*/}
                                {/*     checkedIcon={<CheckBoxIcon fontSize="small"/>}*/}
                                {/*     value={0}*/}

                                {/*     // onChange={handleChange(it.id)}*/}
                                {/* />*/}
                            </div>
                            <div className="service  main--active">
                                <FormControlLabel control={<Checkbox value="checkedC"/>} label="нет"/>
                            </div>
                        </div>
                    </div>
                    <div className="main__right-much-inner">
                        {!this.state.valid && (
                            <div style={{width: "200px"}} className="alert alert-danger">
                                {this.state.validateError}
                            </div>
                        )}
                        <div className="main__right-much">

                            {this.state.price} руб. <span className="main--grey"> x {this.state.days} суток</span>
                            <div className="main__right-money">
                                {this.state.price * this.state.days} руб.
                            </div>
                            <div className="center">
                                <a data-fancybox data-animation-duration="800" data-src="#animModal"
                                   href="#" className="main__right-btn">
                                    Запрос на бронь
                                </a>
                            </div>
                            <div className="center">
                                <div className="main__right-remember">
                                    <a href="#inform" onClick={() => {
                                        openinfo('inform');
                                        return false
                                    }}><img
                                        src="/img/info.png" alt="info"/></a> Предоплата 15 %
                                </div>


                                <div className="main__right-info" id="inform" style={{display: "none"}}>
                                    Равным образом сложившаяся структура <br/>организации позволяет выполнять
                                    важные<br/> задания
                                    по разработке существенных <br/> финансовых и административных условий
                                </div>
                            </div>
                        </div>
                    </div>


                    <form style={{display: "none"}} id="animModal"
                          className="animated-modal" onSubmit={this.hideModal}>
                        {!this.state.valid && (
                            <div style={{width: "350px"}} className="alert alert-danger">
                                {this.state.validateError}
                            </div>
                        )}
                        <div className="main__right-much">

                            {this.state.price} руб.
                            <span className="main--grey"> x {this.state.days} суток</span>
                            <div className="main__anim">
                                <div className="main__right-money">
                                    {this.state.price * this.state.days} руб.
                                </div>
                                <div className="main__right-remember anim">
                                    <a href="#inform" onClick={() => {
                                        openinfo('inform');
                                        return false
                                    }}>
                                        <img src="/img/info.png" alt="info"/>
                                    </a> Предоплата 15 %
                                </div>
                            </div>
                            <input type={"hidden"} name={"totalPrice"}
                                   value={this.state.price  * this.state.days}/>
                            <input type={"hidden"} name={"parents"}
                                   value={this.state.guests !== 7 ? this.state.guests : 10}/>
                            <input type={"hidden"} name={"children"}
                                   value={this.state.children !== 5 ? this.state.children : 5}/>
                            <input type={"hidden"} name={"date_from"}
                                   value={new Date(this.state.dateFrom).getFullYear() + "-" + ((new Date(this.state.dateFrom).getMonth() + 1) < 10 ? '0' + (new Date(this.state.dateFrom).getMonth() + 1) : (new Date(this.state.dateFrom).getMonth() + 1)) + "-" + new Date(this.state.dateFrom).getDate()}/>
                            <input type={"hidden"} name={"date_to"}
                                   value={new Date(this.state.dateTo).getFullYear() + "-" + ((new Date(this.state.dateTo).getMonth() + 1) < 10 ? '0' + (new Date(this.state.dateTo).getMonth() + 1) : (new Date(this.state.dateTo).getMonth() + 1)) + "-" + new Date(this.state.dateTo).getDate()}/>
                            {this.state.authorized ? (
                                <div className="center">
                                    <label>
                                        <input pattern={"^(7)(\\(\\d{3}\\)|\\d{3})\\d{7}$"}
                                               onChange={(evt) => this.onSelectChange(evt, 'phone_number')}
                                               value={this.state.modalPhone} className="main__anim-fancy" type="text"
                                               required={true} name={"phone_number"}
                                               placeholder="Ваш телефон для бронирования"/>
                                    </label>
                                </div>
                            ) : (
                                <div style={{display: 'flex', flexDirection: 'column'}}>

                                    <label>
                                        <input value={this.state.name}
                                               onChange={(evt) => this.onSelectChange(evt, 'name')}
                                               className="main__anim-fancy" type="text"
                                               required={true} name={"name"} placeholder="Ваше имя"/>
                                    </label>
                                    <label>
                                        <input pattern={"^(7)(\\(\\d{3}\\)|\\d{3})\\d{7}$"}
                                               onChange={(evt) => this.onSelectChange(evt, 'phone_number')}
                                               value={this.state.modalPhone} className="main__anim-fancy" type="tel"
                                               required={true} name={"phone_number"}
                                               placeholder="Ваш телефон для бронирования"/>
                                    </label>
                                    <label>
                                        <input value={this.state.email}
                                               onChange={(evt) => this.onSelectChange(evt, 'email')}
                                               className="main__anim-fancy" type="email"
                                               required={true} name={"email"} placeholder="Ваш e-mail"/>
                                    </label>
                                </div>
                            )}

                            <div className="fancy__remember  anim__fancy">
                                <Checkbox

                                    value={1} checked/>
                                Я согласен на обработку <span
                                className="span__remember">персональных данных</span> и<br/>
                                принимаю условия <span
                                className="span__remember">пользовательского соглашения</span>

                            </div>
                            <div className="text-center fancy__animation">
                                <button disabled={this.state.disabled} type="submit"
                                        className="fancy__btn">Отправить запрос на бронь
                                </button>
                            </div>
                            <div className="full__anim">
                                Пока платить не нужно. Сначала дождитесь<br/>
                                подтверждения бронирования

                            </div>
                        </div>
                        <button data-fancybox-close=""
                                className="fancybox-button fancybox-close-small" title="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
                                <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        )
    }
}


const app = document.getElementById('cardFilter');

if (app) {
    ReactDOM.render(<Application {...app.dataset} />, app);
}

