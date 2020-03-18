
import React, { Component, useEffect } from 'react';

import { withStyles, makeStyles } from '@material-ui/core/styles';
import Slider from '@material-ui/core/Slider';
import Typography from '@material-ui/core/Typography';
import Tooltip from '@material-ui/core/Tooltip';
import FilterForm from "../index/FilterForm";
import ReactDOM from "react-dom";
import Input from '@material-ui/core/Input';
import Checkbox from '@material-ui/core/Checkbox';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import CheckBoxOutlineBlankIcon from '@material-ui/icons/CheckBoxOutlineBlank';
import CheckBoxIcon from '@material-ui/icons/CheckBox';
import {useStoreActions, useStoreContext} from "../../store/store";



const useStyles = makeStyles({
    checked: {
        background: 'linear-gradient(45deg, #FE6B8B 30%, #FF8E53 90%)',
        border: 0,
        borderRadius: 3,
        boxShadow: '0 3px 5px 2px rgba(255, 105, 135, .3)',
        color: 'white',
        height: 48,
        padding: '0 30px',
    },
});

const CheckBoxFilter = ({toggle}) => {

    const classes = useStyles();
    let checked = false;
    const globalStore = useStoreContext();

    const { items, count} = globalStore;

    const {handleCheckBoxChange, paginateCheckboxes, renderCards} = useStoreActions();

    return (

            <div>
            {items.map((item, i) => {
                return (
                    <div  onClick={toggle} className="content__left-info  info" key={i}>
                    <span  className="info">{item.title}</span>
                        <div className={'tabs'}>

                        {item.items.slice(0,count).map((it, index) => {
                            return ( <div key={index} className="service">
                                <FormControlLabel
                                    control={
                                        <Checkbox
                                            className={classes.root}
                                            icon={<CheckBoxOutlineBlankIcon fontSize="small" />}
                                            checkedIcon={<CheckBoxIcon fontSize="small" />}
                                            checked={it.value}
                                            onChange={(event) => {handleCheckBoxChange(event,i,index, it.id,renderCards);}}
                                        />
                                    }
                                    label={it.name}
                                />

                    </div> )})}
                        { count < item.items.length && (
                            <button onClick={(evt) => paginateCheckboxes(evt, item.items.length)} className="service__etc">
                                Еще позиции +
                            </button>
                        )
                        }

                    </div>
                    </div>
                )
            })}
            </div>

    )
}


CheckBoxFilter.defaultProps = {
    items : {
        id: 1,
        title: 'загрузка',
        items: [
            {name: 'Загрузка', value: false}
        ]
    }
}


export default CheckBoxFilter;
