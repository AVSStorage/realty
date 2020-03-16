import React, { Component, useState } from 'react';
import ReactDOM from 'react-dom';
import { IconButton, InputAdornment } from "@material-ui/core";
import ruLocale from "date-fns/locale/ru";
import SvgIcon from '@material-ui/core/SvgIcon';
import DateFnsUtils from '@date-io/date-fns';
import {
    DatePicker,
    MuiPickersUtilsProvider
} from '@material-ui/pickers';


const localeMap = {
    ru: ruLocale
};


class RuLocalizedUtils extends DateFnsUtils {
    getCalendarHeaderText(date) {
        return format(date, "LLLL", { locale: this.locale });
    }

    getDatePickerHeaderText(date) {
        return format(date, "dd MMMM", { locale: this.locale });
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

const CustomDatePicker = ({handleDateChange, selectedDate, minDate, disabled = false}) => {
   // const [selectedDate, handleDateChange] = useState(new Date());

    return (
        <MuiPickersUtilsProvider utils={DateFnsUtils} locale={localeMap['ru']}>
        <DatePicker  disableToolbar
                     autoOk
                     disabled={disabled}
                     variant="inline"
                     className = "datepicker"
                     minDate={minDate}
                     format={localeFormatMap['ru']}
                     InputProps={{
                         endAdornment: (
                             <InputAdornment position="end">
                                 <IconButton>
                                     <SvgIcon>
                                         <path fill="#000000" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                     </SvgIcon>
                                 </IconButton>
                             </InputAdornment>
                         ),
                     }}
                     value={selectedDate} onChange={handleDateChange} />
        </MuiPickersUtilsProvider>
    )
}

export default CustomDatePicker;


