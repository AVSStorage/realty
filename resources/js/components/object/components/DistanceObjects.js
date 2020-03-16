import React from 'react';
import TextField from '@material-ui/core/TextField';
import Autocomplete from '@material-ui/lab/Autocomplete';
import parse from 'autosuggest-highlight/parse';
import match from 'autosuggest-highlight/match';
import ReactDOM from "react-dom";
import AddedComponent from "./Metro";
import {useStoreActions, useStoreContext} from "../../../store/store";
export default function DistanceObjects() {



    const globalState = useStoreContext();
    let {metros, seas, distance} = globalState;

    const {updateText, setDistanceValue, addNewDistanceValue} = useStoreActions();

    const renderAddedComponent = (type, bindings) => {
        var metroRows = [];
        var seaRows = [];

        if (metros && type === 'metro') {
            for (let i = 1; i < metros; i++) {

                metroRows.push(<AddedComponent key={i}  index={i} type={'metros'}  distance={bindings[i].metroPath} name={bindings[i].metroName} label={'Метро'} title={'Симферополь'}/>);
            }
            return metroRows;
        } else if (seas && type === 'sea'){
            for (let i = 1; i < seas; i++) {
                seaRows.push(<AddedComponent key={i}  index={i} type={'seas'} distance={bindings[i].seaPath} name={bindings[i].seaName} label={'Море'} title={'Черное море'} />);
            }
            return seaRows;
        }


        return [];

    }



    let metroComponents =  metros >= 1 ? renderAddedComponent('metro', distance.metros) : [];
    let seaComponents = seas >= 1 ? renderAddedComponent('sea', distance.seas) : [];




    return (
        <div>
            <div className="chara__title" id="charaType">
                Укажите расстояние
            </div>

            <div  className="km__main">
                <div className="km__inner">
                    <div className="km__col-1">
                        <div  className="form__inner km">
                            <label><span  className="initial"> Центр </span>
                                <TextField onChange={(evt) => updateText('center', evt.target.value, 'distance')} value={distance.center} type={'number'} className="name kms" placeholder="2 км" variant="outlined"
                                           margin="normal" />
                            </label>
                            </div>
                        </div>
                    <div className={"km-col-2"} >
                        <div className="km__col-1">
                            <div className="form__inner km middle-input">
                                <label> <span className="initial">Метро</span>
                                    <TextField  onChange={(evt) => setDistanceValue(evt,'metros',0,'metroName', distance)}  value={distance.metros[0].metroName} className="name kmr" placeholder="Симферополь" variant="outlined"
                                               margin="normal" />
                                </label>
                            </div>
                        </div>
                        <div className="km__col-1">
                            <div className="form__inner km">
                                <button className="initial al"  onClick={(evt) => addNewDistanceValue(evt, metros, distance, 'metros')}>+ добавить метро</button>
                                <label>
                                    <TextField onChange={(evt) => setDistanceValue(evt,'metros',0,'metroPath', distance)} value={distance.metros[0].metroPath} type={'number'} className="name kml" placeholder="100 м" variant="outlined"
                                               margin="normal" />
                                </label>
                            </div>
                        </div>
                    </div>
                    {metroComponents.map((metroComponent) => metroComponent)}
                    </div>
                    <div className="km__inner">
                        <div className={"km-col-3"} >
                            <div className="km__col-1 ">
                                <div className="form__inner km middle-input">
                                    <label> <span className="initial">Аэропорт</span>
                                        <TextField onChange={(evt) => updateText('airoportName', evt.target.value, 'distance')} value={distance.airoportName} className="name kmr" placeholder="Симферополь" variant="outlined"
                                                   margin="normal" />
                                    </label>
                                </div>
                            </div>
                            <div className="km__col-1">
                                <div className="form__inner km eles small-input">
                                    <label>
                                        <TextField disabled={distance.airoportName === '' ? true : false} onChange={(evt) => updateText('airoportDistance', evt.target.value,'distance')}  value={distance.airoportDistance}  type={'number'} className="name kml ele" placeholder="2 км" variant="outlined"
                                                   margin="normal" />
                                    </label>
                                </div>
                            </div>
                        </div>

                            <div style={{display:'flex',width: '50%'}}>
                            <div className="km__col-1">
                                <div className="form__inner km middle-input">
                                    <label> <span className="initial">Море</span>
                                        <TextField onChange={(evt) => setDistanceValue(evt,'seas',0,'seaName', distance)} value={distance.seas[0].seaName} className="name kmr" placeholder="Черное море" variant="outlined"
                                                   margin="normal" />
                                    </label>
                                </div>
                            </div>
                            <div className="km__col-1">
                                <div className="form__inner km">
                                    <label> <button type={'button'} className="initial al" onClick={(evt) => addNewDistanceValue(evt, seas, distance, 'seas')}>+ добавить море</button>
                                        <TextField onChange={(evt) => setDistanceValue(evt,'seas',0,'seaPath', distance)} value={distance.seas[0].seaPath}  type={'number'} className="name kml" placeholder="100 км" variant="outlined"
                                                   margin="normal" />
                                    </label>
                                </div>
                            </div>
                            </div>

                            {seaComponents.map((seaComponent, index) => seaComponent)}
                    </div>


                    <div className="km__flexx">
                        <div className="km__col-1 ">
                            <div className="form__inner km middle-input">
                                <label> <span className="initial">Ж/Д вокзал</span>
                                    <TextField onChange={(evt) => updateText('railwayName', evt.target.value, 'distance')} value={distance.railwayName} className="name kmr" placeholder="Севастополь" variant="outlined"
                                               margin="normal" />
                                </label>
                            </div>
                        </div>
                        <div className="km__col-1">
                            <div className="form__inner km    eles small-input">
                                <label>
                                    <TextField disabled={distance.railwayName === '' ? true : false} onChange={(evt) => updateText('railwayDistance',evt.target.value,'distance')} value={distance.railwayDistance} type={'number'} className="name kml ele" placeholder="2 км" variant="outlined"
                                               margin="normal" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            )
}


