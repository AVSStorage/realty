import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import ReactDOMServer from 'react-dom/server';
import clsx from 'clsx';
import FormControlLabel from "@material-ui/core/FormControlLabel";
import FormControl from "@material-ui/core/FormControl";
import Radio from "@material-ui/core/Radio";
import {makeStyles, withStyles} from "@material-ui/core";
import {green} from '@material-ui/core/colors';
import {RadioGroup, FormGroup, Switch} from '@material-ui/core';
import {useStoreActions, useStoreContext} from "../../../store/store";


const IOSSwitch = withStyles(theme => ({
    root: {
        width: 42,
        height: 26,
        padding: 0,
        margin: theme.spacing(1),
    },
    switchBase: {
        padding: 1,
        '&$checked': {
            transform: 'translateX(16px)',
            color: theme.palette.common.white,
            '& + $track': {
                backgroundColor: '#52d869',
                opacity: 1,
                border: 'none',
            },
        },
        '&$focusVisible $thumb': {
            color: '#52d869',
            border: '6px solid #fff',
        },
    },
    thumb: {
        width: 24,
        height: 24,
    },
    track: {
        borderRadius: 26 / 2,
        border: `1px solid ${theme.palette.grey[400]}`,
        backgroundColor: theme.palette.grey[50],
        opacity: 1,
        transition: theme.transitions.create(['background-color', 'border']),
    },
    checked: {},
    focusVisible: {},
}))(({classes, ...props}) => {
    return (
        <Switch
            focusVisibleClassName={classes.focusVisible}
            disableRipple
            classes={{
                root: classes.root,
                switchBase: classes.switchBase,
                thumb: classes.thumb,
                track: classes.track,
                checked: classes.checked,
            }}
            {...props}
        />
    );
});
const useStyles = makeStyles({
    root: {
        '&:hover': {
            backgroundColor: 'transparent',
        },
    },
    icon: {
        borderRadius: '50%',
        width: 16,
        height: 16,
        boxShadow: 'inset 0 0 0 1px rgba(16,22,26,.2), inset 0 -1px 0 rgba(16,22,26,.1)',
        backgroundColor: '#f5f8fa',
        backgroundImage: 'linear-gradient(180deg,hsla(0,0%,100%,.8),hsla(0,0%,100%,0))',
        '$root.Mui-focusVisible &': {
            outline: '2px auto rgba(19,124,189,.6)',
            outlineOffset: 2,
        },
        'input:hover ~ &': {
            backgroundColor: '#ebf1f5',
        },
        'input:disabled ~ &': {
            boxShadow: 'none',
            background: 'rgba(206,217,224,.5)',
        },
    },
    checkedIcon: {
        backgroundColor: '#137cbd',
        backgroundImage: 'linear-gradient(180deg,hsla(0,0%,100%,.1),hsla(0,0%,100%,0))',
        '&:before': {
            display: 'block',
            width: 16,
            height: 16,
            backgroundImage: 'radial-gradient(#fff,#fff 28%,transparent 32%)',
            content: '""',
        },
        'input:hover ~ &': {
            backgroundColor: '#106ba3',
        },
    },
});

const objects = [
    {
        id: 1,
        name: 'Гостиница',
        description: 'номера в отеле, гостевом доме или хостеле',
        image: 'img/add-photo/1.png',
        value: false
    },
    {
        id: 2,
        name: 'Квартира, апартаменты',
        description: 'целиком под ключ',
        image: 'img/add-photo/2.png',
        value: false
    },
    {
        id: 3,
        name: 'Дом, коттедж, эллинг',
        description: 'целиком под ключ',
        image: 'img/add-photo/3.png',
        value: false
    },
    {
        id: 4,
        name: 'Комната',
        description: 'гости снимут комнату в квартире или доме',
        image: 'img/add-photo/4.png',
        value: false
    },

];
const subs = {

    'Гостиница':
        [
            {id: 1, name: 'Отель'}, {id: 2, name: 'Гостиница'}, {id: 3, name: 'Гостевой дом'}, {
            id: 5,
            name: 'Мини гостиница'
        }
        ]
    ,
    'Квартира, апартаменты':
        [{id: 6, name: 'Отель эконом-класс'}, {id: 7, name: 'Эллинг по номерам'}, {
            id: 8,
            name: 'База отдыха'
        }, {id: 9, name: 'Тур база'}]
    ,
    'Дом, коттедж, эллинг':
        [{id: 10, name: 'Отель эконом-класс'}, {id: 11, name: 'Эллинг по номерам'}, {
            id: 12,
            name: 'База отдыха'
        }, {id: 13, name: 'Тур база'}]
    ,
    'Комната':
        [{id: 14, name: 'Санаторий'}, {id: 15, name: 'Пансионат'}, {id: 16, name: 'Хостел'}, {
            id: 17,
            name: 'Кровать и завтрак'
        }]
}

export default function ObjectTypes() {

    const globalState = useStoreContext();
    let {type: selected} = globalState;

    const {updateInputValue} = useStoreActions();

    const classes = useStyles();



    return (
        <div className="photo">
            <div className="photo_inner">
                <FormControl component="fieldset">
                    <RadioGroup defaultValue={'Гостиница'} className={"subs-div-flex"} onChange={(evt) => updateInputValue(evt.target.value, 'type')}
                                aria-label="gender"
                                name="customized-radios">
                        {
                            objects.map((obj, index) => (
                                <div key={index} className={"subs-div"}>
                                    <FormControlLabel
                                        key={index}
                                        className={'objects333'}
                                        control={
                                            <FormControlLabel
                                                control={
                                                    <IOSSwitch
                                                        value={obj.name}
                                                        className={'d-none'}
                                                        checked={obj.id === Number(selected)}
                                                        onChange={() => updateInputValue(subs[obj.name][0].id, 'type')}
                                                    />
                                                }
                                            />
                                        }
                                        label={<div className="photo__item">
                                            <div className="photo-items">
                                                <a href="#"><img className="photo" src={`/${obj.image}`} alt=""/></a>
                                                <div className="photo__title">{obj.name}</div>
                                                <div className="photo__text">
                                                    {obj.description}
                                                </div>
                                            </div>
                                        </div>}
                                    />
                                    <div className={"subs-div-column"}>
                                        {subs[obj.name].map(newObject => (
                                            <div key={newObject.id}>
                                                <FormControlLabel
                                                    key={index}
                                                    className={'subs'}
                                                    control={
                                                        <FormControlLabel
                                                            control={<Radio
                                                                // checked={}
                                                                className={classes.root}
                                                                disableRipple
                                                                color="default"
                                                                value={newObject.id}
                                                                checked={newObject.id === Number(selected)}
                                                                onChange={(evt) => {
                                                                    evt.stopPropagation();
                                                                    updateInputValue(newObject.id, 'type')
                                                                }}
                                                                name="radio-button-demo[]"
                                                                checkedIcon={<span
                                                                    className={clsx(classes.icon, classes.checkedIcon)}/>}
                                                                icon={<span className={classes.icon}/>}
                                                                // inputProps={{ 'aria-label': 'A' }}
                                                            />
                                                            }
                                                        />
                                                    }
                                                    onClick={(evt) => {
                                                        evt.stopPropagation();
                                                        updateInputValue(newObject.id,'type')
                                                    }}
                                                    value={String(newObject.id)}
                                                    label={
                                                        <div className={"subs-label"}>{newObject.name}</div>
                                                    }
                                                />
                                            </div>
                                        ))}
                                    </div>
                                </div>

                            ))
                        }
                    </RadioGroup>
                </FormControl>
            </div>

        </div>
    )


}



