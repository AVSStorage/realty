import * as React from 'react';
import { TimePicker } from 'antd';
import moment from 'moment';
import 'antd/dist/antd.css';
function onChange(time, timeString) {
    console.log(time, timeString);
}

export default function TmiPickerContainer ({value, onChange, format}){

    return (
        <TimePicker  style={{padding: '18.5px 14px'}} className={"attraction-km"} onChange={onChange} value={moment(new Date(value).getHours() + ':' + new Date(value).getMinutes(), format)} defaultValue={moment('12:08', format)} format={format} />
    )
}

