import React, { Component, useState } from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';
import Autocomplete from '@material-ui/lab/Autocomplete';
import LocationOnIcon from '@material-ui/icons/LocationOn';
import Grid from '@material-ui/core/Grid';
import { makeStyles } from '@material-ui/core/styles';
import parse from 'autosuggest-highlight/parse';
import throttle from 'lodash/throttle';
import match from "autosuggest-highlight/match";


const useStyles = makeStyles(theme => ({
    icon: {
        color: theme.palette.text.secondary,
        marginRight: theme.spacing(2),
    },
}));

export default function GoogleMaps({getInputValue, validate, value, width = false}) {
    const classes = useStyles();
    const [inputValue, setInputValue] = React.useState('');
    const [options, setOptions] = React.useState([]);


    const handleChange = event => {
        setInputValue(event.target.value);
    };

    const fetchApi = React.useMemo(
        () =>
            throttle((input, callback) => {
                fetch('/api/info', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    body: JSON.stringify(input)
                }).then(response => response.json()).then(callback)
            }, 200),
        [],
    );

    React.useEffect(() => {
        fetch('/api/info', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => response.json()).then(result => setOptions(result));
    },[]);


    React.useEffect(() => {
        let active = true;

        if (inputValue === '') {
            setOptions([]);
            return undefined;
        }

        fetchApi({ input: inputValue }, results => {
            if (active) {
                setOptions(results || []);
            }
        });

        return () => {
            active = false;
        };
    }, [inputValue, fetchApi]);


    return (

        <Autocomplete
            id="google-map-demo"
            style={{ width: width ? 220 : "100%" }}
            getOptionLabel={option => option.city}
            filterOptions={x => x}
            options={options}
            className="automplete"
            autoComplete
            onChange={(data,value) => {getInputValue(value === null ? {city: ""} : value);} }
            includeInputInList
            freeSolo
            value={value}
            disableOpenOnFocus
            renderInput={params => (
                <TextField
                    {...params}
                    label="Регион, город, место"
                    variant="outlined"
                    fullWidth
                    error={validate}
                    inputProps= {{...params.inputProps,
                        autoComplete: 'new-password'}}
                    onChange = {(data) => {  setInputValue(data.target.value)}}
                />
            )}
            renderOption={option => {
                const matches = match(option.city, inputValue);
                const parts = parse(option.city, matches);


                return (
                    <Grid container alignItems="center">
                        <Grid item>
                            <LocationOnIcon className={classes.icon} />
                        </Grid>
                        <Grid item xs>
                            {parts.map((part, index) => (
                                <span key={index} style={{ fontWeight: part.highlight ? 700 : 400 }}>
                  {part.text}
                </span>
                            ))}

                        </Grid>
                    </Grid>
                );
            }}
        />
    );
}
