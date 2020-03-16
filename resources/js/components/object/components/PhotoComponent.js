import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';

const PhotoComponent = ({photo, description, setPhotoName, placeHolder, deletePhoto, index, name, items}) => {

    return (
        <div className="photo__item">
            <div className="photo__prev">
                <img className="photo__img" src={`/${photo}`} alt="Объект"/>
                <div className="photo__text">{description}</div>
                <button className={'photo__deleted'} onClick={(evt) => deletePhoto(evt,index, items)}>Закрыть</button>
            </div>
            <TextField onChange={(evt) => setPhotoName(evt,index, items)} className="photo__input  photos" value={name} placeholder={placeHolder}/>
        </div>
    )
}



PhotoComponent.defaultProps = {
    photo: 'img/add/7.png',
    description: 'фото',
    placeHolder: 'Что на фото?'
};

export default PhotoComponent;
