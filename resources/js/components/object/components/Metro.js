import TextField from "@material-ui/core/TextField";
import React from "react";
import IconButton from '@material-ui/core/IconButton';
import DeleteIcon from '@material-ui/icons/Delete';
import { makeStyles } from '@material-ui/core/styles';
import {useStoreActions, useStoreContext} from "../../../store/store";

const useStyles = makeStyles(theme => ({
    margin: {
        margin: theme.spacing(1),
    },
    extendedIcon: {
        marginRight: theme.spacing(1),
    },
}));

export default function AddedComponent({ label,name,title,distance,type,index }) {
    const classes = useStyles();
    const globalState = useStoreContext();
    let {distance: distanceState} = globalState;

    const { setDistanceValue, deleteDistanceComponent} = useStoreActions();
    return (
        <div className={'metro-wrapper'} style={{display:'flex'}}>
            <div className="km__col-1">
                <div className="form__inner km middle-input">
                    <label> <span className="initial">{label}</span>
                        <TextField onChange={(evt) =>{ let stateName = type === 'metros' ? 'metroName' : 'seaName' ;setDistanceValue(evt,type,index,stateName, distanceState )}} value={name} className="name kmr" placeholder={title} variant="outlined"
                                   margin="normal"/>
                    </label>
                </div>
            </div>
            <div className="km__col-1">
                <div className="form__inner km">
                    <label>
                        <TextField onChange={(evt) => {let stateName = type === 'metros' ? 'metroPath' : 'seaPath' ;setDistanceValue(evt,type,index,stateName, distanceState )}}  value={distance} type={'number'} className="name kml" placeholder="100 м" variant="outlined"
                                   margin="normal"/>
                    </label>
                </div>
            </div>
            <IconButton onClick={(evt) => deleteDistanceComponent(index, type, globalState)} aria-label="delete" className={classes.margin}>
                <DeleteIcon />
            </IconButton>
        </div>)
}
