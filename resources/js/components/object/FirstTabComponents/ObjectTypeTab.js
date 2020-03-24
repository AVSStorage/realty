import React from 'react';
import ObjectTypes from "../components/ObjectTypes";
import DistanceObjects from "../components/DistanceObjects";
import Highlights from "../components/AutoComplete";
import Maps from "../Ymap";
import { useStoreContext} from "../../../store/store";


const ObjectTypeTab = ({saveFirstTabToState}) => {

    const globalState = useStoreContext();

    return (
        <form onSubmit={(evt) => {evt.preventDefault();saveFirstTabToState(globalState)}}>
            <div className="chara__title" id="charaTitle">
                Тип объекта и адресс
            </div>
            <ObjectTypes/>
            <div className="chara__title" id="charaType">
                Укажите адресс
            </div>
            <Highlights/>
            <div className="chara__title" id="charaType">
                Укажите расположение на карте
            </div>
            <Maps/>
            <DistanceObjects/>
            <button type={'submit'} className="chara__btn">
                Далее
            </button>
        </form>
    )
}


export default ObjectTypeTab;

